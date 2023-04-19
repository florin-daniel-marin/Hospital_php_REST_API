@extends('components.layout')
@section('title', 'patients')
@section('content')
    <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Edit patient
        </h2>
        <p class="mb-4">Edit: {{$patient->name}}</p>
    </header>

    <div class="registration-form">
        <form method="POST" action="/patients/{{$patient->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            Name
            <div class="form-group">
                <input type="text" class="form-control item" name="name" value="{{$patient->name}}"/>
                @error('name')
                    <p  class="text-danger font-weight-light" ><small> {{$message}}</small></p>
                @enderror
            </div>

            Specialization
            <div class="form-group">
                <input type="text" class="form-control item" name="atspec" value="{{$patient->atspec}}"/>

                @error('atspec')
                    <p   class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Sex
            <div class="form-group">
                <input type="text" class="form-control item" name="sex"  value="{{$patient->sex}}" />

                @error('sex')
                    <p  class="text-danger font-weight-light"> <small> {{$message}}</small></p>
                @enderror
            </div>

            Phone
            <div class="form-group">
                <input type="text" class="form-control item" name="phone" value="{{$patient->phone}}"/>

                @error('phone')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Email
            <div class="form-group">
                <input type="text" class="form-control item" name="email" value="{{$patient->email}}"/>

                @error('email')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Address
            <div class="form-group">
                <input type="text" class="form-control item" name="address" value="{{$patient->address}}"/>

                @error('address')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Date of birth
            <div class="form-group">
                <input type="text" class="form-control item" name="dob" value="{{$patient->dob}}"/>

                @error('dob')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Patient fro doctor:
            <div class="form-group">
                <input type="text" class="form-control item" name="byDoc" placeholder="(default:none)" value="{{$patient->byDoc}}"/>

                @error('byDoc')
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

                <img src="{{$patient->photo ? asset('storage/' . $patient->photo) : asset('images/a.png')}}" class="img-fluid reviews-image" alt="" />

                @error('photo')
                    <p class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>


            <div class="form-group">
                <button
                    class="btn btn-block create-account"
                >
                    Edit patient
                </button>

                <a href="/patients/" class="text-black ml-4 "> Back </a>
            </div>
        </form>
    </div>
    </x-card>
@endsection