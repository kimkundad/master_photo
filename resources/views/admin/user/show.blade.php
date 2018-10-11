@extends('admin.layouts.template')
@section('admin.content')






				<section role="main" class="content-body">

					<header class="page-header">
						<h2>{{$header}}</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.html">
										<i class="fa fa-home"></i>
									</a>
								</li>

								<li><span>{{$header}}</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>


					<!-- start: page -->




							<div class="row">
							<div class="col-md-2">


                <section class="panel">
								<div class="panel-body">
									<div class="thumb-info mb-md">
                    @if($objs->avatar != NULL && $objs->provider == "email")
										<img src="{{url('assets/images/avatar/'.$objs->avatar)}}" class="rounded img-responsive" alt="{{$objs->name}}">
										@elseif ($objs->provider == 'facebook')
										<img src="{{$objs->avatar}}" class="rounded img-responsive" alt="{{$objs->name}}">
                    @else
                    <img src="{{url('assets/images/avatar/blank_avatar_240x240.gif')}}" class="rounded img-responsive" alt="{{$objs->name}}">
                    @endif

									</div>







								</div>
							</section>

							</div>







              <div class="col-md-10">

							<div class="tabs">

								<div class="tab-content">

									<div id="edit" class="tab-pane active">



											<h4 class="mb-xlg">จัดการกับบัญชีของฉัน</h4>

                      <table class="table ">
                        <tbody>


                          <tr>
                            <td>ชื่อ-สกุล</td><td>{{$objs->name}}</td>
                          </tr>
                          <tr>
                            <td>อีเมล์</td><td>{{$objs->email}}</td>
                            </tr>

                            <tr>
                            <td>เบอร์โทรศัพท์มือถือ</td><td>{{$objs->phone}}</td>
                            </tr>

                            <tr>
                            <td>เลขประจำตัวผู้เสียภาษี</td>
                            <td>
                              @if($objs->id_card_no == null)

                              <span class="text-muted">กรุณาระบุเลขประจำตัวผู้เสียภาษี</span>

                              @else

                              {{$objs->id_card_no}}

                              @endif

                            </td>
                            </tr>


                            <tr>
                            <td>รหัสสาขา</td>
                            <td>
                              @if($objs->branch_code == null)

                              <span class="text-muted">กรุณาระบุรหัสสาขา</span>

                              @else

                              {{$objs->branch_code}}

                              @endif

                            </td>
                            </tr>



                        </tbody>
                      </table>
                      <hr><a type="button" href="{{url('admin/user/'.$objs->id.'/edit')}}" class="btn btn-default">แก้ไขข้อมูลส่วนตัว</a>


									</div>
								</div>
							</div>






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


						</div>




            <div class="col-md-12">



              <div class="tabs">

               <div class="tab-content">

                 <div id="edit" class="tab-pane active">



                     <h4 class="mb-xlg" style="margin-bottom: 10px !important;">สมุดที่อยู่ </h4>



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
                              @if($ad->phone_ad == 0)
                              Shipping Adress
                              @else
                              Billing Address
                              @endif
                            </td>
                            <td>
                             <a class="btn btn-primary btn-xs pull-left" style="margin-right:8px;" href="{{url('admin/edit_user_address/'.$ad->id)}}" role="button">แก้ไข </a>

														 <form  action="{{url('admin/delete_user_address/')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
	                               <input type="hidden" name="_method" value="POST">
	                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
																	<input type="hidden" name="address_id" value="{{ $ad->id }}">
																	<input type="hidden" name="user_id" value="{{ $objs->id }}">
	                               <button type="submit" title="ลบบทความ" class="btn btn-danger btn-xs"> ลบ</button>
	                           </form>
                            </td>
                          </tr>
                          @endforeach
                          @endif
                        </tbody>
                      </table>

                      <br />
                      <a class="btn btn-warning pull-right" href="{{url('admin/new_user_address/'.$objs->id)}}" >
                        + เพิ่มที่อยู่ใหม่</a>
                      <br />
                      <br />

                 </div>
               </div>
             </div>


						 <h4 class="mb-xlg" style="margin-bottom: 10px !important;">รายการสั่งซื้อ</h4>

						 @if($order)
						 @foreach($order as $orders)

             <div class="tabs" style="margin-bottom: 15px;">

               <div class="tab-content">

                 <div id="edit" class="tab-pane active">
									 <h5 class="mb-xlg" style="margin-bottom: 10px !important;"><b>คำสั่งซื้อ</b> #{{$orders->id}}</h5>
									 <p>
										 สั่งซื้อวันที่ {{$orders->created_at}}
									 </p>
									 <hr />

                 </div>
               </div>
             </div>

						 @endforeach
						 @endif



						 <br /><br /><br /><br /><br /><br />
            </div>











						</div>

</section>
@stop

@section('scripts')


<script>
$.fn.datepicker.defaults.format = "yyyy-mm-dd";
$('.datepicker').datepicker({
});
</script>

@if ($message = Session::get('edit_success'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการแก้ไขข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif


@if ($message = Session::get('add_address'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการเพิ่มข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif

@if ($message = Session::get('delete'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการลบข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif




@stop('scripts')
