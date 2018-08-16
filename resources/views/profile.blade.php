@extends('layouts.template')

@section('title')
user profile
@stop

@section('stylesheet')
<link href="{{url('master/assets/css/admin.css')}}" rel="stylesheet">

@stop('stylesheet')
@section('content')


<main class=" slider-pro" >




  <div class="container margin_60">

    <div class=" margin_30 text-center">
      <h2 class="major"><span>Profile & Setting </span></h2>

    </div>

    <div class="row">


      <div id="tabs" class="tabs">
      				<nav>
      					<ul>
      						<li class="tab-current"><a href="#section-1" class="icon-booking"><span>My Order</span></a>
      						</li>
      						<li><a href="#section-2" class="icon-wishlist"><span>My Credit</span></a>
      						</li>

      						<li><a href="#section-4" class="icon-profile"><span>Profile</span></a>
      						</li>
      					</ul>
      				</nav>
      				<div class="content">

      					<section id="section-1" class="content-current">


      						<div class="strip_booking">
      							<div class="row">
      								<div class="col-md-2 col-sm-2">
      									<img src="{{url('master/assets/images/a461.jpg')}}" alt="Pic" class="img-responsive img-thumbnail">
      								</div>
      								<div class="col-md-6 col-sm-5">
      									<h3 class="hotel_booking">70% off 5x7 Stationery Flat Cards.<span>4 x 6 in., เต็มไฟล์</span></h3>
      								</div>
      								<div class="col-md-4 col-sm-3">
      									<ul class="info_booking">
      										<li><strong>ORDER id</strong> 23442</li>
      										<li><strong>ORDER on</strong> Sat. 23 Dec. 2015</li>
      									</ul>
      								</div>

      							</div>
      							<!-- End row -->
      						</div>
      						<!-- End strip booking -->

                  <div class="strip_booking">
      							<div class="row">
      								<div class="col-md-2 col-sm-2">
      									<img src="{{url('master/assets/images/31025037_142654333256341_439731293068984320_n.jpg')}}" alt="Pic" class="img-responsive img-thumbnail">
      								</div>
      								<div class="col-md-6 col-sm-5">
      									<h3 class="hotel_booking">70% off 5x7 Stationery Flat Cards.<span>4 x 6 in., เต็มไฟล์</span></h3>
      								</div>
      								<div class="col-md-4 col-sm-3">
      									<ul class="info_booking">
      										<li><strong>ORDER id</strong> 23442</li>
      										<li><strong>ORDER on</strong> Sat. 23 Dec. 2015</li>
      									</ul>
      								</div>

      							</div>
      							<!-- End row -->
      						</div>
      						<!-- End strip booking -->



      					</section>
      					<!-- End section 1 -->

      					<section id="section-2">
      						<div class="row">

                    <div class="col-md-12">
      								<h4>My Credit : <strong>800</strong> Point</h4>
                      <br />

                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <td>
                                #
                              </td>
                              <td>
                                วันที่ยืนยัน
                              </td>
                              <td>
                                หมายเลขยืนยัน
                              </td>
                              <td>
                                จำนวนเงิน (บาท)
                              </td>
                              <td>
                                แต้มที่ได้
                              </td>
                              <td>
                                ช่องทางชำระเงิน
                              </td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                1
                              </td>
                              <td>
                                Fri Jul 20 14:53:38 2018
                              </td>
                              <td>
                                1949380798946441896
                              </td>
                              <td>
                                1,500 บาท
                              </td>
                              <td>
                                2,500 Point
                              </td>
                              <td>
                                visa cart XXX-X-X3180-X
                              </td>
                            </tr>
                            <tr>
                              <td>
                                2
                              </td>
                              <td>
                                Fri Jul 20 14:53:38 2018
                              </td>
                              <td>
                                1949380798946441896
                              </td>
                              <td>
                                1,500 บาท
                              </td>
                              <td>
                                2,500 Point
                              </td>
                              <td>
                                visa cart XXX-X-X3180-X
                              </td>
                            </tr>
                            <tr>
                              <td>
                                3
                              </td>
                              <td>
                                Fri Jul 20 14:53:38 2018
                              </td>
                              <td>
                                1949380798946441896
                              </td>
                              <td>
                                1,500 บาท
                              </td>
                              <td>
                                2,500 Point
                              </td>
                              <td>
                                visa cart XXX-X-X3180-X
                              </td>
                            </tr>
                            <tr>
                              <td>
                                4
                              </td>
                              <td>
                                Fri Jul 20 14:53:38 2018
                              </td>
                              <td>
                                1949380798946441896
                              </td>
                              <td>
                                1,500 บาท
                              </td>
                              <td>
                                2,500 Point
                              </td>
                              <td>
                                visa cart XXX-X-X3180-X
                              </td>
                            </tr>
                            <tr>
                              <td>
                                4
                              </td>
                              <td>
                                Fri Jul 20 14:53:38 2018
                              </td>
                              <td>
                                1949380798946441896
                              </td>
                              <td>
                                1,500 บาท
                              </td>
                              <td>
                                2,500 Point
                              </td>
                              <td>
                                visa cart XXX-X-X3180-X
                              </td>
                            </tr>
                            <tr>
                              <td>
                                4
                              </td>
                              <td>
                                Fri Jul 20 14:53:38 2018
                              </td>
                              <td>
                                1949380798946441896
                              </td>
                              <td>
                                1,500 บาท
                              </td>
                              <td>
                                2,500 Point
                              </td>
                              <td>
                                visa cart XXX-X-X3180-X
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p class="text-success">
                          ข้อความการสั่งซื้อ จะถูกส่งไปยังอีเมล เพื่อเป็นใบเสร็จรับเงินของคุณ คุณยังสามารถเข้าถึง ประวัติการสั่งซื้อ ของคุณแบบออนไลน์ได้ตลอดเวลาอีกด้วย
                        </p>
                      </div>
      							</div>
                    <br />
                    <div class="col-md-12">
                    <hr />
                    </div>
                    <div class="col-md-12">
                      <h3>Master Point pricing</h3>
                      <div class="row" id="pricing_2">
				<div class="col-md-3 col-sm-6">

					<div class="pricing-table black ">
						<div class="pricing-table-header">
							<span class="heading">Single Tour</span>
							<span class="price-value"><span>30</span><span class="mo">$</span></span>
						</div>
						<div class="pricing-table-space "></div>
						<div class="pricing-table-features">
							<p><strong>One month</strong> valid</p>
							<p><strong> Saving</strong> %</p>
							<p><strong>Saving price</strong> 0$</p>
							<p>-</p>
						</div>

						<div class="pricing-table-sign-up">
							<a href="payment.php" class="btn_1">BUY NOW!</a>
						</div>

					</div>
					<!-- End pricing-table-->
				</div>
				<!-- End col-md-3 -->

				<div class="col-md-3 col-sm-6">
					<div class="pricing-table black">
						<div class="pricing-table-header">
							<span class="heading">4 Tours</span>
							<span class="price-value"><span>280</span><span class="mo">$</span></span>
						</div>
						<div class="pricing-table-space "></div>
						<div class="pricing-table-features">
							<p><strong>Three month</strong> valid</p>
							<p><strong> Saving </strong> 20%</p>
							<p><strong>Saving price</strong> 40$</p>
							<p><strong>Unlimited  </strong>access</p>
						</div>

						<div class="pricing-table-sign-up">
							<a href="payment.php" class="btn_1">BUY NOW!</a>
						</div>

					</div>
					<!-- End pricing-table-->
				</div>
				<!-- End col-md-3 -->

				<div class="col-md-3 col-sm-6">
					<div class="pricing-table green ">
						<span class="ribbon_2"></span>
						<div class="pricing-table-header">
							<span class="heading">Full Access</span>
							<span class="price-value"><span>39</span><span class="mo">$ monthly</span></span>

						</div>
						<div class="pricing-table-space"></div>
						<div class="pricing-table-features">
							<p><strong>12 month</strong> valid</p>
							<p><strong> Saving </strong> 30%</p>
							<p><strong>Saving price</strong> 80$</p>
							<p><strong>Unlimited  </strong>access</p>
						</div>

						<div class="pricing-table-sign-up">
							<a href="payment.php" class="btn_1">BUY NOW!</a>
						</div>

					</div>
					<!-- End pricing-table-->
				</div>
				<!-- End col-md-3 -->

				<div class="col-md-3 col-sm-6">
					<div class="pricing-table black">
						<div class="pricing-table-header">
							<span class="heading">Full + Travel guide</span>
							<span class="price-value"><span>800</span><span class="mo">$</span></span>
						</div>
						<div class="pricing-table-space "></div>
						<div class="pricing-table-features">
							<p><strong>Nine month</strong> valid</p>
							<p><strong> Saving </strong> 40%</p>
							<p><strong>Saving price</strong> 120$</p>
							<p><strong>Unlimited  </strong>access + Extra</p>
						</div>

						<div class="pricing-table-sign-up">
							<a href="payment.php" class="btn_1">BUY NOW!</a>
						</div>

					</div>
					<!-- End pricing-table-->
				</div>
				<!-- End col-md-3 -->


			</div>
                    </div>




                    <br />
                    <div class="col-md-12">
                    <hr />
                    </div>


                    <div class="col-md-12">
                      <h3>Membership FAQ</h3>

                      <div class="row">

                				<div class="col-md-4">
                					<div class="question_box">
                						<h3>No sit debitis meliore postulant, per ex prompta alterum sanctus?</h3>
                						<p>
                							Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.
                						</p>
                					</div>
                				</div>

                				<div class="col-md-4">
                					<div class="question_box">
                						<h3>Autem putent singulis usu ea, bonorum suscipit eum?</h3>
                						<p>
                							Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.
                						</p>
                					</div>
                				</div>

                				<div class="col-md-4">
                					<div class="question_box">
                						<h3>Pro moderatius philosophia ad, ad mea mupercipitur?</h3>
                						<p>
                							Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.
                						</p>
                					</div>
                				</div>

                			</div>
                    </div>




      						</div>
      						<!-- End row -->

      					</section>
      					<!-- End section 2 -->



      					<section id="section-4">
      						<div class="row">

      							<div class="col-md-6 col-sm-6">
      								<h4>Your profile</h4>
      								<ul id="profile_summary">
      									<li>Username <span>info@clara.com</span>
      									</li>
      									<li>First name <span>Clara</span>
      									</li>
      									<li>Last name <span>Tomson</span>
      									</li>
      									<li>Phone number <span>+00 032 42366</span>
      									</li>
      									<li>Date of birth <span>13/04/1975</span>
      									</li>
      									<li>Street address <span>24 Rue de Rivoli</span>
      									</li>
      									<li>Town/City <span>Paris</span>
      									</li>
      									<li>Zip code <span>002843</span>
      									</li>
      									<li>Country <span>France</span>
      									</li>
      								</ul>
      							</div>
      							<div class="col-md-6 col-sm-6">
      								<img src="{{url('master/assets/images/30590074_1974411309540856_4745937165567918080_n.jpg')}}" style="max-width:350px;" alt="Image" class="img-responsive styled profile_pic">
      								<p></p>
      							</div>
      						</div>
      						<!-- End row -->

      						<div class="divider"></div>

      						<div class="row">
      							<div class="col-md-12">
      								<h4>Edit profile</h4>
      							</div>
      							<div class="col-md-6 col-sm-6">
      								<div class="form-group">
      									<label>First name</label>
      									<input class="form-control" name="first_name" id="first_name" type="text">
      								</div>
      							</div>
      							<div class="col-md-6 col-sm-6">
      								<div class="form-group">
      									<label>Last name</label>
      									<input class="form-control" name="last_name" id="last_name" type="text">
      								</div>
      							</div>
      						</div>
      						<!-- End row -->

      						<div class="row">
      							<div class="col-md-6 col-sm-6 ">
      								<div class="form-group">
      									<label>Phone number</label>
      									<input class="form-control" name="email_2" id="email_2" type="text">
      								</div>
      							</div>
      							<div class="col-md-6 col-sm-6 ">
      								<div class="form-group">
      									<label>Date of birth <small>(dd/mm/yyyy)</small>
      									</label>
      									<input class="form-control" name="email" id="email" type="text">
      								</div>
      							</div>
                    <div class="col-md-6 col-sm-6 ">
      								<div class="form-group">
      									<label>Email
      									</label>
      									<input class="form-control" name="email" id="email" type="text">
      								</div>
      							</div>
      						</div>
      						<!-- End row -->

      						<hr>



                  <div class="row">
                    <div class="col-md-12">
      								<h4>Change your password</h4>
      							</div>
                    <div class="col-md-6 col-sm-6 ">

      								<div class="form-group">
      									<label>Old password</label>
      									<input class="form-control" name="old_password" id="old_password" type="password">
      								</div>

      							</div>
                    <div class="col-md-6 col-sm-6 ">
                    <div class="form-group">
                      <label>New password</label>
                      <input class="form-control" name="new_password" id="new_password" type="password">
                    </div>
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                    <div class="form-group">
                      <label>Confirm new password</label>
                      <input class="form-control" name="confirm_new_password" id="confirm_new_password" type="password">
                    </div>
                    </div>
      						</div>
      						<!-- End row -->

                  <hr>


      						<div class="row">
      							<div class="col-md-12">
      								<h4>Edit address</h4>
      							</div>
      							<div class="col-md-6 col-sm-6">
      								<div class="form-group">
      									<label>Street address</label>
      									<input class="form-control" name="first_name" id="first_name" type="text">
      								</div>
      							</div>
      							<div class="col-md-6 col-sm-6">
      								<div class="form-group">
      									<label>City/Town</label>
      									<input class="form-control" name="last_name" id="last_name" type="text">
      								</div>
      							</div>
      						</div>
      						<!-- End row -->

      						<div class="row">
      							<div class="col-md-6 col-sm-6">
      								<div class="form-group">
      									<label>Zip code</label>
      									<input class="form-control" name="email" id="email" type="text">
      								</div>
      							</div>
      							<div class="col-md-6 col-sm-6">
      								<div class="form-group">
      									<label>Country</label>
      									<select id="country" class="form-control" name="country">
      										<option value="">Select...</option>
      									</select>
      								</div>
      							</div>
      						</div>
      						<!-- End row -->

      						<hr>
      						<h4>Upload profile photo</h4>
      						<div class="form-inline upload_1">
      							<div class="form-group">
      								<input type="file" name="files[]" id="js-upload-files" multiple="">
      							</div>
      							<button type="submit" class="btn_1 green" id="js-upload-submit">Upload file</button>
      						</div>

      						<!-- Hidden on mobiles -->
      						<div class="hidden-xs">
      							<!-- Drop Zone -->
      							<h5>Or drag and drop files below</h5>
      							<div class="upload-drop-zone" id="drop-zone">
      								Just drag and drop files here
      							</div>
      							<!-- Progress Bar -->
      							<div class="progress">
      								<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
      									<span class="sr-only">60% Complete</span>
      								</div>
      							</div>
      							<!-- Upload Finished -->
      							<div class="js-upload-finished">
      								<h5>Processed files</h5>
      								<div class="list-group">
      									<a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-01.jpg</a>
      								</div>
      							</div>
      							<!-- End Hidden on mobiles -->

      							<hr>
      							<button type="submit" class="btn_1 green">Update Profile</button>
      					</div></section>
      					<!-- End section 4 -->

      					</div>
      					<!-- End content -->
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

</body>

@stop('scripts')
