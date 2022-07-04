<?php
/** Admiko routes. This file will be overwritten on page import. Don't add your code here! **/

namespace App\Http\Controllers\Bibliography;
use Illuminate\Support\Facades\Route;

/**Bibliography**/
Route::delete("bibliography/destroy", [BibliographyController::class,"destroy"])->name("bibliography.delete");
Route::resource("bibliography", BibliographyController::class)->parameters(["bibliography" => "bibliography"]);
