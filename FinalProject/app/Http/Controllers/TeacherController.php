<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->id;
        $total = Student::where('user_id',$id)->count();
        $active = Student::where(['user_id'=>$id , 'status'=>0])->count();
        $notActive = Student::where(['user_id'=>$id , 'status'=>1])->count();

        return view('home',compact('total','active','notActive'));
    }

    public function show()
    {
        $id = Auth::user()->id;
        // $students = Student::all();
        $students = Student::where('user_id',$id)->simplePaginate(6);
        return view('Teacher.students',compact('students'));
    }

    public function active()
    {
        $id = Auth::user()->id;
        $students = Student::where(['user_id'=>$id , 'status'=>0])->simplePaginate(6);;
        return view('Teacher.active',compact('students'));

    }

    public function notActive()
    {
        $id = Auth::user()->id;
        $students = Student::where(['user_id'=>$id , 'status'=>1])->simplePaginate(6);
        return view('Teacher.notActive',compact('students'));

    }

    public function activation($id)
    {
        $status = ['status'=>0];
        Student::where('id',$id)->update($status);
        return redirect()->back();
    }

    public function disable($id)
    {
        $status = ['status'=>1];
        Student::where('id',$id)->update($status);
        return redirect()->back();
    }

    public function store(Request $requests)
    {
        $NewStudent = $requests->validate(
            [
                'name' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:students'],
                'password' => ['required', 'string', 'min:8'],
                'status' => ['required','boolean']
            ]
            );
            $NewStudent['user_id'] = Auth::user()->id;
            $NewStudent['password'] = Hash::make($NewStudent['password']);
            // dd($NewStudent);
            Student::create($NewStudent);
            return redirect()->route('create')->with('msg','Student Created Successfully.');
    }

    public function edit($id)
    {
        $data = Student::find($id);
        return view('Teacher.edit',compact('data'));
    }

    public function update(Request $requests , $id)
    {
        $student = $requests->validate(
            [
                'name' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:students,email,'.$id],
                'status' => ['required','boolean'],
            ]
            );
        Student::where('id',$id)->update($student);
        return redirect()->route('students')->with('msg','Student Updated Successfully.');

    }
    public function delete($id)
    {
        Student::where('id',$id)->delete();
        return redirect()->route('students')->with('msg','Student Deleted Successfully.');
    }
}