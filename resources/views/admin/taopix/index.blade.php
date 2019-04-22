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
                   <div class="col-md-4" >
                     <a class="btn btn-primary " style="float:left" href="{{url('admin/taopix/create')}}" >
                         <i class="fa fa-plus"></i> เพิ่มข้อมูลใหม่</a>



                   </div>


              </div>

              <br />





                <table class="table table-responsive-lg table-striped table-sm mb-0" id="datatable-default">
                  <thead>
                    <tr>
                      <th>หมวดหมู่</th>
                      <th>สินค้า</th>
                      <th>Theme</th>
                      <th>Taopix</th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($taopix))
                       @foreach($taopix as $u)
                       <tr>


                       <td>{{$u->sub_name}}</td>
                       <td>{{$u->pro_name}}</td>
                       <td>{{$u->themepro_name}}</td>
                       <td>{{$u->taopix_name}}</td>
                       <td>

                         <div class="btn-group flex-wrap">
                           <button type="button" class="mb-1 mt-1 mr-1 btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">จัดการ <span class="caret"></span></button>
                           <div class="dropdown-menu" role="menu">
                           <!--	<a class="dropdown-item text-1" href="#">ดูข้อมูล</a> -->
                             <a class="dropdown-item text-1" href="{{url('admin/taopix/'.$u->id_q.'/edit')}}">แก้ไข</a>
                             <form  action="{{url('admin/taopix/'.$u->id_q)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                                 <input type="hidden" name="_method" value="DELETE">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                 <button type="submit" title="ลบ taopix" class="dropdown-item text-1 text-danger"><i class="fa fa-times "></i> ลบ</button>
                             </form>

                           </div>
                         </div>

                       </td>
                       </tr>
                       @endforeach
                    @endif

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
