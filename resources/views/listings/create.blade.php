<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Add personnel into Hospital Database
        </h2>
        <p class="mb-4">The employee can be a doctor or an assistant</p>
    </header>

    <div class="registration-form">
        <form method="POST" action="/listings" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control item" name="company" placeholder="Company Name" value="{{old('company')}}"/>
                @error('company')
                    <p  class="text-danger font-weight-light" ><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="title" placeholder="Title" value="{{old('title')}}"/>

                @error('title')
                    <p   class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="location" placeholder="Location" value="{{old('location')}}" />

                @error('location')
                    <p  class="text-danger font-weight-light"> <small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="email" placeholder="Email" value="{{old('email')}}"/>

                @error('email')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="website" placeholder="Website" value="{{old('website')}}"/>

                @error('website')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="tags" placeholder="Tags (comma separated)" value="{{old('tags')}}"/>

                @error('tags')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <label for="photo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input
                    type="file"
                    class="form-control border border-gray-200 rounded p-2 w-full"
                    name="photo"
                />

                @error('photo')
                    <p class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Job Description
                </label>
                <textarea
                    class="form-control item"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                    value="{{old('description')}}"
                ></textarea>

                @error('description')
                    <p class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <button
                    class="btn btn-block create-account"
                >
                    Add Personnel
                </button>

                <a href="/" class="text-black ml-4 "> Back </a>
            </div>
        </form>
    </div>
    </x-card>
</x-layout>