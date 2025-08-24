<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'poster_id',
        'qty',
        'price',
        'title_snapshot',
        'image_snapshot'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function poster()
    {
        return $this->belongsTo(Poster::class);
    }
}
