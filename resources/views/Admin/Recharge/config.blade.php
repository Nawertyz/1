@extends('Admin.Layout.App')
@section('title', 'Cấu hình nạp tiền')
@section('content')
 
    <div class="row">
       
<div class="col-md-6 mb-3">
<div class="card card-flush">

<div class="card-content">
<div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                       MOMO tự động (Dùng  tại <a href="https://thueapi.pro/" class="text-primary" target="_blank" rel="noopener noreferrer"> thueapi.pro </a>)
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
<div class="card-body">
 
 @if ($momo)
<form action="{{ route('admin.recharge.config.post') }}" method="POST" request="ptl"> 
                        <input type="hidden" name="type" value="momo">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="name" placeholder="Name" value="{{ $momo->account_name }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Chủ tài khoản</span></label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="stk" placeholder="Name" value="{{ $momo->account_number }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Số tài khoản</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control border border-info " name="password"
                                placeholder="Name" value="{{ $momo->password }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Mật khẩu (nếu có)</span></label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="api_token"
                                placeholder="Name" value="{{ $momo->api_token }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Token Api</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info "
                                placeholder="Name" value="https://{{ getdomain() }}/cronJob/recharge-transfer/momo" readonly="" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Link cron</span></label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Lưu ngay</button>
                        </div>
                   
                    </form>
                   @else
                   <form action="{{ route('admin.recharge.config.post') }}" method="POST" request="ptl"> 
                        <input type="hidden" name="type" value="momo">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="name" placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Chủ tài khoản</span></label>
                        </div>
                     
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="stk" placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Số tài khoản</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control border border-info " name="password"
                                placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Mật khẩu (nếu có)</span></label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="api_token"
                                placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Token Api</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info "
                                placeholder="Name" value="https://{{ getdomain() }}/cronJob/recharge-transfer/momo" readonly="" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Link cron</span></label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Lưu ngay</button>
                        </div>
                   
                    </form>
                    @endif
                   
</div>
</div>
</div>
</div>
<div class="col-md-6 mb-3">
<div class="card">

<div class="card-content">
<div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        MBBANK tự động (Dùng  tại <a href="https://thueapi.pro/" class="text-primary" target="_blank" rel="noopener noreferrer"> thueapi.pro </a>)
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
<div class="card-body">
 
@if($mbbank)
<form action="{{ route('admin.recharge.config.post') }}" method="POST" request="ptl">
                      <input type="hidden" name="type" value="mbbank">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="name" placeholder="Name" value="{{ $mbbank->account_name }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Chủ tài khoản</span></label>
                        </div>
                     
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="stk" placeholder="Name" value="{{ $mbbank->account_number }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Số tài khoản</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control border border-info " name="password"
                                placeholder="Name" value="{{ $mbbank->password }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Mật khẩu (nếu có)</span></label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="api_token"
                                placeholder="Name" value="{{ $mbbank->api_token }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Token Api</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info "
                                placeholder="Name" value="https://{{ getdomain() }}/cronJob/recharge-transfer/mbbank" readonly="" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Link cron</span></label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Lưu ngay</button>
                        </div>
                    </form>
                         @else
                   <form action="{{ route('admin.recharge.config.post') }}" method="POST" request="ptl"> 
                        <input type="hidden" name="type" value="mbbank">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="name" placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Chủ tài khoản</span></label>
                        </div>
                    
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="stk" placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Số tài khoản</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control border border-info " name="password"
                                placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Mật khẩu (nếu có)</span></label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="api_token"
                                placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Token Api</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info "
                                placeholder="Name" value="https://{{ getdomain() }}/cronJob/recharge-transfer/mbbank" readonly="" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Link cron</span></label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Lưu ngay</button>
                        </div>
                   
                    </form>
                    @endif
</div>
</div>
</div>
</div>
<div class="col-md-6 mb-3">
<div class="card">

<div class="card-content">
<div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                         ACB tự động (Dùng  tại <a href="https://thueapi.pro/" class="text-primary" target="_blank" rel="noopener noreferrer"> thueapi.pro </a>)
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
<div class="card-body">
 
@if($acb)
<form action="{{ route('admin.recharge.config.post') }}" method="POST" request="ptl">
                      <input type="hidden" name="type" value="acb">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="name" placeholder="Name" value="{{ $acb->account_name }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Chủ tài khoản</span></label>
                        </div>
                     
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="stk" placeholder="Name" value="{{ $acb->account_number }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Số tài khoản</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control border border-info " name="password"
                                placeholder="Name" value="{{ $acb->password }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Mật khẩu (nếu có)</span></label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="api_token"
                                placeholder="Name" value="{{ $acb->api_token }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Token Api</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info "
                                placeholder="Name" value="https://{{ getdomain() }}/cronJob/recharge-transfer/acb" readonly="" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Link cron</span></label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Lưu ngay</button>
                        </div>
                    </form>
                         @else
                   <form action="{{ route('admin.recharge.config.post') }}" method="POST" request="ptl"> 
                        <input type="hidden" name="type" value="acb">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="name" placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Chủ tài khoản</span></label>
                        </div>
                    
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="stk" placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Số tài khoản</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control border border-info " name="password"
                                placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Mật khẩu (nếu có)</span></label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="api_token"
                                placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Token Api</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info "
                                placeholder="Name" value="https://{{ getdomain() }}/cronJob/recharge-transfer/acb" readonly="" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Link cron</span></label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Lưu ngay</button>
                        </div>
                   
                    </form>
                    @endif
</div>
</div>
</div>
</div>
<div class="col-md-6 mb-3">
<div class="card">

<div class="card-content">
<div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                         VIETCOMBANK tự động (Dùng  tại <a href="https://thueapi.pro/" class="text-primary" target="_blank" rel="noopener noreferrer"> thueapi.pro </a>)
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
<div class="card-body">
 
   @if ($vietcombank)
<form action="{{ route('admin.recharge.config.post') }}" method="POST" request="ptl">
                        <input type="hidden" name="type" value="vietcombank">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="name" placeholder="Name" value="{{ $vietcombank->account_name }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Chủ tài khoản</span></label>
                        </div>
                      
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="stk" placeholder="Name" value="{{ $vietcombank->account_number }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Số tài khoản</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control border border-info " name="password"
                                placeholder="Name" value="{{ $vietcombank->password }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Mật khẩu (nếu có)</span></label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="api_token"
                                placeholder="Name" value="{{ $vietcombank->api_token }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Token Api</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info "
                                placeholder="Name" value="https://{{ getdomain() }}/cronJob/recharge-transfer/vietcombank" readonly="" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Link cron</span></label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Lưu ngay</button>
                        </div>
                    </form>
                       @else
                   <form action="{{ route('admin.recharge.config.post') }}" method="POST" request="ptl"> 
                        <input type="hidden" name="type" value="vietcombank">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="name" placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Chủ tài khoản</span></label>
                        </div>
                   
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="stk" placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Số tài khoản</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control border border-info " name="password"
                                placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Mật khẩu (nếu có)</span></label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="api_token"
                                placeholder="Name" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Token Api</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info "
                                placeholder="Name" value="https://{{ getdomain() }}/cronJob/recharge-transfer/vietcombank" readonly="" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Link cron</span></label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Lưu ngay</button>
                        </div>
                   
                    </form>
                    @endif
                  
</div>
</div>
</div>
</div> 

<div class="col-md-6 mb-3">
<div class="card">
 
<div class="card-content">
<div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Card tự động (Lấy tại <a href="https://trumthere.vn/" class="text-primary" target="_blank" rel="noopener noreferrer">trumthere.vn</a>)
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
<div class="card-body">
 

<form action="{{ route('admin.recharge.card.post') }}" method="POST" >   
                      @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="partner_id" placeholder="Name" value="{{ DataSite('partner_id') }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Partner ID</span></label>
                        </div>
                      
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="partner_key" placeholder="Name" value="{{ DataSite('partner_key') }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Partner Key</span></span></label>
                        </div>
                     

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="card_discount"
                                placeholder="Name" value="{{ DataSite('card_discount') }}">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Chiết khấu</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info "
                                placeholder="Name" value="https://{{ getdomain() }}/cronJob/recharge-card" readonly="" >
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Link callback</span></label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Lưu ngay</button>
                        </div>
                    </form>
              
</div>
</div>
</div>
</div> </div>

        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cấu hình giảm giá</h4>
                    <form action="{{ route('admin.recharge.promotion.post') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <select type="text" class="form-select " name="action">
                                <option value="show" @if (DataSite('show_promotion') == 'show') selected @endif>Hiển thị</option>
                                <option value="hide" @if (DataSite('show_promotion') == 'hide') selected @endif>Ẩn</option>
                            </select>
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Hiển thị thông báo khuyến mãi</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="promotion"
                                value="{{ DataSite('recharge_promotion') }}" placeholder="Name">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Khuyến mãi </span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control border border-info " name="start_promotion"
                                value="{{ DataSite('start_promotion') }}" placeholder="Name">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Thời gian bắt đầu</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control border border-info " name="end_promotion"
                                value="{{ DataSite('end_promotion') }}" placeholder="Name">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Thời gian kết thúc</span></label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Lưu cấu hình nạp tiền</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách ngân hàng</h4>
                    
                    <div class="table-responsive dt-responsive">
                        <div id="" class="">
                            <table id="testds"
                                class="table table-striped table-bordered nowrap"
                                aria-describedby="file_export_info">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Loại</th>
                                        <th> tài khoản</th>
                                        <th>Tài khoản</th>
                                        <th>Số tài khoản</th>
                                        <th>Logo</th>
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
        createDataTable('#testds', '{{ route('admin.list', 'list-recharge') }}', [{
            data: 'id'
        }, {
            data: 'type'
        }, {
            data: 'account_name'
        }, {
            data: 'account'
        }, {
            data: 'account_number'
        }, {
            data: 'logo',
            render: function(data, type, row) {
                return `<img src="${data}" alt="" width="100px">`
            }
        }, {
            data: null,
            render: function(data, type, row) {
                return `
                        <a href="{{ route('admin.recharge.delete', 'id') }}" class="btn btn-danger">Xóa</a>
                    `.replace('id', data.id)
            }
        }])
    </script>
@endsection
