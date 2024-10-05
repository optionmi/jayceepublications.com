<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::group(['middleware' => ['auth']], function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::resource('users', UserController::class);
  // Articles
  Route::resource('articles', ArticleController::class);
  Route::get('/articles-data', [ArticleController::class, 'dataTable'])->name('articles.datatable');
  // Authors
  Route::resource('authors', AuthorController::class);
  Route::get('/authors-data', [AuthorController::class, 'dataTable'])->name('authors.datatable');
});
