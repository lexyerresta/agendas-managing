<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\NarasumberController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\DashboardUtamaController;
use App\Http\Controllers\DashboardArticleController;
use App\Http\Controllers\DashboardPengumumanController;
use App\Http\Controllers\DashboardAgendaController;
use App\Http\Controllers\DashboardNarasumberController;
use App\Http\Controllers\DashboardKunjunganController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDivisionController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminReminderController;
use App\Http\Controllers\DashboardProfilBNNPController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------`
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// GLOBAL
Route::get('/', [ArticleController::class, 'index']);
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardUtamaController::class, 'dashboard'])->middleware('admin')->name('dashboard.index');
Route::get('/dashboard/articles/checkSlug', [DashboardArticleController::class, 'checkSlug']);
Route::get('/profil', [ProfilController::class, 'profil']);

// DETAIL PROFIL USER
Route::get('/userprofile', [UserProfileController::class, 'index'])->middleware('auth')->name('userprofile.index');
Route::get('/userprofile/edit/', [UserProfileController::class, 'edit'])->middleware('auth')->name('userprofile.edit');
Route::put('/userprofile/edit/{id}', [UserProfileController::class, 'update'])->middleware('auth')->name('userprofile.update');
Route::get('/userprofile/editpassword/', [UserProfileController::class, 'editPassword'])->middleware('auth')->name('userprofile.editpassword');
Route::put('/userprofile/editpassword/{id}', [UserProfileController::class, 'updatePassword'])->middleware('auth')->name('userprofile.updatepassword');
Route::get('/narasumber', [NarasumberController::class, 'narasumber'])->middleware('auth');
Route::post('/narasumber', [NarasumberController::class, 'store']);
Route::get('/kunjungan', [KunjunganController::class, 'kunjungan'])->middleware('auth');
Route::post('/kunjungan', [KunjunganController::class, 'store']);
Route::get('/categories', [CategoryController::class, 'category']);
Route::get('/{satu_pos_penuh:slug}', [ArticleController::class, 'tampil']);

//EKSTERNAL STATUS
Route::get('/narasumber/status', [NarasumberController::class, 'status'])->middleware('auth')->name('narasumber.status');
Route::get('/kunjungan/status', [KunjunganController::class, 'status'])->middleware('auth')->name('kunjungan.status');

// ADMIN AND STAFF
Route::resource('/dashboard/articles', DashboardArticleController::class)->middleware('admin');
Route::get('/dashboard/articlesarchive', [DashboardArticleController::class, 'indexarchive'])->middleware('admin')->name('dashboard.archive');
Route::resource('/dashboard/pengumumans', DashboardPengumumanController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/agendas', DashboardAgendaController::class)->except('show')->middleware('admin');
Route::put('/dashboard/narasumbers/{narasumber}/approve', [DashboardNarasumberController::class, 'approve'])->name('dashboard.narasumbers.approve')->middleware('admin');
Route::get('/dashboard/narasumbers/approved', [DashboardNarasumberController::class, 'approved'])->name('dashboard.narasumbers.approved')->middleware('admin');
Route::put('/dashboard/kunjungans/{kunjungan}/approve', [DashboardKunjunganController::class, 'approve'])->name('dashboard.kunjungans.approve')->middleware('admin');
Route::get('/dashboard/kunjungans/approved', [DashboardKunjunganController::class, 'approved'])->name('dashboard.kunjungans.approved')->middleware('admin');

Route::put('/dashboard/agendas/{agenda}/approve', [DashboardAgendaController::class, 'approve'])->name('dashboard.agendas.approve')->middleware('admin');
Route::get('/dashboard/agendas/approved', [DashboardAgendaController::class, 'approved'])->name('dashboard.agendas.approved')->middleware('admin');

Route::resource('/dashboard/narasumbers', DashboardNarasumberController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/kunjungans', DashboardKunjunganController::class)->except('show')->middleware('admin');

// ADMIN ONLY
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug']);
Route::resource('/dashboard/divisions', AdminDivisionController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/users', AdminUserController::class)->except('show')->middleware('admin');

// SEND EMAIL
Route::get('/dashboard/agendas/reminder', [AdminReminderController::class, 'index'])->middleware('admin');

// PDF
Route::get('/dashboard/agendas/approved/{id}', [DashboardAgendaController::class, 'Print'])->middleware('admin')->name('approved.print');

// DETAIL PROFIL ADMIN DAN STAFF
Route::get('/dashboard/profile', [DashboardProfileController::class, 'index'])->middleware('admin')->name('profile.index');
Route::get('/dashboard/profile/edit/', [DashboardProfileController::class, 'edit'])->middleware('admin')->name('profile.edit');
Route::put('/dashboard/profile/edit/{id}', [DashboardProfileController::class, 'update'])->middleware('admin')->name('profile.update');
Route::get('/dashboard/profile/editpassword/', [DashboardProfileController::class, 'editPassword'])->middleware('admin')->name('profile.editpassword');
Route::put('/dashboard/profile/editpassword/{id}', [DashboardProfileController::class, 'updatePassword'])->middleware('admin')->name('profile.updatepassword');

//EDIT PROFIL BNNP Bali
Route::get('/dashboard/profilbnnp/edit', [DashboardProfilBNNPController::class, 'edit'])->middleware('admin')->name('profilbnnp.edit');
Route::put('/dashboard/profilbnnp/edit/{id}', [DashboardProfilBNNPController::class, 'update'])->middleware('admin')->name('profilbnnp.update');

//ACTIVE OR NOT ACTIVE
Route::put('/dashboard/articles/{slug}/archive', [DashboardArticleController::class, 'archive'])->name('articles.archive');
Route::put('/dashboard/articles/{slug}/publish', [DashboardArticleController::class, 'publish'])->name('articles.publish');

//RECYCLE BIN NARASUMBER
Route::get('/dashboard/narasumbers-softdelete', [DashboardNarasumberController::class, 'softdelete'])->middleware('admin')->name('dashboard.narasumbers.softdelete');
Route::post('/dashboard/narasumbers/{id}/restore', [DashboardNarasumberController::class, 'restore'])->middleware('admin')->name('dashboard.narasumbers.restore');
Route::delete('/dashboard/narasumbers/{id}/forcedelete', [DashboardNarasumberController::class, 'forcedelete'])->middleware('admin')->name('dashboard.narasumbers.forcedelete');

//RECYCLE BIN KUNJUNGAN
Route::get('/dashboard/kunjungans-softdelete', [DashboardKunjunganController::class, 'softdelete'])->middleware('admin')->name('dashboard.kunjungans.softdelete');
Route::post('/dashboard/kunjungans/{id}/restore', [DashboardKunjunganController::class, 'restore'])->middleware('admin')->name('dashboard.kunjungans.restore');
Route::delete('/dashboard/kunjungans/{id}/forcedelete', [DashboardKunjunganController::class, 'forcedelete'])->middleware('admin')->name('dashboard.kunjungans.forcedelete');

//RECYCLE BIN DIVISI BNNP
// Route::get('/dashboard/divisions-softdelete', [AdminDivisionController::class, 'softdelete'])->middleware('admin')->name('dashboard.divisions.softdelete');
// Route::post('/dashboard/divisions/{id}/restore', [AdminDivisionController::class, 'restore'])->middleware('admin')->name('dashboard.divisions.restore');
// Route::delete('/dashboard/divisions/{id}/forcedelete', [AdminDivisionController::class, 'forcedelete'])->middleware('admin')->name('dashboard.divisions.forcedelete');

//TOGGLER AGENDA
Route::put('/dashboard/agendas/{id}/unactive', [DashboardAgendaController::class, 'unactive'])->name('agendas.unactive');
Route::put('/dashboard/agendas/{id}/active', [DashboardAgendaController::class, 'active'])->name('agendas.active');

//TOGGLER PENGUMUMAN
Route::put('/dashboard/pengumumans/{id}/unactive', [DashboardPengumumanController::class, 'unactive'])->name('pengumumans.unactive');
Route::put('/dashboard/pengumumans/{id}/active', [DashboardPengumumanController::class, 'active'])->name('pengumumans.active');

//TOGGLER USERS
Route::put('/dashboard/users/{id}/unactive', [AdminUserController::class, 'unactive'])->name('users.unactive');
Route::put('/dashboard/users/{id}/active', [AdminUserController::class, 'active'])->name('users.active');

//TOGGLER DIVISI BNNP
Route::put('/dashboard/divisions/{id}/unactive', [AdminDivisionController::class, 'unactive'])->name('divisions.unactive');
Route::put('/dashboard/divisions/{id}/active', [AdminDivisionController::class, 'active'])->name('divisions.active');

//TOGGLER CATEGORIES
Route::put('/dashboard/categories/{id}/unactive', [AdminCategoryController::class, 'unactive'])->name('categories.unactive');
Route::put('/dashboard/categories/{id}/active', [AdminCategoryController::class, 'active'])->name('categories.active');

//REKAP AGENDA
Route::get('/dashboard/agendas/approved-rekap', [DashboardAgendaController::class, 'rekap'])->middleware('admin')->name('approved.rekap');
