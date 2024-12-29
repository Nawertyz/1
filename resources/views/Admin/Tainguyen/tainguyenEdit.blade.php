@extends('Admin.Layout.App')
@section('title', 'Chỉnh sửa tài nguyên')
@section('content')
 
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
            <div class="card-header ribbon ribbon-start ribbon-clip border-bottom-none min-h-50px">
                                        <div class="ribbon-label text-uppercase fw-bold bg-default">
                                        Chỉnh sửa tài nguyên
                                            <span class="ribbon-inner bg-default"></span>
                                        </div>
                                    </div>
                <div class="card-body">
                 
                    <form action="{{ route('admin.taikhoan.tainguyen.edit.post', $social->id) }}" method="POST" request="ptl">
                         
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border border-info " name="name"
                                value="{{ $social->name }}" placeholder="Name">
                            <label><i class="fa fa-star me-2 fs-4 "></i><span
                                    class=" ps-3">Tên tài nguyên (vd:Via Us)</span></label>
                        </div>
                        <div class="form-floating mb-3">
                                <input type="text" class="form-control border border-info " name="image"
                                    placeholder="Name"  value="{{ $social->image }}">
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Link ảnh quốc gia</span></label>
                            </div>
                        <div class="form-floating mb-3">
                        <textarea  name="description" rows="5" style="height: 175px" class="form-control border border-info" placeholder="Name">{{ $social->description }}</textarea>
                                <label><i class="fa fa-star me-2 fs-4 "></i><span
                                        class=" ps-3">Chú ý</span></label>
                        </div>
                        <div class="form-floating mb-3">
                           
                           <textarea  name="thongtin" rows="5" style="height: 175px" class="form-control border border-info" placeholder="Name">{{ $social->thongtin }}</textarea>
                           <label><i class="fa fa-star me-2 fs-4 "></i><span
                                   class=" ps-3">Thông tin tài nguyên (vd: tk:lamtilo06| mk: lamtilo06 |mail: lamtilo@gmail.com| 2fa: GSD SDHSH)</span></label>
                         
                       </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border border-info " name="price"
                                        value="{{ $social->price }}" placeholder="Name">
                                    <label><i class="fa fa-star me-2 fs-4 "></i><span
                                            class=" ps-3">Giá</span></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border border-info "
                                        value="{{ $social->price_collaborator }}" name="price_collaborator"
                                        placeholder="Name">
                                    <label><i class="fa fa-star me-2 fs-4 "></i><span
                                            class=" ps-3">Giá Collaborator</span></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border border-info " name="price_agency"
                                        value="{{ $social->price_agency }}" placeholder="Name">
                                    <label><i class="fa fa-star me-2 fs-4 "></i><span
                                            class=" ps-3">Giá Agency</span></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border border-info "
                                        value="{{ $social->price_distributor }}" name="price_distributor"
                                        placeholder="Name">
                                    <label><i class="fa fa-star me-2 fs-4 "></i><span
                                            class=" ps-3">Giá Distributor</span></label>
                                </div>
                            </div>
                        </div>
           
                     
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Chỉnh sửa </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
