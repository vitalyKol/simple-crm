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
        $options = Task::$options;
        $tasks = Task::all();
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
        $task = Task::find($id);
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
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'status' => ['required'],
            'deadline' => ['date'],
            'user_id' => ['required'],
        ]);
        $validated['status'] = (int)$validated['status'][0];
        $validated['user_id'] = (int)$validated['user_id'][0];

        $task = Task::find($id);
        $task->update($validated);
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
