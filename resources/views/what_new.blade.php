@extends('layouts.template')

@section('title')
WHAT'S NEW! | MASTER PHOTO NETWORK
@stop

@section('stylesheet')

<style>
figure {
	margin: 0;
	padding: 0;
	background: #fff;
	overflow: hidden;
}
figure:hover+span {
	bottom: -36px;
	opacity: 1;
}

.hover01 figure img {
	-webkit-transform: scale(1);
	transform: scale(1);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover01 figure:hover img {
	-webkit-transform: scale(1.3);
	transform: scale(1.1);
}
</style>

@stop('stylesheet')
@section('content')



<main class="white_bg slider-pro" >




  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span>WHAT'S NEW!</span></h2>
    </div>





		<div>





    <div class="row">

			@if(isset($arrivals))
			@foreach($arrivals as $u)

      <div class="col-md-3 col-sm-6 text-center">

        <div class="hover01">
          <a href="{{url('themes/'.$u->id)}}">
            <figure>
              <img src="{{url('assets/image/product/'.$u->pro_image)}}" alt="{{$u->pro_name}}" class="img-responsive">
            </figure>
          </a>
        </div>
        <h4>{{$u->pro_name}}</h4>
        <p>
          {{$u->pro_title}}
        </p>
      </div>

			@endforeach
			@endif




    </div>

		</div>





  </div>
  <!-- End container -->
</main>
<!-- End main -->



@endsection

@section('scripts')


<script>

$('input').on('ifChanged', function () {
	var checkedValue = $(this).attr('data-value');
	console.log(checkedValue);
		var x = document.getElementById(checkedValue);
		console.log(x);
    if (x.style.display === "none") {
        x.style.display = "block";

				$('html, body').animate({
	        scrollTop: $("#"+checkedValue).offset().top
	    }, 500);

    } else {
        x.style.display = "none";

    }


});



</script>



@stop('scripts')
