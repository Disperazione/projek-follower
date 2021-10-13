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

Route::get('/', function () { return view('user.index'); });

Route::get('/dashboard', function () { return view('admin.dashboard'); });
Route::get('/order', function () { return view('admin.order.index'); });

Route::get('/layanan', function () { return view('admin.layanan.index'); });
Route::get('/addlayanan', function () { return view('admin.layanan.addlayanan'); });


Route::get('/user', function ( ) {

});

Route::get('/user', [userController::class, 'index'])->name('user.index');

// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });
