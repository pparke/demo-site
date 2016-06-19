@extends('layouts.app')

@section('content')
<div class="row-fluid top30 page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Blog</h1>
      </div>
    </div>
  </div>
</div>

{{-- Create Blog Form --}}
<div class="segment bg-green">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <form action="{{ url('blog') }}" method="POST" class="form-horizontal">
          {{ csrf_field() }}

          {{-- Title --}}
          <div class="form-group row">
            <label for="blog-title" class="col-sm-3 control-label light-label">Title</label>

            <div class="col-sm-6">
              <input type="text" name="title" id="blog-title" class="form-control flat-input">
            </div>
          </div>

          {{-- Content --}}
          <div class="form-group row">
            <label for="blog-content" class="col-sm-3 control-label light-label">Content</label>

            <div class="col-sm-6">
              <textarea type="text" name="content" id="blog-content" class="form-control flat-input" rows=10></textarea>
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
