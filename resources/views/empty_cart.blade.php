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
  .f1-step .f1-step-icon{
    padding-top: 12px;
  }

  @media (max-width: 767px){

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
.item_cart{
    height: 80px;
}

.table.cart-list td:nth-of-type(5):before {
content: "DELETE";
font-weight: 700;
color: #111;
}
.table.cart-list td:nth-of-type(4):before {
content: "PRICE";
font-weight: 700;
color: #111;
}

  }

  .thumb_cart1 {
   border: 1px solid #ddd;
   overflow: hidden;
   width: 60px;
   height: 60px;
   margin-right: 10px;
   float: left;
}

.thumb_cart1 img {

width: 60px;
height: 60px;


}
  </style>

  <div class="container margin_60">

    <div class="f1-steps">
      <div class="f1-progress">
          <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="4" style="width: 13.66%;"></div>
      </div>
      <div class="f1-step active">
        <div class="f1-step-icon"><i class=" icon-basket-1"></i></div>
        <p>Cart</p>
      </div>
      <div class="f1-step">
        <div class="f1-step-icon"><i class=" icon-truck"></i></div>
        <p>Shipping</p>
      </div>
        <div class="f1-step">
        <div class="f1-step-icon"><i class=" icon-dollar"></i></div>
        <p>Payment</p>
      </div>
      <div class="f1-step">
      <div class="f1-step-icon"><i class=" icon-check-3"></i></div>
      <p>Order Complete</p>
    </div>
    </div>

    <div class="row margin_30">

      <div class="col-md-8 ">














      </div>



      <div class="col-md-4 ">
        <div class="text-center" style=" text-align: -webkit-center;">
          <img src="{{url('assets/image/cart_icon.png')}}" alt="CART" class="img-responsive text-center">
        </div>


        <div class="box_style_1">

          <table class="table table_summary" style="font-size: 14px;">
            <tbody>


              <tr>
                <td>
                  Point Order
                </td>
                <td class="text-right">
                  xxx
                </td>
              </tr>

              <tr>
                <td>
                  Total
                </td>

                @if (Auth::guest())
                <td class="text-right">
                  0
                </td>
                @else
                <td class="text-right">
                  0
                </td>
                @endif
              </tr>
              <tr>
                <td>
                  Discount
                </td>
                <td class="text-right">
                  0
                </td>
              </tr>

              <tr class="total" style="font-size: 18px;">
                <td>
                  Summary
                </td>
                <td class="text-right">
                  ฿ 0.00
                </td>
              </tr>

            </tbody>
          </table>
          <br />
          <p class="text-danger" style="margin: 0px 0px 0px 5px;">
             **ราคายังไม่รวมค่าจัดส่ง
          </p>

        </div>

        <a href="{{url('shipping')}}" class="btn btn-submit btn-block" style="height:43px;">ORDER</a>
        <br />
        <a class="btn btn_full_outline_golf btn-block " style="margin-bottom: 30px;" href="{{url('/')}}"> CONTINUE SHOPPING</a>





        </div>






      </div>


    </div>




  </div>
  <!-- End container -->
</main>
<!-- End main -->



@endsection

@section('scripts')

@stop('scripts')
