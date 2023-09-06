@props(['tagsCsv']) 
@php
    $tags = explode(',', $tagsCsv);
    
@endphp


<ul class="flex gap-2">
    @foreach ($tags as $tag)
    <li class="bg-black text-white rounded-xl p-2 ">
        <a href="/?tag={{$tag}}">{{$tag}}</a>
    </li>
    @endforeach

</ul>
