<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Models\OrderLayanan;
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
        Route::middleware('checkRole:admin')->group(function () {
            Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
            Route::get('/order', [AdminController::class, 'order'])->name('admin.order');
            Route::post('/order/store', [AdminController::class, 'store'])->name('admin.store');

            Route::get('/dataorder', [Admincontroller::class, 'dataorder'])->name('admin.dataorder');
            Route::get('/dataorder/detail-singular/{id}', [Admincontroller::class, 'singular'])->name('admin.dataorder.singular');

            Route::get('/layanan', [AdminController::class, 'layanan'])->name('admin.layanan');
            Route::get('/addlayanan', [AdminController::class, 'addLayanan'])->name('admin.addLayanan');
            Route::post('/getStatus', [AdminController::class, 'getStatus']);

            Route::get('/regisuser', [Admincontroller::class, 'regisUser'])->name('admin.regis');
            Route::get('/adduser', [Admincontroller::class, 'addUser'])->name('admin.adduser');
            Route::post('/adduser/store', [Admincontroller::class, 'storeUser'])->name('admin.adduser.store');
            Route::get('/regisuser/detail/{id}', [Admincontroller::class, 'detailUser'])->name('admin.regis.detail');
            Route::post('/regisuser/detail/update/{id}', [Admincontroller::class, 'updateUser'])->name('admin.regis.detail.update');

            Route::get('/laporan/makanan', [Admincontroller::class, 'laporanmakanan'])->name('admin.laporan.makanan');
            Route::get('/laporan/followers', [Admincontroller::class, 'laporanfollowers'])->name('admin.laporan.followers');
            Route::get('laporan/getDetail/{id}', [Admincontroller::class, 'detail']);
            Route::get('/export', [Admincontroller::class, 'exportExcel'])->name('admin.export');
            Route::get('/data-siswa', [Admincontroller::class, 'dataSiswa'])->name('admin.siswa.index');
            Route::get('/data-siswa/tambah', [Admincontroller::class, 'addSiswa'])->name('admin.siswa.add');
            Route::post('/data-siswa/tambah/store', [Admincontroller::class, 'storeSiswa'])->name('admin.siswa.store');
        });
    });
});

Route::get('/', [AdminController::class, 'login'])->name('user.login')->middleware('guest');


Route::prefix('user')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
        Route::middleware('checkRole:user')->group(function () {
            Route::post('/dashboard/store', [AdminController::class, 'storeLayanan'])->name('admin.user.store');
            Route::get('/layanan', [AdminController::class, 'layanan'])->name('user.layanan');
            Route::get('/dataorder', [Admincontroller::class, 'usdataorder'])->name('user.dataorder');
        });
        Route::middleware('checkRole:siswa')->group(function () {
            Route::middleware('auth')->group(function () {
                Route::get('/order', [AdminController::class, 'order'])->name('user.order');
                Route::post('/order/store', [AdminController::class, 'store'])->name('admin.store');
                Route::get('/laporan/makanan', [Admincontroller::class, 'sislprmkn'])->name('user.laporan.makanan');
                Route::get('/export', [Admincontroller::class, 'exportExcelUser'])->name('user.export');
            });
        });
    });
});

Route::get('/user', [userController::class, 'index'])->name('user.index');
Route::post('/getLayanan', [userController::class, 'getLayanan']);
Route::post('/getDesk', [userController::class, 'getDesk']);
Route::post('/getLG', [userController::class, 'getHarga']);
Route::post('/getMin', [userController::class, 'getMin']);
Route::post('/getMax', [userController::class, 'getMax']);
Route::post('/user/store', [userController::class, 'store'])->name('user.store');
Route::get('/user/pembayaran/{pembayaran:slug}', [UserController::class, 'bayar'])->name('user.bayar');
Route::post('/user/update/{id}', [userController::class, 'update'])->name('user.update');

// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('/home/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::post('/getHarga', [App\Http\Controllers\HomeController::class, 'getHarga']);
Route::post('/getPlus', [App\Http\Controllers\HomeController::class, 'getPlus']);

Route::get('/user', function () {
});

Route::get('/user', [userController::class, 'index'])->name('user.index');
