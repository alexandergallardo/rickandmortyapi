<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\EpisodeController;

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
    return redirect()->route('characters.index');
});

Route::get('/characters', [CharacterController::class, 'showAll'])->name('characters.index');
Route::get('/characters/{id}', [CharacterController::class, 'showDetail'])->name('characters.detail');
Route::get('/episodes/{id}', [EpisodeController::class, 'showDetail'])->name('episodes.detail');