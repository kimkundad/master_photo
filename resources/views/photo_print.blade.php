@extends('layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title')
Photo print
@stop

@section('stylesheet')

<link rel="stylesheet" href="{{url('assets/dropzone2/assets/css/dropzone.css')}}">
<link rel="stylesheet" href="{{url('assets/dropzone2/assets/style.css')}}">

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
                          <option value="{{$item_2->id}}" data-value="{{$item_2->item_price}}">{{$item_2->item_name}}
                            @if($item_2->item_show_status == 1)
                          ( ราคา {{$item_2->item_price}} บาท )
                            @endif
                          </option>
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
                          @if($item_2->item_image == null)
                          <img src="{{url('assets/image/Photo1.jpg')}}" width="95" style="box-shadow: 0 0 5px 0 rgba(0,0,0,.8);" />
                          @else
                          <img src="{{url('assets/image/option/'.$item_2->item_image)}}" width="95" style="box-shadow: 0 0 5px 0 rgba(0,0,0,.8);" />
                          @endif
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
               <div class="modal fade" id="myModal_option" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 100000;">
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


               </style>








             <table class="table table_summary" style="margin-top:20px;">
                <tbody>
                  <tr>
                    <td>
                      Promotion {{$objs->pro_promotion}}
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








             <h4>Product Details </h4>

             <ul class="list_ok" style="padding-left:10px;">
                  {{$objs->pro_name_detail}}
                </ul>

            <!--  <a type="button" id="photo_f"  class="btn btn-submit btn-block" data-toggle="modal" data-target="#myModal_optionx_1"><i class="sl sl-icon-plus"></i> SELECT PHOTO</a>

              <div class="modal fade" id="myModal_optionx_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" >
                  <div class="modal-content text-right">

                    <a type="button" class="btn btn-secondary text-right" style=" color: #666;" data-dismiss="modal"><i class="fa fa-remove"></i> Close</a>


                    <div class="modal-body">

                      <div class="row text-center ">

                        <div class="col-md-12">
                          <h4>กรุณาเลือก ตัวเลือกของคุณ</h4>
                          <p>
                            ท่านต้องตัวเลือกของคุณ เพื่อไปยังขั้นตอนต่อไป
                          </p>
                        </div>

                      </div>
                    </div>

                  </div>
                </div>
              </div> -->



              <a type="button" id="photo_f" class="btn btn-submit btn-block" data-toggle="modal" data-target="#myModal"><i class="sl sl-icon-plus"></i> SELECT PHOTO</a>
              <br />
              <p class="text-danger">

                * Upload ครั้งละไม่เกิน 200 รูป และ ขนาดไฟล์รวมกันไม่เกิน 1 Gb. <br />
                * Upload จากมือถือ ครั้งละไม่เกิน 50 รูป <span class="uploaded-files-count2 hidden" style="color:#565a5c">0</span>
              </p>



              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
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
.actions{
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
.dropzone {
background: white;
border-radius: 5px;
border: 2px dashed rgb(86, 90, 92);
border-image: none;
max-width: 500px;
min-height: 100px;
margin-left: auto;
margin-right: auto;
}
</style>

              <!-- Modal -->
              <div class="modal fade" id="myModal-upload-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 100000;">
                <div class="modal-dialog" role="document">
                  <div class="modal-content inner-page">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Choose device upload </h4>
                    </div>

                    <div class="modal-body">

                      <div class="row p_20">

                        <div class="col-md-12">

                          <form action="{{url('upload_new_image')}}" class="dropzone files-container" style="margin: 0px 2px 2px 15px;" enctype="multipart/form-data">
                            {{ csrf_field() }}
              						<div class="fallback">
              							<input name="file" type="file" multiple />

              						</div>
                          <input type="hidden" name="product_id" value="{{$pro_id}}" />


                          <input type="hidden" id="size_photo_var" name="size_photo" value="" />
              					</form>
                        <div id="mar-top-15" class="text-center">
                        <button class="add-image up_btn_kim btn btn-next dz-clickable" id="add-photo-set"><i class="sl sl-icon-plus"></i> Add Photos </button>
                        <div class="hidden" id="next_to_cart2">
                          <h4 class="text-succes">กำลังส่งรูปภาพ!</h4>

                        </div>
                        </div>

                        <h4 class="section-sub-title " style="color:#565a5c; margin-top: 20px;">Uploaded Files (<span class="uploaded-files-count" style="color:#565a5c">0</span>)</h4>
					              <span class="no-files-uploaded">No files uploaded yet.</span>

                        <!-- Preview collection of uploaded documents -->
                    					<div class="preview-container dz-preview uploaded-files">
                    						<div id="previews">
                    							<div id="onyx-dropzone-template">
                    								<div class="onyx-dropzone-info">

                    									<div class="details">
                    										<div>
                    											<span data-dz-name></span> <span data-dz-size></span>
                    										</div>
                    										<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                    										<div class="dz-error-message"><span data-dz-errormessage></span></div>
                    										<div class="actions">
                    											<a href="#!" data-dz-remove><i class="fa fa-times"></i></a>
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


      </div>


    </div>




  </div>
  <!-- End container -->
</main>
<!-- End main -->


@endsection

@section('scripts')



<script src="{{url('assets/javascripts/jquery.validate.js')}}"></script>
<script src="{{url('assets/dropzone2/assets/js/dropzone.min.js')}}"></script>
<script src="{{url('assets/dropzone2/assets/js/scripts.js')}}"></script>
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



<script>

const data_get = {{$s}};
var fix_data = {{$check_option_count}};



$('#photo_f').on('click', function () {

  console.log({{$s}});
    var set_size = [];
    set_size[0] = 0;
    if(get_value_radio == 0){
      for (i = 0; i < {{$s}}; i++) {
          set_size[i] = jQuery("#size_photo"+i).val();
      }
    }else{
      {{$s-1}}
      for (i = 0; i < {{$s-1}}; i++) {
          set_size[i] = jQuery("#size_photo"+i).val();
      }
      set_size.push(get_value_radio);
    }

    document.getElementById("size_photo_var").value = (set_size);
    console.log(set_size);

  });



var formData = $('#contactForm1').serialize();



//console.log({{$s}});
var get_value_radio = 0;

$(document).ready(function(){



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


console.log({{$s}});
  var set_size = [];
  set_size[0] = 0;
  if(get_value_radio == 0){
    for (i = 0; i < {{$s}}; i++) {
        set_size[i] = jQuery("#size_photo"+i).val();
    }
  }else{
    {{$s-1}}
    for (i = 0; i < {{$s-1}}; i++) {
        set_size[i] = jQuery("#size_photo"+i).val();
    }
    set_size.push(get_value_radio);
  }

  document.getElementById("size_photo_var").value = (set_size);
  console.log(set_size);


});








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
