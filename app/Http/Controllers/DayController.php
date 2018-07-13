<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;
class DayController extends Controller
{
    public function showDay(){
        $days = Day::all();

        return view('admin.days',compact('days'));
    }
}
