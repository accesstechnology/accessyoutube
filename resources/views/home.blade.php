@extends('layout')
@section('title', 'access: youtube')
@section('content')
    @include('title')
    @include('search', ['front' => 'front'])
<div class="row">
    <div class="large-6 large-centered columns text-center">
        <div class="row">
            <!-- Your existing content goes here -->
        </div>
        
        <div class="additional-info" style="margin-top: 100px; padding: 20px; background-color: #f8f8f8; border-radius: 10px;">
            <h5 style="color: #333;">access: youtube is provided by:</h5>
            <a tabindex="-1" href="https://accesstechnology.co.uk" target="_blank">
                <img tabindex="-1" width="200px" src="https://accesstechnology.co.uk/content/images/2024/03/Blue-Light-logo.png" alt="access: technology. working with people. empowering through technology" style="margin: 20px 0;">
            </a>
            
            <div style="margin-top: 20px; font-size: 0.9em; color: #555;">
                <p>We now offer EHCP-funded AT assessments and intervention.</p>
                <p>Contact us at <a href="mailto:domore@accesstechnology.co.uk" style="color: #007bff;">domore@accesstechnology.co.uk</a> to find out more.</p>
                <p style="font-weight: bold; color: #007bff;">#domorewithtechnology</p>
            </div>
        </div>
    </div>
</div>
@endsection
