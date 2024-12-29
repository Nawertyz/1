@extends('Admin.Layout.App')
@section('title', 'Thêm tài nguyên mới')

@section('content')
<div class="app-wrapper" id="kt_app_wrapper">
            <div id="kt_app_toolbar_container" class="app-container container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Thêm tài nguyên mới
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
              
                    <div class="mb-3">
                        <form action="{{ route('admin.taikhoan.tainguyen.new.post') }}" method="POST" request="ptl">
                            <div class="form-floating mb-3">
                                <select name="chuyenmuc" id="" class="form-select border border-info ">
                                    <option value="">Chọn chuyên mục</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Chuyên mục</span></label>
                            </div>
                           
                            <!-- <div class="form-floating mb-3">
                                <select name="server_service" id="" class="form-select border border-info ">
                                    @for ($i = 1; $i < 35; $i++)
                                        <option value="{{ $i }}">Server: {{ $i }}</option>
                                    @endfor
                                </select>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Máy chủ </span></label>
                            </div> -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border border-info " name="name"
                                    placeholder="Name">
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Tên tài nguyên (vd:Via Us)</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border border-info " name="image"
                                    placeholder="Name">
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Link ảnh quốc gia</span></label>
                            </div>
                            <div class="form-floating mb-3">
                           
                                <textarea  name="description" rows="5" style="height: 175px" class="form-control border border-info" placeholder="Name"></textarea>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Chú ý</span></label>
                              
                            </div>
                            <div class="form-floating mb-3">
                           
                                <textarea  name="thongtin" rows="5" style="height: 175px" class="form-control border border-info" placeholder="Name"></textarea>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Thông tin tài nguyên (vd: tk:lamtilo06| mk: lamtilo06 |mail: lamtilo@gmail.com| 2fa: GSD SDHSH)</span></label>
                              
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
                        
                            
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary col-12">Thêm máy chủ mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Danh sách tài nguyên
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
                    
                  
                    <div class="table-responsive dt-responsive">
                        <div id="" class="">
                            <table id="history"
                                class="table table-striped table-bordered nowrap"
                                aria-describedby="file_export_info">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên tài nguyên</th>
                                        <th>Thông tin</th>
                                      
                                        <th>Giá</th>
                                        <th>Giá cộng tác viên</th>
                                        <th>Giá đại lý</th>
                                        <th>Giá nhà phân phối</th>
                                     
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
    
@endsection
@section('script')
     
    <script>
        createDataTable('#history', '{{ route('admin.list', 'list-tainguyen') }}', [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'thongtin',
                name: 'thongtin'
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
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return ` <a href="{{ route('admin.taikhoan.tainguyen.edit', 'id') }}`.replace('id', data.id) +
                        `" class="btn btn-primary btn-sm">Sửa</a>
                            <button class="btn btn-danger btn-sm" onclick="deleteSocial(${data.id})">Xóa</button>`
                }
            },
        ])

        
    </script>
    <script>
        function deleteSocial(id) {
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa dịch vụ này?',
                text: "Bạn sẽ không thể khôi phục lại dịch vụ này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Xóa dịch vụ này!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.tainguyen.tainguyen.delete', 'id') }}'.replace('id', id),
                        type: 'DELETE',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                Swal.fire(
                                    'Đã xóa!',
                                    'Dịch vụ đã được xóa thành công.',
                                    'success'
                                )
                                $('#list-social').DataTable().ajax.reload();
                            } else {
                                Swal.fire(
                                    'Xóa thất bại!',
                                    'Dịch vụ chưa được xóa.',
                                    'error'
                                )
                            }
                        }
                    })
                }
            })
        }
        </script>
@endsection


 