@extends('Admin.Layout.App')
@section('title', 'Chỉnh sửa dịch vụ')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Chỉnh sửa dịch vụ</h4>
                    <form action="{{ route('admin.service.edit.post', $service->id) }}" method="POST">
                        @csrf
                        <div class=" mb-3">
                            <input type="text" class="form-control border border-info" name="name"
                                value="{{ $service->name }}" placeholder="Tên dịch vụ">
                             
                        </div>
                        <div class=" mb-3">
                            <select name="status" id="" class="form-select mb-3">
                                <option value="show" @if ($service->status == 'show') selected @endif>Hoạt động</option>
                                <option value="hide" @if ($service->status == 'hide') selected @endif>Không hoạt động
                                </option>
                            </select>
                   
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary col-12">Chỉnh sửa dịch vụ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
