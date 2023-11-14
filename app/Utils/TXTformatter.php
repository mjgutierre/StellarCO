<?php

namespace App\Utils;

use App\interfaces\Dataformatter;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TXTformatter implements Dataformatter
{
    public function download(Request $request): StreamedResponse
    {
        $products = Product::latest()->take(10)->get();

        $filename = 'products_'.date('Ymd').'.txt';

        $headers = [
            'Content-type' => 'text/plain',
            'Content-Disposition' => "attachment; filename={$filename}",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function () use ($products) {
            $file = fopen('php://output', 'w');

            fwrite($file, "ID\tName\tDescription\tPrice\tCreated At\n");

            foreach ($products as $product) {
                fwrite($file, "{$product->id}\t{$product->name}\t{$product->description}\t{$product->price}\t{$product->created_at}\n");
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
