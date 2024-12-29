@extends('Layout.App')
@section('title', 'Tạo website riêng')
@section('content')
@if (getDomain() == env('PARENT_SITE'))
<div class="panel pb-[2px]">
    <div class="mb-5 flex items-center justify-between">
        <h5 class="text-lg font-semibold dark:text-white-light">Thông tin &amp; cấu hình</h5>
    </div>
    <div class="mb-5">
        <div class="mb-3 rounded-lg bg-danger p-3 text-white">
            <ul>
                <li>- Để tạo một trang web con, bạn cần trở thành đối tác hoặc đại lý của chúng tôi.</li>
                <li>- Xin vui lòng không sử dụng các tên miền chứa từ "Facebook" hoặc "Instagram" để tránh vi phạm bảng
                    quyền.</li>
                <li>- Khách hàng sẽ tạo tài khoản và sử dụng dịch vụ trên trang web con. Tiền sẽ được trừ từ tài khoản
                    đại lý của bạn trên trang web chính. Vì vậy, để mua tài khoản đại lý, khách hàng cần có đủ tiền
                    trong tài khoản của mình.</li>
                <li>- Chúng tôi luôn hỗ trợ và đồng hành cùng tất cả các đối tác và đại lý để phát triển kinh doanh!
                </li>
            </ul>
        </div>
        
        <div class="col-span-2 mb-3">
                    <div class="flex flex-col">
                        <label for="created_at">Api Token
                        </label>
                        <div class="flex">
                            <input type="text" name="api_token" value="{{ Auth::user()->api_token }}" class="form-input ltr:rounded-r-none rtl:rounded-l-none" disabled="">
                            <div class="flex cursor-pointer items-center justify-center border border-[#e0e6ed] bg-success px-3 font-semibold ltr:rounded-r-md ltr:border-l-0 rtl:rounded-l-md rtl:border-r-0 dark:border-[#17263c]">
                                <button class="btn btn-success w-auto rounded-l-none"  type="button" id="btnReload">
                                    <span role="img" aria-label="reload" class="anticon anticon-reload site-form-item-icon">
                                        <svg focusable="false" class="" data-icon="reload" width="1em" height="1em" fill="currentColor" aria-hidden="true" viewBox="64 64 896 896">
                                            <path d="M909.1 209.3l-56.4 44.1C775.8 155.1 656.2 92 521.9 92 290 92 102.3 279.5 102 511.5 101.7 743.7 289.8 932 521.9 932c181.3 0 335.8-115 394.6-276.1 1.5-4.2-.7-8.9-4.9-10.3l-56.7-19.5a8 8 0 00-10.1 4.8c-1.8 5-3.8 10-5.9 14.9-17.3 41-42.1 77.8-73.7 109.4A344.77 344.77 0 01655.9 829c-42.3 17.9-87.4 27-133.8 27-46.5 0-91.5-9.1-133.8-27A341.5 341.5 0 01279 755.2a342.16 342.16 0 01-73.7-109.4c-17.9-42.4-27-87.4-27-133.9s9.1-91.5 27-133.9c17.3-41 42.1-77.8 73.7-109.4 31.6-31.6 68.4-56.4 109.3-73.8 42.3-17.9 87.4-27 133.8-27 46.5 0 91.5 9.1 133.8 27a341.5 341.5 0 01109.3 73.8c9.9 9.9 19.2 20.4 27.8 31.4l-60.2 47a8 8 0 003 14.1l175.6 43c5 1.2 9.9-2.6 9.9-7.7l.8-180.9c-.1-6.6-7.8-10.3-13-6.2z"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-2 mb-3">
                    <div class="flex flex-col">
                        <label for="">Tên Miền
                        </label>
                        <form action="{{ route('create.website.post') }}" method="POST">
                    @csrf
                        <div class="flex">
                       
                    <input type="text" value="{{ Auth::user()->api_token }}" name="api_token" hidden>
                    <input type="text"class="form-input ltr:rounded-r-none rtl:rounded-l-none" id="domain" name="domain" placeholder="Tên miền"
                            value="{{ $sitecon->domain_name }}">
                            <div class="flex cursor-pointer items-center justify-center border border-[#e0e6ed] bg-primary px-3 font-semibold ltr:rounded-r-md ltr:border-l-0 rtl:rounded-l-md rtl:border-r-0 dark:border-[#17263c]">
                                <button class="btn btn-primary w-auto rounded-l-none"  type="submit" >
                                     
                                    Lưu 
                                 
                                </button>
                            </div>

                        </div>
                        </form>
                    </div>
                </div>
 
        <div class="mb-3 rounded-lg bg-success p-3 text-white">
            <ul>
                <li>- Bước 1: Chọn một tên miền để làm site con, nếu chưa có bạn có thể đăng ký tại (tenten,
                    namecheap...).</li>
                <li>- Bước 2: Trỏ nameserver 1 đến: {{ env('NAME_SERVER1') }}</li>
                <li>- Bước 3: Trỏ nameserver 2 đến: {{ env('NAME_SERVER2') }}</li>
                <li>- Bước 4: Sau khi trỏ nameserver thành công bạn cần liên hệ với <a
                                            href="{{ DataSite('facebook') }}" target="_blank" class="text-warning">Admin</a> để được kích hoạt</li>
                <li>- Bước 5: Truy cập vào trang của bạn và nhập api token (lưu ý
                                    trước lúc kích hoạt api
                                    token không được để lộ tên miền tránh bị kích hoạt tài khoản admin)</li>
            </ul>
        </div>
    </div>
