@extends('layouts.template')

@section('title')
CONTACT US | MASTER PHOTO NETWORK
@stop

@section('stylesheet')
<style>
#map {
  width: 100%;
  height: 450px;
}
.p_15{
  font-size: 15px;
  font-weight: 700;
}
</style>
@stop('stylesheet')
@section('content')

<main class="white_bg slider-pro" >




  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span style="background: #fff;">CONTACT US</span></h2>

    </div>

    <div class="row">




        <div class="col-md-10 col-md-offset-1 ">


          <h3>{{ trans('message.re_cp') }}</h3>

              <p class="text-warning">
                <strong> {{ trans('message.re_cp2') }}</strong>
              </p>
              <br />

          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/online.png')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>แผนก Online </strong></h3>
									<p style="line-height: 25px;">
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 02-513-0105 <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทรศัพท์มือถือ : 086-600-5055 <br />
                    <i class="icon_set_1_icon-95 p_15" ></i> Fax. 02-939-3080 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 8.00-21.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a href=""  class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>



          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/master_1.jpg')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขาตรงข้ามเซ็นทรัลลาดพร้าว  </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> ตั้งอยู่ ตรงข้ามเซ็นทรัลลาดพร้าว <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 0-2930-9388-9 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 8.00-21.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a onclick="MM_openBrWindow('https://www.google.co.th/maps/@13.815854,100.561655,3a,90y,119.17h,101.16t/data=!3m4!1e1!3m2!1sE90ZFii-omJXpA7uYluLTA!2e0','','width=700,height=550')"
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>



          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/pic_26584_300.png')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขารามอินทรา กม.4   </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> อยู่ตรงข้ามตลาด กม.4 <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 0-2971-9127-8 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 9.00-21.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a onclick="MM_openBrWindow('https://www.google.co.th/maps/@13.857358,100.627662,3a,75y,213.05h,100.15t/data=!3m4!1e1!3m2!1sqbJXnQDzmsNkywog08rwEw!2e0','','width=700,height=550')"
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>



          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/master_2.jpg')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขาบางแค    </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> อยู่ติดทางออก The Mall ฝั่งถนนกาญจนาภิเษก <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 0-2455-8903-4 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 8.30-21.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a onclick="MM_openBrWindow('https://www.google.co.th/maps/@13.715466,100.406265,3a,75y,113.22h,104.12t/data=!3m4!1e1!3m2!1sXD9X0zkZf1rxQ4Xnc2--og!2e0','','width=700,height=550')"
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>


          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/master_3.jpg')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขาปากซอยหมู่บ้านเศรษฐกิจ     </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> ติดถนนเพชรเกษม ปากทางเข้าหมู่บ้านเศรษฐกิจข้างโรงเรียนอนุบาลเด่นหล้า <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 0-2809-4495-6 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 8.00-20.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a onclick="MM_openBrWindow('https://www.google.co.th/maps/@13.708431,100.378262,3a,75y,2.33h,87.81t/data=!3m4!1e1!3m2!1saYtNz_veAecKiCEinvHdlQ!2e0','','width=700,height=550')"
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>



          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/satorn.gif')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขา สาทร      </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> อยู่ภายในโรงแรม เดอะแอม บาซี่ โฮลเทล อยู่ก่อนถึงสถานฑูตมาเลเซีย <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 02-679-1511 <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 089-682-9888 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 9.00-19.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a onclick="MM_openBrWindow('https://www.google.co.th/maps/@13.7240692,100.5381878,3a,90y,164.31h,114.11t/data=!3m6!1e1!3m4!1s59sxyw5HeFsY1nxYeG1Tdw!2e0!7i13312!8i6656?hl=th','','width=700,height=550')"
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>



          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/master_4.jpg')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขาสุขาภิบาล 3 (รามคำแหง)   </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> อยู่ตรงข้าม Tops Supermarket ถ.สุขาภิบาล 3 (ติดVIVA) <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 0-2729-5592 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 8.00-20.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a onclick="MM_openBrWindow('https://www.google.co.th/maps/@13.774563,100.669279,3a,47.4y,104.88h,94.49t/data=!3m4!1e1!3m2!1s66mWDMfw7xPwgHCOZ1yb5w!2e0','','width=700,height=550')"
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>




          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/master_5.jpg')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขาลาดพร้าว 99   </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> อยู่ปากซอยลาดพร้าว 99 ติดธ.กรุงเทพ <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 0-2538-1477-8 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 9.00-19.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a onclick="MM_openBrWindow('https://www.google.co.th/maps/@13.776537,100.626543,3a,75y,357.13h,91.02t/data=!3m4!1e1!3m2!1sJInIDcFoIR2hRoMODlbuAw!2e0','','width=700,height=550')"
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>



          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/master_6.jpg')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขาเสรีไทย   </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> อยู่ปากซอยเสรีไทย 3 ตรงข้าม ธ.กรุงเทพ สาขาคลองจั่น <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 0-2378-1158 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 9.00-19.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a onclick="MM_openBrWindow('https://www.google.co.th/maps/@13.767232,100.649629,3a,75y,321.97h,125.41t/data=!3m4!1e1!3m2!1sNQ-dm7ssOvHlDqQ8VsbP0A!2e0','','width=700,height=550')"
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>




          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/master_7.jpg')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขาเกษตร    </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> อยู่ตรงข้ามประตู 1 ม.เกษตรศาสตร์ ด้านถนนงามวงศ์วาน <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 0-2941-1161 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 8.30-19.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a onclick="MM_openBrWindow('https://www.google.co.th/maps/@13.841784,100.571633,3a,75y,197.25h,93.57t/data=!3m4!1e1!3m2!1sk6SUSof3XudX6eCWLueYSQ!2e0','','width=700,height=550')"
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>




          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/master_8.jpg')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขา พัฒนาการ    </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> อยู่ ปากซอยพัฒนาการ 57/1 <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 0-2722-0703-4 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 9.00-19.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a onclick="MM_openBrWindow('https://www.google.co.th/maps/@13.729739,100.654843,3a,75y,47.13h,100.67t/data=!3m4!1e1!3m2!1s8ICyGRTBiBdTXnijBxpyEQ!2e0','','width=700,height=550')"
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>



          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/master_9.jpg')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขา รามคำแหง 150    </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> อยู่ ปากซอยรามคำแหง 150 <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 0-2728-0113 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 8.00-19.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a onclick="MM_openBrWindow('https://www.google.co.th/maps/@13.787647,100.693124,3a,78.4y,162.98h,97.62t/data=!3m4!1e1!3m2!1s3fOH8ZajfepWfVKaldA5lA!2e0','','width=700,height=550')"
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>



          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/M15.gif')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขา ราชพฤกษ์    </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> อยู่ใกล้กับ HomePro สาขาราชพฤกษ์ <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 02-4087282-3 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 9.30-19.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a onclick="MM_openBrWindow('https://www.google.com/maps/place/MASTER+PHOTO+NETWORK+%E0%B8%AA%E0%B8%B2%E0%B8%82%E0%B8%B2+%E0%B8%A3%E0%B8%B2%E0%B8%8A%E0%B8%9E%E0%B8%A4%E0%B8%81%E0%B8%A9%E0%B9%8C/@13.8177465,100.4490029,3a,75y,261.36h,95.69t/data=!3m6!1e1!3m4!1sPtc-wNRk2Igqe9UTaXUIrA!2e0!7i13312!8i6656!4m12!1m6!3m5!1s0x30e29a7070c9449f:0x4b6b04ad6973e231!2zTUFTVEVSIFBIT1RPIE5FVFdPUksg4Liq4Liy4LiC4LiyIOC4o-C4suC4iuC4nuC4pOC4geC4qeC5jA!8m2!3d13.8178181!4d100.4488938!3m4!1s0x30e29a7070c9449f:0x4b6b04ad6973e231!8m2!3d13.8178181!4d100.4488938','','width=700,height=550')"
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>



          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/master_10.jpg')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขา รามอินทรา กม. 8    </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> อยู่ปากซอยคู้บอน <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 02-943-1008-9 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 10.00-19.30 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a onclick="MM_openBrWindow('https://www.google.com/maps/@13.8573108,100.6276118,3a,75y,204.87h,93.69t/data=!3m7!1e1!3m5!1s1wpdem9z91e3XM7f8HrTiw!2e0!6s%2F%2Fgeo2.ggpht.com%2Fcbk%3Fpanoid%3D1wpdem9z91e3XM7f8HrTiw%26output%3Dthumbnail%26cb_client%3Dsearch.TACTILE.gps%26thumb%3D2%26w%3D96%26h%3D64%26yaw%3D202.74777%26pitch%3D0%26thumbfov%3D100!7i13312!8i6656','','width=700,height=550')"
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>



          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/master_11.jpg')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขา วัชรพล  </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> ท้ายซอยรามอินทรา 65 ก่อนเลี้ยวเข้าตลาดถนอมมิตร <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 02-945-8861 <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> Fax: 02-945-8864 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 9.30-19.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a onclick="MM_openBrWindow('https://www.google.com/maps/uv?hl=th&pb=!1s0x311d62c93059a7e5:0x7e6b1db019e227e8!2m22!2m2!1i80!2i80!3m1!2i20!16m16!1b1!2m2!1m1!1e1!2m2!1m1!1e3!2m2!1m1!1e5!2m2!1m1!1e4!2m2!1m1!1e6!3m1!7e115!4zL21hcHMvcGxhY2UvbWFzdGVyKyVFMCVCOCVBQSVFMCVCOCVCMiVFMCVCOCU4MiVFMCVCOCVCMislRTAlQjglQTclRTAlQjglQjElRTAlQjglOEElRTAlQjglQTMlRTAlQjglOUUlRTAlQjglQTUvQDEzLjg1OTA1NjYsMTAwLjY0NzA0ODgsM2EsNzV5LDY5LjM4aCw5MHQvZGF0YT0hM200ITFlMSEzbTIhMXNOM3JmU1Atcl96djE4V3d2cE8wUVFnITJlMCE0bTIhM20xITFzMHgzMTFkNjJjOTMwNTlhN2U1OjB4N2U2YjFkYjAxOWUyMjdlOA!5zbWFzdGVyIOC4quC4suC4guC4siDguKfguLHguIrguKPguJ7guKUgLSDguITguYnguJnguKvguLLguJTguYnguKfguKIgR29vZ2xl&imagekey=!1e2!2sN3rfSP-r_zv18WwvpO0QQg&sa=X&ved=2ahUKEwiM1JyX-tbcAhWFb30KHcKSDIMQpx8wD3oECAkQCQ','','width=700,height=550')"
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>



          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/pic_26584_3d00.png')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขา สวนพลู  </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> 562/11 ซอยสวนพลู แขวงทุ่งมหาเมฆ เขตสาทร กรุงเทพ 10120 <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 02-012-9610, 02-012-9611<br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 9.00-19.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>


          <div class="strip_all_tour_list" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">

									<img src="{{url('master/assets/image/th_1134386378.jpg')}}" alt="Image" class="img-responsive" style="width:100%">

							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<br />
									<h3><strong>สาขา พระประแดง  </strong> </h3>
									<p style="line-height: 25px; ">
                    <i class="icon_set_1_icon-41 p_15" ></i> อยู่ก่อนถึง Big C พระประแดง  <br />
                    <i class="icon_set_1_icon-90 p_15" ></i> โทร : 02-010-1930 <br />

                    <i class="icon_set_1_icon-83 p_15" ></i> เปิด 9.00-20.00 น.
                  </p>
								</div>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-2">
								<div class="price_list">
									<div>
										<p><a onclick="MM_openBrWindow('https://www.google.co.th/maps/@13.6544208,100.5207987,3a,75y,99.03h,101.49t/data=!3m6!1e1!3m4!1sTEoCuXNT5LB9igMtFLCUKA!2e0!7i13312!8i6656','','width=700,height=550')"
                      class="btn_1" style="font-size:14px;">คลิกที่นี่เพื่อดูแผนที่</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>



              <h5 class="text-center"> <strong> ติดต่อได้ที่เบอร์โทร 02-513-0105, Line ID : @masterphotonetwork, Fax. 02-939-3080 ทุกวัน เวลา 8.00-22.00น.</strong></h5>





				</div>





    </div>









  </div>
  <!-- End container -->
</main>
<!-- End main -->


@endsection

@section('scripts')

<script type="text/JavaScript"><!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
// --></script>

@stop('scripts')
