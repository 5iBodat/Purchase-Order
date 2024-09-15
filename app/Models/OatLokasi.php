<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class OatLokasi extends Model
{
    use HasFactory;

    public $table = "mst_oat";

    protected $fillable = [
        'name',
        'price',
    ];
}
