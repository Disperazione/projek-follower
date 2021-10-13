<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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
    return view('user.index');
});

<<<<<<< Updated upstream
Route::get('/user', function ( ) {
    
});

Route::get('/user', [userController::class, 'index'])->name('user.index');
=======
>>>>>>> Stashed changes

// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });
<<<<<<< Updated upstream
=======

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::post('/getHarga', [App\Http\Controllers\HomeController::class, 'getHarga']);
Route::post('/getPlus', [App\Http\Controllers\HomeController::class, 'getPlus']);
>>>>>>> Stashed changes
