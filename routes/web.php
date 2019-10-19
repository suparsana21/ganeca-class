<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/',function(){
    return view('welcome');
});

// Route GET Basic
Route::get('route-get',function(){
    echo "Sample Route Get";
});

// Route GET dengan Dynamic Param
Route::get('penjumlahan/{angka1}/{angka2}',function($angka1,$angka2){
    echo $angka1 + $angka2;
});

// Template Implementation
Route::get('/demo',function(){
    return view('pages.dashboard.index');
});

// Route GET dengan Resource Controller
Route::resource('teacher', 'TeacherController');

// Route::get('teacher/index','TeacherController@index')->name('teacher.index');
// Route::get('teacher/create','TeacherController@create')->name('teacher.create');


?>