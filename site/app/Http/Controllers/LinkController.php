<?php

namespace App\Http\Controllers;

use App\Link;
use App\Tag;

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
  public function index(Request $request)
  {
    $links = Link::orderBy('created_at', 'dsc')->get();

    // add a created key containing a formatted date
    $links = $links->each(function($l){
      $l->created = $l->created_at->toFormattedDateString();
    });

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

    // use embedly to scrape the page
    $result = Link::embedly($request->input('url'));
    $img = count($result->images) > 0 ? $result->images[0]->url : null;

    // create a new instance
    $link = $request->user()->links()->create([
      'title' => $request->input('title'),
      'url' => $result->url,
      'image' => $img,
      'description' => $result->description,
    ]);

    // transform tags string into array
    $tag_titles = explode(' ', strtolower(strip_tags($request->tags)));

    // create tags
    if ($tag_titles) {
      $tags = array_map(function ($tag) {
        return Tag::firstOrCreate(['title' => $tag])->id;
      }, $tag_titles);

      // create the relationships between the link and the tags
      $link->tags()->attach($tags);
    }

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
  public function destroy(Request $request, $id)
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
