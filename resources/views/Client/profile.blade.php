@extends('Layout.App')
@section('title', 'Thông tin cá nhân')

@section('content')
@if (getDomain() == env('PARENT_SITE'))
<div class="pt-5">
							<div class="grid grid-cols-1 gap-5 md:grid-cols-2">
	<div class="panel">
		<div class="mb-5 flex items-center justify-between">
			<h5 class="text-lg font-semibold dark:text-white-light">Thông tin tài khoản</h5>
			<div class="ltr:ml-auto rtl:mr-auto">
                <div x-data="modal">
                    <button class="btn btn-primary" @click="toggle">
                        <span role="img" aria-label="edit">
                            <svg focusable="false" class="" data-icon="edit" width="1em" height="1em" fill="currentColor" aria-hidden="true" viewBox="64 64 896 896">
                                <path d="M257.7 752c2 0 4-.2 6-.5L431.9 722c2-.4 3.9-1.3 5.3-2.8l423.9-423.9a9.96 9.96 0 000-14.1L694.9 114.9c-1.9-1.9-4.4-2.9-7.1-2.9s-5.2 1-7.1 2.9L256.8 538.8c-1.5 1.5-2.4 3.3-2.8 5.3l-29.5 168.2a33.5 33.5 0 009.4 29.8c6.6 6.4 14.9 9.9 23.8 9.9zm67.4-174.4L687.8 215l73.3 73.3-362.7 362.6-88.9 15.7 15.6-89zM880 836H144c-17.7 0-32 14.3-32 32v36c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-36c0-17.7-14.3-32-32-32z"></path>
                            </svg>
                        </span>
                    </button>
                    <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60" :class="open &amp;&amp; '!block'">
                        <div class="flex min-h-screen items-start justify-center px-4" @click.self="open = false">
                            <div x-show="open" x-transition="" x-transition.duration.300="" class="panel my-8 w-full max-w-lg overflow-hidden rounded-lg border-0 p-0" style="display: none;">
                                <div class="flex justify-between bg-[#fbfbfb] px-5 py-3 dark:bg-[#121c2c]">
                                    <h5 class="text-lg font-bold">Cập nhật thông tin cá nhân</h5>
                                    <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                </div>
                                <div class="p-5">
                                    <form action="{{ route('update-profile', 'update-telegram') }}" method="POST" request="ptl">
                                        <div class="grid grid-cols-1 gap-5 md:grid-cols-1 mb-5">
                                            <div>
                                                <label>Telegram Id : </label>
                                                <input class="form-input" type="text" name="telegram_id" value="{{ Auth::user()->telegram_chat_id }}">
                                            </div>
                                            <div>
                                                <label>Link Join Bot</label>
                                                <input class="form-input" value="{{ DataSite('telegram_bot') }}" onclick="openNewTab()" readonly>
                                            </div>
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary w-full">Lưu ngay</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<div>
			<form>
				<div class="grid grid-cols-1 gap-5 md:grid-cols-2 mb-5">
                    <div>
						<label>Họ Và Tên : </label>
                        <input class="form-input" type="text" value="{{ Auth::user()->name }}" disabled="">
					</div>
					<div>
						<label>Địa Chỉ Email : </label>
                        <input class="form-input" type="email" value="{{ Auth::user()->email }}" disabled="">
					</div>
					<div>
						<label>Tên Tài Khoản : </label>
                        <input class="form-input" type="username" value="{{ Auth::user()->username }}" disabled="">
					</div>
					<div>
						<label>Cấp Độ : </label>
                        <input class="form-input" type="text" value="{{ level(Auth::user()->level, false) }}" disabled="">
					</div>
					<div>
						<label>Quốc Gia : </label>
                        <input class="form-input" type="text" value="Việt Nam" disabled="">
					</div>
					<div>
						<label>Thời Gian Tham Gia : </label>
                        <input class="form-input" type="text" value="{{ Auth::user()->created_at }}" disabled="">
					</div>
				</div>
                <div class="col-span-2">
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
			</form>
		</div>
	</div>
	<div class="panel">
		<div class="mb-5 flex items-center justify-between">
			<h5 class="text-lg font-semibold dark:text-white-light">Thay đổi mật khẩu</h5>
		</div>
		<div>
            <form   class="space-y-8"action="{{ route('update-profile', 'change-password') }}" method="POST"  request="ptl">
                <div>
                    <label for="username">Mật khẩu hiện tại : </label>
                    <input class="form-input" type="password" name="old_password">
                </div>
                <div>
                    <label for="username">Mật khẩu mới : </label>
                    <input class="form-input" type="password" name="new_password">
                </div>
                <div>
                    <label for="username">Nhập lại mật khẩu mới : </label>
                    <input class="form-input" type="password" name="confirm_password">
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary w-full">Đổi mật khẩu</button>
                </div>
            </form>
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

