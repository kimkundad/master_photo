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



@if(trans('message.lang') == 'Thai')

    <div class=" margin_30 text-center">
      <h2 class="major"><span style="background: #fff;">จัดส่ง EMS ไปรษณีย์ไทย</span></h2>

    </div>

    <div class="row">




        <div class="col-md-8 col-md-offset-2 ">

          <div class="text-center" style=" text-align: -webkit-center;">
            <img src="{{url('master/assets/image/ems.jpg')}}" alt=" Kerry Express" class="img-responsive styled text-center">
          </div>
          <br />
          <h3> ค่าจัดส่งใช้ราคาเดียวกันทั่วประเทศ</h3>

              <p class="text-warning">
                <strong>ทางร้านจะคิดค่าจัดส่งEMSตามน้ำหนักที่ทางไปรษณีย์คิดบวกค่าวัสดุห่อตามขนาดและน้ำหนักของรูปที่สั่งอัด<br /> รายละเอียดตามตารางข้างล่าง</strong>
              </p>
              <br />
              <div class="text-center" style=" text-align: -webkit-center;">
                <div class="course-overall-wrapper" style="background: #dff0d8;border-radius: 10px; width: 80%;">
                <div class="table-scrollable table-scrollable-borderless text-center" style="padding:8px;">
                                           <table class="table table-striped">
                                            <thead class="uppercase">
                                                <tr>
                                                    <th class="text-center">น้ำหนัก (กรัม)</th>
                                                    <th class="text-center">ค่าส่ง EMS (บาท)</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                              <tr>
                                                <td>
                                                  1 - 500
                                                </td>
                                                <td>
                                                  52
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  501 - 1000
                                                </td>
                                                <td>
                                                  67
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  1001 - 1500
                                                </td>
                                                <td>
                                                  82
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  1501 - 2000
                                                </td>
                                                <td>
                                                  97
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  2001 - 2500
                                                </td>
                                                <td>
                                                  122
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  2501 - 3000
                                                </td>
                                                <td>
                                                  137
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  3001 - 3500
                                                </td>
                                                <td>
                                                  157
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  3501 - 4000
                                                </td>
                                                <td>
                                                  177
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  4001 - 4500
                                                </td>
                                                <td>
                                                  197
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  4501 - 5000
                                                </td>
                                                <td>
                                                  217
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  5001 - 5500
                                                </td>
                                                <td>
                                                  242
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  5501 - 6000
                                                </td>
                                                <td>
                                                  267
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  6001 - 6500
                                                </td>
                                                <td>
                                                  292
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  6501 - 7000
                                                </td>
                                                <td>
                                                  317
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  7001 - 7500
                                                </td>
                                                <td>
                                                  342
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  7501 - 8000
                                                </td>
                                                <td>
                                                  367
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  8001 - 8500
                                                </td>
                                                <td>
                                                  397
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  8501 - 9000
                                                </td>
                                                <td>
                                                  427
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  9001 - 9500
                                                </td>
                                                <td>
                                                  457
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  9501 - 10000
                                                </td>
                                                <td>
                                                  487
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  10000  ขึ้นไป
                                                </td>
                                                <td>
                                                  515
                                                </td>
                                              </tr>

                                            </tbody>
                                            </table>
                </div>
              </div>
              </div>
              <br />
              <p>
                <strong>จัดส่งโดยบรรจุกล่องพัสดุ / กระบอกกระดาษ</strong>
              </p>
              <p>
                * คิดค่าห่อรวมวัสดุห่อ 20 บาทต่อน้ำหนักรูป 5,000 กรัม สำหรับรูปขนาด 3"x5" - 6"x9"
              </p>
              <p>
                * คิดค่าห่อรวมวัสดุห่อ 40 บาทต่อน้ำหนักรูป 2,500 กรัม สำหรับรูปขนาด 6"x15" - 24"x100"
              </p>

              <br />
              <hr />

              <h5 class="text-center"> <strong>Fax ใบสลิปโอนเงินมาที่ 02-939-2089 ตลอด 24 ชั่งโมง หรือโทรแจ้งที่เบอร์ 086-600-5055 , 086-321-0190 ระหว่างเวลา 8.00-22.00 น. ทุกวัน</strong></h5>

				</div>

    </div>



