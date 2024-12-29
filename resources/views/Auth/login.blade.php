@if (getDomain() == env('PARENT_SITE'))
<!DOCTYPE html>
<html>

<head>
    <!--  Title -->
    <title>Đăng nhập tài khoản</title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="/Lam-Tilo/css/perfect-scrollbar.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/Lam-Tilo/css/style.css" />
    <link defer rel="stylesheet" type="text/css" media="screen" href="/Lam-Tilo/css/animate.css" />
    <script src="/Lam-Tilo/js/perfect-scrollbar.min.js"></script>
    <script defer src="/Lam-Tilo/js/popper.min.js"></script>
    <script defer src="/Lam-Tilo/js/tippy-bundle.umd.min.js"></script>
    <script defer src="/Lam-Tilo/js/sweetalert.min.js"></script>
    
   
    <link rel="stylesheet" href="/assets/css/lamtilo.css?time={{ time() }}">
   
    <link href=" https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    <body
        x-data="main"
        class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
        :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]"
    >
        <!-- screen loader -->
        <div class="screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
            <svg width="64" height="64" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#4361ee">
                <path
                    d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z"
                >
                    <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s" repeatCount="indefinite" />
                </path>
                <path
                    d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z"
                >
                    <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s" repeatCount="indefinite" />
                </path>
            </svg>
        </div>

        <!-- scroll to top button -->
        <div class="fixed bottom-6 right-6 z-50" x-data="scrollToTop">
            <template x-if="showTopButton">
                <button type="button" class="btn btn-outline-primary animate-pulse rounded-full p-2" @click="goToTop">
                    <svg width="24" height="24" class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            opacity="0.5"
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z"
                            fill="currentColor"
                        />
                        <path
                            d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z"
                            fill="currentColor"
                        />
                    </svg>
                </button>
            </template>
        </div>

        <div class="main-container min-h-screen text-black dark:text-white-dark">
            <!-- start main content section -->
            <div x-data="auth">
                <div class="absolute inset-0">
                    <img src="/Lam-Tilo/images/auth/bg-gradient.png" alt="image" class="h-full w-full object-cover" />
                </div>
                <div
                    class="relative flex min-h-screen items-center justify-center bg-[url(../images/auth/map.png)] bg-cover bg-center bg-no-repeat px-6 py-10 dark:bg-[#060818] sm:px-16"
                >
                    <img src="/Lam-Tilo/images/auth/coming-soon-object1.png" alt="image" class="absolute left-0 top-1/2 h-full max-h-[893px] -translate-y-1/2" />
                    <img src="/Lam-Tilo/images/auth/coming-soon-object2.png" alt="image" class="absolute left-24 top-0 h-40 md:left-[30%]" />
                    <img src="/Lam-Tilo/images/auth/coming-soon-object3.png" alt="image" class="absolute right-0 top-0 h-[300px]" />
                    <img src="/Lam-Tilo/images/auth/polygon-object.svg" alt="image" class="absolute bottom-0 end-[28%]" />
                    <div
                        class="relative flex w-full max-w-[1502px] flex-col justify-between overflow-hidden rounded-md bg-white/60 backdrop-blur-lg dark:bg-black/50 lg:min-h-[758px] lg:flex-row lg:gap-10 xl:gap-0"
                    >
                        <div
                            class="relative hidden w-full items-center justify-center bg-[225deg,rgba(239,18,98,1)_0%,rgba(67,97,238,1)_100%] p-5 lg:inline-flex lg:max-w-[835px] xl:-ms-32 ltr:xl:skew-x-[14deg] rtl:xl:skew-x-[-14deg]"
                        >
                            <div
                                class="absolute inset-y-0 w-8 from-primary/10 via-transparent to-transparent ltr:-right-10 ltr:bg-gradient-to-r rtl:-left-10 rtl:bg-gradient-to-l xl:w-16 ltr:xl:-right-20 rtl:xl:-left-20"
                            ></div>
                            <div class="ltr:xl:-skew-x-[14deg] rtl:xl:skew-x-[14deg]">
                                <a href="index.html" class="block w-48 lg:w-72 ms-10">
                                    <img src="{{ DataSite('logo')  }}" alt="Logo" class="w-full" />
                                </a>
                                <div class="mt-24 hidden w-full max-w-[430px] lg:block">
                                    <img src="/Lam-Tilo/images/auth/login.svg" alt="Cover Image" class="w-full" />
                                </div>
                            </div>
                        </div>
                        <div class="relative flex w-full flex-col items-center justify-center gap-6 px-4 pb-16 pt-6 sm:px-6 lg:max-w-[667px]">
                            
                            <div class="w-full max-w-[440px] lg:mt-16">
                                <div class="mb-10">
                                    <h1 class="text-3xl font-extrabold uppercase !leading-snug text-primary md:text-4xl">Đăng Nhập</h1>
                                    <p class="text-base font-bold leading-normal text-white-dark">Nhập đầy đủ thông tin để đăng nhập</p>
                                </div>
                                <form class="space-y-5 dark:text-white"  action="{{ route('login.post') }}" method="POST">
                                @csrf
                                    <div>
                                        <label for="Username">Tài khoản</label>
                                        <div class="relative text-white-dark">
                                            <input name="username" type="text" placeholder="Enter username" class="form-input ps-10 placeholder:text-white-dark" />
                                            <span class="absolute start-4 top-1/2 -translate-y-1/2">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                    <path
                                                        opacity="0.5"
                                                        d="M10.65 2.25H7.35C4.23873 2.25 2.6831 2.25 1.71655 3.23851C0.75 4.22703 0.75 5.81802 0.75 9C0.75 12.182 0.75 13.773 1.71655 14.7615C2.6831 15.75 4.23873 15.75 7.35 15.75H10.65C13.7613 15.75 15.3169 15.75 16.2835 14.7615C17.25 13.773 17.25 12.182 17.25 9C17.25 5.81802 17.25 4.22703 16.2835 3.23851C15.3169 2.25 13.7613 2.25 10.65 2.25Z"
                                                        fill="currentColor"
                                                    />
                                                    <path
                                                        d="M14.3465 6.02574C14.609 5.80698 14.6445 5.41681 14.4257 5.15429C14.207 4.89177 13.8168 4.8563 13.5543 5.07507L11.7732 6.55931C11.0035 7.20072 10.4691 7.6446 10.018 7.93476C9.58125 8.21564 9.28509 8.30993 9.00041 8.30993C8.71572 8.30993 8.41956 8.21564 7.98284 7.93476C7.53168 7.6446 6.9973 7.20072 6.22761 6.55931L4.44652 5.07507C4.184 4.8563 3.79384 4.89177 3.57507 5.15429C3.3563 5.41681 3.39177 5.80698 3.65429 6.02574L5.4664 7.53583C6.19764 8.14522 6.79033 8.63914 7.31343 8.97558C7.85834 9.32604 8.38902 9.54743 9.00041 9.54743C9.6118 9.54743 10.1425 9.32604 10.6874 8.97558C11.2105 8.63914 11.8032 8.14522 12.5344 7.53582L14.3465 6.02574Z"
                                                        fill="currentColor"
                                                    />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="Password">Mật khẩu</label>
                                        <div class="relative text-white-dark">
                                            <input
                                                name="password"
                                                type="password"
                                                placeholder="Enter Password"
                                                class="form-input ps-10 placeholder:text-white-dark"
                                            />
                                            <span class="absolute start-4 top-1/2 -translate-y-1/2">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                    <path
                                                        opacity="0.5"
                                                        d="M1.5 12C1.5 9.87868 1.5 8.81802 2.15901 8.15901C2.81802 7.5 3.87868 7.5 6 7.5H12C14.1213 7.5 15.182 7.5 15.841 8.15901C16.5 8.81802 16.5 9.87868 16.5 12C16.5 14.1213 16.5 15.182 15.841 15.841C15.182 16.5 14.1213 16.5 12 16.5H6C3.87868 16.5 2.81802 16.5 2.15901 15.841C1.5 15.182 1.5 14.1213 1.5 12Z"
                                                        fill="currentColor"
                                                    />
                                                    <path
                                                        d="M6 12.75C6.41421 12.75 6.75 12.4142 6.75 12C6.75 11.5858 6.41421 11.25 6 11.25C5.58579 11.25 5.25 11.5858 5.25 12C5.25 12.4142 5.58579 12.75 6 12.75Z"
                                                        fill="currentColor"
                                                    />
                                                    <path
                                                        d="M9 12.75C9.41421 12.75 9.75 12.4142 9.75 12C9.75 11.5858 9.41421 11.25 9 11.25C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75Z"
                                                        fill="currentColor"
                                                    />
                                                    <path
                                                        d="M12.75 12C12.75 12.4142 12.4142 12.75 12 12.75C11.5858 12.75 11.25 12.4142 11.25 12C11.25 11.5858 11.5858 11.25 12 11.25C12.4142 11.25 12.75 11.5858 12.75 12Z"
                                                        fill="currentColor"
                                                    />
                                                    <path
                                                        d="M5.0625 6C5.0625 3.82538 6.82538 2.0625 9 2.0625C11.1746 2.0625 12.9375 3.82538 12.9375 6V7.50268C13.363 7.50665 13.7351 7.51651 14.0625 7.54096V6C14.0625 3.20406 11.7959 0.9375 9 0.9375C6.20406 0.9375 3.9375 3.20406 3.9375 6V7.54096C4.26488 7.51651 4.63698 7.50665 5.0625 7.50268V6Z"
                                                        fill="currentColor"
                                                    />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="flex cursor-pointer items-center">
                                            <input type="checkbox" class="form-checkbox bg-white dark:bg-black" />
                                            <span class="text-white-dark">Ghi nhớ đăng nhập</span>
                                        </label>
                                    </div>
                                    <button
                                        type="submit"
                                        class="btn btn-gradient !mt-6 w-full border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]"
                                    >
                                        Đăng nhập
                                    </button>
                                </form>

                                <div class="relative my-7 text-center md:mb-9">
                                    <span class="absolute inset-x-0 top-1/2 h-px w-full -translate-y-1/2 bg-white-light dark:bg-white-dark"></span>
                                    <span class="relative bg-white px-2 font-bold uppercase text-white-dark dark:bg-dark dark:text-white-light">or</span>
                                </div>
                                <div class="mb-10 md:mb-[60px]">
                                    <ul class="flex justify-center gap-3.5">
                                         
                                        <li>
                                            <a
                                                href="{{ route('login.google') }}"
                                                class="inline-flex h-8 w-8 items-center justify-center rounded-full p-0 transition hover:scale-110"
                                                style="background: linear-gradient(135deg, rgba(239, 18, 98, 1) 0%, rgba(67, 97, 238, 1) 100%)"
                                            >
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M13.8512 7.15912C13.8512 6.66275 13.8066 6.18548 13.7239 5.72729H7.13116V8.43503H10.8984C10.7362 9.31003 10.243 10.0514 9.50162 10.5478V12.3041H11.7639C13.0875 11.0855 13.8512 9.29094 13.8512 7.15912Z"
                                                        fill="white"
                                                    />
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M7.13089 14C9.0209 14 10.6054 13.3731 11.7636 12.3041L9.50135 10.5477C8.87454 10.9677 8.07272 11.2159 7.13089 11.2159C5.30771 11.2159 3.76452 9.9845 3.21407 8.32996H0.875427V10.1436C2.02725 12.4313 4.39453 14 7.13089 14Z"
                                                        fill="white"
                                                    />
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M3.21435 8.32997C3.07435 7.90997 2.99481 7.46133 2.99481 6.99997C2.99481 6.5386 3.07435 6.08996 3.21435 5.66996V3.85632H0.875712C0.40162 4.80133 0.131165 5.87042 0.131165 6.99997C0.131165 8.12951 0.40162 9.19861 0.875712 10.1436L3.21435 8.32997Z"
                                                        fill="white"
                                                    />
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M7.13089 2.7841C8.15862 2.7841 9.08135 3.13728 9.80681 3.83092L11.8145 1.82319C10.6023 0.693638 9.01772 0 7.13089 0C4.39453 0 2.02725 1.56864 0.875427 3.85637L3.21407 5.67001C3.76452 4.01546 5.30771 2.7841 7.13089 2.7841Z"
                                                        fill="white"
                                                    />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-center dark:text-white">
                                    Bạn chưa có tài khoản ?
                                    <a
                                        href="{{route('register')}}"
                                        class="uppercase text-primary underline transition hover:text-black dark:hover:text-white"
                                        >Đăng kí</a
                                    >
                                </div>
                            </div>
                            <p class="absolute bottom-6 w-full text-center dark:text-white">
                            Copyright &copy; 2023 <a href="{{DataSite('facebook')}}" target="_blank" class="text-dark">{{DataSite('namesite')}}</a>. All rights reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end main content section -->
        </div>

 

    
        <script src="/Lam-Tilo/js/simple-datatables.js"></script>
		<script src="/Lam-Tilo/js/alpine-collaspe.min.js"></script>
        <script src="/Lam-Tilo/js/alpine-persist.min.js"></script>
        <script defer src="/Lam-Tilo/js/alpine-ui.min.js"></script>
        <script defer src="/Lam-Tilo/js/alpine-focus.min.js"></script>
        <script defer src="/Lam-Tilo/js/alpine.min.js"></script>
		<script src="/Lam-Tilo/js/highlight.min.js"></script>
        <script src="/Lam-Tilo/js/custom.js"></script>
  
 
    <script src="/assets9/vendor/libs/jquery/jquery.js"></script>
 
  <script src="/assets9/vendor/js/bootstrap.js"></script>
 
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="/assets9/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
 
 
  
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

