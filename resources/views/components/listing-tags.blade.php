@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);

@endphp

<ul>
    @foreach($tags as $tag)
    <span class="badge bg-info"><a href="/?tag={{$tag}}">{{$tag}}</a></span>
    @endforeach

</ul>
