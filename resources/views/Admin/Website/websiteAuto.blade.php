@extends('Admin.Layout.App')
@section('title', 'Cấu hình giao diện')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cấu hình API Token Auto</h4>
                    <div class="mb-3">
                        <form action="{{ route('admin.website.auto.post') }}" method="POST">
                            @csrf
                            <div class=" mb-3">
                                <input type="text" class="form-control border border-info" name="subgiare"
                                    value="{{ DataSite1('subgiare') }}" placeholder="Name">
                                <label><i class="ti ti-topology-star-ring-3 me-2 fs-4 text-info"></i><span
                                        class="border-start border-info ps-3">Token Subgiare</span></label>
                            </div>
                            <div class=" mb-3">
                                <input type="text" class="form-control border border-info" name="submeta"
                                    value="{{ DataSite1('submeta') }}" placeholder="Name">
                                <label><i class="ti ti-topology-star-ring-3 me-2 fs-4 text-info"></i><span
                                        class="border-start border-info ps-3">Token Submeta</span></label>
                            </div>
                            <div class=" mb-3">
                                <input type="text" class="form-control border border-info" name="hacklike17"
                                    value="{{ DataSite1('hacklike17') }}" placeholder="Name">
                                <label><i class="ti ti-topology-star-ring-3 me-2 fs-4 text-info"></i><span
                                        class="border-start border-info ps-3">Token Hacklike17</span></label>
                            </div>
                            <div class=" mb-3">
                                <input type="text" class="form-control border border-info" name="trumvip"
                                    value="{{ DataSite1('trumvip') }}" placeholder="Name">
                                <label><i class="ti ti-topology-star-ring-3 me-2 fs-4 text-info"></i><span
                                        class="border-start border-info ps-3">Token Trum.vip</span></label>
                            </div>
                            <div class=" mb-3">
                                <input type="text" class="form-control border border-info" name="trumsubre"
                                    value="{{ DataSite1('trumsubre') }}" placeholder="Name">
                                <label><i class="ti ti-topology-star-ring-3 me-2 fs-4 text-info"></i><span
                                        class="border-start border-info ps-3">Token Trumsubre</span></label>
                            </div>
                            <div class=" mb-3">
                                <input type="text" class="form-control border border-info" name="twomxh"
                                    value="{{ DataSite1('twomxh') }}" placeholder="Name">
                                <label><i class="ti ti-topology-star-ring-3 me-2 fs-4 text-info"></i><span
                                        class="border-start border-info ps-3">Token 2mxh</span></label>
                            </div>
                            <div class=" mb-3">
                                <input type="text" class="form-control border border-info" name="muafl"
                                    value="{{ DataSite1('muafl') }}" placeholder="Name">
                                <label><i class="ti ti-topology-star-ring-3 me-2 fs-4 text-info"></i><span
                                        class="border-start border-info ps-3">Token Muafl</span></label>
                            </div>
                            <div class=" mb-3">
                                <input type="text" class="form-control border border-info" name="onedg"
                                    value="{{ DataSite1('onedg') }}" placeholder="Name">
                                <label><i class="ti ti-topology-star-ring-3 me-2 fs-4 text-info"></i><span
                                        class="border-start border-info ps-3">Token 1dg</span></label>
                            </div>
                            <div class=" mb-3">
                                <input type="text" class="form-control border border-info" name="sain"
                                    value="{{ DataSite1('sain') }}" placeholder="Name">
                                <label><i class="ti ti-topology-star-ring-3 me-2 fs-4 text-info"></i><span
                                        class="border-start border-info ps-3">Token Saintpanel</span></label>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class=" mb-3">
                                        <input type="text" class="form-control border border-info" name="usenametds" value="{{ DataSite1('usenametds') }}" placeholder="Name">
                                        <label><i class="ti ti-topology-star-ring-3 me-2 fs-4 text-info"></i><span class="border-start border-info ps-3">Tài khoản TDS</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-3">
                                        <input type="text" class="form-control border border-info" name="passwordtds" value="{{ DataSite1('passwordtds') }}" placeholder="Name">
                                        <label><i class="ti ti-topology-star-ring-3 me-2 fs-4 text-info"></i><span class="border-start border-info ps-3">Mật khẩi TDS</span></label>
                                    </div>
                                </div>

</div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary col-12">Lưu cấu hình</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
