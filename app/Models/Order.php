<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use SoftDeletes;

    public $table="orders";
    // public $timestamps= false;

    protected $fillable = [
        'product_id', 'user_id', 'quantity', 'address' 
    ];

  

    public function user() {
        return $this->belongto(User::class,'user_id');
    }
    public function product() {
        return $this->belongto(Product::class,'product_id');
    }
}
