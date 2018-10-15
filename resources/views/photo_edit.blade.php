@extends('layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title')
Photo print
@stop

@section('stylesheet')

<link rel="stylesheet" href="{{url('master/assets/css/dropzone.css')}}">

@stop('stylesheet')
@section('content')


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
         content: "Action";
         font-weight: 700;
         color: #111;
     }
     .table.cart-list td:nth-of-type(3):before {
    content: "Price";
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

    <div class="row margin_30">

      <div class="col-md-8 ">

        <table class="table table-striped cart-list add_bottom_30">
          <thead>
            <tr>
              <th>
                Image
              </th>
              <th>
                Quantity
              </th>

              <th>
                PRICE
              </th>

              <th>
                Actions
              </th>
            </tr>
          </thead>
          <tbody {{ $ids = "data".$id }}>




          <!--  {{Session::get('cart.'.$ids.'.data.image.2.image')}} -->
            @foreach(Session::get('cart.'.$id.'.data.image') as $u)
            <tr>
              <td class="magnific-gallery">

                <a href="{{url('assets/image/all_image/'.$u['image'])}}" data-effect="mfp-zoom-in">
                <div class="thumb_cart1">
                  <img src="{{url('assets/image/all_image/'.$u['image'])}}" alt="image" style="padding: 1px; ">
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



                ฿{{number_format((float)Session::get('cart.'.$id.'.data.3.sum_price'), 2, '.', '')}}




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



      <div class="col-md-4 ">


        <div class="box_style_1">

          <table class="table table_summary" style="font-size: 14px;">
            <tbody>

              @if($option_images)
              @foreach($option_images as $k)

              <tr>
                <td>
                  {{$k->item_name}}
                </td>
              <td class="text-right">
                ฿{{number_format((float)$k->item_price, 2, '.', '')}}
              </td>

              </tr>

              @endforeach
              @endif

              <tr>
                <td>
                  จำนวนรูป
                </td>
              <td class="text-right">
                {{Session::get('cart.'.$id.'.data.2.sum_image')}}
              </td>

              </tr>

              <tr>
                <td>
                  ราคารวม
                </td>
              <td class="text-right">
                ฿{{number_format((float)Session::get('cart.'.$id.'.data.3.sum_price')*Session::get('cart.'.$id.'.data.2.sum_image'), 2, '.', '')}}
              </td>

              </tr>



            </tbody>
          </table>

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
                            <button class='add-image up_btn_kim btn btn-next'><i class='sl sl-icon-plus'></i> Add Photos </button>
                            <button type="submit" id="submit-all" class="up_btn_kim btn btn-next" name="submit_photo"> Confirm </button>
                            <button class="up_btn_kim btn btn-next" id="clear-dropzone">Clear All</button>


                            <div class="hidden" id="next_to_cart2">
                              <h4 class="text-succes">Upload Image Success!</h4>

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

</script>
 @endif

<script src="{{url('master/assets/js/dropzone.js')}}?v1.1"></script>

<script>

$(document).ready(function(){

  Dropzone.options.myDropzone= {
      url: '{{url('update_photo_print')}}',
      autoProcessQueue: false,
      uploadMultiple: true,
      parallelUploads: 100,
      maxFiles: 200,
      maxFilesize: 2024,
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
              formData.set("list_link", {{Session::get('cart.'.$id.'.data.list_link')}}); // value of type_image input na kub
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




  $(".button_inc").on("click", function () {
  console.log('Textarea Change');


      //  var username = $('form#cutproduct input[name=id]').val();

      var $button = $(this);
      var oldValue = $button.parent().find("input").val();


      if ($button.text() == "+") {
          var newVal = parseFloat(oldValue) + 1;

          console.log(newVal);
      } else {
          // Don't allow decrementing below zero
          if (oldValue > 1) {
              var newVal = parseFloat(oldValue) - 1;
          } else {
              newVal = 1;
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
