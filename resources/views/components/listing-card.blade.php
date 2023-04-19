@props(['listing'])

<x-card>
    <div class="d-flex align-items-center justify-content-center p-5">

        <img src="{{$listing->photo ? asset('storage/' . $listing->photo) : asset('images/a.png')}}" class="img-fluid reviews-image" alt="" />

        <div class="w-50 text-end">
            <strong>
                <a href="/listings/{{$listing->id}}">  
                    {{$listing->title}}
                </a>
            </strong>
        </div>

        <div class="w-5">
            <x-listing-tags :tagsCsv="$listing->tags" />
        </div>

        <div class="w-50">
        <figcaption class="ms-4">
            <strong>{{$listing->company}} <br> {{$listing->website}} <br> </strong>
            <span class="text-muted">{{$listing->email}} <br> {{$listing->location}} <br> </span>
        </figcaption>
        </div>

        <div class="ms-4">
            <p class="w-100" p-3>{{$listing->description}}</p>
        </div>

    </div>
</x-card>