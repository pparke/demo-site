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
  <div class="card-group link-list">
    @foreach ($links as $link)
    <div class="card link-card">
      @if ($link->image)
      <a href="{{ $link->url }}" target="_blank">
        <img class="card-img-top" src="{{ $link->image }}" alt="{{ $link->title }}">
      </a>
      @endif
      <div class="card-block">
        <a href="{{ $link->url }}" target="_blank">
          <h3 class="card-title title">{{ $link->title }}</h3>
        </a>
        <p class="card-text date"><small class="text-muted">{{ $link->created }}</small></p>
        <p class="card-text description">{{ $link->description }}</p>
        <p class="text-muted author">posted by {{ $link->user->username }}</p>
        {{-- Delete Button --}}
        @if(Auth::id() == $link->user->id)
          <a class="btn btn-square btn-light btn-small bg-red" data-token="{!! csrf_token() !!}" onclick="deleteLink(this, {{ $link->id }})">Delete</a>
        @endif
        {{-- Tags --}}
        <div class="tags">
          @foreach ($link->tags as $tag)
            <span class="tag label label-info">{{ $tag->title }}</span>
          @endforeach
        </div>
      </div>
    </div>
    <hr>
    @endforeach
  </div>
</div>
@else
  <h1 class="text-center text-muted text-large">Sorry, nothing here yet</h1>
@endif

<script>
  function deleteLink(btn, id) {
    var token = $(btn).data('token');
    // send update
    fetch('/links/' + id, {
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
      $(btn).parents('.card.link-card').remove();
    });
  }
</script>

@endsection
