@extends('Admin.Layout.App')
@section('title', 'Thay đổi số dư')
@section('content')
<div class="app-wrapper" id="kt_app_wrapper">
            <div id="kt_app_toolbar_container" class="app-container container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Thay đổi số dư
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
             
                    <div class="mb-3">
                        <form action="{{ route('admin.user.balance.post') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border border-info " name="username" placeholder="Name">
                                <label>Tài khoản</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="action" id="" class="form-select border border-info">
                                    <option value="plus">Cộng</option>
                                    <option value="minus">Trừ</option>
                                </select>
                                <label>Thao tác</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border border-info " name="balance" placeholder="Name">
                                <label>Số tiền</label>
                            </div>
                            <div class="form-floating mb-3">
                            <textarea class="form-control border border-info" type="text" style="height: 150px" name="description"></textarea>
                            <label class="form-label">Ghi Chú</label>
                        </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary col-12">
                                    Thay đổi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
