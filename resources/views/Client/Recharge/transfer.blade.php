@extends('Layout.App')
@section('title', 'Nạp tiền chuyển khoản')
@section('content')
@if (getDomain() == env('PARENT_SITE'))

<div class="pt-5">
							<div class="mb-5 rounded-lg bg-danger p-2 text-sm font-semibold text-white">
    - Bạn vui lòng chuyển khoản chính xác nội dung để được cộng tiền nhanh nhất.<br>
    - Nếu sau 10 phút từ khi tiền trong tài khoản của bạn bị trừ mà vẫn chưa được cộng tiền vui liên hệ Admin để được hỗ trợ.<br>
    - Vui lòng không nạp từ bank khác qua bank này (tránh lỗi).<br>
    - Hệ thống sẽ tự động cộng tiền sau 1 - 2 phút. Nếu nạp sai nội dung, vui lòng liên hệ admin để được hỗ trợ
</div>
<div class="mb-5">
    <div class="font-bold uppercase bg-primary text-white p-2 mb-0 text-center" style="border-radius: 10px 10px 0px 0px;">
        Nội dung: (bắt buộc ghi đúng nội dung dưới đây)
    </div>
    <div class="alert p-2 bg-light-primary border border-primary h1 fw-bold text-3xl text-center" style="border-radius: 0px 0px 10px 10px;">
        <span id="content_codeRecharge" onclick="coppy('content_codeRecharge');">{{ DataSite('code_tranfer') }}{{ Auth::user()->id }}</span>
    </div>
</div>
<div class="mx-auto grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3">

<div class="panel space-y-4">
        <div>
			<img src="{{DataSite('logo')}}" alt="" class="mx-auto h-12 cursor-pointer object-cover">
		</div>
        <div class="rounded-lg text-[18px] font-bold">
            <form action="/recharge/card" method="POST" request="ptl">
                <div class="mb-3">
                    <label>Loại thẻ</label>
                    <select name="telco" id="telco" onchange="rebill()" class="form-select">
                        <option>Chọn loại thẻ</option>
                     
                                    <option value="VIETTEL">Viettel (Chiết khấu: {{ DataSite('card_discount') }}%)</option>
                                    <option value="MOBIFONE">Mobifone (Chiết khấu: {{ DataSite('card_discount') }}%)
                                    </option>
                                    <option value="VINAPHONE">Vinaphone (Chiết khấu: {{ DataSite('card_discount') }}%)
                                    </option>
                                    <option value="ZING">Zing (Chiết khấu: {{ DataSite('card_discount') }}%)</option>
                                    <option value="GATE">Gate (Chiết khấu: {{ DataSite('card_discount') }}%)</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Mệnh giá</label>
                    <select name="amount" id="amount"  class="form-select" onchange="rebill()" >
                    <option value="10000">10.000đ</option>
                                    <option value="20000">20.000đ</option>
                                    <option value="30000">30.000đ</option>
                                    <option value="50000">50.000đ</option>
                                    <option value="100000">100.000đ</option>
                                    <option value="200000">200.000đ</option>
                                    <option value="300000">300.000đ</option>
                                    <option value="500000">500.000đ</option>
                                    <option value="1000000">1.000.000đ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Số serial</label>
                    <input type="text" name="serial" id="serial" class="form-input" placeholder="Nhập số serial">
                </div>
                <div class="mb-4">
                    <label>Mã thẻ</label>
                    <input type="text"  name="code" id="code" class="form-input" placeholder="Nhập mã thẻ">
                </div>
                <div class="mb-4 text-lg text-center">Sai Mệnh Giá Mất Thẻ</div>
                <div class="mb-3 text-white text-lg rounded-lg bg-primary p-3 text-center">
                    <span id="telco-amount">0</span>VNĐ
                </div>
                <button class="btn btn-success w-full"  type="submit"  >Gửi Thẻ Ngay</button>
            </form>
		</div>
	</div>

@foreach ($account as $item)
    	<div class="panel space-y-4">
		<div>
			<img src="{{ $item->logo }}" alt="" class="mx-auto h-12 cursor-pointer object-cover">
		</div>
		<div class="rounded-lg p-4 text-[18px] font-bold">
			<div class="flex flex-wrap justify-between">
				<span>Số tài khoản</span>
				<span><b class="text-right" id="number_{{ $item->type }}" onclick="coppy('number_{{ $item->type }}')">{{ $item->account_number }}</b></span>
			</div>
			<div class="flex flex-wrap justify-between">
				<span>Chủ tài khoản</span>
				<span class="cursor-pointer">{{ $item->account_name }}</span>
			</div>
			<div class="flex flex-wrap justify-between mb-5">
				<span>Nạp tối thiểu</span>
				<span class="cursor-pointer">10.000 VNĐ</span>
			</div>
            @if ($item->type == 'momo')
                                                        <img src="{{ $item->qr_code }}{{ DataSite('code_tranfer') }}{{ Auth::user()->id }}"
                                                             class="mx-auto rounded-lg object-fill w-80"  alt="">
                                                        @else
                                                        <img src="{{ $item->qr_code }}&addInfo={{ DataSite('code_tranfer') }}{{ Auth::user()->id }}"
                                                             class="mx-auto rounded-lg object-fill w-80"  alt="">
                                                        @endif
            		</div>
	</div>
