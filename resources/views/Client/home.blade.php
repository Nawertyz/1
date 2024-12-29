@extends('Layout.App')

@section('title', 'Trang chủ')

@section('content')
@if (getDomain() == env('PARENT_SITE'))
<div class="pt-5">
<div class="mb-3 rounded-lg bg-danger p-2 text-center text-xl">
    <div class="text-white">Truy cập vào <a href="{{DataSite('telegram_bot')}}" target="_blank">{{DataSite('telegram_bot')}}</a> để nhận thông báo riêng </div>
    <div class="text-white">Truy cập vào <a href="{{DataSite('group_member')}}" target="_blank">{{DataSite('group_member')}}</a> để nhận thông báo chung </div>
</div>
<div class="mb-6 grid grid-cols-1 gap-6 text-white sm:grid-cols-2 xl:grid-cols-4">
    <div class="panel">
    	<div class="flex items-center font-semibold">
            <span class="grid h-12 w-12 shrink-0 place-content-center rounded-md bg-danger-light text-danger dark:bg-danger dark:text-danger-light">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                    <path d="M2 10C2 7.17157 2 5.75736 2.87868 4.87868C3.75736 4 5.17157 4 8 4H13C15.8284 4 17.2426 4 18.1213 4.87868C19 5.75736 19 7.17157 19 10C19 12.8284 19 14.2426 18.1213 15.1213C17.2426 16 15.8284 16 13 16H8C5.17157 16 3.75736 16 2.87868 15.1213C2 14.2426 2 12.8284 2 10Z" stroke="currentColor" stroke-width="1.5"></path>
                    <path opacity="0.5" d="M19.0003 7.07617C19.9754 7.17208 20.6317 7.38885 21.1216 7.87873C22.0003 8.75741 22.0003 10.1716 22.0003 13.0001C22.0003 15.8285 22.0003 17.2427 21.1216 18.1214C20.2429 19.0001 18.8287 19.0001 16.0003 19.0001H11.0003C8.17187 19.0001 6.75766 19.0001 5.87898 18.1214C5.38909 17.6315 5.17233 16.9751 5.07642 16" stroke="currentColor" stroke-width="1.5"></path>
                    <path d="M13 10C13 11.3807 11.8807 12.5 10.5 12.5C9.11929 12.5 8 11.3807 8 10C8 8.61929 9.11929 7.5 10.5 7.5C11.8807 7.5 13 8.61929 13 10Z" stroke="currentColor" stroke-width="1.5"></path>
                    <path opacity="0.5" d="M16 12L16 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path opacity="0.5" d="M5 12L5 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                </svg>
            </span>
            <div class="ltr:ml-4 rtl:mr-4">
                <h3 class="text-xl text-dark dark:text-white-light">{{ number_format(Auth::user()->balance) }} VNĐ</h3>
                <h6 class="text-white-dark">Số Dư Hiện Tại</h6>
            </div>
        </div>
    </div>
    <div class="panel">
    	<div class="flex items-center font-semibold">
            <span class="grid h-12 w-12 shrink-0 place-content-center rounded-md bg-warning-light text-warning dark:bg-warning dark:text-warning-light">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                    <path d="M2 10C2 7.17157 2 5.75736 2.87868 4.87868C3.75736 4 5.17157 4 8 4H13C15.8284 4 17.2426 4 18.1213 4.87868C19 5.75736 19 7.17157 19 10C19 12.8284 19 14.2426 18.1213 15.1213C17.2426 16 15.8284 16 13 16H8C5.17157 16 3.75736 16 2.87868 15.1213C2 14.2426 2 12.8284 2 10Z" stroke="currentColor" stroke-width="1.5"></path>
                    <path opacity="0.5" d="M19.0003 7.07617C19.9754 7.17208 20.6317 7.38885 21.1216 7.87873C22.0003 8.75741 22.0003 10.1716 22.0003 13.0001C22.0003 15.8285 22.0003 17.2427 21.1216 18.1214C20.2429 19.0001 18.8287 19.0001 16.0003 19.0001H11.0003C8.17187 19.0001 6.75766 19.0001 5.87898 18.1214C5.38909 17.6315 5.17233 16.9751 5.07642 16" stroke="currentColor" stroke-width="1.5"></path>
                    <path d="M13 10C13 11.3807 11.8807 12.5 10.5 12.5C9.11929 12.5 8 11.3807 8 10C8 8.61929 9.11929 7.5 10.5 7.5C11.8807 7.5 13 8.61929 13 10Z" stroke="currentColor" stroke-width="1.5"></path>
                    <path opacity="0.5" d="M16 12L16 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path opacity="0.5" d="M5 12L5 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                </svg>
            </span>
            <div class="ltr:ml-4 rtl:mr-4">
                <h3 class="text-xl text-dark dark:text-white-light">{{ number_format($nap_thang) }} VNĐ</h3>
                <h6 class="text-white-dark">Tổng Nạp Tháng</h6>
            </div>
        </div>
    </div>
    <div class="panel">
    	<div class="flex items-center font-semibold">
            <span class="grid h-12 w-12 shrink-0 place-content-center rounded-md bg-success-light text-success dark:bg-success dark:text-success-light">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                    <path d="M2 10C2 7.17157 2 5.75736 2.87868 4.87868C3.75736 4 5.17157 4 8 4H13C15.8284 4 17.2426 4 18.1213 4.87868C19 5.75736 19 7.17157 19 10C19 12.8284 19 14.2426 18.1213 15.1213C17.2426 16 15.8284 16 13 16H8C5.17157 16 3.75736 16 2.87868 15.1213C2 14.2426 2 12.8284 2 10Z" stroke="currentColor" stroke-width="1.5"></path>
                    <path opacity="0.5" d="M19.0003 7.07617C19.9754 7.17208 20.6317 7.38885 21.1216 7.87873C22.0003 8.75741 22.0003 10.1716 22.0003 13.0001C22.0003 15.8285 22.0003 17.2427 21.1216 18.1214C20.2429 19.0001 18.8287 19.0001 16.0003 19.0001H11.0003C8.17187 19.0001 6.75766 19.0001 5.87898 18.1214C5.38909 17.6315 5.17233 16.9751 5.07642 16" stroke="currentColor" stroke-width="1.5"></path>
                    <path d="M13 10C13 11.3807 11.8807 12.5 10.5 12.5C9.11929 12.5 8 11.3807 8 10C8 8.61929 9.11929 7.5 10.5 7.5C11.8807 7.5 13 8.61929 13 10Z" stroke="currentColor" stroke-width="1.5"></path>
                    <path opacity="0.5" d="M16 12L16 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path opacity="0.5" d="M5 12L5 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                </svg>
            </span>
            <div class="ltr:ml-4 rtl:mr-4">
                <h3 class="text-xl text-dark dark:text-white-light">{{ number_format(Auth::user()->total_recharge) }} VNĐ</h3>
                <h6 class="text-white-dark">Tổng Đã Nạp</h6>
            </div>
        </div>
    </div>
    <div class="panel">
    	<div class="flex items-center font-semibold">
            <span class="grid h-12 w-12 shrink-0 place-content-center rounded-md bg-primary-light text-primary dark:bg-primary dark:text-primary-light">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle>
                    <path opacity="0.5" d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" stroke="currentColor" stroke-width="1.5"></path>
                </svg>
            </span>
            <div class="ltr:ml-4 rtl:mr-4">
                <h3 class="text-xl text-dark dark:text-white-light">{{ level(Auth::user()->level, false) }}</h3>
                <h6 class="text-white-dark">Cấp Độ Tài Khoản</h6>
            </div>
        </div>
    </div>
