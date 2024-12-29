/*console.log(
    "%c Mua Source: https://www.facebook.com/duykhang2201z %c",
    'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:24px;color:#00bbee;-webkit-text-fill-color:#00bbee;-webkit-text-stroke: 1px #00bbee;',
    "font-size:12px;color:#999999;"
);*/
$(document).ready(function(){
    $('.collapse').on('hide.bs.collapse',function(){
    $(this).parent().find('.fa-angle-down').removeClass('.fa fa-angle-down').addClass('.fa fa-angle-up');});
    $('.collapse').on('show.bs.collapse',function(){
    $(this).parent().find('.fa-angle-up').removeClass('.fa fa-angle-up').addClass('.fa fa-angle-down');});
});

function LOADER(show) {
    if (show == true) {
        $('.order-now').html('<script>Swal.fire({ icon: "warning", title: "Đang xử lý, vui lòng chờ, nghiêm cấm tắt trình duyệt, f5 trang tránh hụt đơn mất tiền!", timer: 180000, timerProgressBar: true, showCancelButton: false, showConfirmButton: false, didOpen: () => { Swal.showLoading(); }, });</script><button class="btn btn-block btn-info btn-lg btn-nw btn-rounded bold" type="button" disabled> Đang xử lý... </button>');
    } else {
        $('.order-now').html('<script>Swal.close();</script><button type="submit" class="btn btn-block btn-primary btn-lg btn-nw btn-rounded bold"><i class="icon ni ni-cart fs-3 me-1"></i>Mua dịch vụ</button>');
    }
}

function copyText(id) {
    var r = document.createRange();
    r.selectNode(document.getElementById(id));
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(r);
    document.execCommand('copy');
    window.getSelection().removeAllRanges();
}

function _processStoriesFB(url) {
    var match = url.match(/stories\/(.*)\/(.*)\//);
    if (match != null && match[1] != null && match[2] != null) {
        return match[1] + '_' + match[2];
    }
    return url;
}

function _processYoutube(url) {
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
    var match = url.match(regExp);
    var value = (match && match[7].length == 11) ? match[7] : false;
    if (!value) {
        var pattern = /^(?:(http|https):\/\/[a-zA-Z-]*\.{0,1}[a-zA-Z-]{3,}\.[a-z]{2,})\/channel\/([a-zA-Z0-9_]{3,})$/;
        var matchs = url.match(pattern);
        if (matchs[2]) {
            return matchs[2];
        }
        return url;
    }
    return value;
}

function _processInstagram(link) {
    LOADER();
    var regExp = /\/p\/(.*?)\//;
    var match = link.match(regExp);
    LOADER(false);
    if (match == null) {
        regExp = /\/reel\/(.*?)\//;
        match = link.match(regExp);
        if (match == null) {
            regExp = /instagram\.com\/(.*?)(\/|\?)/;
            match = link.match(regExp);
            return match != null && match[1] != null ? match[1] : link;
        }
        return match != null && match[1] != null ? match[1] : link;
    }
    return match[1];
}

function _processTikTok(link) {
    LOADER();
    var regExp = /\/video\/(.*?)\//;
    var match = link.match(regExp);
    LOADER(false);
    if (match == null) {
        regExp = /\/reel\/(.*?)\//;
        match = link.match(regExp);
        if (match == null) {
            regExp = /tiktok\.com\/(.*?)(\/|\?)/;
            match = link.match(regExp);
            return match != null && match[1] != null ? match[1] : link;
        }
        return match != null && match[1] != null ? match[1] : link;
    }
    return match[1];
}

function formatNumber(number) {
    if (number >= 1000) {
        return number.toFixed(0).replace(/./g, function(c, i, a) {
            return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
        });
    } else {
        return number;
    }
}

function checkId(url, btn, el) {
    var $url = url,
        $button = btn,
        $this = el;
    loadId();
    $.post('/api/utils/check_id', {
        url: $url,
        key: window.API_KEY
    }, function(result) {
        swal.close();
        $button.removeAttr('disabled');
        if (result.success) {
            $this.val(result.data.id)
            $('#name').val('DEFAULT NAME');
        }
    })
}

$(document).on('click', '.log-out', function(e) {
    e.preventDefault();
    $.ajax({
        url: '/assets/ajax/users/logout.php',
        method: 'GET',
        dataType: 'json'
    }).done(function(response) {
        Swal.fire({ title: "Thông báo",
            text: response.msg,
            icon: "success"
        }).then(okay => {
            if (okay) {
                window.location.href = '/index.php';
            }
        });
    });
});

function loadId() {
    Swal.fire({
        icon: "info",
        title: "Đang get ID...",
        timer: 180000,
        timerProgressBar: true,
        showCancelButton: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        },
    });
}