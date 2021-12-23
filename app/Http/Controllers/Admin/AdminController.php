<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdmin;
use App\Http\Requests\UpdateAdmin;
use App\Models\Admin;
use App\Services\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin.index', [
            'admins' => Admin::orderBy('id', 'DESC')->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdmin $request)
    {
        $request->validated();

        $user = new Admin();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        $user->role = $request->input('role');
        $user->avatar = Uploader::store($request->file('avatar'), Admin::AVATAR_PATH_DIR);

        if ($user->save()) {
            return redirect()->route('administrator.index');
        }
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
        return view('admin.admin.edit', [
            'user' => Admin::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdmin $request, $id)
    {
        $request->validated();

        $user = Admin::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        if ($request->input('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->file('avatar')) {
            $user->avatar = Uploader::store($request->file('avatar'), Admin::AVATAR_PATH_DIR);
        }

        if ($user->save()) {
            return redirect()->route('administrator.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Admin::findOrFail($id);
        if($user->delete()) {
            return redirect()->route('administrator.index');
        }
    }
}