@else
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!--  Title -->
    <title>Đăng nhập tài khoản</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="{{ DataSite('description') }}" />
    <meta name="keywords" content="{{ DataSite('keyword') }}" />
    <meta name="title" content="{{ DataSite('title') }}" />
    <meta property="og:image" content="{{ DataSite('image_seo') }}" />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (Auth::check())
        <meta name="api-token" content="{{ Auth::user()->api_token }}" />
    @endif
  

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="shortcut icon" type="image/png" href="{{ DataSite('favicon') }}" />
    <link href=" https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
 
    <link href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/r-2.4.1/datatables.min.css" rel="stylesheet" />

    @yield('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link rel="stylesheet" href="/assets6/css/fonts.css">
    <link rel="stylesheet" href="/assets6/plugins/custom/datatables/datatables.bundle.css">
    <link rel="stylesheet" href="/assets5/plugins/global/plugins.bundle.css">
    <link rel="stylesheet" href="/assets6/css/style.bundle.css">
    <link rel="stylesheet" href="/assets/css/lamtilo.css?time={{ time() }}">
    <link href=" https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    </head>
 
<style>
    :root {
        --drake-primary: #7134eb;
    }
    .translate-wrapper {
        padding: 0 8px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-item-align: center;
        align-self: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        height: 44px;
        cursor: pointer;
        border-radius: 4px
    }

    #button_translate span {
        display: none
    }

    .translated-ltr body {
        top: 0!important
    }

    .VIpgJd-ZVi9od-l4eHX-hSRGPd {
        display:none;
    }

    .skiptranslate iframe {
        display: none!important
    }

    @media (max-width: 767px) {
        .goog-te-gadget {
            display:none !important;
        }
    }
    
    ::selection {
    color: var(--drake-primary);
    background: 0 0;
    }
