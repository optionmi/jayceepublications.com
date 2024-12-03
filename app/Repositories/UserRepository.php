<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
use PeterColes\Countries\CountriesFacade as Countries;


class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public $user;

    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }

    public function paginated($start, $length, $sortColumn, $sortDirection, $searchValue, $countOnly = false)
    {
        $query = $this->user->select('*');


        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->orWhere('name', 'LIKE', "%$searchValue%");
                $q->orWhere('email', 'LIKE', "%$searchValue%");
            });
        }

        if (!empty($sortColumn)) {
            $sortColumn = strtolower($sortColumn) === '#' ? 'id' : strtolower($sortColumn);
            $query->orderBy($sortColumn, $sortDirection);
        }

        $count = $query->count();

        if ($countOnly) {
            return $count;
        }

        $query->skip($start)->take($length);
        $users = $query->get();
        $users = $this->collectionModifier($users, $start);
        return $users;
    }

    public static function collectionModifier($users, $start)
    {
        return $users->map(function ($user, $key) use ($start) {
            $user->serial = $start + 1 + $key;
            $user->actions = view('admin.users.actions', compact('user'))->render();
            $user->setHidden(['categories']);
            return $user;
        });
    }
}
