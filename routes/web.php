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


Route::middleware(['auth','admin'])
    ->group(function(){
        
        // PROFIL
        Route::get('/admin/profil', 'AdminProfilController@index')->name('admin.profil.index');

        // ABSENSI
        Route::get('/admin/absensi', 'AdminAbsenController@index')->name('admin.absensi.index');
        Route::post('/admin/absensi/izin/{bap}/{user}', 'AdminAbsenController@izin')->name('admin.absensi.izin');
        Route::get('/admin/absensi/show/{user}/{bap}', 'AdminAbsenController@show')->name('admin.absensi.show');
        Route::post('/admin/absensi/{id}/absen/{bap}', 'AdminAbsenController@absen')->name('admin.absensi.absen');

        // BERITA ACARA
        Route::get('/admin/berita-acara', 'AdminBeritaAcaraController@index')->name('admin.berita-acara.index');
        Route::get('/admin/berita-acara/{id}', 'AdminBeritaAcaraController@show')->name('admin.berita-acara.show');
        Route::get('/admin/berita-acara/{id}/create', 'AdminBeritaAcaraController@create')->name('admin.berita-acara.create');
        Route::post('/admin/berita-acara/{id}/store', 'AdminBeritaAcaraController@store')->name('admin.berita-acara.store');
        Route::get('/admin/berita-acara/{id}/{bapid}', 'AdminBeritaAcaraController@edit')->name('admin.berita-acara.edit');
        Route::put('/admin/berita-acara/{id}/update/{bapid}', 'AdminBeritaAcaraController@update')->name('admin.berita-acara.update');
        Route::delete('/admin/berita-acara/{id}/delete/{bapid}', 'AdminBeritaAcaraController@delete')->name('admin.berita-acara.delete');


        // KELAS
        Route::get('/admin/kelas', 'AdminKelasController@index')->name('admin.kelas.index');
        Route::get('/admin/kelas/create', 'AdminKelasController@create')->name('admin.kelas.create');
        Route::get('/admin/kelas/{id}', 'AdminKelasController@edit')->name('admin.kelas.edit');
        Route::post('/admin/kelas/store', 'AdminKelasController@store')->name('admin.kelas.store');
        Route::put('/admin/kelas/update/{id}', 'AdminKelasController@update')->name('admin.kelas.update');
        Route::delete('/admin/kelas/delete/{id}', 'AdminKelasController@delete')->name('admin.kelas.delete');

        // MATKUL
        Route::get('/admin/matkul', 'AdminMatkulController@index')->name('admin.matkul.index');
        Route::get('/admin/matkul/create', 'AdminMatkulController@create')->name('admin.matkul.create');
        Route::get('/admin/matkul/{id}', 'AdminMatkulController@edit')->name('admin.matkul.edit');
        Route::post('/admin/matkul/store', 'AdminMatkulController@store')->name('admin.matkul.store');
        Route::put('/admin/matkul/update/{id}', 'AdminMatkulController@update')->name('admin.matkul.update');
        Route::delete('/admin/matkul/delete/{id}', 'AdminMatkulController@delete')->name('admin.matkul.delete');
        Route::get('/admin/matkul/download/{id}', 'AdminMatkulController@download')->name('admin.matkul.download');
    }
);

// Route::resource('/user', 'AdminUserController');