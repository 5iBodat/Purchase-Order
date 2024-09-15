<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    use HasFactory;

    public $table = "mst_supplier";

    protected $fillable = [
        'customer_name',
        'nomer_pajak',
        'alamat',
        'nama_pic',
        'telepon_pic',
        'email_pic',
        'whatsapp',
        'is_customer',
    ];
}
