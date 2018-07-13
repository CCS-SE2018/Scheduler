<?php

Route::get('/', 'BasicController@check');
Route::get('/register', function(){
  return view('admin.register');
});
Route::post('/login', 'BasicController@signIn');
Route::post('/store','BasicController@store');
Route::get('/logout', function(){
  auth()->logout();
  return redirect('/');
});
Route::get('/subject','SubjectController@show');
Route::get('/time','TimeController@showTime');
Route::get('/day','DayController@showDay');
Route::get('/section','SectionController@show');
Route::get('/room','RoomController@show');
