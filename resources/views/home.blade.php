@extends('layout')

@section('title', 'ACCESS: YouTube')

@section('content')


    @include('title')
    @include('search', ['front' => 'front'])


<div class="row">
    <div class="large-6 large-centered columns text-center">
        <div>
            <h4 class="popular">Access: YouTube is having some major issues as Google have reduced our daily YouTube search quota from 3,000,000 to zero! I'm actively working with Google in trying to resolve this. As a result some days the site will work, and some days it won't. Bear with me! Mike </h4>
        </div>
    </div>
</div>




@endsection