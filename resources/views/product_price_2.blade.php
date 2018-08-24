@extends('layouts.template')

@section('title')
Product Price | MASTER PHOTO NETWORK
@stop

@section('stylesheet')
<link href="{{url('master/assets/css/admin.css')}}" rel="stylesheet">
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
        <h2 class="major"><span style="background: #fff;">ราคากรอบลอย และ กรอบวิทยาศาสตร์</span></h2>

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



  					<h3> <span>ราคากรอบลอย และ กรอบวิทยาศาสตร์</span></h3>
  					<p>
  						ทาง <strong>ร้านมาสเตอร์</strong> มีสินค้าและบริการที่ครบวงจร เพื่อรองรับความต้องการของท่าน ท่านสามารถสอบถามรายละเอียดกับทางสาขาต่างๆ ได้ทุกเมื่อค่ะ
  					</p>
            <hr style="border-top: 2px solid #ddd;"/>
            <div class="row">



              <div id="tabs" class="tabs">
              				<nav>
              					<ul>
              						<li class="tab-current"><a href="#section-1" class="icon-magic"><span>กรอบลอยด้าน</span></a>
              						</li>
              						<li><a href="#section-2" class="icon-th-large"><span>กรอบลอยเงา</span></a>
              						</li>
              						<li><a href="#section-3" class="icon-link-ext"><span>กรอบวิทย์ด้าน</span></a>
              						</li>
              						<li><a href="#section-4" class="icon-bookmark"><span>กรอบวิทย์เงา</span></a>
              						</li>
                          <li><a href="#section-5" class="icon-picture"><span>ตัวอย่างลายกรอบวิทย์</span></a>
              						</li>
              					</ul>
              				</nav>
              				<div class="content">

              					<section id="section-1" class="content-current">


                          <div class="row">


                            <p class="text-danger">
                  					 <strong>**ตั้งแต่ 600 ตารางนิ้วขึ้นไป  คิดตารางนิ้วละ 1.10 บาท</strong>
                  					</p>


                            <div class="table-responsive" style="padding:8px;">
                                                       <table class="table table-bordered table-striped">
                                                        <thead class="uppercase">
                                                            <tr class="success">
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                          <?php

                                                 $urlpath = 'assets/table_price/bordered_1.csv';

                                               //  $urlpath = file_get_contents($urlpath);
                                          // header('Content-Type: text/html; charset=utf-8');
                                            $urlpath =  utf8_encode($urlpath);
                                          $urlpath = iconv("TIS-620", "utf-8", $urlpath);

                                         //$urlpath = trim($urlpath);
                                            $f = fopen($urlpath, "r");
                                            while (($line = fgetcsv($f)) !== false) {
                                                    echo "<tr >";

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
                          <!-- End row -->


              					</section>
              					<!-- End section 1 -->

              					<section id="section-2">
                          <div class="row">


                            <p class="text-danger">
                  					 <strong>**ตั้งแต่ 600 ตารางนิ้วขึ้นไป  คิดตารางนิ้วละ 1.10 บาท</strong>
                  					</p>


                            <div class="table-responsive" style="padding:8px;">
                                                       <table class="table table-bordered table-striped">
                                                        <thead class="uppercase">
                                                            <tr class="success">
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                          <?php

                                                 $urlpath = 'assets/table_price/bordered_2.csv';

                                               //  $urlpath = file_get_contents($urlpath);
                                          // header('Content-Type: text/html; charset=utf-8');
                                            $urlpath =  utf8_encode($urlpath);
                                          $urlpath = iconv("TIS-620", "utf-8", $urlpath);

                                         //$urlpath = trim($urlpath);
                                            $f = fopen($urlpath, "r");
                                            while (($line = fgetcsv($f)) !== false) {
                                                    echo "<tr >";

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
                          <!-- End row -->

              					</section>
              					<!-- End section 2 -->

              					<section id="section-3">
                          <div class="row">


                            <p class="text-danger">
                  					 <strong>**ตั้งแต่ 600 ตารางนิ้วขึ้นไป  คิดตารางนิ้วละ 1.10 บาท</strong>
                  					</p>


                            <div class="table-responsive" style="padding:8px;">
                                                       <table class="table table-bordered table-striped">
                                                        <thead class="uppercase">
                                                            <tr class="success">
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                          <?php

                                                 $urlpath = 'assets/table_price/bordered_3.csv';

                                               //  $urlpath = file_get_contents($urlpath);
                                          // header('Content-Type: text/html; charset=utf-8');
                                            $urlpath =  utf8_encode($urlpath);
                                          $urlpath = iconv("TIS-620", "utf-8", $urlpath);

                                         //$urlpath = trim($urlpath);
                                            $f = fopen($urlpath, "r");
                                            while (($line = fgetcsv($f)) !== false) {
                                                    echo "<tr >";

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
                          <!-- End row -->


              						<!-- End row -->
              					</section>
              					<!-- End section 3 -->

              					<section id="section-4">





                          <div class="row">


                            <p class="text-danger">
                  					 <strong>**ตั้งแต่ 600 ตารางนิ้วขึ้นไป  คิดตารางนิ้วละ 1.10 บาท</strong>
                  					</p>


                            <div class="table-responsive" style="padding:8px;">
                                                       <table class="table table-bordered table-striped">
                                                        <thead class="uppercase">
                                                            <tr class="success">
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                                <th>ขนาด</th>
                                                                <th>ราคา</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                          <?php

                                                 $urlpath = 'assets/table_price/bordered_4.csv';

                                               //  $urlpath = file_get_contents($urlpath);
                                          // header('Content-Type: text/html; charset=utf-8');
                                            $urlpath =  utf8_encode($urlpath);
                                          $urlpath = iconv("TIS-620", "utf-8", $urlpath);

                                         //$urlpath = trim($urlpath);
                                            $f = fopen($urlpath, "r");
                                            while (($line = fgetcsv($f)) !== false) {
                                                    echo "<tr >";

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
                          <!-- End row -->














                      </section>
              					<!-- End section 4 -->


                        <section id="section-5" >

                          <div class="row">

                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-001.JPG')}}" class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-002.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-003.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-004.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-005.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-006.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-007.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-008.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-009.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-010.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-011.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-012.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-013.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-014.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-015.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-016.JPG')}}"  class="img-responsive styled">
                            </div>


                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-017.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-018.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-019.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-020.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-021.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-022.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-023.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-024.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-025.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-026.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-027.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-028.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-029.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-030.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-031.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-032.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-033.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-034.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-035.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-036.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-037.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-038.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-039.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-040.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-041.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-042.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-043.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-044.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-045.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-046.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-047.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-048.JPG')}}"  class="img-responsive styled">
                            </div>

                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-049.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-050.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-051.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-052.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-053.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-054.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-055.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-056.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-057.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-058.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-059.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-060.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-061.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-062.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-063.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-064.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-065.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-066.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-067.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-068.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-069.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-070.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-071.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-072.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-073.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-074.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-075.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-076.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-077.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-078.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-079.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-080.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-081.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-082.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-083.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-084.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-085.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-086.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-087.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-088.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-089.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-090.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-091.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-092.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-093.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-094.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-095.JPG')}}"  class="img-responsive styled">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <img src="{{url('assets/nice_places/image-096.JPG')}}"  class="img-responsive styled">
                            </div>








                          </div>
                          <br /><br />
                          <div class="col-md-12">
                            <h4>วิธีการสั่งทำกรอบลอย ส่งไฟล์รูปพร้อมรายละเอียด ดังนี้  <span class="head-lines-green"></span></h4>
                            <ol>
                              <li>
                                ระบุขนาดและจำนวนที่ต้องการ
                              </li>
                              <li>
                                ระบุประเภทของกรอบที่ต้องการ (กรอบลอยตัน หรือ กรอบลอยโครง)
                              </li>
                              <li>
                                ระบุพื้นผิวของกรอบที่ต้องการ (เงา หรือ ด้าน)
                              </li>
                            </ol>
                            <br />
                            <h4>วิธีการสั่งทำกรอบวิทยาศาสตร์ ส่งไฟล์รูปพร้อมรายละเอียด ดังนี้  <span class="head-lines-green"></span></h4>
                            <ol>
                              <li>
                                ระบุขนาดและจำนวนที่ต้องการ
                              </li>
                              <li>
                                ระบุพื้นผิวของกรอบที่ต้องการ (เงา หรือ ด้าน)
                              </li>
                              <li>
                                ระบุลายที่ต้องการ ชมลายกรอบวิทยาศาสตร์ทั้งหมดได้
                              </li>
                            </ol>
                            <br />
                            <p>
                              ส่งรายละเอียดทั้งหมดมาที่อีเมล์ master-print@hotmail.com <br />
                              พร้อมชื่อและเบอร์ติดต่อกลับ และวิธีการจัดส่งที่ต้องการ (รายละเอียดเพิ่มเติม) <br />
                              กรอบลอยและกรอบวิทยาศาสตร์ใช้เวลาดำเนินการจัดทำ 3 วัน หลังจากวันที่ชำระเงิน (ไม่รวมวันอาทิตย์)
                            </p>
                            <p>
                              สอบถามรายละเอียดเพิ่มเติมได้ที่
                               มาสเตอร์ออนไลน์ ทุกวัน 8.00-22.00 น.
                               <strong>โทร. 02-513-0105</strong>
                            </p>
                          </div>

                        </section>
                  			<!-- End section 5 -->





              					</div>
              					<!-- End content -->
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

<script src="{{url('master/assets/js/tabs.js')}}"></script>
<script>
		new CBPFWTabs(document.getElementById('tabs'));
	</script>

@stop('scripts')
