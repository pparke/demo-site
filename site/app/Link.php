<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
  /**
   * The attributes that are mass assignable.
   */
  protected $fillable = [
    'user_id', 'title', 'url', 'image', 'description'
  ];

  /**
   * The rules used to validate content before creation
   */
  public static $createRules = array(
		'title' => 'required|min:1|max:255',
		'url' => 'required|min:1|max:2048',
    'image' => 'max:2048',
	);

  /**
   * Make a request to the embedly api and return the result
   * @param  [string] $url - the url
   * @return [object]      - a parsed json object
   */
  public static function embedly ($url) {
    // create parameters for request
    $params = sprintf('url=%s&key=%s', urlencode($url), env('EMBEDLY'));

    // init curl
    $curl = curl_init();

    // set the url
    curl_setopt($curl, CURLOPT_URL, "https://api.embedly.com/1/extract?" . $params);

    // no headers
    curl_setopt($curl, CURLOPT_HEADER, 0);

    // return the results instead of outputting it
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    $result = json_decode($result);

    curl_close($curl);

    return $result;
  }

  /**
   * The user record that this blog belongs to
   */
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  /**
   * The tags for this link
   */
  public function tags()
  {
    return $this->belongsToMany('App\Tag');
  }
}
