<?php

namespace Globali\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher=Teacher::all();
        return view('teacher::teacher.teachers')->with('teacher',$teacher);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher::teacher.teachers_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $teacher = Teacher::create($this->validateRequest());

        $this->storeImage($teacher);

        return redirect('admin/teachers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        dd($teacher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher::teacher.teachers_edit')->with('teacher', $teacher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'file|image|max:10000',
            'address' => 'required|max:50',
            'phone' => 'required',
            'email' => 'required|email|unique:teachers,email,'.$id,
            'nationality' => 'required',
            'state' => 'required',
            'post_code' => 'required',
            'experience' => 'required',
            'specialized_subject' => 'required',
            'assigned_subject' => 'required',
        ]);

        $teacher = Teacher::find($id);
        $teacher->name = $request->input('name') ;
        $teacher->address = $request->input('address') ;
        $teacher->phone = $request->input('phone') ;
        $teacher->email = $request->input('email') ;
        $teacher->nationality = $request->input('nationality') ;
        $teacher->state = $request->input('state') ;
        $teacher->post_code = $request->input('post_code') ;
        $teacher->experience = $request->input('experience') ;
        $teacher->specialized_subject = $request->input('specialized_subject') ;
        $teacher->assigned_subject = $request->input('assigned_subject') ;

        if(request()->has('image')) {
            $this->storeImage($teacher);
        }

        $teacher->save() ;
        return redirect('admin/teachers') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher=Teacher::find($id);
        $teacher->delete();
        return redirect('admin/teachers');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:2',
            'image' => 'required|file|image|max:10000',
            'address' => 'required|max:50',
            'phone' => 'required',
            'email' => 'required|email|unique:teachers',
            'nationality' => 'required',
            'state' => 'required',
            'post_code' => 'required',
            'experience' => 'required',
            'specialized_subject' => 'required',
            'assigned_subject' => 'required',
        ]);
    }

    private function storeImage($teacher)
    {
        if(request()->has('image')) {
            $teacher->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
        }
    }
}
