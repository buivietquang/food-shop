<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Cart;
session_start();

class CheckoutController extends Controller
{
    public function login_checkout(){
        $cate_product = DB::table('tbl_category_products')->where('cate_status','1')->orderby('cate_id','desc')->get();
        $brand_product = DB::table('tbl_brands')->where('brand_status','1')->orderby('brand_id','desc')->get();
        
        return view('front.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function add_customer(Request $request){
//         $data = array();
// $data['customer_name'] = $request->customer_name;
// $data['customer_email'] = $request->customer_email;
// $data['customer_password'] = $request->customer_password;
// $data['customer_phone'] = $request->customer_phone;


//         $customer_id = DB::table('tbl_customers')->insertGetId($data);

//         Session::put('customer_id',$customer_id);
//         Session::put('customer_name',$request->customer_name);
//         return redirect('/checkout');


                
                $data = [
                    'customer_name' => $request->customer_name,
                    'customer_email' => $request->customer_email,
                    'customer_password' => md5($request->customer_password),
                    'customer_phone' => $request->customer_phone,
                ];

               
                $customer_id = DB::table('tbl_customers')->insertGetId($data);

             
                Session::put('customer_id', $customer_id);
                Session::put('customer_name', $request->customer_name);

           
                return redirect::to('/checkout');
    }
    public function checkout(){
       
        $cate_product = DB::table('tbl_category_products')->where('cate_status','1')->orderby('cate_id','desc')->get();
        $brand_product = DB::table('tbl_brands')->where('brand_status','1')->orderby('brand_id','desc')->get();
        
        return view('front.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function save_checkout_customer(Request $request){
       
        $data = [
            'shipping_name' => $request->shipping_name,
            'shipping_email' => $request->shipping_email,
            'shipping_note' => $request->shipping_note,
            'shipping_phone' => $request->shipping_phone,
            'shipping_address' => $request->shipping_address,
        ];

       
        $shipping_id = DB::table('tbl_shippings')->insertGetId($data);

     
        Session::put('shipping_id', $shipping_id);
        

   
        return redirect::to('/payment');
    }

    public function payment(){
        $cate_product = DB::table('tbl_category_products')->where('cate_status','1')->orderby('cate_id','desc')->get();
        $brand_product = DB::table('tbl_brands')->where('brand_status','1')->orderby('brand_id','desc')->get();

        return view('front.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);
    }
        
       
       
    
    public function logout_checkout(){
       
       Session::flush();
       return Redirect::to('/trang-chu');
    }
   
    public function login_customer(Request $request) {
        $email = $request->email_account;
        $password = md5($request->password_account);
    
    
        $result = DB::table('tbl_customers')
                    ->where('customer_email', $email)
                    ->where('customer_password', $password)
                    ->first();
    
      
        Log::debug('Query result: ', (array) $result);
    
        if ($result) {
            Session::put('customer_id', $result->customer_id);
            return Redirect::to('/checkout');
        } else {
        
            return Redirect::to('/login-checkout');
        }
    }

    public function order_place(Request $request){
        //insert payment
        $data = [
            'payment_method' => $request->payment_option,
            'payment_status' => 'Đang chờ xử lý',
        ];
        $payment_id = DB::table('tbl_payments')->insertGetId($data);

        //inser order
        $order_data = [
            'customer_id' => Session::get('customer_id'),
            'shipping_id' => Session::get('shipping_id'),
            'payment_id' => $payment_id,
            'order_total' =>Cart::total(),
            'order_status' => 'Đang chờ xử lý',
            
        ];
        $order_id = DB::table('tbl_orders')->insertGetId($order_data);

        //insert order details
        $content = Cart :: content();
        foreach($content as $v_content){
            $order_d_data = [
                'order_id' => $order_id,
                'product_id' => $v_content->id,
                'product_name' => $v_content->name,
                'product_price' =>$v_content->price,
                'product_sales_quantity' =>$v_content->qty,
                
            ];
            DB::table('tbl_order_details')->insert($order_d_data);
        }
        if($data['payment_method']==1){
            echo 'Thanh toán thẻ ATM';
        }elseif($data['payment_method']==2){
            Cart::destroy();
      
                $cate_product = DB::table('tbl_category_products')->where('cate_status','1')->orderby('cate_id','desc')->get();
                $brand_product = DB::table('tbl_brands')->where('brand_status','1')->orderby('brand_id','desc')->get();
                
                return view('front.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);
        }
        
       
        return redirect::to('/payment');
    }
    public function manage_order(){
        $all_order = DB::table('tbl_orders')
        ->join('tbl_customers','tbl_orders.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_orders.*','tbl_customers.customer_name')
        ->orderby("tbl_orders.order_id",'desc')->get();
        $manager_order = view('admin.manage_order')->with('all_order', $all_order);
        return view('back.admin_index')->with('admin.manage_order', $manager_order);
       
    }
    public function view_order($orderId){
       
        $order_by_id = DB::table('tbl_orders')
        ->join('tbl_customers','tbl_orders.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shippings','tbl_orders.shipping_id','=','tbl_shippings.shipping_id')
        ->join('tbl_order_details','tbl_orders.order_id','=','tbl_order_details.order_id')
        ->select('tbl_orders.*','tbl_customers.*','tbl_shippings.*','tbl_order_details.*')
        ->first();
        $manager_order_by_id = view('admin.view_order')->with('order_by_id', $order_by_id);
        return view('back.admin_index')->with('view.manage_order', $manager_order_by_id);
       
    }





}
