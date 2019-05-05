let ws = undefined;

function connect() {
    ws = new WebSocket("ws://dev.univ3rse.com:666/cmslistener");

    ws.onclose = function(e) {
        console.log('Socket is closed. Reconnect will be attempted in 1 second.', e.reason);
        setTimeout(function() {
            connect();
        }, 1000);
    };

    ws.onerror = function(err) {
        console.error('Socket encountered error: ', err.message, 'Closing socket');
        ws.close();
    };
}

connect();

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

function sendGamePacket(packet) {
    console.log(packet);
    setTimeout(function () {
        if (ws.readyState === 1) {
            ws.send(packet);
        } else {
            sendGamePacket(packet);
        }
    }, 2000);
}