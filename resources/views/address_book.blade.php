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
      <h2 class="major"><span>{{ trans('message.address') }} </span></h2>

    </div>

    <div class="row">


      <aside class="col-md-3">
        <div class="box_style_cat">
          <ul id="cat_nav">
							<li><a href="{{url('profile')}}"><i class="icon_set_1_icon-29"></i>{{ trans('message.user_pro') }} </a>
							</li>
							<li><a href="{{url('address_book')}}" id="active"><i class="icon_set_1_icon-41"></i>{{ trans('message.address') }} </a>
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
                    <h3>{{ trans('message.address') }} </h3>
                    <br />
                    <table class="table ">
                     <thead>
                       <tr>
                         <th>{{ trans('message.name_pro') }}</th>
                         <th>{{ trans('message.address_1') }}</th>
                         <th>{{ trans('message.zip_code') }}</th>
                         <th>{{ trans('message.telephone_num') }}</th>
                         <th>{{ trans('message.Address_Type') }}</th>
                         <th>

                         </th>
                       </tr>
                     </thead>
                     <tbody>
                       @if($address)
                       @foreach($address as $ad)
                       <tr>
                         <td>{{$ad->name_ad}}</td>
                         <td>{{$ad->address_ad}}</td>
                         <td>{{$ad->zip_code}}</td>
                         <td>{{$ad->phone_ad}}</td>
                         <td>
                           @if($ad->type_address == 0)
                           {{ trans('message.shipping_address') }}
                           @elseif(($ad->type_address == 1))
                           {{ trans('message.address_of_the_receipt') }}
                           @elseif(($ad->type_address == 2))
                           {{ trans('message.indeterminate') }}
                           @else
                           {{ trans('message.shipping_address_together') }}
                           @endif
                         </td>
                         <td>
                          <a class="btn btn-primary btn-xs pull-left" style="margin-right:8px;" href="{{url('edit_address_book/'.$ad->id)}}" role="button">{{ trans('message.edit') }} </a>

                      <!--    <form  action="{{url('admin/delete_user_address/')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                              <input type="hidden" name="_method" value="POST">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               <input type="hidden" name="address_id" value="{{ $ad->id }}">
                              <button type="submit" title="ลบบทความ" class="btn btn-danger btn-xs"> ลบ</button>
                          </form> -->
                         </td>
                       </tr>
                       @endforeach
                       @endif
                     </tbody>
                   </table>
                  <div class="col-md-12 text-center" >
                    <br />
                  <a href="{{url('new_address_book/')}}" class="btn btn-submit"><i class='sl sl-icon-plus'></i> {{ trans('message.add_new_add') }}</a>
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

</body>

<script>
@if ($message = Session::get('add_success'))
$.notify({
 // options
 icon: 'icon_set_1_icon-76',
 title: "<h4>เพิ่มข้อมูลที่อยู่ สำเร็จ</h4> ",
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


<script>
@if ($message = Session::get('edit_address'))
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


<script>
@if ($message = Session::get('delete'))
$.notify({
 // options
 icon: 'icon_set_1_icon-76',
 title: "<h4>ลบข้อมูล สำเร็จ</h4> ",
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

@stop('scripts')
