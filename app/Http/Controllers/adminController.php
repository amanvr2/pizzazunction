<?php
  
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class adminController extends Controller
{
  public function login(Request $req){

    $email = $req->input('email');
    $password = $req->input('password');
  
    if($email=='info@gmail.com' && $password=='Amanvr2@')
    {

      setcookie('adminname', 'info@gmail.com');
      return redirect('/admin-dashboard');
    } 

    else{
     echo "wrong";
    } 
  }


  public function authcheck(Request $req){

    if(isset($_COOKIE['adminname'])){
      return view('admin.admindashboard');

    }

    else{
      return redirect('/admin-login');
    }
    

  }

    public function store(Request $req)
    {
      $heading = $req->input('heading');
      $name = $req->input('name');
      $description = $req->input('description');
      $price = $req->input('price');
      $offer = $req->input('offer');

      $image = $req->file('image');
      $destinationPath = 'public/img/';
      $originalFile = $image->getClientOriginalName();
      $image->move($destinationPath, $originalFile);


      $data = array('heading'=>$heading, 'name'=>$name, 'description'=>$description, 'price'=>$price, 'offer'=>$offer, 'image'=>$originalFile);

      DB::table('deals')->insert($data);

      return back()->with('dealMade','Deal Added Successfully');

    } 

    public function mydetails()
    { 


      $data = DB::select('select * from deals');

      return view('admin.mydetails')->with('data',$data);

    }


    public function showdeal($id){


      $data = DB::select('select * from deals where id = ?',[$id]);

      return view('admin.showdeal')->with('data',$data);


    }


    public function editdeal(Request $req, $id){


      $heading = $req->input('heading');
      $name = $req->input('name');
      $description = $req->input('description');
      $price = $req->input('price');
      $offer = $req->input('offer');

      
      $image = $req->file('image');
      if($image != NULL){
        $destinationPath = 'public/img/';
        $originalFile = $image->getClientOriginalName();
        $image->move($destinationPath, $originalFile);
      }

      DB::update('update deals set heading = ? where id = ?',[$heading, $id]);
      
      DB::update('update deals set name = ? where id = ?',[$name, $id]);

      DB::update('update deals set description = ? where id = ?',[$description, $id]);

      DB::update('update deals set price = ? where id = ?',[$price, $id]);

      DB::update('update deals set offer = ? where id = ?',[$offer, $id]);

      if($image != NULL){

        DB::update('update deals set image = ? where id = ?',[$originalFile, $id]);
      }
      
      return redirect('/my-details')->with('updated','Deal Updated Successfully');




    }

    public function deletedeal($id){

      DB::delete('delete from deals where id = ?',[$id]);


      return redirect('/my-details')->with('deleted','Deal Deleted Successfully');


    }


    public function viewusers(){

      $data = DB::select('select * from prize');

      return view('admin.user')->with('data', $data);

    }

    public function logout()
    {

      setcookie('adminname', "", time() - 1200);
      unset($_COOKIE['adminname']);
      return redirect('/admin-login');
    }
}
