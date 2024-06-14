<?php

//ADMIN
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UsahaController;
use App\Http\Controllers\PeraturanPajakController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\KonsultanController;

//USER

//use App\Http\Controllers\QuizPajakController;
//use App\Http\Controllers\PenghasilanController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\KonsultanUserController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PelatihanUserController;
use App\Http\Controllers\Daftar_BeritaController;
use App\Http\Controllers\Kategori_UsahaController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\KuispajakController;
use App\Http\Controllers\MateriPelatihanController;
use App\Http\Controllers\DetailBeritaController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\FashionControler;
use App\Http\Controllers\OtomotifController;
use App\Http\Controllers\AgribisnisController;
use App\Http\Controllers\KosmetikController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KonsultanGuest2Controller;
use App\Http\Controllers\PajakdaerahController;
use App\Http\Controllers\PajakdaerahbatamController;
use App\Http\Controllers\ViewpdfController;

Route::get('/', function () {
    return view('welcome');
});


//ADMIN
Route::middleware(['web'])->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register.form');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Rute untuk usaha
Route::get('/user/demo1/list_usaha', [UsahaController::class, 'index'])->name('list_usaha');
Route::delete('/user/demo1/delete_usaha/{id}', [UsahaController::class, 'delete'])->name('delete_usaha');
Route::get('/user/demo1/edit_usaha/{id}', [UsahaController::class, 'edit'])->name('edit_usaha');
Route::post('/user/demo1/update_usaha/{id}', [UsahaController::class, 'update'])->name('update_usaha');
Route::get('/user/demo1/create_usaha', [UsahaController::class, 'create'])->name('create_usaha');
Route::post('/user/demo1/store_usaha', [UsahaController::class, 'store'])->name('store_usaha');

