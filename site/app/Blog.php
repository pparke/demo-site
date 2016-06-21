<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  /**
   * The attributes that are mass assignable.
   */
  protected $fillable = [
    'user_id', 'title', 'content', 'slug', 'sample'
  ];

  /**
   * The rules used to validate content before creation
   */
  public static $createRules = array(
		'title' => 'required|min:1|max:255',
		'content' => 'required|min:1|max:50000'
	);

  /**
   * The allowed html tags for blog content
   * @var string
   */
  public static $allowedTags = "<p><a><h2><h3><b><i><u><blockquote>";

  /**
   * The user record that this blog belongs to
   */
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  /**
   * Find the blog with the given slug
   * @param  string $slug - the slug to search for
   * @return the blog if found or false if not
   */
  public static function findBySlug($slug)
  {
  	$blog = self::where('slug', $slug)->first();
    if (count($blog) == 0) {
      return false;
    }
    else {
      return $blog;
    }
  }
}
