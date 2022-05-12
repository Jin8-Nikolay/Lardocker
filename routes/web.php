<?php

use App\Http\Controllers\HomeController;
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
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(HomeController::class)->group(function () {
    Route::delete('/delete-todo/{id}', 'delete')->name('delete-todo');
    Route::put('/complete-todo/{id}', 'complete')->name('complete-todo');
//    Route::get('/complete-todo/{id}', function(Illuminate\Http\Request $request) {
//
//        App\Events\TodoStatusUpdate::dispatch($request->all());
//
//    });
    Route::post('/create-todo', 'create')->name('create-todo');
    Route::get('/todo-list', 'getList')->name('todo-list');
});
