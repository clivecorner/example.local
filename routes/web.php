<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

//Index of jobs
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

//Create job
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');

//Store job
Route::post('/jobs/create', [JobController::class, 'store'])->name('jobs.store')->middleware('auth');

//Show job
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

//Edit job
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit')->middleware('auth')->can('edit-job', 'job');

//Update job
Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');

//Destroy job
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');

//Route::resource('jobs', JobController::class);

Route::get('/register', [RegisteredUserController::class, 'create'])->name('auth.create');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('auth.store');

Route::get('/login', [SessionController::class, 'create'])->name('auth.create');
Route::post('/login', [SessionController::class, 'store'])->name('auth.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('auth.destroy');

//View contacts
Route::get('/contact', function () {
    return view('contact');
});
