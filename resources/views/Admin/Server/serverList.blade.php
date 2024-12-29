@extends('Admin.Layout.App')
@section('title', 'Danh sách máy chủ dịch vụ')

@section('content')
 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Danh sách dịch vụ
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="flex-shrink-0">
                        
                        </div>
                        <div class="">
                            <a href="javascript:;" class="btn btn-primary btn-sm float-right" data-bs-toggle="modal"
                                data-bs-target="#bs-example-modal-md">
                                <i class="fas fa-plus"></i> Thông báo cho telegram
                            </a>
                            <a href="{{ route('admin.server.new') }}" class="btn btn-success btn-sm float-right">
                                <i class="fas fa-plus"></i> Thêm mới
                            </a>
                             <a href="javascript:;" class="btn btn-success btn-sm float-right" data-bs-toggle="modal"
                            data-bs-target="#bs-example-modal-md2">
                                <i class="fas fa-plus"></i> Chỉnh giá auto theo %
                            </a>
                        </div>
                    </div>
                  
                    <div class="table-responsive dt-responsive">
                        <div id="" class="">
                            <table id="history"
                                class="table table-striped table-bordered nowrap"
                                aria-describedby="file_export_info">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tiêu đề máy chủ</th>
                                        <th>Dịch vụ</th>
                                        <th>Máy chủ</th>
                                        <th>Giá</th>
                                        <th>Giá cộng tác viên</th>
                                        <th>Giá đại lý</th>
                                        <th>Giá nhà phân phối</th>
                                        <th>Tối thiểu</th>
                                        <th>Tối đa</th>
                                        <th>Tiêu đề</th>
                                        <th>Trạng thái</th>
                                        <th>Nguồn</th>
                                        <th>Máy chủ nguồn</th>
                                        <th>Thời gian tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="bs-example-modal-md" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Thông báo dịch vụ cho telegram
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.server.notification-telegram.post') }}" method="POST" request="ptl">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <select name="social" id="" class="form-select border border-info">
                                <option value="">Chọn dịch vụ</option>
                                @foreach ($social as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <label><i class="fa fa-star me-2 fs-4 text-info"></i><span
                                    class="border-start border-info ps-3">MXH</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="service" id="" class="form-select border border-info">
                            </select>
                            <label><i class="fa fa-star me-2 fs-4 text-info"></i><span
                                    class="border-start border-info ps-3">Máy chủ</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="content" id="" cols="30" rows="5" class="form-control border border-primary"></textarea>
                            <label><i class="fa fa-star me-2 fs-4 text-info"></i><span
                                    class="border-start border-info ps-3">Nội dung cần thông báo</span></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-light-primary text-primary font-medium waves-effect">
                            Gửi thông báo
                        </button>
                        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect"
                            data-bs-dismiss="modal">
                            Đóng
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div id="bs-example-modal-md2" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog"> 
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Thao tác
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.server.auto-edit') }}" method="POST" request="ptl">
                    <div class="modal-body">
                
                        <div class="form-floating mb-3">
                            <select name="type" id="" class="form-select border border-info">
                             
                                <option value="percent">Giá tiền tự thay đổi theo %</option>
                                <option value="add">Tự cộng thêm số tiền giá nhập ở bên dưới</option>
                            </select>
                            <label><i class="fa fa-star me-2 fs-4 text-info"></i><span
                                    class="border-start border-info ps-3">Thao tác khi thêm</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="price" id="" cols="30" rows="5" class="form-control border border-primary">
                            <label><i class="fa fa-star me-2 fs-4 text-info"></i><span
                                    class="border-start border-info ps-3">Nhập giá tiền (hoặc phần trăm )</span></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-light-primary text-primary font-medium waves-effect">
                            Chỉnh sửa
                        </button>
                        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect"
                            data-bs-dismiss="modal">
                            Đóng
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
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
    <script>
        createDataTable('#history', '{{ route('admin.list', 'list-server') }}', [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'server',
                name: 'server'
            },
            {
                data: 'price',
                name: 'price'
            },
            {
                data: 'price_collaborator',
                name: 'price_collaborator'
            },
            {
                data: 'price_agency',
                name: 'price_agency'
            },
            {
                data: 'price_distributor',
                name: 'price_distributor'
            },
            {
                data: 'min',
                name: 'min'
            },
            {
                data: 'max',
                name: 'max'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'status',
                name: 'status',
                render: function(data, type, row) {
                    return data == 'Active' ? `<span class="badge bg-success">Hoạt động</span>` :
                        `<span class="badge bg-danger">Không hoạt động</span>`
                }
            },
            {
                data: 'actual_service',
                name: 'actual_service'
            },
            {
                data: 'actual_server',
                name: 'actual_server'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<a href="{{ route('admin.server.edit', 'id') }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('admin.server.delete', 'id') }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>`
                        .replace(/id/g, data.id)
                }
            },
        ])
    </script>
@endsection
