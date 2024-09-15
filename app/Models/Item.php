<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    use HasFactory;

    public $table = "mst_item";

    protected $fillable = [
        'item_name',
        'item_description',
        'item_price',
    ];
}
