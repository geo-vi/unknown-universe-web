class skylab
{
    constructor(USER_ID, PLAYER_ID) {
        skylab.USER_ID = USER_ID;
        skylab.PLAYER_ID = PLAYER_ID;
        skylab.time = 0;
        skylab.transportDirection = 'toship';
        skylab.render();
    }

    static render(data = null) {
        if (data === null) {
            skylab.showShadow();
            skylab.sendRequest('render', 'load');
        }
        else {
            if (data['PROMETIUM_COLLECTOR'] === false) {
                this.unreadyCollector('PrometiumCollector');
            }
            if (data['ENDURIUM_COLLECTOR'] === false) {
                this.unreadyCollector('EnduriumCollector');
            }
            if (data['TERBIUM_COLLECTOR'] === false) {
                this.unreadyCollector('TerbiumCollector');
            }
            if (data['PROMETID_COLLECTOR'] === false) {
                this.unreadyCollector('PrometidRefinery');
            }
            if (data['DURANIUM_COLLECTOR'] === false) {
                this.unreadyCollector('DuraniumRefinery');
            }
            if (data['XENOMIT_MODULE'] === false) {
                this.unreadyCollector('XenoModule');
            }
            if (data['PROMERIUM_COLLECTOR'] === false) {
                this.unreadyCollector('PromeriumRefinery');
            }
            if (data['SEPROM_COLLECTOR'] === false) {
                this.unreadyCollector('SepromRefinery');
            }

            $('.cost').html('FREE');

            $('.skylab_module_close').click(function () {
                skylab.closeAllModules();
            });

            $('#to_skylab').click(function() {
                skylab.switchTransportDirection('tolab');
            });

            $('#to_ship').click(function() {
                skylab.switchTransportDirection('toship');
            });
            skylab.hideShadow();
        }

    }

    static closeAllModules() {
        $('.module_large').hide();
        skylab.hideShadow();
    }

    static showModule(moduleName) {
        var module = $('#module_' + moduleName + '_large');

        this.closeAllModules();
        module.show();

        // if (false === this.listenerInit && 'transportModule' == moduleName) {
        //     this.addTransportListener();
        //     this.listenerInit = true;
        // }

        // automatically show upgrade if running
        if ($('#module_' + moduleName + '_small').hasClass('upgrading')) {
            module.find('.skylab_module_tabs').children()
                .eq(module.find('.progress_timer').closest('.tabContent').index()).click();
        }

        skylab.showShadow();
    }

    static showShadow() {
        $('#skylab_shadow').show();
    }

    static hideShadow() {
        $('#skylab_shadow').hide();
    }

    static readyCollector(collectorName) {
    }

    static unreadyCollector(collectorName) {
        $('#background'+collectorName).hide();
        $('#uplink' + collectorName).hide();
        let boxName = collectorName.charAt(0).toLowerCase() + collectorName.slice(1);
        let box = $('#module_'+ boxName +'_small');
        let topLeft = box.find('#corner_small_top_left_active').attr('id', 'corner_small_top_left_inactive');
        topLeft.children('.name').removeClass('name').addClass('name_inactive');
        box.find('#corner_small_top_right_active').attr('id', 'corner_small_top_right_inactive');
        let bottomLeft = box.find('#corner_small_bottom_left_active').attr('id', 'corner_small_bottom_left_inactive');
        bottomLeft.children('table').hide();
        box.find('#corner_small_bottom_right_active').attr('id', 'corner_small_bottom_right_inactive');
    }

    static changeToTab(tabID, container) {
        var containerId = '#module_infobox_' + container;
        var contentId   = containerId;
        var container   = $(containerId);
        var tab         = container.find('.tab_' + tabID);

        if (tab.hasClass('tab_active')) {
            return null;
        }

        switch (tabID) {
            case 'first':
                contentId += '_overview_large';
                break;
            case 'second':
                contentId += '_upgrade_large';
                break;
            case 'third':
                contentId += '_productivity_large';
                break;
            default:
                return null;
        }

        tab.addClass('tab_active').siblings().removeClass('tab_active');
        $(contentId).show().siblings().hide();
    }

    static reload() {
        this.showShadow();
    }

    static checkTransportTime(value, isPremium) {
        var countElements = 0;

        var elements = $('#sendTransport').find('input[type=text]');

        elements.each(function () {
            if (isNaN(parseInt($(this).val())) === false) {
                countElements = countElements + parseInt($(this).val());
            }
        });

        // if (isNaN(parseInt(prometium.val())) === false) {
        //     countElements = countElements + parseInt(prometium.val());
        // }
        //
        // console.log(prometium.val());
        // premium users has the half transport time.
        if (isPremium == true) {
            countElements = countElements / 2;
        }

        this.time = (countElements * value);

        var h = Math.floor(this.time / 60);
        var m = Math.round(this.time % 60);

        if (m < 10) {
            m = "0" + m;
        }

        if (m == 60) {
            m = '00';
            h = h + 1;
        }

        // if you send less then 5 item the time would be 0.
        if (countElements > 0 && h == 0 && m == 0) {
            m = "01";
        }

        console.log(countElements);

        if (countElements > 0) {
            $('#timeForTransport').html(h + ":" + m);
        } else {
            $('#timeForTransport').html("?");

        }
    }

    static sendTransport(data = null) {
        swal('sendTransport', data, 'warning');
        if (data === null) {
        }
        else {

        }
    }

    static switchTransportDirection(newDir) {
        let lab = $('#to_skylab');
        let ship = $('#to_ship');
        let direction = $('#direction_but');
        switch (newDir) {
            case 'toship':
                lab.attr('src', './resources/images/internalSkylab/lab/to_skylab_0.png');
                ship.attr('src', './resources/images/internalSkylab/lab/to_ship_1.png');
                direction.attr('src', './resources/images/internalSkylab/lab/but_right_1.png');
                skylab.transportDirection = newDir;
                break;
            case 'tolab':
                lab.attr('src', './resources/images/internalSkylab/lab/to_skylab_1.png');
                ship.attr('src', './resources/images/internalSkylab/lab/to_ship_0.png');
                direction.attr('src', './resources/images/internalSkylab/lab/but_left_1.png');
                skylab.transportDirection = newDir;
                break;
        }
    }

    /**
     * sendRequest Function
     * sends request to ajax handler
     *
     * @param callback
     * @param action
     * @param params
     */
    static sendRequest(callback, action, params = "") {
        let data = {
            'action': action,
            'handler': 'skylab',
            'params': params
        };

        $.ajax({
            type: "POST",
            url: './core/ajax/ajax.php',
            data: data,
            cache: false,
            xhrFields: {
                withCredentials: true
            },
            success: function (resultData) {
                skylab[callback](resultData);
            }
        });
    }
}