</div>
 

                <!-- <div class="mb3">
                        <div class="input-group border rounded-1">
                            <input type="text" class="form-input border-0" id="api_token"
                                value="{{ Auth::user()->api_token }}" readonly>
                            <span class="input-group-text bg-transparent px-6" id="basic-addon1"><button type="button"
                                    id="btnReload" class="btn btn-primary">
                                    <i class="ti ti-reload"></i>
                                </button></span>
                        </div>
                    </div> -->
                
    


@endsection
@section('script')

<script>
$('#btnReload').click(function() {
    $.ajax({
        url: "{{ route('user.action', 'change-token') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
        },
        dataType: "json",
        beforeSend: function() {
            $('#btnReload').html(` <svg focusable="false" class="" data-icon="reload" width="1em" height="1em" fill="currentColor" aria-hidden="true" viewBox="64 64 896 896">
                                            <path d="M909.1 209.3l-56.4 44.1C775.8 155.1 656.2 92 521.9 92 290 92 102.3 279.5 102 511.5 101.7 743.7 289.8 932 521.9 932c181.3 0 335.8-115 394.6-276.1 1.5-4.2-.7-8.9-4.9-10.3l-56.7-19.5a8 8 0 00-10.1 4.8c-1.8 5-3.8 10-5.9 14.9-17.3 41-42.1 77.8-73.7 109.4A344.77 344.77 0 01655.9 829c-42.3 17.9-87.4 27-133.8 27-46.5 0-91.5-9.1-133.8-27A341.5 341.5 0 01279 755.2a342.16 342.16 0 01-73.7-109.4c-17.9-42.4-27-87.4-27-133.9s9.1-91.5 27-133.9c17.3-41 42.1-77.8 73.7-109.4 31.6-31.6 68.4-56.4 109.3-73.8 42.3-17.9 87.4-27 133.8-27 46.5 0 91.5 9.1 133.8 27a341.5 341.5 0 01109.3 73.8c9.9 9.9 19.2 20.4 27.8 31.4l-60.2 47a8 8 0 003 14.1l175.6 43c5 1.2 9.9-2.6 9.9-7.7l.8-180.9c-.1-6.6-7.8-10.3-13-6.2z"></path>
                                        </svg>`).prop(
                'disabled', true);
        },
        complete: function() {
            $('#btnReload').html(` <svg focusable="false" class="" data-icon="reload" width="1em" height="1em" fill="currentColor" aria-hidden="true" viewBox="64 64 896 896">
                                            <path d="M909.1 209.3l-56.4 44.1C775.8 155.1 656.2 92 521.9 92 290 92 102.3 279.5 102 511.5 101.7 743.7 289.8 932 521.9 932c181.3 0 335.8-115 394.6-276.1 1.5-4.2-.7-8.9-4.9-10.3l-56.7-19.5a8 8 0 00-10.1 4.8c-1.8 5-3.8 10-5.9 14.9-17.3 41-42.1 77.8-73.7 109.4A344.77 344.77 0 01655.9 829c-42.3 17.9-87.4 27-133.8 27-46.5 0-91.5-9.1-133.8-27A341.5 341.5 0 01279 755.2a342.16 342.16 0 01-73.7-109.4c-17.9-42.4-27-87.4-27-133.9s9.1-91.5 27-133.9c17.3-41 42.1-77.8 73.7-109.4 31.6-31.6 68.4-56.4 109.3-73.8 42.3-17.9 87.4-27 133.8-27 46.5 0 91.5 9.1 133.8 27a341.5 341.5 0 01109.3 73.8c9.9 9.9 19.2 20.4 27.8 31.4l-60.2 47a8 8 0 003 14.1l175.6 43c5 1.2 9.9-2.6 9.9-7.7l.8-180.9c-.1-6.6-7.8-10.3-13-6.2z"></path>
                                        </svg>`).prop('disabled', false);
        },
        success: function(data) {
            if (data.status == 'success') {
                $('#api_token').val(data.api_token);
                swal1("Thay đổi thành công", "success");
            } else {
                swal1("Thay đổi thất bại", "error");
            }
        },
    });
});
</script>
@endsection
@else
 
 
    <div class="row">
        <div class="col-md-12">
            <div class="card card-flush">
            <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                            Thông tin &amp; cấu hình
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
            
                <div class="col-md-12 mx-auto">
                   
                    <div class="alert alert-warning " role="alert">
