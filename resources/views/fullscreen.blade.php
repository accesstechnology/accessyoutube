@extends('layout')

@section('title', 'access: youtube')


@section('content')

    <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
    <div class="videoWrapper" style="margin-top: 0px !important;">
    <div class="video">
      <div id="player"></div>
    </div>
    </div>

    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          width: '100%',
          height: '100%',
          videoId: '{{ $vidId }}',
          suggestedQuality: 'large',
          playerVars: {
            'autoplay': 1,
            'controls': 1,
            'disablekb': 0,
            'fs': 0,
            'iv_load_policy': 3,
            'modestbranding': 1,
            'rel': 0,
            'showinfo': 0
          },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.

      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING) {
        $("#play").click(pauseVideo);
        }

        else {
            $("#play").click(playVideo);
        }
      }


       function pauseVideo() {
        player.pauseVideo();
      }


           function playVideo() {
        player.playVideo();
      }


    </script>

@endsection