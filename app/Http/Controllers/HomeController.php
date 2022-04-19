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

      $topping = $req->input('toppings');
      $secTopping = $req->input('sectoppings');
      $thirdTopping = $req->input('thirdtoppings');
      
      $toppings = "";
      $secToppings = "";
      $thirdToppings = "";
     
      $count = count($topping);

      if($count > 4){
      echo "You can select 4 toppings only";
      
      }

      else{

      if($topping != NULL){
        foreach($topping as $items=>$v){
      
          $toppings = $toppings.'--First Pizza Toppings--'.$topping[$items];
        }
      }

      if($secTopping != NULL){
        $toppings = $toppings.'--Second Pizza Toppings--';
        foreach($secTopping as $items=>$v){
      
          $toppings = $toppings.','.$secTopping[$items];
        }
      }

      if($thirdTopping != NULL){
        $toppings = $toppings.'--Third Pizza Toppings--';
        foreach($thirdTopping as $items=>$v){
      
          $toppings = $toppings.','.$thirdTopping[$items];
        }
  
      }
      
      $addtopping = $req->input('addtoppings');
      $secaddtopping = $req->input('secaddtoppings');
      $thirdaddtopping = $req->input('thirdaddtoppings');

      $totalToppingsPrice = 0;
      $paid_toppingsnames = "";

      if($addtopping != NULL){

        foreach($addtopping as $items=>$v){

          $paid_toppingsnames = $paid_toppingsnames.','.$addtopping[$items];

          $test = DB::select('select price from paid_toppings where name = ?',[$addtopping[$items]]);

          foreach($test as $data){
            $total = $data->price;
            $totalToppingsPrice += $total;
          }

        }

      }

      if($secaddtopping != NULL){
       $paid_toppingsnames = $paid_toppingsnames.'--Second Pizza Toppings--';


        foreach($secaddtopping as $items=>$v){

          $paid_toppingsnames = $paid_toppingsnames.','.$secaddtopping[$items];

          $test = DB::select('select price from paid_toppings where name = ?',[$secaddtopping[$items]]);

          foreach($test as $data){
            $total = $data->price;
            $totalToppingsPrice += $total;
          }

        }
      }
     
      if($thirdaddtopping != NULL){
        $paid_toppingsnames = $paid_toppingsnames.'--Third Pizza Toppings--';

        foreach($thirdaddtopping as $items=>$v){

          $paid_toppingsnames = $paid_toppingsnames.','.$thirdaddtopping[$items];
     
          $test = DB::select('select price from paid_toppings where name = ?',[$thirdaddtopping[$items]]);
     
          foreach($test as $data){
            $total = $data->price;
            $totalToppingsPrice += $total;
          }
     
        }
      }
    
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

    }

    // public function addTocart(Request $req, $id){

    //   $quantity = $req->input('quantity');

    //   $topping1 = $req->input('topping1');
    //   $topping2 = $req->input('topping2');
    //   $topping3 = $req->input('topping3');
    //   $topping4 = $req->input('topping4');
    //   $topping5 = $req->input('topping5');
    //   $topping6 = $req->input('topping6');
    
    //   $sectopping1 = $req->input('sectopping1');
    //   $sectopping2 = $req->input('sectopping2');
    //   $sectopping3 = $req->input('sectopping3');
    //   $sectopping4 = $req->input('sectopping4');
    //   $sectopping5 = $req->input('sectopping5');
    //   $sectopping6 = $req->input('sectopping6');

    //   $thirdtopping1 = $req->input('thirdtopping1');
    //   $thirdtopping2 = $req->input('thirdtopping2');
    //   $thirdtopping3 = $req->input('thirdtopping3');
    //   $thirdtopping4 = $req->input('thirdtopping4');
    //   $thirdtopping5 = $req->input('thirdtopping5');
    //   $thirdtopping6 = $req->input('thirdtopping6');

    //   $toppings = $topping1.','.$topping2.','.$topping3.','.$topping4;

    //   $secondToppings = $sectopping1.','.$sectopping2.','.$sectopping3.','.$sectopping4;

    //   $thirdToppings = $thirdtopping1.','.$thirdtopping2.','.$thirdtopping3.','.$thirdtopping4;

    //   if($sectopping1 != NULL){
    //     $toppings = $toppings.'Second pizza toppings :-'.$secondToppings;
    //   }

    //   if($thirdtopping1 != NULL){
    //     $toppings = $toppings.'Third pizza toppings :-'.$thirdToppings;
    //   }
      
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


    public function editIncart($id){

     $data = DB::select('select * from cartproducts where id = ?',[$id]);
     $toppings = DB::select('select * from paid_toppings');


     return view('order.viewProd')->with('data',$data)->with('toppings', $toppings);


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
      

      return redirect('/cart')->with('order-placed','Order Placed Successfully');






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

  public function editIncartProduct(Request $req, $id){

    $qty = $req->input('quantity');
    $freeToppings = $req->input('toppings');
    $paidToppings = $req->input('addtoppings');

    $toppings = "";
    $paidtoppings = "";

    if($freeToppings != NULL){
      $toppings = $toppings.'--First Pizza Toppings--';
      foreach($freeToppings as $items=>$v){
    
        $toppings = $toppings.','.$freeToppings[$items];
      }
    }

    if($paidToppings != NULL){

      $paidtoppings = $paidtoppings.'--First Pizza Toppings--';
      $toppingsPrice = 0;

      
      foreach($paidToppings as $items=>$v){
    
        $paidtoppings = $paidtoppings.','.$paidToppings[$items];

        $test = DB::Select('select price from paid_toppings where name = ?',[$paidToppings[$items]]);

        foreach($test as $data){
          $total = $data->price;
          $toppingsPrice += $total;
        }
      }
    }

    
    DB::Update('Update cartProducts set quantity = ? where id = ?',[$qty, $id]);
  

    if($freeToppings != NULL){
      DB::Update('Update cartProducts set free_toppings = ? where id = ?',[$toppings, $id]);
    }

    if($paidtoppings != NULL){
      DB::Update('Update cartProducts set paid_toppings = ? where id = ?',[$paidtoppings, $id]);
    }

    DB::Update('Update cartProducts set paid_toppingsPrice = ? where id = ?',[$toppingsPrice, $id]);


    echo "done";



  }








}
