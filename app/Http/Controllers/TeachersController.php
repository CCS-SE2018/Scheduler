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

    public function teacher(Request $request){
      if($request['editMode'] == 'edit'){
        Teachers::where('id',$request['editID'])->update([
          // 'profile_picture' => $request['profile_picture'],
          'teacher_FName' => $request['teacher_FName'],
          'teacher_MName' => $request['teacher_MName'],
          'teacher_LName' => $request['teacher_LName'],
        ]);
      }
      else if($request['editMode'] == 'delete'){
        Teachers::where('id',$request['editID'])->delete([
          // 'profile_picture' => $request['profile_picture'],
          'teacher_FName' => $request['teacher_FName'],
          'teacher_MName' => $request['teacher_MName'],
          'teacher_LName' => $request['teacher_LName'],
        ]);
      }
      else{
        Teachers::create([
          'profile_picture' => $request['profile_picture'],
          'teacher_FName' => $request['teacher_FName'],
          'teacher_MName' => $request['teacher_MName'],
          'teacher_LName' => $request['teacher_LName'],
        ]);
      }

      return redirect('/teachers');
    }

}
