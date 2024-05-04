<x-layout>
    <x-slot:heading>
        Job create
    </x-slot:heading>
<form  method="POST" action="/jobs">
    @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Create a job.</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600">Some brief details about the job.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <x-form-label for="title">Title</x-form-label>
          <div class="mt-2">
            <x-form-input type="text" name="title" id="title" placeholder="Software Engineer" />
            <div>
              <x-form-error name="title" />
            </div>
          </div>
        </div>
        <div class="sm:col-span-4">

            <x-form-label for="salary">Salary</x-form-label>
            <div class="mt-2">
              <x-form-input type="text" name="salary" id="salary" placeholder="$50,000" />
              <div>
                <x-form-error name="salary" />
              </div>
            </div>
            </div>
          </div>
        <div class="col-span-full">
          <x-form-label for="description" class="mt-10">About the job</x-form-label>
          <div class="mt-2">
            <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  placeholder="Describe the job here...">{{ old('description') }}
            </textarea>
          </div>
          <div>
            <x-form-error name="description" />
          </div>
          
          <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about the job.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6 mr-10">
    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <x-button2 >Save</x-button>
  </div>
</form>

</x-layout>