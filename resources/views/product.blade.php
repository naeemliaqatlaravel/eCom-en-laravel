@extends('master')
@section('title','Home Page')
@section('content')
<div class="container custom-product">
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  	@foreach($img as $list)
    <div class="carousel-item {{$list['id']==5?'active':''}}">
    	<a href="detail/{{$list['id']}}">
      <img class="d-block" style="width: 100%;height: 500px"
       src="{{$list['gallery']}}" alt="First slide">
      </a>
      <div class="carousel-caption">

      	<h3>{{$list['name']}}</h3>
      </div>
    </div>
    @endforeach
   <!--  <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div> -->
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<div class="container my-5">
	<h2 class="text-center py-4">Trending Product</h2>
	<div class="row">
			@foreach($img as $list)

		<div class="col-md-2">
			<a href="detail/{{$list['id']}}">
		<img class="d-block" style="width: 100%;height:250px"
       src="{{$list['gallery']}}" alt="First slide">
             	<h5 class="text-center py-2">{{$list['name']}}</h5>
             	</a>

		</div>
		    @endforeach
	</div>
</div>


@endsection