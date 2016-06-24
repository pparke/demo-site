<?php

namespace App\Http\Controllers;

use App\Blog;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Response;

class BlogController extends BaseController
{

  /**
   * Instantiate a new BlogController instance.
   */
  public function __construct()
  {
    $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
    $blogs = Blog::orderBy('created_at', 'dsc')->get();

    // add a created key containing a formatted date
    $blogs = $blogs->each(function($b){
      $b->created = $b->created_at->toFormattedDateString();
    });

    if ($request->ajax()) {
      return response()->json(['blogs' => $blogs]);
    }
    else {
      return view('blog.index', [
        'blogs' => $blogs
      ]);
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('blog.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // validate the request according to the rules defined on the model
    $this->validate($request, Blog::$createRules);

    // create a new instance
    $blog = $request->user()->blogs()->create([
      'title' => $request->input('title'),
      'content' => strip_tags($request->input('content'), Blog::$allowedTags),
      'slug' => str_slug($request->input('title')),
      'sample' => Blog::text_sample($request->input('content')),
    ]);

    if ($request->ajax()) {
      return response()->json(['blog' => $blog]);
    }
    else {
      return redirect()->route('blogs.index');
    }
  }


  /**
   * Display the specified resource.
   *
   * @param  string   - the slug of the blog to show
   * @return \Illuminate\Http\Response
   */
  public function show($slug)
  {
    // find the blog with the given slug
    $blog = Blog::findBySlug($slug);

    return view('blog.show', [
      'blog' => $blog
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    // find the user with the given id
    $blog = Blog::findBySlug($slug);

    return view('blog.update', [
      'blog' => $blog
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $blog = Blog::find($id);

    $blog->title = $request->input('title');
    $blog->content = $request->input('content');
    $blog->slug = str_slug($request->input('title'));
    $blog->sample = Blog::text_sample($request->input('content'));

    $blog->save();

    if ($request->ajax()) {
      return response()->json(['blog' => $blog]);
    }
    else {
      return redirect()->route('blogs.show', [$blog->slug]);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $id)
  {
    $blog = Blog::find($id);
    $blog->delete();

    if ($request->ajax()) {
      return response()->json([], 200);
    }
    else {
      return redirect()->route('blogs.index');
    }
  }
}
