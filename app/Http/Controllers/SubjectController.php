<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class SubjectController extends Controller
{
    public function subject(Request $request){
      Session::put('instructor',$request['teacher']);
      Subject::create([
        'subject_code' => $request['values'][0],
        'subject_name' => $request['values'][1],
        'section' => $request['values'][2],
        'subject_type' => $request['values'][3],
        'units' => $request['values'][4],
        'schedule_day' => $request['values'][5],
        'schedule_time' => $request['values'][6],
        'room_location' => $request['room'],
        'instructor' => $request['teacher'],
      ]);
    }

    public function specifySchedule(Request $request){
      Session::put('instructor',$request['teacher']);
    }

    public function updateSubjects(){
      $subjects = Subject::where('instructor',Session::get('instructor'))->get();
      return view('admin.table',compact('subjects'));
    }

}
