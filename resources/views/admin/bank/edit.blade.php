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
							<div class="col-md-4 col-lg-2">



							</div>







              <div class="col-md-8 col-lg-8">

							<div class="tabs">

								<div class="tab-content">

									<div id="edit" class="tab-pane active">

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

										<form class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
                      {{ method_field($method) }}
											{{ csrf_field() }}

											<h4 class="mb-xlg">แก้ไขข้อมูลธนาคาร</h4>

											<fieldset>
                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ชื่อธนาคาร*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="name_bank" value="{{ $objs->name_bank }}" id="profileFirstName">
													</div>
												</div>
                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ชื่อบัญชี*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="name_b" value="{{ $objs->name_b }}" id="profileFirstName">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">เลขที่บัญชี*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="name_no_b" value="{{ $objs->name_no_b }}" id="profileFirstName">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName">สาขา*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="major_name_b" value="{{ $objs->major_name_b }}" id="profileLastName">
													</div>
												</div>


                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName">รูป ธนาคาร</label>
													<div class="col-md-8">
														<img src="{{url('assets/images/bank/'.$objs->bank_img)}}" class="img-responsive" style="height:80px;">
													</div>
												</div>


                        <div class="form-group">
                          <label class="col-md-3 control-label" for="exampleInputEmail1">เปลี่ยนรูป ธนาคาร*</label>
                          <div class="col-md-8">
                          <div class="fileupload fileupload-new" data-provides="fileupload">
        														<div class="input-append">
        															<div class="uneditable-input">
        																<i class="fa fa-file fileupload-exists"></i>
        																<span class="fileupload-preview"></span>
        															</div>
        															<span class="btn btn-default btn-file">
        																<span class="fileupload-exists">Change</span>
        																<span class="fileupload-new">Select file</span>
        																<input type="file" name="image">
        															</span>
        															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
        														</div>
        													</div>
                                  </div>
                        </div>



											</fieldset>







											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">แก้ไข</button>
														<a href="{{url('admin/bank')}}" class="btn btn-default">ยกเลิก</a>
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



@if ($message = Session::get('success_edit'))
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
