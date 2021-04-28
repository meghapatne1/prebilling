<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pointofsale extends Model
{
    use HasFactory;

    protected $fillable = [
       'name','address', 'city','mobile', 'pincode',
       'user_name','user_mobile','status'
    ];

}
