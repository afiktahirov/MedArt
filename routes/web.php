<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TestimonialsController;
use App\Models\Department;
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

Route::get('/storage-link',function(){
    $targetFolder = storage_path('app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($targetFolder,$linkFolder);
});

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
        Route::delete("/slider/delete",[HomeSliderController::class,"destroy"])->name("slider.destroy");
        Route::post("/slider/add/languages",[HomeSliderController::class,"sliderLang"])->name("sliderLang");
        Route::get('/getSliderContent/{sliderId}/{lang}',[HomeSliderController::class,"sliderLangEdit"])->name("sliderLangEdit");
        Route::get('/findSliderContent/{lang}',[HomeSliderController::class,"sliderLangfind"])->name("sliderLangfind");
        Route::post("/slider/edit/languages",[HomeSliderController::class,"EditsliderLang"])->name("editSliderLang");
        Route::get("/shoup",[AdminController::class ,"shoup"])->name("admin.shoup");
        Route::get("/testimonials/pages",[AdminController::class,"testimonialsPages"])->name("admin.testimonials");
        Route::get("/slider/deactive",[AdminController::class ,"slider_d"])->name("admin.dslider");
        Route::post("/slider/active",[AdminController::class ,"slider_d_active"])->name("admin.dsilder.active");
        Route::post("/slider/deactive",[AdminController::class ,"slider_d_deactive"])->name("admin.dsilder.deactive");
        Route::get("/test/tiny",[AdminController::class,"test_tiny"])->name("admin.test_tiny");
        Route::post("/department/save",[DepartmentController::class,"store"])->name("department.save");
        Route::post("/department/addtext",[DepartmentController::class,"department_text"])->name("department.addText");
        Route::get('/findDepartmentLang/{lang}',[DepartmentController::class,"sliderLangfind"])->name("sliderLangfind");
        Route::delete("/department/delete",[DepartmentController::class,"destroy"])->name("department.destroy");
        Route::post('testimonial/add',[TestimonialsController::class,"store"])->name("testimonial.add");
        Route::delete('testimonial/delete',[TestimonialsController::class,"destroy"])->name("testimonial.destroy");
        Route::post('news/add',[NewsController::class,'store'])->name("news.add");




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
