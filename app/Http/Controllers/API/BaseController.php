<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Flugg\Responder\Responder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * @var Responder $responder
     */
    protected Responder $responder;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->responder = responder();
    }

    /**
     * @param mixed       $data
     * @param string|null $transformer
     * @param integer     $status
     *
     * @return JsonResponse
     */
    protected function success($data = null, string $transformer = null, $status = 200): JsonResponse
    {
        return $this->responder->success($data, $transformer)->respond($status);
    }

    /**
     * @param integer|null $errorCode
     * @param string|null  $message
     * @param integer      $status
     *
     * @return JsonResponse
     */
    protected function error(int $errorCode = null, string $message = null, $status = 404): JsonResponse
    {
        return $this->responder->error($errorCode, $message)->respond($status);
    }
    
    /**
     * profile
     *
     * @return array
     */
    protected function profile(): array
    {
        if (auth()->check()) {
            $user = auth()->user();
            return [
                'id'            => $user->detail->id,
                'member_id'     => $user->detail->member_id,
                'employee_id'   => $user->detail->employee_id,
                'name'          => $user->detail->name,
                'position'      => $user->detail->position,
                'member_id'     => $user->detail->member_id,
                'avatar'        => $user->avatar
            ];
        }
    }
    
    /**
     * memberId
     *
     * @return int
     */
    protected function memberId(): int
    {
        return $this->profile()['member_id'];
    }
}
