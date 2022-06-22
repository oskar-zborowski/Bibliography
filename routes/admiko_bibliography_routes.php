<?php
/** Admiko routes. This file will be overwritten on page import. Don't add your code here! **/

namespace App\Http\Controllers\Bibliography;
use Illuminate\Support\Facades\Route;

/**Bibliographies**/
Route::delete("bibliographies/destroy", [BibliographiesController::class,"destroy"])->name("bibliographies.delete");
Route::resource("bibliographies", BibliographiesController::class)->parameters(["bibliographies" => "bibliographies"]);
