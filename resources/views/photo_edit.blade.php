@extends('layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title')
Photo print
@stop

@section('stylesheet')

<link rel="stylesheet" href="{{url('master/assets/css/dropzone.css')}}">

@stop('stylesheet')
@section('content')


<?php
$resolution = 0;
$get_name_size = '';
?>

<main class="slider-pro" >


  <style>
  .f1-step {
  width: 25%;
  }
  .table {
  margin-bottom: 0px;
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
   @media (max-width: 767px){
     .table.cart-list td:nth-of-type(4):before {
         content: "DELETE";
         font-weight: 700;
         color: #111;
     }
     .table.cart-list td:nth-of-type(3):before {
    content: "SIZE";
    font-weight: 700;
    color: #111;
}
.thumb_cart1 {
 border: 1px solid #ddd;
 overflow: hidden;
 width: 120px;
 height: 120px;
 margin-right: 10px;
 float: none;
}
.thumb_cart1 img {

 width: 80px;
 height: 80px;


}
   }



   .thumb_cart1 {
    border: 1px solid #ddd;
    overflow: hidden;
    width: 60px;
    height: 60px;
    margin-right: 10px;

}

.thumb_cart1 img {

 width: 60px;
 height: 60px;


}

  </style>

  <div class="container margin_60">


    <div class=" margin_30 text-center">
      <h2 class="major"><span style="background: #fff;">Image Upload </span></h2>

    </div>



    <div class="row margin_30" {{$set_size = 0}} >

      <?php $all_img = 0;  ?>


      @if (Auth::guest())


      <div class="col-md-8 " >

<div style="display:none">
        @if(isset($option_images))
        @foreach($option_images as $k)

          @if($set_size == 0)
            {{ $get_name_size = $k->item_name}}
            {{ $resolution = $k->resolution}}
          @endif

              {{$set_size++}}

        @endforeach
        @else
        {{$resolution = 0}}
        @endif
</div>
    <div class="table-responsive">
      <table class="table table-striped  add_bottom_30">
          <thead>
            <tr>
              <th>
                Image
              </th>
              <th>
                Quantity
              </th>

              <th>
                SIZE
              </th>

              <th>
                DELETE
              </th>
            </tr>
          </thead>
          <tbody {{ $ids = "data".$id }}>





            @foreach(Session::get('cart.'.$id.'.data.image') as $u)
            <tr>
              <td class="magnific-gallery">

                <a href="{{url('assets/image/all_image/'.$u['image'])}}" data-effect="mfp-zoom-in">
                <div class="thumb_cart1">
                  <img src="{{url('assets/image/all_image/'.$u['image'])}}" alt="image" style="padding: 1px; ">

                  <?php

                  $data = getimagesize(url('assets/image/all_image/'.$u['image']));
                  $width = $data[0];
                  $height = $data[1];
                  $get_resolution = $width * $height;

                  if($get_resolution < $resolution){
                    $all_img++;
                  }

                   ?>
                </div>


                </a>
              </td>
              <td>


                <form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">
                  <div class="numbers-row">
                    <input type="text" value="{{$u['num']}}" id="quantity_{{$u['id']}}" class="qty2 form-control" name="quantity">
                  </div>

                  <input type="hidden" class="ids" name="ids" value="{{$id}}">
                  <input type="hidden" class="num_img" name="num_img" value="{{$u['id']}}">
                  <input type="hidden" class="img_set" name="img_set" value="{{$u['image']}}">
                </form>





              </td>
              <td >
                  {{$get_name_size}}<br />

                  @if($get_resolution >= $resolution)

                  @else
                  <span style="color: #e04f67; font-size:13px;">Resolution ของรูปต่ำกว่า<br /> {{number_format($resolution, 2)}} พิกเซล</span>
                  @endif

              </td>

              <td class="options">

                <form  action="{{url('del_upload_image')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="num_image" value="{{$u['id']}}">
                              <input type="hidden" name="ids" value="{{$id}}">
                              <input type="hidden" name="list_link" value="{{Session::get('cart.'.$id.'.data.list_link')}}">


                              <button style="border:none; background: none; " type="submit" title="ลบบทความ" class="dropdown-item text-1 "><i class=" icon-trash"></i></button>
                            </form>

              </td>
            </tr>
            @endforeach



          </tbody>
        </table>
        </div>

      </div>


      @else


      <div style="display:none">
              @if(isset($option_images))
              @foreach($option_images as $j)

                @if($set_size == 0)

                  @foreach($j->option as $k)
                  {{ $get_name_size = $k->item_name}}
                  {{ $resolution = $k->resolution}}
                  @endforeach
                @endif

                    {{$set_size++}}

              @endforeach
              @else
              {{$resolution = 0}}
              @endif
      </div>



      <div class="col-md-8 " {{$set_size = 0}} >
        <div class="table-responsive">
        <table class="table table-striped  add_bottom_30">
            <thead>
              <tr>
                <th>
                  Image
                </th>
                <th>
                  Quantity
                </th>

                <th>
                  SIZE
                </th>

                <th>
                  DELETE
                </th>
              </tr>
            </thead>
            <tbody >



              @foreach($get_image as $u)
              <tr>
                <td class="magnific-gallery">

                  <a href="{{url('assets/image/all_image/'.$u->cart_image)}}" data-effect="mfp-zoom-in">
                  <div class="thumb_cart1">
                    <img src="{{url('assets/image/all_image/'.$u->cart_image)}}" alt="image" style="padding: 1px; ">

                    <?php

                    $data = getimagesize(url('assets/image/all_image/'.$u->cart_image));




                    $width = $data[0];
                    $height = $data[1];
                    $get_resolution = $width * $height;
                    if($get_resolution < $resolution){
                      $all_img++;
                    }

                     ?>
                  </div>


                  </a>
                </td>
                <td>


                  <form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">
                    <div class="numbers-row">
                      <input type="text" value="{{$u->cart_image_sum}}" id="quantity_{{$u->id}}" class="qty2 form-control" name="quantity">
                    </div>
                    <input type="hidden" class="ids" name="ids" value="{{$id}}">
                    <input type="hidden" class="num_img" name="num_img" value="{{$u->id}}">
                    <input type="hidden" class="img_set" name="img_set" value="{{$u->cart_image}}">
                  </form>





                </td>
                <td >
                    {{$get_name_size}}<br />

                    @if($get_resolution >= $resolution)

                    @else
                    <span style="color: #e04f67; font-size:13px;">Resolution ของรูปต่ำกว่า<br /> {{number_format($resolution, 2)}} พิกเซล</span>
                    @endif

                </td>
                <td class="options">

                  <form  action="{{url('del_upload_image')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="num_image" value="{{$u->id}}">
                                <input type="hidden" name="list_link" value="{{$id}}">
                                <button style="border:none; background: none; " type="submit" title="ลบบทความ" class="dropdown-item text-1 "><i class=" icon-trash"></i></button>
                              </form>

                </td>
              </tr>
              @endforeach

              </tbody>
            </table>
            </div>
      </div>

      @endif






















      <div class="col-md-4 ">


        <div class="box_style_1">

          @if (Auth::guest())
          <div class="table-responsive">
          <table class="table table_summary" style="font-size: 14px;">
            <tbody>

              @if(isset($option_images))
              @foreach($option_images as $k)

              <tr>
                <td>
                  {{$k->item_name}}
                </td>
              <td class="text-right">
                 @if($k->item_show_status == 1)
                ฿{{number_format($k->item_price, 2)}}
                @endif
              </td>

              </tr>

              @endforeach
              @endif

              <tr>
                <td>
                  จำนวนรูป
                </td>
              <td class="text-right">
                <div id="number_image" style="display: none;">
                  {{Session::get('cart.'.$id.'.data.2.sum_image')}}
                  <?php
                  Session::put('img_f', $all_img);
                   ?>
                </div>

                <div id="get_number_image">

                </div>

              </td>

              </tr>



              <tr>
                <td>
                  ราคารวม
                </td>
              <td class="text-right">
                <div id="sum_image_price" style="display: none;">
                  {{number_format(Session::get('cart.'.$id.'.data.3.sum_price')*(Session::get('cart.'.$id.'.data.2.sum_image')) , 2)}}
                </div>
                <div id="get_image_price">

                </div>

              </td>

              </tr>



            </tbody>
          </table>
          </div>

          @else

          <div class="table-responsive">
          <table class="table table_summary" style="font-size: 14px;">
            <tbody>



              @if(isset($option_images))
              @foreach($option_images as $j)

              <tr>
                <td>
                  @foreach($j->option as $k)
                  {{$k->item_name}}
                  @endforeach
                </td>
              <td class="text-right">
                @foreach($j->option as $k)
                @if($k->item_show_status == 1)
                ฿{{number_format($k->item_price, 2)}}
                @endif
                @endforeach
              </td>

              </tr>

              @endforeach
              @endif


              <tr>
                <td>
                  จำนวนรูป
                </td>
              <td class="text-right">
                <div id="number_image" style="display: none;">
                  {{$sum_image_value}}
                  <?php
                  Session::put('img_f', $all_img);
                   ?>
                </div>

                <div id="get_number_image">

                </div>

              </td>

              </tr>


              <tr>
                <td>
                  ราคารวม
                </td>
              <td class="text-right">
                <div id="sum_image_price" style="display: none;">
                  {{number_format($sum_price_value*($sum_image_value) , 2)}}
                </div>
                <div id="get_image_price">

                </div>

              </td>

              </tr>


            </tbody>
          </table>
          </div>


          @endif

        </div>



        <a type="button" class="btn btn_full_outline_golf btn-block" data-toggle="modal" data-target="#myModal"><i class='sl sl-icon-plus'></i> ADD MORE PHOTO</a>
        <br />

        <a href="{{url('cart')}}" class="btn btn-submit btn-block" style="height:43px;"><i class="fa fa-cart-plus"></i> NEXT TO CART</a>



        </div>















        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 100000;">
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
        <div class="modal fade" id="myModal-upload-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 100001;">
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

        <!-- end Modal -->

      </div>

























    </div>




  </div>
  <!-- End container -->
</main>
<!-- End main -->

@endsection

@section('scripts')
@if ($message = Session::get('del_success'))
<script>


/*

$(function() {







setTimeout(function() {
$.notify({
 // options
 icon: 'icon_set_1_icon-76',
 title: "<h4>ลบรุปภาพ สำเร็จ</h4> ",
 message: "ท่านสามารถลบรูปภาพออกได้ และสามารถเพิ่มจำนวนของรูปภาพนั้นๆได้ ก่อนส่งเข้าระบบ. "
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
}, 500);
 });
 */
</script>
 @endif




 <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document" style="margin-top: 180px;">
     <div class="modal-content text-center">


       <div class="modal-body">
         <br />
         <br />
         <h3 class="modal-title" >มีรูปที่ความละเอียดต่ำ จำนวน</h3>

         <h4 class="modal-title" >{{$all_img}} รูป</h4>
         <h4 class="modal-title" >หากไม่ต้องการ กรุณาลบออกก่อนสั่งงาน</h4>
         <br />
       </div>
       <div class="modal-footer">

    <div class="col-md-412 text-center">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>

  </div>
  </div>

     </div>
   </div>
 </div>


 <script type="text/javascript">

 $(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});


    @if($all_img > 0)
    $(window).on('load',function(){
        $('#myModal1').modal('show');
    });
    @endif

