<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

// Redirect root ke /home
Route::get('/', fn() => redirect()->route('home'));

// Halaman publik
Route::controller(SiteController::class)->group(function () {
    Route::get('/home', 'home')->name('home');
    Route::get('/struktur', 'struktur')->name('struktur');
    Route::get('/layanan', 'layanan')->name('layanan');
    Route::get('/lokasi', 'lokasi')->name('lokasi');
    Route::get('/visi', 'visi')->name('visi');
    Route::get('/jadwal', 'jadwal')->name('jadwal');
});

// ================= AUTH ===================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ================= DASHBOARD =================
Route::prefix('dashboard')->middleware('auth')->group(function () {

    // Halaman umum dashboard
    Route::get('/', fn() => view('dashboard.index'))
        ->name('dashboard');

    // Administrator
    Route::get('/admin', fn() => view('dashboard.admin.index'))
        ->middleware('role:administrator')
        ->name('dashboard.admin');

    Route::get('/admin/data-master', fn() => view('dashboard.admin.data_master'))
        ->middleware('role:administrator')
        ->name('dashboard.admin.data');

    // Dokter
    Route::get('/dokter', fn() => view('dashboard.dokter.index'))
        ->middleware('role:dokter')
        ->name('dashboard.dokter');

    // Perawat
    Route::get('/perawat', fn() => view('dashboard.perawat.index'))
        ->middleware('role:perawat')
        ->name('dashboard.perawat');

    // Pemilik
    Route::get('/pemilik', fn() => view('dashboard.pemilik.index'))
        ->middleware('role:pemilik')
        ->name('dashboard.pemilik');
});

// ================= ADMIN CRUD =================
Route::middleware(['auth', 'role:administrator'])->prefix('admin')->group(function () {
    Route::resource('data-user', DataUserController::class)->names('admin.data-user');
    Route::resource('manajemen-role', RoleUserController::class)->names('admin.role-user');
    Route::resource('jenis-hewan', JenisHewanController::class)->names('admin.jenis-hewan');
    Route::resource('ras-hewan', RasHewanController::class)->names('admin.ras-hewan');
    Route::resource('pemilik', PemilikController::class)->names('admin.pemilik');
    Route::resource('pet', PetController::class)->names('admin.pet');
    Route::resource('kategori', KategoriController::class)->names('admin.kategori');
    Route::resource('kategori-klinis', KategoriKlinisController::class)->names('admin.kategori-klinis');
    Route::resource('kode-tindakan-terapi', KodeTindakanTerapiController::class)->names('admin.kode-tindakan-terapi');
    Route::resource('rekam-medis', RekamMedisController::class)->names('admin.rekam-medis');
});

// ================= UTILITAS =================
Route::get('/cek-koneksi', [CekKoneksiController::class, 'index'])->name('cek.koneksi');
Route::get('/cek-data', [CekKoneksiController::class, 'data'])->name('cek.data');
