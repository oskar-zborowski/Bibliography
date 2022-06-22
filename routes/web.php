<?php

use App\Models\Bibliography\Bibliographies;
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
    $bibliographies = Bibliographies::where('id', '>', 0)->get();
    return view('index')->with('bibliographies', $bibliographies);
});
