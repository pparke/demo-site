{{-- views/blog/show --}}

@extends('layouts.app')

@section('content')

<!-- Navigation -->
@include('components.nav', ['items' => ['Home' => '/', 'Blog' => '/blogs', 'Links' => '/links'], 'backhref' => '/blogs'])

<div class="segment bg-slate">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center blog-header">
        <h1 id="blog-title">{{ $blog->title }}</h1>
        <h4>by {{ $blog->user->username }}</h4>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-5 col-md-6 col-sm-8 blog-content">
      <div id="blog-content">{!! $blog->content !!}</div>
    </div>
  </div>
</div>

@if(Auth::guest())
@elseif(Auth::id() == $blog->user->id)
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="blog-controls">
        <form action="/blogs/{{ $blog->id }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

          <a id="edit-button" class="btn btn-square btn-light bg-light-blue">Edit</a>
          <a id="save-button" class="btn btn-square btn-light bg-green">Save</a>
          <a id="cancel-button" class="btn btn-square btn-light bg-yellow">Cancel</a>
          <button class="btn btn-square btn-dark bg-red">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endif

<script src="//cdn.jsdelivr.net/medium-editor/latest/js/medium-editor.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/medium-editor/latest/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
<meta name="_token" content="{!! csrf_token() !!}" />
<meta name="_id" content="{{ $blog->id }}" />

<script>
$('#save-button').hide();
$('#cancel-button').hide();
$('#edit-button').click(makeEditable);
$('#save-button').click(saveChanges);
$('#cancel-button').click(cancelChanges);

var title, content;

/*
 * Replace the displayed title and content with editable fields
 * and show the save and cancel buttons
 */
function makeEditable (items) {
  var titleElem = $('#blog-title');
  var contentElem = $('#blog-content');

  // save the current text
  title = titleElem.text();
  content = contentElem.text();

  // replace the existing title and content with editable fields
  titleElem.replaceWith('<input type="text" name="title" id="edit-title" class="form-control blog-edit-title blog-title-input" autocomplete="off">');
  $('#edit-title').val(title);

  contentElem.replaceWith('<div id="edit-content"><textarea type="text" name="content" id="medium-target" class="form-control medium-editor-input" rows=10></textarea></div>')
  $('#medium-target').val(content);

  // hide the edit button and show the save button
  $('#edit-button').hide();
  $('#save-button').show();
  $('#cancel-button').show();

  // attach medium editor
  var editor = new MediumEditor('#medium-target', {
    toolbar: {
      buttons: ['bold', 'italic', 'underline', 'anchor', 'h2', 'h3', 'quote', 'justifyLeft', 'justifyCenter', 'justifyRight'],
    }
  });
}

/*
 * Save the current changes asynchronously, replace the current content
 * on the page with the returned data and swap out the displayed elements
 */
function saveChanges () {
  // get the id of the blog
  var id = $('meta[name="_id"]').attr('content');

  // disable the save button
  $('#save-button').prop('disabled', true);

  // send update
  fetch('/blogs/' + id, {
    credentials: 'same-origin',
    method: 'PUT',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    },
    body: JSON.stringify({
      title: $('#edit-title').val(),
      content: $('#medium-target').val()
    })
  })
  .then(function (response) {
    return response.json();
  })
  .then(function (data) {
    // swap out the elements
    $('#edit-title').replaceWith('<h1 id="title">' + data.blog.title + '</h1>');
    $('#edit-content').replaceWith('<div id="content">' + data.blog.content + '</div>');

    // show the edit button and hide the save button
    $('#edit-button').show();
    $('#save-button').hide().prop('disabled', false);
    $('#cancel-button').hide();
  });
}

/*
 * Cancel the current changes by reverting the title and content
 * and swapping out the buttons
 */
function cancelChanges () {
  $('#edit-title').replaceWith('<h1 id="title">' + title + '</h1>');
  $('#edit-content').replaceWith('<div id="content">' + content + '</div>');
  // show the edit button and hide the save button
  $('#edit-button').show();
  $('#save-button').hide();
  $('#cancel-button').hide();
}

</script>

@endsection
