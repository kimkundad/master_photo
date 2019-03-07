@extends('layouts.template')

@section('title')
user profile
@stop

@section('stylesheet')
<link href="{{url('master/assets/css/admin.css')}}" rel="stylesheet">

@stop('stylesheet')
@section('content')


<main class=" slider-pro" >

  <?php
      function DateThai($strDate)
      {
      $strYear = date("Y",strtotime($strDate))+543;
      $strMonth= date("n",strtotime($strDate));
      $strDay= date("j",strtotime($strDate));
      $strHour= date("H",strtotime($strDate));
      $strMinute= date("i",strtotime($strDate));
      $strSeconds= date("s",strtotime($strDate));
      $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
      $strMonthThai=$strMonthCut[$strMonth];
      return "$strDay $strMonthThai $strYear";
      }
       ?>


  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span>{{ trans('message.pay_ment') }} </span></h2>

    </div>

    <div class="row">


      <aside class="col-md-3">
        <div class="box_style_cat">
          <ul id="cat_nav">
							<li><a href="{{url('profile')}}"><i class="icon_set_1_icon-29"></i>{{ trans('message.user_pro') }} </a>
							</li>
							<li><a href="{{url('address_book')}}"><i class="icon_set_1_icon-41"></i>{{ trans('message.address') }} </a>
							</li>
							<li><a href="#"><i class="im im-icon-Gift-Box" style="margin-right:10px; margin-left:5px;"></i> {{ trans('message.credit') }} </a>
							</li>
              <li><a href="{{url('my_order')}}" id="active"><i class="icon_set_1_icon-50" ></i> {{ trans('message.user_order') }} </a>
							</li>
              <li><a href="{{url('payment_notify')}}"><i class="im im-icon-Coin" style="margin-right:10px; margin-left:5px;"></i> {{ trans('message.pay_ment') }} </a>
							</li>

						</ul>
        </div>
      </aside>


<style>
.content-current {
    padding: 10px;
    background-color: #fff;
    border: 1px solid #e2e2e2;

    -webkit-border-bottom-right-radius: 3px;
    -webkit-border-bottom-left-radius: 3px;
    -moz-border-radius-bottomright: 3px;
    -moz-border-radius-bottomleft: 3px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}
.spanser{
      color: #e04f67;
}
ul#profile_summary li span {
    text-transform: none;
    font-weight: normal;
    position: absolute;
    left: 150px;
}
</style>




      <div class="col-md-9" id="single_tour_desc">
        <div class="row add_bottom_60 ">

          <div class="col-md-12">
                    <h4> {{ trans('message.Your_payment_options') }}</h4>
                    <br />

                </div>


                <div class="col-md-6">
                  <div class="content-current">
                    <p class="spanser"><b>{{ trans('message.Your_payment_options_2') }} #{{$order_main->code_gen}}</b></p>
                    <hr />
                    <ul id="profile_summary">
                      <li>{{ trans('message.Your_payment_options_3') }}  <span>{{$order_count}} {{ trans('message.item') }}</span>
                      </li>

                      @if(isset($order_all))
                      @foreach($order_all as $order)
                      <li> &nbsp <span>{{$order->product_name}} x {{$order->sum_image}} pcs.</span>
                      </li>
                      @endforeach
                      @endif
                      <li>{{ trans('message.delivery') }}  <span>{{$order_main->deliver_order}} </span>
                      </li>
                      <li>{{ trans('message.Paid_amount') }}  <span class="text-danger" style="font-size:15px;"><b>{{number_format($order_main->order_price+$order_main->shipping_p,2)}} {{ trans('message.baht') }}</b></span>
                      </li>

                    </ul>
                    <p style="font-size:12px;">
                      {{ trans('message.note_o_h') }}

                    </p>
                    <hr />
                    <a href="{{url('pay_order_detail/'.$order_main->code_gen)}}" class="btn_1">{{ trans('message.Payment_order') }}</a>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="content-current">
                    <p class="spanser"><b>{{ trans('message.Your_payment_options_4') }} <!--#{{$order_de->code_gen_d}}--></b></p>
                    <hr />

                    <ul id="profile_summary">
                      <li>Product  <span>{{$order_de->product_name}}</span>
                      </li>
                      <li>{{ trans('message.number_jum') }}  <span>{{$order_de->sum_image}} pcs.</span>
                      </li>
                      <li>{{ trans('message.detail') }}  <span>&nbsp</span>
                      </li>
                      @if($order_de->order_option)
                      @foreach($order_de->order_option as $k1)



                      <li>&nbsp  <span>{{$k1->item_name}}.</span>
                      </li>


                      @endforeach
                      @endif

                      @if($order_main->shipping_p == 0)
                      <li>{{ trans('message.Paid_amount') }}  <span class="text-danger" style="font-size:15px;"><b>{{number_format(($order_de->sum_price*$order_de->sum_image),2)}} {{ trans('message.baht') }}</b></span>
                      </li>
                      @else
                      <li>{{ trans('message.Paid_amount') }}  <span class="text-danger" style="font-size:15px;"><b>{{number_format(($order_de->sum_price*$order_de->sum_image)+$order_de->sum_shipping,2)}} บาท</b></span>
                      </li>
                      @endif


                    </ul>
                    <p style="font-size:12px;">
                      {{ trans('message.note_o_h') }}
                    </p>
                    <hr />
                    <a href="{{url('pay_order_detail/'.$order_de->code_gen_d)}}" class="btn_1">{{ trans('message.Payment_order') }}</a>
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

<script src="{{url('master/assets/js/tabs.js')}}"></script>
<script>
    new CBPFWTabs(document.getElementById('tabs'));
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
