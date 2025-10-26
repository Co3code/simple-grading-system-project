let table = new DataTable('#myTable');

window.onload = function () {
    var toasts = document.querySelectorAll('.toast');
    toasts.forEach(function (toast) {
        var toastInstance = new bootstrap.Toast(toast);
        toastInstance.show();
    });
};