</div>
    <div class="mb-6 grid gap-6 xl:grid-cols-3">
    <div class="panel h-full xl:col-span-2">
        <div class="mb-5 flex items-center justify-between">
            <h5 class="text-lg font-semibold dark:text-white-light">Thông Báo Mới Nhất <small class="text-danger">(Admin sẽ thông báo những vấn đề quan trọng.)</small></h5>
        </div>
        <div class="ps relative font-bold h-[600px] ps--active-y">

        @foreach ($notification as $item)
                        <div class="  rounded bg-{{$item->class}}-light p-3.5 text-{{$item->class}} dark:bg-{{$item->class}}-dark-light  mb-3">
                <p>{!! $item->content !!}</p>
            </div>
                       @endforeach 
                    </div>
    </div>
        <div>
            <div>
                <h1 class="mb-4 mt-4 text-center text-3xl font-bold dark:text-[#eee]">Thông tin chung</h1>
            </div>
            <div class="panel overflow-hidden border-0 p-0">
                <div class="min-h-[190px] bg-gradient-to-r from-[#4361ee] to-[#160f6b] p-6">
                    <div class="mb-6 flex items-center justify-between">
                        <div
                            class="flex items-center rounded-full bg-black/50 p-1 font-semibold text-white ltr:pr-3 rtl:pl-3">
                            <img src="{{ Auth::user()->avatar }}"
                                alt=""
                                class="block h-8 w-8 rounded-full border-2 border-white/50 object-cover ltr:mr-1 rtl:ml-1">
                                {{ Auth::user()->username }}</div><a href="/recharge/transfer"
                            class="flex h-9 w-9 items-center justify-between rounded-md bg-black text-white hover:opacity-80 ltr:ml-auto rtl:mr-auto"
                            type="button"><svg class="m-auto h-6 w-6" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24">
                                <line x1="12" x2="12" y1="5" y2="19"></line>
                                <line x1="5" x2="19" y1="12" y2="12"></line>
                            </svg></a>
                    </div>
                    <div class="flex items-center justify-between text-white">
                        <p class="text-xl">Số dư</p>
                        <h5 class="text-2xl ltr:ml-auto rtl:mr-auto">{{ number_format(Auth::user()->balance) }}&nbsp;₫</h5>
                    </div>
                </div>
                <div class="-mt-12 mb-6 grid grid-cols-2 gap-2 px-8">
                    <div class="rounded-md bg-white px-4 py-2.5 shadow dark:bg-[#060818]"><span
                            class="mb-4 flex items-center justify-between dark:text-white">Tổng nạp <svg
                                class="h-4 w-4 text-success" fill="none" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 15L12 9L5 15" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5"></path>
                            </svg></span>
                        <div
                            class="btn w-full border-0 bg-[#ebedf2] py-1 text-base text-[#515365] shadow-none dark:bg-black dark:text-[#bfc9d4]">
                            {{ number_format(Auth::user()->total_recharge) }}&nbsp;₫</div>
                    </div>
                    <div class="rounded-md bg-white px-4 py-2.5 shadow dark:bg-[#060818]"><span
                            class="mb-4 flex items-center justify-between dark:text-white">Đã tiêu <svg
                                class="h-4 w-4 text-danger" fill="none" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5"></path>
                            </svg></span>
                        <div
                            class="btn w-full border-0 bg-[#ebedf2] py-1 text-base text-[#515365] shadow-none dark:bg-black dark:text-[#bfc9d4]">
                            {{ number_format(Auth::user()->total_deduct) }}&nbsp;₫</div>
                    </div>
                </div>
            </div>
            <div>
                <h1 class="mb-4 mt-4 text-center text-3xl font-bold dark:text-[#eee]">Hoạt động mới</h1>
            </div>
            <div role="alert" class="mb-3 font-bold ant-alert ant-alert-success ant-alert-no-icon css-eq3tly"
                data-show="true">
                <!---->
                <div class="ant-alert-content">
                    <div class="  rounded bg-secondary-light p-3.5 text-secondary dark:bg-secondary-dark-light">Tham gia bot telegram <a href="{{DataSite('telegram_bot')}}"
                            target="_blank">{{DataSite('telegram_bot')}}</a> để nhận thông báo đơn hàng và hoạt động tài khoản nhé!, cập
                        nhật telegram id tại <a href="/profile" class="text-danger">đây</a></div>
                    <!---->
                </div>
                <!---->
                <!---->
            </div>
            <div class="ps relative h-[600px] ps--active-y">
            @foreach ($activities as $item)
                <div class="panel mb-3">
                    <div class="flex flex-col gap-5 md:flex-row md:items-center">
                        <h5 class="text-lg font-semibold dark:text-white-light">---- {{ $item->created_at }}</h5>
                    </div>
                    <hr class="mb-3 mt-2">
                    <div>
                            <p>{!! $item->content !!}</p>
                       </div>
                </div>
