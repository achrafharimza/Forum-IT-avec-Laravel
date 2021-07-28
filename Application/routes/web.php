<?php

use App\Http\Controllers\SujetController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [SujetController::class, 'index'])->name('sujet.index');
Route::get('/mysujet', [SujetController::class, 'mysujet'])->name('mysujet');

Route::resource('sujets', SujetController::class)->except(['index']);
Route::resource('/admin/users', UsersController::class)->middleware('isadmin');
Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/comments/{sujet}', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');



