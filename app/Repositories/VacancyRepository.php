<?php

namespace App\Repositories;

use App\Repositories\Contracts\VacancyRepositoryInterface;
use App\Models\Vacancy;

class VacancyRepository extends BaseRepository implements VacancyRepositoryInterface
{

    public $vacancy;

    public function __construct(Vacancy $vacancy)
    {
        parent::__construct($vacancy);
        $this->vacancy = $vacancy;
    }

    public function paginated($columns, $start, $length, $sortColumn, $sortDirection, $searchValue, $countOnly = false)
    {
        $query = $this->vacancy->select('*');

        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->orWhere('name', 'LIKE', "%$searchValue%");
                // ->orWhere('content', 'LIKE', "%$searchValue%");
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
        $vacancies = $query->get();
        $vacancies = $this->collectionModifier($columns, $vacancies, $start);
        return $vacancies;
    }

    public function collectionModifier($columns, $vacancies, $start)
    {
        return $vacancies->map(function ($vacancy, $key) use ($columns, $start) {
            $vacancy->serial = $start + 1 + $key;
            // if ($vacancy->media->first()) $vacancy->media_file = view('admin.vacancies.media', compact('vacancy'))->render();
            $vacancy->actions = view('admin.vacancies.actions', compact('vacancy'))->render();
            $vacancy->setVisible($columns);
            return $vacancy;
        });
    }
}
