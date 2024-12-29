@extends('Admin.Layout.App')
@section('title', 'Quản lí thông báo')
@section('content')
 
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                            <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Thôn báo modal
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>

                <div class="card-body">
                     
                    <div class="mb-3">
                        <form action="{{ route('admin.notification.modal.post') }}" method="POST">
                            @csrf
                             <div class="form-group mb-3">
                                <label for="" class="form-label">Link ảnh (nếu có)</label>
                                <input name="image_modal"  class="form-control border border-info" value="{{ DataSite('image_modal') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Nội dung</label>
                                <textarea name="notice-modal" id="editor" cols="30" rows="10">{{ DataSite('notice') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary col-12">
                                    Lưu thông báo
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="card">
                            <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Thông báo hệ thống
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
                  
                    <form action="{{ route('admin.notification.post') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="name" placeholder="Name">
                            <label><i class="fas fa-user me-2 fs-4 "></i><span
                                    class=" ps-3">Tên người thông báo</span></label>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Nội dung</label>
                            <textarea name="notice" id="editor1" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Thêm nội dung thông báo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                            <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Lịch sử thông báo
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
                   
                    <div class="table-responsive">
                        <table id="history" class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên người thông báo</th>
                                    <th>Nội dung thông báo</th>
                                    <th>Thời gian</th>
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
        CKEDITOR.replace('editor');
        /* onchange update */
        CKEDITOR.instances.editor.on('change', function() {
            document.getElementById("editor").value = CKEDITOR.instances.editor.getData();
        });

        CKEDITOR.replace('editor1');
        /* onchange update */
        CKEDITOR.instances.editor1.on('change', function() {
            document.getElementById("editor1").value = CKEDITOR.instances.editor1.getData();
        });
    </script>
    <script>
        createDataTable('#history', '{{ route('admin.list', 'history-notification') }}', [{
                data: 'id'
            },
            {
                data: 'name'
            },
            {
                data: 'content'
            },
            {
                data: 'created_at'
            },
            {
                data: null,
                render: function(row, type, index) {
                    return `
                        <button class="btn btn-danger" onclick="deleteNotification(${row.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    `
                }
            }
        ])

        function deleteNotification(id) {
            Swal.fire({
                title: "Thông báo!",
                text: 'Bạn có chắc chắn muốn xóa thông báo này không?',
                icon: 'warning',
                showDenyButton: true,
                confirmButtonText: `Xóa`,
                denyButtonText: `Không`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.notification.delete', 'id') }}".replace('id', id),
                        method: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data.status == 'success') {
                                Swal.fire('Xóa thông báo thành công!', '', 'success')
                                $('#history').DataTable().ajax.reload();
                            } else {
                                Swal.fire('Xóa thông báo thất bại!', '', 'error')
                            }
                        },
                        error: function(data) {
                            Swal.fire('Xóa thông báo thất bại!', '', 'error')
                        }
                    })
                } else if (result.isDenied) {
                    Swal.fire('Thông báo của bạn không bị xóa!', '', 'info')
                }
            })
        }
    </script>
@endsection
