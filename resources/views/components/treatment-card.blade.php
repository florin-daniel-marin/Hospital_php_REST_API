@props(['treatment'])

<x-card>
    <div class="d-flex align-items-center justify-content-center p-5">
        <div class="w-25 text-end">
            <strong>
                <a href="/treatments/{{$treatment->id}}">  
                    Treatment nr: {{$treatment->name}}
                </a>
            </strong>
        </div>

         <div class="w-5">
            <x-treatment-types :typesCsv="$treatment->type" />
                <?php
                $treatment = App\Models\Treatment::find(1);
                $byWho = $treatment->byWho;
                ?>
                {{$byWho->name ?? "none"}}
        </div> 

        <div class="w-50">
        <figcaption class="ms-4">
            <strong>Recommended by: {{$treatment->byWho_type}} <br> With Id: {{$treatment->byWho_id}} <br> </strong>
            <span class="text-muted">Problem: {{$treatment->problem}} <br>Medicine: {{$treatment->medicine}} <br> </span>
        </figcaption>
        </div>

        <div class="ms-4">
            <p class="w-100 h6">Period (days) {{$treatment->period}} <br> Cost (lei): {{$treatment->cost}} <br> Begin date: {{$treatment->begin_date}}</p>
        </div>

    </div>
</x-card>