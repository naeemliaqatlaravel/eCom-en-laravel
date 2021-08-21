@extends('master')
@section('title','Home Page')
@section('content')

<div class="container my-5">
	<h2 class="text-center py-4">Search Product</h2>
	<div class="row">
			@foreach($img as $list)

		<div class="col-md-2">
			<a href="detail/{{$list['id']}}">
		<img class="d-block" style="width: 100%;height:250px"
       src="{{$list['gallery']}}">
             	<h5 class="text-center py-2">{{$list['name']}}</h5>
             	</a>

		</div>
		    @endforeach
	</div>
</div>


@endsection