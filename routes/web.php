<?php

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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

// Users anggota,Ketua,bendahara,sekretaris,ketua
Route::group(['prefix' => 'users', 'namespace' => 'Users'], function(){
    Route::post('/', 'UserController@store')->name('users.store');
    Route::get('create', 'UserController@create')->name('users.create');
    Route::get('{user}/edit', 'UserController@edit')->name('users.edit');
    Route::patch('{user}/update', 'UserController@update')->name('users.update');

    Route::get('pegawai','PegawaiController@index')->name('pegawai.index');
    Route::get('anggota','AnggotaController@index')->name('anggota.index');
});

// Pinjaman atau pengajuan

Route::group(['prefix' => 'loans', 'namespace' => 'Loans'], function(){

    // Data Pinjaman
    route::get('/', 'LoanController@index')->name('loans');
    route::get('cetak', 'LoanController@cetak')->name('loans.cetak');
    route::post('{loan}','LoanController@destroy')->name('loans.destroy');

    route::get('print/{loan}','PrintController@show')->name('loans.print');


    //Ajukan pinjaman
    route::get('create/{type}',  'LoanController@create')->name('loans.create');
    route::post('kalkulasi/{type}','LoanController@kalkulasi')->name('loans.kalkulasi');
    route::post('store/{type}','LoanController@store')->name('loans.store');

    // setujui pinjaman
    route::get('submissions', 'SubmissionController@index')->name('submissions');
    route::post('submissions/{loan}','SubmissionController@store')->name('submissions.store');
});

// jenis pinjaman

Route::group(['namespace' => 'Types'], function(){

    route::resource('types', 'TypeController');
});

// Angsuran
Route::group(['prefix'=> 'installments', 'namespace'=>'Installments'], function(){
    route::get('/', 'InstallmentController@index')->name('installments.index');
    route::get('/{loan}','InstallmentController@show')->name('installments.show');
    Route::get('/{loan}/create', 'InstallmentController@create')->name('installments.create');
    Route::post('{loan}/store', 'InstallmentController@store')->name('installments.store');
});

// Simpanan

Route::group(['namespace'=>'Savings'],  function(){
    route::get('', 'SavingController@index')->name('savings');
    route::get('create', 'SavingController@create')->name('savings.create');
    route::post('store', 'SavingController@store')->name('savings.store');
    route::get('edit/{saving}', 'SavingController@edit')->name('savings.edit');
    route::patch('update/{saving}', 'SavingController@update')->name('savings.update');
});

// cetak laporan

Route::group(['namespace'=>'Reports'],function(){
    Route::get('report/savings', 'ReportController@savings')->name('reports.savings');
});

Route::group(['prefix' => 'transaksi'], function(){
    route::get('', 'TransaksiController@index')->name('transaksi');
    route::get('edit/{saving}', 'TransaksiController@edit')->name('transaksi.edit');
    route::patch('store/{saving}', 'TransaksiController@store')->name('transaksi.store');

    route::get('cetak-butki/{penarikan}','KwitansiController@show')->name('transaksi.cetak-bukti');
});

Route::group(['prefix' => 'penarikan'], function(){
    route::get('','PenarikanController@index')->name('penarikan');
});
