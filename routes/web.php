<?php

use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CampusContentController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PrincipalController;
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
    return view('layouts.master');
});

Route::get('/admin', [AdminController::class, 'showDashboard']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('/faq',FaqController::class);
    Route::resource('/principal',PrincipalController::class);
    Route::resource('/homepage', HomePageController::class);
    Route::resource('/award',AwardController::class);
    Route::resource('/banner', BannerController::class);
    Route::resource('/event', EventController::class);
    Route::resource('/campus', CampusContentController::class);
    Route::resource('/info', InfoController::class);    Route::resource('/lecturer',LecturerController::class);
    Route::resource('/partner',PartnerController::class);
});


