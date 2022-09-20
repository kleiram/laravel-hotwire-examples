<?php

namespace App\Http\Controllers;

use App\Events\ProductUpdated;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Event;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    public function update(Product $product, ProductUpdateRequest $request)
    {
        $product->amount = $request->validated()['amount'];
        $product->save();

        Event::dispatch(new ProductUpdated($product));
    }
}
