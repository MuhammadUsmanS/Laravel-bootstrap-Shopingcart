@extends('layouts.master')

@section('title')
	Laravel SHoping cart
@endsection()

@section('content')
{{-- ////////////////notify//////////////// --}}
<center>
@if(session()->has('success'))
        <div class="alert alert-success ">
	            <strong>Notification:</strong> {{ session()->get('success') }} 
        </div>
@endif

@if(session()->has('qUpdate'))
	<div class="alert alert-success">
		<strong>Notification:</strong> {{session()->get('qUpdate')}}
	</div>
@endif

@if(session()->has('loginRequired'))
	<div class="alert alert-success">
            <strong>Notification:</strong>	{{session()->get('loginRequired')}}
	</div>
@endif()

@if(session()->has('successOrder'))
	<div class="alert alert-success">
            <strong>Notification:</strong>	{{session()->get('successOrder')}}
	</div>
@endif()
</center>
{{-- ////////////////notify end//////////////// --}}





@foreach($products->chunk(3) as $productsChunk)
<div class="row">
	{{-- //////////////////////////// --}}	
@foreach($productsChunk as $product){{-- items --}}
 	<div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	 		<div class="p-3 mb-2 bg-white text-dark">
		    	<!-- <img style="max-height:150px"  class="img-responsive"> -->
		   	<a href="{{ (route('product.detail' , ['productId'=>$product->id])) }}">
		   		<center><img  height="250" src="{{$product->imagePath}}" alt=""></center>
		   	</a>
		   	
		    <div class="caption">
		    <h3>
		    <a  href="{{(route('product.detail',['productId'=>$product->id]))}}">
		    	{{$product->title}}
		    	{{$cache}}
		    	
		    </a>
		    </h3>
		    <p class="description"><justify>{{$product->description}}</justify></p>
		        <div class="clearfix">   
		        	<div class="pull-left price"><p>${{$product->price}}</p></div>
		        	<a href="{{(route('products.addtocart',['productId'=>$product->id]))}}" class="btn 	btn-success btn-lg" role="button"><i class="fas fa-shopping-cart"></i> Add to cart</a>
		   	     </div>
		      </div>
		    </div>
		</div>
	</div>
@endforeach()
</div> <br><br><br>
@endforeach()


@endsection()

