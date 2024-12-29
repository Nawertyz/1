@extends('Admin.Layout.App')
@section('title', 'Lịch sử nạp thẻ cào')
@section('content')
<div class="app-wrapper" id="kt_app_wrapper">
            <div id="kt_app_toolbar_container" class="app-container container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Lịch sử nạp thẻ cào
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
 
                    <div class="table-responsive dt-responsive">
                        <div id="" class="">
                            <table id="testds"
                                class="table table-striped table-bordered nowrap"
                                aria-describedby="file_export_info">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tài khoản</th>
                                        <th>Loại thẻ</th>
                                        <th>Mệnh giá</th>
                                        <th>Serial</th>
                                        <th>Mã thẻ</th>
                                        <th>Thực nhận</th>
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
        createDataTable('#testds', '{{ route('admin.list', 'history-card') }}', [{
            data: 'id'
        }, {
            data: 'username'
        }, {
            data: 'card_type'
        }, {
            data: 'card_amount'
        }, {
            data: 'card_serial'
        }, {
            data: 'card_code'
        }, {
            data: 'card_real_amount'
        },
        {
            data: 'status'
        },
        {
            data: 'created_at'
        }])
    </script>
@endsection
