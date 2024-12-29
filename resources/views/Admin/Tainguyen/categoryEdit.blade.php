@extends('Admin.Layout.App')
@section('title', 'Chỉnh sửa chuyên mục')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sửa chuyêm mục</h4>
                    <form action="{{ route('admin.tainguyen.edit.post', $social->id) }}" method="POST">
                        @csrf
                        <div class=" mb-3">
                            <input type="text" class="form-control border border-primary" placeholder="Tên chuyên mục (vd: bán tài nguyên fb)"
                                value="{{ $social->name }}" name="name">
                            
                        </div>
                        <div class=" mb-3">
                            <input type="text" class="form-control border border-primary" placeholder="Đường dẫn chuyên mục (VD: tainguyen-fb)"
                                value="{{ $social->slug }}" name="slug">
                            
                        </div>
                        <div class=" mb-3">
                            <input type="text" class="form-control border border-primary" placeholder="Link ảnh chuyên mục"
                                value="{{ $social->image }}" name="image">
                          
                        </div>
                        <div class=" mb-3">
                            <select name="status" id="" class="form-select border border-primary">
                                <option value="show" @if ($social->status == 'show') selected @endif>Hiển thị</option>
                                <option value="hide" @if ($social->status == 'hide') selected @endif>Ẩn</option>
                            </select>
                            
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary col-12">
                                Chỉnh sửa chuyên mục
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
