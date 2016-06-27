<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WelcomeController extends BaseController
{
  /**
   * Show the user's profile page
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function profile(Request $request)
  {
    $user = $request->user();
    $blogs = $user->blogs;
    $links = $user->links;

    $links = $links->each(function($l){
      $l->created = $l->created_at->toFormattedDateString();
    });

    $blogs = $blogs->each(function($b){
      $b->created = $b->created_at->toFormattedDateString();
    });

    if ($request->ajax()) {
      return response()->json(['user' => $user]);
    }
    else {
      return view('welcome', [
        'user' => $user,
        'blogs' => $blogs,
        'links' => $links
      ]);
    }
  }
}
