@extends('admin.layouts.template')


<meta name="csrf-token" content="{{ csrf_token() }}" />



@section('admin.content')



<style>
.card-body {
    background: #fdfdfd;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    border-radius: 5px;
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
    margin-top: 10px;
}
.t-r-10{
  margin-left: 8px;
}
</style>


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

                          <div class="wizard-progress wizard-progress-lg">
                            <div class="steps-progress">
    												<div class="progress-indicator" style="width: 66%;"></div>
    											</div>
      											<ul class="nav wizard-steps">
      												<li class="nav-item active completed">
      													<a class="nav-link"  data-toggle="tab"><span>1</span>ข้อมูลสินค้า</a>
      												</li>
      												<li class="nav-item active completed">
      													<a class="nav-link"  data-toggle="tab"><span>2</span>รูปประกอบ</a>
      												</li>
      												<li class="nav-item active">
      													<a class="nav-link" data-toggle="tab"><span>3</span>ออฟชั่นสินค้า</a>
      												</li>
      												<li class="nav-item">
      													<a class="nav-link" data-toggle="tab"><span>4</span>ราคาจัดส่ง</a>
      												</li>
      											</ul>
      										</div>


        <div class="row">
          <div class="col-md-4">

            <a class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal_optionx_1">
                <i class="fa fa-plus"></i> เพิ่ม Option</a>


                <div class="modal fade" id="myModal_optionx_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document" >
                    <div class="modal-content ">



                    <form  method="POST" action="{{url('admin/add_product_option_sub')}}" name="add_product_option_sub" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="modal-body">


                          <h4 class="mb-xlg text-center">เพิ่มหัวข้อของ Option</h4>
                          <fieldset>
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileFirstName">ชื่อ option*</label>
                              <div class="col-md-8">
                                <input type="text" class="form-control" name="option_name" value="{{ old('option_name')}}">

                                <input type="hidden" class="form-control" name="product_id" value="{{$product_id}}">
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileFirstName">รายละเอียด</label>
                              <div class="col-md-8">
                                <textarea class="form-control" name="option_detail" rows="6">{{ old('option_detail') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="col-md-3 control-label" for="exampleInputEmail1">รายละเอียด แบบรูปภาพ</label>
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
                                            <input type="file" name="image_main">
                                          </span>
                                          <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                      </div>
                                      </div>
                            </div>

                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileAddress">รูปแบบการแสดงผล*</label>
                              <div class="col-md-8">
                                <select name="option_type" class="form-control mb-md" required>

                                 <option value="1"> แสดงแบบข้อความ </option>
                                 <option value="2"> แสดง รูปและข้อความ </option>
                                </select>
                              </div>
                            </div>


                          </fieldset>


                      </div>

                      <div class="panel-footer">
                        <div class="row">
                          <div class="col-md-9 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                            <button data-dismiss="modal" class="btn btn-default">ยกเลิก</button>
                          </div>
                        </div>
                      </div>
                      </form>

                    </div>
                  </div>
                </div>

          </div>

          <div class="col-md-4">


                <a class="btn btn-info btn-block" href="{{url('admin/product/'.$product_id.'/edit')}}">
                    <i class="fa fa-cube"></i> กลับไปข้อมูลสินค้า</a>
          </div>

          <div class="col-md-4">


                <a class="btn btn-warning btn-block" href="{{url('admin/product_price/'.$product_id)}}">
                    <i class="fa fa-share"></i> ราคาค่าจัดส่ง</a>
          </div>

          <div class="col-md-12">
            <hr />
            </div>


          @if(isset($get_option_main))
          @foreach($get_option_main as $u)
          <div class="col-md-6">

            <section class="card">
                <div class="card-body ">
                  <h5>{{$u->options_detail->option_name}} </h5>
                  <ol >
                    @foreach($u->options_detail->opt as $item_2)
										<li>{{$item_2->item_name}} ( ราคา {{$item_2->item_price}} บาท )
                      <!-- Start Edit only item -->
                      <a class="text-muted t-r-10" href="#" data-toggle="modal" data-target="#edit_item_{{$item_2->id_item}}"><i class="fa fa-gear" aria-hidden="true"></i></a>
                      <div class="modal fade" id="edit_item_{{$item_2->id_item}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document" >
                          <div class="modal-content ">



                          <form  method="POST" action="{{url('admin/edit_item_only/'.$item_2->id_item)}}" name="edit_item_only{{$item_2->id_item}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body">


                                <h4 class="mb-xlg text-center">แก้ไขข้อมูลย่อยของ {{$u->options_detail->option_name}}</h4>
                                <fieldset>

                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileFirstName">item name*</label>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="item_name" value="{{$item_2->item_name}}">
                                      <input type="hidden" class="form-control" name="option_id" value="{{ $u->option_set_id }}">
                                      <input type="hidden" class="form-control" name="product_id" value="{{$product_id}}">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileFirstName">item price*</label>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="item_price" value="{{$item_2->item_price}}">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileFirstName">resolution ของรูป (ถ้ามี)</label>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="resolution" value="{{$item_2->resolution}}">
                                      </div>
                                  </div>

                                  @if($u->options_detail->option_type == 2)
                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="exampleInputEmail1">item image*</label>
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
                                                  <input type="file" name="image_main">
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                              </div>
                                            </div>
                                            </div>
                                  </div>
                                  @endif

                                  @if($u->options_detail->option_title != null)
                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileFirstName">รายละเอียดแบบรูป</label>
                                    <div class="col-md-8">
                                      <img src="{{url('assets/image/option/'.$item_2->item_image)}}" class="img-responsive "  />
                                      </div>
                                  </div>
                                  @endif

                                </fieldset>
                            </div>
                            <div class="panel-footer">
                              <div class="row">
                                <div class="col-md-9 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                                  <button data-dismiss="modal" class="btn btn-default">ยกเลิก</button>
                                </div>
                              </div>
                            </div>
                            </form>

                          </div>
                        </div>
                      </div>
                      <!-- End Edit only item  -->


                      <!-- Start Delete only item -->

                      <a class="text-danger t-r-10" href="#" data-toggle="modal" data-target="#del_item_{{$item_2->id_item}}"><i class="fa fa-times" aria-hidden="true"></i></a>

                      <div class="modal fade" id="del_item_{{$item_2->id_item}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document" >
                          <div class="modal-content ">



                          <form  method="POST" action="{{url('admin/del_item_on/'.$item_2->id_item)}}" name="edit_option_product_item_inpro{{$item_2->id_item}}">
                            {{ csrf_field() }}
                            <div class="modal-body">


                                <h4 class="mb-xlg text-center">คุณแน่ใจใช่ไหม? ที่จะลบ {{$item_2->item_name}} ( ราคา {{$item_2->item_price}} บาท ) นี้ออกไป</h4>
                                <fieldset>
                                  <div class="form-group">

                                    <div class="col-md-8">

                                      <input type="hidden" class="form-control" name="product_id" value="{{$product_id}}">
                                      </div>
                                  </div>



                                </fieldset>


                            </div>
                            <div class="panel-footer">
                              <div class="row">
                                <div class="col-md-9 col-md-offset-4">
                                  <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                                  <button data-dismiss="modal" class="btn btn-default">ยกเลิก</button>
                                </div>
                              </div>
                            </div>
                            </form>

                          </div>
                        </div>
                      </div>

                      <!-- End Delete only item  -->
                    </li>
                      @endforeach
									</ol>

                  <!-- Start ADD Option item -->
                  <a class="mb-1 mt-1 mr-1 btn-xs btn btn-info" data-toggle="modal" data-target="#myModal_optionx_{{$u->option_set_id}}" style="margin-top:10px;" title="เพิ่มตัวเลือกเข้าไป"><i class="fa fa-plus"></i> </a>
                  <div class="modal fade" id="myModal_optionx_{{$u->option_set_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" >
                      <div class="modal-content ">



                      <form  method="POST" action="{{url('admin/add_option_product_item_inpro')}}" name="add_option_product_item_inpro{{$u->option_set_id}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">


                            <h4 class="mb-xlg text-center">เพิ่ม item ของ Option </h4>
                            <fieldset>

                              <div class="form-group">
                                <label class="col-md-3 control-label" for="profileFirstName">item name*</label>
                                <div class="col-md-8">
                                  <input type="text" class="form-control" name="item_name" value="{{ old('item_name')}}">
                                  <input type="hidden" class="form-control" name="option_id" value="{{ $u->option_set_id }}">
                                  <input type="hidden" class="form-control" name="product_id" value="{{$product_id}}">
                                  </div>
                              </div>

                              <div class="form-group">
                                <label class="col-md-3 control-label" for="profileFirstName">item price*</label>
                                <div class="col-md-8">
                                  <input type="text" class="form-control" value="0" name="item_price" value="{{ old('item_price')}}">
                                  </div>
                              </div>

                              <div class="form-group">
                                <label class="col-md-3 control-label" for="profileFirstName">resolution ของรูป (ถ้ามี)</label>
                                <div class="col-md-8">
                                  <input type="text" class="form-control" name="resolution" value="0">
                                  </div>
                              </div>

                              @if($u->options_detail->option_type == 2)
                              <div class="form-group">
                                <label class="col-md-3 control-label" for="exampleInputEmail1">item image*</label>
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
                                              <input type="file" name="image_main">
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                          </div>
                                        </div>
                                        </div>
                              </div>
                              @endif


                            </fieldset>
                        </div>
                        <div class="panel-footer">
                          <div class="row">
                            <div class="col-md-9 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                              <button data-dismiss="modal" class="btn btn-default">ยกเลิก</button>
                            </div>
                          </div>
                        </div>
                        </form>

                      </div>
                    </div>
                  </div>
                  <!-- End ADD Option item -->


                  <!-- Start Edit Option item -->

                  <a class="mb-1 mt-1 mr-1 btn-xs btn btn-warning" data-toggle="modal" data-target="#edit_optionx_{{$u->option_set_id}}" style="margin-top:10px;" title="ลบ Option นี้"><i class="fa fa-gear"></i> </a>
                  <div class="modal fade" id="edit_optionx_{{$u->option_set_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" >
                      <div class="modal-content ">



                      <form  method="POST" action="{{url('admin/edit_option_product_item_inpro/')}}" name="edit_option_product_item_inpro{{$u->option_set_id}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">


                            <h4 class="mb-xlg text-center">แก้ไข หัวข้อของ {{$u->options_detail->option_name}}</h4>
                            <fieldset>
                              <div class="form-group">
                                <label class="col-md-3 control-label" for="profileFirstName">ชื่อ option*</label>
                                <div class="col-md-8">
                                  <input type="text" class="form-control" name="option_name" value="{{$u->options_detail->option_name}}">

                                  <input type="hidden" class="form-control" name="option_id" value="{{ $u->option_set_id }}">
                                  <input type="hidden" class="form-control" name="product_id" value="{{$product_id}}">
                                  </div>
                              </div>

                              <div class="form-group">
                                <label class="col-md-3 control-label" for="profileFirstName">รายละเอียด</label>
                                <div class="col-md-8">
                                  <textarea class="form-control" name="option_detail" rows="6">{{$u->options_detail->option_detail}}</textarea>
                                  </div>
                              </div>

                              @if($u->options_detail->option_title != null)
                              <div class="form-group">
                                <label class="col-md-3 control-label" for="profileFirstName">รายละเอียดแบบรูป</label>
                                <div class="col-md-8">
                                  <img src="{{url('assets/image/product/'.$u->options_detail->option_title)}}" class="img-responsive "  />
                                  </div>
                              </div>
                              @endif


                              <div class="form-group">
                                <label class="col-md-3 control-label" for="exampleInputEmail1">รายละเอียด แบบรูปภาพ</label>
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
                                              <input type="file" name="image_main">
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                          </div>
                                        </div>
                                        </div>
                              </div>



                              <div class="form-group">
                                <label class="col-md-3 control-label" for="profileAddress">option type*</label>
                                <div class="col-md-8">
                                  <select name="option_type" class="form-control mb-md" required>

                                   <option value="1" @if( $u->options_detail->option_type == 1)
                                        selected='selected'
                                        @endif> แสดงแบบข้อความ </option>
                                   <option value="2" @if( $u->options_detail->option_type == 2)
                                        selected='selected'
                                        @endif> แสดง รูปและข้อความ </option>
                                  </select>
                                </div>
                              </div>


                            </fieldset>


                        </div>
                        <div class="panel-footer">
                          <div class="row">
                            <div class="col-md-9 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                              <button data-dismiss="modal" class="btn btn-default">ยกเลิก</button>
                            </div>
                          </div>
                        </div>
                        </form>

                      </div>
                    </div>
                  </div>

                  <!-- End Edit Option item -->

                  <!-- Start Delete Option item -->
                  <a class="mb-1 mt-1 mr-1 btn-xs btn btn-danger" data-toggle="modal" data-target="#delete_optionx_{{$u->option_set_id}}" style="margin-top:10px;" title="ลบ Option นี้"><i class="fa fa-times"></i> </a>
                  <div class="modal fade" id="delete_optionx_{{$u->option_set_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" >
                      <div class="modal-content ">



                      <form  method="POST" action="{{url('admin/delete_option_product_item_inpro/')}}" name="edit_option_product_item_inpro{{$u->option_set_id}}">
                        {{ csrf_field() }}
                        <div class="modal-body">


                            <h4 class="mb-xlg text-center">คุณแน่ใจใช่ไหม? ที่จะลบ Option ( {{$u->options_detail->option_name}} ) นี้ออกไป</h4>
                            <fieldset>
                              <div class="form-group">

                                <div class="col-md-8">


                                  <input type="hidden" class="form-control" name="option_id" value="{{ $u->option_set_id }}">
                                  <input type="hidden" class="form-control" name="product_id" value="{{$product_id}}">
                                  </div>
                              </div>



                            </fieldset>


                        </div>
                        <div class="panel-footer">
                          <div class="row">
                            <div class="col-md-9 col-md-offset-4">
                              <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                              <button data-dismiss="modal" class="btn btn-default">ยกเลิก</button>
                            </div>
                          </div>
                        </div>
                        </form>

                      </div>
                    </div>
                  </div>
                  <!-- End Delete Option item -->
                </div>
  					</section>

          </div>
          @endforeach
          @endif


          <!--

          <div class="col-md-6">

            <section class="card">
                <div class="card-body ">
                  <h5>Content </h5>
                  <ul class="list-inline">
										<li>1 - Lorem ipsum dolor sit amet. <a class="text-muted t-r-10"><i class="fa fa-gear" aria-hidden="true"></i></a> <a class="text-danger t-r-10"><i class="fa fa-times" aria-hidden="true"></i></a></li>
										<li>2 - Lorem ipsum dolor sit amet. <a class="text-muted t-r-10"><i class="fa fa-gear" aria-hidden="true"></i></a> <a class="text-danger t-r-10"><i class="fa fa-times" aria-hidden="true"></i></a></li>
										<li>3 - Lorem ipsum dolor sit amet. <a class="text-muted t-r-10"><i class="fa fa-gear" aria-hidden="true"></i></a> <a class="text-danger t-r-10"><i class="fa fa-times" aria-hidden="true"></i></a></li>
										<li>4 - Lorem ipsum dolor sit amet. <a class="text-muted t-r-10"><i class="fa fa-gear" aria-hidden="true"></i></a> <a class="text-danger t-r-10"><i class="fa fa-times" aria-hidden="true"></i></a></li>
									</ul>

                  <a class="mb-1 mt-1 mr-1 btn-xs btn btn-info" style="margin-top:10px;" title="เพิ่มตัวเลือกเข้าไป"><i class="fa fa-plus"></i> </a>
                  <a class="mb-1 mt-1 mr-1 btn-xs btn btn-warning" style="margin-top:10px;" title="ลบ Option นี้"><i class="fa fa-gear"></i> </a>
                  <a class="mb-1 mt-1 mr-1 btn-xs btn btn-danger" style="margin-top:10px;" title="ลบ Option นี้"><i class="fa fa-times"></i> </a>
                </div>
  					</section>

          </div>

          <div class="col-md-6">

            <section class="card">
                <div class="card-body ">
                  <h5>Content </h5>
                  <ul class="list-inline">
										<li>1 - Lorem ipsum dolor sit amet. <a class="text-muted t-r-10"><i class="fa fa-gear" aria-hidden="true"></i></a> <a class="text-danger t-r-10"><i class="fa fa-times" aria-hidden="true"></i></a></li>
										<li>2 - Lorem ipsum dolor sit amet. <a class="text-muted t-r-10"><i class="fa fa-gear" aria-hidden="true"></i></a> <a class="text-danger t-r-10"><i class="fa fa-times" aria-hidden="true"></i></a></li>
										<li>3 - Lorem ipsum dolor sit amet. <a class="text-muted t-r-10"><i class="fa fa-gear" aria-hidden="true"></i></a> <a class="text-danger t-r-10"><i class="fa fa-times" aria-hidden="true"></i></a></li>
										<li>4 - Lorem ipsum dolor sit amet. <a class="text-muted t-r-10"><i class="fa fa-gear" aria-hidden="true"></i></a> <a class="text-danger t-r-10"><i class="fa fa-times" aria-hidden="true"></i></a></li>
									</ul>

                  <a class="mb-1 mt-1 mr-1 btn-xs btn btn-info" style="margin-top:10px;" title="เพิ่มตัวเลือกเข้าไป"><i class="fa fa-plus"></i> </a>
                  <a class="mb-1 mt-1 mr-1 btn-xs btn btn-warning" style="margin-top:10px;" title="ลบ Option นี้"><i class="fa fa-gear"></i> </a>
                  <a class="mb-1 mt-1 mr-1 btn-xs btn btn-danger" style="margin-top:10px;" title="ลบ Option นี้"><i class="fa fa-times"></i> </a>
                </div>
  					</section>

          </div>
        -->



          <div class="col-md-12">
            <hr />
            <h4>เรียงลำดับของ Option</h4>
            <br />
            <section class="card" style="margin-bottom:50px;">
                <div class="card-body ">

                  <form id="dd-form" action="{{url('admin/updatesort_video/'.$product_id)}}" name="updatesort_video" method="post">
                  	{{ csrf_field() }}

                  <div class="dd" id="nestable" style="margin-bottom:15px;">
                    <ol class="dd-list">

                      @if(isset($get_option_main))
                      @foreach($get_option_main as $u)
                      <li class="dd-item" data-id="{{$u->id}}">
      									<div class="dd-handle row mar-top">
      										{{$u->options_detail->option_name}}
      									</div>
      								</li>
                      @endforeach
                      @endif

                      </ol>
                  </div>


                  <input type="hidden" name="sort_order" id="nestable-output"  />
							    <button class="btn btn-default pull-right" type="submit">บันทึกข้อมูล</button>
                  <br />
                  </form>
                </div>
  					</section>

            </div>


          </div>





          						</div>









          						</div>




</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>
<script src="{{url('./assets/vendor/jquery-nestable/jquery.nestable.js')}}"></script>


<script type="text/javascript">

/*
Name: 			UI Elements / Nestable - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	1.4.1
*/

(function( $ ) {

	'use strict';

	/*
	Update Output
	*/
	var updateOutput = function (e) {
		var list = e.length ? e : $(e.target),
			output = list.data('output');

		if (window.JSON) {
			output.val(window.JSON.stringify(list.nestable('serialize')));
		} else {
			output.val('JSON browser support required for this demo.');
		}
	};

	/*
	Nestable 1
	*/
	$('#nestable').nestable({
		group: 1
	}).on('change', updateOutput);

	/*
	Output Initial Serialised Data
	*/
	$(function() {
		updateOutput($('#nestable').data('output', $('#nestable-output')));
	});

}).apply(this, [ jQuery ]);
</script>

@if ($message = Session::get('success'))
<script type="text/javascript">
var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};
var notice = new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success',
      addclass: 'stack-bar-top',
      stack: stack_bar_top,
      width: "100%"
    });
</script>
@endif


@if ($message = Session::get('delete'))
<script type="text/javascript">
var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};
var notice = new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success',
      addclass: 'stack-bar-top',
      stack: stack_bar_top,
      width: "100%"
    });
</script>
@endif

@stop('scripts')
