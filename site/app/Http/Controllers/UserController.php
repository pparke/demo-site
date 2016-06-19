<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

use App\User;

class UserController extends BaseController
{
  public function show($id)
  {
    // find the user with the given id
    $user = User::find($id);

    $this->getUserId();

    // create an array that maps relationships on the user model
    // to the model names to look up
    $models = array('blogs' => 'Blog');

    $activity = array();
    foreach($models as $key => $model){
      $user[$key] = $model::where('user_id', $id)->lists('id');
    }

    //$user = array_merge(array($user, $activity));

    return Response::json(array('user' => $user, 'comments' => $comments));
  }
}
