@extends('layouts.master')
@section('content')

<center>
@if(session()->has('success'))
        <div class="alert alert-success">
            <strong>Notification:</strong> {{ session()->get('success') }} 
        </div>
@endif

@if(session()->has('qUpdate'))
	<div class="alert alert-success">
		<strong>Notification:</strong> {{session()->get('qUpdate')}}
	</div>
@endif
</center>
{{-- ////////////////notify end//////////////// --}}


<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="category.html">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sub-category</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

	<div class="container">
		<div class="card" >
			<div class="container-fliud" >
				<div class="wrapper row" >
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img height="420" width="420" src="{{$product['imagePath']}}" /></div>
						  <div class="tab-pane" id="pic-2"><img src="{{$product['imagePath']}}" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						</ul>
						
					</div>
					<div class="details col-md-6" ><br><br>
						<h2 style="text-align:left;">{{$product['title']}}</h2>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div><br>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description">{{$product['description']}}</p>
						<p class="product-description">{{$product['description']}}</p>
						{{-- <h4 class="price">current price: <span>${{$product['price']}}</span></h4> --}}
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						<h5 class="sizes">sizes:
							<span class="size" data-toggle="tooltip" title="small">s</span>
							<span class="size" data-toggle="tooltip" title="medium">m</span>
							<span class="size" data-toggle="tooltip" title="large">l</span>
							<span class="size" data-toggle="tooltip" title="xtra large">xl</span>
						</h5>
						<h5 class="colors">colors:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5><br>
						<div class="action">
							

							<a href="{{(route('products.addtocart',['productId'=>$product->id]))}}" class="btn 	btn-success " role="button"><i class="fas fa-shopping-cart"></i> Add to cart</a>


							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
							<div align="right">
								{!! QrCode::size(200)->backgroundcolor(255,55,1)->generate('Hello'); !!}
							</div>
						</div>
					</div>
						
				</div>
			</div>
		</div>
	</div>
   <br>			<br>			<br>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">E-COMMERCE CATEGORY</h1>
        <p class="lead text-muted mb-0">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte...</p>
    </div>
</section>

   

<center><h1 class="m_2">Latest products</h1></center><br><br>
<div class="container">
    <div class="row">
       
        <div class="col">
            <div class="row">

	@foreach($products as $detail)

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card">
                        <a href="{{ (route('product.detail' , ['productId'=>$detail->id])) }}">
		   					<img height="250" width="200" src="{{$detail->imagePath}}" alt="">
		   				</a>

      
                        <div class="card-body">
                            <center>
                            	<h6 class="card-title">
                            		<a href="product.html"  title="View Product">{{$detail['title']}}</a>
                            	</h6><br>
                            </center>	
                            {{-- <p class="card-text" maxlength = "20" >{{$detail['description']}}</p> --}}
                            <div class="row">
                                <div class="col">
                                    <div class="pull-left price"><p>${{$detail['price']}}</p></div>
                                </div>
                                <div class="col">
                                    <a href="{{(route('products.addtocart',['productId'=>$detail->id]))}}" class="btn 	btn-success " role="button"><i class="fas fa-shopping-cart"></i> Cart</a>
                                </div>
                            </div>
                        </div>
                    </div><br><br>
                </div>
    @endforeach            
                
               
            </div>
        </div>

    </div>
</div>

<!-- Footer -->
<footer class="text-light">
    <div class="container">
        <div class="row">

    </div>
</div>
</footer>










@endsection
