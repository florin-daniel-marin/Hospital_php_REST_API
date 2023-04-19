@extends('components.layout')
@section('title', 'treatments')
@section('content')
    <x-card class="p-5">
        <h2>

            Name of treatment: {{$treatment->name}}
        </h2>
        <div class="ms-4">
            in
        </div>
        <div>
             <x-treatment-types :typesCsv="$treatment->type"  treatment/> 
        </div>

        <div class="w-50">
        <figcaption class="ms-4">
            <strong>Recommended by: {{$treatment->byWho}} <br> with id: {{$treatment->byWho_id}} <br> </strong>
            <span class="text-muted">Problem: {{$treatment->problem}} <br> Medicine: {{$treatment->medicine}} <br> </span>
        </figcaption>
        </div>

        <div class="ms-4 h6">
            <p class="h6"> Period (days): {{$treatment->period}} 
                <br> Cost (lei): {{$treatment->cost}} 
                <br> Begin date: {{$treatment->begin_date}}</p>
        </div>
    </x-card>

    {{-- EDIT button --}}
    <x-card class="d-flex justify-content-center">
        <button type="button" class="btn btn-outline-primary btn-block">
            <a href="{{ route('treatments.edit', [$treatment->id]) }}">
            <span class="bi-&#xF4DD">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                </svg>
            </span>
            Edit Treatment
            </a>

            {{-- DELETE button --}}
            <form method="POST" action="/treatments/{{$treatment->id}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger btn-block">
                    <span class="bi-&#xF4DD">
                        <a class="link-dangers">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            Delete Treatment
                        </a>
                    </span>
                </button>
            </form>
        </button>
    </x-card>


@endsection