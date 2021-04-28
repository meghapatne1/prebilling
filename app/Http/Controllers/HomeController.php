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
       
        return view('customerHome');
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

            //    $mobile_exist_ust = DB::table('customers')->where('mobile1','=',$request['mobile1'][$key])->get();
            //    if(count($mobile_exist_ust) > 0){
            //     return back()->withError('Duplicate Mobile Number Not Allow ' . $request['mobile1'][$key])->withInput();
            //    }

           //End validation for user table mobile number

           
            $customer_info = new Customer;
            $customer_info->name = $request['name'][$key];
            $customer_info->address = $request['address'][$key];
            $customer_info->mobile1 = $request['mobile1'][$key];
            $customer_info->colony = $request['colony'][$key];
            $customer_info->pincode = $request['pincode'][$key];
            $user = Auth::user();
            $customer_info->user_mobile = $user->mobile;
            // $customer_info->user_name =  $user->name;
            $customer_info->save();
            $user_table = new User;
            $user_table->name = $request['name'][$key];
            $user_table->mobile = $request['mobile1'][$key];
            $user_table->password = 11111111;
            $user_table->save();
            $count[]=$customer_info;
        }
        DB::commit();
        $customer_count= count($count);
        // dd( $customer_count);
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
        $customer = Customer::where('id', $id)->delete();
        return redirect()->route('view_customer')->with('success','Customer deleted successfully');
    }

    public function edit($id)
    {
        $customerdata = Customer::where('id', $id)->get();
        return view('editcustomer',compact('customerdata'));
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
        $customer_data = Customer::find($request->id);
        $customer_data->no_of_token_utilized = $request->no_of_token_utilized+$customer_data->no_of_token_utilized ;
        $customer_data->remaning_token = $customer_data->total_token -  $customer_data->no_of_token_utilized;
        $customer_data->save();
        $customer_history = New Customer_history;
        $customer_history->customer_id=$customer_data->id;
        $customer_history->customer_firstname=$customer_data->first_name;
        $customer_history->customer_lastname=$customer_data->last_name;
        $customer_history->mobile1=$customer_data->mobile1;
        $customer_history->product_name=$customer_data->product_name;
        $customer_history->cost_of_per_token=$customer_data->cost_of_per_token;
        $customer_history->no_of_token_utilized=$customer_data->no_of_token_utilized;
        $customer_history->remaning_token=$customer_data->remaning_token;
        $customer_history->total_token=$customer_data->total_token;
        
        $user = Auth::user();
        $customer_history->user_id=$user->id;
        $customer_history->save();
        return redirect()->route('view_customer')->with('success','Token updated successfully');
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

        $customer_history_data= DB::table('customer_histories')->get();
        return view('customerHistory',compact('customer_history_data'));
        
    }

    
    public function add_point_of_sale(Request $request){

        $pos_data = DB::table('pointofsales')->where('user_mobile','=', Auth::user()->mobile)->get();

        return view('add_pos',compact('pos_data'));  
    }
    
    public function savepos(Request $request){

        DB::beginTransaction();
        try{
           //validation for user table mobile number
               $mobile_exist = DB::table('users')->where('mobile','=',$request->mobile)->get();
               if(count($mobile_exist) > 0){
                return back()->withError('Duplicate Mobile Number Not Allow ' . $request->mobile)->withInput();
               }

            //    $mobile_exist_pos = DB::table('pointofsales')->where('mobile','=',$request->mobile)->get();
           
            //    if(count($mobile_exist_pos) > 0){
            //     return back()->withError('Duplicate Mobile Number Not Allow ' . $request->mobile)->withInput();
            //    }

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
            // $poinofsales->user_name =  $user->name;
            $poinofsales->save();
           
            $user_table = new User;
            $user_table->name = $request->name;
            $user_table->mobile = $request->mobile;
            $user_table->password = 11111111;
            $user_table->save();
        
             DB::commit();
    
             return redirect()->route('add_pos')->with('success','your data added successfully');

            } catch (Exception $exception) {

                DB::rollback();
               
                return back()->withError( $exception->getMessage())->withInput();
            }
        
    }
    

    public function deletepos($id){
        $pos = Pointofsale::where('id', $id)->where('user_mobile', Auth::user()->mobile)->delete();
    
        return redirect()->route('add_pos')->with('success','Data deleted successfully');
    }

    
public function editpos($id){

        $get_pos = Pointofsale::where('id', $id)->get();
      
        return view('edit_pos',compact('get_pos')); 
       
    }

    public function updatepos(Request $request){

        DB::beginTransaction();
        try{
           //validation for user table mobile number
            //    $mobile_exist = DB::table('users')->where('mobile','=',$request->mobile)->get();
            //    if(count($mobile_exist) > 0){
            //     return back()->withError('Duplicate Mobile Number Not Allow ' . $request->mobile)->withInput();
            //    }

            //    $mobile_exist_pos = DB::table('pointofsales')->where('mobile','=',$request->mobile)->get();
           
            //    if(count($mobile_exist_pos) > 0){
            //     return back()->withError('Duplicate Mobile Number Not Allow ' . $request->mobile)->withInput();
            //    }

           //End validation for user table mobile number           
            $poinofsales = Pointofsale::find($request->id);
            $poinofsales->name = $request->name;
            $poinofsales->address = $request->address;
            // $poinofsales->mobile = $request->mobile;
            $poinofsales->city = $request->city;
            $poinofsales->pincode = $request->pincode;
            $poinofsales->status = $request->status;
            $user = Auth::user();
            $poinofsales->user_mobile = $user->mobile;
            $poinofsales->user_name =  $user->name;
            $poinofsales->save();
            
            // $user_table = Pointofsale::find($request->id);  worked on later
            // $user_table->mobile = $request->mobile;
            // $user_table->save();
         
             DB::commit();
    
             return redirect()->route('add_pos')->with('success','data updated successfully');

            } catch (Exception $exception) {

                DB::rollback();
               
                return back()->withError( $exception->getMessage())->withInput();
            }
        
       
    }
    
}
