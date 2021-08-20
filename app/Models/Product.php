<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'price',
        'currency',
        'description',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'shipping',
        'shipment_usa',
        'shipment_int',
        'image_style', // 0 = Expanded 1 = Rounded 2 =  Flat
        'product_type', // 0 = Physical Goods 1 = Digital Goods 
        'visits',
        'last_visit',
        'image_header_ratio',
        'image_header_image',
        'size_color_pickers',
        'description_style',
        'checkout_style'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
