@extends('layouts.template')

@section('title')
404 page MASTER PHOTO NETWORK
@stop

@section('stylesheet')

<style>
.panel-body {
    background: #eee;
}
.btn{
    padding: 8px 20px;
    font-size: 16px;
}
</style>


@stop('stylesheet')
@section('content')


<main class="white_bg" style="margin-top:120px;">




    <div class="container margin_60">

      <div class=" margin_30 text-center">
        <h2 class="major"><span style="background: #fff;">Page not found - 404</span></h2>
        <p>
          The page your looking for is not available
        </p>
        <img src="{{url('assets/image/404page.gif')}}" style="width:50%" class="img-fluid"/>
      </div>

      <div class="row">










      </div>




    </div>
    <!-- End container -->
  </main>
  <!-- End main -->


@endsection

@section('scripts')

<script type="text/javascript">
$(document).ready(function() {

$('.submit_on_enter').keydown(function(event) {
  // enter has keyCode = 13, change it if you want to use another button
  if (event.keyCode == 13) {
    this.form.submit();
    return false;
  }
});

});
</script>

@stop('scripts')
