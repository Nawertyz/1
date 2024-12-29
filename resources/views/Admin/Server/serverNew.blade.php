@extends('Admin.Layout.App')
@section('title', 'Thêm máy chủ mới')

@section('content')
<div class="app-wrapper" id="kt_app_wrapper">
            <div id="kt_app_toolbar_container" class="app-container container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Thêm dịch vụ mới
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
              
                    <div class="mb-3">
                        <form action="{{ route('admin.server.new.post') }}" method="POST" request="ptl">
                            <div class="form-floating mb-3">
                                <select name="social" id="" class="form-select border border-info ">
                                    <option value="">Chọn dịch vụ MXH</option>
                                    @foreach ($social as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Dịch vụ MXH</span></label>
                            </div>
                            <div class="form-floating mb-3">
                        
                                <select name="service" id="" class="form-select border border-info ">
                                    <option value="">Vui lòng chọn dịch vụ MXH</option>
                                </select>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Dịch vụ </span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="server_service" id="" class="form-select border border-info ">
                                    @for ($i = 1; $i < 35; $i++)
                                        <option value="{{ $i }}">Server: {{ $i }}</option>
                                    @endfor
                                </select>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Máy chủ </span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border border-info " name="title"
                                    placeholder="Name">
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Tiêu đề</span></label>
                            </div>
                            <div class="form-group mb-3">
                            <label>Thông tin máy chủ</label>
                                <textarea  id="editor" name="description" rows="5" placeholder="Name"></textarea>
                              
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control border border-info " name="price"
                                            placeholder="Name">
                                        <label><i class="fa fa-star me-2 fs-4 "></i><span
                                                class=" ps-3">Giá Thành viên</span></label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control border border-info "
                                            name="price_collaborator" placeholder="Name">
                                        <label><i class="fa fa-star me-2 fs-4 "></i><span
                                                class=" ps-3">Giá Cộng tác viên</span></label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control border border-info " name="price_agency"
                                            placeholder="Name">
                                        <label><i class="fa fa-star me-2 fs-4 "></i><span
                                                class=" ps-3">Giá Đại lý</span></label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control border border-info "
                                            name="price_distributor" placeholder="Name">
                                        <label><i class="fa fa-star me-2 fs-4 "></i><span
                                                class=" ps-3">Giá Nhà phân phối</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control border border-info " name="min"
                                            placeholder="Name">
                                        <label><i class="fa fa-star me-2 fs-4 "></i><span
                                                class=" ps-3">Mua tối thiểu</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control border border-info " name="max"
                                            placeholder="Name">
                                        <label><i class="fa fa-star me-2 fs-4 "></i><span
                                                class=" ps-3">Mua tối đa</span></label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <select class="form-select border border-info " name="actual_service" placeholder="Name">
                                <option value="trumsubre">trumsubre.com</option>
                                    <option value="subgiare">Subgiare.vn</option>
                                    <option value="pfb">pfb</option>
                                    <option value="autolikez">autolikez.com</option>
                                        <option value="smmking">smmking.vip</option>
                                    <option value="subsieusale">subsieusale.com</option>
                                    <option value="hacklike17">Hacklike17.com</option>
                                    <option value="2mxh">2mxh.com</option>
                                    <option value="1dg">1dg.me</option>
                                    <option value="submeta">Submeta.vn</option>
                                    <option value="tuongtacsale">Tuongtacsale.com</option>
                                    <option value="alosmm">Alosmm.com</option>
                                    <option value="trum">trum.vip</option>
                                    <option value="muaspin">Muaspin.com</option>
                                    <option value="boosterview">boosterview.com</option>
                                    <option value="traodoisub">Traodoisub.com</option>
                                    <option value="sainpanel">Sainpanel.com</option>
                                    <option value="dontay">Đơn tay</option>
                                </select>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Nguồn</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border border-info " name="actual_server"
                                    placeholder="Name">
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Máy chủ nguồn</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border border-info " name="actual_path"
                                    placeholder="Name">
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Đường dẫn nguồn</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <select type="text" class="form-select border border-info " name="action">
                                    <option value="default">Mặc định</option>
                                    <option value="get-uid">Tự động get UID</option>
                                    <option value="get-username-tiktok">Tự động get username-tiktok</option>
                                    <option value="get-order">Tự động get Số lượng đơn (Chỉ Hacklike17)</option>
                                </select>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Thao tác khi chọn server</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <select type="text" class="form-select border border-info " name="reaction">
                                <option value="on">Hiện cảm xúc</option>
                                    <option value="off">Không hiện cảm xúc</option>
                                </select>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Cảm xúc</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <select type="text" class="form-select border border-info " name="order_type">
                                    <option value="default">Không hoàn tiền</option>
                                    <option value="refund">Được hoàn tiền</option>
                                </select>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Khi tạo đơn hàng</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <select type="text" class="form-select border border-info " name="warranty">
                                    <option value="no">Không bảo hành</option>
                                    <option value="yes">Được bảo hành</option>
                                </select>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Bảo hành</span></label>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary col-12">Thêm máy chủ mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')


<script>
        CKEDITOR.replace('editor');
        /* onchange update */
        CKEDITOR.instances.editor.on('change', function() {
            document.getElementById("editor").value = CKEDITOR.instances.editor.getData();
        });
 
    </script>
    <script>
        $(document).ready(function() {
            //change social value
            $('select[name=social]').change(function() {
                $.ajax({
                    url: "{{ route('admin.service.checking.post') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: $(this).val()
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data.status == 'success') {
                            var service = $('select[name=service]');
                            service.empty();
                            $.each(data.data, function(key, value) {
                                service.append('<option value="' + value.id + '">' +
                                    value.name + '</option>');
                            })
                        }
                    },
                    error: function(data) {
                        if (data.status == 500) {
                            toastr.error(data.responseJSON.message);
                        }
                    }
                })
            })
        });
    </script>
@endsection
