@extends('Layout.App')
@section('title', 'Cấp bậc tài khoản')

@section('content')
@if (getDomain() == env('PARENT_SITE'))
<div class="pt-5">
    <div class="grid gap-5 mb-5 sm:grid-cols-1 lg:grid-cols-3">
        <div
            class="panel group cursor-pointer rounded border border-black p-3 text-center hover:border-primary dark:border-[#1b2e4b] lg:p-5">
            <h3 class="text-xl lg:text-2xl">Cộng Tác Viên</h3>
            <div class="my-4 p-2.5 text-center text-lg group-hover:text-primary">
                <strong
                    class="text-2xl text-[#3b3f5c] group-hover:text-primary dark:text-white-dark lg:text-3xl">{{ number_format(DataSite('collaborator')) }}
                    <small>VND</small></strong>
            </div>
            <ul class="mb-5 space-y-2.5 font-semibold group-hover:text-primary">
                <li class="flex items-center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180">
                        <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg> Có thể tạo website riêng.
                </li>
                <li class="flex items-center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180">
                        <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg> Giảm giá dịch vụ
                </li>
                <li class="flex items-center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180">
                        <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg> Được tạo website riêng
                </li>
            </ul>
            <a href="/recharge/transfer"
                class="btn text-black shadow-none group-hover:border-primary group-hover:bg-primary/10 group-hover:text-primary dark:border-white-dark/50 dark:text-white-dark">
                Nâng cấp ngay </a>
        </div>
        <div
            class="panel group cursor-pointer rounded border border-black p-3 text-center hover:border-primary dark:border-[#1b2e4b] lg:p-5">
            <h3 class="text-xl lg:text-2xl">Đại Lý</h3>
            <div class="my-4 p-2.5 text-center text-lg group-hover:text-primary">
                <strong
                    class="text-2xl text-[#3b3f5c] group-hover:text-primary dark:text-white-dark lg:text-3xl">{{ number_format(DataSite('agency')) }}
                    <small>VND</small></strong>
            </div>
            <ul class="mb-5 space-y-2.5 font-semibold group-hover:text-primary">
                <li class="flex items-center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180">
                        <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg> Có thể tạo website riêng.
                </li>
                <li class="flex items-center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180">
                        <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg> Giảm giá dịch vụ
                </li>
                <li class="flex items-center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180">
                        <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg> Được tạo website riêng
                </li>
            </ul>
            <a href="/recharge/transfer"
                class="btn text-black shadow-none group-hover:border-primary group-hover:bg-primary/10 group-hover:text-primary dark:border-white-dark/50 dark:text-white-dark">
                Nâng cấp ngay </a>
        </div>
        <div
            class="panel group cursor-pointer rounded border border-black p-3 text-center hover:border-primary dark:border-[#1b2e4b] lg:p-5">
            <h3 class="text-xl lg:text-2xl">Nhà Phân Phối</h3>
            <div class="my-4 p-2.5 text-center text-lg group-hover:text-primary">
                <strong
                    class="text-2xl text-[#3b3f5c] group-hover:text-primary dark:text-white-dark lg:text-3xl">{{ number_format(DataSite('distributor')) }}
                    <small>VND</small></strong>
            </div>
            <ul class="mb-5 space-y-2.5 font-semibold group-hover:text-primary">
                <li class="flex items-center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180">
                        <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg> Có thể tạo website riêng.
                </li>
                <li class="flex items-center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180">
                        <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg> Giảm giá dịch vụ
                </li>
                <li class="flex items-center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180">
                        <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg> Được tạo website riêng
                </li>
            </ul>
            <a href="/recharge/transfer"
                class="btn text-black shadow-none group-hover:border-primary group-hover:bg-primary/10 group-hover:text-primary dark:border-white-dark/50 dark:text-white-dark">
                Nâng cấp ngay </a>
        </div>
    </div>
    <div class="grid gap-5 sm:grid-cols-1 lg:grid-cols-1">
        <div class="panel">
            <div class="mb-5 flex items-center justify-between">
                <h5 class="text-lg font-semibold dark:text-white-light">Bảng Giá Dịch Vụ</h5>
            </div>
            <div class="mb-5">
               
                <ul class="font-semibold">

                @inject('service_social', 'App\Models\ServiceSocial')
                    @inject('service', 'App\Models\Service')

                    @foreach ($service_social->where('domain', env('PARENT_SITE'))->where('status', 'show')->get() as  $item)

                    <li class="py-[5px]">
                        <button type="button">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                class="relative -top-1 inline h-5 w-5 text-primary ltr:mr-2 rtl:ml-2 rotate-180">
                                <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                class="relative -top-1 inline h-5 w-5 text-primary ltr:mr-2 rtl:ml-2">
                                <path opacity="0.5" d="M18 10L13 10" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round"></path>
                                <path
                                    d="M2 6.94975C2 6.06722 2 5.62595 2.06935 5.25839C2.37464 3.64031 3.64031 2.37464 5.25839 2.06935C5.62595 2 6.06722 2 6.94975 2C7.33642 2 7.52976 2 7.71557 2.01738C8.51665 2.09229 9.27652 2.40704 9.89594 2.92051C10.0396 3.03961 10.1763 3.17633 10.4497 3.44975L11 4C11.8158 4.81578 12.2237 5.22367 12.7121 5.49543C12.9804 5.64471 13.2651 5.7626 13.5604 5.84678C14.0979 6 14.6747 6 15.8284 6H16.2021C18.8345 6 20.1506 6 21.0062 6.76946C21.0849 6.84024 21.1598 6.91514 21.2305 6.99383C22 7.84935 22 9.16554 22 11.7979V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V6.94975Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                            </svg>
                            {!! $item->name !!}
                        </button>
                        <div data-height-collapsible="" data-collapse-state="expanded" style="overflow-y: hidden;">
                          
                            <ul class="ltr:pl-14 rtl:pr-14">
                            @foreach ($service->where('domain', env('PARENT_SITE'))->where('status',
                            'show')->where('service_social', $item->slug)->get() as $item1)

                                <li class="py-[5px]">
                                    <button type="button">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="relative -top-1 inline h-5 w-5 text-primary ltr:mr-2 rtl:ml-2 rotate-180">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="relative -top-1 inline h-5 w-5 text-primary ltr:mr-2 rtl:ml-2">
                                            <path opacity="0.5" d="M18 10L13 10" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round"></path>
                                            <path
                                                d="M2 6.94975C2 6.06722 2 5.62595 2.06935 5.25839C2.37464 3.64031 3.64031 2.37464 5.25839 2.06935C5.62595 2 6.06722 2 6.94975 2C7.33642 2 7.52976 2 7.71557 2.01738C8.51665 2.09229 9.27652 2.40704 9.89594 2.92051C10.0396 3.03961 10.1763 3.17633 10.4497 3.44975L11 4C11.8158 4.81578 12.2237 5.22367 12.7121 5.49543C12.9804 5.64471 13.2651 5.7626 13.5604 5.84678C14.0979 6 14.6747 6 15.8284 6H16.2021C18.8345 6 20.1506 6 21.0062 6.76946C21.0849 6.84024 21.1598 6.91514 21.2305 6.99383C22 7.84935 22 9.16554 22 11.7979V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V6.94975Z"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                        </svg>
                                        {{ $item1->name }}
                                    </button>
                                    <div data-height-collapsible="" data-collapse-state="expanded"
                                        style="overflow-y: hidden;">
                                       
                                        <ul class="ltr:pl-14 rtl:pr-14">
                                        @inject('server', '\App\Models\ServerService')
                                        @foreach ($server->getServerByService($item1->id) as $server)
                                            <li class="py-[5px]">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="inline h-4.5 w-4.5 text-primary ltr:mr-2 rtl:ml-2">
                                                    <path
                                                        d="M15.3929 4.05365L14.8912 4.61112L15.3929 4.05365ZM19.3517 7.61654L18.85 8.17402L19.3517 7.61654ZM21.654 10.1541L20.9689 10.4592V10.4592L21.654 10.1541ZM3.17157 20.8284L3.7019 20.2981H3.7019L3.17157 20.8284ZM20.8284 20.8284L20.2981 20.2981L20.2981 20.2981L20.8284 20.8284ZM14 21.25H10V22.75H14V21.25ZM2.75 14V10H1.25V14H2.75ZM21.25 13.5629V14H22.75V13.5629H21.25ZM14.8912 4.61112L18.85 8.17402L19.8534 7.05907L15.8947 3.49618L14.8912 4.61112ZM22.75 13.5629C22.75 11.8745 22.7651 10.8055 22.3391 9.84897L20.9689 10.4592C21.2349 11.0565 21.25 11.742 21.25 13.5629H22.75ZM18.85 8.17402C20.2034 9.3921 20.7029 9.86199 20.9689 10.4592L22.3391 9.84897C21.9131 8.89241 21.1084 8.18853 19.8534 7.05907L18.85 8.17402ZM10.0298 2.75C11.6116 2.75 12.2085 2.76158 12.7405 2.96573L13.2779 1.5653C12.4261 1.23842 11.498 1.25 10.0298 1.25V2.75ZM15.8947 3.49618C14.8087 2.51878 14.1297 1.89214 13.2779 1.5653L12.7405 2.96573C13.2727 3.16993 13.7215 3.55836 14.8912 4.61112L15.8947 3.49618ZM10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981L2.64124 21.3588C3.38961 22.1071 4.33855 22.4392 5.51098 22.5969C6.66182 22.7516 8.13558 22.75 10 22.75V21.25ZM1.25 14C1.25 15.8644 1.24841 17.3382 1.40313 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588L3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14H1.25ZM14 22.75C15.8644 22.75 17.3382 22.7516 18.489 22.5969C19.6614 22.4392 20.6104 22.1071 21.3588 21.3588L20.2981 20.2981C19.8749 20.7213 19.2952 20.975 18.2892 21.1102C17.2615 21.2484 15.9068 21.25 14 21.25V22.75ZM21.25 14C21.25 15.9068 21.2484 17.2615 21.1102 18.2892C20.975 19.2952 20.7213 19.8749 20.2981 20.2981L21.3588 21.3588C22.1071 20.6104 22.4392 19.6614 22.5969 18.489C22.7516 17.3382 22.75 15.8644 22.75 14H21.25ZM2.75 10C2.75 8.09318 2.75159 6.73851 2.88976 5.71085C3.02502 4.70476 3.27869 4.12511 3.7019 3.7019L2.64124 2.64124C1.89288 3.38961 1.56076 4.33855 1.40313 5.51098C1.24841 6.66182 1.25 8.13558 1.25 10H2.75ZM10.0298 1.25C8.15538 1.25 6.67442 1.24842 5.51887 1.40307C4.34232 1.56054 3.39019 1.8923 2.64124 2.64124L3.7019 3.7019C4.12453 3.27928 4.70596 3.02525 5.71785 2.88982C6.75075 2.75158 8.11311 2.75 10.0298 2.75V1.25Z"
                                                        fill="currentColor"></path>
                                                    <path opacity="0.5" d="M6 14.5H14" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path opacity="0.5" d="M6 18H11.5" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path opacity="0.5"
                                                        d="M13 2.5V5C13 7.35702 13 8.53553 13.7322 9.26777C14.4645 10 15.643 10 18 10H22"
                                                        stroke="currentColor" stroke-width="1.5"></path>
                                                </svg>
                                                SV{{ $server->server }} <span class="ml-2 mr-2 text-lg font-bold text-primary">||</span>
                                                {!! $server->title !!} <span
                                                    class="ml-2 mr-2 text-lg font-bold text-primary">||</span>
                                                <span>
                                                    Thành Viên: <span class="text-lg font-bold"> <span
                                                            class="badge bg-success">{{ $server->price }} đ</span>
                                                    </span>,
                                                    Cộng Tác Viên: <span class="text-lg font-bold">
                                                        <span class="badge bg-danger">{{ $server->price_collaborator }} đ</span>
                                                    </span>,
                                                    Đại Lý: <span class="text-lg font-bold"> <span
                                                            class="badge bg-warning">{{ $server->price_agency }} đ</span>
                                                    </span>,
                                                    Nhà Phân Phối: <span class="text-lg font-bold"><span
                                                            class="badge bg-primary">Liên Hệ Admin</span></span>
                                                </span>
                                            </li>
                                            @endforeach
                                        </ul>



                                    </div>
                                </li>
                                @endforeach


                            </ul> 
                        </div>
                    </li>

                    @endforeach


                </ul>

            </div>
            </li>

      


            </ul>

         
        </div>
    </div>
