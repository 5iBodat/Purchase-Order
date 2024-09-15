<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Item;
use App\Models\OatLokasi;
use App\Models\PoTransport;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class PoTransportController extends Controller
{
    public function __invoke(): View
    {
        $sphType = Setting::select('id', 'key', 'value')
            ->where('key', 'entity_type')
            ->orderBy('value', 'asc')
            ->get();
        $customer = Customer::select('id', 'customer_name', 'nama_pic', 'telepon_pic')->orderBy('customer_name', 'asc')->get();
        $produk = Item::select('id', 'item_name', 'item_price')->orderBy('item_name', 'asc')->get();
        $lokasi = OatLokasi::select('id', 'name', 'price')->orderBy('name', 'asc')->get();
        $ppn = Setting::select('key', 'value')
            ->where('key', 'ppn')
            ->orderBy('value', 'asc')
            ->get();
        $pbbkb = Setting::select('key', 'value')
            ->where('key', 'pbbkb')
            ->orderBy('value', 'asc')
            ->get();

        return view('po_transporter.index', compact('sphType', 'customer', 'produk', 'lokasi', 'ppn', 'pbbkb'));
    }
}
