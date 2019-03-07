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
      <h2 class="major"><span>{{ trans('message.user_order') }} </span></h2>

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







      <div class="col-md-9" id="single_tour_desc">
        <div class="row add_bottom_60 ">

          <div class="col-md-12">
                    <h3>#Oder ID {{$order_main->code_gen}}</h3>

                    <p>
                    {{ trans('message.pro_name') }} : {{$order_de->product_name}}<br />

                    {{ trans('message.total_sum') }} : {{$order_de->sum_image}} รูป<br />
                    {{ trans('message.shipping_address') }} : {{$objs->deliver_order}} ,@if($objs->deliver_order != null) {{$objs->shipping_t2}} @else @endif<br />
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.Requesting_a_tax_invoice') }}</label>

                      @if( $objs->bil_req == 0)
                      {{ trans('message.Don_ask') }}
                      @endif

                      @if( $objs->bil_req == 1)
                      {{ trans('message.Request_tax_invoice') }}
                      @endif

                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.Choose_to_send_a_tax_invoice') }}</label>

                      @if( $objs->text_re_user == 1)
                      {{ trans('message.Use_shipping_address') }}
                      @endif

                      @if( $objs->text_re_user == 2)
                      {{ trans('message.Use_the_address_that') }}
                      @endif


                    </div>
                    <br />
                    <b>{{ trans('message.Shipping_address_1') }}</b><br />
                    <hr />
                    <fieldset>
                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.name_pro') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name_cat" value="{{$get_address->name_ad}}">
                          </div>
                      </div>


                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.telephone_num') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name_cat" value="{{$get_address->phone_ad}}">
                          </div>
                      </div>


                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.address_1') }}</label>
                        <div class="col-md-8">
                          <textarea class="form-control" name="pro_name_detail" rows="6">{{ $get_address->address_ad }}</textarea>
                          </div>
                      </div>



                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.province') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name_cat" value="{{$province->PROVINCE_NAME}}">
                          </div>
                      </div>


                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.District') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name_cat" value="{{$district->AMPHUR_NAME}}">
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.Subdistrict') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name_cat" value="{{$subdistricts->DISTRICT_NAME}}">
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.zip_code') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name_cat" value="{{$get_address->zip_code}}">
                          </div>
                      </div>

                      </fieldset>
                      <hr />



                      <br />
                      <b>{{ trans('message.Use_the_address_that') }}</b><br />
                      <hr />


                      @if($get_address_bill != null)



                      <fieldset>
                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.name_pro') }}</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="name_cat" value="{{$get_address_bill->name_ad}}">
                            </div>
                        </div>


                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.telephone_num') }}</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="name_cat" value="{{$get_address_bill->phone_ad}}">
                            </div>
                        </div>


                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.address_1') }}</label>
                          <div class="col-md-8">
                            <textarea class="form-control" name="pro_name_detail" rows="6">{{ $get_address_bill->address_ad }}</textarea>
                            </div>
                        </div>



                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.province') }}</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="name_cat" value="{{$province_bill->PROVINCE_NAME}}">
                            </div>
                        </div>


                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.District') }}</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="name_cat" value="{{$district_bill->AMPHUR_NAME}}">
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.Subdistrict') }}</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="name_cat" value="{{$subdistricts_bill->DISTRICT_NAME}}">
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.zip_code') }}</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="name_cat" value="{{$get_address_bill->zip_code}}">
                            </div>
                        </div>

                        </fieldset>


                      @endif


                    <b>Option</b><br />
                    @if($order_de->order_option)
                    @foreach($order_de->order_option as $k1)


                    {{$k1->item_name}} <br />



                    @endforeach
                    @endif


                    </p>
                    <hr />

                    @if($order_de->order_images)
                    @foreach($order_de->order_images as $h)
                    <div class="col-lg-4 col-md-6" style=" padding-top: 10px;   padding-bottom: 10px;">
                      <img src="{{url('assets/image/all_image/'.$h->order_image)}}" class="img-responsive" style="    height: 142px;">
                      <div class="score">
												{{ trans('message.total_sum') }} <span>{{$h->order_image_sum}}</span> {{ trans('message.item') }}
											</div>
                    </div>
                    @endforeach
                    @endif



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
