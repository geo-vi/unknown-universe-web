var currentTime = 0;

var SkylabTimer = function() {};

SkylabTimer.prototype = {

    startTime       : 0,
    endTime         : 0,
    targetDivId     : '',
    targetDiv       : null,
    timeDiv         : null,
    barContainerDiv : null,
    barDiv          : null,
    interval        : null,
    now             : null,
    finished        : 0,
    barMinWidth     : 20,
    barMaxWidth     : 272,

    init : function(divId, currentTime, start, end)
    {
        var wrapperDivId = 'progressBG_module_' + divId;

        this.now         = currentTime;
        this.startTime   = start;
        this.endTime     = end;
        this.targetDivId = wrapperDivId;


        this.targetDiv   = document.getElementById(wrapperDivId);
        this.targetDiv.skylabTimer = this;

        this.barContainerDiv = document.getElementById('module_progressBarWrapper_' + divId);
        this.timeDiv         = document.getElementById('progress_timer_' + divId);

        // draw timer...
        this.render();

        // start loop...
        this.interval = window.setInterval(
            function () {
                document.getElementById(wrapperDivId).skylabTimer.render();
            },
            1000
        );
    },

    render : function()
    {
        var timeLeft = this.endTime - this.now;

        if(timeLeft <= 0) {
            this.finish();
            return;
        }

        var h = Math.floor(timeLeft / 3600 % 24);
        var m = Math.floor(timeLeft / 60 % 60);
        var s = Math.floor(timeLeft % 60);

        if (h < 10) h = '0' + String(h);
        if (m < 10) m = '0' + String(m);
        if (s < 10) s = '0' + String(s);

        this.timeDiv.innerHTML = String(h) + ':' + String(m) + ':' + String(s);

        var perc = Math.round((this.now - this.startTime) / (this.endTime - this.startTime) * 100);
        barWidth = Math.round((this.barMaxWidth / 100) * perc);

        if (this.barMinWidth > barWidth) {
            barWidth = this.barMinWidth;
        }
        if (this.barMaxWidth < barWidth) {
            barWidth = this.barMaxWidth;
        }

        this.barContainerDiv.style.width = String(barWidth) + 'px';

        this.now++;
    },

    finish : function()
    {
        // end loop...
        var str = '0:00:00';

        if(this.timeDiv.innerHTML == str) {
            this.timeDiv.innerHTML = '';
        } else {
            this.timeDiv.innerHTML = str;
        }

        if (this.finished == 5) {
            window.clearInterval(this.interval);
            skylab.reload();
        }

        this.finished++;
    }
}

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
            if (data['PROMETIUM_COLLECTOR']['READY'] === false) {
                this.unreadyCollector('PrometiumCollector');
            }
            if (data['PROMETIUM_COLLECTOR']['ACTIVE'] === false) {
                this.deactivateCollector('PrometiumCollector');
            }

            if (data['ENDURIUM_COLLECTOR']['READY'] === false) {
                this.unreadyCollector('EnduriumCollector');
            }
            if (data['ENDURIUM_COLLECTOR']['ACTIVE'] === false) {
                this.deactivateCollector('EnduriumCollector');
            }

            if (data['TERBIUM_COLLECTOR']['READY'] === false) {
                this.unreadyCollector('TerbiumCollector');
            }
            if (data['TERBIUM_COLLECTOR']['ACTIVE'] === false) {
                this.deactivateCollector('TerbiumCollector');
            }

            if (data['PROMETID_COLLECTOR']['READY'] === false) {
                this.unreadyCollector('PrometidRefinery');
            }
            if (data['PROMETID_COLLECTOR']['ACTIVE'] === false) {
                this.deactivateCollector('PrometidRefinery');
            }

            if (data['DURANIUM_COLLECTOR']['READY'] === false) {
                this.unreadyCollector('DuraniumRefinery');
            }
            if (data['DURANIUM_COLLECTOR']['ACTIVE'] === true) {
                this.deactivateCollector('DuraniumRefinery');
            }

            if (data['XENOMIT_MODULE']['READY'] === false) {
                this.unreadyCollector('XenoModule');
            }
            if (data['XENOMIT_MODULE']['ACTIVE'] === true) {
                this.deactivateCollector('XenoModule');
            }

            if (data['PROMERIUM_COLLECTOR']['READY'] === false) {
                this.unreadyCollector('PromeriumRefinery');
            }
            if (data['PROMERIUM_COLLECTOR']['ACTIVE'] === true) {
                this.deactivateCollector('PromeriumRefinery');
            }

            if (data['SEPROM_COLLECTOR']['READY'] === false) {
                this.unreadyCollector('SepromRefinery');
            }
            if (data['SEPROM_COLLECTOR']['ACTIVE'] === true) {
                this.deactivateCollector('SepromRefinery');
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

        // automatically show upgrade if running
        if ($('#module_' + moduleName + '_small').hasClass('upgrading')) {
            console.log('UPGRADING....!');
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

    static deactivateCollector(collectorName) {
        let boxName = collectorName.charAt(0).toLowerCase() + collectorName.slice(1);
        let box = $('#module_' + boxName + '_small');
        let topLeft = box.find('#corner_small_top_left_active').attr('id', 'corner_small_top_left_inactive');
        topLeft.children('.name').removeClass('name').addClass('name_inactive');
        box.find('#corner_small_top_right_active').attr('id', 'corner_small_top_right_inactive');
        let bottomLeft = box.find('#corner_small_bottom_left_active').attr('id', 'corner_small_bottom_left_inactive');
        bottomLeft.find('.level_icon').removeClass('level_icon').addClass('level_icon_inactive');
        bottomLeft.find('.skylab_font_level').removeClass('skylab_font_level').addClass('skylab_font_level_inactive');
        box.find('#corner_small_bottom_right_active').attr('id', 'corner_small_bottom_right_inactive');
    }

    static unreadyCollector(collectorName) {
        let boxName = collectorName.charAt(0).toLowerCase() + collectorName.slice(1);
        let box = $('#module_' + boxName + '_small');
        var classList = box.attr('class').split(/\s+/);
        if (classList.indexOf('upgrading') !== -1) {
            $('#background' + collectorName).hide();
            $('#uplink' + collectorName).hide();
        } else {
            $('#background' + collectorName).hide();
            $('#uplink' + collectorName).hide();
            let topLeft = box.find('#corner_small_top_left_active').attr('id', 'corner_small_top_left_inactive');
            topLeft.children('.name').removeClass('name').addClass('name_inactive');
            box.find('#corner_small_top_right_active').attr('id', 'corner_small_top_right_inactive');
            let bottomLeft = box.find('#corner_small_bottom_left_active').attr('id', 'corner_small_bottom_left_inactive');
            bottomLeft.children('table').hide();
            box.find('#corner_small_bottom_right_active').attr('id', 'corner_small_bottom_right_inactive');
        }
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
        location.reload();
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

    static buySkylabRobot(data, robotId, collector) {
        this.showShadow();
        if (data === null) {
            let params = {
                'COLLECTOR_TYPE': collector,
                'ROBOT_ID': robotId
            }
            this.sendRequest('buySkylabRobot', 'buyRobot', params);
        }
        else {
            let msg = data['MESSAGE'];
            let msgType = data['IS_ERROR'] === 1 ? 'error' : 'success';

            swal(msg,
                '', msgType).then(() => {
                this.reload();
            });
        }
    }

    static toggle(data, collector, state) {
        if (state === 'disabled') {
            swal('Cannot toggle this module');
            return;
        }
        if (data === null) {
            let params = {
                'MODULE_TYPE': collector
            };

            this.sendRequest('toggle', 'power', params);
        }
        else {
            let msg = data['MESSAGE'];
            let msgType = data['IS_ERROR'] === 1 ? 'error' : 'success';

            swal(msg,
                '', msgType).then(() => {
                this.reload();
            });
        }
    }

    static instantUpgradePopup() {
        swal('Disabled instant upgrades.', '', 'warning');
    }

    static buildUpgrade(data, module) {
        if (data === null) {
            let params = {
                'MODULE_TYPE': module,
                'INSTANT': 0
            };

            this.sendRequest('buildUpgrade', 'build', params);
        }
        else {
            let msg = data['MESSAGE'];
            let msgType = data['IS_ERROR'] === 1 ? 'error' : 'success';

            swal(msg,
                '', msgType).then(() => {
                this.reload();
            });
        }
    }

    static chooseUpgradeOption(option, containerKey) {
        var showAcceptButton = true;
        var infoBox          = $('#module_infobox_' + containerKey);

        // set visual active state to the currently clicked container
        infoBox.find('.option_state').removeClass('upgrade_option_active');
        infoBox.find('.upgrade_option_' + option + ' .option_state').addClass('upgrade_option_active');

        // hide the ok button
        infoBox.find('.upgrade_option_confirm').hide();

        var textId = '#upgrade_text_' + option;

        // check if we have a video available
        // if ('cinema' == option && (!window.BrandCinema || !BrandCinema.isVideoAvailable())) {
        if ('cinema' == option) {
            textId           += '_noVideo';
            showAcceptButton  = false;
        }

        // show the fitting hint text
        infoBox.find('.upgrade_options_text').hide();
        infoBox.find(textId + '_' + containerKey).show();

        // set the clicked option as chosen
        infoBox.find('#upgrade_option_' + containerKey).val(option);

        // unbind the click event from the ok button to avoid duplication and/or exploits
        infoBox.find('.upgrade_option_confirm').unbind('click');

        // show ok button and bind the click event
        if (showAcceptButton === true) {
            infoBox.find('.upgrade_option_confirm').show().click(function() {
                switch (option) {
                    case 'instant':
                        skylab.instantUpgrade(containerKey);
                        break;
                    case 'cancel':
                        skylab.cancelUpgrade(containerKey);
                        break;
                    case 'cinema':
                        skylab.showVideo(containerKey);
                        break;
                }
            });
        }
    }

    static instantUpgrade(containerKey) {
        console.log('instantUpgrade');
    }

    static cancelUpgrade(containerKey) {
        console.log('cancelUpgrade');
    }

    static showVideo(containerKey) {
        console.log('showVideo');
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