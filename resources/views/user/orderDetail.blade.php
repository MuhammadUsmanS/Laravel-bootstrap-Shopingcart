@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-3 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: 20px">
                    @if(Auth::guard('web')->check())
                        {{ Auth::guard('web')->user()->name}}
                            <strong></strong>
                        <center>
                       {{--  <p class="text-success"> --}}
                        </p>

                            
                        </center>
                    @else
                        <p class="text-danger">
                        <strong></strong>
                        </p>

                    @endif                
             </div>
                {{-- &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp; --}}
                {{--  show error --}}
                @if(count($errors) > 0)
                <div  class="alert alert-danger"> 
                    
                    @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach

                </div>
                @endif

                <div class="panel-body">
                 {{-- @if(Auth::guard('web')->check())
                        
                        <center>
                        <p class="text-success">
                            Your Email : <strong>{{ Auth::guard('web')->user()->email}}</strong>
                        </p>
                            
                        </center>
                  @endif       --}}
    <div><br><br><br></div>                    
    <ul class="list-group">
      <li class="list-group-item d-flex justify-content-between align-items-center">
       <a href="{{route('user.dashboard')}}">Dashboard</a> 
        <span class="badge badge-primary badge-pill">4</span>
      </li>

      <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{route('user.orders')}}">Orders</a> 
        <span class="badge badge-primary badge-pill">4</span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Downlaods
        <span class="badge badge-primary badge-pill">2</span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Addresses
        
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Account Detail
        
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{route('user.logout')}}">Logout</a> 
        
      </li>
    </ul>




            </div>
        </div>
    </div>


   
        <div class="col-md-8 col-md-offset-8">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: 20px">
                    @if(Auth::guard('web')->check())
                        Hello 
                            You are logged In as <strong>User</strong>
                        <center>
                       {{--  <p class="text-success"> --}}
                        {{-- </p> --}}
                        
                        </center>
                    @else
                        <p class="text-danger">
                            You are logged OUT  as <strong>User</strong>
                        </p>

                    @endif                
             </div>
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                {{--  show error --}}
                @if(count($errors) > 0)
                <div  class="alert alert-danger"> 
                    
                    @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach

                </div>
                @endif

                <div class="panel-body">
                 
                 {{-- @if(Auth::guard('web')->check())
                        
                        <center>
                        <p class="text-success">
                            Your Email : <strong>{{ Auth::guard('web')->user()->email}}</strong>
                        </p>
                            
                        </center>
                  @endif       --}}
                    
        <div class="alert alert-success">
              <strong><h2>Order Details</h2></strong>
        </div>  
<table class="table">
  <thead >{{-- class="thead-light" --}}
    <tr>
      <th scope="col">Product ID</th>
      <th >Price</th>
      <th scope="col">Quantity</th>

      {{-- <th scope="col">SubTotal:</th>
      <th scope="col">Payment Method:</th> --}}
      <th scope="col">Total:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Detail</th>
    </tr>
  </thead>
  <tbody>


    @foreach($orderItems as $items)
      @foreach($items->orderItems as  $product)
              <tr>
                  <td style="background-color: #e6ffee;"># <a href="{{(route('product.detail',['productId' => $product->product_id ]))}}">{{$product->product_id}}</a></td>
                  <td style="background-color: #e6ffee;" scope="row">{{$product->product_price}}</td>
                  <td style="background-color: #e6ffee;">{{$product->product_price}} x <b>{{$product->product_qty}} </b> </td>
                  <td style="background-color: #e6ffee;">
                    $ {{ $product->sub_total }} 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <a href="{{(route('product.detail',['productId' => $product->product_id ]))}}" class="btn btn-primary">View Product
                     </a>
                   </td>
              </tr>

      @endforeach
              <tr>          
                  <td></td>
                  <td></td>
                  <th>SubTotal </th>
                  <th>$ {{$items->sub_total }}</th>
              </tr>              
              <tr>
                  <td></td>
                  <td></td>
                  <th>Payment Method</th>
                  <td>{{ $product->payments->payment_method }}   </td>      
              </tr>

              <tr>          
                  <td></td>
                  <td></td>
                  <th>Total </th>
                  <th>$ {{$items->sub_total }}</th>
              </tr>              

              <tr >
                <td colspan="6">
                    <div class="alert alert-success">
                      <strong>
                        <h2>Billing Address</h2>
                      </strong>
                    </div>
                  </td>
              </tr>

              <tr><td colspan=5><strong>Address : </strong>{{$items->userMeta->address}}</td></tr>
              <tr><td colspan=5><strong>City : </strong>{{$items->userMeta->city}}</td></tr>
              <tr><td colspan=5><strong>State : </strong>{{$items->userMeta->state}}</td></tr>
              <tr><td colspan=5><strong>Country : </strong>{{$items->userMeta->country}}</td></tr>
          <tr><td colspan=5><strong>Postal Code : </strong>{{$items->userMeta->postalcode}}</td></tr>
              <tr><td colspan=5><strong>Contact : </strong>{{$items->userMeta->phone}}</td></tr>

              <tr>
                <td><strong>First Name : </strong>{{$items->userMeta->firstname}}</td></tr>
                <td><strong>Last Name : </strong>{{$items->userMeta->lastname}}</td></tr>
                <td><strong>Email : </strong>{{$items->userMeta->email}}</td></tr>
              </tr>


              
             {{--  <tr>
                
                <td>
                  <a href="{{(route('order.detail',['orderId' => $items->id ]))}}" class="btn btn-primary">VIEW</a>
                </td>

 --}}


    @endforeach
  </tbody>
</table>


            </div>
        </div>
    </div>



























































  </div>


@endsection()










