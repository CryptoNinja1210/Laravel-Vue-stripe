<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $table = 'carts';
    protected $fillable = ['product_id','quantity','user_id','price','created_at','updated_at'];

    public function product(){
        return $this->hasMany(Product::class,'id','product_id');
    }

}
