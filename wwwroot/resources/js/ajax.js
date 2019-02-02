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
            if (successCallback !== null) successCallback();
            if (data !== null) {
                swal('Success!', data.message, 'success');
            }
        },
        error: function (errorData, _, errorThrown) {
            if (errorCallback !== null) errorCallback();
            if (data !== null) {
                swal(
                    errorThrown + '!',
                    errorData.responseJSON.message || errorThrown,
                    'error'
                );
            }
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
