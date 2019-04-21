@extends('layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title')
Photo print
@stop

@section('stylesheet')

<link rel="stylesheet" href="{{url('master/assets/css/dropzone.css')}}">

<style>
.dropzone.dz-started .dz-message {

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
             <form id="contactForm1"  >
             @if($option_product)
             <div style="display:none">
               {{$s = 0}}
             </div>


             @foreach($option_product as $item)

                 @if($item->options_detail->option_type == 1)
                 <div class="row">
                   <div class="col-md-6 col-sm-12 ">
                     <div class="form-group ">



                        <!-- <p style="margin-bottom:5px;"><b> {{$item->options_detail->option_name}}</b></p> -->
                        @if($item->options_detail->option_title != null)
                         <a href="" style="margin-bottom:5px; color: #565a5c;" data-toggle="modal" data-target="#myModal_option{{$item->options_detail->id}}"><b><i class="sl sl-icon-question"></i> {{$item->options_detail->option_name}}</b></a>
                         <!-- Modal style="color: #666;" -->
                         <div class="modal fade" id="myModal_option{{$item->options_detail->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                           <div class="modal-dialog" role="document">
                             <div class="modal-content text-right">
                               <a type="button" class="btn btn-secondary text-right" style=" color: #666;" data-dismiss="modal"><i class="fa fa-remove"></i> Close</a>


                               <div class="modal-body">

                                 <div class="row text-center ">

                                   <div class="col-md-12">
                                     <img src="{{url('assets/image/product/'.$item->options_detail->option_title)}}" class="img-responsive" />
                                   </div>

                                 </div>
                               </div>

                             </div>
                           </div>
                         </div>
                         @else
                         <p style="margin-bottom:5px;"><b> {{$item->options_detail->option_name}}</b></p>
                         @endif



                        <select id="size_photo{{$s}}" style="margin-top:8px;" class="form-control" onchange="getComboA{{$s}}(this)" name="option_number[]" required>
                          @foreach($item->options_detail->opt as $item_2)
                          <option value="{{$item_2->id}}" data-value="{{$item_2->item_price}}">{{$item_2->item_name}} </option>
                          @endforeach
                        </select>
                      </div>
                      <br />
                   </div>
                 </div>
                 @else

                 <div class="row">
                   <div class="col-md-12 col-sm-12 " style="padding-right: 5px; ">
                     <div style="margin-bottom: 5px;">

                       <a href="" style="margin-bottom:5px; color: #565a5c;" data-toggle="modal" data-target="#myModal_option"><b><i class="sl sl-icon-question"></i> {{$item->options_detail->option_name}}</b></a>

                     </div>

                     <div  class="masonry form-group col-md-12 col-sm-12 " style="padding-right: 0px; padding-left: 0px;">

                       @foreach($item->options_detail->opt as $item_2)
                        <label class="item text-center image-radio" id="radio_get">
                          <img src="{{url('assets/image/option/'.$item_2->item_image)}}" width="95" style="box-shadow: 0 0 5px 0 rgba(0,0,0,.8);" />
                          <input type="radio"  name="option_number{{$s}}" value="{{$item_2->id}}" required/>
                          <i class="icon-check-1 hidden"></i>
                          <br />
                          {{$item_2->item_name}}
                        </label >
                       @endforeach

                     </div>
                 </div>
               </div>

               <style>
               .view-more {
                    float: right;
                }
                .view-more .plus-sign {
                    display: inline-block;
                    width: 25px;
                    height: 25px;
                    margin: 0 auto;
                    padding: 6px;
                    border: 1px solid #666;
                    font-size: 12px;
                    font-weight: 100;
                    line-height: 15px;
                    text-align: center;
                    border-bottom-left-radius: 50%;
                    border-top-left-radius: 50%;
                    border-bottom-right-radius: 50%;
                    border-top-right-radius: 50%;
                }
               </style>


               <!-- Modal style="color: #666;" -->
               <div class="modal fade" id="myModal_option" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content text-right">
                     <a type="button" class="btn btn-secondary text-right" style=" color: #666;" data-dismiss="modal"><i class="fa fa-remove"></i> Close</a>


                     <div class="modal-body">

                       <div class="row text-center ">

                         <div class="col-md-12">
                           <img src="{{url('assets/image/product/'.$item->options_detail->option_title)}}" class="img-responsive" />
                         </div>

                       </div>
                     </div>

                   </div>
                 </div>
               </div>

                 @endif


                 <div style="display:none">
                   {{$s++}}
                 </div>

             @endforeach
             @endif

             <!--
             @if($option_set == 1)
             <hr />
             <p style="margin-bottom:15px;"><b><i class="sl sl-icon-question"></i> คุณมีสินค้านี้อยู่ในตะกร้าแล้ว คุณสามารถปรับ Option ของการอัดรูป <br />แล้วกดปุ่น <span class="text-danger"> Update Option</span> เพื่อเปลี่ยนข้อมูลได้</b></p>
             <a id="submit_uption" class="btn btn-submit btn-block"><i class="sl sl-icon-pencil"></i> UPDATE OPTION</a>
             @endif
             -->

            </form>



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

    margin: 0 0 20px -20px;

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

                </tbody>
              </table>

              <?php

          /*    $data = getimagesize(url('assets/image/gallery/1534842042-d88444d6206b4305377486120d9c0774.jpg'));
              echo $width = $data[0];
              echo "<br />";
              echo $height = $data[1]; */
               ?>








             <h4>Product Details</h4>

             <ul class="list_ok" style="padding-left:10px;">
                  {{$objs->pro_name_detail}}
                </ul>

              <a type="button" id="photo_f"  class="btn btn-submit btn-block" data-toggle="modal" data-target="#myModal_optionx_1"><i class="sl sl-icon-plus"></i> SELECT PHOTO</a>

              <div class="modal fade" id="myModal_optionx_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" >
                  <div class="modal-content text-right">

                    <a type="button" class="btn btn-secondary text-right" style=" color: #666;" data-dismiss="modal"><i class="fa fa-remove"></i> Close</a>


                    <div class="modal-body">

                      <div class="row text-center ">

                        <div class="col-md-12">
                          <h4>กรุณาเลือกชนิดกระดาษ</h4>
                          <p>
                            ท่านต้องเลือกกระดาษ เพื่อไปยังขั้นตอนต่อไป
                          </p>
                        </div>

                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <a type="button" id="photo_t" class="btn btn-submit btn-block" data-toggle="modal" data-target="#myModal"><i class="sl sl-icon-plus"></i> SELECT PHOTO</a>




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
                            Facebook
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
                                  <button class='add-image up_btn_kim btn btn-next' id="add-photo-set"><i class='sl sl-icon-plus'></i> Add Photos </button>
                                  <button type="submit" id="submit-all" class="hidden up_btn_kim btn btn-next" name="submit_photo"> Confirm </button>
                                  <button class="hidden up_btn_kim btn btn-next" id="clear-dropzone">Clear All</button>


                                  <div class="hidden" id="next_to_cart2">
                                    <h4 class="text-succes">กำลังส่งรูปภาพ!</h4>

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



<script src="{{url('assets/javascripts/jquery.validate.js')}}"></script>

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

<script src="{{url('master/assets/js/dropzone.js')}}"></script>

<script>

const data_get = {{$s}};

console.log({{$s}})

/*
var e = document.getElementById("size_photo1");
var strUser = e.options[e.selectedIndex].getAttribute('data-value');
if(strUser == 0){
  var x = document.getElementById("photo_t");
  x.style.display = "none";
} */
//console.log(strUser);

if({{$check_option_count}} > 0){

  var x = document.getElementById("photo_f");
  x.style.display = "none";
  var y = document.getElementById("photo_t");
  y.style.display = "block";

}else{

  var x = document.getElementById("photo_f");
  x.style.display = "none";
  var y = document.getElementById("photo_t");
  y.style.display = "block";

/*

  var x = document.getElementById("photo_t");
  x.style.display = "none";
  var y = document.getElementById("photo_f");
  y.style.display = "block";
*/
}

function getComboA1(selectObject) {
    var e = document.getElementById("size_photo1");
    var strUser = e.options[e.selectedIndex].getAttribute('data-value');

    if(strUser == 0){
      var x = document.getElementById("photo_t");
      x.style.display = "none";
      var y = document.getElementById("photo_f");
      y.style.display = "block";
    }else{
      var x = document.getElementById("photo_f");
      x.style.display = "none";
      var y = document.getElementById("photo_t");
      y.style.display = "block";
    }
  //  console.log(jQuery("#size_photo1").val());

}



$('#photo_f').on('click', function () {
/*
  $.notify({
   // options
   icon: 'icon_set_1_icon-76',
   title: "<h4>กรุณาเลือกชนิดกระดาษ</h4> ",
   message: "ท่านต้องเลือกกระดาษ เพื่อไปยังขั้นตอนต่อไป "
  },{
   // settings
   type: 'info',
   delay: 5000,
   timer: 3000,
   z_index: 9999,
   showProgressbar: false,
   placement: {
     from: "bottom",
     align: "right"
   },
   animate: {
     enter: 'animated bounceInUp',
     exit: 'animated bounceOutDown'
   },
  });
*/
  });



var formData = $('#contactForm1').serialize();
//var data = JSON.stringify( $('#contactForm1').serializeArray() ); option_number

//var radios = document.getElementsByName('option_number{{$s-1}}');







//console.log({{$s}});
var get_value_radio = 0;

$(document).ready(function(){



//  var $radio = $(this).find('input[type="radio"]'); id="radio_get"
//  $radio.prop("checked",!$radio.prop("checked"));

//  console.log($radio.val());

//  console.log(selValue);
  // add/remove checked class

  $(".image-radio").each(function(){
      $('.masonry label:first').addClass('image-radio-checked');
      var $radio = $('.masonry label:first').find('input[type="radio"]');
      $radio.prop("checked",!$radio.prop("checked"));
      get_value_radio = $radio.val();
      $radio.checked = true;
    //  console.log(get_value_radio);

      if($(this).find('input[type="radio"]').first().attr("checked")){
          $(this).addClass('image-radio-checked');
      }else{
          $(this).removeClass('image-radio-checked');
      }
  });

  console.log(get_value_radio);

  // sync the input state
  $(".image-radio").on("click", function(e){
      $(".image-radio").removeClass('image-radio-checked');
      $(this).addClass('image-radio-checked');
      var $radio = $(this).find('input[type="radio"]');
      $radio.prop("checked",!$radio.prop("checked"));
    //  var selValue = $('input[type="radio"]').val();
      get_value_radio = $radio.val();
      console.log($radio);
      $radio.checked = true;
      e.preventDefault();

  });

  //console.log($radio);


});










Dropzone.options.myDropzone= {
    url: '{{url('upload_image')}}',
    autoProcessQueue: true,
    uploadMultiple: true,
    parallelUploads: 1000,
    maxFiles: 1000,
    maxFilesize: 10024,
    dictRemoveFile: 'Remove file',
    acceptedFiles: 'image/*,application/pdf,.psd',
    addRemoveLinks: true,
    clickable: '.add-image, .dropzone',
    init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("submit-all").addEventListener("click", function(e) {



          e.preventDefault();
          e.stopPropagation();
          dzClosure.processQueue();
            // Make sure that the form isn't actually being sent.

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

        //  var frm = $('#contactForm1');
        $("#add-photo-set").addClass('hidden');

        $("#next_to_cart2").removeClass('hidden');
        //  console.log(frm);
        var set_size = [];
        set_size[0] = 0;
        if(get_value_radio == 0){
          for (i = 0; i < {{$s}}; i++) {
              set_size[i] = jQuery("#size_photo"+i).val();
          }
        }else{
          {{$s-1}}
          for (i = 0; i < {{$s}}; i++) {
              set_size[i] = jQuery("#size_photo"+i).val();
          }
          set_size.push(get_value_radio);
        }






      //  console.log(set_size);

      //  var data = $('#contactForm1').serialize() + 'ption_number[]='+get_value_radio;
            formData.append("size_photo", set_size); // value of size_photo input na kub
            formData.set("product_id", {{$objs->id_q}}); // value of product_id input na kub
        //    formData.append("size_photo", get_value_radio);
        //    formData.set("image_radio", get_value_radio); // value of type_image input na kub
          //  console.log(xhr);


        });

    },
    success : function(response, xhr){



        console.log(xhr.date_set);
        if(response.status == 'success'){
          $("a.next_to_cart").attr("href", "../photo_edit/"+xhr.date_set)
          $("a.next_to_cart2").attr("href", "../photo_edit/"+xhr.date_set)
        //  $('.up_btn_kim').addClass('hidden');

          //add-image


          $("#next_to_cart").removeClass('hidden');


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
