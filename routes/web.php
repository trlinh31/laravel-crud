<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::prefix('/students')->group(function () {
  Route::get('/add', [HomeController::class, 'add'])->name('students.add');
  Route::post('/add', [HomeController::class, 'postAdd'])->name('students.postAdd');
  Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('students.edit');
  Route::post('/edit/{id}', [HomeController::class, 'postEdit'])->name('students.postEdit');
  Route::get('/delete/{id}', [HomeController::class, 'postDelete'])->name('students.postDelete');
});
