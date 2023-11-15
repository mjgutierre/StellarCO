<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class AdminCompetitorMonitorController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('messages.competitorMonitor');

        // TODO: delete this when rewady to use
        $viewData['products'] = [];

        $apiUrl = env('COMPETITOR_URL') . '/api/products';

        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['data']) && is_array($data['data'])) {
                $viewData['products'] = $data['data'];
            } else {
                $viewData['error'] = 'Error on competitors api'; 
            }
        } else {
          $viewData['error'] = trans('messages.errorOnApi');
        }

        return view('admin.competitorMonitor.index')->with('viewData', $viewData);
    }
}
