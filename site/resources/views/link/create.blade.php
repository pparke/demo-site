{{-- views/link/create --}}

@extends('layouts.app')

@section('content')

<!-- Navigation -->
@include('components.nav', ['items' => ['Home' => '/', 'Blog' => '/blogs', 'Links' => '/links']])

@include('components.page_title', ['title' => 'Links'])

@endsection
