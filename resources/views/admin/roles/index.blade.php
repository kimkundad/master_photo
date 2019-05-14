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
              <div class="row">
              <div class="col-xs-12">

            <section class="panel">



              <div class="panel-body">


                <div class="col-lg-6 mb-3 mb-lg-0">
                  <form class="form-horizontal form-bordered" action="{{url('admin/post_page_roles')}}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                      <label class="col-sm-4 control-label" style="font-size:16px;">สิทธิของพนักงาน</label>

                      <div class="col-sm-8">


                        <div class="checkbox-custom checkbox-default">
                          <input type="checkbox" name="page1"
                          @if(get_menu_admin()[0]->menu_status == 1)
                          checked=""
                          @endif
                          id="checkboxExample1">
                          <label for="checkboxExample1">รายชื่อลูกค้า</label>
                        </div>


                        <div class="checkbox-custom checkbox-default">
                          <input type="checkbox" name="page2"
                          @if(get_menu_admin()[1]->menu_status == 1)
                          checked=""
                          @endif
                          id="checkboxExample1">
                          <label for="checkboxExample1">จัดการหมวดหมู่</label>
                        </div>

                        <div class="checkbox-custom checkbox-default">
                          <input type="checkbox" name="page3"
                          @if(get_menu_admin()[2]->menu_status == 1)
                          checked=""
                          @endif
                          id="checkboxExample1">
                          <label for="checkboxExample1">หมวดหมู่ย่อย</label>
                        </div>

                        <div class="checkbox-custom checkbox-default">
                          <input type="checkbox" name="page4"
                          @if(get_menu_admin()[3]->menu_status == 1)
                          checked=""
                          @endif
                          id="checkboxExample1">
                          <label for="checkboxExample1">Product</label>
                        </div>

                        <div class="checkbox-custom checkbox-default">
                          <input type="checkbox" name="page5"
                          @if(get_menu_admin()[4]->menu_status == 1)
                          checked=""
                          @endif
                          id="checkboxExample1">
                          <label for="checkboxExample1">Themes</label>
                        </div>

                        <div class="checkbox-custom checkbox-default">
                          <input type="checkbox" name="page6"
                          @if(get_menu_admin()[5]->menu_status == 1)
                          checked=""
                          @endif
                          id="checkboxExample1">
                          <label for="checkboxExample1">Taopix</label>
                        </div>

                        <div class="checkbox-custom checkbox-default">
                          <input type="checkbox" name="page7"
                          @if(get_menu_admin()[6]->menu_status == 1)
                          checked=""
                          @endif
                          id="checkboxExample1">
                          <label for="checkboxExample1">Order สินค้า</label>
                        </div>

                        <div class="checkbox-custom checkbox-default">
                          <input type="checkbox" name="page8"
                          @if(get_menu_admin()[7]->menu_status == 1)
                          checked=""
                          @endif
                          id="checkboxExample1">
                          <label for="checkboxExample1">Slide Show</label>
                        </div>

                        <div class="checkbox-custom checkbox-default">
                          <input type="checkbox" name="page9"
                          @if(get_menu_admin()[8]->menu_status == 1)
                          checked=""
                          @endif
                          id="checkboxExample1">
                          <label for="checkboxExample1">ช่องทางการส่งสินค้า</label>
                        </div>

                        <div class="checkbox-custom checkbox-default">
                          <input type="checkbox" name="page10"
                          @if(get_menu_admin()[9]->menu_status == 1)
                          checked=""
                          @endif
                          id="checkboxExample1">
                          <label for="checkboxExample1">ธนาคาร</label>
                        </div>

                        <div class="checkbox-custom checkbox-default">
                          <input type="checkbox" name="page11"
                          @if(get_menu_admin()[10]->menu_status == 1)
                          checked=""
                          @endif
                          id="checkboxExample1">
                          <label for="checkboxExample1">User Roles</label>
                        </div>

                        <div class="checkbox-custom checkbox-default">
                          <input type="checkbox" name="page12"
                          @if(get_menu_admin()[11]->menu_status == 1)
                          checked=""
                          @endif
                          id="checkboxExample1">
                          <label for="checkboxExample1">รายชื่อพนักงาน</label>
                        </div>
                        <div class="checkbox-custom checkbox-default">
                          <input type="checkbox" name="page13"
                          @if(get_menu_admin()[12]->menu_status == 1)
                          checked=""
                          @endif
                          id="checkboxExample1">
                          <label for="checkboxExample1">Line Notify</label>
                        </div>

                        <hr />
                        <br />
                        <button class="btn btn-primary " type="submit">บันทึกข้อมูล</button>



                      </div>
                    </div>
                  </form>
                </div>



              </div>
            </section>

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
            text: 'ยินดีด้วย ได้ทำการเพิ่มข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif




@stop('scripts')
