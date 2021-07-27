<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add-student');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required','file'=>'required'
        ]);
        
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $student = new Student;
        $student->name = $name;
        $student->profileimage= $imageName;
        $student->save();
        return back()->with('success','student added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $all = Student::all();
        return view('allstudent',['collection'=>$all]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('editstudent',['collection'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
       if ($req->file('file')) {

        unlink(public_path('images').'/'.$req->oldImg);

            $data =Student::find($req->id);

            $name = $req->name;
            $image = $req->file('file');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'),$imageName);

          
            $data->name = $name;
            $data->profileimage= $imageName;
            $data->save();
            return redirect('allstudent')->with('success','student added successfully.');
       }
       else{
        $data =Student::find($req->id);
        $name = $req->name;
        $image = $req->oldImg;


        $data->name = $name;
        $data->profileimage= $image;
        $data->save();
        return redirect('allstudent')->with('success','student added successfully.');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        unlink(public_path('images').'/'.$student->profileimage);
        $student->delete();
        return back()->with('success','Student Delete Successfully');
    }
}