<script>
  // Lấy giá trị từ hàm DataSite('telegram_bot')
  var telegramBotValue = "{{ DataSite('telegram_bot') }}";

  // Hàm mở tab mới khi ô nhập liệu được nhấp vào
  function openNewTab() {
    // Kiểm tra giá trị để tránh mở tab với giá trị trống hoặc không hợp lệ
    if (telegramBotValue) {
      window.open(telegramBotValue, '_blank');
    }
  }
</script>
@endsection

@else
 

<div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body py-2">
              <ul class="nav nav-justified nav-pills justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2" role="tab" aria-selected="true">
                    <i class="ti ti-user me-2"></i> Thông tin
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="profile-tab-3" data-bs-toggle="tab" href="#profile-3" role="tab" aria-selected="false" tabindex="-1">
                    <i class="ti ti-lock me-2"></i> Thay đổi mật khẩu
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="profile-tab-4" data-bs-toggle="tab" href="#profile-4" role="tab" aria-selected="false" tabindex="-1">
                    <i class="ti ti-settings me-2"></i> Cấu hình tài khoản
                  </a>
                </li>
              </ul>
            </div>
          </div>
          
          <div class="tab-content">
            <div class="tab-pane active show" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h5>Thông Tin Tài Khoản</h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                       
<form action="{{ route('update-profile', 'profile') }}" method="POST"
                                            request="ptl">
        <div class="row">
        <div class="col-md-6">
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control"  name="name"  value="{{ Auth::user()->name }}"  >
                        <label class="form-label" for="">Họ và tên</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled="">
                        <label class="form-label" for="">Email</label>
                       
                    </div>    </div>
                    <div class="col-md-6">
                    <div class="form-floating  mb-3">
                    <input type="text" class="form-control" value="{{ Auth::user()->username }}" disabled="">
                        <label class="form-label" for="">Tài khoản</label>
                     
                    </div>    </div>
                    <div class="col-md-6">
                    <div class="form-floating  mb-3">
                    <input type="text" class="form-control" value="{{ level(Auth::user()->level, false) }}" disabled="">
                        <label class="form-label" for="">Cấp độ</label>
                    
                    </div>    </div>
                    <div class="col-md-6">
                    <div class="form-floating  mb-3">
                    <input type="text" class="form-control" value="{{ Auth::user()->created_at }}" disabled="">
                        <label class="form-label" for="">Thời gian tham gia</label>
                       
                    </div>    </div>
                    <div class="col-md-6">
                    <div class="form-floating  mb-3">
                       <input type="text" class="form-control" name="image" value="{{ Auth::user()->avatar }}" >
                        <label class="form-label" for="">Link ảnh đại diện</label>
                       
                    </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="facebook" value="{{ Auth::user()->facebook }}" >
                        <label class="form-label" for="">Link facebook</label>
                       
                    </div>
                    </div>
                    <div class="col-md-12 mb-3">
                    <div class="form-floating ">
                    
                        <div class="input-group">
                            <input class="form-control"  onclick="coppy('{{ Auth::user()->api_token }}')" type="text" value="{{ Auth::user()->api_token }}" id="api_token" readonly="">
                            <button type="button" id="btnReload"  class="btn btn-primary"><i class="fa fa-sync"></i> Thay
                                đổi</button>
                        </div>
                     
                    </div>
                    </div>
                    <div class="mb-3">
                                                <button type="submit" class="btn btn-primary col-12">
                                                    <i class="ti ti-device-floppy me-2 fs-4"></i>
                                                    Lưu thông tin
                                                </button>
                                            </div>
                    
                </div></form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h5>Tài Chính</h5>
                    </div>
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2">
                        <div class="flex-grow-1 me-3">
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <div class="avtar avtar-xs btn-light-twitter">
                                <i class="fas fa-coins f-16"></i>
                              </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Đã Nạp:</h6>
                            </div>
                          </div>
                        </div>
                        <div class="flex-shrink-0">
                          <button class="btn btn-link-primary">{{ number_format(Auth::user()->total_recharge) }} VNĐ</button>
                        </div>
                      </div>
                      <div class="d-flex align-items-center mb-2">
                        <div class="flex-grow-1 me-3">
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <div class="avtar avtar-xs btn-light-facebook">
                                <i class="fas fa-coins f-16"></i>
                              </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Số Dư:</h6>
                            </div>
                          </div>
                        </div>
                        <div class="flex-shrink-0">
                          <button class="btn btn-link-success">{{ number_format(Auth::user()->balance) }} VNĐ</button>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="flex-grow-1 me-3">
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <div class="avtar avtar-xs btn-light-linkedin">
                                <i class="fas fa-coins f-16"></i>
                              </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Đã Tiêu</h6>
                            </div>
                          </div>
                        </div>
                        <div class="flex-shrink-0">
                          <button class="btn btn-link-danger">{{ number_format(Auth::user()->total_deduct) }} VNĐ</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="profile-3" role="tabpanel" aria-labelledby="profile-tab-3">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h5>Thay Đổi Mật Khẩu</h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                         <form action="{{ route('update-profile', 'change-password') }}" method="POST"
                                        request="ptl">
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu cũ</label>
                        <input type="password" class="form-control" name="old_password" placeholder="Nhập mật khẩu cũ">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu mới</label>
                        <input type="password" class="form-control" name="new_password" placeholder="Nhập mật khẩu mới">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu mới</label>
                        <input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu mới">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i> Thay
                            đổi</button>
                    </div>
                </form>
                      </div>
                    </div>
                  </div>
                </div>

                
               </div>
           </div>
 

            <div class="tab-pane" id="profile-4" role="tabpanel" aria-labelledby="profile-tab-4">
            <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h5>Cấu Hình Tài Khoản</h5>
                </div>
                <div class="card-body">
                       <form action="{{ route('update-profile', 'update-telegram') }}" method="POST"
                                        request="ptl">
                                        <div class="form-group mb-3 row">
                                            <label for="" class="form-label col-md-3">Trạng thái Telegram</label>
                                            <div class="col-md-9">
                                                @if (Auth::user()->telegram_verified == 'yes')
                                                    <span>
                                                        <i class="fa fa-check-square text-success fs-5"></i>
                                                        Đã liên kết
                                                    </span>
                                                    <div class="mt-3">
                                                        <b class="text-primary">Nhận thông báo từ telegram</b>
                                                        <div class="form-check">
                                                            @php
                                                                if (Auth::user()->telegram_notice == 'on') {
                                                                    $checked = 'checked';
                                                                } else {
                                                                    $checked = '';
                                                                }
                                                            @endphp
                                                            <input type="checkbox" class="form-check-input"
                                                                name="isNotice" {{ $checked }}
                                                                id="notice-tele">
                                                            <label class="form-check-label" for="notice-tele">Nhận thông
                                                                báo</label>
                                                        </div>
                                                    </div>
                                                @else
                                                    <span>
                                                        <i class="ti ti-x bg-danger rounded text-white fs-5"></i>
                                                        Chưa liên kết <b class="text-primary">(Liên kết telegram nhận ngay
                                                            {{ number_format(DataSite('balance_telegram')) }} vnđ)</b>
                                                        <p>Nhấn vào <a href="{{ DataSite('telegram_bot') }}" target="_blank">Đây</a> để
                                                            liên kết</p>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary col-12">
                                                <i class="ti ti-lock me-2 fs-4"></i>
                                                Lưu dữ liệu
                                            </button>
                                        </div>
                                    </form>
                  </div>
             
              </div>
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