<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class PurchaseOrderController extends Controller
{
    public function __invoke(): View
    {
        return view('purchase_order.index');
    }
}
