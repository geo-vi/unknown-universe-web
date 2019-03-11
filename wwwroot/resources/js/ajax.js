function sendCoreRequest(handler, action, params, successCallback = null, errorCallback = null) {
    let data = {
        'handler': handler,
        'action': action,
        'params': params
    };

    $.ajax({
        type: "POST",
        url: '/core/ajax/ajax.php',
        data: data,
        cache: false,
        xhrFields: {
            withCredentials: true
        },
        success: function (data) {
            if (successCallback !== null) successCallback(data);
            if (data !== null) {
                swal('Success!', data.message, 'success');
            }
        },
        error: function (errorData, _, errorThrown) {
            if (errorCallback !== null) errorCallback(errorData);
            if (errorData !== null) {
                swal(
                    errorThrown + '!',
                    errorData.responseJSON.message || errorThrown,
                    'error'
                );
            }
        }
    });
}

function sendQuietRequest(handler, action, params, successCallback = null, errorCallback = null) {
    let data = {
        'handler': handler,
        'action': action,
        'params': params
    };

    $.ajax({
        type: "POST",
        url: '/core/ajax/ajax.php',
        data: data,
        cache: false,
        xhrFields: {
            withCredentials: true
        },
        success: function (data) {
            if (successCallback !== null) successCallback(data);
        },
        error: function (errorData, _, errorThrown) {
            if (errorCallback !== null) errorCallback(errorData);
        }
    });
}

function sendRegisterRequest(params, errorCallback = null) {
    $.ajax({
        type: "POST",
        url: 'register.php',
        data: params,
        cache: false,
        xhrFields: {
            withCredentials: true
        },
        success: function (data) {
            if (data !== null) {
                swal('Success!', data.message, 'success');
            }
        },
        error: function (errorData, _, errorThrown) {
            if (errorCallback !== null) errorCallback();
            if (errorData !== null) {
                swal(
                    errorThrown + '!',
                    errorData.responseJSON.message || errorThrown,
                    'error'
                );
            }
        }
    });
}

$(document).ready(function () {

    if ($('#changeName').length > 0) {
        var button = $('#changeName');

        button.on('click', function (e) {
            e.preventDefault();

            var shipName = $('#txtShipName').val();
            $.ajax({
                type: "POST",
                url: 'ajax.php',
                data: {action:'change_ship_name',txtShipName:shipName},
                cache: false,
                xhrFields: {
                    withCredentials: true
                },
                success: function (data) {
                    console.log(data);
                    if(data.success){
                        swal(
                            'SUCCESS!',
                            data.message,
                            'success'
                        );
                    }else{
                        swal(
                            'ERROR!',
                            data.message,
                            'error'
                        );
                    }
                },
                error: function (errorData, _, errorThrown) {
                    swal(
                        'ERROR!',
                        'Please contact support. Error CODE: A404',
                        'error'
                    );
                }
            });

        });
    }

    if($('#btnSaveUserProfile').length>0){
        var button = $('#btnSaveUserProfile');

        button.on('click',function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: 'ajax.php',
                data: $('#frmAccountInfo').serialize(),
                cache: false,
                xhrFields: {
                    withCredentials: true
                },
                success: function (data) {
                    console.log(data);
                    if(data.success){
                        swal(
                            'SUCCESS!',
                            data.message,
                            'success'
                        );
                    }else{
                        swal(
                            'ERROR!',
                            data.message,
                            'error'
                        );
                    }
                },
                error: function (errorData, _, errorThrown) {
                    swal(
                        'ERROR!',
                        'Please contact support. Error CODE: A404',
                        'error'
                    );
                }
            });
        });
    }
});