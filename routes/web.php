<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');


Auth::routes();



// Route::get('/login', 'LoginController@index')->name('login');
Route::get('/admin/profil', 'AdminProfilController@index')->name('admin.profil.index');


Route::get('/admin/praktikum', 'AdminPraktikumController@index')->name('admin.praktikum');

Route::get('/admin/absensi', 'AdminAbsenController@index')->name('admin.absensi.index');
Route::post('/admin/absensi/absen', 'AdminAbsenController@absen')->name('admin.absensi.absen');

Route::get('/admin/berita-acara', 'AdminBeritaAcaraController@index')->name('admin.berita-acara.index');
Route::get('/admin/berita-acara/{id}', 'AdminBeritaAcaraController@show')->name('admin.berita-acara.show');
Route::get('/admin/berita-acara/{id}/create', 'AdminBeritaAcaraController@create')->name('admin.berita-acara.create');
Route::post('/admin/berita-acara/{id}/store', 'AdminBeritaAcaraController@store')->name('admin.berita-acara.store');
Route::get('/admin/berita-acara/{id}/{bapid}', 'AdminBeritaAcaraController@edit')->name('admin.berita-acara.edit');
Route::put('/admin/berita-acara/{id}/update/{bapid}', 'AdminBeritaAcaraController@update')->name('admin.berita-acara.update');


Route::resource('/user', 'AdminUserController');