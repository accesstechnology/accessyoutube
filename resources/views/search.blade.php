{!! Form::open(array('url' => 'youtube/v')) !!}
<div class="row column search">
  <div class="input-group search {{ $front or 'result'}}">
    <!--<span class="input-group-label"><i class="fi-universal-access large icon"></i></span>-->
    <input class="input-group-field" placeholder="type here" id="v" autofocus="autofocus" autocomplete="off" name="v" type="text">
    <div class="input-group-button">
      <input type="submit" class="button" value="search">
    </div>
  </div>
</div>
{!! Form::close() !!}