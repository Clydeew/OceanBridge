<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function product(){return $this->belongsTo(Product::class);}
    protected $fillable = [
        'product_id',
        'title',
        'discount_percentage',
        'start_date',
        'end_date',
    ];
}