@else




<div class=" margin_30 text-center">
  <h2 class="major"><span style="background: #fff;">EMS Thailand Post</span></h2>

</div>

<div class="row">




    <div class="col-md-8 col-md-offset-2 ">

      <div class="text-center" style=" text-align: -webkit-center;">
        <img src="{{url('master/assets/image/ems.jpg')}}" alt=" Kerry Express" class="img-responsive styled text-center">
      </div>
      <br />
      <h3> Shipping charges apply the same price across the country.</h3>

          <p class="text-warning">
            <strong>The shop will charge EMS shipping according to the weight of the postage, plus the package material cost according to the size and weight of the compressed order.<br /> Details as in the table below</strong>
          </p>
          <br />
          <div class="text-center" style=" text-align: -webkit-center;">
            <div class="course-overall-wrapper" style="background: #dff0d8;border-radius: 10px; width: 80%;">
            <div class="table-scrollable table-scrollable-borderless text-center" style="padding:8px;">
                                       <table class="table table-striped">
                                        <thead class="uppercase">
                                            <tr>
                                                <th class="text-center">Weight (g)</th>
                                                <th class="text-center">EMS delivery fee (baht)</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                          <tr>
                                            <td>
                                              1 - 500
                                            </td>
                                            <td>
                                              52
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              501 - 1000
                                            </td>
                                            <td>
                                              67
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              1001 - 1500
                                            </td>
                                            <td>
                                              82
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              1501 - 2000
                                            </td>
                                            <td>
                                              97
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              2001 - 2500
                                            </td>
                                            <td>
                                              122
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              2501 - 3000
                                            </td>
                                            <td>
                                              137
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              3001 - 3500
                                            </td>
                                            <td>
                                              157
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              3501 - 4000
                                            </td>
                                            <td>
                                              177
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              4001 - 4500
                                            </td>
                                            <td>
                                              197
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              4501 - 5000
                                            </td>
                                            <td>
                                              217
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              5001 - 5500
                                            </td>
                                            <td>
                                              242
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              5501 - 6000
                                            </td>
                                            <td>
                                              267
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              6001 - 6500
                                            </td>
                                            <td>
                                              292
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              6501 - 7000
                                            </td>
                                            <td>
                                              317
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              7001 - 7500
                                            </td>
                                            <td>
                                              342
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              7501 - 8000
                                            </td>
                                            <td>
                                              367
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              8001 - 8500
                                            </td>
                                            <td>
                                              397
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              8501 - 9000
                                            </td>
                                            <td>
                                              427
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              9001 - 9500
                                            </td>
                                            <td>
                                              457
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              9501 - 10000
                                            </td>
                                            <td>
                                              487
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              10000  ขึ้นไป
                                            </td>
                                            <td>
                                              515
                                            </td>
                                          </tr>

                                        </tbody>
                                        </table>
            </div>
          </div>
          </div>
          <br />
          <p>
            <strong>Delivery by packing the parcel / paper cylinder</strong>
          </p>
          <p>
            * The package fee includes 20 baht per package, 5,000 grams of weight for the size of 3 "x5" - 6 "x9".
          </p>
          <p>
            * Wrapped up the bundle of 40 baht per weight of 2,500 grams for the 6 "x15" - 24 "x100" figure
          </p>

          <br />
          <hr />

          <h5 class="text-center"> <strong>Fax money transfer slip to 02-939-2089 24 hours a day</strong></h5>

    </div>

</div>


@endif









  </div>
  <!-- End container -->
</main>
<!-- End main -->

@endsection

@section('scripts')



@stop('scripts')
