<h2>
    {{ $job->title }}
</h2>
<p>
    <a href="{{ url('/jobs/' . $job->id) }}">{{ $job->title }} is now live</a>
</p>  
<p>
    {{ $job->description }}
</p>  