<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UrlController;


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

Route::get('/', [urlController::class, 'displayUrl']);
Route::get('/register', function () {return view('register');});
Route::post('/register', [userController::class, 'register']);
Route::get('/login', function () {return view('login');});
Route::post('/login',[userController::class, 'login']);
Route::get('/logout',[userController::class, 'logout']);
Route::get('/addurl', function () {return view('addUrl');});
Route::post('/addurl',[urlController::class, 'addUrl']);
Route::get('/{shortenedurl}', [urlController::class, 'redirect']);
Route::delete('/deleteurl/{url}', [urlController::class, 'deleteUrl']);
Route::get('/editurl/{url}', [urlController::class, 'displayEdit']);
Route::put('/editurl/{url}', [urlController::class, 'editUrl']);
