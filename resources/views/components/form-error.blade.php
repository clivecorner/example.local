@props(["name" => ""])

@error($name)
<p class="text-sm text-red-600 mt-2 font-bold">{{ $message }}</p>
@enderror