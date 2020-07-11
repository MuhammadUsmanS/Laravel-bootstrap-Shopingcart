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

</style>

    <div class="row">
        <div class="div1" class="column left" class="col-md-6 col-md-offset-2">
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
                    <form class="form-horizontal" id="payment-form" method="POST" action="{{ route('post.payment') }}">



            <label for="card-holder-name" class="col-md-11 control-label">Card Holder Name</label>
                <div class="col-md-11">
                    <input id="card-holder-name" type="text" class="form-control" placeholder="" required>
                </div>


        	<label for="card-number" class="col-md-11 control-label">Credit Card Number</label>
            <div class="col-md-11">
                <input id="card-number" type="Number" class="form-control"  placeholder="" required autofocus>
        	</div>

          <label for="card-exp-month" class="col-md-11 control-label">Expiration Month</label>
            <div class="col-md-11">
                <input id="exp-month" type="Number" class="form-control"  placeholder="" required autofocus>
          </div>

          <label for="card-exp-year" class="col-md-11 control-label">Expiration Year</label>
            <div class="col-md-11">
                <input id="exp-year" type="Number" class="form-control"  placeholder="" required autofocus>
          </div>

          <label for="card-cvc" class="col-md-11 control-label">Cvc Code</label>
            <div class="col-md-11"> 
                <input id="card-cvc" type="Number" class="form-control"  placeholder="" required autofocus>
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
                        <td data-th="image"><img height="70" width="70" src="{{ $details->products->imagePath }}"></td>
                        <td data-th="Price"  align="left" >{{ $details->products->title }}</td>
                        <td data-th="Price" align="center">${{ $details->products->price }}</td>
                        <td data-th="Price" align="center">{{ $details->productQuantity }}</td>
                        <td data-th="Subtotal" align="center" class="text-center">${{ $details->products->price * $details->productQuantity }}</td>
                        {{--  --}}
                    </tr>
                @endforeach
{{--            @endif --}}

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

                <button class="btn btn-warning" href="{{ route('post.payment') }}">
                  Payment <i class="fa fa-angle-right"></i> 
                </button>
                
                </td>
                
                </form>
                

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

