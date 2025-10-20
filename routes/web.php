<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DataUserController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\CekKoneksiController;
use App\Http\Controllers\Admin\JenisHewanController;
use App\Http\Controllers\Admin\RasHewanController;
use App\Http\Controllers\Admin\PemilikController;
use App\Http\Controllers\Admin\PetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Semua route utama web untuk project RSHP UNAIR
|--------------------------------------------------------------------------
*/

// 🔹 Redirect root ke halaman home
Route::get('/', fn() => redirect()->route('home'));

// 🔹 Halaman publik (non-dashboard)
Route::get('/home', [SiteController::class, 'home'])->name('home');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/lokasi', [SiteController::class, 'lokasi'])->name('lokasi');
Route::get('/visi', [SiteController::class, 'visi'])->name('visi');
Route::get('/jadwal', [SiteController::class, 'jadwal'])->name('jadwal');

// 🔹 Auth (Login, Register, Logout)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔹 Dashboard utama & per role
Route::prefix('dashboard')->group(function () {
    Route::get('/', fn() => view('dashboard.index'))->name('dashboard');
    Route::get('/admin', fn() => view('dashboard.admin.index'))->name('dashboard.admin');
    Route::get('/admin/data-master', fn() => view('dashboard.admin.data_master'))->name('dashboard.admin.data');

    Route::get('/dokter', fn() => view('dashboard.dokter.index'))->name('dashboard.dokter');
    Route::get('/perawat', fn() => view('dashboard.perawat.index'))->name('dashboard.perawat');
    Route::get('/pemilik', fn() => view('dashboard.pemilik.index'))->name('dashboard.pemilik');
});

// =====================================================
// 🔹 ADMIN ROUTES (Data Master & CRUD)
// =====================================================

// ✅ Data User
Route::prefix('admin/data-user')->name('admin.data_user.')->group(function () {
    Route::get('/', [DataUserController::class, 'index'])->name('index');
    Route::get('/create', [DataUserController::class, 'create'])->name('create');
    Route::post('/store', [DataUserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [DataUserController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [DataUserController::class, 'update'])->name('update');
    Route::get('/reset/{id}', [DataUserController::class, 'reset'])->name('reset');
});

// ✅ Role User
Route::prefix('admin/manajemen-role')->name('admin.role_user.')->group(function () {
    Route::get('/', [RoleUserController::class, 'index'])->name('index');
    Route::post('/store', [RoleUserController::class, 'store'])->name('store');
    Route::get('/set-active/{iduser}/{idrole}', [RoleUserController::class, 'setActive'])->name('setActive');
    Route::get('/deactivate/{iduser}/{idrole}', [RoleUserController::class, 'deactivate'])->name('deactivate');
    Route::get('/destroy/{iduser}/{idrole}', [RoleUserController::class, 'destroy'])->name('destroy');
});

// ✅ Jenis Hewan
Route::prefix('admin/jenis-hewan')->name('admin.jenis_hewan.')->group(function () {
    Route::get('/', [JenisHewanController::class, 'index'])->name('index');
    Route::get('/create', [JenisHewanController::class, 'create'])->name('create');
    Route::post('/store', [JenisHewanController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [JenisHewanController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [JenisHewanController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [JenisHewanController::class, 'destroy'])->name('destroy');
});

// ✅ Ras Hewan
Route::prefix('admin/ras-hewan')->name('admin.ras_hewan.')->group(function () {
    Route::get('/', [RasHewanController::class, 'index'])->name('index');
    Route::get('/create', [RasHewanController::class, 'create'])->name('create');
    Route::post('/store', [RasHewanController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [RasHewanController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [RasHewanController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [RasHewanController::class, 'destroy'])->name('destroy');
});

// ✅ Data Pemilik (pakai nama admin.pemilik.*)
Route::prefix('admin/pemilik')->name('admin.pemilik.')->group(function () {
    Route::get('/', [PemilikController::class, 'index'])->name('index');
    Route::get('/create', [PemilikController::class, 'create'])->name('create');
    Route::post('/store', [PemilikController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [PemilikController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [PemilikController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [PemilikController::class, 'destroy'])->name('destroy');
});

// ✅ Data Pet (pakai nama admin.pet.*)
Route::prefix('admin/pet')->name('admin.pet.')->group(function () {
    Route::get('/', [PetController::class, 'index'])->name('index');
    Route::get('/create', [PetController::class, 'create'])->name('create');
    Route::post('/store', [PetController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [PetController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [PetController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [PetController::class, 'destroy'])->name('destroy');
});

// Data Kategori
Route::prefix('admin/kategori')->name('admin.kategori.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\Admin\KategoriController::class, 'create'])->name('create');
    Route::post('/store', [\App\Http\Controllers\Admin\KategoriController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [\App\Http\Controllers\Admin\KategoriController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [\App\Http\Controllers\Admin\KategoriController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [\App\Http\Controllers\Admin\KategoriController::class, 'destroy'])->name('destroy');
});

// Data Kategori Klinis
Route::prefix('admin/kategori-klinis')->name('admin.kategori_klinis.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\Admin\KategoriKlinisController::class, 'create'])->name('create');
    Route::post('/store', [\App\Http\Controllers\Admin\KategoriKlinisController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [\App\Http\Controllers\Admin\KategoriKlinisController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [\App\Http\Controllers\Admin\KategoriKlinisController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [\App\Http\Controllers\Admin\KategoriKlinisController::class, 'destroy'])->name('destroy');
});


// 🔹 Cek koneksi database & data
Route::get('/cek-koneksi', [CekKoneksiController::class, 'index'])->name('cek.koneksi');
Route::get('/cek-data', [CekKoneksiController::class, 'data'])->name('cek.data');
