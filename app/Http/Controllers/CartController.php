<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\Item;

class CartController extends Controller
{
    public function index(): View 
    {
        $cart = session()->get('cart', []);
    
        $viewData = [
          'title' => 'Customize',
          'totalToPay' => 0,
          'products' => []
        ];

        foreach ($cart as $itemDetails) {
          $product = Product::find($itemDetails['product_id']);
          if ($product) {
              $product->quantity = $itemDetails['quantity'];  
              $viewData['products'][] = $product;
              $viewData['totalToPay'] += $product->getPrice() * $itemDetails['quantity'];
          }
        }
    
        return view('cart.index')->with('viewData', $viewData);
    }
  
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|integer',
        ]);

        $cart = session()->get('cart', []);
        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity']++;
        } else {
            $cart[$request->product_id] = [
                'product_id' => $request->product_id,
                'quantity' => 1,
                'generatedImageiUrl' => '',
                'prompt' => ''
            ];
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Producto añadido al carrito.');
    }

    public function destroy($id): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            return redirect()->route('cart.index')->with('success', 'Elemento eliminado exitosamente.');
        } else {
            return redirect()->route('cart.index')->with('error', 'Elemento no encontrado.');
        }
    }

    public function purchase(Request $request)
    {
      $cart = session()->get('cart', []);

      if ($cart) {
          $userId = Auth::user()->getId();
          $order = Order::create([
              'user_id' => $userId,
              'total' => 0,
          ]);

          $total = 0;
          $productsInCart = Product::findMany(array_keys($cart));

          foreach ($productsInCart as $product) {
            $cartProductInfo = $cart[$product->getId()];
            $item = Item::create([
                'price' => $product->getPrice(),
                'prompt' => $cart[$product->getId()]['prompt'],
                'product_id' => $product->getId(),
                'order_id' => $order->getId(),
            ]);
            $total = $total + ($product->getPrice()*$cart[$product->getId()]['quantity']);
          }
          $order->setTotal($total);
          $order->save();

          $viewData = [
            'title' => 'Purchase - Online Store"',
            'order' => $order
          ];
          return view('cart.purchase')->with("viewData", $viewData);
      }else {
        return redirect()->route('cart.index')->with('error', 'No hay elemtos en el carrito.');
      }
    }
}
