<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(): View|RedirectResponse
    {
        $cart = session()->get('cart', []);

        $viewData = [
            'title' => 'Checkout',
            'total' => 0,
            'products' => [],
        ];

        foreach ($cart as $itemDetails) {
            $product = Product::find($itemDetails['product_id']);
            if ($product) {
                $product->quantity = $itemDetails['quantity'];
                $viewData['products'][] = $product;
                $viewData['total'] += $product->getPrice() * $itemDetails['quantity'];
            }
        }

        return view('checkout.index')->with('viewData', $viewData);
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'address' => 'required|max:255',
        ]);

        $cart = session()->get('cart', []);

        if ($cart) {
            $userId = Auth::user()->getId();
            $order = new Order();
            $order = Order::create([
                'user_id' => $userId,
                'address' => $request->address,
                'courier' => 'DHL',
                'status' => 'pending',
                'trackingNumber' => '',
                'total' => 0,
            ]);

            $total = 0;
            $productsInCart = Product::findMany(array_keys($cart));

            foreach ($productsInCart as $product) {
                $cartProductInfo = $cart[$product->getId()];
                $item = Item::create([
                    'price' => $product->getPrice(),
                    'prompt' => $cart[$product->getId()]['prompt'],
                    'order_id' => $order->getId(),
                    'product_id' => $product->getId(),
                ]);
                $total = $total + ($product->getPrice() * $cart[$product->getId()]['quantity']);
            }
            $order->setTotal($total);
            $order->save();

            $newBalance = Auth::user()->getBalance() - $total;
            Auth::user()->setBalance($newBalance);
            Auth::user()->save();

            session()->forget('cart');

            $viewData = [
                'title' => 'Purchase - Online Store',
            ];

            return view('checkout.success')->with('viewData', $viewData);
        } else {
            return redirect()->route('cart.index')->with('error', 'No hay elemtos en el carrito');
        }
    }
}
