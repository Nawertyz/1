<html   lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="/assets9" data-template="vertical-menu-template">

<head>
    <!--  Title -->
    <title>Lấy lại mật khẩu</title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="/assets9/vendor/fonts/materialdesignicons.css" />
    <link rel="stylesheet" href="/assets9/vendor/fonts/flag-icons.css" />
    
    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="/assets9/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets9/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets9/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets9/css/demo.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets9/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets9/vendor/libs/typeahead-js/typeahead.css" /> 
    <link rel="stylesheet" href="/assets9/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
  <link rel="stylesheet" href="/assets9/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
  <link rel="stylesheet" href="/assets9/vendor/libs/apex-charts/apex-charts.css" />
  <link rel="stylesheet" href="/assets9/vendor/libs/swiper/swiper.css" />
  <link rel="stylesheet" href="/assets9/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets9/vendor/libs/typeahead-js/typeahead.css" /> 
    <!-- Vendor -->
<link rel="stylesheet" href="/assets9/vendor/libs/@form-validation/umd/styles/index.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href="/assets9/vendor/css/pages/page-auth.css">
    <!-- Page CSS -->
    <link rel="stylesheet" href="/assets9/vendor/css/pages/cards-statistics.css" />
 
    <script src="/assets9/vendor/js/template-customizer.js"></script>
    <!-- Helpers -->
    <script src="/assets9/js/config.js"></script>
   
    <link rel="stylesheet" href="/assets/css/lamtilo.css?time={{ time() }}">
   
    <link href=" https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    
 <body>
  
<div class="authentication-wrapper authentication-cover">
  <!-- Logo -->
  <a href="index.html" class="auth-cover-brand d-flex align-items-center gap-2">
    <span class="app-brand-logo demo">
 
</span>
    <span class="app-brand-text demo text-heading fw-bold">{{DataSite('namesite')}}</span>
  </a>
  <!-- /Logo -->
  <div class="authentication-inner row m-0">
    <!-- /Left Section -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center p-5 pb-2">
      <img src="/assets9/img/illustrations/auth-login-illustration-light.png" class="auth-cover-illustration w-100" alt="auth-illustration" data-app-img="illustrations/auth-login-illustration-light.png" data-app-dark-img="illustrations/auth-login-illustration-dark.png" />
      <img src="/assets9/img/illustrations/auth-cover-login-mask-light.png" class="authentication-image" alt="mask" data-app -img="illustrations/auth-cover-login-mask-light.png" data-app-dark-img="illustrations/auth-cover-login-mask-dark.png" />
    </div>
    <!-- /Left Section -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-5 px-4 py-4">
      <div class="w-px-400 mx-auto pt-5 pt-lg-0">
        <h4 class="mb-2">Welcome to {{DataSite('namesite')}}! 👋</h4>
    

        <form   class="mb-3"  action="{{ route('forgot.password.post') }}" method="POST">
        @csrf
          <div class="form-floating form-floating-outline mb-3">
            <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                            id="exampleInputEmail1" placeholder="Enter your email or username" autofocus>
            <label for="email">Email</label>
          </div>
       
          
          <button class="btn btn-primary d-grid w-100">
            Lấy lại mật khẩu
          </button>
        </form>

        <p class="text-center mt-2">
          <span>Bạn chưa có tài khoản?</span>
          <a href="{{ route('register') }}">
            <span>Tạo tài khoản</span>
          </a>
        </p>

        <div class="divider my-4">
          <div class="divider-text">or</div>
        </div>

        <div class="d-flex justify-content-center gap-2">
          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-facebook">
            <i class="tf-icons mdi mdi-24px mdi-facebook"></i>
          </a>

          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-twitter">
            <i class="tf-icons mdi mdi-24px mdi-twitter"></i>
          </a>

          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-github">
            <i class="tf-icons mdi mdi-24px mdi-github"></i>
          </a>

          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-google-plus">
            <i class="tf-icons mdi mdi-24px mdi-google"></i>
          </a>
        </div>
      </div>
    </div>
    <!-- /Login -->
  </div>
</div>



 

    
    
 
<script src="/assets9/vendor/js/helpers.js"></script>
    <script src="/assets9/vendor/libs/jquery/jquery.js"></script>
  <script src="/assets9/vendor/libs/popper/popper.js"></script>
  <script src="/assets9/vendor/js/bootstrap.js"></script>
  <script src="/assets9/vendor/libs/node-waves/node-waves.js"></script>
  <script src="/assets9/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="/assets9/vendor/libs/hammer/hammer.js"></script>
  <script src="/assets9/vendor/libs/i18n/i18n.js"></script>
  <script src="/assets9/vendor/libs/typeahead-js/typeahead.js"></script>
  <script src="/assets9/vendor/js/menu.js"></script>
  
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="/assets9/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="/assets9/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="/assets9/vendor/libs/swiper/swiper.js"></script>

  <!-- Main JS -->
  <script src="/assets9/js/main.js"></script>
  
 <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
 
 <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
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
