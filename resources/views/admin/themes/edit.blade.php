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

											<h4 class="mb-xlg">ใส่ข้อมูลธนาคาร</h4>

											<fieldset>
                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ชื่อ Themes*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="themepro_name" value="{{ $objs->themepro_name }}" >
													</div>
												</div>
                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">เลือกสินค้า*</label>

                          <div class="col-md-8">
                            <select name="pro_id" class="form-control mb-md" required>

                              <option value="">-- เลือกสินค้า --</option>
                                @foreach($category as $categorys)
                                   <option value="{{$categorys->id}}" @if( $objs->pro_id == $categorys->id)
                                   selected='selected'
                                   @endif>{{$categorys->pro_name}}</option>
                                @endforeach
                            </select>
                            </select>
                          </div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">รายละเอียด Themes*</label>
													<div class="col-md-8">
														<textarea class="form-control" name="themepro_detail" rows="3" >{{ $objs->themepro_detail }}</textarea>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName">ราคา Themes*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="themepros_price" value="{{ $objs->themepros_price }}" >
													</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName">รูป Themes*</label>
													<div class="col-md-8">
														<img src="{{url('assets/image/themepro_image/'.$objs->themepro_image)}}" style="width:350px;" class="img-thumbnail"/>
													</div>
												</div>


                        <div class="form-group">
                          <label class="col-md-3 control-label" for="exampleInputEmail1">รูป Themes*</label>
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
														<button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
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
