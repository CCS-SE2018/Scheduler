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

    public function addRoom(Request $request){
      if($request['editMode'] == 'edit'){
        Room::where('id',$request['editID'])->update([
          'room_location' => $request['room_location'],
        ]);
      }
      else if($request['editMode'] == 'delete'){
        Room::where('id',$request['editID'])->delete([
          'room_location' => $request['room_location'],
        ]);
      }
      else{
        Room::create([
          'room_location' => $request['room_location'],
        ]);
      }
  
      return redirect('/rooms');
    }
}
