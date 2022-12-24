<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CouleurController;
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

// route de la page d'accueil 
Route::get('/', [CollectionController::class, 'index'])->name('toutesCollections');

// routes des images
Route::get('/image', [ImageController::class, 'index'])->name('toutesImages');
Route::get('/image/new', [ImageController::class, 'create'])->name('createImage');
Route::post('/image/create', [ImageController::class, 'store'])->name('storeImage');
Route::get('/image/edit/{id}', [ImageController::class, 'edit'])->name('editImage');
Route::post('/image/update/{id}', [ImageController::class, 'update'])->name('updateImage');
Route::delete('/image/destroy/{id}', [ImageController::class, 'destroy'])->name('destroyImage');
Route::post('/image/color/add/{id}', [CouleurController::class, 'store'])->name('addCouleur');
Route::get('/image/{slugImage}', [ImageController::class, 'show'])->name('showImage');

// routes des collections
Route::get('/{slug}.json', [CollectionController::class, 'showJson'])->name('slugCollectionJson');
Route::get('/{slug}', [CollectionController::class, 'show'])->name('slugCollection');
