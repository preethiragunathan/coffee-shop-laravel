        <div class="sidebar-wrapper sidebar-theme">
            <nav id="sidebar">
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                  <?php /*  <li class="menu dashboard">
                        <a href="#dashboard"  data-toggle="collapse"  class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled " id="dashboard" data-parent="#accordionExample">
                            <li class="">
                                <a href="{{asset('admin/index')}}"> Dashboard </a>
                            </li>
                           <!-- <li>
                                <a href="index2.html"> Analytics </a>
                            </li> -->
                        </ul>
                    </li> */ ?>
					<li class="menu product">
                        <a href="{{route('product')}}" class="dropdown-toggle">Products</a>
					</li>
					<li class="menu customer">
                        <a href="{{route('customer')}}" class="dropdown-toggle">Customer</a>
					</li>
                    <li class="menu order">
                        <a href="{{route('order')}}" class="dropdown-toggle">Orders</a>
					</li>
                </ul>
                
            </nav>

        </div>