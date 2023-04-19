<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Edit personnel
        </h2>
        <p class="mb-4">Edit: {{$listing->title}}</p>
    </header>

    <div class="registration-form">
        <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            Company
            <div class="form-group">
                <input type="text" class="form-control item" name="company" placeholder="Company Name" value="{{$listing->company}}"/>
                @error('company')
                    <p  class="text-danger font-weight-light" ><small> {{$message}}</small></p>
                @enderror
            </div>

            Title
            <div class="form-group">
                <input type="text" class="form-control item" name="title" placeholder="Title" value="{{$listing->title}}"/>

                @error('title')
                    <p   class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Location
            <div class="form-group">
                <input type="text" class="form-control item" name="location" placeholder="Location" value="{{$listing->location}}" />

                @error('location')
                    <p  class="text-danger font-weight-light"> <small> {{$message}}</small></p>
                @enderror
            </div>

            Email
            <div class="form-group">
                <input type="text" class="form-control item" name="email" placeholder="Email" value="{{$listing->email}}"/>

                @error('email')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Website
            <div class="form-group">
                <input type="text" class="form-control item" name="website" placeholder="Website" value="{{$listing->website}}"/>

                @error('website')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Tags
            <div class="form-group">
                <input type="text" class="form-control item" name="tags" placeholder="Tags (comma separated)" value="{{$listing->tags}}"/>

                @error('tags')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <label for="photo" class="inline-block text-lg mb-2">
                    Photo
                </label>
                <input
                    type="file"
                    class="form-control border border-gray-200 rounded p-2 w-full"
                    name="photo"
                />

                <img src="{{$listing->photo ? asset('storage/' . $listing->photo) : asset('images/a.png')}}" class="img-fluid reviews-image" alt="" />

                @error('photo')
                    <p class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Description
                </label>
                <textarea
                    class="form-control item"
                    name="description"
                    rows="10"
                >{{$listing->description}}</textarea>

                @error('description')
                    <p class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <button
                    class="btn btn-block create-account"
                >
                    Edit Personnel
                </button>

                <a href="/" class="text-black ml-4 "> Back </a>
            </div>
        </form>
    </div>
    </x-card>
</x-layout>