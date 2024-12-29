@if (getDomain() == env('PARENT_SITE'))

<!DOCTYPE html>
<html  lang="en" class="dark-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"  data-theme="dark" data-assets-path="/assets9" data-template="vertical-menu-template">

<head>
    <!--  Title -->
    <title>@yield('title')</title>
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
    
    
    {!! DataSite('script_header') !!}
    <style>
    #history-order tbody tr {
        margin-bottom: 1px; /* Loại bỏ margin mặc định giữa các hàng */
    }

    #history-order tbody td {
        padding: 1px; /* Có thể điều chỉnh giá trị theo nhu cầu */
        text-align: center; /* Căn giữa văn bản */
       
    }
 
</style>
<style>
    .btn-service {
      color: #2A2F4F;
      cursor: pointer;
      display: block;
      position: relative;
      text-decoration: none;
      background: #f0f0f0;
      text-align: center;
      border-radius: 10px;
      height: 100%;
      transition-property: all;
      transition-duration: .6s;
      transition-timing-function: ease
    }

    .btn-service h6 {
      font-weight: 900;
      font-size: 1.3rem;
    }

    .btn-service:hover {
      background: linear-gradient(270deg, #27e1c1, #62cdff);
      scale: 1.05;
      transition: all .6s ease;
    }

    .btn-service h6:hover {
      background: linear-gradient(270deg, #27e1c1, #62cdff);
      scale: 1.05;
      transition: all .6s ease;
    }
  </style>
  <style>
      
      .form-control {
    width: 70%;
    border-radius: 0.375rem;
    border-width: 1px;
    --tw-border-opacity: 1;
    border-color: rgb(224 230 237 / var(--tw-border-opacity));
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255 / var(--tw-bg-opacity));
    padding: 0.2rem 1rem;
    font-size: 0.875rem;
    line-height: 1.25rem;
    font-weight: 600;
    --tw-text-opacity: 1;
    color: rgb(14 23 38 / var(--tw-text-opacity));
    outline: 2px solid #0000 !important;
    outline-offset: 2px !important;
}
  </style>
</head>
<body x-data="main" class="relative  {{DataSite('theme')}} overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">
		<div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>
		<div class="screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
			<svg width="64" height="64" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#4361ee">
				<path d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z">
					<animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s" repeatCount="indefinite" />
				</path>
				<path d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z">
					<animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s" repeatCount="indefinite" />
				</path>
			</svg>
		</div>
		<div class="fixed bottom-6 z-50 ltr:right-6 rtl:left-6" x-data="scrollToTop">
			<template x-if="showTopButton">
				<button type="button" class="btn btn-outline-primary animate-pulse rounded-full bg-[#fafafa] p-2 dark:bg-[#060818] dark:hover:bg-primary" @click="goToTop">
					<svg width="24" height="24" class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z" fill="currentColor" />
						<path d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z" fill="currentColor" />
					</svg>
				</button>
			</template>
		</div>
    
 @else

 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!--  Title -->
    <title>@yield('title')</title>
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
   
    <link rel="stylesheet" href="/dist/libs/owl.carousel/dist/assets/owl.carousel.min.2.delay">
     
    <link rel="stylesheet" href="/assets2/css/plugins/animate.min.css">
    <link rel="stylesheet" href="/assets2/fonts/inter/inter.css" />
    <link rel="stylesheet" href="/assets2/fonts/tabler-icons.min.css" />
    <link rel="stylesheet" href="/assets2/fonts/feather.css" />
    <link rel="stylesheet" href="/assets2/fonts/fontawesome.css" />
    <link rel="stylesheet" href="/assets2/fonts/material.css" />
    @yield('css')
    <link rel="stylesheet" href="/assets6/plugins/custom/datatables/datatables.bundle.css">
    <link id="themeColors" rel="stylesheet" href="/dist/css/style.min.css" />
    <link rel="stylesheet" href="/assets2/css/style.css" />
    <link rel="stylesheet" href="/assets2/css/style-preset.css" />
    <link href=" https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
</head>

{!! DataSite('script_header') !!}
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast="true" data-pc-theme="{{DataSite('theme')}}">
		<div class="loader-bg">
			<div class="loader-track">
				<div class="loader-fill"></div>
			</div>
		</div>
 @endif