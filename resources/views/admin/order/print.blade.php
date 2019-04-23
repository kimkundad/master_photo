<html>
	<head>
		<title>Porto Admin - Invoice Print</title>
		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('./assets/vendor/bootstrap/css/bootstrap.css')}}" />

		<!-- Invoice Print Style -->
		<link rel="stylesheet" href="{{asset('./assets/css/invoice-print.css')}}" />
    <style>
    h4, .h4, h5, .h5, h6, .h6 {
    margin-top: 0px;
    margin-bottom: 5px;
    padding-left: 8px;
}
address{
  padding: 10px;
  background-color: #fff;
border: 1px solid #ddd;
 font-size: 11px;
    border-radius: 0.25rem;
    margin-bottom: 8px;
}
.col-md-6{
  padding-right: 1px;
    padding-left: 1px;
}

.bil_detail{
  padding: 15px;

border: 1px solid #ddd;
 font-size: 13px;
    border-radius: 0.25rem;

}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 5px;
    line-height: 1.42857143;
    vertical-align: top;
    font-size: 13px;
    border-top: 1px solid #ddd;
}
    </style>
	</head>
	<body>




		<div class="invoice">
			<header class="clearfix">
				<div class="row">
					<div class="col-sm-6 mt-3">

					</div>
					<div class="col-sm-6 text-right mt-3 mb-3">
						<div class="ib mr-5">
							<h4 class="h4 m-0 text-dark font-weight-bold">สำหรับลูกค้า</h4>
							เลขที่ใบสั่งซื้อ : {{$obj->code_gen}}

						</div>

					</div>
				</div>
			</header>


			<div class="bill-info">
        <table class="table " style="margin-bottom: 0px;">
				<div class="row">
          <td style="border-top: 1px solid #fff; padding: 0px; padding-right: 8px; width:50%">
					<div class="col-md-6" style="width:100%">
						<div class="bill-to" style="width:100%">
							<p class="h5 mb-1 text-dark font-weight-semibold">ผู้สั่งซื้อ</p>
							<address>
                <b>ชื่อ - นามสกุล </b> {{$obj->name}}
								<br/>
								<b>ที่อยู่ </b> {{$get_address->address_ad}} {{$subdistricts->DISTRICT_NAME}} {{$district->AMPHUR_NAME}} {{$province->PROVINCE_NAME}} {{$get_address->zip_code}}
								<br/>
								<b>เบอร์ติดต่อ </b>: {{$get_address->phone_ad}}
								<br/>
								<b>Email </b> {{$obj->email}}
							</address>
						</div>
					</div>
          </td>
          <td style="border-top: 1px solid #fff; padding: 0px; width:50%">
					<div class="col-md-6" style="width:100%">
            <div class="bill-to" style="width:100%">
							<p class="h5 mb-1 text-dark font-weight-semibold">สถานที่จัดส่ง</p>
							<address>
								<b>วิธีการรับสินค้า </b> {{$obj->deliver_order}}
								<br/>
								<b>สถานที่ </b>
								{{$obj->shipping_t1}} {{$obj->shipping_t2}} {{$get_address->address_ad}} {{$subdistricts->DISTRICT_NAME}} {{$district->AMPHUR_NAME}} {{$province->PROVINCE_NAME}} {{$get_address->zip_code}}
							</address>
						</div>
					</div>
          </td>
				</div>
        </table>
			</div>


      <div class="row"> <!-- start row -->
        <div class="col-md-12 ">
          <div class="bil_detail">



			<table class="table table-bordered table-responsive-md" style="margin-bottom: 0px;">
				<thead>
					<tr class="text-dark">

						<th  class="font-weight-semibold">รายการ</th>
						<th  class="font-weight-semibold">จำนวน</th>
						<th  class="text-center font-weight-semibold">ราคาต่อใบ</th>
						<th  class="text-center font-weight-semibold">รวมเงิน</th>

					</tr>
				</thead>
				<tbody>

          @if(isset($order_detail))
          @foreach($order_detail as $u)

					<tr >
						<td class="font-weight-semibold text-dark" style="font-size: 12px;">{{$u->pro_name}}
            <br />
              <span style="font-size:11px; margin-left:25px;">
              @if(isset($u->order_option))
              @foreach($u->order_option as $k1)
              {{$k1->item_name}} &nbsp
              @endforeach
              @endif
            </span>

            </td>
						<td class="text-center">{{$u->sum_image}}</td>
						<td class="text-center">{{$u->sum_price}}</td>
						<td class="text-center">
            @if($obj->shipping_p == 0)
            {{$u->sum_price*$u->sum_image}}
            @else
            {{($u->sum_price*$u->sum_image)}}
            @endif
            </td>
					</tr>

          @endforeach
          @endif

          <tr>
            <td colspan="3" class="text-right">ค่าจัดส่ง</td>
            <td class="text-center">{{$obj->shipping_p}}</td>
          </tr>
          <tr class="h4">
            <td colspan="3" class="text-right">Total</td>
            <td class="text-center">

              {{$obj->order_price+$obj->shipping_p}}


            </td>
          </tr>

				</tbody>
			</table>

      <div class="bill-to" style="width:100%; margin-bottom: 15px; margin-top:10px;">
        <p class="h6  text-dark font-weight-semibold">หมายเหตุ</p>
        <address>
           {{$obj->note}}


        </address>
      </div>



      <table class="table " style="margin-bottom: 0px;">
      <div class="row">
        <td style="border-top: 1px solid #fff; width:33.33%; padding: 0px;">
          <div class="col-md-4" style="padding-right: 15px; padding-left: 0px; width:100%">
            <p class="h5 mb-1 text-dark font-weight-semibold">JOB NO.</p>
            <hr style="margin-top: 3px;
            margin-bottom: 5px;
            border: 0;
            border-top: 1px dashed #000;"/>
          </div>
        </td>

        <td style="border-top: 1px solid #fff; width:33.33%; padding: 0px;">
          <div class="col-md-4" style="padding-right: 15px; padding-left: 0px; width:100%">
            <p class="h5 mb-1 text-dark font-weight-semibold">ผู้รับงาน</p>
            <hr style="margin-top: 3px;
            margin-bottom: 5px;
            border: 0;
            border-top: 1px dashed #000;"/>
          </div>
        </td>

        <td style="border-top: 1px solid #fff; width:33.33%; padding: 0px;">
          <div class="col-md-4" style="padding-right: 15px; padding-left: 0px; width:100%">
            <p class="h5 mb-1 text-dark font-weight-semibold">วันส่ง <span style="padding-left:80px;">เวลา</span></p>
            <hr style="margin-top: 3px;
            margin-bottom: 5px;
            border: 0;
            border-top: 1px dashed #000;"/>
          </div>
        </td>

      </div>
      </table>


          </div>
        </div>
    </div> <!-- end row -->


    <hr style="margin-top: 10px;
    margin-bottom: 15px;
    border: 0;
    border-top: 1px dashed #000;"/>

  </div>  <!-- end first -->






  <div class="invoice">
    <header class="clearfix">
      <div class="row">
        <div class="col-sm-6 mt-3">

        </div>
        <div class="col-sm-6 text-right mt-3 mb-3">
          <div class="ib mr-5">
            <h4 class="h4 m-0 text-dark font-weight-bold">สำหรับทางร้าน</h4>
            เลขที่ใบสั่งซื้อ : {{$obj->code_gen}}

          </div>

        </div>
      </div>
    </header>


    <div class="bill-info">
      <table class="table " style="margin-bottom: 0px;">
      <div class="row">
        <td style="border-top: 1px solid #fff; padding: 0px; padding-right: 8px; width:50%">
        <div class="col-md-6" style="width:100%">
          <div class="bill-to" style="width:100%">
            <p class="h5 mb-1 text-dark font-weight-semibold">ผู้สั่งซื้อ</p>
            <address>
              <b>ชื่อ - นามสกุล </b> {{$obj->name}}
              <br/>
              <b>ที่อยู่ </b> {{$get_address->address_ad}} {{$subdistricts->DISTRICT_NAME}} {{$district->AMPHUR_NAME}} {{$province->PROVINCE_NAME}} {{$get_address->zip_code}}
              <br/>
              <b>เบอร์ติดต่อ </b>: {{$get_address->phone_ad}}
              <br/>
              <b>Email </b> {{$obj->email}}
            </address>
          </div>
        </div>
        </td>
        <td style="border-top: 1px solid #fff; padding: 0px; width:50%">
        <div class="col-md-6" style="width:100%">
          <div class="bill-to" style="width:100%">
            <p class="h5 mb-1 text-dark font-weight-semibold">สถานที่จัดส่ง</p>
            <address>
              <b>วิธีการรับสินค้า </b> {{$obj->deliver_order}}
              <br/>
              <b>สถานที่ </b>
              {{$obj->shipping_t1}} {{$obj->shipping_t2}} {{$obj->shipping_t1}} {{$obj->shipping_t2}} {{$get_address->address_ad}} {{$subdistricts->DISTRICT_NAME}} {{$district->AMPHUR_NAME}} {{$province->PROVINCE_NAME}} {{$get_address->zip_code}}
            </address>
          </div>
        </div>
        </td>
      </div>
      </table>
    </div>


    <div class="row"> <!-- start row -->
      <div class="col-md-12 ">
        <div class="bil_detail">



    <table class="table table-bordered table-responsive-md" style="margin-bottom: 0px;">
      <thead>
        <tr class="text-dark">

          <th  class="font-weight-semibold">รายการ</th>
          <th  class="font-weight-semibold">จำนวน</th>
          <th  class="text-center font-weight-semibold">ราคาต่อใบ</th>
          <th  class="text-center font-weight-semibold">รวมเงิน</th>

        </tr>
      </thead>
      <tbody>

        @if(isset($order_detail))
        @foreach($order_detail as $u)

        <tr>
          <td class="font-weight-semibold text-dark" style="font-size: 12px;">{{$u->pro_name}}
          <br />
            <span style="font-size:11px; margin-left:25px;">
            @if(isset($u->order_option))
            @foreach($u->order_option as $k1)
            {{$k1->item_name}} &nbsp
            @endforeach
            @endif
          </span>

          </td>
          <td class="text-center">{{$u->sum_image}}</td>
          <td class="text-center">{{$u->sum_price}}</td>
          <td class="text-center">
          @if($obj->shipping_p == 0)
          {{$u->sum_price*$u->sum_image}}
          @else
          {{($u->sum_price*$u->sum_image)}}
          @endif
          </td>
        </tr>

        @endforeach
        @endif

        <tr>
          <td colspan="3" class="text-right">ค่าจัดส่ง</td>
          <td class="text-center">{{$obj->shipping_p}}</td>
        </tr>
        <tr class="h4">
          <td colspan="3" class="text-right">Total</td>
          <td class="text-center">

            {{$obj->order_price+$obj->shipping_p}}


          </td>
        </tr>

      </tbody>
    </table>

    <div class="bill-to" style="width:100%; margin-bottom: 15px; margin-top:10px;">
      <p class="h6  text-dark font-weight-semibold">หมายเหตุ</p>
      <address>
         {{$obj->note}}


      </address>
    </div>



    <table class="table " style="margin-bottom: 0px;">
    <div class="row">
      <td style="border-top: 1px solid #fff; width:33.33%; padding: 0px;">
        <div class="col-md-4" style="padding-right: 15px; padding-left: 0px; width:100%">
          <p class="h5 mb-1 text-dark font-weight-semibold">JOB NO.</p>
          <hr style="margin-top: 3px;
          margin-bottom: 5px;
          border: 0;
          border-top: 1px dashed #000;"/>
        </div>
      </td>

      <td style="border-top: 1px solid #fff; width:33.33%; padding: 0px;">
        <div class="col-md-4" style="padding-right: 15px; padding-left: 0px; width:100%">
          <p class="h5 mb-1 text-dark font-weight-semibold">ผู้รับงาน</p>
          <hr style="margin-top: 3px;
          margin-bottom: 5px;
          border: 0;
          border-top: 1px dashed #000;"/>
        </div>
      </td>

      <td style="border-top: 1px solid #fff; width:33.33%; padding: 0px;">
        <div class="col-md-4" style="padding-right: 15px; padding-left: 0px; width:100%">
          <p class="h5 mb-1 text-dark font-weight-semibold">วันส่ง <span style="padding-left:80px;">เวลา</span></p>
          <hr style="margin-top: 3px;
          margin-bottom: 5px;
          border: 0;
          border-top: 1px dashed #000;"/>
        </div>
      </td>

    </div>
    </table>


        </div>
      </div>
  </div> <!-- end row -->


  <hr style="margin-top: 10px;
  margin-bottom: 10px;
  border: 0;
  border-top: 1px dashed #000;"/>

</div>  <!-- end first -->


<table class="table table-bordered " style="margin-bottom: 0px; margin-left:25px; width:700px;">
  <tbody>
    <tr>
      <td>
        <b>ชื่อ : </b>
      </td>
      <td>
        {{$get_address->name_ad}}
      </td>
    </tr>
    <tr>
      <td style="width:130px;">
        <b>ที่อยู่จัดส่ง : </b>
      </td>
      <td>
        {{$get_address->address_ad}} {{$subdistricts->DISTRICT_NAME}} {{$district->AMPHUR_NAME}} {{$province->PROVINCE_NAME}} {{$get_address->zip_code}}
      </td>
    </tr>
    <tr>
      <td>
        <b>เบอร์ติดต่อ : </b>
      </td>
      <td>
        {{$get_address->phone_ad}}
      </td>
    </tr>
  </tbody>
</table>



		<script>
			window.print();
		</script>
	</body>
</html>
