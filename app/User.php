<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class User extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $fillable = [
      'instructor','username','email','password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
