<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Teachers;
use App\Room;
class UserController extends Controller
{
    public function showScheds(){
      $subjects = Subject::join('rooms','subjects.room_location','=','rooms.id')->get();
      $teachers = Teachers::all();
      $rooms = Room::all();
      return view('admin.schedule',compact('subjects','teachers','rooms'));
    }
}
