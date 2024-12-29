const swalConfirm = function (text,type="error") {
    var color;
    var icon;
    switch (type) {
        case 'success':
            color = 'success';
            icon = 'ri-check-double-line';
            break;
        case 'error':
            color = 'danger';
            icon = 'ri-close-circle-fill';
            break;
        case 'info':
            color = 'info';
            icon = 'ri-information-line';
            break;
        case 'warning':
            color = 'warning';
            icon = 'ri-error-warning-fill';
            break;
        default:
            color = 'dark';
            icon = 'ri-notification-line';
            break;
    }
    return new Promise((resolve, reject) => {
        Swal.fire({
            html:
                `<div class="avatar avatar-icon avatar-soft-${color} mb-3"><span class="initial-wrap rounded-8"><i class="${icon}"></i></span></div>
        <div>
            <h4>Thông báo xác nhận!</h4>
            <p>${text}</p>
        </div>`,
            customClass: {
                confirmButton: 'btn btn-outline-secondary text-success',
                cancelButton: 'btn btn-outline-secondary text-danger',
                container: 'swal2-has-bg',
                content: 'bg-transparent border-bottom text-center',
            },
            showClass: {
                popup: 'animated fadeInDown faster'
            },
            hideClass: {
                popup: 'animated fadeOutUp faster'
            },
            showCancelButton: true,
            buttonsStyling: false,
            showCloseButton: true,
            confirmButtonText: 'Tôi đồng ý',
            cancelButtonText: 'Đóng',
            reverseButtons: true,
        }).then((result) => {
            return resolve(result.value);
        })
    });
}