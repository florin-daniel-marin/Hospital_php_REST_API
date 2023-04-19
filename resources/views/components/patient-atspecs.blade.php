 @props(['atspecsCsv']) 

 @php
    $atspecs = explode(',', $atspecsCsv);

@endphp 

<ul>
    @foreach($atspecs as $atspec)
    <span class="badge bg-info"><a href="/assistants/?atspec={{$atspec}}">{{$atspec}}</a></span>
    @endforeach

</ul>
