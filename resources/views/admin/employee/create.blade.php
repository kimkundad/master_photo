@extends('admin.layouts.template')





@section('admin.content')






        <section role="main" class="content-body">

          <header class="page-header">
            <h2>{{$datahead}}</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="{{url('admin/dashboard')}}">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span>{{$datahead}}</span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>


          <!-- start: page -->



          <div class="row">
          							<div class="col-md-2 col-lg-2">




          							</div>







                        <div class="col-md-8 col-lg-8">

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}


                                <h4 >สร้างรายชื่อพนักงานใหม่</h4>
                                <p class="text-muted">
                                  ช่องกรอกข้อมูลที่มี (<span class="text-danger"> * </span>) จำเป็นต้องกรอกข้อมูลลงไป
                                </p>
                                  <br />

                                  @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                <fieldset>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อ-นามสกุล</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name" value="{{ old('name') }}" >
          													</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileCompany">อีเมล์</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="email" value="{{ old('email') }}"  >
          													</div>
          												</div>


          												<div class="form-group">
          													<label class="col-md-3 control-label" for="profileCompany">เบอร์โทรศัพท์มือถือ</label>
          													<div class="col-md-8">
          														<input type="number" class="form-control" name="phone" value="{{ old('phone') }}"  >
          													</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">รหัสพนักงาน</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="id_card_no" value="{{ old('id_card_no') }}" >
          													</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">สาขา</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="branch_code" value="{{ old('branch_code') }}" >
          													</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">Password</label>
          													<div class="col-md-8">
          														<input type="Password" class="form-control" name="password" value="{{ old('Password') }}" placeholder="ใส่พาสเวิร์ด 6 ตัว">
          													</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">Confirm Password</label>
          													<div class="col-md-8">
          														<input type="Password" class="form-control" name="password_confirmation" placeholder="ใส่พาสเวิร์ด 6 ตัว">
          													</div>
          												</div>



          											</fieldset>







          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-10 col-md-offset-4">
          														<button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
          														<a href="{{url('admin/sub_category')}}" class="btn btn-default">ยกเลิก</a>
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



@stop('scripts')
