<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

use App\Blog;

class BlogController extends BaseController
{
  /**
   * Create a new blog
   */
  public function store(Request $request)
  {

    // validate the request according to the rules defined on the model
    $validation = Validator::make($request->all(), Blog::$createRules);

    // send a response indicating failure
    if ($validation->fails()) {
      return $this->sendValidationFailed($validation->messages()->toArray());
    }

    // create a new instance
    $request->user()->blogs()->create([
      'title' => $request->title,
      'content' => $request->content,
      'slug' => str_slug($request->title),
      'sample' => str_finish(implode(" ", array_slice(explode(" ", $request->content, 40), 0, -1)), "..."),
    ]);
  }

  /**
   * Display all blogs
   */
  public function index()
  {
    $blogs = Blog::orderBy('created_at', 'asc')->get();

    return view('blog.index', [
      'blogs' => $blogs
    ]);
  }

  /**
   * Show a blog
   * @param  number $id - the id of the blog to show
   * @return [type]     [description]
   */
  public function show($slug)
  {
    // find the user with the given id
    $blog = Blog::findBySlug($slug);

    return view('blog.show', [
      'blog' => $blog
    ]);
  }

  public function destroy($blog)
  {

  }
}
