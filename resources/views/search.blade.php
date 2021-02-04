{!! Form::open(array('url' => 'v')) !!}
<div class="row column search">
  <div class="input-group search  {{ $front ?? 'result'}}">
         
        @if(!isset($front))
        
        <div class="input-group-button" style="width:10%; padding-right:15px">
      <img src="/img/logo.png"></img>
    </div>
    
    @endif
   
    <input class="input-group-field" placeholder="type here" id="v" autofocus="autofocus" autocomplete="off" name="v" type="text">
    <div class="input-group-button">
      <input type="submit" class="button" value="search">
    </div>
  </div>
</div>
{!! Form::close() !!}