</div>
 
@endsection

@else

 
 
<div class="row mb-3">
<div class="col-md-4">
            <div class="card price-card">
                <div class="card-body">
                    <div class="price-head">
                        <h4 class="mb-0">Cộng Tác Viên</h4>
                        <div class="price-price mt-4">{{ number_format(DataSite('collaborator')) }} <small>VND</small></div>
                        <div class="d-grid">
                            <a class="btn btn-outline-primary mt-4" href="/recharge/transfer">Nâng Cấp Ngay</a>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush product-list">
                        <li class="list-group-item enable">Giảm giá dịch vụ. <i class="fas fa-check-circle text-primary"></i></li>
                        <li class="list-group-item enable">Có thể tạo website riêng. <i class="fas fa-check-circle text-primary"></i></li>
                        <li class="list-group-item enable">Giao diện trang website riêng. <i class="fas fa-check-circle text-primary"></i></li>
                        <li class="list-group-item enable">Có nhóm chat hỗ trợ 24/7. <i class="fas fa-check-circle text-primary"></i></li>
                        <li class="list-group-item enable">Có các ưu đãi quyền lợi riêng. <i class="fas fa-times-circle"></i></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card price-card price-popular">
                <div class="card-body">
                    <div class="price-head">
                        <h4 class="mb-0">Nhà Phân Phối</h4>
                        <div class="price-price mt-4">{{ number_format(DataSite('distributor')) }} <small>VND</small></div>
                        <div class="d-grid">
                            <a class="btn btn-outline-primary mt-4" href="/recharge/transfer">Nâng Cấp Ngay</a>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush product-list">
                        <li class="list-group-item enable">Giảm giá dịch vụ. <i class="fas fa-check-circle text-primary"></i></li>
                        <li class="list-group-item enable">Có thể tạo website riêng. <i class="fas fa-check-circle text-primary"></i></li>
                        <li class="list-group-item enable">Giao diện trang website riêng. <i class="fas fa-check-circle text-primary"></i></li>
                        <li class="list-group-item enable">Có nhóm chat hỗ trợ 24/7. <i class="fas fa-check-circle text-primary"></i></li>
                        <li class="list-group-item enable">Có các ưu đãi quyền lợi riêng. <i class="fas fa-check-circle text-primary"></i></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card price-card">
                <div class="card-body">
                    <div class="price-head">
                        <h4 class="mb-0">Đại Lý</h4>
                        <div class="price-price mt-4">{{ number_format(DataSite('agency')) }} <small>VND</small></div>
                        <div class="d-grid">
                            <a class="btn btn-outline-primary mt-4" href="/recharge/transfer">Nâng Cấp Ngay</a>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush product-list">
                        <li class="list-group-item enable">Giảm giá dịch vụ. <i class="fas fa-check-circle text-primary"></i></li>
                        <li class="list-group-item enable">Có thể tạo website riêng. <i class="fas fa-check-circle text-primary"></i></li>
                        <li class="list-group-item enable">Giao diện trang website riêng. <i class="fas fa-check-circle text-primary"></i></li>
                        <li class="list-group-item enable">Có nhóm chat hỗ trợ 24/7. <i class="fas fa-check-circle text-primary"></i></li>
                        <li class="list-group-item enable">Có các ưu đãi quyền lợi riêng. <i class="fas fa-check-circle text-primary"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@endif