</style>
    {!! DataSite('script_header') !!}
</head>
<body id="kt_body" class="app-blank">
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-column-fluid flex-lg-row">
        <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0">
            <div class="d-flex flex-center flex-lg-start flex-column">
                <img alt="LAMTILO" src="{{ DataSite('logo') }}" class="w-225px" />
            </div>
        </div>
        <div class="d-flex flex-center w-lg-50 p-10">
            <div class="card w-md-550px">
                <div class="card-body">
                    <form class="form w-100" action="{{ route('login.post') }}" method="POST">
                    @csrf
                        <div class="text-center mb-4">
                            <h1 class="text-dark fw-bolder">Đăng Nhập Tài Khoản</h1>
                            <div class="text-muted fw-semibold fs-6">Xin Mời Bạn Điền Thông Tin Vào Bên Dưới.</div>
                        </div>
                        <div class="form-floating mb-5">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Nhập tên tài khoản..." name="username" value="" />
                            <label for="floatingInput">Tên tài khoản</label>
                        </div>
                        <div class="form-floating mb-5">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Nhập mật khẩu..." name="password" value="" />
                            <label for="floatingPassword">Mật khẩu</label>
                        </div>
                        <div class="form-floating mb-3" style="display:none" id="otpInput">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="Nhập mã xác thực..." name="token" value="" />
                            <label for="floatingPassword">Mã xác thực</label>
                        </div>
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-bold mb-5">
                            <div class="form-check form-check-custom form-check-solid form-check-sm">
                                <input class="form-check-input" type="checkbox" name="remember" id="flexRadioLg" checked />
                                <label class="form-check-label" for="flexRadioLg">Ghi nhớ đăng nhập?</label>
                            </div>
                            <a href="{{ route('forgot.password') }}" class="fst-italic fw-bold">Quên mật khẩu?</a>
                        </div>
                         <div class="d-grid" >
                            <button type="button" id="submitVerify" style="display:none" class="btn btn-primary">Xác thực ngay</button>
                        </div>
                        <div class="row mb-9">
                        <div class="d-grid" >
                            <button type="submit" id="submitLogin" style="display:show" class="btn btn-default">Đăng nhập ngay</button>
                        </div>
                        <div class="separator separator-content border-secondary my-5"><span class="w-50px text-gray">hoặc</span></div>
                        <div class="d-grid">
                            
                            <a href="{{ route('login.google') }}" class="btn btn-warning"><img src="/assets/images/google.png" class="me-2" alt="google" style="width:20px;height:20px;"> Đăng nhập với Google</a>
                        </div>
                        </div>
                        <div class="d-grid">
                            <a href="{{ route('register') }}" class="btn btn-success">Đăng ký ngay</a>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>var hostUrl = "/assets5/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="/assets5/plugins/global/plugins.bundle.js"></script>
		<script src="/assets5/js/scripts.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="/assets5/plugins/custom/datatables/datatables.bundle.js"></script>
 <script src="/assets5/js/lamtilo.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/assets2/js/plugins/jquery.dataTables.min.js"></script>
    <script src="/assets2/js/plugins/dataTables.bootstrap5.min.js"></script>
 
 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>    
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
 
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

          


@endif