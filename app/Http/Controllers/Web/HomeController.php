<?php

namespace App\Http\Controllers\Web;

use App\Models\Author;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::orderByDesc('created_at')->get();
        $series = collect(File::allFiles(public_path('series')))
            ->map(function ($fileInfo) {
                return $fileInfo->getFilename();
            })
            ->toArray();

        $authors =  Author::limit(4)->get();

        return view('web.home', compact('articles', 'series', 'authors'));
    }

    public function showArticle(Article $article)
    {
        $articles = Article::orderBy('created_at', 'desc')->take(10)->get();
        return view('web.article', compact('article', 'articles'));
    }
}
