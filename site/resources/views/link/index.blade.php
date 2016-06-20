{{-- views/link/index --}}

@extends('layouts.app')

@section('content')

<!-- Navigation -->
@include('components.nav', ['items' => ['Home' => '/', 'Blog' => '/blogs']])

@include('components.page_title', ['title' => 'Links'])

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
