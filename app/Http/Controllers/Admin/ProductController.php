<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\Uploader;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('id', 'DESC')->paginate(12);
        if (! empty($request->query('product'))) {
            $products = Product::where('name', 'like', "%{$request->query('product')}%")
                                ->orWhere('description', 'like', "%{$request->query('product')}%")
                                ->paginate(12);
        }
        return view('admin.product.index', [
            'products' => $products,
            'product'  => (! empty($request->query('product'))) ? $request->query('product') : ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $request->validated();

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->fake_price = $request->input('fake_price');

        if ($product->save()) {
            if (! empty($request->file('images'))) {
                foreach($request->file('images') as $image) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image'      => Uploader::store($image, ProductImage::IMAGE_PATH_DIR)
                    ]);
                }
            }
            return redirect()->route('apps.product.index');
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
        if (ProductImage::findOrFail($id)->delete()) {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.product.edit', [
            'product' => Product::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $request->validated();

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->fake_price = $request->input('fake_price');

        if ($product->save()) {
            if (! empty($request->file('images'))) {
                foreach($request->file('images') as $image) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image'      => Uploader::store($image, ProductImage::IMAGE_PATH_DIR)
                    ]);
                }
            }
            return redirect()->back();
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
        $product = Product::findOrFail($id);
        if($product->images->each->delete() && $product->delete()) {
            return redirect()->route('apps.product.index');
        }
    }
}
