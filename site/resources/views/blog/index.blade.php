{{-- views/blog/index --}}

@extends('layouts.app')

@section('content')

  <!-- Navigation -->
  @include('components.nav', ['items' => ['Home' => '/', 'Links' => '/links']])

  @include('components.page_title', ['title' => 'Blog'])

  {{-- Blog List --}}
  @if (count($blogs) > 0)
    <div class="container">
    @foreach ($blogs as $blog)
      <div class="row">
        <div class="col-sm-4"><a href="#" class=""><img src="http://placehold.it/1280X720" class="img-responsive"></a>
        </div>
        <div class="col-sm-8">
          <h3 class="title">{{ $blog->title }}</h3>
          <p class="text-muted"><i class="fa fa-clock-o"></i> {{$blog->created_at}}</p>
          <p>{{ $blog->sample }}</p>

          <p class="text-muted">by <a href="#">{{ $blog->user->username }}</a></p>

        </div>
      </div>
      <hr>
    @endforeach
    </div>
  @else
    <h1 class="text-center text-muted text-large">Sorry, nothing here yet</h1>
  @endif
@endsection
