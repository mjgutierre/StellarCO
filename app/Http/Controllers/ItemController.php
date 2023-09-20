<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{

    public function index()
    {
        $items = session()->get('cart',[]);  
        return view('item.index', ['items' => $items]);  
    }

    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required',
            'product_id' => 'required',
            'description' => 'required'
        ]);

        $cart = session()->get('cart', []);
        $key = 'product_' . $request->product_id;

        if (isset($cart[$key])) {
            $cart[$key]['quantity']++;  
        } else {
            $cart[$key] = [
                'price' => $request->price,
                'product_id' => $request->product_id,
                'description' => $request->description,
                'quantity' => 1,
            ];
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Producto añadido al carrito.');
    }

    public function destroy($id)
    {
        $cart = session()->get('cart', []);
        $key = 'product_' . $id;

        if (isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
            return redirect()->route('items.index')->with('success', 'Elemento eliminado exitosamente.');
        } else {
            return redirect()->route('items.index')->with('error', 'Elemento no encontrado.');
        }
    }

}