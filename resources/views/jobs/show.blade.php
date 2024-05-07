<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
<p>{{ $job->employer->name }}</p>
<p >{{ $job['title'] }}</p>
<p>This job pays ${{ $job['salary'] }} per year</p>
<div>
    {{ $job->description }}
</div>
@foreach ($job->tags as $tag)
    <strong> {{ $tag->name }} </strong>
    
@endforeach
@can('edit-job', $job)
<p class="mt-10">
    <x-button href="/jobs/{{ $job['id'] }}/edit">Edit job</x-button>
</p>
@endcan
</x-layout>
