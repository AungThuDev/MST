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
use App\Http\Controllers\EventController as ControllersEventController;
use App\Models\Award;
use App\Models\Banner;
use App\Models\CampusContent;
use App\Models\Category;
use App\Models\Faq;
use App\Models\HomePage;
use App\Models\Info;
use App\Models\Lecturer;
use App\Models\Partner;
use App\Models\Principal;
use App\Models\ProgrammePage;
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

    $home = HomePage::first();

    $categories = Category::all();

    $principal = Principal::first();

    $partners = Partner::pluck('image');

    $campus1 = CampusContent::with('phones')->where('id', 1)->first();

    $phoneNumber1 = $campus1->phones->pluck('number')->first();

    $campus = CampusContent::with('phones')->get();

    $email = Info::where('name', 'email')->pluck('link')->first();

    $facebook = Info::where('name', 'facebook')->pluck('link')->first();

    $youtube = Info::where('name', 'youtube')->pluck('link')->first();

    $linkedin = Info::where('name', 'linkedin')->pluck('link')->first();


    //  dd($phoneNumber1, $email);

    return view('frontend.home',
        compact(
            'home_banner',
            'home',
            'categories',
            'principal',
            'partners',
            'email',
            'facebook',
            'youtube',
            'linkedin',
            'campus',
            'phoneNumber1'
        ));
});

Route::get('/faculty', function () {

    $faculty_banner = Banner::where('page', 'faculty')->first();

    $principal = Principal::first();

    $lecturers = Lecturer::latest()->paginate(4)->fragment('lectures');

    $categories = Category::all();

    $campus1 = CampusContent::with('phones')->where('id', 1)->first();

    $phoneNumber1 = $campus1->phones->pluck('number')->first();

    $campus = CampusContent::with('phones')->get();

    $email = Info::where('name', 'email')->pluck('link')->first();

    $facebook = Info::where('name', 'facebook')->pluck('link')->first();

    $youtube = Info::where('name', 'youtube')->pluck('link')->first();

    $linkedin = Info::where('name', 'linkedin')->pluck('link')->first();

    return view('frontend.faculty',
        compact(
            'faculty_banner',
            'principal',
            'lecturers',
            'email',
            'facebook',
            'youtube',
            'linkedin',
            'campus',
            'phoneNumber1',
            'categories'
        ));
});

Route::get('/event', [ControllersEventController::class, 'index']);
Route::get('/event/{event}', [ControllersEventController::class, 'detail'])->name('frontend.event.detail');

Route::get('/frequently_asked_questions', function () {
    $faq_banner = Banner::where('page', 'faq')->first();
    $faqs = Faq::all();
    $categories = Category::all();
    $campuses = CampusContent::all();
    $campus1 = CampusContent::with('phones')->where('id', 1)->first();
    $phoneNumber1 = $campus1->phones->pluck('number')->first();
    $campus = CampusContent::with('phones')->get();
    $email = Info::where('name', 'email')->pluck('link')->first();
    $facebook = Info::where('name', 'facebook')->pluck('link')->first();
    $youtube = Info::where('name', 'youtube')->pluck('link')->first();
    $linkedin = Info::where('name', 'linkedin')->pluck('link')->first();

    return view('frontend.faq',
        compact(
            'faq_banner',
            'faqs',
            'categories',
            'phoneNumber1',
            'campus',
            'email',
            'facebook',
            'youtube',
            'linkedin',
            'campuses'
        )
    );
});

Route::get('/academics', function () {
    $programmes_banner = Banner::where('page', 'programme')->first();
    $categories = Category::all();
    $programmePage = ProgrammePage::first();
    $partners = Partner::all();
    $awards = Award::paginate(3)->fragment('awards');
    $campus1 = CampusContent::with('phones')->where('id', 1)->first();
    $phoneNumber1 = $campus1->phones->pluck('number')->first();
    $campus = CampusContent::with('phones')->get();
    $email = Info::where('name', 'email')->pluck('link')->first();
    $facebook = Info::where('name', 'facebook')->pluck('link')->first();
    $youtube = Info::where('name', 'youtube')->pluck('link')->first();
    $linkedin = Info::where('name', 'linkedin')->pluck('link')->first();


    return view('frontend.programmes',
        compact(
            'awards',
            'programmes_banner',
            'categories',
            'programmePage',
            'partners',
            'phoneNumber1',
            'campus',
            'email',
            'facebook',
            'youtube',
            'linkedin'
        )
    );
});

Route::get('/contacts', function () {
    $contact_banner = Banner::where('page', 'contact')->first();
    $campuses = CampusContent::all();
    $categories = Category::all();
    $campus1 = CampusContent::with('phones')->where('id', 1)->first();
    $phoneNumber1 = $campus1->phones->pluck('number')->first();
    $campus = CampusContent::with('phones')->get();
    $email = Info::where('name', 'email')->pluck('link')->first();
    $facebook = Info::where('name', 'facebook')->pluck('link')->first();
    $youtube = Info::where('name', 'youtube')->pluck('link')->first();
    $linkedin = Info::where('name', 'linkedin')->pluck('link')->first();

//    dd($campus);

    return view('frontend.contact',
        compact(
            'contact_banner',
            'campuses',
            'categories',
            'phoneNumber1',
            'campus',
            'email',
            'facebook',
            'youtube',
            'linkedin'
        ));
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
    // Route::resource('/homepage', HomePageController::class)->middleware('home')->only('create');
    Route::get('/homepage', [HomePageController::class, 'index'])->name('homepage.index');
    Route::get('/homepage/create', [HomePageController::class, 'create'])->name('homepage.create')->middleware('home');
    Route::post('/homepage/create', [HomePageController::class, 'store'])->name('homepage.store');
    Route::get('/homepage/{homepage}/edit', [HomePageController::class, 'edit'])->name('homepage.edit');
    Route::post('/homepage/{homepage}/edit', [HomePageController::class, 'update'])->name('homepage.update');
    Route::get('/homepage/{homepage}', [HomePageController::class, 'show'])->name('homepage.show');
    Route::resource('/award', AwardController::class);
    Route::resource('/banner', BannerController::class);
    Route::resource('/event', EventController::class);
    Route::resource('/campus', CampusContentController::class);
    Route::resource('/info', InfoController::class);
    Route::resource('/lecturer', LecturerController::class)->except('show');
    Route::resource('/partner', PartnerController::class);
});


