<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ConcernsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// WELCOME ROUTES
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

// ADMIN DASHBOARD ROUTES
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// ACCOUNTS ROUTES
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin', [RegisteredUserController::class, 'create'])->name('add_admin');
    Route::post('/add-admin', [RegisteredUserController::class, 'store'])->name('submit_admin');
});










// WELCOME ROUTES
Route::get('/welcome', function () {
    return Inertia::render('ViewersPage/Landing-page');
})->name('landing_page');

// HOME ROUTES
Route::get('/home', function () {
    return Inertia::render('ViewersPage/Home');
})->name('home');

// ABOUT SK ROUTES
Route::get('/about-sk', function () {
    return Inertia::render('ViewersPage/About-Sk');
})->name('about_sk');

// PROGRAMS AND PROJECTS ROUTES
Route::get('/programs-projects', function () {
    return Inertia::render('ViewersPage/Programs-projects');
})->name('programs_projects');

// EVENTS ROUTES
Route::get('/events', function () {
    return Inertia::render('ViewersPage/Events');
})->name('events');

// NEWS UPDATES ROUTES
Route::get('/news-updates', function () {
    return Inertia::render('ViewersPage/News-update');
})->name('news_update');

// RESOURCES ROUTES
Route::get('/resources', function () {
    return Inertia::render('ViewersPage/Resources');
})->name('resources');

// YOUTH COUNCEL ROUTES
Route::get('/youth-council', function () {
    return Inertia::render('ViewersPage/Youth-council');
})->name('youth_council');

// CONCERNS ROUTES
Route::group(['prefix' => 'concerns'], function () {
    Route::get('/', function () {
        return Inertia::render('ViewersPage/Concerns');
    })->name('concerns');
    Route::get('/concern', [ConcernsController::class, 'concern'])->name('concern_message');
});

require __DIR__ . '/auth.php';
