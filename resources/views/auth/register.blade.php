<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>
<form  method="POST" action="/register">
    @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <x-form-label for="first">First name</x-form-label>
          <div class="mt-2">
            <x-form-input 
            type="text" 
            name="first_name" 
            id="first_name"
            required />
            <div>
              <x-form-error name="first_name" />
            </div>
          </div>
        </div>
        <div class="sm:col-span-4">
            <x-form-label for="last_name">Last name</x-form-label>
            <div class="mt-2">
              <x-form-input 
              type="text" 
              name="last_name" 
              id="last_name"
              required />
              <div>
                <x-form-error name="last_name" />
              </div>
            </div>
          </div>
          <div class="sm:col-span-4">
            <x-form-label for="email">Email</x-form-label>
            <div class="mt-2">
              <x-form-input  
              name="email" 
              id="email"  
              type="email" 
              required />
              <div>
                <x-form-error name="email" />
              </div>
            </div>
          </div> 
          <div class="sm:col-span-4">
            <x-form-label for="salary">Password</x-form-label>
            <div class="mt-2">
              <x-form-input  name="password" id="password"  type="password"  required/>
              <div>
                <x-form-error name="password" />
              </div>
            </div>
          </div> 
          <div class="sm:col-span-4">
            <x-form-label for="salary">Confirm Password</x-form-label>
            <div class="mt-2">
              <x-form-input 
                type="password" 
                name="password_confirmation" 
                id="password_confirmation"  
                required/>
              <div>
                <x-form-error name="password_confirmation" />
              </div>
            </div>
          </div> 
      </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6 mr-10">
    <a href="{{ route('home') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <x-button2 class="ml-3">Register</x-button>
  </div>
</form>

</x-layout>