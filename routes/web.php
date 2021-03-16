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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', function () {
    return view('user.login');
})->name('login');
Route::post('postlogin', 'LoginController@login')->name('postlogin');
Route::get('logout', 'LoginController@logout')->name('logout');


Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    Route::get('user', 'UserController@index')->name('user');
    Route::get('create_user', 'UserController@create')->name('create_user');
    Route::post('simpan_user', 'UserController@store')->name('simpan_user');
    Route::get('edit_user/{id}', 'UserController@edit')->name('edit_user');
    Route::post('update_user/{id}', 'UserController@update')->name('update_user');
    Route::get('delete_user/{id}', 'UserController@destroy')->name('delete_user');

    //Pembayaran
    Route::resource('pembayaran','PembayaranController');
    //siswa
    Route::resource('Siswa','SiswaController');
    //petugas


    Route::patch('status/{pembayaran}','PembayaranController@statusupdate')->name('status');

    Route::prefix('/kelas')->name('kelas.')->group(function () {
        Route::get('/', 'KelasController@index')->name('index');
        Route::post('/create', 'KelasController@create')->name('create');
        Route::get('/edit/{id}', 'KelasController@edit')->name('edit');
        Route::post('/update/{id}', 'KelasController@update')->name('update');
        Route::get('/delete/{id}', 'KelasController@destroy')->name('delete');
    });
    //laporannya gays
    Route::get('/laporan','LaporanController@index')->name('laporan');
    Route::get('/laporan/cari','LaporanController@cari');
    Route::get('/laporan/print','LaporanController@print')->name('laporanprint');

    Route::prefix('/spp')->name('spp.')->group(function () {
        Route::get('/', 'SppController@index')->name('index');
        Route::post('/create', 'SppController@create')->name('create');
        Route::get('/edit/{id}', 'SppController@edit')->name('edit');
        Route::post('/update/{id}', 'SppController@update')->name('update');
        Route::get('/delete/{id}', 'SppController@destroy')->name('delete');
    });
});

Route::group(['middleware' => ['auth','ceklevel:petugas,admin']], function () {
    Route::get('/history', 'PembayaranController@index')->name('history');
    Route::resource('pembayaran','PembayaranController');
    Route::put('status/{pembayaran}','PembayaranController@statusupdate')->name('status');
});

Route::group(['middleware' => ['auth', 'ceklevel:siswa,admin,petugas']], function () {
    Route::get('/history', 'PembayaranController@index')->name('history');
});


