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
                <div class="row">
                   <div class="col-md-2" >
                     <a class="btn btn-primary btn-block" style="float:left" href="{{url('admin/taopix/create')}}" >
                         <i class="fa fa-plus"></i> เพิ่มข้อมูลใหม่</a>



                   </div>
                   <div class="col-md-3" >
                     <form class="form-horizontal" name="search_type" action="{{url('admin/taopix_search')}}" method="POST" enctype="multipart/form-data">
                       {{ csrf_field() }}
                     <select class="form-control ">

                        <option value="0">แสดงทั้งหมด</option>
                        @if($sub_cat)
                          @foreach($sub_cat as $u)
                          <option value="{{$u->id}}">{{$u->sub_name}}</option>
                          @endforeach
                       @endif

                      </select>
                      </form>
                  </div>
                   <div class="col-md-7 " style="padding-left: 1px;">

                     <div class="form-group ">
                      <label class="col-md-4 control-label"></label>
                      <div class="col-md-8">
                        <form class="form-horizontal" name="search_name" action="{{url('admin/taopix_search')}}" method="GET" enctype="multipart/form-data">
                          {{ csrf_field() }}
                        <div class="input-group input-search">
                          <input type="text" class="form-control" name="search" placeholder="Search..." required>
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                          </span>
                        </div>
                      </form>
                      </div>
                    </div>

                   </div>

              </div>


                <br><br>




                <table class="table table-responsive-lg table-striped table-sm mb-0">
                  <thead>
                    <tr>

                      <th>รูปภาพ</th>
                      <th>สถานะ</th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>


                  </tbody>
                </table>
              </div>
            </section>

              </div>
            </div>
        </div>
</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>

<script type="text/javascript">
$(document).ready(function(){
  $("input:checkbox").change(function() {
    var user_id = $(this).closest('tr').attr('id');

    $.ajax({
            type:'POST',
            url:'{{url('api/api_slide_status')}}',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "user_id" : user_id },
            success: function(data){
              if(data.data.success){


                var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
                      var notice = new PNotify({
                            title: 'ทำรายการสำเร็จ',
                            text: 'คุณเปลี่ยนการแสดงผล สำเร็จเรียบร้อยแล้วค่ะ',
                            type: 'success',
                            addclass: 'stack-topright'
                          });



              }
            }
        });
    });
});
</script>

@if ($message = Session::get('add_success'))
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
