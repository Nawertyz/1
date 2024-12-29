@extends('Layout.App')
@section('title', 'Bảng giá dịch vụ')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body py-0">
                <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                    @foreach ($service_socials as $item1)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab-{{ $item1->id}}" data-bs-toggle="tab"
                            href="#profile-{{ $item1->id}}" role="tab" aria-selected="true">
                            <img src="{{ $item1->image}}" width="23"> &ensp;{{ $item1->name}}
                        </a>
                    </li>
                    @endforeach

                </ul>

                @foreach ($service_socials as $item)
                <div class="tab-content">

                    <div class="tab-pane" id="profile-{{ $item->id}}" role="tabpanel"
                        aria-labelledby="profile-tab-{{ $item->id}}">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive overflow-x-auto w-100">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="1">Tên, máy chủ</th>

                                                <th>Thành viên</th>
                                                <th>Cộng tác viên</th>
                                                <th>Đại lý</th>
                                                <th>Nhà phân phối</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @inject('server', '\App\Models\ServerService')
                                            @foreach ($server->getServerByService($item->id) as $server)
                                            <tr>
                                                <td>{!! $item->name !!} {!! $server->name !!} - <span
                                                        class="badge bg-danger">MC {{ $server->server }}</span></td>

                                                <td><span class="badge bg-success">{{ $server->price }}</span></td>
                                                <td><span
                                                        class="badge bg-primary">{{ $server->price_collaborator }}</span>
                                                </td>
                                                <td><span class="badge bg-warning">{{ $server->price_agency }}</span>
                                                </td>
                                                <td><span class="badge bg-info">**</span></td>
                                                <td>{!! statusService($server->status) !!}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
   </div>
                    </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>

</div>
 

</div>
</div>
</div>
</div>
</div>
@endsection