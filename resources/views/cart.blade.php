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
          <thead style="    font-size: 14px;">
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
          <tbody <?php
          $sum_img = 0;
          $total_pay = 0;
          ?>>


@foreach(Session::get('cart') as $u)
    <?php $total_img = 0; ?>
    @foreach(Session::get('cart.data'.$u['data']['list_link'].'.data.image') as $j)
    <?php

    $total_img += $j['num'];
    $sum_img += $j['num'];
    ?>
    @endforeach

             <tr <?php $total_pay += ($total_img * 120); ?> >
               <td>
                 <a href="{{url('photo_edit/'.$u['data']['list_link'])}}" target="_blank">
                 <div class="thumb_cart">
                   <img src="{{url('master/assets/images/USM-11220_PDP_prints_collage_sizing_1140x1140_20160912.jpg')}}" alt="image">
                 </div>
                 <span class="item_cart">TRADITIONAL SIZES</span>
                 </a>
               </td>
               <td>
                 {{$total_img}} / Pcs.
               </td>
               <td>
                 0%
               </td>
               <td>
                 <strong>฿{{$total_img * 120}}</strong>
               </td>
               <td class="options">
                 <a href="#"><i class=" icon-trash"></i></a>
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
                  {{$sum_img}}
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
                  ฿{{$total_pay}}
                </td>
              </tr>
            </tbody>
          </table>

        </div>

        <a href="#" class="btn btn-submit btn-block" style="height:43px;">NEXT</a>
        <br />
        <a class="btn_full_outline " style="margin-bottom: 30px;" href="#"><i class="icon-right"></i> Continue shopping</a>





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
