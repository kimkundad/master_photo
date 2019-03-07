@extends('layouts.template')

@section('title')
user profile
@stop

@section('stylesheet')
<link href="{{url('master/assets/css/admin.css')}}" rel="stylesheet">

@stop('stylesheet')
@section('content')


<main class=" slider-pro" >




  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span>{{ trans('message.user_pro') }} </span></h2>

    </div>

    <div class="row">


      <aside class="col-md-3">
        <div class="box_style_cat">
          <ul id="cat_nav">
							<li><a href="{{url('profile')}}" id="active"><i class="icon_set_1_icon-29"></i>{{ trans('message.user_pro') }} </a>
							</li>
							<li><a href="{{url('address_book')}}"><i class="icon_set_1_icon-41"></i>{{ trans('message.address') }} </a>
							</li>
							<li><a href="#"><i class="im im-icon-Gift-Box" style="margin-right:10px; margin-left:5px;"></i> {{ trans('message.credit') }} </a>
							</li>
              <li><a href="{{url('my_order')}}"><i class="icon_set_1_icon-50" ></i> {{ trans('message.user_order') }} </a>
							</li>
              <li><a href="{{url('payment_notify')}}"><i class="im im-icon-Coin" style="margin-right:10px; margin-left:5px;"></i> {{ trans('message.pay_ment') }} </a>
							</li>

						</ul>
        </div>
      </aside>







      <div class="col-md-9" id="single_tour_desc">
        <div class="row add_bottom_60 ">

          <div class="col-md-12">
                    <h3>{{ trans('message.user_pro') }} </h3>
                    <br />




                    <form class="form-horizontal" action="{{url('post_edit_profile')}}" method="post" enctype="multipart/form-data">

											{{ csrf_field() }}

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">{{ trans('message.name_pro') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name" value="{{ $objs->name }}" >
                          <input type="hidden" class="form-control" name="user_id" value="{{ $objs->id }}" >
                            <br />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileCompany">{{ trans('message.email_pro') }}</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="email" value="{{ $objs->email }}"  >
                          <br />
                          @if ($message = Session::get('error'))
                          <p class="text-danger">
                            <b>Email ที่ท่านต้องการเปลี่ยน นี้มีผู้ใช้แล้ว</b>
                          </p>
                          @endif

                        </div>
                      </div>


                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileCompany">{{ trans('message.telephone_num') }}</label>
                        <div class="col-md-8">
                          <input type="number" class="form-control" name="phone" value="{{ $objs->phone }}"  >
                          <br />
                        </div>
                      </div>


                  <!--    <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">เลขประจำตัวผู้เสียภาษี</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="id_card_no" value="{{ $objs->id_card_no }}" >
                          <br />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">รหัสสาขา</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="branch_code" value="{{ $objs->branch_code }}" >
                          <br />
                        </div>
                      </div> -->

                    <div class="col-md-12 text-center" >

                    <button type="submit" class="btn btn-next">{{ trans('message.btn_submit_pro_save') }}</button>
                    <a href="{{url('profile')}}" class="btn btn-default">{{ trans('message.btn_cancel') }}</a>
                  </div>
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

<script src="{{url('master/assets/js/tabs.js')}}"></script>
<script>
    new CBPFWTabs(document.getElementById('tabs'));
  </script>

</body>








@stop('scripts')
