<?php

Route::get('/', 'BasicController@check');
Route::get('/login',function(){
  return view('admin.login');
});
Route::get('/dashboard', function(){
  return view('admin.home');
});
Route::get('/schedules','UserController@showScheds');
Route::get('/register', function(){
  return view('admin.register');
});
Route::post('/signin', 'BasicController@signIn');
Route::post('/store','BasicController@store');
Route::post('/room','RoomController@room');
Route::post('/teacher','TeachersController@teacher');
Route::post('/subject','SubjectController@subject');
Route::get('/logout', function(){
  auth()->logout();
  return redirect('/');
});
Route::get('/loadSched','SubjectController@specifySchedule');
Route::get('/loadSubjects','SubjectController@updateSubjects');
Route::get('/loadSubjectModals','SubjectController@loadSubjects');
Route::get('/rooms','RoomController@show');
Route::get('/teachers','TeachersController@show');
