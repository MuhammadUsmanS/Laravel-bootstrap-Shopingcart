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
                    
                  <div>
      <p>From your account dashboard you can view your <a>recent orders</a>, manage your and billing addresses, and edit your password and account details.</p>
  </div>  

            </div>
        </div>
    </div>








 </div>


@endsection()
