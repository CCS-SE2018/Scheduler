<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Teachers;
class UserController extends Controller
{
    public function showScheds(){
      $subjects = Subject::all();
      $teachers = Teachers::all();
      return view('admin.schedule',compact('subjects','teachers'));
    }
}
