<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('index',compact('tasks'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $taskname = $request->input('taskname');
        $username = $request->input('username');
        $date = $request->input('date');
        $data = compact('taskname','username','date');
        Task::create($data);
        return redirect()->route('index');
    }
}
