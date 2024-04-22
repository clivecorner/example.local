<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
<p>{{ $job->employer->name }}</p>
<p >{{ $job['title'] }}</p>
This job pays ${{ $job['salary'] }} per year
</x-layout>
