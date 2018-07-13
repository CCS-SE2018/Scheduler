<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;

class SectionController extends Controller
{
    public function show(){
      $sections = Section::all();

      return view('admin.sections',compact('sections')); 
    }
}
