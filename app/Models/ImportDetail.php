<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ImportDetail extends Model
{ public $timestamps = false;
    protected $fillable = [
        'id_product',
        'quantity',
        'id_invoice',
        'price',
       'coupons_code',
        

        
    ];
}
