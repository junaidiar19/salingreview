<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize("show products");

        $params = request()->query();
        $products = Product::filter($params)->paginate($params['row'] ?? 10);

        return view('pages.admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize("create products");

        return view('pages.admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        Gate::authorize("create products");

        Product::create($request->validated());

        notyf()->addSuccess('Product created successfully.');
        return to_route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        Gate::authorize("edit products");

        return view('pages.admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        Gate::authorize("edit products");

        $product->update($request->validated());

        notyf()->addSuccess('Product created successfully.');
        return to_route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Gate::authorize("delete products");

        try {
            $product->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Get product data
     * @param Request $request (product_id)
     * @return product
     */
    public function getProduct(Request $request){
        $product = Product::findOrFail($request->product_id);
        return response()->json($product);
    }
}
