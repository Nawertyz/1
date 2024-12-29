@extends('Admin.Layout.App')
@section('title', 'Lịch sử đơn hỗ trợ')

@section('content')
    <div class="row">
       
        <div class="col-md-12">
             
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Lịch sử đơn hỗ trợ</h4>
                    <div class="table-responsive">
                        <div id="" class="dataTables_wrapper w-100 overflow-x-auto overflow-y-hidden">
                            <table id="testds"
                                class="table border table-striped table-bordered display text-nowrap dataTable responsive w-100"
                                aria-describedby="file_export_info">
                                <thead>
                                    <tr>
                                           <th>Thao tác</th>
                                        <th>STT</th>
                                            <th>Nội dung hỗ trợ</th>
                                            <th>Phản hồi</th>
                                      
                                            <th>Trạng thái</th>
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
        createDataTable('#testds', '{{ route('admin.list', 'history-support') }}', [
            {
                data: null,
             render: function(data, type, row) {
                return `<a href="{{ route('admin.support.edit', 'id') }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('admin.support.delete', 'id') }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>`
                        .replace(/id/g, data.id)
            }
            }
         
            
        ,
            {
              data: 'id',
            },
            {
               data: 'text',
                render: function(data, type, row) {
                    return `<textarea class="form-control note" rows="3" readonly="" style="min-width: 200px;">${data}</textarea>`;
                   
                }
            },
            {
                data: 'reply',
                render: function(data, type, row) {
                    
                    if (data !== null) {
                    return `<textarea class="form-control note" rows="3" readonly="" style="min-width: 200px;">${data}</textarea>`;
                } else {
                    return `<textarea class="form-control note" rows="3" readonly="" style="min-width: 200px;"></textarea>`; // Hoặc có thể trả về một giá trị mặc định khác nếu bạn muốn
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
     
    
@endsection
