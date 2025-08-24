<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id', 'poster_id', 'qty', 'price'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function poster()
    {
        return $this->belongsTo(Poster::class);
    }
}
