<?php

namespace App\Http\Controllers;

use App\Link;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Response;

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
    $links = Link::orderBy('created_at', 'dsc')->get();

    if ($request->ajax()) {
      return response()->json(['links' => $links]);
    }
    else {
      return view('link.index', [
        'links' => $links
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
    $link = $request->user()->links()->create([
      'title' => $request->input('title'),
      'url' => $request->input('url'),
      'tags' => $request->input('tags'),
    ]);

    if ($request->ajax()) {
      return response()->json(['link' => $link]);
    }
    else {
      return redirect()->route('links.index');
    }
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

    $link->title = $request->input('title');
    $link->url = $request->input('url');
    $link->tags = $request->input('tags');

    $link->save();

    if ($request->ajax()) {
      return response()->json(['link' => $link]);
    }
    else {
      return redirect()->route('links.index');
    }
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

    if ($request->ajax()) {
      return response()->json([], 200);
    }
    else {
      return redirect()->route('links.index');
    }
  }
}
