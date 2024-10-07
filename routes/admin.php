<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Admin\BestsellingSeriesController;

Route::group(['middleware' => ['auth']], function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::resource('users', UserController::class);

  // Bestselling Series
  Route::get('bestsellingSeries', [BestsellingSeriesController::class, 'index'])->name('bestsellingSeries.index');
  Route::post('bestsellingSeries', [BestsellingSeriesController::class, 'store'])->name('bestsellingSeries.store');
  Route::delete('bestsellingSeries/{series}', [BestsellingSeriesController::class, 'destroy'])->name('bestsellingSeries.destroy');

  // Authors
  Route::resource('authors', AuthorController::class);
  Route::get('/authors-data', [AuthorController::class, 'dataTable'])->name('authors.datatable');

  // Articles
  Route::resource('articles', ArticleController::class);
  Route::get('/articles-data', [ArticleController::class, 'dataTable'])->name('articles.datatable');
  Route::post('/articles-toggle', [ArticleController::class, 'toggle'])->name('articles.toggle');


  // Configs
  Route::resource('configs', ConfigController::class);
  Route::get('/configs-data', [ConfigController::class, 'dataTable'])->name('configs.datatable');
});
