@extends('components.layout')
@section('title', 'assistants')
@section('content')
    <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Edit assistant
        </h2>
        <p class="mb-4">Edit: {{$assistant->name}}</p>
    </header>

    <div class="registration-form">
        <form method="POST" action="/assistants/{{$assistant->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            Name
            <div class="form-group">
                <input type="text" class="form-control item" name="name" value="{{$assistant->name}}"/>
                @error('name')
                    <p  class="text-danger font-weight-light" ><small> {{$message}}</small></p>
                @enderror
            </div>

            Specialization
            <div class="form-group">
                <input type="text" class="form-control item" name="spec" value="{{$assistant->spec}}"/>

                @error('spec')
                    <p   class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Sex
            <div class="form-group">
                <input type="text" class="form-control item" name="sex"  value="{{$assistant->sex}}" />

                @error('sex')
                    <p  class="text-danger font-weight-light"> <small> {{$message}}</small></p>
                @enderror
            </div>

            Phone
            <div class="form-group">
                <input type="text" class="form-control item" name="phone" value="{{$assistant->phone}}"/>

                @error('phone')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Email
            <div class="form-group">
                <input type="text" class="form-control item" name="email" value="{{$assistant->email}}"/>

                @error('email')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Address
            <div class="form-group">
                <input type="text" class="form-control item" name="address" value="{{$assistant->address}}"/>

                @error('address')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Date of birth
            <div class="form-group">
                <input type="text" class="form-control item" name="dob" value="{{$assistant->dob}}"/>

                @error('dob')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Account
            <div class="form-group">
                <input type="text" class="form-control item" name="hasAccount" placeholder="(default:none)" value="{{$assistant->hasAccount}}"/>

                @error('hasAccount')
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

                <img src="{{$assistant->photo ? asset('storage/' . $assistant->photo) : asset('images/a.png')}}" class="img-fluid reviews-image" alt="" />

                @error('photo')
                    <p class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>


            <div class="form-group">
                <button
                    class="btn btn-block create-account"
                >
                    Edit assistant
                </button>

                <a href="/assistants/" class="text-black ml-4 "> Back </a>
            </div>
        </form>
    </div>
    </x-card>
@endsection