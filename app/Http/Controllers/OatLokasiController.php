<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class OatLokasiController extends Controller
{
    public function __invoke(): View
    {
        return view('oat_lokasi.index');
    }
}
