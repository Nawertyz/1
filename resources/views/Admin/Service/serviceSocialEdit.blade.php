@extends('Admin.Layout.App')
@section('title', 'Chỉnh sửa dịch vụ MXH')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sửa dịch vụ Social</h4>
                    <form action="{{ route('admin.service.social.edit.post', $social->id) }}" method="POST">
                        @csrf
                        <div class=" mb-3">
                            <input type="text" class="form-control border border-primary" placeholder="     Tên dịch vụ MXH"
                                value="{{ $social->name }}" name="social_service">
                            
                        </div>
                        <div class=" mb-3">
                            <input type="text" class="form-control border border-primary" placeholder="Path Dịch vụ (VD: sg-facebook)"
                                value="{{ $social->slug }}" name="social_path">
                            
                        </div>
                        <div class=" mb-3">
                            <input type="text" class="form-control border border-primary" placeholder="Link Ảnh Dịch vụ"
                                value="{{ $social->image }}" name="social_image">
                          
                        </div>
                        <div class=" mb-3">
                            <select name="social_status" id="" class="form-select border border-primary">
                                <option value="show" @if ($social->status == 'show') selected @endif>Hiển thị</option>
                                <option value="hide" @if ($social->status == 'hide') selected @endif>Ẩn</option>
                            </select>
                            
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary col-12">
                                Chỉnh sửa dịch vụ MXH
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
