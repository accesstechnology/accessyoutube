@extends('layout')

@section('title', 'ACCESS: YouTube')

@section('content')


    @include('title')
    @include('search', ['front' => 'front'])


<div class="row">
    <div class="large-6 large-centered columns text-center">
        <div>
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
            <!--<h4 class="popular">Access: YouTube is having some major issues as Google have reduced our daily YouTube search quota from 3,000,000 to zero! I'm actively working with Google in trying to resolve this. As a result some days the site will work, and some days it won't. Bear with me! Mike </h4>-->
        </div>
    </div>
</div>




@endsection