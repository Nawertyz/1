<header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{DataSite('logo')}}" alt="" height="35">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{DataSite('logo')}}" alt="" height="35">
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{DataSite('logo')}}" alt="" height="35">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{DataSite('logo')}}" alt="" height="35">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="uil-search"></span>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex">

                        

                        <div class="dropdown d-inline-block language-switch">
                            <button type="button" class="btn header-item waves-effect"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="/lam-tilo/images/flags/us.jpg" alt="Header Language" height="16">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="/lam-tilo/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="/lam-tilo/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="/lam-tilo/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="/lam-tilo/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                                </a>
                            </div>
                        </div>


                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="/lam-tilo/images/users/avatar-4.jpg"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">ADMIN</span>
                                <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                             
                                <a class="dropdown-item" href="{{route('home')}}"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Về trang chủ</span></a>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="fa fa-cog"></i>
                            </button>
                        </div>
            
                    </div>
                </div>
            </header>



  <div class="vertical-menu">

                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="#" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{DataSite('logo')}}" alt="" height="35">
                        </span>
                        <span class="logo-lg">
                            <img src="{{DataSite('logo')}}" alt="" height="35">
                        </span>
                    </a>

                    <a href="#" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{DataSite('logo')}}" alt="" height="35">
                        </span>
                        <span class="logo-lg">
                            <img src="{{DataSite('logo')}}g" alt="" height="35">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <div data-simplebar class="sidebar-menu-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            
                                <li>
                                <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                                    <img src="/anhlamtilo/home.png" width="25px" height="25px">
                                    <span>Trang thống kê</span>
                                </a>
                            </li>
                            <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Cấu hình website</li>
                            <li>
                                <a href="{{ route('admin.website.config') }}" class="waves-effect">
                                  <img src="https://cdn-icons-png.flaticon.com/512/10024/10024002.png" width="25px" height="25px">
                                    <span>Cấu hình website</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.website.theme') }}" class="waves-effect">
                                    <img src="https://cdn-icons-png.flaticon.com/512/2721/2721681.png" width="25px" height="25px">
                                    <span>Cấu hình giao diện</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.config.telegram') }}" class="waves-effect">
                                     <img src="https://cdn-icons-png.flaticon.com/512/2111/2111646.png" width="25px" height="25px">
                                    <span>Cấu hình telegram</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.notification') }}" class="waves-effect">
                                  <img src="https://cdn-icons-png.flaticon.com/512/6932/6932395.png" width="25px" height="25px">
                                    <span>Quản lí thông báo</span>
                                </a>
                            </li>
                              <li>
                                <a href="/admin/active" class="waves-effect">
                                  <img src="/assets/images/server.png" width="25px" height="25px">
                                    <span>Thêm dịch vụ ngoài</span>
                                </a>
                            </li>  <li>
                                <a href="/admin/support" class="waves-effect">
                                  <img src="/assets/images/customer-service.png" width="25px" height="25px">
                                    <span>Quản lí hỗ trợ</span>
                                </a>
                            </li>
                      <li>
                                <a href="{{ route('admin.activity') }}" class="waves-effect">
                                  <img src="https://cdn-icons-png.flaticon.com/512/10035/10035002.png" width="25px" height="25px">
                                    <span>Quản lí hoạt động</span>
                                </a>
                            </li>
                        <!--    @if (getDomain() == env('PARENT_SITE'))
                      <li>
                                <a href="{{ route('admin.history.support') }}" class="waves-effect">
                                   <img src="/assets/images/customer-service.png" width="25px" height="25px">
                                    <span>Quản lí hỗ trợ</span>
                                </a>
                            </li>
                            @endif--> 
                            </ul>
                            <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Quản lý website</li>
                                                        
                    
                    <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <img src="/anhlamtilo/payment.png" width="25px" height="25px">
                                    <span>Quản lý nạp tiền</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.recharge.config') }}">Cấu hình nạp tiền</a></li>
                                     <li><a href="{{ route('admin.recharge.add') }}">Thêm tài khoản (Không auto)</a></li>
                                    <li><a href="{{ route('admin.history.recharge') }}">Lịch sử nạp tiền</a></li>
                                    <li><a href="{{ route('admin.history.card') }}">Lịch sử nạp thẻ cào</a></li>
                                </ul>
                            </li>
                            
                   
                               <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                     <img src="/anhlamtilo/account.png" width="25px" height="25px">
                                    <span>Quản lí thành viên</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.user.list') }}">Danh sách thành viên</a></li>
                                    <li><a href="{{ route('admin.user.balance') }}">Cộng/Trừ tiên</a></li>
                            
                                </ul>
                            </li>
                            
                            @if (getDomain() == env('PARENT_SITE'))
                            <li>
                   
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <img src="/anhlamtilo/services.png" width="25px" height="25px">
                                    <span>Quản lí tài nguyên</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/admin/tainguyen/new/chuyenmuc">Thêm chuyên mục</a></li>
                                    <li><a href="/admin/tainguyen/new/tainguyen">Thêm tài nguyên</a></li>
                       
                               
                                </ul>
                            </li>
                    @endif
                    @if (getDomain() == env('PARENT_SITE'))
                               <li> 
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <img src="/anhlamtilo/services.png" width="25px" height="25px">
                                    <span>Cấu hình dịch vụ</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.service.new.social') }}">Thêm dịch vụ MXH</a></li>
                                    <li><a href="{{ route('admin.service.new') }}">Thêm dịch vụ</a></li>
                                    <li><a href="{{ route('admin.server.list') }}">Thêm máy chủ dịch vụ</a></li>
                               
                                </ul>
                            </li>
                    @else <li>
                                <a href="{{ route('admin.server.list') }}" class="waves-effect">
                                   <img src="/assets/images/server.png" width="25px" height="25px">
                                    <span>Thêm máy chủ dịch vụ</span>
                                </a>
                            </li>
                    
                     @endif         
                            <li>
                                <a href="{{ route('admin.server.price') }}" class="waves-effect">
                                   <img src="https://cdn-icons-png.flaticon.com/512/5008/5008056.png" width="25px" height="25px">
                                    <span>Chỉnh giá máy chủ</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.history.order') }}" class="waves-effect">
                                     <img src="https://cdn-icons-png.flaticon.com/512/1632/1632670.png" width="25px" height="25px">
                                    <span>Quản lý đơn hàng</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.history.user') }}" class="waves-effect">
                                     <img src="/anhlamtilo/home.png" width="25px" height="25px">
                                    <span>Lịch sử người dùng</span>
                                </a>
                            </li>
 <li>
                                <a href="{{ route('admin.website-child.list') }}" class="waves-effect">
                                    <img src="/assets/images/world-wide-web.png" width="25px" height="25px">
                                    <span>Quản lí website con</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">






  @yield('content')