<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name','last_name', 'name','address', 'colony', 'city', 'shift', 'mobile1', 'product_name','start_date','end_date',
        'mobile2','agent','status','amount','total_token','cost_of_per_token','no_of_token_utilized','remaning_token','pincode',
        'user_name','user_mobile','token_expire_date'
    ];
}
 