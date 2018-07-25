<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teachers;
class TeachersController extends Controller
{
    public function show(){
      $teachers = Teachers::all();

      return view('admin.teachers',compact('teachers'));
    }
}
