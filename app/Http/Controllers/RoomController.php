<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Room;
use App\Subject;
use App\Teachers;

class RoomController extends Controller
{
    public function show(){
      $rooms = Room::all();
      return view('admin.rooms',compact('rooms'));
    }

    public function showAssign(){
      $rooms = DB::table('rooms')
      ->join('subjects', 'rooms.id', '=', 'subjects.room_location')
      ->select('rooms.room_location')
      ->distinct()
      ->get();
      //dd($rooms);
      $teachers = Teachers::all();
      $subjects = DB::table('subjects')
      ->join('rooms', 'subjects.room_location', '=', 'rooms.id')
      ->join('teachers', 'subjects.instructor', '=', 'teachers.id')
      ->select('subjects.subject_code', 'rooms.room_location', 'teachers.teacher_FName','teachers.teacher_MName','teachers.teacher_LName','subjects.schedule_time')
      ->get();
      return view('admin.roomsAssignment',compact('rooms','subjects','teachers'));
    }

    public function room(Request $request){
      // dd($request);
      if($request['editMode'] == 'edit'){
        Room::where('id',$request['editID'])->update([
          'room_location' => $request['room_location'],
        ]);
      }
      else if($request['editMode'] == 'delete'){
        Room::where('id',$request['editID'])->delete();
      }
      else{
        Room::create([
          'room_location' => $request['room_location'],
        ]);
      }

      return redirect('/rooms');
    }
}
