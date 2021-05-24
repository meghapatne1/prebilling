<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productcustomer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_mobile','shift','product_name','start_date','end_date',
        'agent','status','amount','total_token','cost_of_per_token','no_of_token_utilized','remaning_token',
        'pincode','user_mobile','token_expire_date','payment_type','customer_id','pro_cus_id'
    ];

}
