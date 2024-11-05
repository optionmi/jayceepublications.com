<?php

namespace App\Repositories;

use App\Repositories\Contracts\BookRepositoryInterface;
use App\Models\Book;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{

    public $book;

    public function __construct(Book $book)
    {
        parent::__construct($book);
        $this->book = $book;
    }

    public function paginated($columns, $start, $length, $sortColumn, $sortDirection, $searchValue, $countOnly = false)
    {
        $query = $this->book->select('*');

        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->orWhere('name', 'LIKE', "%$searchValue%")
                    ->orWhere('about', 'LIKE', "%$searchValue%")
                    ->orWhereHas('board', function ($q) use ($searchValue) {
                        $q->where('name', 'LIKE', "%$searchValue%");
                    })
                    ->orWhereHas('standard', function ($q) use ($searchValue) {
                        $q->where('name', 'LIKE', "%$searchValue%");
                    })
                    ->orWhereHas('subject', function ($q) use ($searchValue) {
                        $q->where('name', 'LIKE', "%$searchValue%");
                    })
                    ->orWhereHas('author', function ($q) use ($searchValue) {
                        $q->where('name', 'LIKE', "%$searchValue%");
                    });
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
        $books = $query->get();
        $books = $this->collectionModifier($columns, $books, $start);
        return $books;
    }

    public function collectionModifier($columns, $books, $start)
    {
        return $books->map(function ($book, $key) use ($columns, $start) {
            $book->serial = $start + 1 + $key;
            if ($book->img) $book->image = view('admin.books.media', compact('book'))->render();
            $book->actions = view('admin.books.actions', compact('book'))->render();
            $book->board_name = $book->board->name;
            $book->standard_name = $book->standard->name;
            $book->subject_name = $book->subject->name;
            $book->author_name = $book->author->name;
            $book->imgUrl = asset('books/img/' . $book->img);
            $book->setVisible($columns);
            return $book;
        });
    }

    public function reactTableData($columns, $start, $length, $boards = null, $standards = null, $subjects = null, $searchValue = null)
    {
        $query = $this->book->select('*');

        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->orWhere('name', 'LIKE', "%$searchValue%");
            });
        }

        if ($boards) {
            $query->whereIn('board_id', $boards);
        }
        if ($standards) {
            $query->whereIn('standard_id', $standards);
        }
        if ($subjects) {
            $query->whereIn('subject_id', $subjects);
        }

        $count = $query->count();

        $query->skip($start)->take($length);
        $lastQuery = $query->toSql();
        $books = $query->get();
        $books = $this->collectionModifier($columns, $books, $start);

        return [
            "data" => $books,
            "count" => $count,
        ];
    }
}
