<?php

use App\Http\Controllers\Bibliography\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/bibliography/index', [IndexController::class, 'getBibliography'])->name('index-getBibliography');
Route::get('/v1/bibliography/upload-from-txt', [IndexController::class, 'uploadBibliographyFromTxt'])->name('index-uploadBibliographyFromTxt');
