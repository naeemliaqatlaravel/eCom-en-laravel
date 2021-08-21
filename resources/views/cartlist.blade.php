@extends('master')
@section('title','cartlist Page')
@section('content')

<div class="container my-5">
	<h2 class="text-center py-4">cartlist Product</h2>
	<a href="/order" class="btn btn-primary float-right">Order Now</a>
	<br>
	<br>
		@foreach($cartlist as $list)
		<div class="row">
		<div class="col-md-3">
			<a href="detail/{{$list->id}}">
				<img class="d-block" style="width: 50%;height:100px"
				src="{{$list->gallery}}"></a>
			</div>
			<div class="col-md-6">
				<h5>{{$list->name}}</h5>
				<p >{{$list->description}}</p>
			</div>
			<div class="col-md-3">
				<a href="/removeCart/{{$list->cart_id}}" class="btn btn-warning">Remove Cart</a>
			</div>



		</div><hr>
		@endforeach
	
</div>


@endsection