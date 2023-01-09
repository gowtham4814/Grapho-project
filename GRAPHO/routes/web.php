<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Controllers\addprod;
use App\Http\Controllers\bill;

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

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/product/add', function () {
//         return view('addprod');
//     })->name('addprod');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/product', function () {
        return view('add');
    })->name('add');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/add', function () {
        return view('addprod');
    })->name('addprod');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/mainpage', function () {
        return view('dashboard1');
    })->name('dashboard1');
});
Route::Post('/alterphp', function () {
    return view('alterphp');
});
Route::get('/aboutus', function () {
    return view('aboutus');
});

