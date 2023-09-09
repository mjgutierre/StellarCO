<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Review;
 
class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products';
        $viewData['products'] = Product::all();
        return view('test.product.index')->with('viewData',$viewData);
    }

    public function show(int $id): View
    {
      $viewData = [];
      $viewData['title'] = 'Product';
      $viewData['product'] = Product::findOrFail($id);
      return view('test.product.show')->with('viewData',$viewData);
    }
}
