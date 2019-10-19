<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Teacher;
use Session; // => Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        // path view/pages/teacher/index.blade.php
        return view('pages.teacher.index',compact('teachers')); // menampilkan list teacher
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi
        $this->validate($request,[
            'name' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|required',
        ]);
      

        // Object Teacher 
        $teacher = [
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'dob' => $request->dob
        ];

        // dd($teacher);

        // Process Creating Data
        $input = Teacher::create($teacher);

        return redirect(route('teacher.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = Teacher::findOrFail($id);
        // $data = Teacher::find($id);
        // $data = Teacher::where('id',$id)
        //     ->get();
        // $array = ['teacher' => $data, 'siswa' => $siswa ,'pelajaran' => $pelaja];
        return view('pages.teacher.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|required',
            'dob' => 'date|required|date_format:Y-m-d'
        ]);
        // dd($request->all());
        $teacher = Teacher::findOrFail($id);
        // $teacher->update($request->all());
        $teacher->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'dob' => $request->dob
        ]);

        Session::flash('message','Success update data id : '.$teacher->name);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Teacher::destroy($id);
        $teacher = Teacher::find($id);
        $teacher->delete();
        Session::flash('message','Success delete data : '.$teacher->name);
        return back();
    }
}
