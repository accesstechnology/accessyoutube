@extends('layout')

@section('title', 'ACCESS: YouTube')

@section('content')


    @include('title')
    @include('search', ['front' => 'front'])


<div class="row">
    <div class="large-6 large-centered columns text-center">
        <div>
            <h4 class="popular">Most popular videos on YouTube</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="medium-10 medium-centered columns">
        <div class="row align-center text-center small-up-2 medium-up-4 large-up-4">
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
    </div>
</div>


@endsection