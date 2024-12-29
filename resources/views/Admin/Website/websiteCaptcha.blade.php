@extends('Admin.Layout.App')
@section('title', 'Cấu hình giao diện')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cấu hình captcha</h4>
                    <div class="mb-3">
                    <div class="alert alert-info">
                        Hướng dẫn lấy site key và secret key để cấu hình captcha <a href="https://docs.google.com/document/d/1mW4hJ83A4pI3_vBHvHjFpY9GDbN5G6JkPvhMlOi8txc/edit?usp=sharing" target="_blank" class="text-danger"><b>tại đây</b></a>
                    </div>
                        <form action="{{ route('admin.website.captcha.post') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control " name="site_key"
                                    value="{{ DataSite('site_key') }}" placeholder="Name">
                                <label><i class="ti ti-topology-star-ring-3 me-2 fs-4 "></i><span
                                        class=" ps-3">SITE KEY</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control " name="secret_key"
                                    value="{{ DataSite('secret_key') }}" placeholder="Name">
                                <label><i class="ti ti-topology-star-ring-3 me-2 fs-4 "></i><span
                                        class=" ps-3">SECRET KEY</span></label>
                            </div>
                        
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary col-12">Lưu thay đổi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
