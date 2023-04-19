@extends('components.layout')
@section('title', 'treatments')
@section('content')
    <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Edit treatment
        </h2>
        <p class="mb-4">Edit treatment with name: {{$treatment->name}}</p>
    </header>

    <div class="registration-form">
        <form method="POST" action="/treatments/{{$treatment->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            Name
            <div class="form-group">
                <input type="text" class="form-control item" name="name" value="{{$treatment->name}}"/>
                @error('name')
                    <p  class="text-danger font-weight-light" ><small> {{$message}}</small></p>
                @enderror
            </div>

            Type
            <div class="form-group">
                <input type="text" class="form-control item" name="type" value="{{$treatment->type}}"/>

                @error('tpe')
                    <p   class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Recommended by: Doctor | Assistant
            <div class="form-group">
                <input type="text" class="form-control item" name="byWho"  value="{{$treatment->byWho}}" />

                @error('byWho')
                    <p  class="text-danger font-weight-light"> <small> {{$message}}</small></p>
                @enderror
            </div>

            Recommended by: id
            <div class="form-group">
                <input type="text" class="form-control item" name="byWho_id" value="{{$treatment->byWho_id}}"/>

                @error('byWho_id')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Problem (short description)
            <div class="form-group">
                <input type="text" class="form-control item" name="problem" value="{{$treatment->problem}}"/>

                @error('problem')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Medicine applied
            <div class="form-group">
                <input type="text" class="form-control item" name="medicine" value="{{$treatment->medicine}}"/>

                @error('medicine')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Period (days)
            <div class="form-group">
                <input type="text" class="form-control item" name="period" value="{{$treatment->period}}"/>

                @error('period')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Cost (lei)
            <div class="form-group">
                <input type="text" class="form-control item" name="cost" value="{{$treatment->cost}}"/>

                @error('cost')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            Begin date
            <div class="form-group">
                <input type="text" class="form-control item" name="begin_date" placeholder="(default:none)" value="{{$treatment->begin_date}}"/>

                @error('begin_date')
                    <p  class="text-danger font-weight-light "><small> {{$message}}</small></p>
                @enderror
            </div>

            <div class="form-group">
                <button
                    class="btn btn-block create-account"
                >
                    Edit treatment
                </button>

                <a href="/treatments/" class="text-black ml-4 "> Back </a>
            </div>
        </form>
    </div>
    </x-card>
@endsection