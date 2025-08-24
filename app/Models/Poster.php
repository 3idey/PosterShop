<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'title', 'description', 'price', 'image', 'category'
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
