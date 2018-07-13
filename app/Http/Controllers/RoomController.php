<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    public function show(){
      $rooms = Room::all();

      return view('admin.rooms',compact('rooms')); 
    }
}
