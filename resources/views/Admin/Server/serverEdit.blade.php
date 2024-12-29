@extends('Admin.Layout.App')
@section('title', 'Chỉnh sửa dịch vụ máy chủ')
@section('content')
 
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
            <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Chỉnh sửa dịch vụ máy chủ
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
                 
                    <form action="{{ route('admin.server.edit.post', $server->id) }}" method="POST" request="ptl">
                             @if (getDomain() == env('PARENT_SITE'))
                        <div class="form-floating mb-3">
                            <select name="server_service" id="" class="form-select border border-info ">
                                <option value="{{ $server->server }}">Máy chủ: {{ $server->server }}</option>
                            </select>
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Máy chủ </span></label>
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border border-info " name="price"
                                        value="{{ $server->price }}" placeholder="Name">
                                    <label><i class="fa fa-star me-2 fs-4 "></i><span
                                            class=" ps-3">Giá</span></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border border-info "
                                        value="{{ $server->price_collaborator }}" name="price_collaborator"
                                        placeholder="Name">
                                    <label><i class="fa fa-star me-2 fs-4 "></i><span
                                            class=" ps-3">Giá Collaborator</span></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border border-info " name="price_agency"
                                        value="{{ $server->price_agency }}" placeholder="Name">
                                    <label><i class="fa fa-star me-2 fs-4 "></i><span
                                            class=" ps-3">Giá Agency</span></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border border-info "
                                        value="{{ $server->price_distributor }}" name="price_distributor"
                                        placeholder="Name">
                                    <label><i class="fa fa-star me-2 fs-4 "></i><span
                                            class=" ps-3">Giá Distributor</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border border-info " name="min"
                                        value="{{ $server->min }}" placeholder="Name">
                                    <label><i class="fa fa-star me-2 fs-4 "></i><span
                                            class=" ps-3">Mua tối thiểu</span></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border border-info " name="max"
                                        value="{{ $server->max }}" placeholder="Name">
                                    <label><i class="fa fa-star me-2 fs-4 "></i><span
                                            class=" ps-3">Mua tối đa</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="title"
                                value="{{ $server->title }}" placeholder="Name">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Tiêu đề</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control border border-info " name="description" rows="5" placeholder="Name">{{ $server->description }}</textarea>
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Nội dung</span></label>
                        </div>
                        @if (getDomain() == env('PARENT_SITE'))
                            <div class="form-floating mb-3">
                                <select class="form-control border border-info " name="actual_service" placeholder="Name">
                                <option value="subgiare" @if ($server->actual_service == 'subgiare') selected @endif>Subgiare.vn</option>
                                    <option value="hacklike17" @if ($server->actual_service == 'hacklike17') selected @endif>Hacklike17.com</option>
                                    <option value="tuongtacsale" @if ($server->actual_service == 'tuongtacsale') selected @endif>Tuongtacsale.com</option>
                                    <option value="autolikez" @if ($server->actual_service == 'autolikez') selected @endif>autolikez.com</option>
                                    <option value="pfb" @if ($server->actual_service == 'pfb') selected @endif>pfb.com</option>
                                    <option value="trum" @if ($server->actual_service == 'trum') selected @endif>
                                        trum.vip</option>
                                        <option value="muaspin" @if ($server->actual_service == 'muaspin') selected @endif>muaspin.com
                                    </option>
                                       <option value="smmking" @if ($server->actual_service == 'smmking') selected @endif>smmking.vip
                                    </option>
                                    <option value="2mxh" @if ($server->actual_service == '2mxh') selected @endif>2mxh.com</option>
                                    <option value="alosmm" @if ($server->actual_service == 'alosmm') selected @endif>alosmm.com</option>
                                    <option value="trumsubre" @if ($server->actual_service == 'trumsubre') selected @endif>trumsubre.com</option>
                                    <option value="1dg" @if ($server->actual_service == '1dg') selected @endif>1dg.me</option>
                                    <option value="submeta" @if ($server->actual_service == 'submeta') selected @endif>Submeta.vn</option>
                                    <option value="boosterview" @if ($server->actual_service == 'boosterview') selected @endif>boosterview.com</option>
                                    <option value="traodoisub" @if ($server->actual_service == 'traodoisub') selected @endif>Traodoisub.com</option>
                                    <option value="sainpanel" @if ($server->actual_service == 'sainpanel') selected @endif>Sainpanel.com</option>
                                    <option value="subviet" @if ($server->actual_service == 'subviet') selected @endif>Subviet.net</option>
                                    <option value="dontay" @if ($server->actual_service == 'dontay') selected @endif>Dơn tay</option>
                                </select>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Nguồn</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border border-info " name="actual_server"
                                    value="{{ $server->actual_server }}" placeholder="Name">
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Máy chủ nguồn</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border border-info " name="actual_path"
                                    value="{{ $server->actual_path }}" placeholder="Name">
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Đường dẫn nguồn</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <select type="text" class="form-select border border-info " name="action">
                                    <option value="default" @if ($server->action == 'default') selected @endif>Mặc định</option>
                                    <option value="get-uid" @if ($server->action == 'get-uid') selected @endif>Tự động get UID</option>
                                    <option value="get-username-tiktok" @if ($server->action == 'get-username-tiktok') selected @endif>Tự động get Username tiktok</option>
                                    <option value="get-order" @if ($server->action == 'get-order') selected @endif>Tự động get Số lượng đơn (Chỉ Hacklike17)</option>
                                </select>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Thao tác khi chọn server</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <select type="text" class="form-select border border-info " name="reaction">
                                <option value="on" @if ($server->reaction == 'on') selected @endif>Hiện cảm xúc</option>
                                    <option value="off" @if ($server->reaction == 'off') selected @endif>Không hiện cảm xúc</option>
                                </select>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Cảm xúc</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <select type="text" class="form-select border border-info " name="order_type">
                                    <option value="default" @if ($server->order_type == 'default') selected @endif>Không hoàn tiền</option>
                                    <option value="refund" @if ($server->order_type == 'refund') selected @endif>Được hoàn tiền</option>
                                </select>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Khi tạo đơn hàng</span></label>
                            </div>

                            <div class="form-floating mb-3">
                                <select type="text" class="form-select border border-info " name="warranty">
                                    <option value="no"  @if ($server->warranty == 'no') selected @endif>Không bảo hành</option>
                                    <option value="yes"  @if ($server->warranty == 'yes') selected @endif>Được bảo hành</option>
                                </select>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Bảo hành</span></label>
                            </div>
                        @endif
                        <div class="form-floating mb-3">
                            <select class="form-control border border-info " name="status" placeholder="Name">
                                <option value="Active" @if ($server->status == 'Active') selected @endif>Hoạt động
                                </option>
                                <option value="InActive" @if ($server->status == 'InActive') selected @endif>
                                    Không hoạt động</option>
                            </select>
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Trạng thái</span></label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Chỉnh sửa </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
