@extends('layouts.template')

@section('title')
kerry express | MASTER PHOTO NETWORK
@stop

@section('stylesheet')
<style>
#map {
  width: 100%;
  height: 450px;
}
.p_top{
      padding-top: 15px !important;
}
</style>
@stop('stylesheet')
@section('content')

<main class="white_bg slider-pro" >




  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span style="background: #fff;">ช่องทางการชำระเงิน</span></h2>

    </div>

    <div class="row">




        <div class="col-md-10 col-md-offset-1 ">

          <p>
            ณ ปัจจุบันท่านสามารถชำระเงินได้โดยผ่านทางธนาคาร จากนั้นกรุณาแจ้งการชำระเงินผ่านทาง Website ในหน้า account ของท่าน และเลือกยืนยันการชำระเงินพร้อมกรอกข้อมูลให้ครบถ้วน
            หรือท่านสามารถโทรศัพท์มาแจ้งทางเราได้ที่เบอร์ 02-513-0105 หรือส่ง Fax ใบสลิปมาที่ เบอร์ 02-939-3080 ระหว่างเวลา 8.00 - 22.00 น. ทุกวัน
          </p>

          <div class="form_title">
          <h3><strong>1</strong>โอนเงินผ่านธนาคาร</h3>

          </div>

          <div class="step">
						<div class="row">
							<div class="col-md-12">

              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ชื่อบัญชี</th>
                      <th>เลขที่บัญชี</th>
                      <th>สาขา</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <img src="{{url('master/assets/image/bank/icon-bankbbl.png')}}" height="35">
                      </td>
                      <td class="p_top">
                        บริษัท มาสเตอร์ โฟโต้ เน็ตเวิร์ค จำกัด
                      </td>
                      <td class="p_top">
                        129-5-51893-8 (ออมทรัพย์)
                      </td>
                      <td class="p_top">
                        ลาดพร้าว
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <img src="{{url('master/assets/image/bank/icon-bankscb.png')}}" height="35">
                      </td>
                      <td class="p_top">
                        บริษัท มาสเตอร์ โฟโต้ เน็ตเวิร์ค จำกัด
                      </td>
                      <td class="p_top">
                         041-270703-6 (ออมทรัพย์)
                      </td>
                      <td class="p_top">
                        บางเขน
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <img src="{{url('master/assets/image/bank/icon-bankktc.png')}}" height="35">
                      </td>
                      <td class="p_top">
                        บริษัท มาสเตอร์ โฟโต้ เน็ตเวิร์ค จำกัด
                      </td>
                      <td class="p_top">
                         477-0-10789-7 (ออมทรัพย์)
                      </td>
                      <td class="p_top">
                        ยูเนี่ยนมอลล์
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <img src="{{url('master/assets/image/bank/icon-bankkrugsri.png')}}" height="35">
                      </td>
                      <td class="p_top">
                        บริษัท มาสเตอร์ โฟโต้ เน็ตเวิร์ค จำกัด
                      </td>
                      <td class="p_top">
                         106-1-35383-5 (ออมทรัพย์)
                      </td>
                      <td class="p_top">
                        ยูเนี่ยนมอลล์ ลาดพร้าว
                      </td>
                    </tr>


                    <tr>
                      <td>
                        <img src="{{url('master/assets/image/bank/icon-bankkbank.png')}}" height="35">
                      </td>
                      <td class="p_top">
                        บริษัท มาสเตอร์ โฟโต้ เน็ตเวิร์ค จำกัด
                      </td>
                      <td class="p_top">
                         752-229-3029 (ออมทรัพย์)
                      </td>
                      <td class="p_top">
                        ลาดพร้าว 10
                      </td>
                    </tr>

                  </tbody>
                </table>
                </div>
							</div>

						</div>

					</div>





          <div class="form_title">
						<h3><strong>2</strong>เงินสด</h3>

					</div>
          <br />
          <br />

          <div class="form_title">
						<h3><strong>3</strong>บัตรเครดิต</h3>

					</div>

          <div class="step">
						<div class="row">
							<div class="col-md-12">
                <h4>
                  ยินดีรับการชำระเงินผ่านบัตรเครดิตและบัตรเดบิต
                </h4>
                <p>
                  ทุกธุรกรรมผ่านบัตรเครดิตและบัตรเดบิตได้รับการรับรองความปลอดภัยด้วยเทคโนโลยี 2c2p Payment gateway api, Paypal ที่ได้รับการรับรองแล้ว คุณจะได้รับการยืนยันและตั๋วอิเล็กทรอนิกส์ผ่านทางอีเมล์ภายใน 60 นาที ภายหลังจากที่ชำระเงินเสร็จสิ้น
                </p>
                <img src="{{url('master/assets/image/bank/logo-master-card2.png')}}"  height="29" >
                <img src="{{url('master/assets/image/bank/paypal_bt.png')}}"  height="35" >
                <img src="{{url('master/assets/image/logo-2c2p.png')}}"  height="35" >
                </div>
                </div>
                </div>



				</div>





    </div>









  </div>
  <!-- End container -->
</main>
<!-- End main -->

@endsection

@section('scripts')



@stop('scripts')
