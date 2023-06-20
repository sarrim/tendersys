<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderDetails;
use App\Models\Order;

class OrderDetails extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }

    public function vendor()
    {
        return $this->hasMany(User::class, 'id', 'vendor_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    
}
