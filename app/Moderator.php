<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Moderator extends Authenticatable
{
  use Notifiable;
  protected $table = 'moderators';
  protected $fillable = [
      'name', 'user_name','email', 'password','phone_number','permissions'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];
}
