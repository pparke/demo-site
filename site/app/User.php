<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  

  /**
   * The attributes that are mass assignable.
   */
  protected $fillable = [
    'username', 'email', 'password'
  ];

  /**
   * The attributes that should be hidden for arrays.
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * The blogs that belong to the user
   */
  public function blogs()
  {
    return $this->hasMany(Blog::class);
  }

  /**
   * The links that belong to the user
   */
  public function links()
  {
    return $this->hasMany(Link::class);
  }
}
