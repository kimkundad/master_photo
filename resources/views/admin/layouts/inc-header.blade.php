<div class="header-right">


  <ul class="notifications">


</ul>




                    <span class="separator"></span>
                  @if (Auth::guest())
              @else
                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                              @if(Auth::user()->avatar != NULL)
                                <img src="{{url('./assets/images/avatar/'.Auth::user()->avatar)}}" width="35" height="35"  class="img-circle" data-lock-picture="{{asset('./assets/images/avatar/'.Auth::user()->image)}}" />
                              @else
                              <img src="{{asset('./assets/images/avatar/blank_avatar_240x240.gif')}}" width="35" height="35"  class="img-circle" data-lock-picture="{{asset('./assets/images/avatar/blank_avatar_240x240.gif')}}" />
                              @endif
                            </figure>
                            <div class="profile-info" data-lock-name="{{ Auth::user()->name }}" >
                                <span class="name">{{ Auth::user()->name }}</span>
                                <span class="role"></span>
                            </div>

                            <i class="fa custom-caret"></i>
                        </a>

                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                              <!--  <li>
                                    <a role="menuitem" tabindex="-1" href="{{url('admin/profile/')}}" ><i class="fa fa-user"></i> ข้อมูลส่วนตัว</a>
                                </li> -->
                                <li>
                                    <a role="menuitem" tabindex="-1" href="{{url('logout')}}" ><i class="fa fa-power-off"></i> ออกจากระบบ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
@endif


                </div>
