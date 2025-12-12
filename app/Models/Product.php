<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'discount',
        'status',
        'featured',
        'tags',
        'image_1',
        'image_2',
        'image_3',
    ];

    protected $casts = [
        'tags' => 'array',
        'featured' => 'boolean',
    ];
}
