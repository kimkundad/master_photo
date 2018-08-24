@extends('layouts.template')

@section('title')
Product Price | MASTER PHOTO NETWORK
@stop

@section('stylesheet')
<style>
.course-overall-wrapper {
    background: #ffffff;
    border: 1px solid #ddd;
}
.head-lines-green {
    position: absolute;
    /* bottom: 0; */
    /* left: 0; */
    display: block;
    width: 50px;
    height: 3px;
    background-color: #00c402;
    margin: 0;
}
h4 {
    margin-bottom: 15px;
}
</style>
@stop('stylesheet')
@section('content')

<main class="white_bg slider-pro" >

  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span style="background: #fff;">Product Price</span></h2>

    </div>

    <div class="row">




        <div class="col-md-10 col-md-offset-1 ">

          <div class="col-md-12">
            <div class="text-center">
              <a href="{{url('product_price')}}"><img src="{{url('master/assets/image/mprice1.png')}}" alt="Image" class="text-center" style="padding:10px;"></a>
              <a href="{{url('product_price_2')}}"><img src="{{url('master/assets/image/mprice2.png')}}" alt="Image" class="text-center" style="padding:10px;"></a>
            </div>
          </div>

          <br />
          <br />
          <br />



					<h3> ราคา<span>ล้างอัดรูปสี</span></h3>
					<p>
						ทาง <strong>ร้านมาสเตอร์</strong> มีสินค้าและบริการที่ครบวงจร เพื่อรองรับความต้องการของท่าน ท่านสามารถสอบถามรายละเอียดกับทางสาขาต่างๆ ได้ทุกเมื่อค่ะ
					</p>
          <hr style="border-top: 1px solid #ddd;"/>
          <div class="row">

						<div class="col-md-6 col-sm-6">
              <h4>HOT <span class="head-lines-green"></span></h4>

              <div class="course-overall-wrapper" style="background: #dff0d8;border-radius: 10px;">


              <div class="table-scrollable table-scrollable-borderless " style="padding:8px;">
                                         <table class="table table-hover table-light">
                                          <thead class="uppercase">
                                              <tr>
                                                  <th>รายละเอียด</th>
                                                  <th>ราคา</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                            <?php

                                   $urlpath = 'assets/table_price/HOT.csv';

                                 //  $urlpath = file_get_contents($urlpath);
                            // header('Content-Type: text/html; charset=utf-8');
                              $urlpath =  utf8_encode($urlpath);
                            $urlpath = iconv("TIS-620", "utf-8", $urlpath);

                           //$urlpath = trim($urlpath);
                              $f = fopen($urlpath, "r");
                              while (($line = fgetcsv($f)) !== false) {
                                      echo "<tr class='success'>";

                                      foreach ($line as $cell) {
                                              echo "<td>" . htmlspecialchars($cell) . "</td>";
                                      }
                                      echo "</tr>\n";
                              }
                              fclose($f);
                                  ?>
                                          </tbody>
                                          </table>
              </div>
              </div>

              <!-- end line table  -->

              <br />

              <h4>Poster Size <span class="head-lines-green"></span></h4>

              <div class="course-overall-wrapper" style="background: #d9edf7;border-radius: 10px;">


              <div class="table-scrollable table-scrollable-borderless text-center" style="padding:8px;">
                                         <table class="table table-hover table-light" >
                                          <thead class="uppercase ">
                                              <tr>
                                                  <th>ขนาด (นิ้ว)</th>
                                                  <th>อัดจากไฟล์</th>
                                                  <th>อัดจากฟิล์ม (135)</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                            <?php

                                   $urlpath = 'assets/table_price/Poster-Size.csv';

                                 //  $urlpath = file_get_contents($urlpath);
                            // header('Content-Type: text/html; charset=utf-8');
                              $urlpath =  utf8_encode($urlpath);
                            $urlpath = iconv("TIS-620", "utf-8", $urlpath);

                           //$urlpath = trim($urlpath);
                              $f = fopen($urlpath, "r");
                              while (($line = fgetcsv($f)) !== false) {
                                      echo "<tr class='info'>";

                                      foreach ($line as $cell) {
                                              echo "<td>" . htmlspecialchars($cell) . "</td>";
                                      }
                                      echo "</tr>\n";
                              }
                              fclose($f);
                                  ?>
                                          </tbody>
                                          </table>
              </div>
              </div>

              <!-- end line table  -->


						</div>

						<div class="col-md-6 col-sm-6">



              <h4>ราคา Promotion ใหม่ อัดภาพระบบดิจิตอล <span class="head-lines-green"></span></h4>

              <div class="course-overall-wrapper" style="background: #fcf8e3;border-radius: 10px;">


              <div class="table-scrollable table-scrollable-borderless text-center" style="padding:8px;">
                                         <table class="table table-hover table-light">
                                          <thead class="uppercase ">
                                              <tr>
                                                  <th>ขนาด (นิ้ว)</th>
                                                  <th>อัดจากไฟล์</th>
                                                  <th>อัดจากฟิล์ม (135)</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                            <?php

                                   $urlpath = 'assets/table_price/Promotion.csv';

                                 //  $urlpath = file_get_contents($urlpath);
                            // header('Content-Type: text/html; charset=utf-8');
                              $urlpath =  utf8_encode($urlpath);
                            $urlpath = iconv("TIS-620", "utf-8", $urlpath);

                           //$urlpath = trim($urlpath);
                              $f = fopen($urlpath, "r");
                              while (($line = fgetcsv($f)) !== false) {
                                      echo "<tr class='warning'>";

                                      foreach ($line as $cell) {
                                              echo "<td>" . htmlspecialchars($cell) . "</td>";
                                      }
                                      echo "</tr>\n";
                              }
                              fclose($f);
                                  ?>
                                          </tbody>
                                          </table>
              </div>
              </div>
              <!-- end line table  -->

              <br />

              <h4>Panorama <span class="head-lines-green"></span></h4>

              <div class="course-overall-wrapper" style="background: #f5f5f5;border-radius: 10px;">


              <div class="table-scrollable table-scrollable-borderless text-center" style="padding:8px;">
                                         <table class="table table-hover table-light">
                                          <thead class="uppercase ">
                                              <tr>
                                                  <th>ขนาด (นิ้ว)</th>
                                                  <th>อัดจากไฟล์</th>
                                                  <th>อัดจากฟิล์ม (135)</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                            <?php

                                   $urlpath = 'assets/table_price/Promotion.csv';

                                 //  $urlpath = file_get_contents($urlpath);
                            // header('Content-Type: text/html; charset=utf-8');
                              $urlpath =  utf8_encode($urlpath);
                            $urlpath = iconv("TIS-620", "utf-8", $urlpath);

                           //$urlpath = trim($urlpath);
                              $f = fopen($urlpath, "r");
                              while (($line = fgetcsv($f)) !== false) {
                                      echo "<tr class='active'>";

                                      foreach ($line as $cell) {
                                              echo "<td>" . htmlspecialchars($cell) . "</td>";
                                      }
                                      echo "</tr>\n";
                              }
                              fclose($f);
                                  ?>
                                          </tbody>
                                          </table>
              </div>
              </div>
              <!-- end line table  -->


						</div>

            <div class="col-md-12">
              <br /><br />
              <p class="text-danger text-center">
                *** กรุณาโทรสอบถามราคากับพนักงานที่ "แผนกออนไลน์" โทร. 02-5130105
              </p>
              <p class="text-success text-center">
                Custom Size (ตามสั่ง)หน้ากว้างกระดาษ 20 นิ้ว และ 24 นิ้ว ยาวสูงสุด 100 นิ้ว คิดราคาตารางนิ้วละ 0.20 บาท
                Custom Size (ตามสั่ง)หน้ากว้างกระดาษ 30 นิ้ว ยาวสูงสุด 150 นิ้ว คิดราคาตารางนิ้วละ 0.25 บาท
                ความแตกต่างของภาพที่ปริ้นด้วยระบบดิจิตอล คือ สีสันจะสดใสและภาพคมชัดกว่า
              </p>



              <br />

              <h4>ตารางข้างล่างนี้แนะนำขนาดภาพที่เหมาะสมสำหรับความละเอียดในแต่ละระดับ <span class="head-lines-green"></span></h4>

              <div class="course-overall-wrapper" style="background: #f5f5f5;border-radius: 10px;">


              <div class="table-scrollable table-scrollable-borderless text-center" style="padding:8px;">
                                         <table class="table table-hover table-light">
                                          <thead class="uppercase ">
                                              <tr>
                                                  <th class="text-center">ขนาด Pixel</th>
                                                  <th class="text-center">จำนวน Pixel (ประมาณ)</th>
                                                  <th class="text-center">ขนาดสูงสุดที่เหมาะสม*</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                            <?php

                                   $urlpath = 'assets/table_price/stand_price.csv';

                                 //  $urlpath = file_get_contents($urlpath);
                            // header('Content-Type: text/html; charset=utf-8');
                              $urlpath =  utf8_encode($urlpath);
                            $urlpath = iconv("TIS-620", "utf-8", $urlpath);

                           //$urlpath = trim($urlpath);
                              $f = fopen($urlpath, "r");
                              while (($line = fgetcsv($f)) !== false) {
                                      echo "<tr class=''>";

                                      foreach ($line as $cell) {
                                              echo "<td>" . htmlspecialchars($cell) . "</td>";
                                      }
                                      echo "</tr>\n";
                              }
                              fclose($f);
                                  ?>
                                          </tbody>
                                          </table>
              </div>
              </div>
              <!-- end line table  -->

              <br /><br />
              <p class="text-danger text-center">
                * เทียบจากขนาด File โดยประมาณ ทั้งนี้คุณภาพของ File ที่อัดยังขึ้นอยู่กับค่าการบีบอัดข้อมูล และคุณภาพของกล้องด้วย
              </p>


            </div>

            <div class="col-md-4 col-sm-4">
    					<img src="{{url('master/assets/image/n7.JPG')}}" alt="Image" class="img-responsive styled">
    				</div>
            <div class="col-md-4 col-sm-4">
    					<img src="{{url('master/assets/image/n5.JPG')}}" alt="Image" class="img-responsive styled">
    				</div>
            <div class="col-md-4 col-sm-4">
    					<img src="{{url('master/assets/image/n6.JPG')}}" alt="Image" class="img-responsive styled">
    				</div>







					</div>




          <hr style="border-top: 1px solid #ddd;"/>



				</div>





    </div>









  </div>
  <!-- End container -->
</main>
<!-- End main -->


@endsection

@section('scripts')



@stop('scripts')
