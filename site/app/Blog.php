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
   * Extract a sample from the beginning of the text, will remove all
   * HTML tags
   * @param  string $text       - the text from which to draw the sample
   * @param  integer $num_words - (optional, default 40) the max number of words in the sample
   * @return string             - the sampled text
   */
  public static function text_sample($text, $num_words = 40)
  {
    return str_finish(implode(" ", array_slice(explode(" ", strip_tags($text), $num_words), 0, -1)), "...");
  }

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
