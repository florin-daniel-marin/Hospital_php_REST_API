@extends('components.layout')
@section('title', 'doctors')
@section('content')
    <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Add doctor into Hospital Database
        </h2>
    </header>

    <div class="registration-form">
        <form method="POST" action="/doctors" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control item" name="name" placeholder="Name" value="{{old('name')}}"/>
                @error('name')
                    <p  class="text-danger font-weight-light" ><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="sex" placeholder="Sex" value="{{old('sex')}}"/>

                @error('sex')
                    <p   class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="spec" placeholder="Specialization" value="{{old('spec')}}"/>

                @error('spec')
                    <p   class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="room" placeholder="Cabinet" value="{{old('room')}}" />

                @error('room')
                    <p  class="text-danger font-weight-light"> <small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="phone" placeholder="Phone" value="{{old('phone')}}"/>

                @error('phone')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="email" placeholder="Email" value="{{old('email')}}"/>

                @error('email')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="address" placeholder="Address" value="{{old('address')}}"/>

                @error('address')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="dob" placeholder="Date of birth" value="{{old('dob')}}"/>

                @error('dob')
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

                @error('photo')
                    <p class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <button
                    class="btn btn-block create-account"
                >
                    Add doctor
                </button>

                <a href="/doctors" class="text-black ml-4 "> Back </a>
            </div>
        </form>
    </div>
    </x-card>
@endsection