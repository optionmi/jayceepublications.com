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
        $features = [
            [
                'name' => 'Interactive Digital Animations',
                'desc' => 'Engage students with dynamic, visually appealing animations that bring complex concepts to life.'
            ],
            [
                'name' => 'Instant Answer Keys',
                'desc' => 'Provide educators and students with seamless access to answer keys, ensuring faster learning and more effective assessment.'
            ],
            [
                'name' => 'Test Paper Generator',
                'desc' => 'Simplify the assessment process with our intuitive test paper generator, offering customized tests that cater to various educational levels.'
            ],
            [
                'name' => 'Ebook/Flipbook',
                'desc' => 'Ebook/Flipbook is a powerful tool that allows educators to create and share interactive books in an efficient and intuitive manner.'
            ],
            [
                'name' => 'Youtube',
                'desc' => 'With our easy-to-use YouTube support, educators can easily share videos with students and parents.'
            ],
        ];
        $articles = Article::orderByDesc('created_at')->get();
        $series = collect(File::allFiles(public_path('series')))
            ->map(function ($fileInfo) {
                return $fileInfo->getFilename();
            })
            ->toArray();

        $authors =  Author::limit(4)->get();

        return view('web.home', compact('features', 'articles', 'series', 'authors'));
    }

    public function showArticle(Article $article)
    {
        $articles = Article::orderBy('created_at', 'desc')->take(10)->get();
        return view('web.article', compact('article', 'articles'));
    }
}
