{{-- views/blog/show --}}

@extends('layouts.app')

@section('content')

<!-- Navigation -->
@include('components.nav', ['items' => ['Home' => '/', 'Blog' => '/blogs', 'Links' => '/links']])

<div class="segment bg-slate">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center blog-header">
        <h1>{{ $blog->title }}</h1>
        <h4>by {{ $blog->user->username }}</h4>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-5 col-md-6 col-sm-8 blog-content">
      <p>{!! $blog->content !!}</p>
    </div>
  </div>
</div>

@if(Auth::guest())
@else
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="blog-controls">
        <form action="/blogs/{{ $blog->id }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

          <button class="btn btn-square btn-dark">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endif

<script>
  var title = $('#blog-header').text();
  var image = 'http://placehold.it/2000x1200';
  $('#blog-header').css({
    'background': 'url(' + image + ')',
    'background-size': 'cover'
  });
</script>

@endsection
