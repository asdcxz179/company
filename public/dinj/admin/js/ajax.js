// Ajax 攔截器
$.ajaxSetup({
    beforeSend: () => {
        $('#loading').show();
    },
    complete: () => {
        $('#loading').hide();
    },
    error: function (event, request, settings) {
        switch (settings.toastType) {
            case 'toastr':
            default:
                this.toastr(event);
                break;
            case 'toast':
                this.toast(event);
                break;
        }
    },
    toastr: function (request) {
        switch (request.status) {
            case 401:
                var isLogin = window.location.pathname == '/Admin/Login';
                toastr.options = {
                    "hideDuration": "500",
                    "onHidden": function () {
                        if(!isLogin) {
                            location.href = "/Admin/Login";
                        }
                    }
                };
                if(isLogin) {
                    $('.captcha img').click();
                }
                toastr.error(request.responseJSON.message);
                break;
            case 403:
                toastr.options = {
                    "hideDuration": "1000",
                };
                toastr.warning("權限不足，請聯繫管理人員");
                break;
            case 422:
                toastr.options = {
                    "hideDuration": "1000",
                };
                toastr.warning(request.responseJSON.message);
                break;
            default:
                toastr.options = {
                    "hideDuration": "1000",
                };
                toastr.error("系統錯誤，請聯繫技術人員");
                break;
        }
    },
    toast: function (request) {
        switch (request.status) {
            case 401:
                Toast.error("您已被登出，請重新登入").then(() => location.href = "/Admin/Login");
                break;
            case 403:
                Toast.warning("權限不足，請聯繫管理人員");
                break;
            case 422:
                toastr.options = {
                    "hideDuration": "1000",
                };
                toastr.warning(request.message);
                break;
            default:
                Toast.error("系統錯誤，請聯繫技術人員");
                break;
        }
    },
});

const ResponseHandle = function (data) {
    toastr.options = {
        "showDuration": 500,
        "hideDuration": 500,
    };
    toastr.success(data.message);
}

function sendApi(path, method, data, callback = ResponseHandle) {
    return $.ajax({
        url: `${apiUrl}${path}`,
        type: method,
        data: data,
        dataType: "JSON",
        success: function (data) {
            callback(data);
        }
    });
}

function makeDataTable(element, path, method, data, columns, drawCallback, orderData={}) {
    return $(element).DataTable({
        ajax: {
            url: `${apiUrl}${path}`,
            type: method,
            data: data??{},
            dataFilter: function(data) {
                var json = JSON.parse( data );
                return JSON.stringify(json.data.original);
            }
        },
        searching: false,
        ordering: orderData.ordering??false,
        order: orderData.order??[],
        serverSide: true,
        language: {
            processing: "處理中...",
            loadingRecords: "載入中...",
            lengthMenu: "顯示 _MENU_ 項結果",
            zeroRecords: "沒有符合的結果",
            info: "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
            infoEmpty: "顯示第 0 至 0 項結果，共 0 項",
            infoFiltered: "(從 _MAX_ 項結果中過濾)",
            infoPostFix: "",
            search: "搜尋:",
            paginate: {
                "first": "第一頁",
                "previous": "上一頁",
                "next": "下一頁",
                "last": "最後一頁"
            },
            aria: {
                "sortAscending": ": 升冪排列",
                "sortDescending": ": 降冪排列"
            }
        },
        drawCallback: drawCallback,
        columns: columns,
    });
}

function sendForm(element, path, method, callback) {
    $(element).submit(function () {
        if (typeof ($(this).parsley) != "undefined" && !$(this).parsley().validate()) {
            return false;
        }
        let button = $(this).find('button[type=submit]');
        button.attr('disabled', true);
        $(this).find('button[type=submit]').attr('disabled', true)
        sendApi(path, method, $(this).serialize(), callback).error(() => {
            button.attr('disabled', false);
        });
        return false;
    });
}

function setForm(element, data, callback) {
    Object.keys(data).map(item => {
        let type = $(`${element} [name=${item}]`).prop("type");
        if (type) {
            switch (type) {
                case "radio":
                    $(`${element} [name=${item}][value="${data[item]}"]`).prop('checked', true);
                    break;
                default:
                    $(`${element} [name=${item}]`).val(data[item]);
                    break;
            }
        }
    });
    if (typeof callback == "function") {
        callback(data);
    }
}
