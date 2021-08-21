@extends('master')
@section('title','Product Details')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			
			<img class="d-block" style="width: 100%;height: 500px"
       src="{{$product['gallery']}}" alt="First slide">
		</div>
		<div class="col-md-6">
			<a href="/"> < Go Back</a>
			<div class="mt-5">
				<h4>Name:{{$product['name']}}</h4>
				<h4>Price:RS {{$product['price']}}</h4>
				<h4>Details:{{$product['description']}}</h4>
		
			<div class="row my-5">
		<div class="col-md-3">
			<form method="POST" action="/add_to_cart">
				@csrf
				<input type="hidden" name="product_id" value="{{$product['id']}}">
				<button  class="btn btn-success"> Add To Cart</button>
			</form>
		</div>
		<div class="col-md-3">
		<button class="btn btn-primary"> Buy Now</button>

		</div>
			</div>
			</div>
	</div>
</div>

@endsection