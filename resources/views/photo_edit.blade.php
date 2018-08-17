@extends('layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title')
Photo print
@stop

@section('stylesheet')



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
                Price
              </th>
              <th>
                Actions
              </th>
            </tr>
          </thead>
          <tbody >

            {{ $ids = "data".$id }}

            @foreach(Session::get('cart.'.$ids.'.data.image') as $u)
            <tr>
              <td class="magnific-gallery">
                <a href="{{url('assets/image/all_image/'.$u['image'])}}" data-effect="mfp-zoom-in">
                <div class="thumb_cart">
                  <img src="{{url('assets/image/all_image/'.$u['image'])}}" alt="image">
                </div>
                </a>
              </td>
              <td>
                <div class="numbers-row">
                  <input type="text" value="1" class="qty2 form-control" name="quantity">
                <div class="inc button_inc">+</div><div class="dec button_inc">-</div></div>
              </td>
              <td>
                150 / 1 pcs.
              </td>

              <td class="options">

                <form  action="{{url('del_upload_image')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                              <input type="hidden" name="num_image" value="{{$u['id']}}">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">

                              <button style="border:none; background: none;" type="submit" title="ลบบทความ" class="dropdown-item text-1 "><i class=" icon-trash"></i></button>
                            </form>



              </td>
            </tr>
            @endforeach



          </tbody>
        </table>


      </div>



      <div class="col-md-4 ">


        <div class="box_style_1">

          <table class="table table_summary" >
            <tbody>


              <tr>
                <td>
                  Size photo
                </td>
                <td class="text-right">
                  xxx
                </td>
              </tr>

              <tr>
                <td>
                  Image type
                </td>
                <td class="text-right">
                  xxx
                </td>
              </tr>



            </tbody>
          </table>

        </div>

        <a href="#" class="btn btn-submit btn-block" style="height:43px;">NEXT TO CART</a>
        <br />
        <a class="btn_full_outline " style="margin-bottom: 30px;" href="shipping.php"><i class="icon-right"></i> Continue shopping</a>





        </div>






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
@stop('scripts')
