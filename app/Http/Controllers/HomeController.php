<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Customer_history;
use App\Models\Pointofsale;
use DB;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
Use Exception;
use Hash;
use Session;
use App\Models\Poscustomer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $product_get = DB::table('products')->where('user_mobile','=',$user->mobile)->get();
        if((count($product_get)) > 0 ){
            return redirect()->route('add_customers_info');
        }
        $product = $request->session()->get('product');
        return view('home',compact('product'));
    }


    public function customerHome()
    {
          
          $customer=DB::table('customers')->where('mobile1','=',Auth::user()->mobile)->first();
          $customer_history=DB::table('customer_histories')->where('customer_mobile','=',Auth::user()->mobile)->get();
          return view('CustomerDashboard',compact('customer','customer_history'));
    }
    
    
    public function poshome()
    {
        $pos_user_mobile= Auth::user()->mobile;
        $pos_user_info = DB::table('pointofsales')->where('mobile','=',$pos_user_mobile)->get();
        $pos_customers = DB::table('poscustomers')->where('pos_mobile','=',$pos_user_mobile)->get();
    
        return view('PosDashboard',compact('pos_user_info','pos_customers'));
    }

      public function getCustomer($id)
    {
        $get_customers = DB::table('customers')->where('id','=',$id)->get();
        
        return view('customerToken',compact('get_customers'));
    }

    public function home3()
    {
        return view('home3');
    }

    public function return_dashboard()
    {
        $product_data = DB::table('products')->where('user_mobile','=',Auth::user()->mobile)->get();
        $customer_data = DB::table('customers')->where('user_mobile','=',Auth::user()->mobile)->get();
      
        return view('dashboard',compact('product_data','customer_data'));
    }
    
    public function addcustomers()
    {
        $user = Auth::user();
        $customer_get = DB::table('customers')->where('user_mobile','=',$user->mobile)->get();
        if((count($customer_get)) > 0 ){
            return redirect()->route('dashboard');
        }
        return view('add_customers');
    }

    public function update_profile_user()
    {
        $user = Auth::user();
        $user_profile = DB::table('users')
        ->where('id','=',$user->id)
        ->select('id','email','name','mobile','password','merchant_type')
        ->get();
        return view('Update_user_profle',compact('user_profile'));
    }

    public function save_user_profile(Request $request)
    {
        // $mobiledata = DB::table('users')->where('mobile','=',$request->mobile)->where('id','!=',$request->id)->get();
        // if(count($mobiledata) > 0){
        //     return back()->withError('This mobile number already exist in the system  ' . $request->mobile)->withInput();
        // }

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->mobile = $request->mobile;
        $user->merchant_type = $request->merchant_type;
        // $user->password =  Hash::make($request->mobile);
        $user->save();
        return redirect()->back()->with('success','User Profile Updated Successfully.');

    }
    
    

    public function customers_info(Request $request) //save customers info
    {
      
        DB::beginTransaction();
        try{
        $product_data = $request['name'];
        $count=Array();
        foreach ($product_data as $key => $val) {
           //validation for user table mobile number
               $mobile_exist = DB::table('users')->where('mobile','=',$request['mobile1'][$key])->get();
               if(count($mobile_exist) > 0){
                return back()->withError('Duplicate Mobile Number Not Allow ' . $request['mobile1'][$key])->withInput();
            }
           //End validation for user table mobile number
            $customer_info = new Customer;
            $customer_info->name = $request['name'][$key];
            $customer_info->address = $request['address'][$key];
            $customer_info->mobile1 = $request['mobile1'][$key];
            $customer_info->colony = $request['colony'][$key];
            $customer_info->pincode = $request['pincode'][$key];
            $customer_info->status = 1;
            $user = Auth::user();
            $customer_info->user_mobile = $user->mobile;
            $customer_info->save();
            $user_table = new User;
            $user_table->name = $request['name'][$key];
            $user_table->mobile = $request['mobile1'][$key];
            $user_table->password = Hash::make(11111111);
            $user_table->is_admin = 3;
            $user_table->save();
            $count[]=$customer_info;
        }
        DB::commit();
        $customer_count= count($count);
        return redirect()->route('dashboard')->with('success','You have successfully added your '.$customer_count.' Customers');

        } catch (Exception $exception) {
            DB::rollback();
            return back()->withError( $exception->getMessage())->withInput();
        }
      
    }


    public function create()
    {
        return view('addcustomer');
    }

     /**
     * Store a newly created customer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile1' => 'required',
        ]);
    
       $data =  Customer::create($request->all());
     
        return redirect()->route('add_customer')->with('success','Customer created successfully.');
    }
     /**
     * Store a newly display customer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        $customerdata = DB::table('customers')->where('user_mobile','=',$user->mobile)->get();
        return view('viewcustomer',compact('customerdata'));
    } 

    public function delete( $id)
    {
        DB::beginTransaction();
        try{
        $customer_mobile = Customer::where('id', $id)->select('mobile1')->first();
        $customer = Customer::where('id', $id)->delete();
        $user = User::where('mobile', $customer_mobile->mobile1)->delete();
        DB::commit();

        return redirect()->route('view_customer')->with('success','Customer deleted successfully');

        } catch (Exception $exception) {

            DB::rollback();
           
            return back()->withError( $exception->getMessage())->withInput();
        }
    
        }

    public function edit($id)
    {
        $customerdata = Customer::where('id', $id)->get();
        foreach($customerdata as $item){
           $user_number = $item->user_mobile;
        }
        $getProduct = DB::table('products')->where('user_mobile','=',$user_number)->get();
        return view('editcustomer',compact('customerdata','getProduct'));
    }

    public function update(Request $request){
        $customer = Customer::find($request->id);
        $customer->name = $request->name;
        $customer->pincode = $request->pincode;
        $customer->address = $request->address; 
        $customer->status = $request->status;
        $customer->save();
       return redirect()->route('view_customer')->with('success','Customer updated successfully');

    }

    public function update_customer_account(Request $request){

        $customer = Customer::find($request->id);
        $customer->shift = $request->shift;
        $customer->amount = $request->amount;
        $customer->total_token = $request->total_token;
        $customer->cost_of_per_token = $request->cost_of_per_token;
        $customer->no_of_token_utilized = $request->no_of_token_utilized;
        $customer->remaning_token = $request->remaning_token;
        $customer->product_name = $request->product_name;
        $customer->token_expire_date = $request->token_expire_date;
        
        $customer->save();
  
       return redirect()->route('view_customer')->with('success','Customer account updated successfully');

    }
    
    public function deliver_token($id){
        
        return view('delivertoken',compact('id'));
    }

    public function savetoken(Request $request){
        
        DB::beginTransaction();
        try{
        $customer_data = Customer::find($request->id);

        // validation if remaning token is less than use token it will not allow
        if($request->no_of_token_utilized > $customer_data->remaning_token){
            return back()->withError('You can not use more than ' . $request->no_of_token_utilized . ' token')->withInput();
        }
        // validation if remaning token is less than use token it will not allow 

        $customer_data->no_of_token_utilized = $request->no_of_token_utilized+$customer_data->no_of_token_utilized ;
        $customer_data->remaning_token = $customer_data->total_token -  $customer_data->no_of_token_utilized;
        $customer_data->save();
        $customer_history = New Customer_history;
        $customer_history->customer_id=$customer_data->id;
        $customer_history->customer_name=$customer_data->name;
        $customer_history->customer_mobile=$customer_data->mobile1;
        $customer_history->product_name=$customer_data->product_name;
        $customer_history->cost_of_per_token=$customer_data->cost_of_per_token;
        $customer_history->no_of_token_utilized=$request->no_of_token_utilized;
        $customer_history->remaning_token=$customer_data->remaning_token;
        $customer_history->total_token=$customer_data->total_token;
        $customer_history->user_mobile= Auth::user()->mobile;
        $user = Auth::user();
        $customer_history->user_id=$user->id;
        $customer_history->save();
        
        DB::commit();
        return redirect()->route('view_customer')->with('success','Token updated successfully');
        } catch (Exception $exception) {

            DB::rollback();
           
            return back()->withError( $exception->getMessage())->withInput();
        }



       }
    
    public function issue_token($id){
        return view('issuetoken',compact('id'));
    }
    

    public function save_issue_token(Request $request){
        $customer_data = Customer::find($request->id);
        $customer_data->amount =$customer_data->amount + $request->amount ;
        $customer_data->total_token = $customer_data->total_token + $request->total_token;
        $customer_data->save();
        return redirect()->route('view_customer')->with('success','Token updated successfully');

    }
    public function customerhistory(Request $request){

        $customer_history_data= DB::table('customer_histories')->where('user_mobile','=', Auth::user()->mobile)->get();
        return view('customerHistory',compact('customer_history_data'));
        
    }

    
    public function add_point_of_sale(Request $request){

        $pos_data = DB::table('pointofsales')->where('user_mobile','=', Auth::user()->mobile)->get();

        return view('add_pos',compact('pos_data'));  
    }
    
    public function savepos(Request $request){

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required|integer|min:10',
            'pincode' => 'required|integer|min:6',
        ]);

        DB::beginTransaction();
        try{
           //validation for user table mobile number
               $mobile_exist = DB::table('users')->where('mobile','=',$request->mobile)->get();
               if(count($mobile_exist) > 0){
                return back()->withError('Duplicate Mobile Number Not Allow ' . $request->mobile)->withInput();
               }

           //End validation for user table mobile number           
            $poinofsales = New Pointofsale;
            $poinofsales->name = $request->name;
            $poinofsales->address = $request->address;
            $poinofsales->mobile = $request->mobile;
            $poinofsales->city = $request->city;
            $poinofsales->pincode = $request->pincode;
            $poinofsales->status = 1;
            $user = Auth::user();
            $poinofsales->user_mobile = $user->mobile;
            $poinofsales->save();
            $user_table = new User;
            $user_table->name = $request->name;
            $user_table->mobile = $request->mobile;
            $user_table->password = Hash::make(11111111);
            $user_table->is_admin = 2;
            $user_table->save();
            DB::commit();

            return redirect()->route('add_pos')->with('success','your data added successfully');

            } catch (Exception $exception) {

                DB::rollback();
               
                return back()->withError( $exception->getMessage())->withInput();
            }
        
    }
    

    public function deletepos($id){
        DB::beginTransaction();
        try{
        $pos_mobile = Pointofsale::where('id', $id)->select('mobile')->first();
        $pos = Pointofsale::where('id', $id)->where('user_mobile', Auth::user()->mobile)->delete();
        $User = User::where('mobile',$pos_mobile->mobile)->delete();
        DB::commit();
        return redirect()->route('add_pos')->with('success','Data deleted successfully');
        
        } catch (Exception $exception) {
            DB::rollback();
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    
public function editpos($id){

        $get_pos = Pointofsale::where('id', $id)->get();
      
        return view('edit_pos',compact('get_pos')); 
       
    }

    public function updatepos(Request $request){

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'pincode' => 'required|integer|min:6',
        ]); 
        DB::beginTransaction();
        try{  
           //End validation for user table mobile number           
            $poinofsales = Pointofsale::find($request->id);
            $poinofsales->name = $request->name;
            $poinofsales->address = $request->address;
            $poinofsales->city = $request->city;
            $poinofsales->pincode = $request->pincode;
            $poinofsales->status = $request->status;
            $user = Auth::user();
            $poinofsales->user_mobile = $user->mobile;
            $poinofsales->save();    
             DB::commit();
            return redirect()->route('add_pos')->with('success','data updated successfully');

            } catch (Exception $exception) {

                DB::rollback();
               
                return back()->withError( $exception->getMessage())->withInput();
            }
        
       
    }
    
    public function add_product(Request $request){
   
        return view('product'); 

    }

    public function saveproduct(Request $request){

                $request->validate([
                    'pro_name' => 'required',
                    'pro_price' => 'required |integer',
                    'pro_unit' => 'required',
                ]);

            $product = new Product;
            $product->pro_price = $request->pro_price;
            $product->pro_name = $request->pro_name;
            $product->pro_unit = $request->pro_unit;
            $user = Auth::user();
            $product->user_mobile = $user->mobile;
            $product->save();
            
        return redirect()->route('dashboard')->with('success','Product added successfully...');

    }

    public function return_customer(Request $request)
    {
        return view('customer_view'); 
    
    }
    

    public function pos_link_customers($mobile_pos)
    {
        $get_customers=DB::table('customers')->where('user_mobile','=',Auth::user()->mobile)->get();
        $mobile=$mobile_pos;

        $get_poscustomers=DB::table('poscustomers')->where('pos_mobile','=',$mobile)->get();

        return view('pos_link_customers',compact('get_customers','mobile','get_poscustomers')); 
    
    }

    
    public function save_pos_customers(Request $request)
    {
        $request->validate([
            'customer_mobile' => 'required',
        ]); 
         $product_data = $request['customer_mobile'];
       
         $count=Array();
         foreach ($product_data as $key => $val) {
         $get_customer_name=DB::table('customers')->where('mobile1','=',$request['customer_mobile'][$key])
         ->select('name')->first();
           $pos_customer = New Poscustomer;
           $pos_customer->pos_mobile = $request->pos_mobile;
           $pos_customer->customer_mobile =  $request['customer_mobile'][$key];
           $pos_customer->customer_name =  $get_customer_name->name;
           $user = Auth::user();
           $pos_customer->user_mobile = $user->mobile;
           $pos_customer->status = 1;
           $pos_customer->save();
           $count[]=$pos_customer;
         }
           return redirect()->route('add_pos')->with('success','Customers link to pos successfully');
    }

    public function delete_pos_customer($id){
        $pos = Poscustomer::where('id', $id)->delete();
        return redirect()->route('add_pos')->with('success','Data deleted successfully');
    }
    
    
    public function deleteproduct($id){
        $product = Product::where('id', $id)->delete();
        return redirect()->route('dashboard')->with('success','Product deleted successfully');
    }
    
    public function editproduct($id){
        $product_data= Product::where('id', $id)->get();
        return view('edit_product',compact('product_data'));
     }
     public function updateproduct(Request $request){
        $product= Product::find($request->id);
        $product->pro_name = $request->pro_name;
        $product->pro_price = $request->pro_price;
        $product->pro_unit = $request->pro_unit;
        $product->save();
        return redirect()->route('dashboard')->with('success','Product updated successfully');
     }
    
     
}
