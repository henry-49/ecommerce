<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

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

//prefix: Admin related will be /admin
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin'] ], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});


// Admin Guard
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Web Guard
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
