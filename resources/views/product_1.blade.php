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

                                 <input type="radio" id="f1-last-name{{$s}}" data-value="{{$s}}" data-set="{{$b_set}}" data-id="{{$item_2->id}}" name="step{{$a}}" value="{{$item_2->item_name}}">
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
              </div {{$s++}} {{$a++}} {{$b_set++}}>

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

                        <tr >

                          <td >
                          ข้อมูลที่ได้รับ  <span id="get_data"> </span>
                          </td>
                        </tr>
                        <tr >

                          <td >
                          url ที่ได้รับ  <span id="get_url"> </span>
                          </td>
                        </tr>
                      </tbody>
                    </table>



                     <div class="f1-buttons">
                       <br />

                         <a id="alert_show" style="display:block" class="btn btn-submit btn-block" data-toggle="modal" data-target="#myModal_optionx_1">MAKE ORDER</a>
                         <a id="submit_form" style="display:none; cursor: pointer;" class="btn btn-submit btn-block">MAKE ORDER</a>



                         <div class="modal fade" id="myModal_optionx_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                           <div class="modal-dialog" role="document" >
                             <div class="modal-content text-right">

                               <a type="button" class="btn btn-secondary text-right" style=" color: #666;" data-dismiss="modal"><i class="fa fa-remove"></i> Close</a>


                               <div class="modal-body">

                                 <div class="row text-center ">

                                   <div class="col-md-12">
                                     <h4>กำหนดค่าต่างๆของสินค้า</h4>
                                     <p>
                                       ท่านต้องเลือกกำหนดค่าต่างๆของสินค้าให้ครบก่อน เพื่อไปยังขั้นตอนต่อไป
                                     </p>
                                   </div>

                                 </div>
                               </div>

                             </div>
                           </div>
                         </div>


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



var set_size_option = [];
var get_value_radio = 0;

set_size_option[0] = {{$get_product_id}}
set_size_option[1] = {{$get_theme_id}}

@if($option_product)
@foreach($option_product as $item)

$('input[name=step{{$h}}]').on('ifChecked', function(event){
  document.getElementById('step{{$h}}').innerHTML = "{{$item->options_detail->option_name}} : "+$(this).val();
  //console.log($(this).val());
  var get_id_op = $(this).attr("data-id");
  var get_opset = $(this).attr("data-set");

  set_size_option[get_opset] = get_id_op;

//  var el = document.getElementById("f1-last-name{{$h}}").getAttribute("data-id");
  console.log(set_size_option);
  console.log(get_value_radio);
  //console.log(get_opset);

  if({{$option_count}} != {{$h}}){

    var element = document.getElementById("collapse1{{$h+1}}");
    element.classList.add("show");
    element.classList.add("in");

    var element_del = document.getElementById("collapse1{{$h}}");
    element_del.classList.remove("show");
    element_del.classList.remove("in");


  }else{
    var element_del = document.getElementById("collapse1{{$h}}");
    element_del.classList.remove("show");
    element_del.classList.remove("in");


    var x = document.getElementById("alert_show");
    x.style.display = "none";
    var y = document.getElementById("submit_form");
    y.style.display = "block";


  }


 });



{{$h++}}

@endforeach
@endif


$( "#submit_form" ).click(function() {

  $.ajax({
          type:'POST',
          url:'{{url('api/check_toupic')}}',
          headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
          data: { "set_size_option" : set_size_option },
          success: function(data){
            console.log(data);

            if(data.data == 'success'){

              document.getElementById('get_data').innerHTML = " ";
              document.getElementById('get_url').innerHTML = " ";

              //get_data
              document.getElementById('get_data').innerHTML = "มีข้อมูลของ Taopix ค่าที่คุณส่งไปคือ {"+data.set_data+"}";

              document.getElementById('get_url').innerHTML = data.set_url;

            //  alert('มีข้อมูลจ้า')


            }else{
              document.getElementById('get_data').innerHTML = " ";
              document.getElementById('get_url').innerHTML = " ";
              document.getElementById('get_data').innerHTML = "ไม่มีข้อมูลของ Taopix ค่าที่คุณส่งไปคือ {"+data.set_data+"}";
            //  alert('ไม่มีข้อมูลจ้า')
            }
          }
      });

});



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
