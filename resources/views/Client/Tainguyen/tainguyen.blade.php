@extends('Layout.App')
@section('title', $category->name)
@section('content')


<div class="pt-5">
    <div class="mb-3 rounded-lg bg-danger p-2 text-center text-xl">
        <div class="text-white">Vui lòng kiểm tra tài nguyên ngay sau khi mua </div>

    </div>
    <div class="grid grid-cols-1 gap-5 xl:grid-cols-3">

        <div class="panel xl:col-span-3">
            <div class="mb-5 flex items-center justify-between">
                <h5 class="text-lg font-semibold dark:text-white-light">Danh sách các tài nguyên hiện có</h5>
            </div>
            <div>
            <div class="mb-6 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
            @foreach ($tainguyen as $item)
                <form class="space-y-3 " action="{{ route('api.chuyenmuc.order', ['chuyenmuc' => $category->slug]) }}"
                    method="POST" request="ptl">


                   
                     
                        <input name="id_tainguyen"  value="{{ $item->id }}"    hidden>
                        <div class="panel h-full border border-[#e0e6ed]">
                            <div
                                class="-m-5 mb-5 flex items-center justify-between border-b border-[#e0e6ed] p-5 dark:border-[#1b2e4b]">
                                <div class="flex">
                                    <div class="media-aside align-self-start">
                                        <div
                                            class="shrink-0 rounded-full ring-2 ring-white-light ltr:mr-4 rtl:ml-4 dark:ring-dark">
                                            <img src="{{ $item->image }}" alt="image"
                                                class="h-10 w-10 rounded-full object-cover">
                                        </div>
                                    </div>
                                    <div class="font-semibold">
                                        <h6>{{ $item->name }}</h6>
                                        <!-- <p class="mt-1 text-xs text-white-dark">{{ $item->created_at }}</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="pb-8 text-center font-semibold">
                                <div class="group">
                                    <div class="mb-5">
                                        <div class="text-white-dark">
                                            {!! $item->description !!}
                                        </div>
                                    </div>

                                    <div class="flex items-end justify-between ">
                                        <div
                                            class="flex items-center rounded-full bg-danger/20 px-2 py-1 text-xs font-semibold text-danger">

                                            Hiện có:
                                            {{count(array_filter(explode("\n", trim($item->thongtin)), 'strlen'))}}
                                        </div>
                                        <div
                                            class="flex items-center rounded-full bg-info/20 px-2 py-1 text-xs font-semibold text-info">

                                            Đã bán: {{ $item->daban}}
                                        </div>
                                        <div
                                            class="flex items-center rounded-full bg-warning/20 px-2 py-1 text-xs font-semibold text-warning">

                                            {{ number_format(priceServer1($item->id, Auth::user()->level))}} đ / 1
                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="flex">
                                
                                @if(count(array_filter(explode("\n", trim($item->thongtin)), 'strlen')) >0)

                                <input type="text" onkeyup="bill()" class="form-input ltr:rounded-r-none rtl:rounded-l-none"
                                    name="quantity" placeholder="Số lượng">
                                <div
                                    class="flex cursor-pointer items-center justify-center border border-[#e0e6ed] bg-primary px-3 font-semibold ltr:rounded-r-md ltr:border-l-0 rtl:rounded-l-md rtl:border-r-0 dark:border-[#17263c]">
                                    <button type="submit" class="btn btn-primary w-full"
                                        show="Bạn có muốn thanh toán đơn hàng?, chúng tôi sẽ không hoàn tiền với đơn đã thanh toán."><i
                                            class="fa fa-shopping-cart"></i> Mua</button>
                                </div>
                                @else
                                <button type="submit" class="btn btn-primary w-full" disabled><i
                                        class="fa fa-shopping-cart"></i> Hết hàng</button>
                                @endif
                            </div>

                        </div>
                        
                      
                  

                </form>
                @endforeach
                </div>

            </div>
        </div>

        <div class="panel xl:col-span-3">
            <div class="mb-5 flex items-center justify-between">
                <h5 class="text-lg font-semibold dark:text-white-light">Lịch Sử Mua Hàng </h5><button
                    class="btn btn-primary" onclick="TabControl()"><svg focusable="false" class="" data-icon="reload"
                        width="1em" height="1em" fill="currentColor" aria-hidden="true" viewBox="64 64 896 896">
                        <path
                            d="M909.1 209.3l-56.4 44.1C775.8 155.1 656.2 92 521.9 92 290 92 102.3 279.5 102 511.5 101.7 743.7 289.8 932 521.9 932c181.3 0 335.8-115 394.6-276.1 1.5-4.2-.7-8.9-4.9-10.3l-56.7-19.5a8 8 0 00-10.1 4.8c-1.8 5-3.8 10-5.9 14.9-17.3 41-42.1 77.8-73.7 109.4A344.77 344.77 0 01655.9 829c-42.3 17.9-87.4 27-133.8 27-46.5 0-91.5-9.1-133.8-27A341.5 341.5 0 01279 755.2a342.16 342.16 0 01-73.7-109.4c-17.9-42.4-27-87.4-27-133.9s9.1-91.5 27-133.9c17.3-41 42.1-77.8 73.7-109.4 31.6-31.6 68.4-56.4 109.3-73.8 42.3-17.9 87.4-27 133.8-27 46.5 0 91.5 9.1 133.8 27a341.5 341.5 0 01109.3 73.8c9.9 9.9 19.2 20.4 27.8 31.4l-60.2 47a8 8 0 003 14.1l175.6 43c5 1.2 9.9-2.6 9.9-7.7l.8-180.9c-.1-6.6-7.8-10.3-13-6.2z">
                        </path>
                    </svg> </button>
            </div>

            <div class="table-responsive">
                <table class="datatable table-responsive whitespace-nowrap text-center font-bold" id="history-order1">
                    <thead class="ant-table-thead">
                        <tr>
                            <th>ID</th>
                            <th>Mã đơn hàng</th>
                            <th style="margin-left: 0px; width: 900px;">Thông tin</th>

                            <th>Tổng thanh toán</th>

                            <th>Thời gian</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
