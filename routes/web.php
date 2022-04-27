<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\FileEncryptionController;
use App\Http\Controllers\StorageFileController;
use App\Http\Controllers\UserController;
use App\Models\Hobby;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('index', [AuthController::class, 'index']); 
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

// CRUD
Route::get('data-pegawai',[PegawaiController::class, 'showData'])->name('showData')->middleware('permission:Data Pegawai');
Route::get('input-pegawai', [PegawaiController::class, 'inputData'])->name('inputData')->middleware('permission:Create Pegawai');
Route::post('store-pegawai', [PegawaiController::class, 'storeData'])->name('storeData')->middleware('permission:Create Pegawai');
Route::get('edit-pegawai/{id}', [PegawaiController::class, 'editData'])->name('editData')->middleware('role:admin|member');
Route::post('update-pegawai', [PegawaiController::class, 'updateData'])->name('updateData')->middleware('role:admin|member');
Route::get('hapus-pegawai/{id}', [PegawaiController::class, 'hapusData'])->name('hapusData')->middleware('role:admin|member');

// Hobbies CRUD
Route::get('data-hobbies', [HobbyController::class, 'showData'])->name('dataHobbies');
Route::get('form-hobbies', [HobbyController::class, 'viewForm'])->name('formHobbies');
Route::post('store-hobbies', [HobbyController::class, 'storeData'])->name('storeHobbies');

// User
Route::get('data-user',[UserController::class, 'showData'])->name('dataUsers')->middleware('role:admin');
Route::get('edit-user/{id}',[UserController::class, 'editData'])->name('editUser')->middleware('role:admin');
Route::post('store-user',[UserController::class, 'storeData'])->name('storeUser')->middleware('role:admin');


// Relation
Route::get('onetoone/jabatan', [JabatanController::class, 'OneToOne'])->name('OneToOneJabatan');
Route::get('onetoone/pegawai', PegawaiController::class)->name('OneToOnePegawai');

Route::get('onetomany/jabatan', [JabatanController::class, 'OneToMany'])->name('OneToManyJabatan');
Route::get('onetomany/pegawai', PegawaiController::class)->name('OneToManyPegawai');

Route::get('manytomany/form-pegawai', [PegawaiController::class, 'viewFormMM'])->name('formMMPegawai');
Route::post('manytomany/store-pegawai', [PegawaiController::class, 'storeMM'])->name('storeMMPegawai');
Route::get('manytomany/pegawai', [PegawaiController::class, 'manytomany'])->name('ManyToManyPegawai');
Route::get('manytomany/hobbies', HobbyController::class)->name('manyToManyHobbies');

// File Encryption
Route::get('/form-upload', [FileEncryptionController::class, 'index'])->name('formUpload');
Route::post('/upload', [FileEncryptionController::class, 'store'])->name('file');
Route::get('/files/{filename}', [FileEncryptionController::class, 'download'])->name('download');

// Access Storage
Route::get('image/{filename}', [StorageFileController::class, 'getStorageImage'])->name('image.displayImage');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
