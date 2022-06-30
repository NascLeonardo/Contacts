<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

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

Route::get('/Contacts/Create', [ContactController::class, 'create'])->middleware('auth');;
Route::get('/Contacts', [ContactController::class, 'index'])->middleware('auth');;
Route::redirect('/', '/Contacts')->middleware('auth');;
Route::post('/Contacts/Store', [ContactController::class, 'store'])->middleware('auth');;
Route::get('/Contacts/Favorite/{id}', [ContactController::class, 'favorite'])->middleware('auth');;
Route::get('/Contacts/Edit/{id}', [ContactController::class, 'edit'])->middleware('auth');;
Route::post('/Contacts/Update/', [ContactController::class, 'update'])->middleware('auth');;
Route::get('/Contacts/Delete/{id}', [ContactController::class, 'destroy'])->middleware('auth');;
Route::get('/Contacts/Search', [ContactController::class, 'search'])->middleware('auth');;


Route::get('/Auth/Login', [AuthController::class, 'login']);
Route::get('/Auth/Register', [AuthController::class, 'Register']);
Route::get('/Auth/Logout', [AuthController::class, 'logout']);