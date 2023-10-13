<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(string $order = null): View
    {
        $viewData = [];
        $viewData['title'] = 'Products';
        
        switch ($order) {
          case 'quantasc':
              $viewData['products'] = Product::orderBy('quantity', 'asc')->get();
              $orderingDescription = 'Quantity Ascending';
              break;
          case 'quantdesc':
              $viewData['products'] = Product::orderBy('quantity', 'desc')->get();
              $orderingDescription = 'Quantity Descending';
              break;
          case 'nameasc':
              $viewData['products'] = Product::orderBy('name', 'asc')->get();
              $orderingDescription = 'Name Ascending';
              break;
          case 'namedesc':
              $viewData['products'] = Product::orderBy('name', 'desc')->get();
              $orderingDescription = 'Name Descending';
              break;
          default:
              $viewData['products'] = Product::all();
              $orderingDescription = '';
        }

        if ($orderingDescription) {
            $viewData['title'] .= ' - Ordered by '.$orderingDescription;
        }

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $product = Product::findOrFail($id);
        $viewData = [
            'title' => $product['name'],
            'product' => $product,
        ];

        return view('admin.product.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Product';

        return view('admin.product.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Product::validate($request);
        $newProduct = Product::create($request->all());

        if ($request->hasFile('image')) {
            $imageName = $newProduct->getId().'.'.$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imageName);
            $newProduct->save();
        }

        return redirect()->route('admin.product.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        Review::where('product_id', $id)->delete();
        Product::destroy($id);

        return redirect()->route('admin.product.index');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        Product::validate($request);
        Product::findOrFail($id)->update($request->all());

        return redirect()->route('admin.product.index');
    }
}
