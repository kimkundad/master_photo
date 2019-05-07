@extends('layouts.template')

@section('title')
Payment | MASTER PHOTO NETWORK
@stop

@section('stylesheet')

@stop('stylesheet')
@section('content')



<main class="slider-pro">


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
          <div class="f1-progress-line" data-now-value="13.66" data-number-of-steps="4" style="width: 63%;"></div>
      </div>
      <div class="f1-step active">
        <div class="f1-step-icon"><i class=" icon-basket-1"></i></div>
        <p>Cart</p>
      </div>
      <div class="f1-step active">
        <div class="f1-step-icon"><i class=" icon-truck"></i></div>
        <p>Shipping</p>
      </div>
        <div class="f1-step active">
        <div class="f1-step-icon"><i class=" icon-dollar"></i></div>
        <p>Payment</p>
      </div>
      <div class="f1-step">
      <div class="f1-step-icon"><i class=" icon-check-3"></i></div>
      <p>Order Complete</p>
    </div>
    </div>



    <div class="row margin_30">

      <div class="col-md-8 box_style_1  add_bottom_15">


        <div class="box_style_1 visible-sm visible-xs">

          <table class="table table_summary" >
            <tbody>

              <tr>
                <td>
                  คำสั่งซื้อ
                </td>
                <td class="text-right">
                  #{{$order->code_gen}}
                </td>
              </tr>

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
                  Discount
                </td>
                <td class="text-right">
                  ฿{{number_format($order->discount, 2)}}
                </td>
              </tr>

              <tr>
                <td>
                  ค่าจัดส่ง
                </td>
                <td class="text-right">
                  ฿{{number_format($order->shipping_p, 2)}}
                </td>
              </tr>

              <tr>
                <td>
                  ราคาสินค้า x {{$order->total}}
                </td>
                <td class="text-right" >
                  ฿{{number_format($order->order_price, 2)}}

                </td>
              </tr>

              <tr class="total">
                <td>
                  ยอดชำระ
                </td>
                <td class="text-right">
                  ฿{{number_format($order->order_price+$order->shipping_p, 2)}}
                </td>
              </tr>

            </tbody>
          </table>

        </div>

        <div class="form_title">
          <h3><strong>1</strong>โอนเงินผ่านธนาคาร</h3>
          <p>
            สามารถชำระเงินได้โดยผ่านทางธนาคาร จากนั้นกรุณาแจ้งการชำระเงินผ่านทาง Website ในหน้า account ของท่าน
          </p>
        </div>


        <div class="step">
          <h4>คำสั่งซื้อ <a>#{{$order->code_gen}}</a></h4>
          <br />
          <p class="text-success" style="font-size:14px;">
            <i class="im im-icon-Money-Smiley" style="font-size:32px;"></i> หากลูกค้าเลือกที่จะ ชำระหรือโอนเงินผ่านธนาคาร ลูกค้าสามารถกด <span class="text-danger"><b>"ขั้นตอนต่อไป"</b></span> เพื่อทำรายการภายหลัง หรือ กด
            <span class="text-danger"><b>"แจ้งชำระเงิน"</b></span> ในขั้นตอนนี้ได้เลยค่ะ
          </p>

          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ชื่อบัญชี</th>
                  <th>เลขที่บัญชี</th>
                  <th>สาขา</th>

                </tr>
              </thead>
              <tbody>

                @if($bank)
                @foreach($bank as $b)
                <tr>
                  <td>
                    <img src="{{url('assets/images/bank/'.$b->bank_img)}}" height="35">
                  </td>
                  <td class="p_top">
                    {{$b->name_b}}
                  </td>
                  <td class="p_top">
                    {{$b->name_no_b}}
                  </td>
                  <td class="p_top">
                    {{$b->major_name_b}}
                  </td>
                </tr>
                @endforeach
                @endif


              </tbody>
            </table>
            </div>


          <br />
          <a href="{{url('/')}}" style="padding: 6px 12px; font-size:15px;" class="btn btn-next">กลับสู่หน้าแรก</a>
          <a href="{{url('pay_order_detail/'.$order->code_gen)}}" style="padding: 6px 12px; font-size:15px;" class="btn btn-next">แจ้งชำระเงิน</a>
        </div>

        <div class="form_title">
          <h3><strong>2</strong>ชำระผ่านบัตรเครดิต</h3>
          <p>
            ทุกธุรกรรมผ่านบัตรเครดิตและบัตรเดบิตได้รับการรับรองความปลอดภัย ด้วยเทคโนโลยี 2c2p Payment gateway api, Paypa
          </p>

        </div>


        <?php
        //Merchant's account information
        $merchant_id = "JT01";			//Get MerchantID when opening account with 2C2P
        $secret_key = "7jYcp4FxFdf0";	//Get SecretKey from 2C2P PGW Dashboard

        //Transaction information
        $payment_description  = '2 days 1 night hotel room';
        $order_id  = $order->code_gen;
        $currency = "764";
        $amount  = '000000008650';

        //Request information
        $version = "8.5";
        $payment_url = "https://demo2.2c2p.com/2C2PFrontEnd/RedirectV3/payment";
        $result_url_1 = url('/api/result_payment');

        //Construct signature string
      	$params = $version.$merchant_id.$payment_description.$order_id.$currency.$amount.$result_url_1;
      	$hash_value = hash_hmac('sha256',$params, $secret_key,false);	//Compute hash value

          ?>

        <div class="step">
          <img src="{{url('master/assets/img/footer/logo-2c2p.png')}}" style="width:80px;" />
        <form id="myform" class="w3-container w3-display-middle w3-card-4 " method="post" action="{{$payment_url}}">
      		<input type="hidden" name="version"  value="{{$version}}"/>
      		<input type="hidden" name="merchant_id" value="{{$merchant_id}}"/>
      		<input type="hidden" name="currency" value="{{$currency}}"/>
      		<input type="hidden" name="result_url_1" value="{{$result_url_1}}"/>
      		<input type="hidden" name="hash_value" value="{{$hash_value}}"/>

          <div class="form-group hidden">
            <label>PRODUCT INFO</label>
          <input type="hidden" name="payment_description" class="form-control" value="{{$payment_description}}"  readonly/>
          </div>

          <div class="form-group">
            <label>ORDER NO</label>
          <input type="text" name="order_id" class="form-control" value="{{$order_id}}"  readonly/>
          </div>

          <div class="form-group">
            <label>AMOUNT</label>
          <input type="text" name="amount" class="form-control" value="{{$order->order_price+$order->shipping_p}}" readonly/>
          </div>

          <button type="submit" class="btn btn-next">Confirm</button>
      	</form>






          <!--End row -->

          <hr>

          <h4>Or checkout with Paypal</h4>
          <p>
            Lorem ipsum dolor sit amet, vim id accusata sensibus, id ridens quaeque qui. Ne qui vocent ornatus molestie, reque fierent dissentiunt mel ea.
          </p>


          <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="{{url('paypal')}}">
              {{ csrf_field() }}



              <div class="col-md-4">
                <div class="form-group">
              <input type="text" name="amount" value="{{number_format($order->order_price+$order->shipping_p, 2)}}" class="form-control">
              </div>
            </div>
              <p>
                <button type="submit" class="btn " style="border:none; padding:0; margin-top:-5px; background: #fff;">
                <img src="{{url('master/assets/images/paypal_bt.png')}}" alt="Image">
                </button>
              </p>
            </form>
        </div>


    <!--    <div id="policy">
          <h4>Cancellation policy</h4>
          <div class="form-group">
            <label>
              <div class="icheckbox_square-grey" style="position: relative; width: 23px;"><input type="checkbox" name="policy_terms" id="policy_terms" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>I accept terms and conditions and general policy.</label>
          </div>


          <button type="submit" class="btn btn-next">SUBMIT NOW</button>
        </div>
 -->

      </div>



      <div class="col-md-4 ">


        <div class="box_style_1 hidden-sm hidden-xs">

          <table class="table table_summary" >
            <tbody>

              <tr>
                <td>
                  คำสั่งซื้อ
                </td>
                <td class="text-right">
                  #{{$order->code_gen}}
                </td>
              </tr>

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
                  Discount
                </td>
                <td class="text-right">
                  ฿{{number_format($order->discount, 2)}}
                </td>
              </tr>

              <tr>
                <td>
                  ค่าจัดส่ง
                </td>
                <td class="text-right">
                  ฿{{number_format($order->shipping_p, 2)}}
                </td>
              </tr>

              <tr>
                <td>
                  ราคาสินค้า x {{$order->total}}
                </td>
                <td class="text-right" >

                  ฿{{number_format($order->order_price, 2)}}
                </td>
              </tr>

              <tr class="total">
                <td>
                  ยอดชำระ
                </td>
                <td class="text-right">
                  ฿{{number_format($order->order_price+$order->shipping_p, 2)}}

                </td>
              </tr>

            </tbody>
          </table>

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




@stop('scripts')
