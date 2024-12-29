@extends('Admin.Layout.App')
@section('title', 'Cấu hình telegram')
@section('content')
<div class="app-wrapper" id="kt_app_wrapper">
            <div id="kt_app_toolbar_container" class="app-container container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Cấu hình telegram
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
        
                    <form action="{{ route('admin.config.telegram.post') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control border border-info " name="telegram_bot"
                                value="{{ DataSite('telegram_bot') }}" placeholder="Name">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Link telegram Bot(bot xác thực)</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="telegram_token"
                                value="{{ DataSite('telegram_token') }}" placeholder="Name">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Telegram Token (bot xác thực)</span></label>
                        </div>
                         <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="telegram_token_tb"
                                value="{{ DataSite('telegram_token_tb') }}" placeholder="Name">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Telegram Token (bot thông báo)</span></label>
                        </div>
                        
                        
                        @if(getDomain() == env('PARENT_SITE'))
                         <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="telegram_token_tb_smm"
                                value="{{ DataSite('telegram_token_tb_smm') }}" placeholder="Name">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Telegram Token (bot thông báo thay đổi giá từ nguồn)</span></label>
                        </div>
                        @endif
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="telegram_chat_id"
                                value="{{ DataSite('telegram_chat_id') }}" placeholder="Name">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Telegram Chat Id (Lấy chat ID Của tài khoản bạn không phải bot)</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="balance_telegram"
                                value="{{ DataSite('balance_telegram') }}" placeholder="Name">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Số tiền được nhận khi liên kết telegram</span></label>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary col-12">
                                Lưu cấu hình
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
