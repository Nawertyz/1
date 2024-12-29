@extends('Admin.Layout.App')
@section('title', 'Cấu hình giao diện')
@section('content')
 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Tuỳ chỉnh Giao Diện
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
               
                    <div class="mb-3">
                        <form action="{{ route('admin.website.theme.post') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border " name="logo"
                                    value="{{ DataSite('logo') }}" placeholder="Name">
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class="  ps-3">Logo Website</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border " name="logo_mini"
                                    value="{{ DataSite('logo_mini') }}" placeholder="Name">
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class="  ps-3">Logo Website Mini</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border " name="favicon"
                                    value="{{ DataSite('favicon') }}" placeholder="Name">
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class="  ps-3">Favicon Website</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border " name="image_seo"
                                    value="{{ DataSite('image_seo') }}" placeholder="Name">
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class="  ps-3">Image Seo</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="theme" id="" class="form-select border ">
                                    
                                    <option value="light" @if ($site->theme == 'light') selected @endif>Sáng</option>
                                <option value="dark" @if ($site->theme == 'dark') selected @endif>Tối
                                </option>
                                    
                                </select>
                                <label><i class="fas fa-star me-2 fs-4 "></i><span
                                        class="  ps-3">Giao diện</span></label>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary col-12">Lưu giao diện</button>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection
