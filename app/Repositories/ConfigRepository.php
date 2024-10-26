<?php

namespace App\Repositories;

use App\Repositories\Contracts\ConfigRepositoryInterface;
use App\Models\Config;

class ConfigRepository extends BaseRepository implements ConfigRepositoryInterface
{

    public $config;

    public function __construct(Config $config)
    {
        parent::__construct($config);
        $this->config = $config;
    }

    public function paginated($columns, $start, $length, $sortColumn, $sortDirection, $searchValue, $countOnly = false)
    {
        $query = $this->config->select('*');

        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->orWhere('name', 'LIKE', "%$searchValue%")
                    ->orWhere('value', 'LIKE', "%$searchValue%");
                // ->orWhereHas('category', function ($q) use ($searchValue) {
                //     $q->where('title', 'LIKE', "%$searchValue%");
                // });
            });
        }

        if (!empty($sortColumn)) {
            switch (strtolower($sortColumn)) {
                case "#":
                    $sortColumn = 'id';
                    break;
                    // case "category":
                    //     $sortColumn = 'category_id';
                    //     break;
                default:
                    $sortColumn = strtolower($sortColumn);
                    break;
            }
            $query->orderBy($sortColumn, $sortDirection);
        }

        $count = $query->count();

        if ($countOnly) {
            return $count;
        }

        $query->skip($start)->take($length);
        $configs = $query->get();
        $configs = $this->collectionModifier($configs, $columns, $start);
        return $configs;
    }

    public function collectionModifier($configs, $columns, $start)
    {
        return $configs->map(function ($config, $key) use ($columns, $start) {
            $config->serial = $start + 1 + $key;
            $config->name = ucfirst($config->name);
            $config->value = $config->name == 'Logo' ? '<img src="' . asset('configs/' . $config->value) . '" class="img-fluid">' : $config->value;
            $config->value = $config->name == 'Catalogue' ? '<a href="' . asset('configs/' . $config->value) . '" target="_blank">View</a>' : $config->value;
            $config->setVisible($columns);
            return $config;
        });
    }
}
