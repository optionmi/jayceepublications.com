<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (self $book) {
            $mediaDirectory = 'books/img/';
            Storage::disk('public')->delete($mediaDirectory . $book->img);
        });
    }

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
    public function standard()
    {
        return $this->belongsTo(Standard::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}