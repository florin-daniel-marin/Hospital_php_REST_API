@extends('components.layout')
@section('title', 'treatments')
@section('content')
    <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Add treatment into Hospital Database
        </h2>
    </header>

    <div class="registration-form">
        <form method="POST" action="/treatments" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control item" name="name" placeholder="Name" value="{{old('name')}}"/>
                @error('name')
                    <p  class="text-danger font-weight-light" ><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="type" placeholder="Used for type" value="{{old('type')}}"/>

                @error('type')
                    <p   class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="byWho" placeholder="Recommened by: Doctor/Assistant" value="{{old('byWho')}}"/>

                @error('byWho')
                    <p   class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="byWho_id" placeholder="Medical personnel id" value="{{old('byWho_id')}}" />

                @error('byWho_id')
                    <p  class="text-danger font-weight-light"> <small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="problem" placeholder="Problem" value="{{old('problem')}}"/>

                @error('problem')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="medicine" placeholder="Medicine" value="{{old('medicine')}}"/>

                @error('medicine')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="period" placeholder="Period (in days)" value="{{old('period')}}"/>

                @error('period')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="cost" placeholder="Cost (lei)" value="{{old('cost')}}"/>

                @error('cost')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="begin_date" placeholder="Begin date" value="{{old('begin_date')}}"/>

                @error('begin_date')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <button
                    class="btn btn-block create-account"
                >
                    Add treatment
                </button>

                <a href="/treatments" class="text-black ml-4 "> Back </a>
            </div>
        </form>
    </div>
    </x-card>
@endsection