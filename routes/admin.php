<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BoardController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\VacancyController;
use App\Http\Controllers\Admin\StandardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BestsellingSeriesController;

Route::group(['middleware' => ['auth']], function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::resource('users', UserController::class);

  // Boards
  Route::resource('boards', BoardController::class);
  Route::get('/boards-data', [BoardController::class, 'dataTable'])->name('boards.datatable');

  // Standards
  Route::resource('standards', StandardController::class);
  Route::get('/standards-data', [StandardController::class, 'dataTable'])->name('standards.datatable');

  // Subjects
  Route::resource('subjects', SubjectController::class);
  Route::get('/subjects-data', [SubjectController::class, 'dataTable'])->name('subjects.datatable');

  // Authors
  Route::resource('authors', AuthorController::class);
  Route::get('/authors-data', [AuthorController::class, 'dataTable'])->name('authors.datatable');

  // Books
  Route::resource('books', BookController::class);
  Route::get('/books-data', [BookController::class, 'dataTable'])->name('books.datatable');

  // Bestselling Series
  Route::get('bestsellingSeries', [BestsellingSeriesController::class, 'index'])->name('bestsellingSeries.index');
  Route::post('bestsellingSeries', [BestsellingSeriesController::class, 'store'])->name('bestsellingSeries.store');
  Route::delete('bestsellingSeries/{series}', [BestsellingSeriesController::class, 'destroy'])->name('bestsellingSeries.destroy');

  // Articles
  Route::resource('articles', ArticleController::class);
  Route::get('/articles-data', [ArticleController::class, 'dataTable'])->name('articles.datatable');
  Route::post('/articles-toggle', [ArticleController::class, 'toggle'])->name('articles.toggle');

  // Configs
  Route::resource('configs', ConfigController::class);
  Route::get('/configs-data', [ConfigController::class, 'dataTable'])->name('configs.datatable');

  // Users
  Route::resource('users', UserController::class);
  Route::get('/users-data', [UserController::class, 'dataTable'])->name('users.datatable');

  // Vacancies
  Route::resource('vacancies', VacancyController::class);
  Route::get('/vacancies-data', [VacancyController::class, 'dataTable'])->name('vacancies.datatable');
});
