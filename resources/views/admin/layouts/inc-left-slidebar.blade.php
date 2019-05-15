<style>

ul.nav-main > li.nav-expanded > a {
  box-shadow: 2px 0 0 #ee413c inset;
}
html.no-overflowscrolling .nano > .nano-pane > .nano-slider {
    background: #ee413c;
}
.page-header h2 {
    border-bottom-color: #ee413c;
}
</style>
<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">

					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar" ></i>
						</div>
					</div>

					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">


                  @if(Auth::user()->hasrole('manager') == 1)


                  <li {{ (Request::is('admin/user*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/user/')}}"  >
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>รายชื่อลูกค้า</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/category*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/category/')}}"  >
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>จัดการหมวดหมู่</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/sub_category*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/sub_category/')}}"  >
											<i class="fa fa-cubes" aria-hidden="true"></i>
											<span>หมวดหมู่ย่อย</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/product*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/product/')}}"  >
											<i class="fa fa-cube" aria-hidden="true"></i>
											<span>Product</span>
										</a>
									</li>

                 <li {{ (Request::is('admin/themes*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/themes/')}}"  >
											<i class="fa fa-asterisk" aria-hidden="true"></i>
											<span>Themes</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/taopix*') ? 'class=nav-expanded' : '') }} >
 										<a href="{{url('admin/taopix/')}}"  >
 											<i class="fa fa-life-bouy" aria-hidden="true"></i>
 											<span>Taopix</span>
 										</a>
 									</li>



                  <li {{ (Request::is('admin/order*') ? 'class=nav-expanded' : '') }} {{ (Request::is('admin/search_order') ? 'class=nav-expanded' : '') }}>
										<a href="{{url('admin/order/')}}"  >
											<i class="fa fa-copy" aria-hidden="true"></i>
											<span>Order สินค้า</span>
										</a>
									</li>

                <!--  <li {{ (Request::is('admin/get_pay_info*') ? 'class=nav-expanded' : '') }}  {{ (Request::is('admin/edit_pay_info*') ? 'class=nav-expanded' : '') }}>
										<a href="{{url('admin/get_pay_info/')}}" >
											<i class="fa fa-coffee" aria-hidden="true"></i>
											<span>แจ้งการชำระเงิน</span>
										</a>
									</li> -->


                  <li {{ (Request::is('admin/slide*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/slide/')}}"  >
											<i class="fa fa-camera" aria-hidden="true"></i>
											<span>Slide Show</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/delivery*') ? 'class=nav-expanded' : '') }}  {{ (Request::is('admin/edit_deli_*') ? 'class=nav-expanded' : '') }}>
										<a href="{{url('admin/delivery/')}}"  >
											<i class="fa fa-car" aria-hidden="true"></i>
											<span>ช่องทางการส่งสินค้า</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/bank*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/bank/')}}" >
											<i class="fa fa-bank" aria-hidden="true"></i>
											<span>ธนาคาร</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/roles*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/roles/')}}" >
											<i class="fa fa-lock" aria-hidden="true"></i>
											<span>User Roles</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/employee*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/employee/')}}" >
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>รายชื่อพนักงาน</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/line_notify*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/line_notify/')}}" >
											<i class="fa fa-bell" aria-hidden="true"></i>
											<span>Line Notify</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/web_notify*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/web_notify/')}}" >
											<i class="fa fa-bell" aria-hidden="true"></i>
											<span>Web Notify</span>
										</a>
									</li>

                  @else


                  @if(get_menu_admin()[0]->menu_status == 1)
                  <li {{ (Request::is('admin/user*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/user/')}}"  >
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>รายชื่อลูกค้า</span>
										</a>
									</li>
                  @endif

                  @if(get_menu_admin()[1]->menu_status == 1)
                  <li {{ (Request::is('admin/category*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/category/')}}"  >
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>จัดการหมวดหมู่</span>
										</a>
									</li>
                  @endif

                  @if(get_menu_admin()[2]->menu_status == 1)
                  <li {{ (Request::is('admin/sub_category*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/sub_category/')}}"  >
											<i class="fa fa-cubes" aria-hidden="true"></i>
											<span>หมวดหมู่ย่อย</span>
										</a>
									</li>
                  @endif

                  @if(get_menu_admin()[3]->menu_status == 1)
                  <li {{ (Request::is('admin/product*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/product/')}}"  >
											<i class="fa fa-cube" aria-hidden="true"></i>
											<span>Product</span>
										</a>
									</li>
                  @endif

                  @if(get_menu_admin()[4]->menu_status == 1)
                 <li {{ (Request::is('admin/themes*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/themes/')}}"  >
											<i class="fa fa-asterisk" aria-hidden="true"></i>
											<span>Themes</span>
										</a>
									</li>
                  @endif

                  @if(get_menu_admin()[5]->menu_status == 1)
                  <li {{ (Request::is('admin/taopix*') ? 'class=nav-expanded' : '') }} >
 										<a href="{{url('admin/taopix/')}}"  >
 											<i class="fa fa-life-bouy" aria-hidden="true"></i>
 											<span>Taopix</span>
 										</a>
 									</li>
                  @endif


                  @if(get_menu_admin()[6]->menu_status == 1)
                  <li {{ (Request::is('admin/order*') ? 'class=nav-expanded' : '') }} {{ (Request::is('admin/search_order') ? 'class=nav-expanded' : '') }}>
										<a href="{{url('admin/order/')}}"  >
											<i class="fa fa-copy" aria-hidden="true"></i>
											<span>Order สินค้า</span>
										</a>
									</li>
                  @endif

                  @if(get_menu_admin()[7]->menu_status == 1)
                  <li {{ (Request::is('admin/slide*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/slide/')}}"  >
											<i class="fa fa-camera" aria-hidden="true"></i>
											<span>Slide Show</span>
										</a>
									</li>
                  @endif

                  @if(get_menu_admin()[8]->menu_status == 1)
                  <li {{ (Request::is('admin/delivery*') ? 'class=nav-expanded' : '') }}  {{ (Request::is('admin/edit_deli_*') ? 'class=nav-expanded' : '') }}>
										<a href="{{url('admin/delivery/')}}"  >
											<i class="fa fa-car" aria-hidden="true"></i>
											<span>ช่องทางการส่งสินค้า</span>
										</a>
									</li>
                  @endif

                  @if(get_menu_admin()[9]->menu_status == 1)
                  <li {{ (Request::is('admin/bank*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/bank/')}}" >
											<i class="fa fa-bank" aria-hidden="true"></i>
											<span>ธนาคาร</span>
										</a>
									</li>
                  @endif

                  @if(get_menu_admin()[10]->menu_status == 1)
                  <li {{ (Request::is('admin/roles*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/roles/')}}" >
											<i class="fa fa-lock" aria-hidden="true"></i>
											<span>User Roles</span>
										</a>
									</li>
                  @endif

                  @if(get_menu_admin()[11]->menu_status == 1)
                  <li {{ (Request::is('admin/employee*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/employee/')}}" >
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>รายชื่อพนักงาน</span>
										</a>
									</li>
                  @endif

                  @if(get_menu_admin()[12]->menu_status == 1)
                  <li {{ (Request::is('admin/line_notify*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/line_notify/')}}" >
											<i class="fa fa-bell" aria-hidden="true"></i>
											<span>Line Notify</span>
										</a>
									</li>
                  @endif

                  @if(get_menu_admin()[13]->menu_status == 1)
                  <li {{ (Request::is('admin/web_notify*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/web_notify/')}}" >
											<i class="fa fa-bell" aria-hidden="true"></i>
											<span>Web Notify</span>
										</a>
									</li>
                  @endif

                  @endif










								</ul>



							</nav>



							<hr class="separator" />


						</div>

					</div>

				</aside>
				<!-- end: sidebar -->