@endforeach
                
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; right: 0px; height: 600px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 230px;"></div>
                </div>
            </div>
        </div>
    </div>

    <div x-data="modal" class="mb-5">
        <!-- button -->


        <!-- modal -->
        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                <div x-show="open" x-transition x-transition.duration.300
                    class="panel border-0 p-0 rounded-lg overflow-hidden my-8 w-full max-w-lg">

                    <div class="p-5">
                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                            @if (DataSite('image_modal') != '')
                             <img src="{{ DataSite('image_modal') }}" alt="" width="100%" height="100%">
                            @endif
                            <p class="pt-3 mb-3 text-center">{!! DataSite('notice') !!}</p>
                        </div>
                        <div class="flex justify-end items-center mt-8">
                            <button type="button" class="btn btn-outline-danger" @click="toggle">Đóng</button>
                            <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4" @click="toggle">Tôi Đã
                                Hiểu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('script')
<script type="text/javascript">
document.addEventListener("alpine:init", () => {
    Alpine.data("modal", (initialOpenState = true) => ({
        open: initialOpenState,

        toggle() {
            this.open = !this.open;
        },
    }));
});
</script>
@endsection
@else
 
<div class="row">
					        <div class="col-md-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="avtar bg-light-danger me-3">
                            <i class="ti ti-brand-cashapp fs-2"></i>
                         </div>
                        <div>
                            <h4 class="mb-0">{{ number_format(Auth::user()->balance) }} đ</h4>
                            <p class="mb-0 text-opacity-75">Số dư hiện tại</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="avtar bg-light-warning me-3">
                            <i class="ti ti-calendar-time fs-2"></i>
                        </div>
                        <div>
                            <h4 class="mb-0">{{ number_format(Auth::user()->total_deduct) }} đ</h4>
                            <p class="mb-0 text-opacity-75">Tổng đã tiêu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="avtar bg-light-success me-3">
                            <i class="ti ti-brand-cashapp fs-2"></i>
                        </div>
                        <div>
                            <h4 class="mb-0">{{ number_format(Auth::user()->total_recharge) }} đ</h4>
                            <p class="mb-0 text-opacity-75">Tổng đã nạp</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="avtar bg-light-primary me-3">
                            <i class="ti ti-diamond-filled fs-2"></i>
                        </div>
                        <div>
                            <h4 class="mb-0">{{ level(Auth::user()->level, false) }}</h4>
                            <p class="mb-0 text-opacity-75">Cấp bậc</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="scroll h-500px">



            @foreach ($notification as $item)
                                <div class="alert alert-{{ $item->class }}  mb-3" role="alert">
                    <div class="media align-items-center mb-2">
                        <div class="media-body d-none d-sm-inline-block">
                            <h6 class="mb-0 text-{{ $item->class }}">{{ $item->name }} <small> {{ $item->created_at }}</small></h6>
                        </div>
                    </div>
                    <p>{!! $item->content !!}</p>
 
                </div>
                                

                @endforeach



                            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Cập nhật gần đây</h5>
                </div>
                <div class="card-body">
                    <div class="scroll h-350px">
                    @foreach ($activities as $item)
                        <div class="list-group list-group-flush">

                    
                                                        <div class="list-group-item list-group-item-action p-3">
                                <div class="media align-items-center">
                                    <div class="chat-avtar">
                                        <div class="avtar avtar-s bg-light-primary">
                                            <i class="ti ti-bell-ringing-filled fs-4"></i>
                                        </div>
                                    </div>
                                    <div class="media-body mx-2">
                                        <span class="f-14 text-muted mb-2"><p>{!! $item->content !!}</p></span>
                                        <p class="f-12 text-muted"><i class="ti ti-clock"></i> {{ $item->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                         
                                                    </div>     @endforeach
                                                    
                    </div>
                </div>
            </div>

            <div class="card">
            <div class="card-header">
                    <h5>Báo cáo</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-sm-6 card-statistical mb-2">
                            <div class="d-flex position-relative">
                                <div class="col-auto">
                                    <div class="card bg-soft-primary text-primary" style="max-width: 100%;max-height: 100%;">
                                        <div class="card-body p-3 text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 pl-3 p-2">
                                    <h6 class="fs-0 mb-1" data-countup="{&quot;endValue&quot;:0,&quot;suffix&quot;:&quot;\u0111&quot;}" style="color: #3498db">{{ number_format(Auth::user()->total_deduct) }}đ</h6>
                                    <p class="mb-0 fs--1 text-500">Đã tiêu</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-statistical mb-2">
                            <div class="d-flex position-relative">
                                <div class="col-auto">
                                    <div class="card bg-soft-info text-info" style="max-width: 100%;max-height: 100%;">
                                        <div class="card-body p-3 text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 pl-3 p-2">
                                    <h6 class="fs-0 mb-1" data-countup="{&quot;endValue&quot;:0}" style="color: #7ed6df">{{$order}}</h6>
                                    <p class="mb-0 fs--1 text-500">Đơn hàng</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-statistical">
                            <div class="d-flex position-relative">
                                <div class="col-auto">
                                    <div class="card bg-soft-danger text-danger" style="max-width: 100%;max-height: 100%;">
                                        <div class="card-body p-3 text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 pl-3 p-2">
                                    <h6 class="fs-0 mb-1" data-countup="{&quot;endValue&quot;:0}" style="color: #e84118">{{$dangchay}}</h6>
                                    <p class="mb-0 fs--1 text-500">Đang chạy</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-statistical">
                            <div class="d-flex position-relative">
                                <div class="col-auto">
                                    <div class="card bg-soft-success text-success" style="max-width: 100%;max-height: 100%;">
                                        <div class="card-body p-3 text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 pl-3 p-2">
                                    <h6 class="fs-0 mb-1" data-countup="{&quot;endValue&quot;:0}" style="color: #44bd32">{{$hoanthanh}}</h6>
                                    <p class="mb-0 fs--1 text-500">Chạy xong</p>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal fade" id="bs-example-modal-md" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <div class="modal-body p-2">
                 
<p class="pt-3 mb-3 text-center">{!! DataSite('notice') !!}</p>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng thông báo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <!-- /.modal-dialog -->
</div>
@endsection
@section('script')
<script>
     window.onload = function() {
    var modalLastClosed1 = localStorage.getItem('modalLastClosed');
    var delayTime =  5000 * 1000; 
    if (!modalLastClosed1 || Date.now() - modalLastClosed1 > delayTime) {
        $('#bs-example-modal-md').modal('show');
    }
};

$('#close-hourly').on('click', function() {
    localStorage.setItem('modalLastClosed', Date.now());
});
</script>
@endsection
@endif