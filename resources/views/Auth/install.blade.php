<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >

<head>
    <!--  Title -->
    <title>Kích hoạt website</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="{{ DataSite('description') }}" />
    <meta name="keywords" content="{{ DataSite('keyword') }}" />
    <meta name="title" content="{{ DataSite('title') }}" />
    <link rel="shortcut icon" type="image/png" href="{{ DataSite('favicon') }}" />
    <meta property="og:image" content="{{ DataSite('image_seo') }}" />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="" />
    <!--  Favicon -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="shortcut icon" type="image/png" href="{{ DataSite('favicon') }}" />
    <link href=" https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
   <link rel="stylesheet" href="/assets2/css/plugins/dataTables.bootstrap5.min.css">

    <link href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/r-2.4.1/datatables.min.css" rel="stylesheet" />


    @yield('css')
    <link rel="stylesheet" href="/assets2/fonts/inter/inter.css" id="main-font-link" />
<!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="/assets2/fonts/tabler-icons.min.css" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="/assets2/fonts/feather.css" />
    <link rel="stylesheet" href="/assets2/fonts/fontawesome.css" />
    <link rel="stylesheet" href="/assets2/fonts/material.css" />
 
    <link rel="stylesheet" href="/assets2/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="/assets2/css/style-preset.css" />
    
 
    <link rel="stylesheet" href="/assets/css/backend.css">   
    <link rel="stylesheet" href="/assets/css/ptl.css?time={{ time() }}">
   
 
    <link rel="stylesheet" href="/assets/css/lamtilo.css?time={{ time() }}">
    <link href=" https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    
    {!! DataSite('script_header') !!}
</head>
 <style>
.box-inner {
    background-color: #007fff;
    padding: 5px;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    color: black;
    font-weight: bold;
    font-size: 10px;
    color:#fff;
}

.save-per {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 5px;
    color: black;
    font-weight: bold;
    font-size: 10px;
    color:#fff;
}

.lamtilo {
        border: 4px solid #0516ff;
    }
 
</style>
 <body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->

  <div class="auth-main">
    <div class="auth-wrapper v1">
      <div class="auth-form">
        <div class="card my-5">
          <div class="card-body">
           
            <div class="saprator my-3">
              <span>OR</span>
            </div>
            <h4 class="text-center f-w-500 mb-3">Kích hoạt website</h4>
                <form action="{{ route('install.website.post') }}" method="POST" class="w-100">
                                @csrf
                                   @if (getDomain() != env('PARENT_SITE'))
                                         <div class="form-group mb-3">
          <div class="form-label-group">
                                                        <label>API Token</label>
                                                    </div>
                                                    <input class="form-control" type="text"  name="api_token" value="{{ old('api_token') }}" placeholder="Api token">
            </div>
                                    @endif
                                  <div class="form-group mb-3">
          <div class="form-label-group">
                                                        <label>Họ và tên</label>
                                                    </div>
                                                    <input class="form-control"    name="name"
                                            value="{{ old('name') }}" placeholder="Nhập họ tên của bạn" type="text">
            </div>
              <div class="form-group mb-3">
           <div class="form-label-group">
                                                        <label>Email</label>
                                                    </div>
                                                    <input class="form-control" placeholder="Vui lòng nhập email"    name="email"
                                            value="{{ old('email') }}"  type="text">
            </div>
            <div class="form-group mb-3">
            <div class="form-label-group">
                                                        <label>Tài khoản</label>
                                                    </div>
                                                    <input class="form-control" placeholder="Vui lòng nhập tài khoản"    name="username"
                                            value="{{ old('username') }}" type="text">
            </div>
            <div class="form-group mb-3">
             <div class="form-label-group">
                                                        <label>Mật khẩu</label>
                                                       
                                                    </div>

                                                    <div class="input-group password-check">
                                                    
                                                            <input class="form-control"
                                                                placeholder="Vui lòng nhập mật khẩu" name="password"
                                                                type="password">
            </div>
            <div class="form-group mb-3">
           <div class="form-label-group">
                                                        <label>Nhập lại mật khẩu</label>
                                                     
                                                    </div>
                                                    <div class="input-group password-check">
                                 
                                                            <input class="form-control"
                                                                placeholder="Vui lòng nhập lại mật khẩu" name="password_confirmation"
                                                                type="password">
            </div>


            <div class="d-flex mt-1 justify-content-between align-items-center">
              <div class="form-check">
                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                <label class="form-check-label text-muted" for="customCheckc1">Đồng ý với điều khoản & dịch vụ!</label>
              </div>
             
            </div>
            <div class="d-grid mt-4">
              <button  class="btn btn-primary">Kích hoạt </button>
            </div>
         </form>
            <div class="d-flex justify-content-between align-items-end mt-4">
              <h6 class="f-w-500 mb-0">Bạn Đã Có Tài Khoản?</h6>
              <a href="{{ route('login') }}" class="link-primary">Đăng nhập tài khoản</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
                            <!-- Page Footer -->
      

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/assets2/js/plugins/jquery.dataTables.min.js"></script>
    <script src="/assets2/js/plugins/dataTables.bootstrap5.min.js"></script>
 
 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>    
   <script src="/assets2/js/plugins/apexcharts.min.js"></script>
    <script src="/assets2/js/pages/dashboard-default.js"></script>
    <!-- [Page Specific JS] end -->
    <!-- Required Js -->
    <script src="/assets2/js/plugins/popper.min.js"></script>
    <script src="/assets2/js/plugins/simplebar.min.js"></script>
    <script src="/assets2/js/plugins/bootstrap.min.js"></script>
 
    <script src="/assets2/js/fonts/custom-font.js"></script>
    <script src="/assets2/js/pcoded.js"></script>
    <script src="/assets2/js/config.js"></script>
    <script src="/assets2/js/plugins/feather.min.js"></script>
 
 <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
<script src="/assets/js/ptl1.js?time={{ time() }}"></script>

 


@if ($errors->any())
<script>
        swa1('{{ $errors->first() }}','error')
    </script>
                                   
                                @endif

                            
@if (session('success'))
    <script>
        swa1('{{ session('success') }}','success')
    </script>
@elseif (session('error'))
    <script>
          swa1('{{ session('error') }}','error')
    </script>
@endif
 
@yield('script')
</body>

</html>

