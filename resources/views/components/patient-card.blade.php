@props(['patient'])

<x-card>
    <div class="d-flex align-items-center justify-content-center p-5">
        <div class="w-25 text-end">
            <strong>
                <a href="/patients/{{$patient->id}}">  
                    {{$patient->name}}
                </a>
            </strong>
        </div>

         <div class="w-5">
            <x-patient-atspecs :atspecsCsv="$patient->atspec" />
        </div> 

        <div class="w-50">
        <figcaption class="ms-4">
            <strong>Of Doctor: {{$patient->byDoc}} <br> {{$patient->sex}} <br> </strong>
            <span class="text-muted">Phone: {{$patient->phone}} <br>Email {{$patient->email}} <br> </span>
        </figcaption>
        </div>

        <div class="ms-4">
            <p class="w-100 h6">Address {{$patient->address}} <br> Date of birth: {{$patient->dob}}</p>
        </div>

    </div>
</x-card>