<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = [
        'name',
        'phone',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_vendor');
    }
}
