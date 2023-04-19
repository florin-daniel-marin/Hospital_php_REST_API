@props(['doctor'])

<x-card>
    <div class="d-flex align-items-center justify-content-center p-5">

        <img src="{{$doctor->photo ? asset('storage/' . $doctor->photo) : asset('images/a.png')}}" class="img-fluid reviews-image" alt="" />

        <div class="w-25 text-end">
            <strong>
                <a href="/doctors/{{$doctor->id}}">  
                    {{$doctor->name}}
                </a>
            </strong>
        </div>

         <div class="w-5">
            <x-doctor-specs :specsCsv="$doctor->spec" />
        </div> 

        <div class="w-50">
        <figcaption class="ms-4">
            <strong>Cabinet: {{$doctor->room}} <br> {{$doctor->sex}} <br> </strong>
            <span class="text-muted">Phone: {{$doctor->phone}} <br>Email {{$doctor->email}} <br> </span>
        </figcaption>
        </div>

        <div class="ms-4">
            <p class="w-100 h6">Address {{$doctor->address}} <br> Date of birth: {{$doctor->dob}} <br> Account: {{$doctor->hasAccount}}</p>
        </div>

    </div>
</x-card>