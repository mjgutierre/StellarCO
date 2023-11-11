<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

interface Dataformatter
{
    public function download(Request $request): StreamedResponse;
}
