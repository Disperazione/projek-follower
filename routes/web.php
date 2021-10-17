<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;

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

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'login'])->name('admin.login')->middleware('guest');
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/order', [AdminController::class, 'order'])->name('admin.order');
        Route::get('/dataorder',[Admincontroller::class, 'dataorder'])->name('admin.dataorder');

        Route::get('/layanan', [AdminController::class, 'layanan'])->name('admin.layanan');
        Route::get('/addlayanan', [AdminController::class, 'addLayanan'])->name('admin.addLayanan');

    });
});

Route::get('/user', [userController::class, 'index'])->name('user.index');
Route::post('/getLayanan', [userController::class, 'getLayanan']);
Route::post('/getDesk', [userController::class, 'getDesk']);
Route::post('/getLG', [userController::class, 'getHarga']);
Route::post('/getMin', [userController::class, 'getMin']);
Route::post('/getMax', [userController::class, 'getMax']);
Route::post('/user/store', [userController::class, 'store'])->name('user.store');
Route::get('/user/pembayaran', [UserController::class, 'bayar']);

// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::post('/getHarga', [App\Http\Controllers\HomeController::class, 'getHarga']);
Route::post('/getPlus', [App\Http\Controllers\HomeController::class, 'getPlus']);

Route::get('/user', function () {
});

Route::get('/user', [userController::class, 'index'])->name('user.index');
