@extends('layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title')
Photo print
@stop

@section('stylesheet')

<link rel="stylesheet" href="{{url('master/assets/css/dropzone.css')}}">

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

            <div class="sp-slide">
              <img class="sp-image" src="{{url('master/assets/images/bnk48/ac7a07dda4cc55010519e1983bfaa84f.jpg')}}" data-src="{{url('master/assets/images/bnk48/ac7a07dda4cc55010519e1983bfaa84f.jpg')}}" data-src="{{url('master/assets/images/bnk48/ac7a07dda4cc55010519e1983bfaa84f.jpg')}}"/>
            </div>

            <div class="sp-slide">
                <img class="sp-image" src="{{url('master/assets/images/bnk48/b1c501d0027efe27ca3eb2bbce1b308e.jpg')}}" data-src="{{url('master/assets/images/bnk48/b1c501d0027efe27ca3eb2bbce1b308e.jpg')}}" data-retina="{{url('master/assets/images/bnk48/b1c501d0027efe27ca3eb2bbce1b308e.jpg')}}"/>
            </div>

            <div class="sp-slide">
              <img class="sp-image" src="{{url('master/assets/images/bnk48/ba11a6d6bb915d3ec72116f4b9b4eeb4.jpg')}}" data-src="{{url('master/assets/images/bnk48/ba11a6d6bb915d3ec72116f4b9b4eeb4.jpg')}}" data-retina="{{url('master/assets/images/bnk48/ba11a6d6bb915d3ec72116f4b9b4eeb4.jpg')}}"/>
            </div>

            <div class="sp-slide">
              <img class="sp-image" src="{{url('master/assets/images/bnk48/cfce0b522ac116081d1c98288f4c15f9.jpg')}}" data-src="{{url('master/assets/images/bnk48/cfce0b522ac116081d1c98288f4c15f9.jpg')}}" data-retina="{{url('master/assets/images/bnk48/cfce0b522ac116081d1c98288f4c15f9.jpg')}}"/>
            </div>

            <div class="sp-slide">
              <img class="sp-image" src="{{url('master/assets/images/bnk48/d88444d6206b4305377486120d9c0774.jpg')}}" data-src="{{url('master/assets/images/bnk48/d88444d6206b4305377486120d9c0774.jpg')}}" data-retina="{{url('master/assets/images/bnk48/d88444d6206b4305377486120d9c0774.jpg')}}"/>
            </div>

            <div class="sp-slide">
              <img class="sp-image" src="{{url('master/assets/images/bnk48/da176da12cd7329faa530d969a66cccf.jpg')}}" data-src="{{url('master/assets/images/bnk48/da176da12cd7329faa530d969a66cccf.jpg')}}" data-retina="{{url('master/assets/images/bnk48/da176da12cd7329faa530d969a66cccf.jpg')}}"/>
            </div>

          </div>

          <div class="sp-thumbnails">
            <img class="sp-thumbnail" src="{{url('master/assets/images/bnk48/ac7a07dda4cc55010519e1983bfaa84f.jpg')}}" data-src="{{url('master/assets/images/bnk48/ac7a07dda4cc55010519e1983bfaa84f.jpg')}}" data-retina="{{url('master/assets/images/bnk48/ac7a07dda4cc55010519e1983bfaa84f.jpg')}}"/>
            <img class="sp-thumbnail" src="{{url('master/assets/images/bnk48/b1c501d0027efe27ca3eb2bbce1b308e.jpg')}}" data-src="{{url('master/assets/images/bnk48/b1c501d0027efe27ca3eb2bbce1b308e.jpg')}}" data-retina="{{url('master/assets/images/bnk48/b1c501d0027efe27ca3eb2bbce1b308e.jpg')}}"/>
            <img class="sp-thumbnail" src="{{url('master/assets/images/bnk48/ba11a6d6bb915d3ec72116f4b9b4eeb4.jpg')}}" data-src="{{url('master/assets/images/bnk48/ba11a6d6bb915d3ec72116f4b9b4eeb4.jpg')}}" data-retina="{{url('master/assets/images/bnk48/ba11a6d6bb915d3ec72116f4b9b4eeb4.jpg')}}"/>
            <img class="sp-thumbnail" src="{{url('master/assets/images/bnk48/cfce0b522ac116081d1c98288f4c15f9.jpg')}}" data-src="{{url('master/assets/images/bnk48/cfce0b522ac116081d1c98288f4c15f9.jpg')}}" data-retina="{{url('master/assets/images/bnk48/cfce0b522ac116081d1c98288f4c15f9.jpg')}}"/>
            <img class="sp-thumbnail" src="{{url('master/assets/images/bnk48/d88444d6206b4305377486120d9c0774.jpg')}}" data-src="{{url('master/assets/images/bnk48/d88444d6206b4305377486120d9c0774.jpg')}}" data-retina="{{url('master/assets/images/bnk48/d88444d6206b4305377486120d9c0774.jpg')}}"/>
            <img class="sp-thumbnail" src="{{url('master/assets/images/bnk48/da176da12cd7329faa530d969a66cccf.jpg')}}" data-src="{{url('master/assets/images/bnk48/da176da12cd7329faa530d969a66cccf.jpg')}}" data-retina="{{url('master/assets/images/bnk48/da176da12cd7329faa530d969a66cccf.jpg')}}"/>
          </div>
        </div>
        <br />
          </div>

      </div>



      <div class="col-md-6 col-sm-6 ">
        <div class="single-ofset">
          <h3>TRADITIONAL SIZES</h3>
          <p>ลาลาบ๊อค (lalabox) คือ กล่องภาพความทรงจำ ที่อยู่ในรูปแบบรูปถ่าย “โพลารอยด์” 25 – 50 ใบ บรรจุในกล่องพรี่เมี่ยมสวยงาม เหมาะสำหรับให้เป็นของขวัญ
            สามารถทำออนไลน์ได้ เพียงเลือกแบบของเรา อัปโหลดรูปภาพจากคอมพิวเตอร์ด้วยตัวคุณ ใช้เวลาเพียงไม่กี่นาที เมื่อคุณพอใจก็สามารถยืนยันสั่งซื้อได้ </p>
             <hr />



             <div class="row">

               <div class="col-md-6 col-sm-12 ">
                 <div class="form-group ">
                    <label>SIZE</label>
                    <select id="size_photo" class="form-control" name="size_photo">
                      <option value="1">4 x 6 in. price ฿7.0</option>
                      <option value="2">4 x 5.3 in. price ฿12.5 </option>
                      <option value="3">5 x 7 in. price ฿14.0 </option>
                      <option value="4">8 x 8 in. price ฿15.0 </option>
                      <option value="5">8 x 10 in. price ฿20.05 </option>
                    </select>
                  </div>
                  <br />
               </div>



               </div>


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
               .image-radio-checked .glyphicon {
                 display: block !important;
               }
               .iradio_square-grey{
                 display: none;
               }
               .dropzone {
                    background: white;
                    border-radius: 5px;
                    border: 2px dashed rgb(0, 135, 247);
                    border-image: none;
                    max-width: 500px;
                    min-height: 100px;
                    margin-left: auto;
                    margin-right: auto;
                }
                .dz-message{
                  padding-top: 20px;
                }
               </style>




               <div class="row">
                 <div class="col-md-12 col-sm-12 " style="padding-right: 5px; ">


                   <div class="masonry form-group col-md-12 col-sm-12 " style="padding-right: 0px; padding-left: 0px;">

                      <label class="item text-center image-radio" id="radio_get">
                        <img src="{{url('master/assets/img/Proto_print_type1.jpg?v3')}}" width="80" />
                        <input type="radio" id="image_radio" name="image_radio" value="1" />
                        <i class="icon-check-1 hidden"></i>
                        <br />
                        รูปปกติ
                      </label>

                      <label class="item text-center image-radio" id="radio_get">
                        <img src="{{url('master/assets/img/Proto_print_type2.jpg?v2')}}" width="80" />
                        <input type="radio" id="image_radio" name="image_radio" value="2" />
                        <i class="icon-check-1 hidden"></i>
                        <br />
                        ขอบขาว
                      </label>


                      <label class="item text-center image-radio" id="radio_get">
                        <img src="{{url('master/assets/img/Proto_print_type3.jpg?v2')}}" width="80" />
                        <input type="radio" id="image_radio" name="image_radio" value="3" />
                        <i class="icon-check-1 hidden"></i>
                        <br />
                        เต็มไฟล์
                      </label>


                      <label class="item text-center image-radio" id="radio_get">
                        <img src="{{url('master/assets/img/Proto_print_type4.jpg?v2')}}" width="80" />
                        <input type="radio" id="image_radio" name="image_radio" value="4" />
                        <i class="icon-check-1 hidden"></i>
                        <br />
                        เต็มขอบขาว
                      </label>

                   </div>


               </div>

             </div>



             <table class="table table_summary" style="margin-top:20px;">
                <tbody>
                  <tr>
                    <td>
                      Promotion xxxxx
                    </td>

                  </tr>
                  <tr class="total">

                    <td >
                    Total Price  <span>฿150</span>
                    </td>
                  </tr>
                </tbody>
              </table>



        




             <h4>Product Details</h4>

             <ul class="list_ok" style="padding-left:10px;">
                  รูปโพลารอยด์ของเราพิมพ์ลงบนกระดาษ Luster เนื้อพิเศษ ซึ่งทำให้ได้ภาพที่สีสันสวยงามมีมิติ และรูปภาพของเราเก็บรักษาได้นานกว่า 200 ปี
                  เราใช้กระดาษเครื่องพิมพ์เครื่องที่ทันสมัยเพื่อให้ได้งานพิมพ์ที่สวยงาม
                  เราใช้กระดาษเครื่องพิมพ์เครื่องที่ทันสมัยเพื่อให้ได้งานพิมพ์ที่สวยงาม
                </ul>

              <a type="button" class="btn btn-submit btn-block" data-toggle="modal" data-target="#myModal">UPLOAD PHOTO</a>


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
                          <span id="login-status">Not logged in</span> | <a href="#" id="btnLogin">Login</a> | <a href="#" id="btnLogout">Log out</a>
                          <p>
                            Facebook user_photos
                          </p>

                        </div>
                        <div class="col-xs-4 col-sm-4 p_20">
                          <img class="img-responsive" src="{{url('master/assets/images/social/ig.png')}}" />
                          <p>
                            instagram
                          </p>
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

                                  <button type="submit" id="submit-all" class="up_btn_kim btn btn-next" name="submit_photo"> upload </button>
                                  <button class="up_btn_kim btn btn-next" id="clear-dropzone">Clear</button>

                                  <a href="{{url('photo_edit/')}}" id="next_to_cart" class="next_to_cart hidden btn btn-next">Go to Cart</a>
                                  <br />
                                  <div class="hidden" id="next_to_cart2">
                                    <h4 class="text-succes">Upload Image Success!</h4>
                                    <p>
                                      ทำรายการต่อไป โดยไปที่ <strong><a href="{{url('photo_edit/')}}" class="next_to_cart2">Go to Cart </a></strong> เพื่อชำระสินค้าและบริการ
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

<script src="{{url('master/assets/js/dropzone.js')}}"></script>

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
            formData.append("size_photo", jQuery("#size_photo").val()); // value of size_photo input na kub
            formData.set("product_id", 10); // value of product_id input na kub
            formData.set("image_radio", get_value_radio); // value of type_image input na kub
          //  console.log(xhr);
        });

    },
    success : function(response, xhr){



        console.log(xhr.date_set);
        if(response.status == 'success'){
          $("a.next_to_cart").attr("href", "photo_edit/"+xhr.date_set)
          $("a.next_to_cart2").attr("href", "photo_edit/"+xhr.date_set)
        //  $('.up_btn_kim').addClass('hidden');
          $("#next_to_cart").removeClass('hidden');
          $("#next_to_cart2").removeClass('hidden');
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
