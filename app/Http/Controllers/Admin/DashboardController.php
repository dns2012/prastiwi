<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function userGenerator()
    {
        DB::table('users')->delete();
        $clients = Client::get();
        $users = [];
        foreach ($clients as $client) {
            $password = Str::lower(Str::random(8));
            $username = "prastiwi_" . $client->member_id;
            $users[] = [
                'member_id' => $client->member_id,
                'name'      => $client->name,
                'username'  => $username,
                'password'  => $password
            ];
            User::create([
                'client_member_id'  => $client->member_id,
                'username'          => $username,
                'password'          => Hash::make($password)
            ]);
        }
        return view('admin.dashboard.user-generator', [
            'users' => $users
        ]);
    }
}