@endforeach


    
	</div>
						</div>
                        <div class="pt-5">
                        <div class="mx-auto grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-2">

                        <div class="panel space-y-6">
  
  <div class="mb-5 flex items-center justify-between">
      <h5 class="text-lg font-semibold dark:text-white-light">Lịch Sử Nạp Thẻ</h5>
  </div>
  
  <div class="table-responsive">
      <table class="datatable table-responsive whitespace-nowrap text-center font-bold" id="the">
          <thead>
              <tr class="">
              <th>ID</th>
                                            <th>Trạng thái</th>
                                            <th>Thời gian</th>
                                            <th>Nhà mạng</th>
                                            <th>Mệnh giá</th>
                                            <th>Mã serial</th>
                                            <th>Mã thẻ</th>
                                            <th>Thực nhận</th>
                                            <th>Thao tác</th>
              </tr>
          </thead>
          <tbody class="ant-table-tbody">
                          </tbody>
      </table>
  </div>
  
</div>

<div class="panel space-y-6">
  
        <div class="mb-5 flex items-center justify-between">
			<h5 class="text-lg font-semibold dark:text-white-light">Lịch Sử Chuyển Khoản</h5>
		</div>
        
        <div class="table-responsive">
            <table class="datatable table-responsive whitespace-nowrap text-center font-bold" id="testds">
                <thead>
                    <tr class="">
                    <th>ID</th>
                                            <th>Thời gian</th>
                                            <th>Loại</th>
                                            <th>Mã giao dịch</th>
                                            <th>Người chuyển</th>
                                            <th>Thực nhận</th>
                                            <th>Nội dung</th>
                    </tr>
                </thead>
                <tbody class="ant-table-tbody">
                                </tbody>
            </table>
        </div>
        
    </div>
</div>
						</div>
@endsection
@section('script')
    <script>
        createDataTable('#testds', '{{ route('user.list.action', 'history-transfer') }}', [{
                data: 'id'
            },
            {
                data: 'created_at'
            },
            {
                data: 'type_bank',
                render: function(data, type, row){
                    return `<span class="badge bg-primary">${data}</span>
                                    `
                }
            },
            {
                data: 'tranid'
            },
            {
                data: 'name_bank'
            },
            {
                data: 'real_amount',
                render: function(data, type, row){
                    return `<b class="text-danger">${formatNumber(data)}</b>
                                    <sup>coin</sup>`
                }
            },
            {
                data: 'note'
            },
        ])
    </script>
    <script>
        function rebill() {
            var telco = $('#telco').val();
            var amount = $('#amount').val();
            var received = 0;
            var telco_name = '';
            var telco_amount = 0;
            var discount = {{ DataSite('card_discount') }};

            telco_amount = amount - (amount * discount / 100);
            received = amount - (amount * discount / 100);
            $('#received').html(Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(received));
            $('#telco-name').html(telco_name);
            $('#telco-amount').html(Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(telco_amount));
        }
        createDataTable('#the', '{{ route('user.list.action', 'history-card') }}', [{
                data: 'id'
            },
            {
                data: 'status'
            }, {
                data: 'created_at'
            }, {
                data: 'card_type'
            }, {
                data: 'card_amount'
            }, {
                data: 'card_serial'
            }, {
                data: 'card_code'
            }, {
                data: 'card_real_amount',
                render: function(data, type, row) {
                    return `<b class="text-success">${formatNumber(data)}đ</b>`
                }
            }, {
                data: null,
                render: function(data, type, row) {
                    return 'ds'
                }
            }
        ])
    </script>
@endsection
@else



