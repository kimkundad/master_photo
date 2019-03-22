@extends('layouts.template')

@section('title')
Themes | MASTER PHOTO NETWORK
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



    <div class=" margin_30 ">

			<h4 style="border-bottom: 2px solid #666; padding-bottom:10px;">{{$sub_categories->sub_name}} <i class="icon-right-open"></i> {{$get_product->pro_name}}</h4>
    </div>

    <div class="row">

      @if($product)
      @foreach($product as $u)

      <div class="col-md-3 col-sm-6 text-center">

        <div class="hover01">
          <a href="{{url('product_1/'.$product_id)}}">
            <figure>
              <img src="{{url('assets/image/themepro_image/'.$u->themepro_image)}}" alt="{{$u->themepro_name}}" class="img-responsive">
            </figure>
          </a>
        </div>
        <h4>{{$u->themepro_name}}</h4>
        <p>
          {{$u->themepro_detail}}
        </p>
      </div>

      @endforeach
      @endif








    </div>




  </div>
  <!-- End container -->
</main>
<!-- End main -->



@endsection

@section('scripts')



@stop('scripts')
