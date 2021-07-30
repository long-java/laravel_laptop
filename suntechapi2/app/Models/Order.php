<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function statuses()
    {
        return $this-> belongsTo(Status::class,'status_id');

    }
    public function order_items()
    {
        return $this->hasMany(OrderItem::class,'order_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
