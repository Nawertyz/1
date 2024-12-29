@extends('Admin.Layout.App')
@section('title', 'Chuyên mục')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thêm chuyên mục mới</h4>
                    <form action="{{ route('admin.tainguyen.new.post') }}" method="POST">
                        @csrf
                        <div class=" mb-3">
                            <input type="text" class="form-control border border-primary" placeholder="Tên chuyên mục (vd: bán tài nguyên fb)"
                                value="{{ old('name') }}" name="name">
                            
                        </div>
                        <div class=" mb-3">
                            <input type="text" class="form-control border border-primary" placeholder="Đường dẫn chuyên mục (VD: tainguyen-fb)"
                                value="{{ old('slug') }}" name="slug">
                        
                        </div>
                        <div class=" mb-3">
                            <input type="text" class="form-control border border-primary" placeholder="Link ảnh chuyên mục"
                                value="{{ old('image') }}" name="image">
                          
                        </div>
                        <div class=" mb-3">
                            <select name="status" id="" class="form-select border border-primary">
                                <option value="show">Hiển thị</option>
                                <option value="hide">Ẩn</option>
                            </select>
                          
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary col-12">
                                Thêm chuyên mục
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách chuyêm mục</h4>
                    <div class="table-responsive">
                        <table id="list-social"
                            class="table border table-striped table-bordered display text-nowrap dataTable responsive w-100">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên chuyêm mục</th>
                                    <th>Path</th>
                                    <th>Ảnh</th>
                                    <th>Trạng thái</th>
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
@endsection
@section('script')
    <script>
        createDataTable('#list-social', '{{ route('admin.list', 'list-chuyenmuc') }}', [{
                data: 'id'
            },
            {
                data: 'name'
            }, {
                data: 'slug'
            }, {
                data: 'image',
                render: function(data) {
                    return `<img src="${data}" alt="" width="100px">`
                }
            }, {
                data: 'status'
            },
            {
                data: null,
                render: function(data) {
                    return `<a href="{{ route('admin.tainguyen.edit', 'id') }}`.replace('id', data.id) +
                        `" class="btn btn-primary btn-sm">Sửa</a>
                            <button class="btn btn-danger btn-sm" onclick="deleteSocial(${data.id})">Xóa</button>`
                }
            }
        ])

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
                        url: '{{ route('admin.tainguyen.delete', 'id') }}'.replace('id', id),
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
