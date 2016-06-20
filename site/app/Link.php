<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
  /**
   * The attributes that are mass assignable.
   */
  protected $fillable = [
    'user_id', 'title', 'url', 'tags',
  ];

  /**
   * The rules used to validate content before creation
   */
  public static $createRules = array(
		'title' => 'required|min:1|max:255',
		'url' => 'required|min:1|max:512',
    'tags' => ''
	);

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
