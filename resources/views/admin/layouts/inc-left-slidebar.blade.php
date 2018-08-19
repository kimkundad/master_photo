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

                  <li {{ (Request::is('admin/branch*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/branch/')}}"  >
											<i class="fa fa-cubes" aria-hidden="true"></i>
											<span>สาขาร้าน</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/sizecars*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/sizecars/')}}"  >
											<i class="fa fa-gavel" aria-hidden="true"></i>
											<span>size รถเช่า</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/cars*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/cars/')}}"  >
											<i class="fa fa-car" aria-hidden="true"></i>
											<span>รถยนต์เช่า</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/order*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/order/')}}"  >
											<i class="fa fa-external-link" aria-hidden="true"></i>
											<span>การสั่งจอง</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/review*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/review/')}}"  >
											<i class="fa fa-bell-o" aria-hidden="true"></i>
											<span>จัดการ review</span>
										</a>
									</li>


                  <li {{ (Request::is('admin/contact_admin*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/contact_admin/')}}"  >
											<i class="fa fa-envelope-o" aria-hidden="true"></i>
											<span>จัดการข้อความ</span>
										</a>
									</li>






								</ul>



							</nav>



							<hr class="separator" />


						</div>

					</div>

				</aside>
				<!-- end: sidebar -->
