<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(5);
        $clients = Client::all(['id', 'company']);
        $users = User::all(['id', 'name']);

        return view('projects.projects', compact('clients', 'users', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all(['id', 'company']);
        $users = User::all(['id', 'name']);
        return view('projects.create', compact('clients', 'users'));
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
            'clients_id' => ['required'],
            'user_id' => ['required'],
            'price' => ['required', 'numeric'],
            'deadline' => ['date'],
        ]);
        $validated['clients_id'] = (int)$validated['clients_id'][0];
        $validated['user_id'] = (int)$validated['user_id'][0];

        Project::create($validated);
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $clients = Client::all(['id', 'company']);
        $users = User::all(['id', 'name']);
        return view('projects.edit', compact('clients', 'users', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'clients_id' => ['required'],
            'user_id' => ['required'],
            'price' => ['required', 'numeric'],
            'deadline' => ['date'],
        ]);
        $validated['clients_id'] = (int)$validated['clients_id'][0];
        $validated['user_id'] = (int)$validated['user_id'][0];

        $project->update($validated);
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
