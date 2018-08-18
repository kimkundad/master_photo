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

        <table class="table table-striped cart-list add_bottom_30">
          <thead>
            <tr>
              <th>
                Item
              </th>
              <th>
                Quantity
              </th>
              <th>
                Discount
              </th>
              <th>
                Total
              </th>
              <th>
                Actions
              </th>
            </tr>
          </thead>
          <tbody>




             <tr>
               <td>
                 <div class="thumb_cart">
                   <img src="assets/image/product/" alt="image">
                 </div>
                 <span class="item_cart">125</span>
               </td>
               <td>

               </td>
               <td>
                 0%
               </td>
               <td>
                 <strong>฿120</strong>
               </td>
               <td class="options">
                 <a href="#"><i class=" icon-trash"></i></a>

               </td>
             </tr>






          </tbody>
        </table>


      </div>



      <div class="col-md-4 ">


        <div class="box_style_1">

          <table class="table table_summary" >
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
                <td class="text-right">
                  120
                </td>
              </tr>
              <tr>
                <td>
                  Discount
                </td>
                <td class="text-right">
                  0
                </td>
              </tr>

              <tr class="total">
                <td>
                  Summary
                </td>
                <td class="text-right">
                  ฿120
                </td>
              </tr>
            </tbody>
          </table>

        </div>

        <a href="shipping.php" class="btn btn-submit btn-block" style="height:43px;">NEXT</a>
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

@stop('scripts')
