<?php

use Illuminate\Support\Facades\Route;

// Custom controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanelController;

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
    return redirect()->route("login_get");
});

Route::group(["prefix" => "auth"], function() {

    // Get routes
    Route::get("/login", [AuthController::class, "login_get"])->name("login_get");
    Route::get("/register", [AuthController::class, "register_get"])->name("register_get");
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");
    
    // Post routes
    Route::post("/login", [AuthController::class, "login_post"])->name("login_post");
    Route::post("/register", [AuthController::class, "register_post"])->name("register_post");
});

Route::group(["prefix" => "home", "middleware" => "auth"], function() {
    
    // Get routes
    //Route::get("/", [PanelController::class, "panel_home_get"])->name("panel_home_get");

    //Route::get("/invoice", [PanelController::class, "panel_invoices_get"])->name("panel_invoices_get");
    Route::controller(PanelController::class)->group(function () {
        Route::get('/', 'panel_home_get')->name("panel_home_get");
        Route::get('/invoice', 'panel_invoices_get')->name("panel_invoices_get");
        Route::post('/invoice', 'status');
        Route::get('/invoice/tiers', 'panel_tiers_get')->name("panel_tiers_get");
        Route::get('/invoice/pdf', 'panel_pdf_get')->name("panel_pdf_get");
    });

    
});


