<?php

namespace App\Models;

use App\Traits\UUID;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use UUID;

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'selling_price',
        'buying_price',
        'category_id',
        'code',
        'thumbnail'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class,'product_vendor');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }
}
