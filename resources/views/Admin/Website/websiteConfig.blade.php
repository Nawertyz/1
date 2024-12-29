@extends('Admin.Layout.App')
@section('title', 'Cấu hình website')
@section('content')
<div class="col-md-12">
            <div class="card">
                <div class="card-body px-4 py-0">
                    <ul class="nav nav-tabs profile-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="information-tab" data-bs-toggle="tab" href="#information" role="tab" aria-selected="true">
                                <i class="ti ti-info-circle me-2"></i>Thông Tin
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="notify-tab" data-bs-toggle="tab" href="#notify" role="tab" aria-selected="true">
                                <i class="ti ti-device-tv me-2"></i>Admin
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane show active" id="information" role="tabpanel" aria-labelledby="information-tab">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{ route('admin.website.config.post') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="namesite"
                                            value="{{ DataSite('namesite') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Tên site</span></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="title"
                                            value="{{ DataSite('title') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Tiêu đề</span></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="description"
                                            value="{{ DataSite('description') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Mô tả</span></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="keyword"
                                            value="{{ DataSite('keyword') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Từ khoá</span></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="image_seo"
                                            value="{{ DataSite('image_seo') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Image SEO</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="collaborator"
                                            value="{{ DataSite('collaborator') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Mức nạp Cộng tác viên</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="agency"
                                            value="{{ DataSite('agency') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Mức nạp Đại lý</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="distributor"
                                            value="{{ DataSite('distributor') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Mực nạp Nhà phân phối</span></label>
                                    </div>
                                </div>
                                @if (getDomain() == env('PARENT_SITE'))

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="code_tranfer"
                                            value="{{ DataSite('code_tranfer') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Mã chuyển khoản</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="cuphap"
                                            value="{{ DataSite('cuphap') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Cú pháp mã đơn (Vd: DONHANG)</span></label>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="code_tranfer"
                                            value="{{ DataSite('code_tranfer') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Mã chuyển khoản</span></label>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control "
                                            name="recharge_promotion" value="{{ DataSite('recharge_promotion') }}"
                                            placeholder="Name">
                                        <label><span
                                                class=" ps-3">Khuyến mãi</span></label>
                                    </div>
                                </div>
                               
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="card_discount"
                                            value="{{ DataSite('card_discount') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Chiết khấu thẻ</span></label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="mail_host"
                                            value="{{ DataSite('mail_host') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Mail Host</span></label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="mail_port"
                                            value="{{ DataSite('mail_port') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Mail Port</span></label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control "
                                            name="mail_username" value="{{ DataSite('mail_username') }}"
                                            placeholder="Name">
                                        <label><span
                                                class=" ps-3">Mail (Địa chỉ email)</span></label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control "
                                            name="mail_password" value="{{ DataSite('mail_password') }}"
                                            placeholder="Name">
                                        <label><span
                                                class=" ps-3">Mail Password</span></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control " name="script_header" placeholder="Leave a comment here"
                                            id="floatingTextarea2" style="height: 100px">{{ DataSite('script_header') }}</textarea>
                                        <label><span
                                                class=" ps-3">Script Header</span></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control " name="script_footer" placeholder="Leave a comment here"
                                            id="floatingTextarea2" style="height: 100px">{{ DataSite('script_footer') }}</textarea>
                                        <label><span
                                                class=" ps-3">Script Footer</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control "
                                            name="google_client_id" value="{{ DataSite('google_client_id') }}"
                                            placeholder="Name">
                                        <label><span
                                                class=" ps-3">Google Client ID</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control "
                                            name="google_client_secret" value="{{ DataSite('google_client_secret') }}"
                                            placeholder="Name">
                                        <label><span
                                                class=" ps-3">Google Client Secret</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control "
                                            name="google_redirect" value="{{ DataSite('google_redirect') }}"
                                            placeholder="Name">
                                        <label><span
                                                class=" ps-3">Google Redirect</span></label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control "
                                            name="facebook_client_id" value="{{ DataSite('facebook_client_id') }}"
                                            placeholder="Name">
                                        <label><span
                                                class=" ps-3">Facebook Client ID</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control "
                                            name="facebook_client_secret"
                                            value="{{ DataSite('facebook_client_secret') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Facebook Client Secret</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control "
                                            name="facebook_redirect" value="{{ DataSite('facebook_redirect') }}"
                                            placeholder="Name">
                                        <label><span
                                                class=" ps-3">Facebook Redirect</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <input class="form-check-input" type="checkbox" name="notice_order"
                                            id="notice_order" {{ DataSite('notice_order') == 'on' ? 'checked' : '' }}>
                                        <label for="notice_order" class="form-label">Thông báo đơn về telegram</label>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <input class="form-check-input" type="checkbox" name="notice_login"
                                            id="notice_login" {{ DataSite('notice_login') == 'on' ? 'checked' : '' }}>
                                        <label for="notice_login" class="form-label">Cảnh báo đăng nhập</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary col-12">Lưu cấu hình</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
              <div class="tab-pane show" id="notify" role="tabpanel" aria-labelledby="notify-tab">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{ route('admin.website.config.post') }}" method="POST">
                            @csrf
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="nameadmin"
                                            value="{{ DataSite('nameadmin') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Tên Admin</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="facebook"
                                            value="{{ DataSite('facebook') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Facebok Admin</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="zalo"
                                            value="{{ DataSite('zalo') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Zalo Admin</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="group_member"
                                            value="{{ DataSite('group_member') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Link nhóm nhận thông báo chung</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="telegram"
                                            value="{{ DataSite('telegram') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Telegram Admin</span></label>
                                    </div>
                                </div>
                             <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="idpage"
                                            value="{{ DataSite('idpage') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Id Page Chat (Plugin Chat)</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="email"
                                            value="{{ DataSite('email') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Email Admin</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " name="phone"
                                            value="{{ DataSite('phone') }}" placeholder="Name">
                                        <label><span
                                                class=" ps-3">Phone Admin</span></label>
                                    </div>
                                </div>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu Thay Đổi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
@endsection
