<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\albumController;
use App\Http\Controllers\bandsController;
use App\Http\Controllers\song_albumController;

use App\Http\Controllers\album_songController;
use App\Http\Controllers\NummerController;
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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';






//Route::get('/', [NummerController::class,'index']);

Route::get('/songs', [NummerController::class,'index'])->name('songs');


Route::get('/songs/create', [NummerController::class, 'create'])->Name('songs.create')->middleware('auth');

Route::get('/songs/{id}', [NummerController::class, 'show']);

Route::get('/songs/{id}/edit', [NummerController::class, 'edit'])->Name('songs.edit')->middleware('auth');
Route::put('/songs/{id}', [NummerController::class, 'update'])->Name('songs.update');


Route::get('/songs/edit', function () {
    return view('songs.edit');
});
Route::post('/songs',[NummerController::class ,'store'])->name('song.store');

Route::get('songs/delete/{id}',[NummerController::class, 'destroy'])->Name('songs.destroy');

/*albums*/




Route::get('/albums/create', [albumController::class,'create'])->name('albums.create')->middleware('auth');
Route::post('/albums', [albumController::class,'store'])->name('albums.store');

Route::get('/albums/{id}', [albumController::class, 'show']);
Route::get('/albums', [albumController::class,'index'])->name('albums.index');

Route::put('/albums/{id}', [albumController::class, 'update'])->Name('albums.update');
Route::get('/albums/{id}/edit', [albumController::class, 'edit'])->Name('albums.edit')->middleware('auth');


Route::delete('/albums/{id}',[albumController::class, 'destroy'])->Name('albums.destroy');

/*bands*/


Route::get('/bands/create', [bandsController::class,'create'])->name('bands.create');
Route::post('/bands', [bandsController::class,'store'])->name('bands.store');

Route::get('/bands/{id}', [bandsController::class, 'show']);
Route::get('/bands', [bandsController::class,'index'])->name('bands.index');

Route::put('/bands/{id}', [bandsController::class, 'update'])->Name('bands.update');
Route::get('/bands/{id}/edit', [bandsController::class, 'edit'])->Name('bands.edit')->middleware('auth');

Route::delete('/bands/{id}',[bandsController::class, 'destroy'])->Name('bands.destroy');


//routes voor albumsongs en songsalbum

Route::post('/song/{id}/album',[album_songController::class, 'store'])->Name('album_song.store');
Route::post('/album/{id}/song',[song_albumController::class, 'store'])->Name('song_album.store');



