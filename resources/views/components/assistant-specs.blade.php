 @props(['specsCsv']) 

 @php
    $specs = explode(',', $specsCsv);

@endphp 

<ul>
    @foreach($specs as $spec)
    <span class="badge bg-info"><a href="/assistants/?spec={{$spec}}">{{$spec}}</a></span>
    @endforeach

</ul>
