console.log(
    "%c Code by: Phạm Trọng Lâm %c",
    'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:24px;color:#00bbee;-webkit-text-fill-color:#00bbee;-webkit-text-stroke: 1px #00bbee;',
    "font-size:12px;color:#999999;"
);
console.log(
    "%c Contact: https://www.facebook.com/phamtronglamdeptrainhat %c",
    'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:24px;color:#00bbee;-webkit-text-fill-color:#00bbee;-webkit-text-stroke: 1px #00bbee;',
    "font-size:12px;color:#999999;"
);
console.log(
    "%c Xin vui lòng tôn trọng tác giả, không tôn trọng thì cút %c",
    'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:24px;color:#00bbee;-webkit-text-fill-color:#00bbee;-webkit-text-stroke: 1px #00bbee;',
    "font-size:12px;color:#999999;"
);
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            "Api-Token": $('meta[name="api-token"]').attr("content"),
        },
    });

    $('[data-toggle="tooltip"]').tooltip();
    $("form[request=ptl]").submit(function (e) {
        e.preventDefault();
        let _this = this;
        let url = $(_this).attr("action");
        let method = $(_this).attr("method");
        let href = $(_this).attr("href");
        let api_token = $(_this).attr("api_token");
        let data = $(_this).serialize();
        let button = $(_this).find("button[type=submit]");
        if (button.attr("show")) {
            Swal.fire({
                title: "Xác nhận thanh toán!",
                text: button.attr("show"),
                icon: "warning",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonText: "Thanh Toán",
                cancelButtonText: "Hủy",
              
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: "info",
                        title: "Đang xử lý, vui lòng chờ trong giây lát!",
                        timer: 180000,
                        timerProgressBar: true,
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: true,
                        didOpen: () => {
                            Swal.showLoading();
                        },
                    });
                    submitForm(url, method, href, api_token, data, button);
                }
            });
        } else {
            submitForm(url, method, href, api_token, data, button);
        }
    });
});

function submitForm(url, method, href, api_token, data, button) {
    let textButton = button.html().trim();
    let setting = {
        type: method,
        url,
        data,
        dataType: "json",
        beforeSend: function () {
            button
                .prop("disabled", true)
                .html(
                    ' Đang xử lý...'
                );
        },
        complete: function () {
            button.prop("disabled", false).html(textButton);
        },
        success: function (response) {
            if (!response.status || !response.message) {
                swal1("Lỗi hệ thống", "error");
            }
            if (button.attr("callback")) {
                window[`${button.attr("callback")}`](response);
            }
            swal1(
                response.message,
                response.status === "success" ? "success" : "error"
            );
            // if (response.status === "success" && !button.attr("href")) {
            //     setTimeout(() => {
            //         if (!href) {
            //             window.location.reload();
            //             return;
            //         }
            //         window.location.href = href;
            //     }, 2000);
            // }
        },
        error: function (error) {
            swal1(
                "Đã có lỗi không mong muốn xảy ra vui lòng thử lại sau!",
                "error"
            );
            button.prop("disabled", false).html(textButton);
        },
    };
    if (api_token) {
        setting["headers"] = {
            "Api-Token": api_token,
        };
    }
    $.ajax(setting);
}

function swal1(text, icon) {
    if (icon == "success") {
        Swal.fire({
            heightAuto: false,
            icon,
            title: `Thông báo`,
             html:
            `
        ${text}
        `,
            confirmButtonText: "Tôi đã hiểu",
            /* style bootstrap */
            
        }).then(() => {
            window.location.reload();
        });
    } else {
        Swal.fire({
            heightAuto: false,
            icon,
            title: "Thông báo",
             html:
            `
        ${text}
        `,
            confirmButtonText: "Tôi đã hiểu",
       
        });
    }
}
function swa1(text, icon) {
    if (icon == "success") {
        Swal.fire({
            heightAuto: false,
            icon,
            title:"Thông báo",
            html:
            `
        ${text}
        `,
            confirmButtonText: "Tôi đã hiểu",
            /* style bootstrap */
          
        }) ;
    } else {
        Swal.fire({
            heightAuto: false,
            icon,
            title: "Thông báo",
            text: text,
            confirmButtonText: "Tôi đã hiểu",
          
        });
    }
}
function swalConfirm(text, status) {
    Swal.fire({
        title: "Thông báo",
        text: text,
        icon: status,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Đồng ý",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.reload();
        }
    });
}

function getTime() {
    return parseInt(new Date().getTime() / 1000);
}

function wait(t, e, n) {
    return e
        ? $(t).prop("disabled", !1).html(n)
        : $(t)
              .prop("disabled", !0)
              .html(
                  '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý...'
              );
}

