<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoTransport extends Model
{
    use HasFactory;

    public $table = "mst_po_transport";

    protected $fillable = [
        'po_number',
        'po_date',
        'to',
        'name',
        'address',
        'phone_fax',
        'comments',
        'requested_by',
        'shipped_via',
        'fob_point',
        'term',
        'transport',
        'loading_point',
        'delivered_to',
        'quantity',
        'description',
        'unit_price',
        'amount',
        'notes',
        'po_status',
        'type',
        'sub_total',
        'portal_money',
        'total',
        'created_by',
    ];
}
