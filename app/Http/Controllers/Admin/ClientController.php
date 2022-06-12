<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::orderBy('id', 'DESC')->paginate(10);
        if (! empty($request->query('client'))) {
            $clients = Client::where('member_id', $request->query('client'))->orderBy('id', 'DESC')->paginate(10);
        }
        return view('admin.client.index', [
            'clients' => $clients,
            'client'  => (! empty($request->query('client'))) ? $request->query('client') : ''
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
        return view('admin.client.edit', [
            'member' => Client::findOrFail($id)
        ]);
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
        $client = Client::findOrFail($id);
        $password = Str::random(8);
        if ($client->account) {
            $client->account->password = Hash::make($password);
            $client->account->first_attempt = NULL;
            $client->account->save();
        } else {
            User::create([
                'client_member_id'  => $client->member_id,
                'username'          => "prastiwi_{$client->member_id}",
                'password'          => Hash::make($password)
            ]);
        }
        return redirect()->route('apps.client.index')->withErrors(['message' => "Password <b>{$client->name}</b> berhasil direset, password baru adalah : <b>{$password}</b>"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 
    }
}
