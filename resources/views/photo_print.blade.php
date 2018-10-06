@extends('layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title')
Photo print
@stop

@section('stylesheet')

<link rel="stylesheet" href="{{url('master/assets/css/dropzone.css')}}">

<style>
.dropzone.dz-started .dz-message {
     display: block !important;
}
</style>

@stop('stylesheet')
@section('content')



<main class="white_bg slider-pro" >


  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span style="background: #fff;">PHOTO PRINT </span></h2>

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
          <h3>{{$objs->pro_name}}</h3>
          <p>{{$objs->pro_title}}</p>
             <hr />

             @if($option_product)
             @foreach($option_product as $item)

                 @if($item->id == 2 && $item->options == 1)
                 <div class="row">
                   <div class="col-md-6 col-sm-12 ">
                     <div class="form-group ">
                        <label>Choose size</label>
                        <select id="size_photo" class="form-control" name="size_photo">
                          @foreach($item->options_detail as $item_2)
                          <option value="{{$item_2->id}}" data-price="{{$item_2->item_price}}">{{$item_2->item_name}} price ฿{{$item_2->item_price}}</option>
                          @endforeach
                        </select>
                      </div>
                      <br />
                   </div>
                 </div>
                 @endif

                 @if($item->id == 1 && $item->options == 1)

                 <div class="row">
                   <div class="col-md-12 col-sm-12 " style="padding-right: 5px; ">
                     <div class="tooltip_styled tooltip-effect-4">
                       <div class="tooltip-content">
       									ลาลาบ๊อค (lalabox) คือ กล่องภาพความทรงจำ ที่อยู่ในรูปแบบรูปถ่าย “โพลารอยด์” 25 – 50 ใบ บรรจุในกล่องพรี่เมี่ยมสวยงาม

       								</div>

                       <p style="margin-bottom:5px;"><b><i class="sl sl-icon-question"></i> สัดส่วนการอัดรูป</b></p>

                     </div>

                     <div class="masonry form-group col-md-12 col-sm-12 " style="padding-right: 0px; padding-left: 0px;">

                       @foreach($item->options_detail as $item_2)
                        <label class="item text-center image-radio" id="radio_get">
                          <img src="{{url('assets/image/option/'.$item_2->item_image)}}" width="95" style="box-shadow: 0 0 5px 0 rgba(0,0,0,.8);" />
                          <input type="radio" id="image_radio" name="image_radio" value="{{$item_2->id}}" />
                          <i class="icon-check-1 hidden"></i>
                          <br />
                          {{$item_2->item_name}}
                        </label>
                       @endforeach

                     </div>
                 </div>
               </div>

                 @endif

             @endforeach
             @endif





               <style>
               .image-radio {
                   cursor: pointer;
                   box-sizing: border-box;
                   -moz-box-sizing: border-box;
                   -webkit-box-sizing: border-box;
                   border: 4px solid transparent;
                   margin-bottom: 0;
                   outline: 0;
               }
               .image-radio input[type="radio"] {
                   display: none;
               }
               .image-radio-checked {
                   border-color: #4783B0;
               }
               .image-radio .glyphicon {
                 position: absolute;
                 color: #4A79A3;
                 background-color: #fff;
                 padding: 10px;
                 top: 0;
                 right: 0;
               }
               .tooltip-content {

    margin: 0 0 20px -50px;

}
               .image-radio-checked .glyphicon {
                 display: block !important;
               }
               .iradio_square-grey{
                 display: none;
               }
               .dropzone {
                    background: white;
                    border-radius: 5px;
                    border: 2px dashed rgb(87, 87, 87);
                    border-image: none;
                    max-width: 500px;
                    min-height: 100px;
                    margin-left: auto;
                    margin-right: auto;
                }
                .dz-message{
                  padding-top: 20px;
                }
                .dropzone .dz-preview .dz-remove {
                    color: #333;
                }
               </style>








             <table class="table table_summary" style="margin-top:20px;">
                <tbody>
                  <tr>
                    <td>
                      Promotion xxxxx
                    </td>

                  </tr>
                  <tr class="total">

                    <td >
                    ฿ <span id="show-price" style="color: #777777;">{{number_format((float)$objs->pro_price, 2, '.', '')}}</span>
                    </td>
                  </tr>
                </tbody>
              </table>








             <h4>Product Details</h4>

             <ul class="list_ok" style="padding-left:10px;">
                  {{$objs->pro_name_detail}}
                </ul>

              <a type="button" class="btn btn-submit btn-block" data-toggle="modal" data-target="#myModal"><i class="sl sl-icon-plus"></i> SELECT PHOTO</a>


              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Choose device upload</h4>
                    </div>

                    <div class="modal-body">

                      <div class="row text-center p_20">
                        <div class="col-xs-2 col-sm-2 p_20">
                        </div>
                        <div class="col-xs-4 col-sm-4 p_20">
                          <a href="#" data-toggle="modal" data-target="#myModal-upload-pc">
                            <img class="img-responsive" src="{{url('master/assets/images/social/icon_pc.png')}}" />
                          </a>

                          <p>
                            My_Device
                          </p>
                        </div>
                        <div class="col-xs-4 col-sm-4 p_20">
                          <a href="#" class="photoSelect">
                          <img class="img-responsive" src="{{url('master/assets/images/social/fb.png')}}" />
                          </a>
                        <!--  <span id="login-status">Not logged in</span> | <a href="#" id="btnLogin">Login</a> | <a href="#" id="btnLogout">Log out</a> -->
                          <p>
                            Facebook user_photos
                          </p>

                        </div>
                        <div class="col-xs-2 col-sm-2 p_20">
                        </div>


                      </div>


                    </div>

                  </div>
                </div>
              </div>


