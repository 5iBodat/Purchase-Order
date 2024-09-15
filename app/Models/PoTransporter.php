<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoTransporter extends Model
{
    use HasFactory;

    protected $table = 'mst_po_vendor';

    protected $fillable = [
        'id',
        'po_numbers',
        'sph_code',
        'po_type',
        'po_date',
        'requested_by',
        'shipped_by',
        'fob',
        'term',
        'transport',
        'po_status',
        'created_at',
        'updated_at',
    ];
}
