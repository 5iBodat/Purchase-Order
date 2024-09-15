<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Sph extends Model
{
    use HasFactory;

    public $table = "trx_sph";

    protected $fillable = [
        'sph_code',
        'sph_type',
        'status',
        'company_name',
        'company_pic',
        'telepon_pic',
        'product_name',
        'harga',
        'ppn',
        'pbbkb',
        'total',
        'oatlokasi',
        'hargaoat',
        'notes',
        'customer_po',
        'lastupdate_by',
        'created_at',
    ];
}
