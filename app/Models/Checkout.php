<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'receiver',
        'phone',
        'address',
        'total_payment ',
        'note ',
        'create_at',
        'stt',  
        'payment_method',
        'id_category',
        'id_admin',
        'id_user',
    ];
}
