<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{    
    /**
     * login
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);
        $user   = User::firstWhere('username', $request->input('username'));
        if (! $user) {
            return $this->error(404, 'Anggota Tidak Terdaftar', 404);
        }
        if (! auth()->attempt($request->input())) {
            return $this->error(401, 'Nomor Anggota / Password Salah', 401);
        }
        if (empty($user->first_attempt)) {
            return $this->error(403, 'Ubah Password Default', 403);
        }
        $authenticated = $this->profile();
        $authenticated['metadata'] = [
            'token' => $user->createToken('AuthToken')->plainTextToken,
            'type'  => 'Bearer'
        ];
        return $this->success($authenticated);
    }
    
    /**
     * update
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);
        $user = User::firstWhere('username', $request->input('username'));
        if (! $user) {
            return $this->error(404, 'Anggota Tidak Terdaftar', 404);
        }
        if (! empty($user->first_attempt)) {
            return $this->error(403, 'Password Telah Diubah', 403);
        }
        $client = Client::firstWhere('member_id', $user->client_member_id);
        if (! $client) {
            return $this->error(404, 'Anggota Tidak Terdaftar', 404);
        }
        $user->client_member_id = $client->member_id;
        $user->password         = Hash::make($request->input('password'));
        $user->first_attempt    = now();
        $user->save();
        if (! auth()->attempt($request->input())) {
            return $this->error(401, 'Nomor Anggota / Password Salah', 401);
        }
        return $this->success($this->profile());
    }
}
