<?php

use App\Http\Controllers\HomeController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/jobs', function () {
    return view('jobs/index', ['jobs' => Job::with('employer')->latest()->paginate(3)]);

})->name('jobs.index');

Route::get('/jobs/create', function () {
    return view('jobs/create');
})->name('jobs.create');

Route::post('/jobs/create', function () {

    request()->validate([
        'title' => ['required', 'min:3'],
        'description' => 'required',
        'salary' => 'required',
    ]);

    Job::create([
        'title' => request('title'),
        'description' => request('description'),
        'employer_id' => 1,
        'salary' => request('salary'),
    ]);

    return redirect('/jobs');
})->name('jobs.store');

Route::get('/job/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs/show', ['job' => $job]);

})->name('jobs.show');

Route::get('/contact', function () {
    return view('contact');
});

// Route::get('/note', [NoteController::class, 'index'])->name('note.index');
// Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
// Route::post('/note', [NoteController::class, 'store'])->name('note.store');
// Route::get('/note/{id}', [NoteController::class, 'show'])->name('note.show');
// Route::get('/note/{id}/edit', [NoteController::class, 'edit'])->name('note.edit');
// Route::put('/note/{id}', [NoteController::class, 'update'])->name('note.update');
// Route::delete('/note/{id}', [NoteController::class, 'destroy'])->name('note.destroy');
