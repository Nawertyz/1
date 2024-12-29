@extends('Admin.Layout.App')
@section('title', 'Thêm dịch vụ mới')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thêm dịch vụ mới</h4>
                    <div class="mb-3">
                        <form action="{{ route('admin.service.new.post') }}" method="POST">
                            @csrf
                            <div class=" mb-3">
                                <select name="social" id="" class="form-select border border-info">
                                    @foreach ($social as $item)
                                        <option value="{{ $item->slug }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                                          </div>
                            <div class=" mb-3">
                                <input type="text" class="form-control border border-info" name="logo"
                                    value="{{ old('logo') }}" placeholder="Icon dịch vụ">
                                                        </div>
                            <div class=" mb-3">
                                <input type="text" class="form-control border border-info" name="service"
                                    value="{{ old('service') }}" placeholder="Tên dịch vụ">
                                                       </div>

                            <div class=" mb-3">
                                <input type="text" class="form-control border border-info" name="path_service"
                                    value="{{ old('path_service') }}" placeholder="Đường dẫn dịch vụ (like-facebook)">
                                                 
                            </div>
                            <div class=" mb-3">
                                <select name="status" id="" class="form-select border border-info">
                                    <option value="show">Hoạt động</option>
                                    <option value="hide">Không hoạt động</option>
                                </select>
                                                      </div>
                            <div class=" mb-3">
                                <select name="category" id="" class="form-select border border-info">
                                    <option value="default">Mặc định</option>
                                    <option value="reaction">Hiện cảm xúc</option>
                                    <option value="viplike">Vip Like</option>
                                    <option value="viplike-kcx">Vip Like không cảm xúc</option>
                                    <option value="reaction-speed">Hiện cảm xúc và tốc độ</option>
                                    <option value="comment">Hiện bình luận</option>
                                    <option value="comment-quantity">Hiện bình luận và số lượng</option>
                                    <option value="minutes">Hiện số phút</option>
                                    <option value="time">Hiện thời gian</option>
                                    <!-- <option value="proxy">Dành riêng cho mua proxy</option>
                                    <option value="bot">Dành riêng cho bot tương tác</option> -->
                                </select>
                                                    </div>
                            <div class="mb-3">
                                <button class="btn btn-primary col-12">Thêm dịch vụ mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách các dịch vụ</h4>
                    <div class="mb-3">
                        <div class="table-responsive">
                            <table id="list-service"
                                class="table border table-striped table-bordered display text-nowrap dataTable responsive w-100">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên dịch vụ</th>
                                        <th>Social</th>
                                        <th>Path</th>
                                        <th>Thể loại</th>
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
    </div>
@endsection
@section('script')
    <script>
        createDataTable('#list-service', '{{ route('admin.list', 'list-service') }}', [{
            data: 'id'
        }, {
            data: 'name'
        }, {
            data: 'social'
        }, {
            data: 'slug'
        }, {
            data: 'category'
        }, {
            data: 'status',
            render: function(data){
                if(data == 'show'){
                    return '<span class="badge bg-success">Hoạt động</span>'
                }else{
                    return '<span class="badge bg-danger">Không hoạt động</span>'
                }
            }
        }, {
            data: null,
            render: function(data){
                return `<a href="{{ route('admin.service.edit', 'id') }}" class="btn btn-warning"><i class="fas fa-pencil"></i></a>
                        <a href="{{ route('admin.service.delete', 'id') }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>`.replace(/id/g, data.id)
            }
        }])
    </script>
@endsection
