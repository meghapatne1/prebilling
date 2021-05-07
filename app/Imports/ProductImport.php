<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      
          return new Product([
                'pro_name'     => $row['name'],
                'pro_price'    => $row['price'], 
                'pro_unit'    => $row['unit'], 
                'user_mobile' => Auth::user()->mobile
            ]);
           
    }
}
