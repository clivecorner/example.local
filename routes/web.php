<?php

use App\Http\Controllers\HomeController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/jobs', function () {
    return view('jobs', ['jobs' => Job::with('employer')->paginate(3)]);

});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/job/{id}', function ($id) {
    $job = Job::find($id);
    return view('job', ['job' => $job]);

});

// Route::get('/note', [NoteController::class, 'index'])->name('note.index');
// Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
// Route::post('/note', [NoteController::class, 'store'])->name('note.store');
// Route::get('/note/{id}', [NoteController::class, 'show'])->name('note.show');
// Route::get('/note/{id}/edit', [NoteController::class, 'edit'])->name('note.edit');
// Route::put('/note/{id}', [NoteController::class, 'update'])->name('note.update');
// Route::delete('/note/{id}', [NoteController::class, 'destroy'])->name('note.destroy');
