<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class MenuController extends Controller
{
  public function index(){

    $pickup_spcl = DB::select('select * from products where category = ?', ['pickup_spcl']);
    $everyday_spcl = DB::select('select * from products where category = ?', ['everyday_spcl']);
    $sides = DB::select('select * from products where category = ?', ['sides']);
    $wings = DB::select('select * from products where category = ?', ['wings']);
    $deliverySpcl_single = DB::select('select * from products where category = ?', ['deliverySpcl_single']);
    $deliverySpcl_double = DB::select('select * from products where category = ?', ['deliverySpcl_double']);
    $deliverySpcl_triple = DB::select('select * from products where category = ?', ['deliverySpcl_triple']);
    $pizzaWings_combo = DB::select('select * from products where category = ?', ['pizzaWings_combo']);
    $panzo = DB::select('select * from products where category = ?', ['panzo']);
 

    return view('menu',['pickup_spcl' => $pickup_spcl],['everyday_spcl' => $everyday_spcl] )->with('sides' , $sides)->with('wings' , $wings)->with('deliverySpcl_single', $deliverySpcl_single)->with('deliverySpcl_double', $deliverySpcl_double)->with('deliverySpcl_triple', $deliverySpcl_triple)->with('pizzaWings_combo', $pizzaWings_combo)->with('panzo', $panzo);

 
  }


  public function deals(){

    $data = DB::select('select * from deals');

    return view('deals')->with('data', $data);


  }

  public function prize(Request $req){

    $name = $req->input('name');
    $number = $req->input('mobile');
    $email = $req->input('email');
    $address = $req->input('address');
    $newsletter = $req->input('newsletter');

    if(strlen($number) < 10){
      return back()->with('mobileError','Mobile no must be atleast of 10 Digits');
    }

    else{

    $data = array('name'=>$name, 'number'=>$number, 'email'=>$email, 'address'=>$address, 'newsletter'=>$newsletter);

    DB::table('prize')->insert($data);

    return back()->with('registered','Registered Successfully');
    }


  }
}
