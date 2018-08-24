<div style="font-family:verdana;font-size:12px;color:#555555;line-height:14pt">
<div style="width:590px">
<div style="background:url('{{url('assets/image/email_top.png')}}') no-repeat;width:100%;height:75px;display:block">
<div style="padding-top:30px;padding-left:50px;padding-right:50px">
<a href="#" target="_blank" ><img src="{{url('assets/image/logo-website.png')}}" alt=""
  style="border:none; height:42px;" ></a>
</div>
</div>
<div style="background:url('{{url('assets/image/email_mid.png')}}')
repeat-y;width:100%;display:block">
<div style="padding-left:50px;padding-right:50px;padding-bottom:1px">
<div style="border-bottom:1px solid #ededed"></div>
<div style="margin:20px 0px;font-size:27px;line-height:30px;text-align:left">ใบสั่งจอง</div>
<div style="margin-bottom:30px">
<div>คุณสั่งจอง สินค้าจาก Master Photo Network</div>
<br>
<div style="margin-bottom:20px;text-align:left">
  <b>หมายเลขคำสั่งจอง:</b> {{$data->Oid}}<br>
  <b>วันที่สั่งจอง:</b> {{$datatime}}<br>
  <b>ชื่อ:</b> {{$data->firstname_order}} {{$data->lastname_order}}<br>
  <b>เบอร์โทร:</b> {{$data->phone_order}}<br>
  <b>อีเมล:</b> {{$data->email_order}}<br>
  <b>ที่อยู่:</b> {{$data->address}} {{$data->province}} {{$data->zipcode}}
</div>
</div>
<div>
<div>
</div>
<span></span>
<table style="width:100%;margin:5px 0">
<tbody>
<tr>
<td style="text-align:left;font-weight:bold;font-size:12px">รายการ</td>
<td style="text-align:right;font-weight:bold;font-size:12px" width="70">ราคา</td>
</tr>
</tbody>
</table>
<div style="border-bottom:1px solid #ededed"></div>
<table style="width:100%;margin:5px 0">
<tbody>
<tr>
</tr>
@foreach($data_detail as $u)
    <tr>
      <td style="text-align:left;font-size:12px;padding-right:10px">
        <span>{{$u->product_name}}</span>
      </td>
      <td style="text-align:right;font-size:12px">
        <span>THB{{$u->sum_price}}</span>
        <span></span>
      </td>
    </tr>
@endforeach
</tbody>
</table>
<div style="border-bottom:1px solid #ededed"></div>
<table style="width:100%;margin:5px 0">
<tbody>
<tr>
<td style="text-align:right;font-size:12px" width="150">
ภาษี: <span>THB0.00</span>
</td>
</tr>
<tr>
<td style="text-align:right;font-size:12px" width="150">
<span>รวม: </span>THB{{$data->order_price}}.00
</td>
</tr>
</tbody>
</table>
<div style="border-bottom:1px solid #ededed"></div>

</div><div style="margin:20px 0">หากมีคำถาม ติดต่อ <a href="#" target="_blank" >02-939-3080 , 086-600-5055</a>
</div><div style="border-bottom:1px solid #ededed"></div>
<div style="border-bottom:1px solid #ededed">
</div>
<div style="margin:20px 0 40px 0;font-size:10px;color:#707070">
ดู<a href="#" target="_blank">ประวัติการสั่งซื้อ</a>
บน Master Photo Network ข้อมูลส่วนตัวของคุณ<br>
ดู<a href="#" target="_blank" >นโยบายการคืนเงิน</a>ของ Master Photo Network และ<a href="#" target="_blank">ข้อกำหนดในการให้บริการ</a>
</div>
<div style="font-size:9px;color:#707070">

<br>© 2019 Master Photo Network | สงวนลิขสิทธิ์<br>บริษัท มาสเตอร์ โฟโต้ เน็ตเวิร์ค จำกัด 206/1 ถนนพหลโยธิน แขวงลาดยาว
เขตจตุจักร กรุงเทพมหานคร ประเทศไทย 10900</div>
</div></div>
<div class="yj6qo"></div>
<div style="background:url('{{url('assets/image/email_bottom.png')}}') no-repeat;width:100%;height:50px;display:block"></div></div></div>
