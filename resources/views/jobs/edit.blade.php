<x-layout>
    <x-slot:heading>Edit Job</x-slot:heading>
    <form  method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base font-semibold leading-7 text-gray-900">Create a job.</h2>
          <p class="mt-1 text-sm leading-6 text-gray-600">Some brief details about the job.</p>
    
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
              <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
              <div class="mt-2">
                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                  <input type="text"
                         value="{{ $job->title }}" 
                         name="title" 
                         id="title" 
                         class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                         placeholder="Software Engineer"
                         >
    
                </div>
                <div>
                  @error('title')
                  <p class="text-sm text-red-600 mt-2 font-bold">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>
            <div class="sm:col-span-4">
                <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                <div class="mt-2">
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text"
                           value="{{ $job->salary }}" 
                           name="salary" 
                           id="salary" 
                           class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                           placeholder="$50,000"
                           >
                  </div>
                  <div>
                    @error('salary')
                    <p class="text-sm text-red-600 mt-2 font-bold">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                </div>
              </div>
            <div class="col-span-full">
              <label for="description" class="block text-sm font-medium leading-6 text-gray-900 mt-10">About the job</label>
              <div class="mt-2">
                <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  placeholder="Describe the job here...">{{ $job->description }}
                </textarea>
              </div>
              <div>
                @error('description')
                <p class="text-sm text-red-600 mt-2 font-bold">{{ $message }}</p>
                @enderror
              </div>
              
              <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about the job.</p>
            </div>
          </div>
        </div>
      </div>
    
      <div class="mt-6 flex items-center justify-between gap-x-6 mr-10 ml-10">
        <div>
          <button  class="text-red-500 text-sm font-bold " form="delete-form">Delete</button>
        </div>
        <div flex items-center  gap-x-6 mr-10>
              <x-button 
                href="/jobs/{{ $job->id }}" 
                class="text-sm font-semibold leading-6 text-gray-900">
                Cancel
              </x-button>
              <button 
                type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Update
              </button>
        </div>
      </div>
    </form>
    <form method="POST"  action="/jobs/{{ $job->id }}"  class="hidden" id="delete-form">
      @csrf
      @method('DELETE')
      <button type="submit">Delete</button>
  </form>
</x-layout>