<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(5);
        $users = User::all(['id', 'name']);
        return view('clients.clients', compact('clients', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all(['id', 'name']);
        return view('clients.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->post());
        $validated = $request->validate([
            'company' => ['required', 'string'],
            'number' => ['required', 'numeric'],
            'activity' => ['required', 'string'],
            'user_id' => ['required'],
        ]);
        $validated['user_id'] = (int)$validated['user_id'][0];

        Client::store($validated);
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return redirect()->route('clients.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        if (Auth::user()->cannot('update', $client)) {
            abort(404);
        }
        $users = User::all(['id', 'name']);
        return view('clients.edit', compact('client', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        if ($request->user()->cannot('update', $client)) {
            abort(404);
        }
        $validated = $request->validate([
            'company' => ['required', 'string'],
            'number' => ['required'],
            'activity' => ['required', 'string'],
            'user_id' => ['required'],
        ]);
        $validated['user_id'] = (int)$validated['user_id'][0];
        $client->update($validated);
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if (Auth::user()->cannot('update', $client)) {
            abort(404);
        }
        $client->delete();
        return redirect()->route('clients.index');
    }
}
