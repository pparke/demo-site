<?php

namespace App\Http\Controllers;

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
   * Send a response indicating failure of validation
   * @param  array  $messages - messages to be sent
   * @return array            - array containing messages, success, token and other data
   */
  public function sendValidationFailed($messages = array(), $add = array())
	{
		$out = [];
		$out['messages'] = $messages;
		$out['success'] = false;
    $out['token'] = Session::get('_token');

    if (!empty($add)) {
    	$out = array_merge($out, $add);
    }

    if (Request::ajax()) {
    	return $out;
    }
    else {
      return Response::json($out);
	  }
	}
}
