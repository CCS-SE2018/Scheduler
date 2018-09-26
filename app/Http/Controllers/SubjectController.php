<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Room;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class SubjectController extends Controller
{
    public function subject(Request $request){
      Session::put('instructor',$request['teacher']);
      // dd($request);
      if($request['mode'] == 'edit'){
        Subject::where('id',$request['subject'])->update([
          'subject_code' => $request['values'][0],
          'subject_name' => $request['values'][1],
          'section' => $request['values'][2],
          'subject_type' => $request['subject_type'],
          'units' => $request['values'][3],
          'schedule_day' => $request['day'],
          'schedule_time' => $request['values'][4],
          'instructor' => $request['teacher'],
          'room_location' => $request['room'],
        ]);
      }
      else if($request['delMode'] == 'delete'){
        Subject::where('id',$request['delSubject'])->delete();
      }
      else if($request['init'] == 'add'){
        Subject::create([
          'subject_code' => $request['values'][0],
          'subject_name' => $request['values'][1],
          'section' => $request['values'][2],
          'subject_type' => $request['subject_type'],
          'units' => $request['values'][3],
          'schedule_day' => $request['day'],
          'schedule_time' => $request['values'][4],
          'room_location' => $request['room'],
          'instructor' => $request['teacher'],
        ]);
      }
    }

    public function specifySchedule(Request $request){
      Session::put('instructor',$request['teacher']);
    }

    public function updateSubjects(){
      $teacher = Session::get('instructor');
      $subjects = Subject::where('instructor',Session::get('instructor'))->get();
      return view('admin.table',compact('subjects','teacher'));
    }

    public function loadSubjects(){
      $subjects = Subject::where('instructor',Session::get('instructor'))->get();
      $rooms = Room::all();
      return view('admin.subjectModals',compact("subjects","rooms"));
    }

}
