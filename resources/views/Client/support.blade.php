@extends('Layout.App')
@section('title', 'TẠO ĐƠN HỖ TRỢ')
@section('content')
 
                   <div class="pt-5">
<div class="grid grid-cols-1 gap-5 md:grid-cols-1 mb-5">
                    
                             <form action="{{ route('create.support.post') }}" method="POST">
                        @csrf
                        <div class="panel">
        <div class="mb-5 flex items-center justify-between">
			<h5 class="text-lg font-semibold dark:text-white-light">Tạo hỗ trợ</h5>
		</div>
                                    <div class="card-body pt-0">
                                       
                                            <textarea class="form-input mb-3" rows="5" name="text" data-kt-autosize="true" placeholder="Tin nhắn..." data-kt-initialized="1" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 118.6px;"></textarea>
                                            <div class="d-flex flex-stack">
                                                
                                                <button class="btn btn-primary" type="submit">Gửi Tin Nhắn</button>
                                            </div>
                                     
                                    </div>
                                </div>
                                </div>
                            </form>
                            
                            </div>
                            
                            
                            <div class="grid grid-cols-1 gap-5 md:grid-cols-1 ">
    <div class="panel">
        <div class="mb-5 flex items-center justify-between">
			<h5 class="text-lg font-semibold dark:text-white-light">Lịch sử hỗ trợ</h5>
		</div>
        
        <div class="table-responsive">
            <table class="datatable table-responsive whitespace-nowrap text-center font-bold" style="margin-left: 0px; width: 980px;" id="history">
                <thead>
                    <tr class="">
                    <th>STT</th>
                                            <th>Nội dung hỗ trợ</th>
                                            <th>Phản hồi</th>
                                      
                                            <th>Trạng thái</th>
                                            <th>Thời gian</th>
                    </tr>
                </thead>
                <tbody class="ant-table-tbody">
                                </tbody>
            </table>
        </div>
        
    </div>
</div>

                         @endsection
@section('script')
<script>
        createDataTable('#history', '{{ route('user.list.action', 'history-support') }}', [{
                data: 'id',
            },
            {
               data: 'text',
                render: function(data, type, row) {
                    return `<textarea class="form-input note" rows="3" readonly="" style="min-width: 390px;">${data}</textarea>`;
                   
                }
            },
            {
                data: 'reply',
                render: function(data, type, row) {
                    
                    if (data !== null) {
                    return `<textarea class="form-input note" rows="3" readonly="" style="min-width: 390px;">${data}</textarea>`;
                } else {
                    return `<textarea class="form-input note" rows="3" readonly="" style="min-width: 390px;"></textarea>`; // Hoặc có thể trả về một giá trị mặc định khác nếu bạn muốn
                }
                   
                }
            },
         
          {
               data: 'status',
                render: function(data, type, row) {
                    return data
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
    <!-- <script>
 swa1('Nên nhắn tin hỗ trợ qua zalo telegram hoặc facebook sẽ được xử lý trong ngày !','warning');
    </script> -->
@endsection
 