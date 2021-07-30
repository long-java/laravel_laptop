<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $guarded = [  //bo qua cac thuoc tinh trong nay
        
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'category_id');
        // return $this->hasMany('Models/Product');
    }

}
