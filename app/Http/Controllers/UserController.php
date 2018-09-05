<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
class UserController extends Controller
{
    public function showScheds(){
      $subjects = Subject::all();
      return view('admin.schedule',compact('subjects'));
    }
}
