<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('products') }}">Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
    </ul> 

<style>
	#navigation
{
    position: absolute; /*or fixed*/
    right: 0px;
}
</style>

     <div class="navigation" class="collapse navbar-collapse" id="navbarSupportedContent">



    <ul class="navbar-nav mr-auto">

      <li >
      
      </li>

      
      
              
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user"></i> Admin
        </a>
          
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @if(Auth::guard('admin')->check())
                    <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                    <a class="dropdown-item" href="{{ route('admin.profile') }}">Admin Dashboard</a>
                  @else
                    <a class="dropdown-item" href="{{ route('admin.login') }}">Admin Login</a>
                @endif
        </div>
      </li>
      
      &nbsp;&nbsp;&nbsp;
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user"></i> User Management
        </a>
          
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          @if(Auth::guard('web')->check())
          <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
          <a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a>
          <a class="dropdown-item" href="{{ route('fb.login') }}" >
            <strong>Facebook login </strong>
          </a>

          @else
          <a class="dropdown-item" href="{{ route('user.signup') }}">Sign Up</a>
          <a class="dropdown-item" href="{{ route('user.login') }}">Sign In</a>
          <a class="dropdown-item" href="{{ route('fb.login') }}" >
            <strong>Logged In</strong>
          </a>

          @endif

<style type="text/css">
  .badge {
  padding-left: 9px;
  padding-right: 9px;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}

.label-warning[href],
.badge-warning[href] {
  background-color: #c67605;
}
#lblCartCount {
    font-size: 12px;
    background: #ff0000;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
    margin-left: -10px; 
}
</style>          
    <div class="dropdown-divider"></div>
          
      <li class="nav-item">
        <a class="nav-link" href="{{ route('cart.products') }}">
          <p class="font-weight-bold">&nbsp;&nbsp;
            <i class="fas fa-shopping-cart">&nbsp;
              <span class='badge badge-warning' id='lblCartCount'>

            @if( session()->has('count'))
                {{session()->get('count')}}
            @else
                  0
            @endif

          
            </span>
               
            </i> Shoping Cart
          </p>
        </a>
      </li>

  

        </div>
      </li> 
      
    
        

    </ul>
  </div>
</nav>