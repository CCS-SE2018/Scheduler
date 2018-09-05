<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller
{
    public function show(){
      $subjects = Subject::all();

      return view('admin.subjects',compact('subjects'));
    }

    public function save(Request $request){
        // dd($request);
    }
}
