@extends('layouts.master')

@section('content')

<style>
 {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
/*.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

 {
  box-sizing: border-box;
}

/* Create two unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
  height: 500px; /* Should be removed. Only for demonstration */
}

.left {
  width: 75%;
  margin:10px;
  
}

.right {
  width: 5%;
}
.div1 {
  width: 60%;
  height: 100px;
  /*border: 1px solid blue;*/
}

.div2 {
  width: 40%;
  height: 100px;
  margin-bottom: 10px;
  /*border: 1px solid blue;*/

}
.placeOrder{

}


{
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
/*.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

 {
  box-sizing: border-box;
}

/* Create two unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
  height: 500px; /* Should be removed. Only for demonstration */
}

.left {
  width: 75%;
  margin:10px;
  
}

.right {
  width: 5%;
}
.div1 {
  width: 60%;
  height: 100px;
  /*border: 1px solid blue;*/
}

.div2 {
  width: 40%;
  height: 100px;
  margin-bottom: 10px;
  /*border: 1px solid blue;*/

}
.placeOrder{

}
</style>
    <div class="row">
        <div class="div1" class="column left" class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="panel-heading" style="font-size: 20px"><h2>Billing And Shipping</h2></div>

           		&nbsp;&nbsp;&nbsp;	
                {{--  show error --}}
                @if(count($errors) > 0)
                <div  class="alert alert-danger"> 
                    
                    @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach

                </div>
                @endif

                <div class="panel-body">   

                  <form class="form-horizontal" id="payment-form" method="POST" action="{{ route('post.info') }}">



            <label for="email" class="col-md-11 control-label">E-Mail Address</label>
                <div class="col-md-11">
                    <input id="email" type="email" class="form-control" name="email" value="" required>
                </div>

        	<label for="fname" class="col-md-11 control-label">Firt Name</label>
            <div class="col-md-11">
                <input id="fname" type="text" class="form-control" name="firstname" value="" required autofocus>
          </div>

          <label for="fname" class="col-md-11 control-label">UserName</label>
            <div class="col-md-11">
                <input id="fname" type="text" class="form-control" name="username" value="" required autofocus>
          </div>

        	<label for="lname" class="col-md-11 control-label">Last Name</label>
            <div class="col-md-11">
                <input id="lname" type="text" class="form-control" name="lastname" value="" required autofocus>
        	</div>

        	<label for="state" class="col-md-11 control-label">Country</label>
            <div class="col-md-11">
				<select id="state" class="form-control" name="country" value="" required autofocus >
                	<option value="Pakistan">Pakistan</option>
                </select>	               
        	</div>

          <label for="state" class="col-md-11 control-label">State</label>
            <div class="col-md-11">
        <select id="state" class="form-control" name="state" value="" required autofocus >
                  <option value="punjab">Punjab</option>
                </select>                
          </div>

        	<label for="city" class="col-md-11 control-label">Town/City</label>
            <div class="col-md-11">
				<select id="city" class="form-control" name="city" value="" required autofocus >
                	<option value="lahore">Lahore</option>
                </select>	               
        	</div>	

        	<label for="address" class="col-md-11 control-label">Street Address</label>
            <div class="col-md-11">
				<input id="address" type="text" class="form-control" name="address" value="" required autofocus>	               
        	</div>


        	<label for="postalcode" class="col-md-11 control-label">Postal Code</label>
            <div class="col-md-11">
                <input id="postalcode" type="number" class="form-control" name="postalcode" value="" required autofocus>
        	</div>

        	<label for="phone" class="col-md-11 control-label">Phone Number</label>
            <div class="col-md-11">
                <input id="phone" type="Number" class="form-control" name="phone" value="" required autofocus>
        	</div>

  
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
            <div class="panel panel-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="panel-heading" style="font-size: 20px"><h2>Payment</h2></div>

              &nbsp;&nbsp;&nbsp;  
                {{--  show error --}}
                @if(count($errors) > 0)
                <div  class="alert alert-danger"> 
                    
                    @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach

                </div>
                @endif

                <div class="panel-body">
                  {{-- checkout js  error  goes here --}}
                  @if(Session::has('error'))
                  <div id="charge-error" class="alert alert-danger {{ !Session::has('error' ) ? 'hidden' :''  }}">
                      {{ Session::get('error') }}
                  </div>
                  @endif  

            <label for="card-holder-name" class="col-md-11 control-label">Card Holder Name</label>
                <div class="col-md-11">
                    <input id="card-holder-name" type="text" name="card_holder_name" class="form-control" placeholder="" required>
                </div>


          <label for="card-number" class="col-md-11 control-label">Credit Card Number</label>
            <div class="col-md-11">
                <input id="card-number" type="Number" name="card_number" class="form-control"  placeholder="" required autofocus>
          </div>

          <label for="card-exp-month" class="col-md-11 control-label">Expiration Month</label>
            <div class="col-md-11">
                <input id="exp-month" type="Number" name="exp_month" class="form-control"  placeholder="" required autofocus>
          </div>

          <label for="card-exp-year" class="col-md-11 control-label">Expiration Year</label>
            <div class="col-md-11">
                <input id="exp-year" type="Number" name="exp_year" class="form-control"  placeholder="" required autofocus>
          </div>

          <label for="card-cvc" class="col-md-11 control-label">Cvc Code</label>
            <div class="col-md-11"> 
                <input id="card-cvc" type="Number" name="card_cvc" class="form-control"  placeholder="" required autofocus>
          </div>
           
          {{ csrf_field() }}


                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-4">
                                {{-- <button type="submit" class="btn btn-primary">
                                    Register
                                </button> --}}
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>  

    </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-4">
                                {{-- <button type="submit" class="btn btn-primary">
                                    Register
                                </button> --}}
                            </div>
                        </div>
                    
    
            </div>
		</div>




		<div  class="div2" class="column right" class="col-md-6 col-md-offset-2" >
			<div class="panel panel-default">&nbsp;&nbsp;&nbsp;
          <div class="panel-heading" style="font-size: 20px"><h2>Your Order</h2></div>
           		&nbsp;&nbsp;	
			<table id="cart" class="table table-hover table-condensed">
				<br><br>

		        <thead>
		        <tr>
                <th style="width:50%">Product</th>
		            <th style="width:50%">Title</th>
		            <th style="width:10%">Price</th>
		            <th style="width:8%">Quantity</th>
		            <th style="width:22%" class="text-center">Subtotal</th>
		            <th style="width:10%"></th>
		        </tr>
		        </thead>
		        <tbody>

		    <?php   $total = 0 ;  ?>
		        {{-- @if(session('cart')  /*AND Auth::guard('web')->user()->id == session('customerLoginId')*/) --}}

		            {{-- @foreach(session('cart') as $id => $details) --}}
                @foreach($cartItems as $details)

		            <?php $total = $total  + $details->products->price * $details->productQuantity ?>
		                <tr>
                        <td data-th="image"><img height="40" width="40" src="{{ $details->products->imagePath }}"></td>
		                    {{-- <td data-th="Price"  align="left" >{{ $details->products->title }}</td> --}}
		                    <td data-th="Price" align="center">${{ $details->products->price }}</td>
		                    <td data-th="Price" align="center">{{ $details->productQuantity }}</td>
		                    <td data-th="Subtotal" align="center" class="text-center">${{ $details->products->price * $details->productQuantity }}</td>
		                    {{--  --}}
		                </tr>
		            @endforeach
{{-- 		        @endif --}}

		        <tfoot>
		        <tr class="visible-xs">
		            <td class="text-center"></td>
		            <td colspan="2" class="hidden-xs"></td>
                <td colspan="1" class="hidden-xs"></td>
		            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
		        </tr>
		        <tr>
		        
		            <td></td>
		            <td></td>
		            <td></td>
		            <td colspan="3"   class="placeOrder">

                <button class="btn btn-warning" href="{{ route('post.info') }}">
                  Place an Order <i class="fa fa-angle-right"></i> 
                </button>
                
                </td>
		            
                </form>S
		        </tr>
		        </tfoot>
		        </tbody>
		</table>    



		</div>


	   



        </div>




    </div>




@endsection()



@section('scripts')

                                  
  <script src="https://js.stripe.com/v2/"></script>{{-- stripe js   script --}}
  <script src="{{ URL::to('src/js/checkout.js') }}"></script>  
                {{-- custom public src   checkout.js  script --}}

@endsection

