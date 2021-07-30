<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    // protected $primaryKey = 'id_post';
    
    protected $guarded = [  //bo qua cac thuoc tinh trong nay
        
    ];

    public function exams()
    {
        return $this->belongsTo(Exam::class,'category_id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class,'id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class,'id');
    }


}
