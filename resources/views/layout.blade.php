<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="Access Youtube: An accessible interface for users of assistive technology to search for and play YouTube videos independently.">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.1.1/foundation.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.min.css" rel='stylesheet'>
        <link rel="stylesheet" href="{{env('APP_URL')}}/css/css.css">
    </head>
    <body>

      @yield('content')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.1.1/foundation.min.js"></script>
        <script src="{{env('APP_URL')}}/js/plugins.js"></script>
        <script src="{{env('APP_URL')}}/js/main.js"></script>

        <script>
          if (!("autofocus" in document.createElement("input"))) {
            document.getElementById("v").focus();
          }
        </script>

        <!-- Google Analytics: set GA variable in .env -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','<?php echo getenv('GA');?>','auto');ga('send','pageview');
        </script>
    </body>
</html>