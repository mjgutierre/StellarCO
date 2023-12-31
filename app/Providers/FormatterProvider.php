<?php

namespace App\Providers;

use App\Interfaces\DataFormatter;
use App\Utils\CSVFormatter;
use App\Utils\TXTformatter;
use Illuminate\Support\ServiceProvider;

class FormatterProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(DataFormatter::class, function ($app, $params) {
            $format = $params['format'];
            if ($format === 'csv') {
                return new CSVFormatter();
            } elseif ($format === 'txt') {
                return new TXTformatter();
            }
            abort(404, 'File type not supported.');
        });
    }
}
