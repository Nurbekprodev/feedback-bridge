<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    $businesses = auth()->user()
        ->businesses()
        ->withCount('feedbacks')
        ->latest()
        ->get();

    return view('dashboard', compact('businesses'));
})->middleware(['auth'])->name('dashboard');


// =====================
// BUSINESS (OWNER SIDE)
// =====================
Route::middleware('auth')->group(function () {

    Route::get('/businesses/create', [BusinessController::class, 'create'])
        ->name('businesses.create');

    Route::post('/businesses', [BusinessController::class, 'store'])
        ->name('businesses.store');

    Route::get('/businesses/{business}', [BusinessController::class, 'show'])
        ->name('businesses.show');

    Route::get('/businesses/{business}/qr', [BusinessController::class, 'qr'])
        ->name('businesses.qr');
});


// =====================
// FEEDBACK (PUBLIC SIDE)
// =====================
Route::get('/f/{uuid}', [FeedbackController::class, 'show'])
    ->name('feedback.show');

Route::post('/f/{uuid}', [FeedbackController::class, 'store'])
    ->name('feedback.submit');


// =====================
// PROFILE
// =====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';