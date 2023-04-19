 @props(['typesCsv']) 

 @php
    $types = explode(',', $typesCsv);

@endphp 

<ul>
    @foreach($types as $type)
    <span class="badge bg-info"><a href="/treatments/?type={{$type}}">{{$type}}</a></span>
    @endforeach
</ul>
