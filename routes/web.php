<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\GoalsController;
use App\Http\Controllers\FinancesController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('dashboard', function () {
    return view('dashboard/dashboard');
})->middleware('auth');

Route::get('/', [PagesController::class, 'getIndex']);
//Routes for posts
Route::get('blog', [PostsController::class, 'index']);
Route::get('create', [PostsController::class, 'create']);
Route::resource('blog', PostsController::class); //CRUD functions

//Routes for comments
Route::post('/comment/store', [CommentController::class, 'store'])->name('comment/add');
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply/add');

//Routes for goals
Route::get('goals', [GoalsController::class, 'index']);
Route::get('add', [GoalsController::class, 'create']);
Route::resource('goals', GoalsController::class); //CRUD functions

//Routes for finances
Route::get('finances', [FinancesController::class, 'index']);
Route::get('plan', [FinancesController::class, 'create']);
Route::resource('finances', FinancesController::class); //CRUD functions

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
