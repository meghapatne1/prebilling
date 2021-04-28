<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_history extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'customer_firstname','customer_lastname','product_name','user_id','customer_id',
        'cost_of_per_token','no_of_token_utilized','remaning_token','total_token','mobile1'
    ];
  
}