function formatNumber(nStr, decSeperate = ".", groupSeperate = ",") {
    nStr += "";
    x = nStr.split(decSeperate);
    x1 = x[0];
    x2 = x.length > 1 ? "." + x[1] : "";
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, "$1" + groupSeperate + "$2");
    }
    return x1 + x2;
}

function coppy(element) {
    window.getSelection().removeAllRanges();
    let range = document.createRange();
    range.selectNode(
        typeof element === "string" ? document.getElementById(element) : element
    );
    window.getSelection().addRange(range);
    document.execCommand("copy");
    window.getSelection().removeAllRanges();
    // swal("Sao chép thành công " + range, "success");
    swa1(`Sao chép thành công `, "success");
    
}
function coppy1(text) {
    // Thay thế tất cả ký tự xuống dòng bằng dãy ký tự xuống dòng HTML
    const formattedText = text.split('\n').join('<br>');

    navigator.clipboard.writeText(formattedText)
        .then(() => {
            swa1(`Sao chép thành công `, "success");
        })
        .catch((err) => {
            console.error('Không thể sao chép văn bản: ', err);
        });
}


function timeCreated(date) {
    return moment(date).format("YYYY-MM-DD HH:mm:ss");
}

function isURL(str) {
    var regex =
        /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
    var pattern = new RegExp(regex);
    return pattern.test(str);
}
function createDataTable(element, url, columns, order = []) {
    $(element).DataTable().destroy();
    $(document).ready(function () {
        $(element).DataTable({
            processing: true,
            serverSide: true,
            pageLength: 5,
            responsive: false,
            scrollX: true,
            scrollY: true,
            ajax: {
                url: url,
                type: "POST",
                error: function (xhr, error, code) {
                    console.log(xhr);
                    console.log(error);
                    console.log(code);
                }, 
            },
            columns: columns.map(column => {
                if (column.data === 'created_at' || column.data === 'update_at') {
                    column.render = function (data) {
                        var formattedDate = moment(data).format('HH:mm:ss  DD/MM/YYYY');
                        return `
                        <span style="color: rgb(183, 19, 117);">${formattedDate} </span> 
                  `;
                    };
                }
                // Tắt tính năng tìm kiếm cho tất cả các cột
                // column.searchable = false;
                return column;
            }),
            order: order,
            language: {
                search: "Tìm kiếm:",
                lengthMenu: "Hiển thị _MENU_ bản ghi",
                info: "Hiển thị _START_ đến _END_ của _TOTAL_ bản ghi",
                infoEmpty: "Không có bản ghi nào",
                infoFiltered: "(Lọc từ _MAX_ bản ghi)",
                zeroRecords: "Không tìm thấy bản ghi nào phù hợp",
                paginate: {
                    first: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg>`,
                    last: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg>`,
                    next: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg>`,
                    previous: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg>`,
                },
            },
            // Ẩn thanh tìm kiếm
            // dom: 'lrtip',
        });
    });
}

function showDetailServer(text) {
    let detail = text.attr("detail");
    // chỉ hiển thị khi chọn máy chủ
    if (detail) {
        $("#loadQuantity").html(
            "Tối thiểu " +
                formatNumber(text.attr("min")) +
                " - Tối đa " +
                formatNumber(text.attr("max"))
        );
        $("#detail_server").html(`
            <div class="alert alert-danger bg-danger">
                <p class="fw-bold text-white ">- ${detail}</p>
            </div>
        `);
    }
}
function callAjax(url, data) {
    return new Promise(function (resolve, reject) {
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            dataType: "json",
            success: function (res) {
                resolve(res);
            },
            error: function (err) {
                reject(err);
            },
        });
    });
}
// make function getCookie
function getCookie(name) {
    var cookieValue = null;
    if (document.cookie && document.cookie != "") {
        var cookies = document.cookie.split(";");
        for (var i = 0; i < cookies.length; i++) {
            var cookie = jQuery.trim(cookies[i]);
            // Does this cookie string begin with the name we want?
            if (cookie.substring(0, name.length + 1) == name + "=") {
                cookieValue = decodeURIComponent(
                    cookie.substring(name.length + 1)
                );
                break;
            }
        }
    }
    return cookieValue;
}

