 @extends('layouts.app')

@section('content')
<div class="form">

  <div class="form-sub">

    <h2> Add Deal  </h2>
        
    <br>

    @if(Session::has('dealMade'))
      <p class="alert alert-success">Deal Added Successfully !</p>
 
    @endif
           
    <form action="/deal-save" class="form-group" method="POST" enctype="multipart/form-data" > 
        
      @csrf
        
      <label> Deal Heading </label>        
      <input type= "text" name="heading" class="form-control" placeholder="  Heading" required>
      <br>
      
      <label> Product Name</label>
      <input type= "text" name="name" class="form-control" placeholder="  Name" required>

      <br>
      <label> Description </label>
      <input type= "text" name="description" class="form-control" placeholder="  Description" required>

      <br>
      <label> Price </label>
      <input type= "text" name="price" class="form-control" placeholder="  Price($)" required>

      <br>
      <label>Offer(if any)</label>
      <input type= "text" name="offer" class="form-control" placeholder="  offer" required>

      <br>

      <label>Image</label>
      <input type= "file" name="image" class="form-control" required>

      <br>

  
      <button type="submit" name="submit" id="btn" class="btn btn-warning">Submit </button>
        
        
        
        
        
        
    </form>
  </div>
        
</div>
@endsection
