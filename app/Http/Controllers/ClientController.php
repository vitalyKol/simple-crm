<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Usercrm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        $users = Usercrm::all(['id', 'first_name']);
        return view('clients.clients', compact('clients', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Usercrm::all(['id', 'first_name']);
        return view('clients.create', compact( 'users'));

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
            'company' => ['required', 'string'],
            'number' => ['required', 'numeric'],
            'activity' => ['required', 'string'],
            'user_id' => ['required'],
        ]);
        $validated['user_id'] = (int)$validated['user_id'][0];

//        var_dump($validated);
        Client::store($validated);
        return redirect()->route('clients.index');
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
        $client = Client::find($id);
        $users = Usercrm::all(['id', 'first_name']);
        return view('clients.edit', compact('client', 'users'));
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
//        var_dump($request->post());
        $validated = $request->validate([
            'company' => ['required', 'string'],
            'number' => ['required', 'numeric'],
            'activity' => ['required', 'string'],
            'user_id' => ['required'],
        ]);
        $validated['user_id'] = (int)$validated['user_id'][0];

        $client = Client::find($id);
        $client->update($validated);
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('clients.index');
    }
}
