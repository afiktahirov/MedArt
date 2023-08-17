<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

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


// // Admin Panel
// Route::get('/admin',[AdminController::class,"index"])->name("admin");
// Route::get("/admin/dashboard",[AdminController::class,"dashboard"])->name("admin.dashboard");
// Route::get("/admin/shoup",[AdminController::class ,"shoup"])->name("admin.shoup");
// // End

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])
        ->name('login')
        ->middleware('guest');
    Route::post('/login', [AdminController::class, 'authenticate']);
    Route::middleware('auth')->group(function () {
        Route::get('/',[AdminController::class,"index"])->name("admin");
        Route::get("/dashboard",[AdminController::class,"dashboard"])->name("admin.dashboard");
        Route::post("/languages",[LanguageController::class,"store"])->name("language.save");
        Route::post("/languages/delete",[LanguageController::class,"destroy"])->name("language.destroy");
        Route::post("/slider/add",[HomeSliderController::class,"store"])->name("slider.save");
        Route::post("/slider/add/languages",[HomeSliderController::class,"sliderLang"])->name("sliderLang");
        Route::get("/shoup",[AdminController::class ,"shoup"])->name("admin.shoup");
        Route::get("/settings/pages",[AdminController::class,"settingsPages"])->name("admin.settingsPages");
        Route::get("/slider/deactive",[AdminController::class ,"slider_d"])->name("admin.dslider");
        Route::post("/slider/deactive",[AdminController::class ,"slider_d_active"])->name("admin.dsilder.active");

    });
});

//Front Routes
Route::get('/', function () {
    return redirect('/az');
});

Route::group(['prefix' => '{locale}', 'middleware' => 'setLocale'], function () {
    Route::get('/', [PageController::class, 'homeIndex'])->name('home');
    Route::get('/about', [PageController::class, 'aboutIndex'])->name('about');
    Route::get('/services', [PageController::class, 'servicesIndex'])->name('services');
    Route::get('/news', [PageController::class, 'newsIndex'])->name('news');
    Route::get('/contact', [PageController::class, 'contactIndex'])->name('contact');
});
