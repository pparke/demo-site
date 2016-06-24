{{-- views/link/index --}}

@extends('layouts.app')

@section('content')

<!-- Navigation -->
@include('components.nav', ['items' => ['Home' => '/', 'Blog' => '/blogs']])

@include('components.page_title', ['title' => 'Links'])

<div class="segment bg-forest-green">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        @if (Auth::guest())
        @else
        @include('components.large_button', ['text' => 'Add Link', 'icon' => 'plus', 'hint' => 'Add a new link', 'href' => '/links/create'])
        @endif
      </div>
    </div>
  </div>
</div>

{{-- Link List --}}
@if (count($links) > 0)
  <div class="container">
  @foreach ($links as $link)

  @endforeach
  </div>
@else
  <h1 class="text-center text-muted text-large">Sorry, nothing here yet</h1>
@endif

@endsection
