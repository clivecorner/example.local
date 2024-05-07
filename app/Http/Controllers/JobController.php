<?php

namespace App\Http\Controllers;

use App\Models\Job;

class JobController extends Controller
{

    public function index()
    {
        return view('jobs.index', ['jobs' => Job::with('employer')->latest()->paginate(3)]);

    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store()
    {

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
    }

    public function edit(Job $job)
    {

        return view('jobs.edit', ['job' => $job]);

    }

    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required',
            'salary' => 'required',
        ]);
        $job->update([
            'title' => request('title'),
            'description' => request('description'),
            'salary' => request('salary'),
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }

}
