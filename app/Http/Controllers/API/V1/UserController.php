<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\BaseController;
use App\Models\Loan;
use App\Models\Saving;
use App\Models\User;
use App\Services\Uploader;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserController extends BaseController
{    
    /**
     * me
     *
     * @return JsonResponse
     */
    public function myProfile(): JsonResponse
    {
        return $this->success($this->profile());
    }
    
    /**
     * mySaving
     *
     * @return JsonResponse
     */
    public function mySaving(): JsonResponse
    {
        $key = "saving-" . $this->memberId();
        if (! empty(Redis::get($key))) {
            $redisValue = json_decode(Redis::get($key), true);
            return $this->success([
                'items' => $redisValue, 
                'total' => array_sum(array_column($redisValue, 'value'))
            ]);
        }
        $savings = Saving::where('member_id', $this->memberId())->get()->toArray();
        Redis::set($key, json_encode($savings));
        return $this->success([
            'items' => $savings, 
            'total' => array_sum(array_column($savings, 'value'))
        ]);
    }
    
    /**
     * myLoan
     *
     * @return JsonResponse
     */
    public function myLoan(): JsonResponse
    {
        $key = "loan-" . $this->memberId();
        if (! empty(Redis::get($key))) {
            $redisValue = json_decode(Redis::get($key), true);
            return $this->success($redisValue);
        }
        $loans = Loan::where('member_id', $this->memberId())->get()->toArray();
        foreach($loans as $index => $loan) {
            $loans[$index]['debt'] = ($loan['loan_value'] + $loan['loan_interest']) - ($loan['loan_value_paid'] + $loan['loan_interest_paid']);
        }
        Redis::set($key, json_encode($loans));
        return $this->success($loans);
    }
    
    /**
     * updatePhoto
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function updatePhoto(Request $request): JsonResponse
    {
        $request->validate(['avatar' => ['required', 'image', 'mimes:jpeg,jpg,png']]);
        $user = auth()->user();
        if ($request->file('avatar')) {
            $user->avatar = Uploader::store($request->file('avatar'), User::IMAGE_PATH_DIR);
            $user->save();
        }
        return $this->success($this->profile());
    }
}
