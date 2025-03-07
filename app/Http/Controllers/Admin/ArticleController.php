<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    public $article;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->article = $articleRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.articles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreArticleRequest $request)
    // {
    //     $data = $request->validated();
    //     $article = $this->article->store($data, $request->input('id'));

    //     if ($request->hasFile('media_file')) {
    //         $uploadedFile = $this->uploadFile($request->file('media_file'), 'articles/img/');
    //         $article->media()->create(['file' => $uploadedFile['name'], 'type' => $uploadedFile['type']]);
    //     }

    //     return $this->jsonResponse((bool)$article, 'Article ' . ($request->input('id') ? 'updated' : 'created') . ' successfully');
    // }

    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();
        $article = $this->article->store($data, $request->input('id'));

        // Handle media files and URLs
        if ($request->input('src_type')) {
            foreach ($request->input('src_type') as $key => $sourceType) {
                $mediaType = $request->input('media_type')[$key] ?? null;

                if ($sourceType === 'file' && $request->hasFile("media_file.$key")) {
                    $uploadedFile = $this->uploadFile($request->file("media_file.$key"), 'articles/' . $mediaType . '/');
                    $article->media()->create([
                        'file' => $uploadedFile['name'],
                        'type' => $mediaType,
                        'src_type' => $sourceType
                    ]);
                } elseif ($sourceType === 'url' && $request->input("media_url.$key")) {
                    $article->media()->create([
                        'file' => $request->input("media_url.$key"),
                        'type' => $mediaType,
                        'src_type' => $sourceType
                    ]);
                }
            }
        }

        return $this->jsonResponse((bool)$article, 'Article ' . ($request->input('id') ? 'updated' : 'created') . ' successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Article $article)
    {
        $articleDeletion = $article->delete();
        return $this->jsonResponse((bool)$articleDeletion, 'Article deleted successfully');
    }

    public function dataTable()
    {
        $data = $this->generateDataTableData($this->article);
        return response()->json($data);
    }

    public function toggle(Request $request)
    {
        $enableArticles = request()->input('enableArticles') === 'true';
        $config = Config::firstOrCreate(['name' => 'showArticles'], ['value' => $enableArticles]);
        $toggle = $config->update(['value' => $enableArticles]);
        return $this->jsonResponse($toggle, 'Articles ' . ($enableArticles ? 'enabled' : 'disabled') . ' successfully');
    }
}
