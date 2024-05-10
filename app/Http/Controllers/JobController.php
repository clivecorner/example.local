<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        $employer = Employer::where('user_id', Auth::id())->first();

        $job = Job::create([
            'title' => request('title'),
            'description' => request('description'),
            'employer_id' => $employer->id,
            'salary' => request('salary'),
        ]);

        dispatch(function () use ($job) {

            Mail::to($job->employer->user->email)->queue(new JobPosted($job));
        })->delay(5);

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
