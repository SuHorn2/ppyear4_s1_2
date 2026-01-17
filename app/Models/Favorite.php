<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
     protected $fillable = [
        'user_id',
        'product_unique_id'
    ];
    public function product()
    {
        return $this->belongsTo(
            Product::class,
            'product_unique_id', 
            'unique_id'          
        );
    }
}
