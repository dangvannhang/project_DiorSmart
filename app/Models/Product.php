<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use App\Models\Order;

class Product extends Model
{
    use SoftDeletes, HasFactory;

    public $table="products";
    // public $timestamps = false;

    protected $fillable = [
        'name', 'price', 'units', 'description', 'image'
    ];

    public function order() {
        return $this->hasMany(Order::class);
    }

}
