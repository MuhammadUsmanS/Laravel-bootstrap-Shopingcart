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
              <strong><h2>Orders</h2></strong>
        </div>  
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Order</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>


    @foreach($orderItems as $items)
      <?php $count = 0 ; ?> 


      
  
    <tr>
      <th scope="row"># {{ $items->id }} </th> {{-- same redirection as view butn--}}

      <td>{{ Carbon\Carbon::parse($items->created_at)->toFormattedDateString() }}</td>

      <td>{{ $items->order_status }}</td>

      <td>$<b> {{ $items->sub_total }} </b> for  {{$items->product_qty}} @if($items->product_qty == 1) <b>item</b>  @else <b>items</b>  @endif</td>

      <td>
        <a href="{{(route('order.detail',['orderId' => $items->id ]))}}" class="btn btn-primary">VIEW</a>
      </td>
      
    </tr>

    @endforeach

  </tbody>
</table>


            </div>
        </div>
    </div>



























































  </div>


@endsection()










