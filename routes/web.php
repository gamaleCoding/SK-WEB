<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', function () {
    return Inertia::render('ViewersPage/Home');
})->name('home');

Route::get('/about-sk', function () {
    return Inertia::render('ViewersPage/About-Sk');
})->name('about_sk');

Route::get('/programs-projects', function(){
    return Inertia::render('ViewersPage/Programs-projects');
})->name('programs_projects');

Route::get('/events', function(){
    return Inertia::render('ViewersPage/Events');
})->name('events');

Route::get('/news-updates', function(){
    return Inertia::render('ViewersPage/News-update');
})->name('news_update');

Route::get('/get-involved', function(){
    return Inertia::render('ViewersPage/Get-involved');
})->name('get_involved');

Route::get('/youth-council', function(){
    return Inertia::render('ViewersPage/Youth-council');
})->name('youth_council');

Route::get('/concerns', function(){
    return Inertia::render('ViewersPage/Concerns');
})->name('concerns');

require __DIR__ . '/auth.php';
