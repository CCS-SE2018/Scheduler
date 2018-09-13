<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teachers;
use Image;
class TeachersController extends Controller
{
    public function show(){
      $teachers = Teachers::all();

      return view('admin.teachers',compact('teachers'));
    }

    public function teacher(Request $request){
      // dd($request->file('profile_picture'));

      if($request['editMode'] == 'edit'){
        $avatar = $request->file('profile_picture');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('images/uploads/' . $filename ) );
        // dd($request);
        Teachers::where('id',$request['editID'])->update([
          'profile_picture' => $filename,
          'teacher_FName' => $request['teacher_FName'],
          'teacher_MName' => $request['teacher_MName'],
          'teacher_LName' => $request['teacher_LName'],
        ]);
      }
      else if($request['editMode'] == 'delete'){
        Teachers::where('id',$request['editID'])->delete();
      }
      else{
        // dd($request);
          $avatar = $request->file('profile_picture');
      		$filename = time() . '.' . $avatar->getClientOriginalExtension();
      		Image::make($avatar)->resize(300, 300)->save( public_path('images/uploads/' . $filename ) );
          Teachers::create([
            'profile_picture' => $filename,
            'teacher_FName' => $request['teacher_FName'],
            'teacher_MName' => $request['teacher_MName'],
            'teacher_LName' => $request['teacher_LName'],
          ]);
      }

      return redirect('/teachers');
    }

}
