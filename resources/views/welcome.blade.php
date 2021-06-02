@extends('layouts.app')

@section('content')


<!-- <div class = "banner">
  <div class="banner-list">
    <div class="banner-content">

      <h1> Pizza Zunction </h1>
      <h3> All you need is love and pizza </h3>
      <h3> DINE-IN • TAKE-OUT • DELIVERY • CATERING </h3> 
      <a href="" role="button" class="btn btn-default"> Feeling Hungry ? Call Us </a>

    </div>
  </div>
</div> -->



	<!-- <div id="slideshow-example" data-component="slideshow">
		<div role="list">
			<div class="slide">
				<img src="/images/pizza.png" alt="">
			</div>
			<div class="slide">
				<img src="/images/pizza1.png" alt="">
			</div>
			<div class="slide">
				<img src="/images/pizza2.png" alt="">
			</div>
		</div>
	</div> -->

  <!-- <div id="slide">
  <div class="slideshow-container">
    <div class="mySlides fade"> <img src="https://www.w3schools.com/howto/img_nature_wide.jpg" style="width:100%"> </div>
    <div class="mySlides fade"> <img src="https://www.w3schools.com/howto/img_snow_wide.jpg" style="width:100%"> </div>
    <div class="mySlides fade"> <img src="https://www.w3schools.com/howto/img_lights_wide.jpg" style="width:100%"> </div>
    <div class="mySlides fade"> <img src="https://www.w3schools.com/howto/img_mountains_wide.jpg" style="width:100%"> </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a> <a class="next" onclick="plusSlides(1)">&#10095;</a> </div>
  <br>
  <div style="text-align:center"> 
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
  </div> -->




  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

   
    <div class="carousel-inner">
      <div class="item active">
        <img src="/images/pizza.png" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <a href="https://www.google.co.uk/" target="_blank"><button type="button" class="btn btn-default">Register Now</button></a>
        </div>

      </div>

      <div class="item">
        <img src="/images/pizza1.png" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="/images/pizza2.png" alt="New york" style="width:100%;">
      </div>

      <div class="item">
        <img src="/images/pizza3.png" alt="New york" style="width:100%;">
      </div>

      <div class="item">
        <img src="/images/pizza4.png" alt="New york" style="width:100%;">
      </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
 

  <div class="category">

    
    <div class="category-head">
      <h2>  SELECT A CATEGORY </h2>

    </div>

    <div class="category-list">

      <a href="/menu#pickup">
        <div class="category-item">
          <div class="categoryItem-img">
  
            <img src="/images/cat.png">
          </div>

          <div class="categoryItem-head">

            <a href="/menu#pickup"><p> Walk in Special </p></a> 
          </div>


        </div>
      </a>
  

      <div class="category-item">
        <div class="categoryItem-img">
          <img src="/images/cat1.png">

        </div>

        <div class="categoryItem-head">

          <a href="/menu#everyday"><p>EveryDay Special</p></a>
        </div>


      </div>

      <div class="category-item">
        <div class="categoryItem-img">

          <img src="/images/cat2.png">
        </div>

        <div class="categoryItem-head">

          <a href="/menu#sides"><p> Sides </p></a>
        </div>


      </div>

      <div class="category-item">
        <div class="categoryItem-img">
          <img src="/images/cat3.png">

        </div>

        <div class="categoryItem-head">
          <a href="/menu#wings"><p> Wings </p></a>

        </div>


      </div>

      <div class="category-item">
        <div class="categoryItem-img">
          <img src="/images/cat4.png">

        </div>

        <div class="categoryItem-head">
          <a href="/menu#delivery"><p> Delivery Special </p></a>

        </div>


      </div>

      <div class="category-item">
        <div class="categoryItem-img">
          <img src="/images/cat5.png">

        </div>

        <div class="categoryItem-head">
          <a href="/menu#panzo"><p> Panzo </p></a>

        </div>


      </div>

      <div class="category-item">
        <div class="categoryItem-img">
          <img src="/images/cat6.png">

        </div>
 
        <div class="categoryItem-head">

          <a href="/menu#special"><p>Speciality Pizzas</p></a>
        </div>


      </div>

      <div class="category-item">
        <div class="categoryItem-img">
          <img src="/images/cat7.png">

        </div>

        <div class="categoryItem-head">

          <a href="/menu#toppings"><p>Toppings</p></a>
        </div>


      </div>










    </div>













  </div>























 
<!-- <div class="aboutus" id="about">

  <div class="aboutus-list">
    <div class="aboutus-item">
      <img src = "/images/aboutus.jpg">
    </div>
 
    <div class="aboutus-item">
      <h2 class="animate__animated animate__bounce"> About Us </h2><br>
      <p> Started by two young professionals, Pizza Zunction is a culmination of their efforts of four years. Being friends from their college years in India , it was destiny that brought them together in Canada  to launch their venture in the QSR sector. Both share a common passion for good food and quality service .</p>

      <p> While pizzas and it's variants are found in every corner of Canada , what sets apart Pizza Zunction , is their wide range of customisation and quirky flavours. Patrons can customize their pizzas as per their liking of base, sauce , cheese and toppings. New variants are introduced as per patron feedbacks and the menu is really hands on and flexible.</p>

      <p> For us , we want to make every meal memorable for our patrons. To make every meal count , we ensure that  the best quality of ingredients goes into your pizza. Our true reward lies in filling your minds along with your appetite. The joy of watching  someone eat a satisfactory meal is unparallel.</p>

    </div>


  </div>

</div> -->
 
<div class="services">

  <div class="service-head">
    <h2> Our Services </h2>
  </div>

  <div class="service-list">
    <div class="service-item">
      <img src="/images/dining.jpg">
      <p> Dine-In </p>
    </div>
    <div class="service-item">
      <img src="/images/takeaway.jpg">
      <p> Take-Away </p>
    </div>
    <div class="service-item">
      <img src="/images/delivery.jpg">
      <p> Delivery </p>
    </div>

    
  </div>
</div>
@endsection