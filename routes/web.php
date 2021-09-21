<?php

use App\Http\Controllers\ActivateIndexController;
use App\Http\Controllers\ActivateStoreController;
use App\Http\Controllers\InviteCodeIndexController;
use App\Http\Controllers\InviteCodeStoreController;
use Illuminate\Http\Request as RequestAlias;
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
});




Route::group(['middleware'=>['auth','activated']], function (){
    Route::get('/dashboard', function (RequestAlias $request) {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/invites', InviteCodeIndexController::class)->name('invites');
    Route::post('/invites', InviteCodeStoreController::class)->name('invites');
});

Route::get('/activate', ActivateIndexController::class)->name('activate');
Route::post('/activate', ActivateStoreController::class)->name('activate.store');

require __DIR__.'/auth.php';
