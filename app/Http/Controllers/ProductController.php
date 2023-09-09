<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
 
class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products';
        $viewData['products'] = Product::all();
        return view('#')->with('viewData',$viewData);
    }

    public function show(int $id): View
    {
      $viewData = [];
      $viewData['title'] = 'Product';
      $viewData['product'] = Product::findOrFail($id);
      return view('#')->with('viewData',$viewData);
    }

    public function create(): View
    {
      $viewData = [];
      $viewData['title'] = 'Create Product';
      return view('#')->with('viewData',$viewData);
    }

    public function save(Request $request) : RedirectResponse
    {
      Product->validate($request);
      Product::create($request->all());
      return back();
    }

    public function destroy(int $id) : RedirectResponse
    {
      Comment::where('product_id', $id)->delete();
      Product::destroy($id);
      return back();
    }

    public function update(Request $request, int $id) : RedirectResponse
    {
      Product->validate($request);
      Product::findOrFail($id)->update($request->only(['name','description','quantity','location','price']));
      return back();
    }
}
