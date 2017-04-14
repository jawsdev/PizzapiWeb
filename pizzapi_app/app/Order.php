<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id', 'created_at', 'user_id', 'cart', 'address', 'payment_name', 'payment_id', 'first_name', 'last_name', 'phone_number', 'order_complete', 'service', 'delivery_info'];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
