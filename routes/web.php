<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListSoalController;
use App\Http\Controllers\OperatorController;


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


//Login
Route::controller(LoginController::class)->group(function () {
	Route::get('login', 'login')->name('login');
	Route::post('login', 'auth')->name('login.auth');
	Route::get('register', 'register')->name('register');
	Route::post('register', 'store')->name('login.store');
});


// Home
Route::controller(HomeController::class)->group(function () {
	Route::get('home', 'index')->name('home');
	Route::post('keranjang/{id}', 'doAddCart')->name('doAddCart');
	Route::post('checkout', 'checkout')->name('checkout');
	Route::get('detail/{id}', 'detail')->name('detail_produk');
	Route::get('cart', 'cart')->name('cart');
	Route::post('cart/{id}', 'cartDestroy')->name('cart.cancel');
});

//public
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//Admin
Route::controller(AdminController::class)->group(function () {
	Route::get('layout', 'layout');
	Route::prefix('admin')->group(function () {
		Route::get('dashboard', 'index')->name('dashboard');
		Route::get('produk', 'produk')->name('produks');
		Route::get('add-produk', 'addProduk')->name('addProduk');
	});

	// login kuis
	Route::middleware(['guest'])->group(function () {
		//login guru
		Route::get('/kuis/guru/login', 'guru_login')->name('guru.login');
		Route::post('/kuis/guru/login', 'guru_auth')->name('guru.auth');
		//login penjawab kuis
		Route::controller(KuisController::class)->group(function () {
			Route::get('kuis/login', 'login')->name('kuis.login');
			Route::post('kuis/{token}/login', 'auth')->name('kuis.login_auth');
			Route::get('kuis/{token}/register', 'register')->name('kuis.register');
		});
		//login operator
		Route::prefix('operator')->group(function () {
			Route::controller()->group(function () {
				Route::get('login', 'login')->name('kuis.operator.login');
			});
		});
	});
	//Operator
	Route::controller(OperatorController::class)->group(function () {
		Route::prefix('kuis/operator')->group(function () {
			Route::get('/', 'index')->name('kuis.operator.index');
			Route::get('jurusan', 'jurusan')->name('kuis.operator.jurusan');
			Route::post('jurusan/store', 'store')->name('kuis.operator.jurusan.store');
			Route::delete('{id}/jurusan/delete', 'destroy')->name('kuis.operator.jurusan.destroy');
		});
	});
	//guru
	Route::middleware(['guru', 'auth'])->group(function () {
		Route::prefix('/kuis/guru')->group(function () {
			//guru -> mata pelajaran
			Route::prefix('/mata-pelajaran')->group(function () {
				Route::controller(MataPelajaranController::class)->group(function () {
					Route::get('/', 'index')->name('guru.mapel.index');
					Route::post('/add', 'store')->name('guru.mapel.store');
					Route::delete('{id}/delete', 'destroy')->name('guru.mapel.destroy');
					Route::get('{id}/soal/{mapel}/mapel', 'soal')->name('guru.mapel.soal');
					Route::post('{token}/set-waktu', 'setWaktu')->name('guru.mapel.setWaktu');
				});
			});

			// guru -> atur profile
			Route::controller(ProfileController::class)->group(function () {
				Route::post('{guru_id}/profile/do', 'doSimpanPerubahan')->name('guru.myProfile.doSimpan');
			});

			//guru -> soal
			Route::controller(ListSoalController::class)->group(function () {
				Route::get('{id}/{bool}/list-soal', 'status')->name('guru.listSoal.status');
			});	
			// index
			Route::get('/', 'guru')->name('guru.index');
			Route::get('e-monitoring', 'guru_eMonitoring')->name('kuis.e-monitoring');
			Route::get('{id}/profile', 'guru_myProfile')->name('guru.myProfile');
			Route::get('{id}/profile/atur-data-diri', 'guru_aturDataDiri')->name('guru.aturDataDiri');
			Route::get('{id}/soal', 'guru_mySoal')->name('guru.mySoal');
		});
	});
});


// ini adalah project untuk kuis
Route::controller(KuisController::class)->group(function () {
	Route::prefix('kuis')->group(function () {
		Route::get('/task/{token}', 'kerjakanSoal')->name('kerjakanSoal');
		Route::get('home', 'index')->name('kuis.home');
		Route::get('buat-soal', 'addCardSoal')->name('kuis.buat-soal');
		Route::post('buat-soal/do', 'doSimpanSoal')->name('kuis.doBuatSoal');
		Route::post('buat-soal', 'countSoal')->name('kuis.CountSoal');
		Route::post('submit-soal/{total_soal}/{token}/{time}', 'simpanJawaban')->name('kuis.simpanJawaban');
	});
});
