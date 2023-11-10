<?php

use Illuminate\Http\Request;
use App\interfaces\Dataformatter;
use App\Models\Product;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CSVformatter implements Dataformatter
{
    public function download(Request $request): StreamedResponse {

       $products = Product::latest()->take(10)->get();

       $filename = "products_" . date('Ymd') . ".csv";

       // Set the headers for the CSV download
       $headers = [
           "Content-type" => "text/csv",
           "Content-Disposition" => "attachment; filename={$filename}",
           "Pragma" => "no-cache",
           "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
           "Expires" => "0"
       ];

       // Open the file in memory
       $callback = function() use ($products) {
           $file = fopen('php://output', 'w');

           // Add CSV headers
           fputcsv($file, ['ID', 'Name', 'Description', 'Price', 'Created At']);

           // Add product rows
           foreach ($products as $product) {
               fputcsv($file, [$product->id, $product->name, $product->description, $product->price, $product->created_at]);
           }

           fclose($file);
       };

       return Response::stream($callback, 200, $headers);
    }
}
