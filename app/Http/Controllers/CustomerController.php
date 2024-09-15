<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CustomerController extends Controller
{
    public function __invoke(): View
    {
        return view('customer.index');
    }
}
