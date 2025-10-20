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
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KategoriKlinisController;    
use App\Http\Controllers\Admin\KodeTindakanTerapiController;
use App\Http\Controllers\Admin\RekamMedisController;

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
Route::prefix('admin/data-user')->name('admin.data-user.')->group(function () {
    Route::get('/', [DataUserController::class, 'index'])->name('index');
    Route::get('/create', [DataUserController::class, 'create'])->name('create');
    Route::post('/store', [DataUserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [DataUserController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [DataUserController::class, 'update'])->name('update');
    Route::get('/reset/{id}', [DataUserController::class, 'reset'])->name('reset');
});

// ✅ Role User
Route::prefix('admin/manajemen-role')->name('admin.role-user.')->group(function () {
    Route::get('/', [RoleUserController::class, 'index'])->name('index');
    Route::post('/store', [RoleUserController::class, 'store'])->name('store');
    Route::get('/set-active/{iduser}/{idrole}', [RoleUserController::class, 'setActive'])->name('setActive');
    Route::get('/deactivate/{iduser}/{idrole}', [RoleUserController::class, 'deactivate'])->name('deactivate');
    Route::get('/destroy/{iduser}/{idrole}', [RoleUserController::class, 'destroy'])->name('destroy');
});

// ✅ Jenis Hewan
Route::prefix('admin/jenis-hewan')->name('admin.jenis-hewan.')->group(function () {
    Route::get('/', [JenisHewanController::class, 'index'])->name('index');
    Route::get('/create', [JenisHewanController::class, 'create'])->name('create');
    Route::post('/store', [JenisHewanController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [JenisHewanController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [JenisHewanController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [JenisHewanController::class, 'destroy'])->name('destroy');
});

// ✅ Ras Hewan
Route::prefix('admin/ras-hewan')->name('admin.ras-hewan.')->group(function () {
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
    Route::get('/', [KategoriController::class, 'index'])->name('index');
    Route::get('/create', [KategoriController::class, 'create'])->name('create');
    Route::post('/store', [KategoriController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [KategoriController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [KategoriController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [KategoriController::class, 'destroy'])->name('destroy');
});

// Data Kategori Klinis
Route::prefix('admin/kategori-klinis')->name('admin.kategori-klinis.')->group(function () {
    Route::get('/', [KategoriKlinisController::class, 'index'])->name('index');
    Route::get('/create', [KategoriKlinisController::class, 'create'])->name('create');
    Route::post('/store', [KategoriKlinisController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [KategoriKlinisController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [KategoriKlinisController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [KategoriKlinisController::class, 'destroy'])->name('destroy');
});

Route::prefix('admin/kode-tindakan-terapi')->name('admin.kode-tindakan-terapi.')->group(function () {
    Route::get('/', [KodeTindakanTerapiController::class, 'index'])->name('index');
    Route::get('/create', [KodeTindakanTerapiController::class, 'create'])->name('create');
    Route::post('/store', [KodeTindakanTerapiController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [KodeTindakanTerapiController::class, 'edit'])->name('edit');
    Route::put('/{id}', [KodeTindakanTerapiController::class, 'update'])->name('update');
    Route::delete('/{id}', [KodeTindakanTerapiController::class, 'destroy'])->name('destroy');
});

    // --- Data Master: Rekam Medis ---
Route::prefix('admin/rekam-medis')->name('admin.rekam-medis.')->group(function () {
    Route::get('/', [RekamMedisController::class, 'index'])->name('index');
    Route::get('/create', [RekamMedisController::class, 'create'])->name('create');
    Route::post('/store', [RekamMedisController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [RekamMedisController::class, 'edit'])->name('edit');
    Route::put('/{id}', [RekamMedisController::class, 'update'])->name('update');
    Route::delete('/{id}', [RekamMedisController::class, 'destroy'])->name('destroy');
});

// 🔹 Cek koneksi database & data
Route::get('/cek-koneksi', [CekKoneksiController::class, 'index'])->name('cek.koneksi');
Route::get('/cek-data', [CekKoneksiController::class, 'data'])->name('cek.data');
