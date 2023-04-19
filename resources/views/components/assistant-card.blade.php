@props(['assistant'])

<x-card>
    <div class="d-flex align-items-center justify-content-center p-5">

        <img src="{{$assistant->photo ? asset('storage/' . $assistant->photo) : asset('images/a.png')}}" class="img-fluid reviews-image" alt="" />

        <div class="w-25 text-end">
            <strong>
                <a href="/assistants/{{$assistant->id}}">  
                    {{$assistant->name}}
                </a>
            </strong>
        </div>

         <div class="w-5">
            <x-assistant-specs :specsCsv="$assistant->spec" />
        </div> 

        <div class="w-50">
        <figcaption class="ms-4">
            <strong> {{$assistant->sex}} <br> </strong>
            <span class="text-muted">Phone: {{$assistant->phone}} <br>Email: {{$assistant->email}} <br> </span>
        </figcaption>
        </div>

        <div class="ms-4">
            <p class="w-100 h6">Address: {{$assistant->address}} <br> Date of birth: {{$assistant->dob}} <br> Account: {{$assistant->hasAccount}}</p>
        </div>

    </div>
</x-card>