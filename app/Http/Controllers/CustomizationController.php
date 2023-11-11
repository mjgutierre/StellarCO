<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use OpenAI;

class CustomizationController extends Controller
{
    public function index(int $id): View
    {
        $product = Product::findOrFail($id);

        $viewData = [
          'title' => 'Customize',
          'product' => $product,
          'generatedImageiUrl' => ''
        ];

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
          $viewData['generatedImageiUrl'] = $cart[$id]['generatedImageiUrl'];
        }

        return view('customization.index')->with('viewData', $viewData);
    }

    public function generate(Request $request): RedirectResponse
    {
        $request->validate([
            'designDescription' => 'required|string|max:255',
            'productId' => 'required|integer',
        ]);

        $productId = $request->input('productId');
        $product = Product::findOrFail($productId);

        $client = OpenAI::client(env('OPENAI_API_KEY'));
        $response = $client->images()->variation([
          'image' => fopen(public_path('storage/' . $product->image), 'r'), 
          'n' => 1,
          'size' => '256x256',
          'response_format' => 'url',
        ]);
        $imageUrl = $response->data[0]->url;

        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['generatedImageiUrl'] = $imageUrl;
            $cart[$productId]['prompt'] = $request->input('designDescription');
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Imagen generada.');
    }
}
