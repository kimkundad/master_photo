@extends('layouts.template')

@section('title')
kerry express | MASTER PHOTO NETWORK
@stop

@section('stylesheet')
<style>
.p_16{
  font-size: 14px;
}
</style>
@stop('stylesheet')
@section('content')


<main class="white_bg slider-pro" >




  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span style="background: #fff;">จัดส่งแบบ Kerry Express</span></h2>

    </div>

    <div class="row">




        <div class="col-md-8 col-md-offset-2 ">

          <div class="text-center" style=" text-align: -webkit-center;">
            <img src="{{url('master/assets/image/banner23.gif')}}" alt=" Kerry Express" class="img-responsive styled text-center">
          </div>
          <br />
          <h3> บริการใหม่จากมาสเตอร์ออนไลน์จัดส่งด่วนภายใน 1 วัน ส่งวันนี้ถึงพรุ่งนี้ทุกที่ทั่วไทย</h3>

          <ul class="list_ok" style="font-size:15px;">
								<li>ลูกค้าต้องส่งไฟล์งานและ <strong class="text-danger">ชำระเงินก่อนเวลา 10:00 น.</strong> ของจะส่งถึงปลายทางในวันถัดไป</li>
								<li>ลูกค้าที่สั่งงานมาวันเสาร์ ของจะจัดส่งถึงปลายทางในวันจันทร์ ลูกค้าที่สั่งงานมาวันอาทิตย์ ของจะจัดส่งถึงปลายทางในวันอังคาร</li>
								<li>เฉพาะลูกค้ามาสเตอร์ออนไลน์เท่านั้น และสงวนสิทธิ์ในการเปลี่ยนแปลงเงื่อนไขโดยไม่ต้องแจ้งให้ทราบล่วงหน้า</li>

							</ul>
              <p class="text-warning">
                <strong>* พื้นที่ที่ต้องใช้เวลาจัดส่งมากกว่า 1 วัน</strong>
              </p>
              <br />
              <div class="text-center" style=" text-align: -webkit-center;">
                <img src="{{url('master/assets/image/kerry.jpg')}}" alt="จัดส่งแบบ Kerry Express" class="img-responsive styled text-center" style="width:70%;">
              </div>

              <br />

              <h5 class="text-center"> <strong>รายละเอียดเพิ่มเติมสามารถติดต่อได้ที่ มาสเตอร์ออนไลน์ โทร. 02-513-0105 ทุกวัน เวลา 8.00-22.00 น.</strong></h5>





				</div>





    </div>









  </div>
  <!-- End container -->
</main>
<!-- End main -->

@endsection

@section('scripts')



@stop('scripts')
