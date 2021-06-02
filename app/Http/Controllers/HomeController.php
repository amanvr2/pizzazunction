<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
    public function index()
    {

      
      $pickup_spcl = DB::select('select * from products where category = ?', ['pickup_spcl']);
      $everyday_spcl = DB::select('select * from products where category = ?', ['everyday_spcl']);
      $sides = DB::select('select * from products where category = ?', ['sides']);
      $wings = DB::select('select * from products where category = ?', ['wings']);
      $deliverySpcl_single = DB::select('select * from products where category = ?', ['deliverySpcl_single']);
      $deliverySpcl_double = DB::select('select * from products where category = ?', ['deliverySpcl_double']);
      $deliverySpcl_triple = DB::select('select * from products where category = ?', ['deliverySpcl_triple']);
      $pizzaWings_combo = DB::select('select * from products where category = ?', ['pizzaWings_combo']);
      $panzo = DB::select('select * from products where category = ?', ['panzo']);
  
      $tops = DB::select('select * from paid_toppings');

      return view('home',['pickup_spcl' => $pickup_spcl],['everyday_spcl' => $everyday_spcl] )->with('sides' , $sides)->with('wings' , $wings)->with('deliverySpcl_single', $deliverySpcl_single)->with('deliverySpcl_double', $deliverySpcl_double)->with('deliverySpcl_triple', $deliverySpcl_triple)->with('pizzaWings_combo', $pizzaWings_combo)->with('panzo', $panzo)->with('tops',$tops);

      
 
    }

    public function viewCart(){

      $uid = auth()->user()->id;
      $data = DB::select('select * from cart where user_id=?',[$uid]);

      foreach($data as $cartid){

        $cartId = $cartid->id;
      }

      $productCount = 0;
 
      if(isset($cartId)){
        $cartData = DB::select('select * from cartproducts where cart_id=?',[$cartId]);

        $productCount = count($cartData);

        $grandTotal = 0;

        foreach($cartData as $data){

          $total = ($data->price * $data->quantity) + $data->paid_toppingsPrice;
          $grandTotal = $grandTotal + $total;


        }

        return view('order.cart')->with('cartData', $cartData)->with('productCount', $productCount)->with('grandTotal', $grandTotal);

      }
      else{ 

        return view('order.cart')->with('productCount', $productCount);
      }

    }

    public function addTocart(Request $req, $id){

      $quantity = $req->input('quantity');
      $topping1 = $req->input('topping1');
      $topping2 = $req->input('topping2');
      $topping3 = $req->input('topping3');
      $topping4 = $req->input('topping4');
    
      $sectopping1 = $req->input('sectopping1');
      $sectopping2 = $req->input('sectopping2');
      $sectopping3 = $req->input('sectopping3');
      $sectopping4 = $req->input('sectopping4');

      $toppings = $topping1.','.$topping2.','.$topping3.','.$topping4;

      $secondToppings = $sectopping1.','.$sectopping2.','.$sectopping3.','.$sectopping4;

      if($sectopping1 != NULL){
        $toppings = $toppings.'Second pizza toppings :-'.$secondToppings;
      }
      
      $addtopping1 = $req->input('addtopping1');
      $addtopping2 = $req->input('addtopping2');
      $topping1Price = 0;
      $topping2Price = 0;

      if($addtopping1 != NULL){
        $addtopping1Price = DB::select('select price from paid_toppings where name = ?',[$addtopping1]);
        foreach($addtopping1Price as $data)
          {
            $topping1Price = $data->price;          
          }        
      }

      if($addtopping2 != NULL){
        $addtopping2Price = DB::select('select price from paid_toppings where name = ?',[$addtopping2]);
        foreach($addtopping2Price as $data)
          {
            $topping2Price = $data->price;          
          }        
      }

     $paid_toppingsnames = $addtopping1.','.$addtopping2;
     $totalToppingsPrice = $topping1Price + $topping2Price;


      $uid = auth()->user()->id;
      $data = DB::select('select * from cart where user_id = ?',[$uid]);

      $cartcount = count($data);

      if($cartcount == 0){

        $cart = array('user_id'=>$uid);
        DB::table('cart')->insert($cart);     //making new cart
    
        $productData = DB::select('select * from products where id = ?',[$id]);

        foreach($productData as $productData){
          $name = $productData->name;
          $price = $productData->price;          
        }
      
        $cartid = DB::select('select * from cart where user_id=?',[$uid]);
        foreach($cartid as $cartid){
          $cartId = $cartid->id;
        }

        $productcartData = array('name'=>$name, 'price'=> $price,'quantity'=>$quantity,'free_toppings'=>$toppings,'paid_toppings'=>$paid_toppingsnames,'paid_toppingsPrice'=>$totalToppingsPrice,'cart_id'=>$cartId);

        DB::table('cartproducts')->insert($productcartData);
        return redirect('/cart')->with('prodAddedmsg', 'Product added to cart');

      }

      else{

        $productData = DB::select('select * from products where id = ?',[$id]);

        foreach($productData as $productData){

          $name = $productData->name;
          $price = $productData->price;
         
        }

        $cartid = DB::select('select * from cart where user_id=?',[$uid]);
        foreach($cartid as $cartid){
          $cartId = $cartid->id;
        }

        $productcartData = array('name'=>$name, 'price'=> $price,'quantity'=>$quantity,'free_toppings'=>$toppings,'paid_toppings'=>$paid_toppingsnames,'paid_toppingsPrice'=>$totalToppingsPrice,'cart_id'=>$cartId);

        DB::table('cartproducts')->insert($productcartData);
        return redirect('/cart')->with('prodAddedmsg', 'Product added to cart');


      }

    }




    // public function addTocart(Request $req, $id){

    //   $quantity = $req->input('quantity');
    //   $topping1 = $req->input('topping1');
    //   $topping2 = $req->input('topping2');
    //   $topping3 = $req->input('topping3');
    //   $topping4 = $req->input('topping4');



    //   $toppings = $topping1.','.$topping2.','.$topping3.','.$topping4;
      
    //   $addtopping1 = $req->input('addtopping1');
    //   $addtopping2 = $req->input('addtopping2');
    //   $topping1Price = 0;
    //   $topping2Price = 0;

    //   if($addtopping1 != NULL){
    //     $addtopping1Price = DB::select('select price from paid_toppings where name = ?',[$addtopping1]);
    //     foreach($addtopping1Price as $data)
    //       {
    //         $topping1Price = $data->price;          
    //       }        
    //   }

    //   if($addtopping2 != NULL){
    //     $addtopping2Price = DB::select('select price from paid_toppings where name = ?',[$addtopping2]);
    //     foreach($addtopping2Price as $data)
    //       {
    //         $topping2Price = $data->price;          
    //       }        
    //   }

    //  $paid_toppingsnames = $addtopping1.','.$addtopping2;
    //  $totalToppingsPrice = $topping1Price + $topping2Price;


    //   $uid = auth()->user()->id;
    //   $data = DB::select('select * from cart where user_id = ?',[$uid]);

    //   $cartcount = count($data);

    //   if($cartcount == 0){

    //     $cart = array('user_id'=>$uid);
    //     DB::table('cart')->insert($cart);     //making new cart
    
    //     $productData = DB::select('select * from products where id = ?',[$id]);

    //     foreach($productData as $productData){
    //       $name = $productData->name;
    //       $price = $productData->price;          
    //     }
      
    //     $cartid = DB::select('select * from cart where user_id=?',[$uid]);
    //     foreach($cartid as $cartid){
    //       $cartId = $cartid->id;
    //     }

    //     $productcartData = array('name'=>$name, 'price'=> $price,'quantity'=>$quantity,'free_toppings'=>$toppings,'paid_toppings'=>$paid_toppingsnames,'paid_toppingsPrice'=>$totalToppingsPrice,'cart_id'=>$cartId);

    //     DB::table('cartproducts')->insert($productcartData);
    //     return redirect('/cart')->with('prodAddedmsg', 'Product added to cart');

    //   }

    //   else{

    //     $productData = DB::select('select * from products where id = ?',[$id]);

    //     foreach($productData as $productData){

    //       $name = $productData->name;
    //       $price = $productData->price;
         
    //     }

    //     $cartid = DB::select('select * from cart where user_id=?',[$uid]);
    //     foreach($cartid as $cartid){
    //       $cartId = $cartid->id;
    //     }

    //     $productcartData = array('name'=>$name, 'price'=> $price,'quantity'=>$quantity,'free_toppings'=>$toppings,'paid_toppings'=>$paid_toppingsnames,'paid_toppingsPrice'=>$totalToppingsPrice,'cart_id'=>$cartId);

    //     DB::table('cartproducts')->insert($productcartData);
    //     return redirect('/cart')->with('prodAddedmsg', 'Product added to cart');


    //   }

    // }


    public function deleteFromcart($id){

      DB::delete('delete from cartproducts where id = ?',[$id]);

      return redirect('/cart')->with('proddeletemsg', 'Product deleted from cart');


    }

    public function placeOrder(){


      $uid = auth()->user()->id;
      $data = DB::select('select * from cart where user_id=?',[$uid]);

      foreach($data as $cartid) {

        $cartId = $cartid->id;
      }


      $cartData = DB::select('select name,price,quantity,free_toppings,paid_toppings,paid_toppingsPrice from cartproducts where cart_id=?',[$cartId]);
      $items = serialize($cartData);

      // $cartDataarray= json_decode( json_encode($cartData), true);
       
      $grandTotal = 0;
      foreach($cartData as $data){

        $total = ($data->price * $data->quantity) + $data->paid_toppingsPrice;
        $grandTotal = $grandTotal + $total;

      }

      $orderData = array('orderamount'=>$grandTotal,'order_items'=>$items, 'user_id'=>$uid);

      DB::table('orders')->insert($orderData);


      DB::delete('delete from cartproducts where cart_id = ?',[$cartId]);
      
   
      echo "order placed";






    }

    public function myOrders(){

      $uid = auth()->user()->id;
      $orderData = DB::select('select * from orders where user_id=?',[$uid]);

      return view('order.myorders')->with('orderData', $orderData);


    }

   public function orderDetails($id){

    $orderDetails = DB::select('select * from orders where id=?',[$id]);

    foreach($orderDetails as $orderDetails){

      $orderItems = unserialize($orderDetails->order_items);

    }

    return view('order.orderdetails')->with('orderItems', $orderItems);

  }








}
