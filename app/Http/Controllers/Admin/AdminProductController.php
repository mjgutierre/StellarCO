<?php
 
namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Review;

 
class AdminProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products';
        $viewData['products'] = Product::all();
        return view('test.admin.product.index')->with('viewData',$viewData);
    }

    public function show(int $id): View
    {
      $viewData = [];
      $viewData['title'] = 'Product';
      $viewData['product'] = Product::findOrFail($id);
      return view('test.admin.product.show')->with('viewData',$viewData);
    }

    public function create(): View
    {
      $viewData = [];
      $viewData['title'] = 'Create Product';
      return view('test.admin.product.create')->with('viewData',$viewData);
    }

    public function save(Request $request) : RedirectResponse
    {
      Product::validate($request);
      $newProduct = Product::create($request->all());

      if ($request->hasFile('image')) {
        $imageName = $newProduct->getId().".".$request->file('image')->extension(); 
        Storage::disk('public')->put(
          $imageName,
          file_get_contents($request->file('image')->getRealPath()) 
        );
        $newProduct->setImage($imageName);
        $newProduct->save(); 
      }
      
      return back();
    }

    public function destroy(int $id) : RedirectResponse
    {
      Review::where('product_id', $id)->delete();
      Product::destroy($id);
      return back();
    }

    public function update(Request $request, int $id) : RedirectResponse
    {
      Product::validate($request);
      Product::findOrFail($id)->update($request->all());
      return back();
    }
}
