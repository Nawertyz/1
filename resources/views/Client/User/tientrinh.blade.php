@extends('Layout.App')
@section('title', 'Tất cả tiến trình')
@section('content')
 
<div class="pt-5">
							<div class="grid grid-cols-1 gap-5 md:grid-cols-1">
    <div class="panel">
        <div class="mb-5 flex items-center justify-between">
			<h5 class="text-lg font-semibold dark:text-white-light">Tất cả tiến trình</h5>
		</div>
                 <div class="table-responsive">
            <table class="datatable table-responsive whitespace-nowrap text-center font-bold" style="margin-left: 0px; width: 1580px;" id="history">
                <thead>
                    <tr class="">
                    <th class="ant-table-cell">ID</th>
                                            <th class="ant-table-cell">Trạng thái</th>
                                            <th class="ant-table-cell">Mã đơn hàng</th>
                                           
                                            <th class="ant-table-cell">Link đơn</th>
                                             <th class="ant-table-cell">Dịch vụ</th>
                                            <th class="ant-table-cell">Máy chủ</th>
                                            <th class="ant-table-cell">Số lượng</th>
                                            <th class="ant-table-cell">Ban đầu</th>
                                            <th class="ant-table-cell">Đã tăng</th>
                                            <th class="ant-table-cell">Tổng tiền</th>
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
        createDataTable('#history', '{{ route('user.list.action', 'history-tientrinh') }}', [{
                data: 'id',
            },
            {
                data: 'status_order',
                render: function(data, type, row) {
                    return data
                }
            },
            {
                data: 'order_codes',
                render: function(data){
                    return `<span class="badge bg-primary">`+data+`</span>`
                }
            },
            {
                data: 'order_link',
            },
            {
                data: 'service_name',
            },{
                data: 'server_service',
                render: function(data){
                    return `<span class="badge bg-success">Sv`+data+`</span>`
                }
            },{
                data: 'quantity',
            },{
                data: 'start',
                render: function(data){
                    return formatNumber(parseInt(data))
                }
            },{
                data: 'buff',
                render: function(data){
                    return formatNumber(parseInt(data))
                }
            },{
                data: 'total_payment',
                render: function(data){
                    return `<span class="text-danger">`+formatNumber(parseInt(data))+`</span>`
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
 