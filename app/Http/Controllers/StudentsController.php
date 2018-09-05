<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Student;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $levels = Level::all();
        return view('site.home', ['students' => $students,
                                  'levels' => $levels
                                 ]);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $student_id = $request->input('del_id');
        $student = Student::find($student_id);
        if ($student->delete()) {
            echo "Data deleted";
        }
    }

    

    public function display_student()
    {
        $students = Level::all();
        $levels = Level::all();
        return view('site.students', ['students' => $students, 'levels' => $levels]);
    }

    public function display_levels()
    {
        $students = Level::all();
        $levels = Level::all();
        return view('site.levels', ['students' => $students, 'levels' => $levels]);
    }

    public function addStudent(Request $request)
    {
        $students = new Student;
        $students->fullname = $request->input('fullname');
        $students->level_id = $request->input('level_id');
        $students->admission = $request->input('admission');
        $students->save();
    }

    public function addLevel(Request $request)
    {
        $levels = new Level;
        $levels->level = $request->input('level');
        $levels->save();
    }

    public function links_display($id)
    {
        $students = Student::where('level_id', $id)->get();
        $levels = Level::all();
        // count($students);
        return view('site.home', ['students' => $students, 'levels' => $levels]);
    }
}
