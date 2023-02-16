<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;
use ArielMejiaDev\LarapexCharts\LarapexChart;

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
    if (!is_null(auth('trainee')->user())) {
        return redirect('/dashboard');
    }

    return view('welcome');
})->name('welcome');

Route::middleware(['auth:trainee', 'verified'])->group(function () {
    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/{course:slug}', [CourseController::class, 'show'])->name('courses.show');

        Route::prefix('/{course:slug}/quizzes')->group(function () {
            Route::get('/{quiz:slug}', [QuizController::class, 'show'])->name('quizzes.show');
            Route::post('/{quiz:slug}/submitAnswers', [QuizController::class, 'submitAnswers'])->name('quizzes.submitAnswers');
        });
    });
});

Route::get('/dashboard', [DashboardController::class, 'show'])
    ->middleware(['auth:trainee', 'verified'])
    ->name('dashboard');

Route::middleware('auth:trainee')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