// Rute Untuk Berita
Route::get('/user/demo1/list_berita', [BeritaController::class, 'index'])->name('list_berita');
Route::get('/user/demo1/create_berita', [BeritaController::class, 'create'])->name('berita.create');
Route::post('/user/demo1/store_berita', [BeritaController::class, 'store'])->name('berita.store');
Route::get('/user/demo1/edit_berita/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
Route::put('/user/demo1/update_berita/{id}', [BeritaController::class, 'update'])->name('articles.update');
Route::delete('/user/demo1/delete_berita/{id}', [BeritaController::class, 'destroy'])->name('delete.berita');

//Rute untuk pajak
Route::get('/user/demo1/list_pajak', [PeraturanPajakController::class, 'index'])->name('list_pajak');
Route::get('/user/demo1/create_pajak', [PeraturanPajakController::class, 'create'])->name('pajak.create');
Route::post('/user/demo1/pajak_store', [PeraturanPajakController::class, 'store'])->name('pajak.store');
Route::get('/user/demo1/edit_pajak/{id}', [PeraturanPajakController::class, 'edit'])->name('edit.pajak');
Route::put('/user/demo1/update_pajak/{id}', [PeraturanPajakController::class, 'update'])->name('pajak.update');
Route::delete('/user/demo1/delete_pajak/{id}', [PeraturanPajakController::class, 'delete'])->name('delete.pajak');

// Rute untuk Kuis
Route::get('/user/demo1/list_kuis', [QuizController::class, 'listKuis'])->name('list_kuis');
Route::get('/user/demo1/create_kuis', [QuizController::class, 'createKuis'])->name('create_kuis');
Route::delete('/user/demo1/delete_kuis/{id}', [QuizController::class, 'delete'])->name('delete_kuis');
Route::post('/user/demo1/create_kuis', [QuizController::class, 'simpan'])->name('kuis.simpan');

Route::get('/user/demo1/edit_kuis/{id}', [QuizController::class, 'editKuis'])->name('edit_kuis');
Route::post('/user/demo1/update_kuis/{id}', [QuizController::class, 'updateKuis'])->name('update_kuis');

//Rute Untuk Soal
Route::get('/user/demo1/list_soal/{id}', [QuizController::class, 'listSoal'])->name('list_soal');
Route::get('/user/demo1/create_soal/{id}', [QuizController::class, 'createSoal'])->name('create_soal');
Route::post('/user/demo1/store_soal/{id}', [QuizController::class, 'storeSoal'])->name('store_soal');
Route::get('/user/demo1/edit_soal/{id}', [QuizController::class, 'editSoal'])->name('edit_soal');
Route::post('/user/demo1/update_soal/{id}', [QuizController::class, 'updateSoal'])->name('update_soal');
Route::delete('/user/demo1/delete_soal/{id}', [QuizController::class, 'deleteSoal'])->name('delete_soal');

//Rute Riwayat kuis
Route::get('/user/demo1/riwayat_kuis', [QuizController::class, 'riwayatKuis'])->name('riwayat_kuis');
Route::get('/user/demo1/evaluasi_kuis/{id}', [QuizController::class, 'evaluasiKuis'])->name('evaluasi_kuis');

// Rute untuk Pelatihan
Route::get('/user/demo1/list_pelatihan', [PelatihanController::class, 'listPelatihan'])->name('list_pelatihan');
Route::get('/pelatihan/{id}', [PelatihanController::class, 'edit'])->name('edit_pelatihan');
Route::post('/pelatihan/update', [PelatihanController::class, 'update'])->name('update_pelatihan');
Route::get('/user/demo1/create_pelatihan', [PelatihanController::class, 'create'])->name('create_pelatihan');
Route::post('/user/demo1/store_pelatihan', [PelatihanController::class, 'store'])->name('store_pelatihan');
Route::delete('/user/demo1/delete_pelatihan/{id}', [PelatihanController::class, 'deletePelatihan'])->name('delete_pelatihan');

// Rute untuk Konsultan
Route::get('/user/demo1/list_konsultan', [KonsultanController::class, 'index'])->name('list_konsultan');
Route::post('/user/demo1/create_konsultan', [KonsultanController::class, 'store'])->name('store_konsultan');
Route::get('/user/demo1/create_konsultan', [KonsultanController::class, 'create'])->name('create_konsultan');
Route::get('/user/demo1/detail_konsultan/{id}', [KonsultanController::class, 'detail'])->name('detail_konsultan');
Route::delete('/user/demo1/delete_konsultan/{id}', [KonsultanController::class, 'delete'])->name('konsultan.delete');

// Rute untuk Logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');




//USER

// Rute untuk login user
Route::get('user/login', [UserAuthController::class, 'showLoginForm'])->name('user.login.form');
Route::post('user/login', [UserAuthController::class, 'login'])->name('user.login');
Route::post('user/logout', [UserAuthController::class, 'logout'])->name('user.logout');

Route::get('user/register', [UserAuthController::class, 'showRegistrationForm'])->name('user.register.form');
Route::post('user/register', [UserAuthController::class, 'register'])->name('user.register');


//Quiz
//Route::get('/Quiz_pajak', [QuizPajakController::class, 'tampilkan']);

//Kalkulator
//Route::get('/penghasilan', [PenghasilanController::class, 'tampilkan']);

// Beranda
Route::get('/beranda', [IndexController::class, 'tampilkan'])->name('beranda');

// Layanan
Route::get('/layanan', [LayananController::class, 'tampilkan'])->name('layanan');

//Index Konsultasi
Route::get('/konsultan', [KonsultanUserController::class, 'tampilkan'])->name('konsultan');

//Pelatihan
Route::get('/pelatihan_sertifikasi',[PelatihanUserController::class, 'tampilkan'])->name('pelatihan');

//Kategori_Usaha
Route::get('/daftar_berita',[Daftar_BeritaController::class, 'tampilkan'])->name('daftar_berita');

//Daftar_Berita
Route::get('/kategori_usaha',[Kategori_UsahaController::class, 'tampilkan'])->name('kategori_usaha');

//Forum
Route::get('/forum',[ForumController::class, 'tampilkan'])->name('forum');

//Kuis pajak
Route::get('/kuis',[KuispajakController::class, 'tampilkan'])->name('kuis');

//Materi Pelatihan
Route::get('/materi_pelatihan',[MateriPelatihanController::class, 'tampilkan'])->name('materi');

// Detail_Berita
Route::get('/detail-berita', [DetailBeritaController::class, 'tampilkan'])->name('detail_berita');

//Kategori
Route::get('/kuliner', [KulinerController::class, 'tampilkan'])->name('kuliner');
Route::get('/fashion', [FashionControler::class, 'tampilkan'])->name('fashion');
Route::get('/otomotif', [OtomotifController::class, 'tampilkan'])->name('otomotif');
Route::get('/agribisnis', [AgribisnisController::class, 'tampilkan'])->name('agribisnis');
Route::get('/kosmetik', [KosmetikController::class, 'tampilkan'])->name('kosmetik');
Route::get('/event', [EventController::class, 'tampilkan'])->name('event');

//Konsultan Guest
Route::get('/konsultansguest2', [KonsultanGuest2Controller::class, 'tampilkan'])->name('konsultanguest2');

//Peraturan
Route::get('/pajakdaerah', [PajakdaerahController::class, 'tampilkan'])->name('pajak_daerah');
Route::get('/pajakdaerahbatam', [PajakdaerahbatamController::class, 'tampilkan'])->name('pajak_daerah_batam');

//PDF
Route::get('/viewpdf', [ViewpdfController::class, 'tampilkan'])->name('viewpdf');