@section('script')

<script>
function TabControl() {

    createDataTable('#history-order1', '{{ route('user.list.action', 'tainguyen-order') }}', [{
                data: 'id'
            },
            {
                data: 'order_codes',
                render: function(data, type, row) {
                    return `
                        <div class="cursor-pointer" style="color: rgb(23, 89, 74);" id="${data}" onclick="coppy('${data}');">
                           ${data}
                        </div>
                    `;
                }


            },

            {
                data: 'thongtin',
                render: function(data, type, row) {
                    return `<div class="flex  "><textarea class="form-input note" rows="4" readonly="" id="${data}" onclick="coppy1('${data}');" style="min-width: 200px;">${data}</textarea>

                    <button
                    class="btn btn-primary" id="${data}" onclick="coppy1('${data}');">Copy</button></div>
                    `;
                }
            },


            {
                data: 'total_payment',
                render: function(data, type, row) {
                    return `
                          <b style="color: rgb(29, 38, 125);">${formatNumber(data)} ₫</b> 
                    `;
                }
            },



            {
                data: 'created_at',
                render: function(data, type, row) {
                    return `
                          <b style="color: rgb(183, 19, 117);">${data} </b> 
                    `;
                }
            }
        ])
}



document.addEventListener('DOMContentLoaded', function() {
    TabControl();
});
swal1('Vui lòng kiểm tra tài nguyên ngay sau khi mua!');
</script>
<script>
    function bill() {
            var server_service = $('input[name="id_tainguyen"]:checked');
            var price = server_service.attr('price');
          
            var quantity = $('input[name="quantity"]');
        
            var total_payment = Math.round(price * quantity) ?? 0;
            var exchangeRate = 24000;
            var total_payment_usdt = (total_payment / exchangeRate).toFixed(2);
            $('#lamtilo_huong').html(`<span class="text-lg font-bold">Tổng thanh toán [<b class="text-danger">${price} đ</b> / lượt]  </span> `);
            $('#total_payment').html(`<h2 class="text-4xl font-bold"><b class="text-primary">${formatNumber(total_payment)} ₫ |</b><b class="text-danger"> $ ${formatNumber(total_payment_usdt)}</b></h2> `);
        }
        $(document).ready(function() {
            bill();
        })

    </script>

@endsection