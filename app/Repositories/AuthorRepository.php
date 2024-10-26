<?php

namespace App\Repositories;

use App\Models\Author;
use App\Repositories\Contracts\AuthorRepositoryInterface;

class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{

    public $author;

    public function __construct(Author $author)
    {
        parent::__construct($author);
        $this->author = $author;
    }

    public function paginated($columns, $start, $length, $sortColumn, $sortDirection, $searchValue, $countOnly = false)
    {
        $query = $this->author->select('*');

        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->orWhere('name', 'LIKE', "%$searchValue%")
                    ->orWhere('about', 'LIKE', "%$searchValue%");
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
        $authors = $query->get();
        $authors = $this->collectionModifier($authors, $columns,  $start);
        return $authors;
    }

    public function collectionModifier($authors, $columns,  $start)
    {
        return $authors->map(function ($author, $key) use ($columns, $start) {
            $author->serial = $start + 1 + $key;
            if ($author->img) $author->avatar = view('admin.authors.media', compact('author'))->render();
            $author->actions = view('admin.authors.actions', compact('author'))->render();
            $author->setVisible($columns);
            return $author;
        });
    }
}
