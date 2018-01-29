@extends('layout')

@section('title', 'ACCESS: YouTube')

@section('content')

    @include('search')

<div class="row align-center text-center small-up-2 medium-up-3 large-up-4">

    @foreach ($links as $link)

<div class="column">
    <div class="card focus">
       <div class="image">
            <a href="play/{{ $link -> vidId }}" accesskey="{{ $link -> accesskey }}">
                <img src="{{ $link -> thumb }}" alt="{{ $link -> title }}"/>
                <div class="content">
                    <p>{{ $link -> title }}</p>
                </div>
            </a>
        </div>
    </div>
</div>

    @endforeach

</div>

@endsection