<style>
#mar-top-15{
  margin-top:15px;
}
#next_to_cart{
  font-size: 14px;
  padding: 6px 12px;
}
</style>

              <!-- Modal -->
              <div class="modal fade" id="myModal-upload-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Choose device upload </h4>
                    </div>

                    <div class="modal-body">

                      <div class="row text-center p_20">

                        <div class="col-md-12">
                          <div id="dropzone">

                                <div class="dropzone" id="myDropzone">

                                </div>
                                <div id="mar-top-15">

                                  <button type="submit" id="submit-all" class="up_btn_kim btn btn-next" name="submit_photo"> Confirm </button>
                                  <button class="up_btn_kim btn btn-next" id="clear-dropzone">Clear All</button>

                                  <a href="{{url('photo_edit/')}}" id="next_to_cart" class="next_to_cart hidden btn btn-next">Go to Cart</a>
                                  <br />
                                  <div class="hidden" id="next_to_cart2">
                                    <h4 class="text-succes">Upload Image Success!</h4>
                                    <p>
                                      ทำรายการต่อไป โดยไปที่ <strong><a href="{{url('photo_edit/')}}" class="next_to_cart2">Confirm </a></strong> เพื่อชำระสินค้าและบริการ
                                    </p>
                                  </div>

                                </div>

                        </div>

                      </div>
                    </div>

                  </div>
                </div>
              </div>

        </div>


      </div>


    </div>




  </div>
  <!-- End container -->
</main>
<!-- End main -->


@endsection

@section('scripts')


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

<script src="{{url('master/assets/js/dropzone.js')}}?v1.1"></script>

<script>
var get_value_radio = 0;
$(document).ready(function(){



//  var $radio = $(this).find('input[type="radio"]'); id="radio_get"
//  $radio.prop("checked",!$radio.prop("checked"));

//  console.log($radio.val());

//  console.log(selValue);
  // add/remove checked class
  $(".image-radio").each(function(){
      if($(this).find('input[type="radio"]').first().attr("checked")){
          $(this).addClass('image-radio-checked');
      }else{
          $(this).removeClass('image-radio-checked');
      }
  });

  $("#size_photo").change(function(e){

      var price  = $(this).find(':selected').attr('data-price')
      console.log(price);
      document.getElementById("show-price").innerHTML = ""+parseFloat(price).toFixed( 2 );

    });

  // sync the input state
  $(".image-radio").on("click", function(e){
      $(".image-radio").removeClass('image-radio-checked');
      $(this).addClass('image-radio-checked');
      var $radio = $(this).find('input[type="radio"]');
      $radio.prop("checked",!$radio.prop("checked"));
    //  var selValue = $('input[type="radio"]').val();
      get_value_radio = $radio.val();
      console.log(get_value_radio);
      $radio.checked = true;
      e.preventDefault();

  });
});



Dropzone.options.myDropzone= {
    url: '{{url('upload_image')}}',
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 100,
    maxFiles: 100,
    maxFilesize: 2024,
    dictRemoveFile: 'Remove file',
    acceptedFiles: 'image/*,application/pdf,.psd',
    addRemoveLinks: true,
    init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("submit-all").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();
          //  alert('55555++');
        });

        // Using a closure.
        var _this = this;

        document.getElementById("clear-dropzone").addEventListener("click", function(e) {
        // Using "_this" here, because "this" doesn't point to the dropzone anymore
        _this.removeAllFiles();
        $("#next_to_cart").addClass('hidden');
        $("#next_to_cart2").addClass('hidden');
        $("a.next_to_cart").attr("href", "");
        $("a.next_to_cart2").attr("href", "");
        // If you want to cancel uploads as well, you
        // could also call _this.removeAllFiles(true);
      });

        //send all the form data along with the files: id="image_radio"
        this.on("sendingmultiple", function(data, xhr, formData) {

          var set_size = jQuery("#size_photo").val();
          if(set_size == null){
            set_size = 0;
          }
          if(get_value_radio == null){
            get_value_radio = 0;
          }
          console.log(set_size);

            formData.append("size_photo", set_size); // value of size_photo input na kub
            formData.set("product_id", {{$objs->id_q}}); // value of product_id input na kub
            formData.set("image_radio", get_value_radio); // value of type_image input na kub
          //  console.log(xhr);
        });

    },
    success : function(response, xhr){



        console.log(xhr.date_set);
        if(response.status == 'success'){
          $("a.next_to_cart").attr("href", "../photo_edit/"+xhr.date_set)
          $("a.next_to_cart2").attr("href", "../photo_edit/"+xhr.date_set)
        //  $('.up_btn_kim').addClass('hidden');
          $("#next_to_cart").removeClass('hidden');
          $("#next_to_cart2").removeClass('hidden');


          setTimeout(function() {
            window.location.href = "{{url('photo_edit')}}/"+xhr.date_set;
        }, 1800);
            //alert('55555++');
        }
    },
}
</script>

<script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1063323960509612',
          xfbml      : true,
          version    : 'v3.1'
        });

        FB.getLoginStatus(function(response) {
          if (response.authResponse) {
            $("#login-status").html("Logged in");
          } else {
            $("#login-status").html("Not logged in");
          }
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
    <script src="{{url('facebook/csphotoselector.js')}}"></script>
    <script src="{{url('facebook/example.js')}}"></script>




@stop('scripts')
