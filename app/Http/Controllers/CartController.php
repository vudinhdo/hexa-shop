<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }
        $product = Product::findOrFail($productId);

        $item = Item::firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        if ($item->products()->where('product_id', $productId)->exists()) {
            $item->products()->updateExistingPivot($productId, [
                'quantity' => \DB::raw('quantity + 1')
            ]);
        } else {
            $item->products()->attach($productId, ['quantity' => 1]);
        }

        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }


    public function show(): Factory|View
    {
        $item = Item::with('products')->where('user_id', auth()->id())->first();

        if (!$item || $item->products->isEmpty()) {
            return view('pages.item.index', ['item' => null, 'total' => 0]);

        }
        // Tính tổng tiền
        $total = 0;
        foreach ($item->products as $product) {
            $total += $product->price * $product->pivot->quantity;
        }

        return view('pages.item.index', [
            'item' => $item,
            'total' => $total
        ]);
    }
}
