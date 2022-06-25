<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/Contacts/Create', [ContactController::class, 'create']);
Route::get('/Contacts', [ContactController::class, 'index']);

Route::post('/', [ContactController::class, 'store']);
Route::get('/contacts/favorite/{id}', [ContactController::class, 'favorite']);
Route::get('/contacts/delete/{id}', [ContactController::class, 'destroy']);
