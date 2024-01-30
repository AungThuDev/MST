<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CampusContentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PrincipalController;
use App\Http\Controllers\Admin\ProgrammeController;
use App\Http\Controllers\Admin\ProgrammePageController;
use App\Models\Banner;
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

Route::get('/test', function () {
    $array = ['asoifj', 'ajofid', 'wer23'];
    dd($array[0]);
});

Route::get('/', function () {
    $home_banner = Banner::where('page', 'home')->first();


    return view('frontend.home', compact('home_banner'));
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/principal', [PrincipalController::class, 'index'])->name('principal.index');
    Route::get('/principal/create', [PrincipalController::class, 'create'])->name('principal.create');
    Route::post('/principal/store', [PrincipalController::class, 'store'])->name('principal.store');
    Route::get('/principal/{principal}', [PrincipalController::class, 'show'])->name('principal.show');
    Route::get('/principal/{principal}/edit', [PrincipalController::class, 'edit'])->name('principal.edit');
    Route::patch('/principal/{principal}/update', [PrincipalController::class, 'update'])->name('principal.update');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::resource('/programme_page', ProgrammePageController::class)->except(['destroy']);

    Route::get('/dashboard', [AdminController::class, 'showDashboard']);
    Route::resource('/faq', FaqController::class);
    Route::resource('/programmes', ProgrammeController::class);

    Route::resource('/homepage', HomePageController::class)->except('destroy');
    Route::resource('/award', AwardController::class);
    Route::resource('/banner', BannerController::class);
    Route::resource('/event', EventController::class);
    Route::resource('/campus', CampusContentController::class);
    Route::resource('/info', InfoController::class);
    Route::resource('/lecturer', LecturerController::class)->except('show');
    Route::resource('/partner', PartnerController::class);
});


