<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class SupplierController extends Controller
{
    public function __invoke(): View
    {
        return view('supplier.index');
    }
}
