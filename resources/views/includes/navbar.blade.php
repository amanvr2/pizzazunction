

<nav class="navbar navbar-default">
    <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="/images/logose.png"></a>
                </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  
                    

                </ul>
                <ul class="nav navbar-nav navbar-right">
                  
                  <li class=""><a href="/menu"><i id= "icon" class="fa fa-cutlery" aria-hidden="true"></i>Menu</a></li>
                  <li class=""><a href="/flyer/flyer.pdf" ><i id= "icon" class="fa fa-bookmark" aria-hidden="true"></i>Flyer</a></li>
                  <li class=""><a href="/deals" ><i id= "icon" class="fa fa-bookmark" aria-hidden="true"></i>Deals</a></li>
                  <li class=""><a href="/#about"><i id= "icon" class="fa fa-info-circle" aria-hidden="true"></i>About Us</a></li>
                  <li class=""><a href="/contactus"><i id= "icon" class="fa fa-envelope" aria-hidden="true"></i>Contact Us</a></li>
 
 

                @if(isset($_COOKIE['adminname']))

                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ $_COOKIE['adminname'] }}<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="/admin-dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp Dashboard</a></li>
                    <li><a href="/my-details"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp My Details</a></li>
                    <li><a href="/allorders"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp Orders</a></li>
                    <li><a href="/users"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbspMy users</a></li>
                    <li><a href="/admin-logout"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbspLogout</a></li>
                  
      
                  </ul>
                </li>
                
                  
          
                @endif


                @if(Auth::guest())

                  <li><a href="/login" id=""><span class="glyphicon glyphicon-user"></span> Log In</a></li>
                  <!-- <li><a href="/register" id=""><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
                @else

                
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ auth()->user()->name }}<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="/home"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp Dashboard</a></li>
                    <li><a href="/my-orders"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp My orders</a></li>
                    <li><a href="/cart"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp Cart</a></li>
                     <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>LogOut</a>
                    </li>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  
      
                  </ul>
                </li>

                @endif


              </ul>
            </div>
    </div>
</nav>
