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
                data: {action: 'change_ship_name', txtShipName: shipName},
                cache: false,
                xhrFields: {
                    withCredentials: true
                },
                success: function (data) {
                    console.log(data);
                    if (data.success) {
                        swal(
                            'SUCCESS!',
                            data.message,
                            'success'
                        );
                    } else {
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

    if ($('#btnSaveUserProfile').length > 0) {
        var button = $('#btnSaveUserProfile');

        button.on('click', function (e) {
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
                    if (data.success) {
                        swal(
                            'SUCCESS!',
                            data.message,
                            'success'
                        );
                    } else {
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

    if ($('#switchClient').length > 0) {
        var switcher = $('#switchClient');

        switcher.on('change', function (e) {
            $.ajax({
                type: "POST",
                url: 'ajax.php',
                data: {action: 'switch_client', value: document.getElementById('switchClient').checked},
                cache: false,
                xhrFields: {
                    withCredentials: true
                },
                success: function (data) {
                    if (data.success) {
                        swal(
                            'SUCCESS!',
                            data.message,
                            'success'
                        );
                    } else {
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


    /* GG */
    $('.ggButton').on('click', function (e) {
        e.preventDefault();
        $('.ggButton').each(function () {
            $(this).removeClass('active');
        });

        $(this).addClass('active');

        $('.ggGatePanel').hide();
        var show_id = $(this).data('id');
        $('.' + show_id).show();

    });


    $('#btnGetGG').on('click', function (e) {
        e.preventDefault();
        var gate_id = $('.ggButton.active').data('gate_id');
        var energy = $('#useEnergy').val();
        $(this).hide();
        $.ajax({
            type: "POST",
            url: 'ajax.php',
            data: {action: 'gg_energy', gate_id: gate_id, energy: energy},
            cache: false,
            xhrFields: {
                withCredentials: true
            },
            success: function (data) {
                $('#btnGetGG').show();
                if (data.success) {
                    $('#ggUridium').html(data.uridium);
                    $('#ggEnergy').html(data.energy);

                    $(data.data).each(function (i, e) {
                        /* e.
                         column: "SAB_50"
                         item_id: 29
                         name: "SAB-50"
                         piece: 300
                         */

                        if (e.name == 'alpha') {
                            var alphaHtml = '<div class="won_item_line"><img src="/resources/images/gg/gate_1_34.png" class="won_item_image"><b class="won_item_name"> Alpha </b><b class="won_item_piece">' + e.piece + '</b></div>';
                            $('#wonItems').prepend(alphaHtml);

                            $('#imgGGAlpha').attr('src', '/resources/images/gg/gate_1_' + e.piece + '.png');
                            $('#ggStatAlpha').html('<small>GG α</small> ' + e.piece + '/34');
                            $('#btnGGAlpha').click(); // Run Click Action
                        }
                        else if (e.name == 'beta') {
                            var betaHtml = '<div class="won_item_line"><img src="/resources/images/gg/gate_2_48.png" class="won_item_image"><b class="won_item_name"> Beta </b><b class="won_item_piece">' + e.piece + '</b></div>';
                            $('#wonItems').prepend(betaHtml);

                            $('#imgGGBeta').attr('src', '/resources/images/gg/gate_2_' + e.piece + '.png');
                            $('#ggStatBeta').html('<small>GG β</small> ' + e.piece + '/48');
                            $('#btnGGBeta').click(); // Run Click Action
                        }
                        else if (e.name == 'gamma') {
                            var gammaHtml = '<div class="won_item_line"><img src="/resources/images/gg/gate_3_82.png" class="won_item_image"><b class="won_item_name"> Gamma </b><b class="won_item_piece">' + e.piece + '</b></div>';
                            $('#wonItems').prepend(gammaHtml);

                            $('#imgGGGamma').attr('src', '/resources/images/gg/gate_3_' + e.piece + '.png');
                            $('#ggStatGama').html('<small>GG γ</small> ' + e.piece + '/82');
                            $('#btnGGGama').click(); // Run Click Action

                        }
                        else if (e.name == 'delta') {
                            var deltaHtml = '<div class="won_item_line"><img src="/resources/images/gg/gate_4_128.png" class="won_item_image"><b class="won_item_name"> Delta </b><b class="won_item_piece">' + e.piece + '</b></div>';
                            $('#wonItems').prepend(deltaHtml);

                            $('#imgGGDelta').attr('src', '/resources/images/gg/gate_4_' + e.piece + '.png');
                            $('#ggStatDelta').html('<small>GG δ</small> ' + e.piece + '/128');
                            $('#btnGGDelta').click(); // Run Click Action
                        }
                        else {
                            // Ammo or Xeno:
                            var imageLoverCase = e.name.toLowerCase();
                            var itemHtml = '<div class="won_item_line"><img src="http://ge1.play.univ3rse.com/do_img/global/items/ammunition/' + e.cat + '/' + imageLoverCase + '_100x100.png" class="won_item_image"><b class="won_item_name">' + e.name + '</b><b class="won_item_piece">(+' + e.piece + ')</b></div>';
                            $('#wonItems').prepend(itemHtml);
                        }

                    });
                } else {
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
                    'Please contact support. Error CODE: G404',
                    'error'
                );
                $('#btnGetGG').show();
            }
        });

    });
});