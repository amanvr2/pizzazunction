@extends('layouts.app')

@section('content')



<div class="menu">

 
  <div class="menu-list">

    <div class="menu-head">
    <h1> MENU </h1>

    </div>

    <img src="/images/pizza1.jpeg">
    <h1 id="pickup"> Pick Up Special </h1>
    @foreach($pickup_spcl as $data)
    <div class="menu-item" >

      <div class="menuItem-list">
        <div class="menuItemlist-item">
          <h4>{{ $data->name }}</h4>
          <p>{{ $data->description }}</p>
        </div>

        <div class="menuItemlist-item">
          <h4>{{ $data->price }}</h4>
          
        </div>
      </div>
    </div>
    @endforeach
    <br>
    <img src="/images/pizza5.jpeg">
    <h1 id="everyday"> EveryDay Special </h1>

    @foreach($everyday_spcl as $data)

      <div class="menu-item">

        <div class="menuItem-list">
          <div class="menuItemlist-item">
            <h4>{{ $data->name }}</h4>
            <p>{{ $data->description }}</p>
          </div>

          <div class="menuItemlist-item">
            <h4>{{ $data->price }}</h4>
            
          </div>
        </div>
      </div>


    @endforeach

    <br>
    <img src="/images/sides.jpg">
    <h1 id="sides"> Sides </h1>

    @foreach($sides as $data)

      <div class="menu-item">

        <div class="menuItem-list">
          <div class="menuItemlist-item">
            <h4>{{ $data->name }}</h4>
            <p>{{ $data->description }}</p>
          </div>

          <div class="menuItemlist-item">
            <h4>{{ $data->price }}</h4>
            
          </div>
        </div>
      </div>


    @endforeach

    <br>
    <img src="/images/wings.jpg">
    <h1 id="wings"> Wings </h1>

    @foreach($wings as $data)

      <div class="menu-item">

        <div class="menuItem-list">
          <div class="menuItemlist-item">
            <h4>{{ $data->name }}</h4>
            <p>{{ $data->description }}</p>
          </div>

          <div class="menuItemlist-item">
            <h4>{{ $data->price }}</h4>
            
          </div>
        </div>
      </div>


    @endforeach
    <br>
    <img src="/images/dev.jpg">
    <h1 id="delivery"> Delivery Special </h1>
    <div class="descp">
      <h2> Single </h2>
      <p> Add 2 Pops, Fries/Wedges for $4.99 </p>
    </div>



    @foreach($deliverySpcl_single as $data)

      <div class="menu-item">

        <div class="menuItem-list">
          <div class="menuItemlist-item">
            <h4>{{ $data->name }}</h4>
            <p>{{ $data->description }}</p>
          </div>

          <div class="menuItemlist-item">
            <h4>{{ $data->price }}</h4>
            
          </div>
        </div>
      </div>


    @endforeach
    <div class="descp">
      <h2> Double </h2>
      <p> Add 2 L pop, Fries/Wedges for $5.99 </p>
    </div>
    @foreach($deliverySpcl_double as $data)

      <div class="menu-item">

        <div class="menuItem-list">
          <div class="menuItemlist-item">
            <h4>{{ $data->name }}</h4>
            <p>{{ $data->description }}</p>
          </div>

          <div class="menuItemlist-item">
            <h4>{{ $data->price }}</h4>
            
          </div>
        </div>
      </div>


    @endforeach

    <div class="descp">
      <h2> Triple </h2>
      <p> Add 2 L Pop, Fries, Wedges, Garlic Bread for $8.99 </p>
    </div>
    @foreach($deliverySpcl_triple as $data)

      <div class="menu-item">

        <div class="menuItem-list">
          <div class="menuItemlist-item">
            <h4>{{ $data->name }}</h4>
            <p>{{ $data->description }}</p>
          </div>

          <div class="menuItemlist-item">
            <h4>{{ $data->price }}</h4>
            
          </div>
        </div>
      </div>


    @endforeach


    <div class="descp">
      <h2> Pizza wings combo </h2>
      <p> Add any 2 L Pop for $2, 2 Cans for $1.50, 10 Wings for $6, Fries for $2.99 and Garlic Bread for $3.99 </p>
    </div>
    @foreach($pizzaWings_combo as $data)

      <div class="menu-item">

        <div class="menuItem-list">
          <div class="menuItemlist-item">
            <h4>{{ $data->name }}</h4>
            <p>{{ $data->description }}</p>
          </div>

          <div class="menuItemlist-item">
            <h4>{{ $data->price }}</h4>
            
          </div>
        </div>
      </div>


    @endforeach

    <br>
    <img src="/images/panzo.jpg">
    <h1 id="panzo"> Panzo </h1>
    
    @foreach($panzo as $data)

      <div class="menu-item">

        <div class="menuItem-list">
          <div class="menuItemlist-item">
            <h4>{{ $data->name }}</h4>
            <p>{{ $data->description }}</p>
          </div>

          <div class="menuItemlist-item">
            <h4>{{ $data->price }}</h4>
            
          </div>
        </div>
      </div>


    @endforeach


    <br>
    <img src="/images/top.jpg">
    <h1 id="toppings"> Toppings </h1>

    <div class="toppings">
      <div class="toppings-list">
        
        <div class="topping-item">

          <h4> Veggies </h4>
          <p> Green Olives, Black Olives, Tomatoes, Red Onions, Pineapple, Mushroom, Red Pepper, Jalapeno Pepper, Broccoli, Sundried Tomatoes, Hot Banana Peppers, Plain Paneer, Shahi Paneer, Tandoori Paneer

        </div>
        <div class="topping-item">

          <h4> Meat Toppings </h4>
          <p> Pepproni, Ground Beef, Italian sausges, Beef Bacon, Beef Kabab, Chicken Fajita, Tandoori Chicken, Chicken Ham, Chicken Kebab, Butter Chicken, Anchovies 

        </div>
        <div class="topping-item">
          <h4> Additional Toppings = Items count as 2 Toppings </h4>
          <p> Med = $ 1 .00 </p>
          <p> Large = $1.25 </p>
          <p> XL = 1.50 </p>
        </div>

      </div>
    </div>
    <br>
    <img src="/images/sauce1.jpeg">
    <h1> Sauces </h1>

    <div class="sauces">
      <div class="toppings-list">
        
        
        <div class="topping-item">

          <h4> Dipping Sauces for $0.75 </h4>
          <p> Ranch </p>
          <p> Blue Cheese </p>
          <p> Jalapeno cheddar </p>
          <p> Creamy Garlic </p>
          <p> Italian Marinora </p>
        </div>
        <div class="topping-item">

          <h4> Pizza Sauces </h4>
          <p> Creamy Garlic </p>
          <p> Classic Pizza Sauce </p>
          <p> Butter Chicken </p>

        </div>
       
      </div>
    </div>







  </div>
</div>











@endsection