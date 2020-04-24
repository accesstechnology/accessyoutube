@extends('layout')

@section('title', 'Access : YouTube')

@section('content')


    @include('title')
    @include('search', ['front' => 'front'])


<div class="row">
    <div class="large-6 large-centered columns text-center">
        <div>
            <div class="row">

</div>

</br></br></br>         
            <h4>Access : YouTube is provided by:</h4>
           <a tabindex="-1" href="https://accesstechnology.co.uk" target="_blank"><img tabindex="-1"  src="{{env('APP_URL')}}/img/accessTechnology.png" alt="access technology. working with people. empowering through technology"/></a>
            <p class="sub">Access : technology is an assistive technology consultancy service specialising in supporting clients with brain injuries within the medico-legal sector.</p >
    </div>
    </br></br>
    <div>
        <p>Originally supported by:</p>
        <a tabindex="-1" href="http://henshaws.ac.uk" target="_blank"><img style="width:200px" src="{{env('APP_URL')}}/img/henshaws.png" alt="henshaws college"></a> &  <a tabindex="-1" href="http://jisc.ac.uk" target="_blank"><img tabindex="-1" style="width:78px" src="{{env('APP_URL')}}/img/jisc.jpg" alt="jisc"></a>
        
    </div>
</div>




@endsection