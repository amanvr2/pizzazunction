@extends('layouts.app')

@section('content')

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span id="title"></span></h4>
        </div>
        <div class="modal-body">
          <span id="title"></span>
          <!-- <span id ="pid"></span> -->


           
          <form action= "" class="form-group" id="editForm">

            @csrf

            <label> Quantity </label><br>
            <select name="quantity" class="form-control">

            @for($i=1;$i < 50;$i++)

              <option value = {{ $i }} > {{ $i }}</option>

            @endfor
            </select>

            <br>
            <h4>You can select upto 4 toppings </h4>
            @foreach($tops as $data)

            <input type="checkbox" name="toppings[]" value="{{$data->name}}" >
            &nbsp &nbsp<label>{{$data->name}}</label><br>

            @endforeach 


            <h4>Additional Toppings </h4>

            @foreach($tops as $data)
              <input type="checkbox" name="addtoppings[]" value="{{$data->name}}">
              &nbsp &nbsp<label>{{$data->name}} + ${{$data->price}}</label><br>
              
            @endforeach 

            <br><br>
            <button type="submit" name="submit" class="btn btn-primary">Add to Cart</button>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
 

<div class="modal fade" id="myModalDouble" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <span id="title"></span>
          

          <form action= "" class="form-group" id="editFormDouble">

            @csrf
            <select name="quantity" class="form-control">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>

            <h4> First Pizza </h4>

            @foreach($tops as $data)

            <input type="checkbox" name="toppings[]" value="{{$data->name}}">
            <label>{{$data->name}}</label><br>

            @endforeach 


            <h4>Additional Toppings </h4>

            <table class="table">
              <thead>
                <tr>
                                
                </tr>
              </thead>
              <tbody>

              @foreach($tops as $data)
                <tr><td><input type="checkbox" name="addtoppings[]" value="{{$data->name}}"></td>
                <td><label>{{$data->name}}</label></td>
                </tr>
                @endforeach 
              </tbody>
            </table>

    




            <h4> Second Pizza </h4>

            @foreach($tops as $data)

            <input type="checkbox" name="sectoppings[]" value="{{$data->name}}">
            <label>{{$data->name}}</label><br>

            @endforeach 


            <h4>Additional Toppings </h4>

            <table class="table">
              <thead>
                <tr>
                                
                </tr>
              </thead>
              <tbody>

              @foreach($tops as $data)
                <tr><td><input type="checkbox" name="secaddtoppings[]" value="{{$data->name}}"></td>
                <td><label>{{$data->name}}</label></td>
                </tr>
                @endforeach 
              </tbody>
            </table>


            <button type="submit" name="submit" class="btn btn-primary">Add</button>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="myModalTripple" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <span id="title"></span>
          

          <form action= "" class="form-group" id="editFormTripple">

            @csrf
            <select name="quantity" class="form-control">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>

            <h4> First Pizza </h4>

            @foreach($tops as $data)

            <input type="checkbox" name="toppings[]" value="{{$data->name}}">
            <label>{{$data->name}}</label><br>

            @endforeach 


            <h4>Additional Toppings </h4>

            <table class="table">
              <thead>
                <tr>
                                
                </tr>
              </thead>
              <tbody>

              @foreach($tops as $data)
                <tr><td><input type="checkbox" name="addtoppings[]" value="{{$data->name}}"></td>
                <td><label>{{$data->name}}</label></td>
                </tr>
                @endforeach 
              </tbody>
            </table>




            <h4> Second Pizza </h4>

            @foreach($tops as $data)

            <input type="checkbox" name="sectoppings[]" value="{{$data->name}}">
            <label>{{$data->name}}</label><br>

            @endforeach 


            <h4>Additional Toppings </h4>

            <table class="table">
              <thead>
                <tr>
                                
                </tr>
              </thead>
              <tbody>

              @foreach($tops as $data)
                <tr><td><input type="checkbox" name="secaddtoppings[]" value="{{$data->name}}"></td>
                <td><label>{{$data->name}}</label></td>
                </tr>
                @endforeach 
              </tbody>
            </table>

            <h4> Third Pizza </h4>

            @foreach($tops as $data)

            <input type="checkbox" name="thirdtoppings[]" value="{{$data->name}}">
            <label>{{$data->name}}</label><br>

            @endforeach 


            <h4>Additional Toppings </h4>

            <table class="table">
              <thead>
                <tr>
                                
                </tr>
              </thead>
              <tbody>

              @foreach($tops as $data)
                <tr><td><input type="checkbox" name="thirdaddtoppings[]" value="{{$data->name}}"></td>
                <td><label>{{$data->name}}</label></td>
                </tr>
                @endforeach 
              </tbody>
            </table>
            <button type="submit" name="submit" class="btn btn-primary">Add</button>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
























