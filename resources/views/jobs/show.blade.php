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
</x-layout>
