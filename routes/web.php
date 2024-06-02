<?php

use App\Http\Controllers\DeskripsiController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InventoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/login');
});

//main
// Route::get('home', function(){
//     return view('home');
// });
// ->middleware('auth')


// Route::get('inv', function(){
//     return view('inv');
// });

// login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

// register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/inventory.index', [InventoryController::class,'index'])->name('inventory.index');
Route::get('/inv.indexx', [InventoryController::class,'indexx'])->name('inv.indexx');

   //tambahdata
   Route::get('/tambahdata', [InventoryController::class, 'tambahdata'])->name('tambahdata');
   Route::post('/insertdata', [InventoryController::class, 'insertdata'])->name('insertdata');

//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//laporan
Route::get('/laporan', [LaporanController::class, 'showForm'])->name('laporan.form');
Route::get('/laporan/generate', [LaporanController::class, 'generate'])->name('laporan.generate');
Route::get('/laporan/download-pdf', [LaporanController::class, 'downloadPdf'])->name('laporan.download-pdf');

Route::group(['middleware' => ['auth','cekrole:admin,karyawan']], function(){
    // Route::get('home', function(){
    //     return view('home');
    // });
    Route::get('/home', [InventoryController::class, 'dashboard'])->name('inventory.dashboard');
    // Route::get('/home', [InventoryController::class, 'dashboard'])->name('home');

    //inventory
    Route::get('/inv', [InventoryController::class, 'indexx'])->name('inv');

    //deskripsi
    Route::get('/deskindex', [DeskripsiController::class, 'indexxx'])->name('deskindex');
    });

Route::group(['middleware' => ['auth', 'cekrole:admin']], function(){
    Route::get('/deskripsi', [DeskripsiController::class, 'index'])->name('deskripsi');
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');

//edit
Route::get('/editdata/{id}', [InventoryController::class, 'editdata'])->name('editdata');
Route::post('/updatedata/{id}', [InventoryController::class, 'updatedata'])->name('updatedata');

//delete
Route::get('/deletedata/{id}', [InventoryController::class, 'deletedata'])->name('deletedata');


//tambahdesk
Route::get('/tambahdesk', [DeskripsiController::class, 'tambahdesk'])->name('tambahdesk');
Route::post('/insertdesk', [DeskripsiController::class, 'insertdesk'])->name('insertdesk');

//editdesk
Route::get('/editdesk/{id}', [DeskripsiController::class, 'editdesk'])->name('editdesk');
Route::post('/updatedesk/{id}', [DeskripsiController::class, 'updatedesk'])->name('updatedesk');

//deletedesk
Route::get('/deletedesk/{id}', [DeskripsiController::class, 'deletedesk'])->name('deletedesk');


});
