@extends('layouts.template')

@section('title')
user profile
@stop

@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{url('assets/datetimepicker-master/jquery.datetimepicker.css')}}"/>
<link href="{{url('master/assets/css/admin.css')}}" rel="stylesheet">

@stop('stylesheet')
@section('content')


<main class=" slider-pro" >




  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span>{{ trans('message.pay_ment') }} </span></h2>

    </div>

    <div class="row">


      <aside class="col-md-3">
        <div class="box_style_cat">
          <ul id="cat_nav">
							<li><a href="{{url('profile')}}" ><i class="icon_set_1_icon-29"></i>{{ trans('message.user_pro') }} </a>
							</li>
							<li><a href="{{url('address_book')}}"><i class="icon_set_1_icon-41"></i>{{ trans('message.address') }} </a>
							</li>
							<li><a href="#"><i class="im im-icon-Gift-Box" style="margin-right:10px; margin-left:5px;"></i> {{ trans('message.credit') }} </a>
							</li>
              <li><a href="{{url('my_order')}}"><i class="icon_set_1_icon-50" ></i> {{ trans('message.user_order') }} </a>
							</li>
              <li><a href="{{url('payment_notify')}}" id="active"><i class="im im-icon-Coin" style="margin-right:10px; margin-left:5px;"></i> {{ trans('message.pay_ment') }} </a>
							</li>

						</ul>
        </div>
      </aside>


<style>
.strip_booking h3.hotel_booking:before {
    content: '\52';
}
.btn_4{
    border: none;
    font-family: inherit;
    font-size: inherit;
    color: #fff;
    background: #a94442;
    cursor: pointer;
    padding: 7px 8px;
    font-size: 11px;
    line-height: 9px;
    display: block;
    outline: none;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    text-align: center;
}
.btn_4:hover{
	background: #333;
	color:#fff;
}
</style>




      <div class="col-md-9" id="single_tour_desc">
        <div class="row add_bottom_60 ">

          <div class="col-md-12">
                    <h3>{{ trans('message.pay_ment') }} <i class="text-muted icon-right-dir"></i> <span class="text-muted" style="font-size:16px;">เลือกช่องทางกระชำระเงิน</span></h3>
                    <br />

                    <div class="form_title">
                      <h3><strong>1</strong>โอนเงินผ่านธนาคาร</h3>
                      <p>
                        สามารถชำระเงินได้โดยผ่านทางธนาคาร จากนั้นกรุณาแจ้งการชำระเงินผ่านทาง Website ในหน้า account ของท่าน
                      </p>
                    </div>

                    <div class="step">
                      <a href="{{url('pay_order_detail/'.$id)}}" style="padding: 6px 12px; font-size:15px;" class="btn btn-next">แจ้งชำระเงิน โอนเงินผ่านธนาคาร</a>
                    </div>

                    <div class="form_title">
                      <h3><strong>2</strong>ชำระผ่านบัตรเครดิต</h3>
                      <p>
                        ทุกธุรกรรมผ่านบัตรเครดิตและบัตรเดบิตได้รับการรับรองความปลอดภัย ด้วยเทคโนโลยี 2c2p Payment gateway
                      </p>

                    </div>


                    <div class="hidden">
                      <?php
                      function twelvedigits($a){
                          $a = number_format($a, 2, '', '');
                           printf("%012s\n", $a);
                      }
                      $money_var = $order->order_price+$order->shipping_p;
                      $amount = twelvedigits($money_var);
                      $s_number = '';

                      $s_number = sprintf('%012s',number_format($money_var, 2, '', ''));

                       ?>
                    </div>

                    <?php





                    //Merchant's account information
                    $merchant_id = "JT04";			//Get MerchantID when opening account with 2C2P
                    $secret_key = "QnmrnH6QE23N";	//Get SecretKey from 2C2P PGW Dashboard


                    //Transaction information
                    $payment_description  = $order->code_gen;

                    $ram = rand(10,20);
                    //Transaction information

                    $new_oreder_id = str_pad($order->id,$ram,"0",STR_PAD_LEFT);


                    $order_id  = $new_oreder_id;
                    $currency = "764";


                    //Request information
                    $version = "8.5";
                    $payment_url = "https://demo2.2c2p.com/2C2PFrontEnd/RedirectV3/payment";
                    $result_url_1 = url('/api/result_payment');

                    //Construct signature string
                  	$params = $version.$merchant_id.$payment_description.$order_id.$currency.$s_number.$result_url_1;
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

                      <div class="form-group hidden">
                        <label>AMOUNT</label>
                      <input type="text" name="amount" class="form-control" value="{{twelvedigits($money_var)}}" readonly/>
                      </div>

                      <div class="form-group">
                        <label>AMOUNT</label>
                      <input type="text" name="" class="form-control" value="{{number_format($order->order_price+$order->shipping_p, 2)}}" readonly/>
                      </div>

                      <button type="submit" class="btn btn-next">ยืนยันชำระเงิน 2c2p Payment </button>
                  	</form>




                </div>


                <div class="form_title">
                  <h3><strong>3</strong>ชำระผ่าน Paypal</h3>
                  <p>
                   Paypal ธนาคารออนไลน์ ทำหน้าที่เปนตัวกลาง คอยรับ-ส่งเงินออนไลน์จากผู้ใช้ทั่วโลก
                  </p>

                </div>


                <div class="step">
                  <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="{{url('paypal')}}">
                      {{ csrf_field() }}



                      <div class="col-md-4">
                        <div class="form-group">
                      <input type="text" name="amount" value="{{number_format($order->order_price+$order->shipping_p, 2)}}" class="form-control">
                      </div>
                    </div>
                      <p>
                        <button type="submit" class="btn " style="border:none; padding:0; margin-top:-5px; background: #fff;">
                        <img src="https://www.paypalobjects.com/webstatic/en_AU/i/buttons/btn_paywith_primary_l.png" alt="ชำระด้วย PayPal" />
                        </button>
                      </p>
                    </form>
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
<script src="{{url('assets/datetimepicker-master/build/jquery.datetimepicker.full.js')}}"></script>



<script type="text/javascript">

    jQuery(document).ready(function () {
        'use strict';

        jQuery('#filter-date, #search-from-date, #search-to-date').datetimepicker({
          timepicker:false,
 format:'d/m/Y'
        });

        jQuery('#datetimepicker2').datetimepicker({
          allowTimes:[
          '22:00', '22:30', '23:00', '23:30', '24:00', '24:30',
          '01:00', '01:30', '02:00', '02:30', '03:00', '03:30', '04:00', '04:30', '05:00', '05:30', '06:00', '06:30',
          '07:00', '07:30', '08:00', '08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30',
          '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30',
          '19:00', '19:30', '20:00', '20:30', '21:00'
        ],
  datepicker:false,
  format:'H:i'
});




    });
</script>


  <script>
  @if ($message = Session::get('edit_success'))
  $.notify({
   // options
   icon: 'icon_set_1_icon-76',
   title: "<h4>อัพเดท สำเร็จ</h4> ",
   message: "ข้อมูลที่ถูกต้องทำให้การติดต่อได้ไม่ผิดพลาด. "
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
  @endif
  </script>

</body>

@stop('scripts')
