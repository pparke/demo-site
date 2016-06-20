<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

  /**
   * The attributes that are mass assignable.
   */
  protected $fillable = [
    'title', 'color', 'description',
  ];

  /**
   * The rules used to validate content before creation
   */
  public static $createRules = array(
		'title' => 'required|min:1|max:255',
		'color' => 'required|min:1|max:32',
    'description' => 'required|min:1|max:255'
	);

  /**
   * The links this tag belongs to
   */
  public function links()
  {
    return $this->belongsToMany('App\Link');
  }
}
