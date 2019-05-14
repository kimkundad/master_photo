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







              <d<div class="col-md-8">

							<div class="tabs">

								<div class="tab-content">

									<div id="edit" class="tab-pane active">

										<form class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
                      {{ method_field($method) }}
											{{ csrf_field() }}

											<h4 class="mb-xlg">แก้ไขข้อมูลส่วนตัว</h4>
                      @if (count($errors) > 0)
                      <br>
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif

                      @if ($message = Session::get('error'))
                      <div class="alert alert-danger">
    										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    										<strong>เสียใจด้วย!</strong> Email ของท่านมีผู้ใช้ไปแล้ว
    									</div>
                      @endif


											<fieldset>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ชื่อ-นามสกุล</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="name" value="{{ $objs->name }}" >
													</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">อีเมล์</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="email" value="{{ $objs->email }}"  >
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">เบอร์โทรศัพท์มือถือ</label>
													<div class="col-md-8">
														<input type="number" class="form-control" name="phone" value="{{ $objs->phone }}"  >
													</div>
												</div>


                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">รหัสพนักงาน</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="id_card_no" value="{{ $objs->id_card_no }}" >
													</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">สาขา</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="branch_code" value="{{ $objs->branch_code }}" >
													</div>
												</div>



											</fieldset>





											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
														<a href="{{url('admin/user/'.$objs->id)}}" class="btn btn-default">ยกเลิก</a>
													</div>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
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

@stop('scripts')
