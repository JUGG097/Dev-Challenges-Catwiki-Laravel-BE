<?php

use App\Http\Controllers\CatWikiController;
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


Route::prefix("v1")->group(function () {
    Route::get("check", [CatWikiController::class, "healthCheck"]);
    Route::get("topTen", [CatWikiController::class, "showTopTen"]);
    Route::get("details/{catId}", [CatWikiController::class, "showCatDetails"]);
    Route::get("photos/{catId}", [CatWikiController::class, "showCatPhotos"]);
    Route::get("breedlist", [CatWikiController::class, "showBreedList"]);
});
