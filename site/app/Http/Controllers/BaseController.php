<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * Provides common methods and properties
 * to all derived controllers.
 */
class BaseController extends Controller
{
  protected $user_id = null;

  /**
   * Get the user id from the header and
   * store it in this instance.
   */
  protected function getUserId(){
    $this->user_id = Request::header('user_id');
  }

  /**
   * Get a validator
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data, array $rules)
  {
      return Validator::make($data, $rules);
  }
}