<div class="row">
        <div class="col-md-12">

            <div class="card mb-4 card-tab">
    <div class="card-header">
                    <div class="row">
                <div class="col-6 d-grid gap-2">
                    <a href="/recharge/transfer" class="btn btn-primary"><img src="https://subgiare.vn/assets/images/svg/bank.svg" alt="" width="25" height="25">
                        Ngân hàng</a>
                </div>
                <div class="col-6 d-grid gap-2">
                    <a href="/recharge/card" class="btn btn-outline-primary"><img src="https://subgiare.vn/assets/images/svg/card.svg" alt="" width="25" height="25">
                        Thẻ cào</a>
                </div>
            </div>
            </div>
    <div class="card-body">
    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="alert alert-danger" role="alert">
                            - Bạn vui lòng chuyển khoản chính xác nội dung để được cộng tiền nhanh nhất.<br>
- Nếu sau 10 phút tài khoản chưa được cộng tiền vui liên hệ Admin để được hỗ trợ.<br>
- Vui lòng không nạp từ bank khác qua bank này (tránh lỗi).<br>
- Nạp sai số tài khoản, sai ngân hàng, sai nội dung sẽ bị trừ 20% phí giao dịch.<br>
- Bấm vào số tài khoản hoặc nội dung để sao chép nội thông tin chuyển tiền 1 cách chuẩn nhất.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">

                            @foreach ($account as $item)
                            
                                                                <div class="col-md-6 mb-3">
                                    <h5 class="text-center">
                                        <img class="hei-45" src="{{ $item->logo }}">
                                    </h5>
                                    <div class="alert bg-light border border-2 border-primary" role="alert">
                                        <div>
                                            Số tài khoản: <b class="text-right" onclick="coppy('{{ $item->account_number }}');">{{ $item->account_number }}</b>
                                        </div>
                                        <div>
                                            Chủ tài khoản: <b class="text-right">{{ $item->account_name }}</b>
                                        </div>
                                        <div>
                                            Nạp tối thiểu: <b class="text-right">10.000 VNĐ</b>
                                        </div>
                                        <div class="text-center mt-2">
                                            <button type="button" class="btn btn-light-danger" data-bs-toggle="modal" data-bs-target="#scanQr_vcb">Quét Mã QR <i class="ti ti-qrcode"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="scanQr_vcb" tabindex="-1" role="dialog" aria-labelledby="scanQr_vcb" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-top" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="w-100 mb-2">
                                                @if ($item->type == 'momo')
                                                        <img src="{{ $item->qr_code }}{{ DataSite('code_tranfer') }}{{ Auth::user()->id }}"
                                                            class="img-fluid" alt="">
                                                        @else
                                                        <img src="{{ $item->qr_code }}&addInfo={{ DataSite('code_tranfer') }}{{ Auth::user()->id }}"
                                                            class="img-fluid" alt="">
                                                        @endif
                                                                                                    </div>
                                                <div class="d-grid gap-2">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng Cửa Sổ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> @endforeach
                                                            </div>

                                                                  


                        </div>
                        
                        <div class="col-md-12 mb-4">
                            <div class="fw-bold text-uppercase bg-primary text-light p-2 mb-0 text-center" style="border-radius: 10px 10px 0px 0px;">
                                Nội dung: (bắt buộc ghi đúng nội dung dưới đây)
                            </div>
                            <div class="alert bg-light-primary border border-primary h1 fw-bold fs-3 text-center" style="border-radius: 0px 0px 10px 10px;">
                                <span onclick="coppy('{{ DataSite('code_tranfer') }}{{ Auth::user()->id }}')">{{ DataSite('code_tranfer') }}{{ Auth::user()->id }}</span>
                            </div>
                        </div>
                        
                    </div>
        </div>
        </div>

     
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Lịch sử nạp tiền</h4>
                    <div class="mb-3">
                        <div class="table-responsive">
                            
                                <table id="testds"
                                    class="table table-bordered table-hover no-footer text-nowrap dataTable w-100" >
                                    <thead>
                                        <!-- start row -->
                                        <tr>
                                            <th>ID</th>
                                            <th>Thời gian</th>
                                            <th>Loại</th>
                                            <th>Mã giao dịch</th>
                                            <th>Người chuyển</th>
                                            <th>Thực nhận</th>
                                            <th>Nội dung</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        createDataTable('#testds', '{{ route('user.list.action', 'history-transfer') }}', [{
                data: 'id'
            },
            {
                data: 'created_at'
            },
            {
                data: 'type_bank',
                render: function(data, type, row){
                    return `<span class="badge bg-primary">${data}</span>
                                    `
                }
            },
            {
                data: 'tranid'
            },
            {
                data: 'name_bank'
            },
            {
                data: 'real_amount',
                render: function(data, type, row){
                    return `<b class="text-danger">${formatNumber(data)}</b>
                                    <sup>coin</sup>`
                }
            },
            {
                data: 'note'
            }
        ])
    </script>
@endsection


@endif