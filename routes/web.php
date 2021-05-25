<?php

use App\Http\Controllers\SongController;
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

Route::get('/', function () {
    return view('welcome');
    //return view('display');
});

Route::post('/insert',[ SongController::class,'insertSong'])->name('insert');;
Route::get('/display',[ SongController::class,'listSong'])->name('display');;
Route::get('/delete/{idx}',  [SongController::class,'deleteSong'])->name('delete');

//

//Route::middleware(['auth:sanctum', 'verified'])->get('/display',[ SongController::class,'listSong'])->name('display');;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


