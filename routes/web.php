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
        Route::get('/admin/profil/edit', 'AdminProfilController@edit')->name('admin.profil.edit');
        Route::put('/admin/profil/update', 'AdminProfilController@update')->name('admin.profil.update');
        Route::put('/admin/profil/update-foto', 'AdminProfilController@updateFoto')->name('admin.profil.update-foto');
        Route::put('/admin/profil/update-password', 'AdminProfilController@updatePassword')->name('admin.profil.update-password');

        // ABSENSI
        Route::get('/admin/absensi', 'AdminAbsenController@index')->name('admin.absensi.index');
        Route::post('/admin/absensi/izin/{bap}', 'AdminAbsenController@izin')->name('admin.absensi.izin');
        Route::get('/admin/absensi/show/{user}/{bap}', 'AdminAbsenController@show')->name('admin.absensi.show');
        Route::post('/admin/absensi/absen/{bap}', 'AdminAbsenController@absen')->name('admin.absensi.absen');

        // BERITA ACARA
        Route::get('/admin/berita-acara', 'AdminBeritaAcaraController@index')->name('admin.berita-acara.index');
        Route::get('/admin/berita-acara/{id}', 'AdminBeritaAcaraController@show')->name('admin.berita-acara.show');
        Route::get('/admin/berita-acara/{id}/create', 'AdminBeritaAcaraController@create')->name('admin.berita-acara.create');
        Route::post('/admin/berita-acara/{id}/store', 'AdminBeritaAcaraController@store')->name('admin.berita-acara.store');
        Route::put('/admin/berita-acara/{id}/selesai/{bapid}', 'AdminBeritaAcaraController@selesai')->name('admin.berita-acara.selesai');
        Route::get('/admin/berita-acara/{id}/{bapid}', 'AdminBeritaAcaraController@edit')->name('admin.berita-acara.edit');
        Route::put('/admin/berita-acara/{id}/update/{bapid}', 'AdminBeritaAcaraController@update')->name('admin.berita-acara.update');
        Route::delete('/admin/berita-acara/{id}/delete/{bapid}', 'AdminBeritaAcaraController@delete')->name('admin.berita-acara.delete');

        Route::middleware(['staff'])
            ->group(function(){
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

                // JADWAL
                Route::get('/admin/jadwal', 'AdminJadwalController@index')->name('admin.jadwal.index');
                Route::get('/admin/jadwal/create', 'AdminJadwalController@create')->name('admin.jadwal.create');
                Route::post('/admin/jadwal/store', 'AdminJadwalController@store')->name('admin.jadwal.store');
                Route::post('/admin/jadwal/getjadwal', 'AdminJadwalController@getMatkul')->name('admin.jadwal.getMatkul');
                Route::post('/admin/jadwal/storeAsisten', 'AdminJadwalController@storeAsisten')->name('admin.jadwal.storeAsisten');
                Route::post('/admin/jadwal/getAsisten', 'AdminJadwalController@getAsisten')->name('admin.jadwal.getAsisten');
                Route::post('/admin/jadwal/getShift', 'AdminJadwalController@getShift')->name('admin.jadwal.getShift');
                Route::delete('/admin/jadwal/delete/{id}', 'AdminJadwalController@delete')->name('admin.jadwal.delete');
                Route::delete('/admin/jadwal/deleteAsisten/{id}', 'AdminJadwalController@deleteAsisten')->name('admin.jadwal.deleteAsisten');

                // ASISTEN
                Route::get('/admin/asisten', 'AdminAsistenController@index')->name('admin.asisten.index');
                Route::get('/admin/asisten/create', 'AdminAsistenController@create')->name('admin.asisten.create');
                Route::get('/admin/asisten/{id}', 'AdminAsistenController@edit')->name('admin.asisten.edit');
                Route::post('/admin/asisten/store', 'AdminAsistenController@store')->name('admin.asisten.store');
                Route::post('/admin/asisten/resetPassword/{id}', 'AdminAsistenController@resetPassword')->name('admin.asisten.resetPassword');
                Route::put('/admin/asisten/update/{id}', 'AdminAsistenController@update')->name('admin.asisten.update');
                Route::delete('/admin/asisten/delete/{id}', 'AdminAsistenController@delete')->name('admin.asisten.delete');

                // REKAP ABSENSI
                Route::get('/admin/rekap-absensi', 'AdminRekapAbsensiController@index')->name('admin.rekap-absensi.index');
                Route::get('/admin/rekap-absensi/getRekap', 'AdminRekapAbsensiController@getRekap')->name('admin.rekap-absensi.getRekap');
                
            });
    }
);

// Route::resource('/user', 'AdminUserController');