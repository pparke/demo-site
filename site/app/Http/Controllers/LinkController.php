<?php

namespace App\Http\Controllers;

use App\Link;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\BaseController;

class LinkController extends BaseController
{

  /**
   * Instantiate a new LinkController instance.
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
  public function index()
  {
    $links = Link::orderBy('created_at', 'asc')->get();

    return view('link.index', [
      'links' => $links
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('link.create');
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
    $this->validate($request, Link::$createRules);

    // create a new instance
    $request->user()->links()->create([
      'title' => $request->title,
      'url' => $request->url,
      'tags' => $request->tags,
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
    $link = Link::find($id);

    return view('link.update', [
      'link' => $link
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
    $link = Link::find($id);

    $link->title = $request->title;
    $link->url = $request->url;
    $link->tags = $request->tags;

    $link->save();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $link = Link::find($id);

    $link->delete();
  }
}
