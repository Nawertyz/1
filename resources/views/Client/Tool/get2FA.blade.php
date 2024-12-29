@extends('Layout.App')
@section('title', 'Get 2FA CODE')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> GET 2FA CODE</h4>
                    <form action="{{ route('tool.2fa.post', 'get-2fa') }}" method="POST">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control mb-3" placeholder="Nhập 2FA SECRET KEY" name="key" id="key" value="{{ session('token') }}">
                 
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg btn-nw btn-rounded bold" id="getUID">Get 2FA</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
