<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;
class TimeController extends Controller
{
    public function showTime(){
        $times = Time::all();

        return view('admin.time',compact('times'));
    }
}
