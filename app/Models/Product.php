<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'sku',
        'price',
        'sale_price',
        'image',
        'description',
        'create',
        'status',
        'id_brand',
        'id_category',
        'id_size',
        'id_color',
    ];
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}