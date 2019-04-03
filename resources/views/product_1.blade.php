@extends('layouts.template')

@section('title')
 | MASTER PHOTO NETWORK
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
      <h2 class="major"><span style="background: #fff;">{{$product->pro_name}}</span></h2>

    </div>

    <div class="row">

      <div class="col-md-6 col-sm-6 ">

        <div class="panel_2">




          <div class="slider-pro" id="my-slider" style="margin-top: 0px !important;">
            <div class="sp-slides">

              @if($img_all)
              @foreach($img_all as $img_u)

              <div class="sp-slide">
                <img class="sp-image" src="{{url('assets/image/gallery/'.$img_u->image)}}" data-src="{{url('assets/image/gallery/'.$img_u->image)}}" data-src="{{url('assets/image/gallery/'.$img_u->image)}}"/>
              </div>

              @endforeach
              @endif

            </div>

            <div class="sp-thumbnails">
              @if($img_all)
              @foreach($img_all as $img_u)
              <img class="sp-thumbnail" src="{{url('assets/image/gallery/'.$img_u->image)}}" data-src="{{url('assets/image/gallery/'.$img_u->image)}}" data-retina="{{url('assets/image/gallery/'.$img_u->image)}}"/>
              @endforeach
              @endif
            </div>
          </div>
        <br />
          </div>

      </div>



      <div class="col-md-6 col-sm-6 ">
        <div class="single-ofset">
          <h3>{{$product->pro_name}}</h3>
          <p>{{$product->pro_title}}</p>


          @if($option_product)
             @foreach($option_product as $item)
             <div id="step{{$j}}" style="font-size: 14px; font-weight: 600;">

             </div {{$j++}}>
             @endforeach
             @endif


<form role="form" action="" name="myForm" method="post" >

<!--












               @if($option_product)
               @foreach($option_product as $item)
               <fieldset class="masonry">









                   </fieldset >
                   @endforeach
                   @endif

            -->




            <div class="accordion" id="accordion">

              @if($option_product)
              @foreach($option_product as $item)

              <div class="card card-default">
                <div class="card-header">
                  <h4 class="card-title m-0">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1{{$s}}">
                      {{$s}} : {{$item->options_detail->option_name}}
                    </a>
                  </h4>
                </div>
                <div id="collapse1{{$s}}" class="collapse">
                  <div class="card-body">


                    <fieldset class="masonry">


                      @foreach($item->options_detail->opt as $item_2)
                          <div class="form-group">

                             <label class="step1">

                                 <input type="radio" id="f1-last-name" data-value="{{$s}}" name="step{{$s}}" value="{{$item_2->item_name}}">
                                 <ins class="iCheck-helper" ></ins>

                               {{$item_2->item_name}}
                               @if($item_2->item_price != 0)
                               <span class="jet-span">฿ {{number_format($item_2->item_price,2)}}</span>
                               @endif
                             </label>

                          </div>
                      @endforeach

                    </fieldset >


                  </div>
                </div>
              </div {{$s++}}>

              @endforeach
              @endif



            </div>


                   <table class="table table_summary" style="margin-top:20px;">
                      <tbody>
                        <tr>
                          <td>
                            Promotion xxxxxx
                          </td>

                        </tr>
                        <!--
                        <tr class="total">

                          <td >
                          Total Price  <span>{{	$product->pro_price}}</span>
                          </td>
                        </tr> -->
                      </tbody>
                    </table>



                     <div class="f1-buttons">
                       <br />

                         <a href="#" class="btn btn-submit btn-block">MAKE ORDER</a>
                     </div>

             </form>











        </div>


      </div>


    </div>




  </div>
  <!-- End container -->
</main>
<!-- End main -->

@endsection

@section('scripts')



<script src="{{url('master/assets/js/jquery.backstretch.js')}}"></script>
<script src="{{url('master/assets/js/scripts.js')}}"></script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('#my-slider').sliderPro({
      width: '100%',
      height: '500',
      arrows: true,
      visibleSize: '100%',
      autoHeight: true,
    });
  });


  var element1 = document.getElementById("collapse11");
  element1.classList.add("show");
  element1.classList.add("in");

</script>

<script type="text/javascript">



@if($option_product)
@foreach($option_product as $item)

$('input[name=step{{$h}}]').on('ifChecked', function(event){
  document.getElementById('step{{$h}}').innerHTML = "{{$item->options_detail->option_name}} : "+$(this).val();
  console.log($(this).val());

  if({{$option_count}} != {{$h}}){

    var element = document.getElementById("collapse1{{$h+1}}");
    element.classList.add("show");
    element.classList.add("in");

    var element_del = document.getElementById("collapse1{{$h}}");
    element_del.classList.remove("show");
    element_del.classList.remove("in");


  }


 });

{{$h++}}

@endforeach
@endif

/*

step_no_{{$s}}

$('input[name=step1]').on('ifChecked', function(event){
  document.getElementById('step1').innerHTML = "Size : "+$(this).val();
  console.log($(this).val());
 });

 $('input[name=step2]').on('ifChecked', function(event){
   document.getElementById('step2').innerHTML = "ORIENTATION : "+$(this).val();
   console.log($(this).val());
  });

  $('input[name=step3]').on('ifChecked', function(event){
    document.getElementById('step3').innerHTML = "FRAMES : "+$(this).val();
    console.log($(this).val());
   });

   $('input[name=step4]').on('ifChecked', function(event){
     document.getElementById('step4').innerHTML = "Wood : "+$(this).val();
     console.log($(this).val());
   }); */

</script>

@stop('scripts')
