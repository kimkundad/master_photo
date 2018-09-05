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
          <tbody >

            <?php
              $total_pay = 0;
              $total_img = 0;
              $s = 0;
             ?>

    @foreach(Session::get('cart') as $u)



             <tr>
               <td>
                 <a href="{{url('photo_edit/'.$u['data']['list_link'])}}" target="_blank">
                 <div class="thumb_cart">
                   <img src="{{url('assets/image/product/'.$set_img[$s])}}" alt="image">
                 </div>
                 <span class="item_cart">TRADITIONAL SIZES</span>
                 </a>
               </td>
               <td>
                 {{$u['data'][1]['sum_image']}} / Pcs.
               </td>
               <td>
                 0%
               </td>
               <td>
                 <strong>฿{{$u['data'][2]['sum_price']}}</strong>
               </td>
               <td class="options">
                 <form id="myform-{{$u['data']['id']}}" name="myform-{{$u['data']['id']}}" action="{{ url('del_cart/') }}" method="POST"  style="    margin-bottom: 0em;">
                   {{ csrf_field() }}
                   <input type="hidden" value="data{{$u['data']['id']}}" name="ids">
                 <a href="#" onclick="document.getElementById('myform-{{$u['data']['id']}}').submit(); return false;"><i class=" icon-trash"></i></a>
                 </form>
               </td>
             </tr>

             <?php
              $total_pay += $u['data'][2]['sum_price'];
              $total_img += $u['data'][1]['sum_image'];
              $s++;
              ?>

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
                  {{$total_img}}
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
                  ฿ {{$total_pay}}
                </td>
              </tr>
            </tbody>
          </table>

        </div>

        <a href="{{url('shipping')}}" class="btn btn-submit btn-block" style="height:43px;">NEXT</a>
        <br />
        <a class="btn_full_outline " style="margin-bottom: 30px;" href="{{url('/')}}"><i class="icon-right"></i> Continue shopping</a>





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
