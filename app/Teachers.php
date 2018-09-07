<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $fillable = ['profile_picture','teacher_FName','teacher_MName','teacher_LName'];
}
