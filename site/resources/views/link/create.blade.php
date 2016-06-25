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

          {{-- Tags --}}
          <div class="form-group row">
            <label for="link-tags" class="col-sm-3 control-label light-label">Tags</label>

            <div class="col-sm-6">
              <div id="tag-display" class="link-tags-container">
                <input type="text" id="new-tag" class="tag-input">
              </div>
              <input id="link-tags" type="text" name="tags" value="" class="hidden">
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

<script>
  // focus the input when the user clicks on the tag-display element
  // to simulate textarea behaviour
  $('#tag-display').click(function() {
       $('#new-tag').focus();
  });

  (function() {
    var tags = [];
    $('#new-tag').keyup(function(e) {
      // spacebar pressed
      if (e.which === 32) {
        var val = $(this).val().trim();

        var wrapped = '<span class="tag label label-info">' + val + '</span>';

        $(this).before(wrapped).val('');
        tags.push(val);
        $('#link-tags').val(tags.join(' '));
      }
      // backspace
      else if (e.which === 8) {
        if ($(this).val() === '') {
          var tag = tags.pop();
          $(this).siblings(':contains('+tag+')').remove();
          $('#link-tags').val(tags.join(' '));
        }
      }
    });
  })();

</script>

@endsection
