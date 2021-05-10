<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;
use Illuminate\Support\Facades\Validator;
Use Exception;

class CustomerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      
          return new Customer([
                'name'    => $row['name'],
                'address' => $row['address'], 
                'colony'  => $row['colony'], 
                'mobile1' => $row['mobile'],
                'pincode' => $row['pincode'],
                'user_mobile' => Auth::user()->mobile,
            ]);
           
    }
}
