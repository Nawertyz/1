@extends('Layout.App')
@section('title', 'Lịch sử tài khoản')
@section('content')
@if (getDomain() == env('PARENT_SITE'))
<div class="pt-5">
							<div class="grid grid-cols-1 gap-5 md:grid-cols-1">
    <div class="panel">
        <div class="mb-5 flex items-center justify-between">
			<h5 class="text-lg font-semibold dark:text-white-light">Nhật Kí Hoạt Động</h5>
		</div>
        
        <div class="table-responsive">
            <table class="datatable table-responsive whitespace-nowrap text-center font-bold"  id="history">
                <thead>
                    <tr class="">
                    <th class="ant-table-cell">STT</th>
                                            <th class="ant-table-cell">Tài khoản</th>
                                            <th class="ant-table-cell">Loại</th>
                                           
                                            <th class="ant-table-cell">Hành động</th>
                                             
                                            <th class="ant-table-cell">Ghi chú</th>
                                            <th class="ant-table-cell">Thời gian</th>
                    </tr>
                </thead>
                <tbody class="ant-table-tbody">
                                </tbody>
            </table>
        </div>
        
    </div>
</div>
						</div>
@endsection
@section('script')
    <script>
        createDataTable('#history', '{{ route('user.list.action', 'history-user') }}', [{
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
                data: 'new_dataa',
                
            },
           
            {
                data: 'description',
                 render: function(data){
                    return `<span style="min-width: 890px;">${data}</span>`
                }
                
            },
            {
                data: 'created_at',
                 render: function(data) {
        var formattedDate = moment(data).format('YYYY-MM-DD HH:mm:ss');
        return formattedDate;
    }
                
            },
        ])
    </script>
@endsection
@else

<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nhật kí hoạt động</h4>
                    <div class="mb-3">
                        <div class="table-responsive dt-responsive">
                           
                                <table id="history"
                                    class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tài khoản</th>
                                            <th>Loại</th>
                                            <th>Số tiền thay đổi</th>
                                            <th>Số dư trước</th>
                                            <th>Số dư hiện tại</th>
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
@endsection
@section('script')
    <script>
        createDataTable('#history', '{{ route('user.list.action', 'history-user') }}', [{
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
                    return `<span class="badge bg-warning">`+formatNumber(data)+`</span>`
                }
            },
            {
                data: 'old_data',
                render: function(data){
                    return `<span class="badge bg-danger">`+formatNumber(data)+`</span>`
                }
            },
            {
                data: 'new_data',
                render: function(data){
                    return `<span class="badge bg-success">`+formatNumber(data)+`</span>`
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

@endif