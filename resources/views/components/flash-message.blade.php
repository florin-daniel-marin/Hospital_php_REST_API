@if(session()->has('message'))
    <div>
       <p class="text-primary ">
        {{session('message')}}
       </p>
    </div>
@endif