<div class="modal fade" id="sides" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <span id="title"></span>
          <!-- <span id ="pid"></span> -->


            
          <form action= "" class="form-group" id="editForm-sides">

            @csrf
            <select name="quantity" class="form-control">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>

            


            <button type="submit" name="submit" class="btn btn-primary">Add</button>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

 
 
<div class="omenu">
  <h3> Pick Up Special </h3>
 
  <div class="omenu-list">

    @foreach($pickup_spcl as $data)

    <div class="omenu-item" >

      <div class="omenuItem-list">

        <div class="omenuItemlist-item">
          <h4>{{ $data->name }}</h4>
          <h6>{{$data->description}}</h6>
          <h4>${{ $data->price }}</h4><br><br>
          <button class="btn btn-primary"  data-mytitle = "{{ $data->name }}" data-pid = "{{ $data->id }}"data-toggle="modal" data-target="#myModal">Add</button>

          <!-- <form action="/add-tocart/{{ $data->id }}" class="form-group">

            <select name="quantity" class="form-control">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>

            <button type="submit" name="submit" class="btn btn-primary">Add</button>

          </form> -->
        </div>

        <div class="omenuItemlist-img">
        
          <img src="/images/de.jpeg">
        
        </div>


  
      </div>
    </div> 

    @endforeach

    </div>
    <br>

    <h3> Everyday Special </h3>
 
    <div class="omenu-list">
      @foreach($everyday_spcl as $data)

      <div class="omenu-item" >

        <div class="omenuItem-list">

          <div class="omenuItemlist-item">
            <h4>{{ $data->name }}</h4>
            <h6>{{$data->description}}</h6>
            <h4>${{ $data->price }}</h4><br><br>
            <button class="btn btn-primary"  data-mytitle = "{{ $data->name }}" data-pid = "{{ $data->id }}"data-toggle="modal" data-target="#myModal">Add</button>

          </div>

          <div class="omenuItemlist-img">
          
            <img src="/images/de.jpeg">
          
          </div>



        </div>
      </div> 
      @endforeach
    </div>
   
  <h3> Sides </h3>
 
  <div class="omenu-list">
    @foreach($sides as $data)

    <div class="omenu-item" >

      <div class="omenuItem-list">

        <div class="omenuItemlist-item">
          <h4>{{ $data->name }}</h4>
          <h6>{{$data->description}}</h6>
          <h4>${{ $data->price }}</h4><br><br>
          <button class="btn btn-primary"  data-mytitle = "{{ $data->name }}" data-pid = "{{ $data->id }}"data-toggle="modal" data-target="#sides">Add</button>

        </div>

        <div class="omenuItemlist-img">
        
          <img src="/images/de.jpeg">
        
        </div>



      </div>
    </div> 
    @endforeach
  </div>

  <h3> Wings </h3>
 
  <div class="omenu-list">
    @foreach($wings as $data)

    <div class="omenu-item" >

      <div class="omenuItem-list">

        <div class="omenuItemlist-item">
          <h4>{{ $data->name }}</h4>
          <h6>{{$data->description}}</h6>
          <h4>${{ $data->price }}</h4><br><br>
          <button class="btn btn-primary"  data-mytitle = "{{ $data->name }}" data-pid = "{{ $data->id }}"data-toggle="modal" data-target="#sides">Add</button>

        </div>

        <div class="omenuItemlist-img">
        
          <img src="/images/de.jpeg">
        
        </div>



      </div>
    </div> 
    @endforeach
  </div>

  <h3> Delivery Special - Single </h3>
 
  <div class="omenu-list">
   @foreach($deliverySpcl_single as $data)

   <div class="omenu-item" >

    <div class="omenuItem-list">

       <div class="omenuItemlist-item">
         <h4>{{ $data->name }}</h4>
         <h6>{{$data->description}}</h6>
         <h4>${{ $data->price }}</h4><br><br>
         <button class="btn btn-primary"  data-mytitle = "{{ $data->name }}" data-pid = "{{ $data->id }}"data-toggle="modal" data-target="#myModal">Add</button>

       </div>

       <div class="omenuItemlist-img">
       
         <img src="/images/de.jpeg">
       
       </div>



     </div>
    </div> 
   @endforeach
   </div>


  <h3> Delivery Special - Double </h3>
 
 <div class="omenu-list">
  @foreach($deliverySpcl_double as $data)

  <div class="omenu-item" >

   <div class="omenuItem-list">

      <div class="omenuItemlist-item">
        <h4>{{ $data->name }}</h4>
        <h6>{{$data->description}}</h6>
        <h4>${{ $data->price }}</h4><br><br>
        <button class="btn btn-primary"  data-mytitle = "{{ $data->name }}" data-pid = "{{ $data->id }}"data-toggle="modal" data-target="#myModalDouble">Add</button>

      </div>

      <div class="omenuItemlist-img">
      
        <img src="/images/de.jpeg">
      
      </div>



    </div>
   </div> 
  @endforeach
  </div>

  <h3> Delivery Special - Triple </h3>
 
 <div class="omenu-list">
  @foreach($deliverySpcl_triple as $data)

  <div class="omenu-item" >

   <div class="omenuItem-list">

      <div class="omenuItemlist-item">
        <h4>{{ $data->name }}</h4>
        <h6>{{$data->description}}</h6>
        <h4>${{ $data->price }}</h4><br><br>
        <button class="btn btn-primary"  data-mytitle = "{{ $data->name }}" data-pid = "{{ $data->id }}"data-toggle="modal" data-target="#myModalTripple">Add</button>

      </div>

      <div class="omenuItemlist-img">
      
        <img src="/images/de.jpeg">
      
      </div>



    </div>
   </div> 
  @endforeach
  </div>
  <h3> Pizza wings combo </h3>

  <div class="omenu-list">
   @foreach($pizzaWings_combo as $data)

   <div class="omenu-item" >

     <div class="omenuItem-list">

       <div class="omenuItemlist-item">
         <h4>{{ $data->name }}</h4>
         <h6>{{$data->description}}</h6>
         <h4>${{ $data->price }}</h4><br><br>
         <button class="btn btn-primary"  data-mytitle = "{{ $data->name }}" data-pid = "{{ $data->id }}"data-toggle="modal" data-target="#sides">Add</button>

       </div>

       <div class="omenuItemlist-img">
       
         <img src="/images/de.jpeg">
       
       </div>



     </div>
   </div> 
   @endforeach
  </div>



  <h3> Panzo </h3>

  <div class="omenu-list">
  @foreach($panzo as $data)

  <div class="omenu-item" >

    <div class="omenuItem-list">

      <div class="omenuItemlist-item">
      <h4>{{ $data->name }}</h4>
      <h6>{{$data->description}}</h6>
      <h4>${{ $data->price }}</h4><br><br>
      <button class="btn btn-primary"  data-mytitle = "{{ $data->name }}" data-pid = "{{ $data->id }}"data-toggle="modal" data-target="#sides">Add</button>

      </div>

      <div class="omenuItemlist-img">
    
      <img src="/images/de.jpeg">
    
      </div>



    </div>
  </div> 
  @endforeach
  </div>


  </div> 
</div>
 










@endsection