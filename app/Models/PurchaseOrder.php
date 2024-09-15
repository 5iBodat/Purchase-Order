<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $table = 'po_receive';

    protected $fillable = [
        'id',
        'sph_code',
        'po_no',
        'po_file',
        'po_status',
        'received_by',
    ];
}
