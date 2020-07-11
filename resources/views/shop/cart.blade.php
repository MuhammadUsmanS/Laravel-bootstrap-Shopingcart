@extends('layouts.master')

@section('content')


{{-- ////////////////notify//////////////// --}}




<center>
@if(session()->has('success'))

        <div class="alert alert-success">
            <strong>Notification:</strong> {{ session()->get('success') }} 
        </div>




@endif
</center>



{{-- ////////////////notify end//////////////// --}}


{{-- <br><br><strong><span>Cart Products</span></strong><br><br> --}}
<div class="panel-heading" style="font-size: 20px"><h2>Cart Products</h2></div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
<table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

{{--  --}}

             
    <?php   $total = 0 ;  ?>

{{--         @if(session('cart')  /*AND Auth::guard('web')->user()->id =    =                           session('customerLoginId')*/)
               @foreach(session('cart') as $id => $details) --}}
            @foreach($cartItems as $details)
                <?php //dd($details);?>
                
                
                <?php $total = $total  + $details->products->price * $details->productQuantity ?>
    
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $details->products->imagePath }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details->products->title }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details->products->price }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details->productQuantity }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $details->products->price* $details->productQuantity }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $details['cartId'] }}"><i class="fas fa-sync-alt"></i></button>

                        <button class="btn btn-danger  btn-sm remove-from-cart" data-id="{{ $details['cartId'] }}"><i class="fas fa-trash-alt"></i>

</button>
                    </td>
                </tr>
            @endforeach    
        {{-- @endif --}}

        <tfoot>
        <tr class="visible-xs">
            {{-- <td class="text-center"><strong>Total {{ $total }}</strong></td> --}}
            <td class="text-center"></td>
            
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ route('products') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2.5" class="hidden-xs"></td>
            
            <td><a href="{{ route('info') }}" class="btn btn-warning">&nbsp;&nbsp;Check Out &nbsp;&nbsp;<i class="fa fa-angle-right"></i></a></td>
            

        </tr>
        </tfoot>
        </tbody>
</table>    
@endsection



@section('scripts')

<script type="text/javascript">
    
  

    $(".remove-from-cart").on('click',function(){
         var ele = $(this);
         console.log('asdfasdf');
        if(confirm("Are you sure")) {
            
            $.ajax({
                url: '{{ route('remove.product') }}',
                method: 'DELETE',
                data: {_token: '{{ csrf_token() }}', cartId: ele.attr("data-id")},  // inside button
                success: function (response) {
                    window.location.reload();
                    // window.alert('success');
                }
            });
        }
    });

        $(".update-cart").click(function (e) { // if click on and get data from ---> update-cart  
           e.preventDefault();
            var element = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                   url: '{{ route('update.cart') }}',
                   method: "PATCH",
                   data: {_token: '{{ csrf_token() }}', cartId: element.attr("data-id"), productQuantity: element.parents("tr").find(".quantity").val()},
                   success: function (response) {
                       window.location.reload();
                   }
                });
            }
        });








</script>


@endsection




{{-- <div class="container">
@if(session()->has('success'))
    <div class="row">
        <div class="alert -alert-success">
            <strong>Notification:</strong> {{ session()->get('success') }} 
        </div>
    </div>
@endif
</div> --}}
