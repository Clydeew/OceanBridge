<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user(){return $this->belongsTo(User::class);}
    public function category(){return $this->belongsTo(Category::class);}
    public function reviews(){return $this->hasMany(Review::class);}
    public function promotions(){return $this->hasMany(Promotion::class);}
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'description',
        'price',
        'stock',
        'origin_region',
        'image',
    ];
}
