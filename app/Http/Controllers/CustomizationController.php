<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use OpenAI;

class CustomizationController extends Controller
{
    public function index(int $id): View
    {
        $product = Product::findOrFail($id);
        $viewData = [
            'title' => 'Customize',
            'product' => $product,
            'generatedImage' => '',
        ];

        return view('customization.index')->with('viewData', $viewData);
    }

    public function generate(Request $request): View
    {
        $request->validate([
            'designDescription' => 'required|string|max:255',
            'productId' => 'required|integer',
        ]);

        $product = Product::findOrFail($request->input('productId'));

        $client = OpenAI::client(env('OPENAI_API_KEY'));
        $response = $client->images()->edit([
            'image' => fopen(public_path('storage/' . $product->image), 'r'), 
            'prompt' => $request->input('designDescription'), 
            'n' => 1,
            'size' => '256x256',
            'response_format' => 'url',
        ]);
        $imageUrl = $response->data[0]->url;

        $viewData = [
          'title' => 'Customize',
          'product' => $product,
          'generatedImage' => $imageUrl,
      ];

      return view('customization.index')->with('viewData', $viewData);
    }
}
