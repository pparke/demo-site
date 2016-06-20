<?php

namespace App\Http\Controllers;

use App\Blog;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class BlogController extends BaseController
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $blogs = Blog::orderBy('created_at', 'asc')->get();

    return view('blog.index', [
      'blogs' => $blogs
    ]);
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
    $request->user()->blogs()->create([
      'title' => $request->title,
      'content' => $request->content,
      'slug' => str_slug($request->title),
      'sample' => str_finish(implode(" ", array_slice(explode(" ", $request->content, 40), 0, -1)), "..."),
    ]);
  }


  /**
   * Display the specified resource.
   *
   * @param  string   - the slug of the blog to show
   * @return \Illuminate\Http\Response
   */
  public function show($slug)
  {
    // find the user with the given id
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

    $blog->title = $request->title;
    $blog->content = $request->content;
    $blog->slug = str_slug($request->title);
    $blog->sample = str_finish(implode(" ", array_slice(explode(" ", $request->content, 40), 0, -1)), "...");

    $blog->save();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $blog = Blog::find($id);

    $blog->delete();
  }
}
