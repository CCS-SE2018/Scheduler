<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
  protected $fillable = [
      'subject_code','subject_name','section', 'subject_type','units','schedule_day','schedule_time','room_location','instructor'
  ];
}
