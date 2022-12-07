<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Usercrm;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['option']) and $_GET['option'] === "all"){
            $_GET['option'] = null;
        }
        if(isset($_GET['unexpired']) and isset($_GET['option'])){
            $tasks = Task::unexpired()->statuses($_GET['option'])->paginate(5);
        }elseif(isset($_GET['unexpired'])){
            $tasks = Task::unexpired()->paginate(5);
        }elseif(isset($_GET['option'])){
            $tasks = Task::statuses($_GET['option'])->paginate(5);
        }else{
            $tasks = Task::paginate(5);
        }
        $options = Task::$options;
        $users = Usercrm::all(['id', 'first_name']);
        return view('tasks.tasks', compact('tasks', 'users', 'options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Usercrm::all(['id', 'first_name']);
        return view('tasks.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'status' => ['required'],
            'deadline' => ['date'],
            'user_id' => ['required'],
        ]);
        $validated['status'] = (int)$validated['status'][0];
        $validated['user_id'] = (int)$validated['user_id'][0];

        Task::create($validated);
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return redirect()->route('tasks.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $users = Usercrm::all(['id', 'first_name']);
        return view('tasks.edit', compact('task','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'status' => ['required'],
            'deadline' => ['date'],
            'user_id' => ['required'],
        ]);
        $validated['status'] = (int)$validated['status'][0];
        $validated['user_id'] = (int)$validated['user_id'][0];

        $task->update($validated);
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
