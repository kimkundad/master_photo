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
             <hr />

             <style>
             .f1-step {
             width: 25%;
             }
             .table {
             margin-bottom: 0px;
             }
             </style>

             @if($option_product)
             @foreach($option_product as $item)
             <div id="step{{$j}}" style="font-size: 14px; font-weight: 600;">

             </div {{$j++}}>
             @endforeach
             @endif




             <form role="form" action="" name="myForm" method="post" class="f1">


               <div class="f1-steps" >
                 <div class="f1-progress">
                     <div class="f1-progress-line" data-now-value="13.66" data-number-of-steps="4" style="width: 13.66%;"></div>
                 </div>

                 @if($option_product)
                 @foreach($option_product as $item)

                 <div class="f1-step " id="step_no_{{$s}}">
                   <div class="f1-step-icon" >{{$s}}</div>
                   <p>{{$item->options_detail->option_name}}</p>
                 </div {{$s++}}>

                 @endforeach
                 @endif

              <!--   <div class="f1-step active">
                   <div class="f1-step-icon">2</div>
                   <p>ORIENTATION</p>
                 </div>

                  <div class="f1-step">
                   <div class="f1-step-icon">3</div>
                   <p>FRAMES</p>
                 </div>

                 <div class="f1-step">
                 <div class="f1-step-icon">4</div>
                 <p>Finish</p>
               </div> -->

               </div>


               @if($option_product)
               @foreach($option_product as $item)
               <fieldset class="masonry">


                 @foreach($item->options_detail->opt as $item_2)
                     <div class="form-group">

                        <label class="step1">

                            <input type="radio" id="f1-last-name" data-value="{{$k}}" name="step{{$k}}" value="{{$item_2->item_name}}">
                            <ins class="iCheck-helper" ></ins>

                          {{$item_2->item_name}}
                          @if($item_2->item_price != 0)
                          <span class="jet-span">฿ {{number_format($item_2->item_price,2)}}</span>
                          @endif
                        </label>

                     </div>
                 @endforeach





                       <div class="f1-buttons">
                            @if($k != 1)
                           <button type="button" class="btn btn-previous">Previous</button>
                            @endif

                            @if($option_count != $k)
                           <button type="button" class="btn btn-next">Next</button>
                           @endif
                       </div>
                       <div>
                         <p style="padding-top:10px;">
                           {{$item->options_detail->option_detail}}
                         </p>
                       </div>
                   </fieldset {{$k++}}>
                   @endforeach
                   @endif

              <!--     <fieldset>

                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step2" value="portrait">
                            <ins class="iCheck-helper" ></ins>

                          portrait
                        </label>

                     </div>


                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step2" value="landscape">
                            <ins class="iCheck-helper" ></ins>

                          landscape
                        </label>

                     </div>

                     <div class="f1-buttons">
                         <button type="button" class="btn btn-previous">Previous</button>
                         <button type="button" class="btn btn-next">Next</button>
                     </div>

                   </fieldset>

                   <fieldset>

                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step3" value="portrait">
                            <ins class="iCheck-helper" ></ins>

                          portrait
                        </label>

                     </div>


                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step3" value="landscape">
                            <ins class="iCheck-helper" ></ins>

                          landscape
                        </label>

                     </div>

                     <div class="f1-buttons">
                         <button type="button" class="btn btn-previous">Previous</button>
                         <button type="button" class="btn btn-next">Next</button>
                     </div>

                   </fieldset>

                   <fieldset>


                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step4" value="black wood">
                            <ins class="iCheck-helper" ></ins>

                          <img src="{{url('master/assets/images/138ec0b1bd0c12b962b376e8d8d7e56a-11127.png')}}" width="50" />
                          black wood
                        </label>

                     </div>


                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step4" value="natural wood">
                            <ins class="iCheck-helper" ></ins>

                          <img src="{{url('master/assets/images/ecd0a579f9cae01aeb12866d9e5800bc-11129.png')}}" width="50" />
                          natural  wood
                        </label>

                     </div>


                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step4" value="walnut wood">
                            <ins class="iCheck-helper" ></ins>

                          <img src="{{url('master/assets/images/6daa87d3921328958155c36af4751bb2-11128.png')}}" width="50" />
                          walnut   wood
                        </label>

                     </div>


                     <div class="form-group">

                        <label class="">

                            <input type="radio" id="f1-last-name" name="step4" value="white wood">
                            <ins class="iCheck-helper" ></ins>

                          <img src="{{url('master/assets/images/187b5ce94e83199fc958e54931ee2652-11125.png')}}" width="50" />
                          white  wood
                        </label>

                     </div>
                     <br />
                     <div class="f1-buttons">
                     <button type="button" class="btn btn-previous">Previous</button>
                     </div>
                     <br />


                   </fieldset>  -->


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
</script>

<script type="text/javascript">



@if($option_product)
@foreach($option_product as $item)

$('input[name=step{{$h}}]').on('ifChecked', function(event){
  document.getElementById('step{{$h}}').innerHTML = "{{$item->options_detail->option_name}} : "+$(this).val();
  console.log($(this).val());

  var element = document.getElementById("step_no_{{$h}}");
  element.classList.add("active");

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