</script>



<script src="{{url('master/assets/js/dropzone.js')}}?v1.1"></script>

<script>

$(document).ready(function(){

  Dropzone.options.myDropzone= {
      url: '{{url('update_photo_print')}}',
      autoProcessQueue: true,
      uploadMultiple: true,
      parallelUploads: 100,
      maxFiles: 1000,
      maxFilesize: 4024,
      dictRemoveFile: 'Remove file',
      acceptedFiles: 'image/*,application/pdf,.psd',
      addRemoveLinks: true,
      clickable: '.add-image, .dropzone',
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

          // If you want to cancel uploads as well, you
          // could also call _this.removeAllFiles(true);
        });

          //send all the form data along with the files: id="image_radio"
          this.on("sendingmultiple", function(data, xhr, formData) {
            //  formData.append("size_photo", jQuery("#size_photo").val()); // value of size_photo input na kub
              formData.set("ids", '{{$id}}'); // value of product_id input na kub

              @if (Auth::guest())
              formData.set("list_link", {{Session::get('cart.'.$id.'.data.list_link')}}); // value of type_image input na kub
              @else
              formData.set("list_link", {{$id}}); // value of type_image input na kub
              @endif


            //  console.log(xhr);
          });

      },
      success : function(response, xhr){

        $("#next_to_cart2").removeClass('hidden');


          if(response.status == 'success'){

            setTimeout(function() {
              location.reload();

          }, 1800);

          }
      },
  }

});

