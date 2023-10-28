<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;

class CartController extends Controller
{
    public function index(): View 
    {
        $itemsInSession = session()->get('cart', []);
    
        $viewData = [];
        $viewData['title'] = 'Cart';
        $viewData['totalToPay'] = 0;
        $viewData['products'] = [];

    
        foreach ($itemsInSession as $itemDetails) {
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
            'product_id' => 'required',
        ]);

        $cart = session()->get('cart', []);
        $key = 'product_'.$request->product_id;

        if (isset($cart[$key])) {
            $cart[$key]['quantity']++;
        } else {
            $cart[$key] = [
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
        $key = 'product_'.$id;

        if (isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);

            return redirect()->route('cart.index')->with('success', 'Elemento eliminado exitosamente.');
        } else {
            return redirect()->route('cart.index')->with('error', 'Elemento no encontrado.');
        }
    }
}
