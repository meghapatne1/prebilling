<?php

namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;

class MyController extends Controller
{
    
        /**
        * @return \Illuminate\Support\Collection
        */
     
        /**
        * @return \Illuminate\Support\Collection
        */
        public function export() 
        {
            return Excel::download(new ProductExport, 'users.xlsx');
        }
         
        /**
        * @return \Illuminate\Support\Collection
        */

        public function importProduct() 
        {
            if(request()->file('file') == Null){
             
                return back()->withError('Please Select File')->withInput();

            }
            Excel::import(new ProductImport,request()->file('file'));
          
            return redirect()->back()->with('success','Product saved successfully...');
        
        }
        
}
