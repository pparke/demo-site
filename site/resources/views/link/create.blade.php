{{-- views/link/create --}}

@extends('layouts.app')

@section('content')

<!-- Navigation -->
@include('components.nav', ['items' => ['Home' => '/', 'Blog' => '/blogs', 'Links' => '/links']])

@include('components.page_title', ['title' => 'Links'])

{{-- Create Link Form --}}
<div class="segment bg-green">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <form action="{{ url('links') }}" method="POST" class="form-horizontal">
          {{ csrf_field() }}

          {{-- Title --}}
          <div class="form-group row">
            <label for="link-title" class="col-sm-3 control-label light-label">Title</label>

            <div class="col-sm-6">
              <input type="text" name="title" id="link-title" class="form-control flat-input link-input">
            </div>
          </div>

          {{-- URL --}}
          <div class="form-group row">
            <label for="link-url" class="col-sm-3 control-label light-label">URL</label>

            <div class="col-sm-6">
              <input type="text" name="url" id="link-url" class="form-control flat-input link-input">
            </div>
          </div>

          {{-- Create Button --}}
          <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-lg btn-square btn-light">
                <i class="fa fa-plus"></i> Create
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
