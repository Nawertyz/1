@extends('Admin.Layout.App')
@section('title', 'Lịch sử người dùng')
@section('content')
 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Nhật kí hoạt động
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
             
                    <div class="mb-3">
                      
                    <div class="table-responsive dt-responsive">
                        <div id="" class="">
                            <table id="history"
                                class="table table-striped table-bordered nowrap"
                                aria-describedby="file_export_info">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tài khoản</th>
                                            <th>Loại</th>
                                            <th>Số tiền</th>
                                            <th>Số dư trước</th>
                                            <th>Số dư thay đổi</th>
                                            <th>Ghi chú</th>
                                            <th>Thời gian</th>
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
    </div>
@endsection
@section('script')
    <script>
        createDataTable('#history', '{{ route('admin.list', 'history-user') }}', [{
                data: 'id',
            },
            {
                data: 'username',
            },
            {
                data: 'action',
                render: function(data){
                    return `<span class="badge bg-primary">`+data+`</span>`
                }
            },
            {
                data: 'data',
                render: function(data){
                    return `<span class="text-danger">`+formatNumber(data)+`</span>`
                }
            },
            {
                data: 'old_data',
                render: function(data){
                    return `<span class="text-primary">`+formatNumber(data)+`</span>`
                }
            },
            {
                data: 'new_data',
                render: function(data){
                    return `<span class="text-success">`+formatNumber(data)+`</span>`
                }
            },
            {
                data: 'description',
            },
            {
                data: 'created_at',
            },
        ])
    </script>
@endsection
