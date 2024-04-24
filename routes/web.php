<?php

use App\Http\Controllers\HomeController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

//Index of jobs
Route::get('/jobs', function () {
    return view('jobs.index', ['jobs' => Job::with('employer')->latest()->paginate(3)]);

})->name('jobs.index');

//Create job
Route::get('/jobs/create', function () {
    return view('jobs.create');
})->name('jobs.create');

//Store job
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

//Show job
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);

})->name('jobs.show');

//Edit job
Route::get('/jobs/{id}/edit', function ($id) {
    return view('jobs.edit', ['job' => Job::find($id)]);

})->name('jobs.edit');

//Update job
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'description' => 'required',
        'salary' => 'required',
    ]);
    Job::findOrFail($id)->update([
        'title' => request('title'),
        'description' => request('description'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $id);

})->name('jobs.update');

//Destroy job
Route::delete('/jobs/{id}', function ($id) {

    Job::findOrFail($id)->delete();
    return redirect('/jobs');

})->name('jobs.destroy');

//View contacts
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
