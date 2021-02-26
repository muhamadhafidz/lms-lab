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



Route::get('/login', 'LoginController@index')->name('login');
Route::get('/admin/profil', 'AdminProfilController@index')->name('admin.profil');
Route::get('/admin/praktikum', 'AdminPraktikumController@index')->name('admin.praktikum');
Route::get('/admin/absen', 'AdminAbsenController@index')->name('admin.absen');
Route::get('/admin/absen/{id}/create', 'AdminAbsenController@create')->name('admin.absen-create');
Route::get('/admin/berita-acara', 'AdminBeritaAcaraController@index')->name('admin.berita-acara');
Route::get('/admin/bap/create', 'AdminBeritaAcaraController@create')->name('admin.bap-create');


