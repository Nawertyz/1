@extends('Layout.App')
@section('title', 'Get UID')

@section('content')
    <div class="row">
        <div class="card mb-4 card-tab">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Get UID Facebook</h4>
                    <form action="{{ route('tool.uid.post', 'get-uid') }}" method="POST">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control mb-3" placeholder="Nhập link Facebook" name="link" id="link" value="{{ session('link') }}">
                         
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg btn-nw btn-rounded bold" id="getUID">Get UID</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
