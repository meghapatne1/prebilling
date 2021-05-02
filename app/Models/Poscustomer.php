<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poscustomer extends Model
{
    use HasFactory;
    protected $fillable = [
        'pos_mobile','customer_mobile','user_mobile','status','customer_name'
     ];
}