// make function setCookie
function setCookie(name, value, time) {
    var date = new Date();
    date.setTime(date.getTime() + time * 24 * 60 * 60 * 1000);
    var expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

const ttGetUsername = function (elm) {
    setTimeout(() => {
        let link = $("[name=" + elm + "]").val();
        if (!isURL(link)) {
            $("#buy").prop("disabled", false);
            return;
        }
        $("[name=" + elm + "]")
            .prop("disabled", true)
            .val("Đang xử lý");
        let username = link["match"](/tiktok.com\/@([a-zA-Z0-9_.-]+)/);
        if (username) {
            username = username[1];
            $("[name=" + elm + "]")
                .prop("disabled", false)
                .val(username);
        } else {
            $("[name=" + elm + "]")
                .prop("disabled", false)
                .val("");
        }
        $("#buy").prop("disabled", false);
    }, 100);
}

function actionType(action) {
    if (action == 'get-uid') {
        var link_order = $('input[name="link_order"]').val();
        if (!link_order) {
            toastr.error('Vui lòng nhập link đơn hàng');
        }
        if (isURL(link_order)) {
            $.ajax({
                url: '/api/tool/get-uid',
                type: 'POST',
                data: {
                    link: link_order,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                beforeSend: function() {
                    $('input[name="link_order"]').prop("disabled", true).val('Đang get id');
                },
                complete: function() {
                    Swal.close();
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $('input[name="link_order"]').prop("disabled", false).val(data.uid);
                        Swal.close();
                    } else {
                        $('input[name="link_order"]').prop("disabled", false).val('Không xác định');
                        toastr.error(data.message);
                    }
                },
                error: function() {
                    toastr.error('Đã có lỗi xảy ra, vui lòng thử lại sau');
                }
            })
        }
    }else if(action == 'get-username-tiktok'){
        var link_order = $('input[name="link_order"]').val();
        if (!link_order) {
            toastr.error('Vui lòng nhập link đơn hàng');
        }
        ttGetUsername('link_order');
    }
}

function orderRefund(id){
    Swal.fire({
        title: 'Xác nhận hoàn tiền',
        text: 'Bạn có chắc chắn muốn hoàn tiền đơn hàng này? Nếu hoàn sẽ trừ 1.000 Vnđ trong tài khoản của bạn!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        // chờ 3s mới được nhấn nút đồng ý
        timer: 3000,
        timerProgressBar: true,
        allowOutsideClick: false,
        allowEscapeKey: false,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/api/order/refund',
                type: 'POST',
                data: {
                    order_id: id,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                beforeSend: function() {
                    Swal.fire({
                        title: 'Đang xử lý',
                        html: 'Vui lòng chờ...',
                        didOpen: () => {
                            Swal.showLoading()
                        },
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false
                    });
                },
                complete: function() {
                    Swal.close();
                },
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success(data.message);
                    } else {
                        toastr.error(data.message);
                    }
                },
                error: function() {
                    toastr.error('Đã có lỗi xảy ra, vui lòng thử lại sau');
                }
            })
        }
    })
}

function orderWarranty(id){
    Swal.fire({
        title: 'Xác nhận bảo hành',
        text: 'Bạn có chắc chắn muốn bảo hành đơn hàng này? Tuỳ máy chủ sẽ được bảo hành!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        // chờ 3s mới được nhấn nút đồng ý
        timer: 3000,
        timerProgressBar: true,
        allowOutsideClick: false,
        allowEscapeKey: false,
    }).then((result) => {
        if (result.isConfirmed) { 
            $.ajax({
                url: '/api/order/warranty',
                type: 'POST',
                data: {
                    order_id: id,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                beforeSend: function() {
                    Swal.fire({
                        title: 'Đang xử lý',
                        html: 'Vui lòng chờ...',
                        didOpen: () => {
                            Swal.showLoading()
                        },
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false
                    });
                },
                complete: function() {
                    Swal.close();
                },
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success(data.message);
                    } else {
                        toastr.error(data.message);
                    }
                },
                error: function() {
                    toastr.error('Đã có lỗi xảy ra, vui lòng thử lại sau');
                }
            })
        }
    })
}
function orderGiahan(id){
    Swal.fire({
        title: 'Xác nhận gia hạn',
        text: 'Bạn có chắc chắn muốn gia hạn đơn hàng này? Hệ thống mặc định gia hạn thêm 30 ngày!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        // chờ 3s mới được nhấn nút đồng ý
        timer: 3000,
        timerProgressBar: true,
        allowOutsideClick: false,
        allowEscapeKey: false,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/api/order/giahan',
                type: 'POST',
                data: {
                    order_id: id,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                beforeSend: function() {
                    Swal.fire({
                        title: 'Đang xử lý',
                        html: 'Vui lòng chờ...',
                        didOpen: () => {
                            Swal.showLoading()
                        },
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false
                    });
                },
                complete: function() {
                    Swal.close();
                },
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success(data.message);
                    } else {
                        toastr.error(data.message);
                    }
                },
                error: function() {
                    toastr.error('Đã có lỗi xảy ra, vui lòng thử lại sau');
                }
            })
        }
    })
}


toastr.options = {
   
    "toastClass": "toast rounded-3 py-4",
    
}
