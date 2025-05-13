<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Category\CategoryServiceInterface;
use App\Services\Product\ProductServiceInterface;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{


    public function list(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $products = Product::paginate(9);
        return view('pages.products', ['products' => $products]);
    }

    public function detail(Product $product): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('pages.detail-product', ['product' => $product]);
    }

    public function productByCategory($categoryId): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $products = Product::where('category_id', $categoryId)->paginate(9);
        return view('pages.products', ['products' => $products]);
    }

    public function search(Request $request): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%$query%")->paginate(9);
        return view('pages.products', ['products' => $products]);
    }
}
