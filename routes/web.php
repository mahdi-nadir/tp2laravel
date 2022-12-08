<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CollectionController;

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

Route::get('/', [CollectionController::class, 'index'])->name('toutesCollections');

Route::get('/image', [ImageController::class, 'index'])->name('toutesImages');
Route::get('/image/{slugImage}', [ImageController::class, 'show'])->name('slugImage');


Route::get('/{slug}.json', [CollectionController::class, 'showJson'])->name('slugCollectionJson');
Route::get('/{slug}', [CollectionController::class, 'show'])->name('slugCollection');
