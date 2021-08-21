@extends('master')
@section('title','Order Page')
@section('content')

<div class="container my-5">
	<h2 class="text-center py-4">Order Product</h2>
	<table class="table-bordered table-dark table-responsive">
	</table>
	<table class="table table-bordered">
		<tr>
			<th>Amount</th>
			<th>${{$product}}</th>
		</tr>
		<tr>
			<th>Tax</th>
			<th>$0</th>
		</tr>
		<tr>
			<th>Delivery</th>
			<th>$10</th>
		</tr>
		<tr>
			<th>Total Amount</th>
			<th>${{$product+10}}</th>
		</tr>
	</table>
	<div>
		<form method="POST" action="/orderplace">
			@csrf
			<div class="form-group">
				<textarea  name="address" class="form-control" placeholder="Enter Adderess"></textarea>
				</div>
				<div class="form-group">
					<b>Payment Method</b><br>
					<input type="radio" name="payment" value="online">
					<label>Online Payment</label><br>
					<input type="radio" name="payment" value="jazzcash"><label>Jazz cash Payment</label><br>
					<input type="radio" name="payment" value="cod">
					<label>Payment on Delivery</label>
				</div>
				<div>
					<button class="btn btn-secondary" type="submit" name="order">Checkout</button>
				</div>
		</form>
	</div>
</div>


@endsection