- Bạn phải đạt cấp bậc cộng tác viên hoặc đại lý mới có thể tạo web con! <br>
- Nghiêm cấm các tiên miền có chữ : Facebook, Instagram để tránh bị vi phạm bản quyền. <br>
- Khách hàng tạo tài khoản và sử dụng dịch vụ ở site con. Tiền sẽ trừ vào tài khoản của đại
lý ở
site chính. Vì thế để khách hàng mua được tài khoản đại lý phải còn số dư. <br>
- Chúng tôi hỗ trợ mục đích kinh doanh của tất cả cộng tác viên và đại lý!
</div>
</div>              
<div class="col-md-8 mx-auto">
                    <div class="form-group mb-3">
                            <label class="form-label" for="">Api Token</label>
                            <div class="input-group">
                                <input class="form-control" type="text" value="{{ Auth::user()->api_token }}" id="api_token" readonly="">
                                <button type="button" id="btnReload" class="btn btn-primary"><i class="fa fa-sync"></i> Thay
                                    đổi</button>
                            </div>
                        </div>
               
                    <div class="mb-3">
                    <form action="{{ route('create.website.post') }}" method="POST">
                        @csrf
                        <input type="text" value="{{ Auth::user()->api_token }}" name="api_token" hidden>
                        <label for="domain" class="form-label">Tên miền</label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="domain" name="domain" placeholder="Tên miền"
                                value="{{ $sitecon->domain_name }}">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu Miền Ngay</button>
                        </div>
                        
                    </form>
</div>
</div>
<div class="col-md-12 mx-auto">
                    <div class="alert alert-success " role="alert">
<p class="fw-bold">Hướng dẫn tạo website:</p>
<p><span class="fw-bold">- Bước 1 :</span> <span>Bạn cần phải có tên miền, nếu chưa bạn có
thể mua tên miền tại <a href="http://tenten.vn" target="_blank" rel="noopener noreferrer" class="">tenten.vn</a> (đọc lưu ý trước khi
mua).</span></p>
<p><span class="fw-bold">- Bước 2 :</span> <span>Trỏ Nameserver1: <b class="text-info">{{ env('NAME_SERVER1') }}</b></span></p>
<p><span class="fw-bold">- Bước 3 :</span> <span>Trỏ Nameserver2: <b class="text-info">{{ env('NAME_SERVER2') }}</b></span></p>
<p><span class="fw-bold">- Bước 4 :</span> <span>Sau khi đã trỏ Nameserver bạn hãy liên hệ
zalo: <b class="text-white"><a href="{{ DataSite('zalo') }}" target="_blank" rel="noopener noreferrer" class="">{{ DataSite('zalo') }}</a></b>
để hỗ trợ kích hoạt.</span></p>
<p><span class="fw-bold">- Bước 5 :</span> Truy cập vào trang của bạn và nhập api token (lưu
ý trước lúc kích hoạt api token không được để lộ tên miền tránh bị kích hoạt tài khoản
admin).
</p>
</div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#btnReload').click(function() {
            $.ajax({
                url: "{{ route('user.action', 'change-token') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                },
                dataType: "json",
                beforeSend: function() {
                    $('#btnReload').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý..').prop(
                        'disabled', true);
                },
                complete: function() {
                    $('#btnReload').html('<i class="fa fa-sync"></i> Thay đổi').prop('disabled', false);
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $('#api_token').val(data.api_token);
                        swa1("Thay đổi thành công", "success");
                    } else {
                        swa1("Thay đổi thất bại", "error");
                    }
                },
            });
        });
    </script>
@endsection

@endif