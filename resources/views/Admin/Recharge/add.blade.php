@extends('Admin.Layout.App')
@section('title', 'Thêm ngân hàng')
@section('content')
 
    <div class="col-md-12">
        <div class="card mb-3">
                        <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Thêm ngân hàng mới ( không auto)
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
            <div class="card-body">
               
                <form action="{{ route('admin.recharge.add.post') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border border-info " name="namebank" placeholder="Tên ngân hàng">
                        <label><i class="fa fa-star me-2 fs-4 "></i><span
                                class=" ps-3">Tên ngân hàng (Viết hoa liền vd: MB, ACB, VCB,..)</span></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border border-info " name="nametk" placeholder="Chủ tài khoản">
                        <label><i class="fa fa-star me-2 fs-4 "></i><span
                                class=" ps-3">Chủ tài khoản</span></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border border-info " name="sotaikhoan" placeholder="Số tài khoản">
                        <label><i class="fa fa-star me-2 fs-4 "></i><span
                                class=" ps-3">Số tài khoản</span></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border border-info " name="logo" placeholder="Logo ngân hàng">
                        <label><i class="fa fa-star me-2 fs-4 "></i><span
                                class=" ps-3">Link logo ngân hàng</span></label>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary col-12">Lưu ngay</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mb-3">
                        <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        danh sách ngân hàng
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
            <div class="card-body">
               
                <div class="table-responsive">
                    <table id="history" class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                            <th>ID</th>
                                        <th>Tên ngân hàng</th>
                                         
                                        <th>Tài khoản</th>
                                        <th>Số tài khoản</th>
                                         
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
@endsection
@section('script')
    <script>
       createDataTable('#history', '{{ route('admin.list', 'list-recharge') }}', [{
            data: 'id'
        }, {
            data: 'type'
        }, {
            data: 'account_name'
        }, {
            data: 'account_number'
        }
        , {
            data: null,
            render: function(data, type, row) {
                return `
                        <a href="{{ route('admin.recharge.delete', 'id') }}" class="btn btn-danger">Xóa</a>
                    `.replace('id', data.id)
            }
        }])
    </script>
@endsection
