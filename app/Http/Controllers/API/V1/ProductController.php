<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends BaseController
{    
    /**
     * index
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = (! empty($request->query('per_page'))) ? $request->query('per_page') : 8;
        $products = Product::with('images')->paginate($perPage);
        if (! empty($request->query('keyword'))) {
            $products = Product::with('images')
                                ->where('name', 'like', "%{$request->query('keyword')}%")
                                ->orWhere('description', 'like', "%{$request->query('keyword')}%")
                                ->paginate($perPage);
        }
        return $this->success($products);
    }
    
    /**
     * detail
     *
<<<<<<< HEAD
     * @param  Request $request
     * @param  int $id
=======
     * @param  mixed $request
     * @param  mixed $id
>>>>>>> e43f983bab36e3e8f6952541fc64f2834944a3b8
     * @return JsonResponse
     */
    public function detail(Request $request, int $id): JsonResponse
    {
<<<<<<< HEAD
        return $this->success(Product::with('images')->findOrFail($id));
=======
        return $this->success(Product::with('images'))->findOrFail($id);
>>>>>>> e43f983bab36e3e8f6952541fc64f2834944a3b8
    }
}
