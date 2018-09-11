@extends('layouts.template')

@section('title')
{{$sub_categories->sub_name}} | MASTER PHOTO NETWORK
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
      <h2 class="major"><span style="background: #fff;">{{$sub_categories->sub_name}}</span></h2>

    </div>

    <div class="row">

  <!--    @if($product)
      @foreach($product as $u)

      <div class="col-md-3 col-sm-6 text-center">

        <div class="hover01">
          <a href="{{url('product_1')}}">
            <figure>
              <img src="{{url('master/assets/images/HGifts.jpg')}}" alt="Pic" class="img-responsive">
            </figure>
          </a>
        </div>
        <h4>FLAT CARDS</h4>
        <p>
          70% off 5x7 Stationery Flat Cards.
        </p>
      </div>

      @endforeach
      @endif -->



			<div class="col-md-3 col-sm-6 text-center">

        <div class="hover01">
          <a href="{{url('product_1')}}">
            <figure>
              <img src="{{url('master/assets/images/HGifts.jpg')}}" alt="Pic" class="img-responsive">
            </figure>
          </a>
        </div>
        <h4>FLAT CARDS</h4>
        <p>
          70% off 5x7 Stationery Flat Cards.
        </p>
      </div>

      <div class="col-md-3 col-sm-6 text-center">

        <div class="hover01">
          <a href="{{url('product_1')}}">
            <figure>
              <img src="{{url('master/assets/images/HPhotobooks.jpg')}}" alt="Pic" class="img-responsive">
            </figure>
          </a>
        </div>
        <h4>FLAT CARDS</h4>
        <p>
          70% off 5x7 Stationery Flat Cards.
        </p>
      </div>

      <div class="col-md-3 col-sm-6 text-center">

        <div class="hover01">
          <a href="{{url('product_1')}}">
            <figure>
              <img src="{{url('master/assets/images/Hframes.jpg')}}" alt="Pic" class="img-responsive">
            </figure>
          </a>
        </div>
        <h4>FLAT CARDS</h4>
        <p>
          70% off 5x7 Stationery Flat Cards.
        </p>
      </div>

      <div class="col-md-3 col-sm-6 text-center">

        <div class="hover01">
          <a href="{{url('product_1')}}">
            <figure>
              <img src="{{url('master/assets/images/HGifts.jpg')}}" alt="Pic" class="img-responsive">
            </figure>
          </a>
        </div>
        <h4>FLAT CARDS</h4>
        <p>
          70% off 5x7 Stationery Flat Cards.
        </p>
      </div>



      <div class="col-md-3 col-sm-6 text-center">

        <div class="hover01">
          <a href="{{url('product_1')}}">
            <figure>
              <img src="{{url('master/assets/images/HGifts.jpg')}}" alt="Pic" class="img-responsive">
            </figure>
          </a>
        </div>
        <h4>FLAT CARDS</h4>
        <p>
          70% off 5x7 Stationery Flat Cards.
        </p>
      </div>

      <div class="col-md-3 col-sm-6 text-center">

        <div class="hover01">
          <a href="{{url('product_1')}}">
            <figure>
              <img src="{{url('master/assets/images/HGifts.jpg')}}" alt="Pic" class="img-responsive">
            </figure>
          </a>
        </div>
        <h4>FLAT CARDS</h4>
        <p>
          70% off 5x7 Stationery Flat Cards.
        </p>
      </div>

      <div class="col-md-3 col-sm-6 text-center">

        <div class="hover01">
          <a href="{{url('product_1')}}">
            <figure>
              <img src="{{url('master/assets/images/Hframes.jpg')}}" alt="Pic" class="img-responsive">
            </figure>
          </a>
        </div>
        <h4>FLAT CARDS</h4>
        <p>
          70% off 5x7 Stationery Flat Cards.
        </p>
      </div>

      <div class="col-md-3 col-sm-6 text-center">

        <div class="hover01">
          <a href="{{url('product_1')}}">
            <figure>
              <img src="{{url('master/assets/images/HPhotobooks.jpg')}}" alt="Pic" class="img-responsive">
            </figure>
          </a>
        </div>
        <h4>FLAT CARDS</h4>
        <p>
          70% off 5x7 Stationery Flat Cards.
        </p>
      </div>




    </div>




  </div>
  <!-- End container -->
</main>
<!-- End main -->



@endsection

@section('scripts')



@stop('scripts')
