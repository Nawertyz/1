@extends('Admin.Layout.App')
@section('title', 'Thêm dịch vụ ngoài')

@section('content')
 
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                  <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Thêm dịch vụ ngoài
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
                    
                    <form action="{{ route('admin.active.post') }}" method="POST">
                        @csrf
                      <div class="form-floating mb-3">
                                <input type="text" class="form-control border border-info " name="name" placeholder="Name">
                                <label><i class="ti ti-topology-star-ring-3 me-2 fs-4 "></i><span
                                        class=" ps-3">Tên dịch vụ</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border border-info " name="link"
                                     placeholder="Name">
                                <label><i class="ti ti-topology-star-ring-3 me-2 fs-4 "></i><span
                                        class=" ps-3">Đường link dịch vụ</span></label>
                            </div>
                        <div class="mb-3">
                            <button class="btn btn-primary col-12">
                                Thêm dịch vụ 
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                  <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Danh sách dịch vụ
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
                    
                    <div class="table-responsive dt-responsive">
                        <table id="history"
                            class="table border table-striped table-bordered display text-nowrap dataTable responsive w-100">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên dịch vụ</th>
                                    <th>Path</th>
                      
                                  
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
        createDataTable('#history', '{{ route('admin.list', 'history-active') }}', [{
                data: 'id'
            },
            {
                data: 'name'
            }, {
                data: 'link'
            },
            {
                data: null,
                render: function(data) {
                    return `
                    <a href="javascript:;" class="btn btn-danger btn-sm" onclick="deleteActive(${data.id})">
                            <i class="ti ti-trash"></i>
                        </a>`
                }
            }
        ])

        function deleteActive(id) {
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa hoạt động này?',
                text: "Bạn sẽ không thể khôi phục lại hoạt động này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ route('admin.active.delete', 'id') }}`.replace('id', id),
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire(
                                'Đã xóa!',
                                'Hoạt động đã được xóa thành công.',
                                'success'
                            )
                            $('#history').DataTable().ajax.reload()
                        }
                    })
                }
            })
        }
    </script>
@endsection
