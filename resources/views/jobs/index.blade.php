<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
    <div>
    @foreach ($jobs as $job )

        <a href="/jobs/{{ $job['id'] }}" class="block  px-4 py-6 border border-gray-200 rounded-lg">
            <div class="font-bold text-xl mb-2 text-blue-600">
               <strong> {{ $job->employer->name }}</strong>
            </div>
            <div>
                <strong>{{$job['title']}} :</strong> Pays  {{ $job['salary'] }}
            </div>
        </a>
    @endforeach
</div>
<div>
    {{ $jobs->links() }}
</div>
</x-layout>
