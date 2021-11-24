@extends('layout')

@section('title', 'access: youtube')

@section('content')

    @include('search')

<div class="row align-center text-center small-up-2 medium-up-3 large-up-4">
<h1>Search Results</h1>
    @foreach ($links as $link)

<div class="column">
    <div class="card focus">
       <div class="image">
            <a href="play/{{ $link -> vidId }}" accesskey="{{ $link -> accesskey }}">
                <img src="{{ $link -> thumb }}" alt="{{ $link -> title }}"/>
                <div class="content">
                    <h2>{{ $link -> title }}</h2>
                </div>
            </a>
        </div>
    </div>
</div>

    @endforeach

</div>

@endsection