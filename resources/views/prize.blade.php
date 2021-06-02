@extends('layouts.app')

@section('content')

<div class="prize">

  <div class="prize-list">

    <h3> REGISTER NOW AND GET A CHANCE TO WIN EXCITING PRIZES* ! </h3>

    <p> 
      If you are reading this, you have already taken a step towards a winning in the end of this year.
      We want to “Reward You” for choosing us as your favourite pizza place.
      From November 10th till end of 2020, you will have a chance to win wonderful prizes by being part of our extremely exciting” Eat Pizza & Win Prizes”.It’s simple and straightforward, click on register link below and you will be automatically entered in Dec. 31st, 2020 Lucky Draw.
    </p>

    <a href="#prizeform" role="button" class="btn btn-warning">Register Now </a>



  </div>


</div>

<div class="whatContest">
  <div class="whatContest-list">
    <div class="whatContest-item">
      <h3> WHAT IS THE CONTEST ? </h3>
      <h4> We all have been through challenging time in 2020, however we all stood for each other.
        To reward your love and support for us Pizza Zunction is organizing a year end Lucky Draw.
      </h4>


      <div class="box">

        <div class="box-item">
         <i class="fa fa-address-book" aria-hidden="true"></i>
        </div>

        <div class="box-item">
          <p> Each Registration gets a chance to be part of the lucky draw.</p> 
        </div>

      </div>

      <div class="box">
        <div class="box-item">
          <i class="fa fa-handshake-o" aria-hidden="true"></i>
        </div>

        <div class="box-item">
          <p> The draw will be held on Dec 31st,2020 At 4:00 PM IN our Pizza zunction location located at 3430 weston road, M9M 2W1, Toronto and live on our Facebook page.</p>
        </div>



      </div>

      <div class="box">

        <div class="box-item">

          <i class="fa fa-money" aria-hidden="true"></i>
        </div>

        <div class="box-item">
          <p> Every time you purchase your chances are increasing to win the prize.Each of your purchase will allow you to enter your name again in contest.</p>

        </div>

      </div>

      <div class="box">

        <div class="box-item">
          <i class="fa fa-trophy" aria-hidden="true"></i>
        </div>

        <div class="box-item">
          <p> We will be announcing 15 Lucky WINNERS. </p>
        </div>

      </div>


    </div>
  </div>
</div>


<div class="whatContest">
  <div class="whatContest-list">
    <div class="whatContest-item">
      <h3> CONTEST RULES </h3>
    
      <div class="box">

        <div class="box-item">
         <i class="fa fa-file-text" aria-hidden="true"></i>
        </div>

        <div class="box-item">
          <p> Minimum $5 purchase is required to enter your name in contest.</p> 
        </div>

      </div>

      <div class="box">
        <div class="box-item">
          <i class="fa fa-file-text" aria-hidden="true"></i>
        </div>

        <div class="box-item">
          <p> You can register yourself online and can send your purchase receipt on our WhatsApp number 437-777-7745.</p>
        </div>



      </div>

      <div class="box">

        <div class="box-item">

          <i class="fa fa-file-text" aria-hidden="true"></i>
        </div>

        <div class="box-item">
          <p> Purchase can be made by in store visit, Delivery from us or with delivery partners UBEREATS, SkipTheDishes & Doordash.
          </p>

        </div>

      </div>

      <div class="box">

        <div class="box-item">
          <i class="fa fa-file-text" aria-hidden="true"></i>
        </div>

        <div class="box-item">
          <p> Our lucky draw event may go completely virtual based on covid-19 restrictions. </p>
        </div>

      </div>

      <div class="box">

        <div class="box-item">
          <i class="fa fa-file-text" aria-hidden="true"></i>
        </div>

        <div class="box-item">
          <p> On your every purchase you are allowed to enter your name in contest. </p>
        </div>

      </div>

      <div class="box">

        <div class="box-item">
          <i class="fa fa-file-text" aria-hidden="true"></i>
        </div>

        <div class="box-item">
          <p> A visible box will be placed in store with registration slips and your name will be added in that. </p>
        </div>

      </div>

    </div>
  </div>
</div>




<div class="form" id="prizeform">

  <div class="form-sub">

    <h2> Register  </h2>
        
    <br>

    @if(Session::has('registered'))
      <p class="alert alert-success">Registered Successfully !</p>

    @elseif(Session::has('mobileError'))
      <p class="alert alert-danger">Mobile no must be atleast of 10 Digits !</p>

    @endif
           
    <form action="/prize-save" class="form-group" method="POST" > 
        
      @csrf
        
      <label> Name * </label>        
      <input type= "text" name="name" class="form-control" placeholder="  Name" required>
      <br>
      
      <label> Mobile * </label>
       <input name="mobile"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            type = "number"
            maxlength="12"
            class="form-control" placeholder="  Mobile"
        />
       

      <br>




      <label> Email * </label>
      <input type= "email" name="email" class="form-control" placeholder="  Email" required>

      <br>
      <label> Address </label>
      <input type= "text" name="address" class="form-control" placeholder="  Address" required>

      <br>
      <label>Newsletter Subscription</label>
      
          <select name="newsletter" class="form-control">
            <option value="yes">Yes</option>
            <option value="no">No</option>
                          
        </select>

      <br>

  
  
      <button type="submit" name="submit" id="btn" class="btn btn-warning">Submit </button>
        
        
        
        
        
        
    </form>
  </div>
        
</div>


















@endsection