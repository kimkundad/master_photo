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
      <h2 class="major"><span>Profile & Setting </span></h2>

    </div>

    <div class="row">


      <aside class="col-md-3">
        <div class="box_style_cat">
          <ul id="cat_nav">
							<li><a href="{{url('profile')}}"><i class="icon_set_1_icon-29"></i>ข้อมูลส่วนตัว </a>
							</li>
							<li><a href="{{url('address_book')}}" id="active"><i class="icon_set_1_icon-41"></i>สมุดที่อยู่ </a>
							</li>
							<li><a href="#"><i class="im im-icon-Gift-Box" style="margin-right:10px; margin-left:5px;"></i> คูปองส่วนลด </a>
							</li>
              <li><a href="#"><i class="icon_set_1_icon-50" ></i> รายการสั่งซื้อของฉัน </a>
							</li>
              <li><a href="#"><i class="im im-icon-Coin" style="margin-right:10px; margin-left:5px;"></i> My Credit </a>
							</li>

						</ul>
        </div>
      </aside>







      <div class="col-md-9" id="single_tour_desc">
        <div class="row add_bottom_60 ">

          <div class="col-md-12">
                    <h3>สมุดที่อยู่ </h3>
                    <br />
                    <table class="table ">
                     <thead>
                       <tr>
                         <th>ชื่อ-สกุล</th>
                         <th>ที่อยู่</th>
                         <th>รหัสไปรษณีย์</th>
                         <th>เบอร์โทรศัพท์</th>
                         <th>Type</th>
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
                           ที่อยู่ในการจัดส่ง
                           @elseif(($ad->type_address == 1))
                           ที่อยู่ในการออกใบเสร็จ
                           @elseif(($ad->type_address == 2))
                           ว่าง
                           @else
                           ที่อยู่ในการจัดส่งร่วมกับ
                           ที่อยู่ในการออกใบเสร็จ
                           @endif
                         </td>
                         <td>
                          <a class="btn btn-primary btn-xs pull-left" style="margin-right:8px;" href="{{url('edit_address_book/'.$ad->id)}}" role="button">แก้ไข </a>

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
                  <a href="{{url('new_address_book/')}}" class="btn btn-submit"><i class='sl sl-icon-plus'></i> เพิ่มที่อยู่ใหม่</a>
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