{{-- views/welcome --}}

@extends('layouts.app')

@section('content')

<!-- Navigation -->
@include('components.nav', ['items' => ['Home' => '/', 'Blog' => '/blogs', 'Links' => '/links']])

<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<!-- Header -->
<header id="welcome" class="header welcome-header">
 <div class="text-vertical-center">
   <h1 id="time" class="time"></h1>
   <h3>Welcome {{ $user->username }}</h3>
 </div>
</header>

<div class="segment bg-purple">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Activity</h1>
      </div>
    </div>
  </div>
</div>
<div class="container full-page activity">
  {{-- User Activity --}}
  @if (count($blogs) > 0)
    @foreach ($blogs as $blog)
      <div class="row activity-item">
        <div class="col-sm-8 col-sm-push-2">
          <a href="/blogs/{{ $blog->slug }}">
            <h3 class="title"><i class="fa fa-lg fa-file-text-o"></i>{{ $blog->title }}</h3>
          </a>
          <p class="text-muted date"><i class="fa fa-clock-o"></i> {{$blog->created}}</p>
        </div>
        @if(Auth::id() == $blog->user->id)
        <div class="col-sm-2 activity-controls">
            {{-- Delete Button --}}
            <a class="btn btn-square btn-light btn-small bg-red" data-token="{!! csrf_token() !!}" onclick="deleteItem(this, 'blogs', {{ $blog->id }})">Delete</a>
        </div>
        @endif
      </div>
      <hr>
    @endforeach
  @endif
  @if (count($links) > 0)
    @foreach ($links as $link)
      <div class="row activity-item">
        <div class="col-sm-8 col-sm-push-2">
          <a href="{{ $link->url }}">
            <h3 class="title"><i class="fa fa-lg fa-link"></i> {{ $link->title }}</h3>
          </a>
          <p class="text-muted date"><i class="fa fa-clock-o"></i> {{$link->created}}</p>
        </div>
        @if(Auth::id() == $link->user->id)
        <div class="col-sm-2 activity-controls">
            {{-- Delete Button --}}
            <a class="btn btn-square btn-light btn-small bg-red" data-token="{!! csrf_token() !!}" onclick="deleteItem(this, 'links', {{ $link->id }})">Delete</a>
        </div>
        @endif
      </div>
      <hr>
    @endforeach
  @endif
  @if (count($blogs) == 0 && count($links) == 0)
    <div class="row">
      <div class="col-md-12 text-center full-page">
        <h1 class="text-center text-muted text-large">Sorry, nothing here yet</h1>
      </div>
    </div>
  @endif
</div>

<script type="text/javascript">
$(document).ready(function() {
  // set the background of the welcome page
  // according to what time it is
  var hour = new Date().getHours();
  if (hour >= 5 && hour < 10) {
    $('#welcome').addClass('morning');
  }
  else if (hour >= 10 && hour < 19) {
    $('#welcome').addClass('day');
  }
  else if (hour >= 19 || hour < 5) {
    $('#welcome').addClass('evening');
  }
  tick();
});

/*
 * Delete an activity item
 */
function deleteItem(btn, route, id) {
  var token = $(btn).data('token');
  // send update
  fetch('/' + route + '/' + id, {
    credentials: 'same-origin',
    method: 'DELETE',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'X-CSRF-TOKEN': token
    }
  })
  .then(function (response) {
    return response.json();
  })
  .then(function (data) {
    $(btn).parents('.activity-item').remove();
  });
}

/**
 * Update the time display each minute
 */
function tick() {
  var now = new Date();
  var hours = now.getHours() === 0 ? 12 : (now.getHours() % 12);
  var minutes = now.getMinutes() < 10 ? '0' + now.getMinutes() : now.getMinutes();
  $('#time').text(hours + ':' + minutes);
  setTimeout(function () {
    console.log('tick');
    tick();
  }, (60 - now.getSeconds())*1000);
}

</script>
@endsection
