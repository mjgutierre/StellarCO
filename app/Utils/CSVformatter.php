<?php

namespace App\Utils;

use App\interfaces\Dataformatter;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CSVformatter implements Dataformatter
{
    public function download(Request $request): StreamedResponse
    {
        $products = Product::latest()->take(10)->get();

        $filename = 'products_'.date('Ymd').'.csv';

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$filename}",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function () use ($products) {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['ID', 'Name', 'Description', 'Price', 'Created At']);

            foreach ($products as $product) {
                fputcsv($file, [$product->id, $product->name, $product->description, $product->price, $product->created_at]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
