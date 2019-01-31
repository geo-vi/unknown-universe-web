function sendCoreRequest(handler, action, params, successCallback = null, errorCallback = null) {
    let data = {
        'handler': handler,
        'action': action,
        'params': params
    };

    console.debug('sendCoreRequest', data);

    $.ajax({
        type: "POST",
        url: '/core/ajax/ajax.php',
        data: data,
        cache: false,
        // xhrFields: {
        //     withCredentials: true
        // },
        success: function (data) {
            if (successCallback !== null) successCallback();
            if (data !== null) {
                swal('Success!', data.message, 'success');
            }
        },
        error: function (errorData, _, errorThrown) {
            if (errorCallback !== null) errorCallback();
            if (data !== null) {
                console.debug(errorData);
                swal(
                    errorThrown + '!',
                    errorData.responseJSON.message || errorThrown,
                    'error'
                );
            }
        }
    });
}
