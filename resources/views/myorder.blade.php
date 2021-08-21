@extends('master')
@section('title','Order Page')
@section('content')

<div class="container my-5">
	<h2 class="text-center py-4">My Order</h2>
	<table class="table table-bordered ">
		<tr>
			<td>Id</td>
			<td>image</td>
			<td>name</td>
			<td>Address</td>
			<td>status</td>
			<td>payment status</td>
			<td>payment method</td>
		</tr>
		@foreach($order as $list)
		<tr>
			<th>{{$list->id}}</th>
			<th><a href="detail/{{$list->id}}">
				<img class="d-block" style="width: 50%;height:100px"
				src="{{$list->gallery}}"></a></th>
			<th>{{$list->name}}</th>
			<th>{{$list->address}}</th>
			<th>{{$list->status}}</th>
			
			<th>{{$list->payment_status}}</th>
			<th>{{$list->payment_method}}</th>
		</tr>
		<hr>
		@endforeach
</div>


@endsection