{{-- views/blog/index --}}

@extends('layouts.app')

@section('content')

  <!-- Navigation -->
  @include('components.nav', ['items' => ['Home' => '/', 'Links' => '/links']])

  @include('components.page_title', ['title' => 'Blog'])

  <div class="segment bg-blue">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          @if (Auth::guest())
          @else
          @include('components.large_button', ['text' => 'Create Blog', 'icon' => 'plus', 'hint' => 'Create a new blog entry', 'href' => '/blogs/create'])
          @endif
        </div>
      </div>
    </div>
  </div>

  {{-- Blog List --}}
  @if (count($blogs) > 0)
    <div class="container blog-list">
    @foreach ($blogs as $blog)
      <div class="row">
        <div class="col-sm-8 col-sm-push-2">
          <a href="/blogs/{{ $blog->slug }}">
            <h3 class="title">{{ $blog->title }}</h3>
          </a>
          <p class="text-muted date"><i class="fa fa-clock-o"></i> {{$blog->created}}</p>
          <p class="sample">{{ $blog->sample }}</p>

          <p class="text-muted author">by {{ $blog->user->username }}</p>

        </div>
      </div>
      <hr>
    @endforeach
    </div>
  @else
    <h1 class="text-center text-muted text-large">Sorry, nothing here yet</h1>
  @endif
@endsection
