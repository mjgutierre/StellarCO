<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface Dataformatter
{
    public function download(Request $request): void;
}
