<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\DataFormatter;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminProductController extends Controller
{
    public function index(string $order = null): View
    {
        $viewData = [];
        $viewData['title'] = trans('messages.Products');

        switch ($order) {
            case 'quantasc':
                $viewData['products'] = Product::orderBy('quantity', 'asc')->get();
                $orderingDescription = trans('messages.QuantityAscending');
                break;
            case 'quantdesc':
                $viewData['products'] = Product::orderBy('quantity', 'desc')->get();
                $orderingDescription = trans('messages.QuantityDescending');
                break;
            case 'nameasc':
                $viewData['products'] = Product::orderBy('name', 'asc')->get();
                $orderingDescription = trans('messages.NameAscending');
                break;
            case 'namedesc':
                $viewData['products'] = Product::orderBy('name', 'desc')->get();
                $orderingDescription = trans('messages.NameDescending');
                break;
            default:
                $viewData['products'] = Product::all();
                $orderingDescription = '';
        }

        if ($orderingDescription) {
            $viewData['title'] .= ' - '.trans('messages.OrderedBy').' '.$orderingDescription;
        }

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $product = Product::findOrFail($id);
        $viewData = [
            'title' => $product->getName(),
            'product' => $product,
        ];

        return view('admin.product.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = trans('messages.createProduct');

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

        return redirect()->route('admin.product.index')->with('success', trans('messages.productCreated'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->reviews()->delete();
        $product->delete();

        return redirect()->route('admin.product.index')->with('success', trans('messages.productDeleted'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        Product::validate($request);
        Product::findOrFail($id)->update($request->all());

        return redirect()->route('admin.product.index')->with('success', trans('messages.productUpdated'));
    }

    public function download(Request $request): StreamedResponse
    {
        $validatedData = $request->validate([
            'type' => 'required|in:csv,txt',
        ]);

        $type = $validatedData['type'];
        $formatter = app(DataFormatter::class, ['format' => $type]);

        return $formatter->download($request);
    }
}