</script>


<script type="text/javascript">
$(document).ready(function(){

@if (Auth::guest())
var sum_price_value = {{Session::get('cart.'.$id.'.data.3.sum_price')}};
@else
var sum_price_value = {{$sum_price_value}};
@endif

var number = parseInt($('#number_image').text());
//console.log(number+1);
$('#get_number_image').append(numeral(number).format('0,0'));

var price_image = document.getElementById('sum_image_price').innerText;
//var price_image = parseInt($('#sum_image_price').text());
console.log(price_image);
$('#get_image_price').append(numeral(price_image).format('0,0.00'));
//console.log(sum_price_value);


  $(".button_inc").on("click", function () {


  $('#get_number_image').html("");
  $('#get_image_price').html("");
      //  var username = $('form#cutproduct input[name=id]').val();

      var $button = $(this);
    //var oldValue = $button.parent().fisum_image_pricend("input").val();
    var oldValue = $button.parent().find("input").val();


      if ($button.text() == "+") {
          var newVal = parseFloat(oldValue) + 1;

          $('#get_number_image').append(numeral(number+=1).format('0,0'));
          $('#get_image_price').append( numeral(sum_price_value*number).format('0,0.00'));
          console.log(number);
      } else {
          // Don't allow decrementing below zero
          if (oldValue > 1) {
              var newVal = parseFloat(oldValue) - 1;
              $('#get_number_image').append(numeral(number-=1).format('0,0'));
              $('#get_image_price').append( numeral(sum_price_value*number).format('0,0.00') );
          } else {
              newVal = 1;
              $('#get_number_image').append(numeral(number).format('0,0'));
              $('#get_image_price').append( numeral(sum_price_value*number).format('0,0.00') );
          }
      }
       $button.parent().find("input").val(newVal);

      var $form = $(this).closest("form#cutproduct");
      var formData =  $form.serializeArray();
    //  var qty2 =  $form.find(".qty2").val();
      var ids =  $form.find(".ids").val();
      var num_img =  $form.find(".num_img").val();
      var img_set =  $form.find(".img_set").val();



        if(newVal){
          $.ajax({
            type: "POST",
            url: "{{url('add_qty2_photo')}}",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: {
              qty2 : newVal,
              ids : ids,
              num_img : num_img,
              img_set : img_set
            },
            dataType: "json",
         success: function(json){
             if(json.status == 1001) {





               setTimeout(function() {
                // location.reload();

             }, 1800);




              } else {


                $.notify({
                  // options
                  icon: '',
                  title: "<h4>เพิ่มรายการที่ชอบ ไม่สำเร็จ</h4> ",
                  message: "ท่านต้องทำการ Login เพื่อเข้าสู่ระบบก่อนเพิ่มรายการที่ชอบ . "
                },{
                  // settings
                  type: 'danger',
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




              }
            },
            failure: function(errMsg) {
              alert(errMsg.Msg);
            }
          });
        }else{




          $.notify({
            // options
            icon: '',
            title: "<h4>เพิ่มรายการที่ชอบ ไม่สำเร็จ</h4> ",
            message: "ท่านต้องทำการ Login เพื่อเข้าสู่ระบบก่อนเพิ่มรายการที่ชอบ . "
          },{
            // settings
            type: 'danger',
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





        }
      });






    $('form input').change(function() {
    console.log('Textarea Change');


        //  var username = $('form#cutproduct input[name=id]').val();


        var $form = $(this).closest("form#cutproduct");
        var formData =  $form.serializeArray();
        var qty2 =  $form.find(".qty2").val();
        var ids =  $form.find(".ids").val();
        var num_img =  $form.find(".num_img").val();
        var img_set =  $form.find(".img_set").val();



          if(qty2){
            $.ajax({
              type: "POST",
              url: "{{url('add_qty2_photo')}}",
              headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
              data: {
                qty2 : qty2,
                ids : ids,
                num_img : num_img,
                img_set : img_set
              },
              dataType: "json",
           success: function(json){
               if(json.status == 1001) {

                 setTimeout(function() {
                   location.reload();

               }, 1800);

                } else {

                }
              },
              failure: function(errMsg) {
                alert(errMsg.Msg);
              }
            });
          }else{


          }
        });



});


</script>



@stop('scripts')
