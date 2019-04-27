class galaxygate {
    constructor(USER_ID, PLAYER_ID, SERVER_IP) {
        galaxygate.USER_ID = USER_ID;
        galaxygate.PLAYER_ID = PLAYER_ID;
        galaxygate.SERVER_IP = SERVER_IP;
        galaxygate.SELECTED_GATE = 1;
        galaxygate.ENERGY_AMOUNT = 1;
        galaxygate.GG_ENERGY = 0;
        galaxygate.URIDIUM = 0;
        galaxygate.MULTIPLIER = 0;
        galaxygate.MULTIPLY = true;
        galaxygate.render();
    }

    static render(data = null) {
        if (data === null) {
            this.sendRequest('render', 'load')
        }
        else {
            galaxygate.GG_ENERGY = data['GG_ENERGY'];
            $('#ggenergy-amount').html(galaxygate.GG_ENERGY);

            galaxygate.URIDIUM = data['URIDIUM'];
            $('#uridium-amount').html(galaxygate.URIDIUM);

            galaxygate.MULTIPLIER = data['MULTIPLIER'];
            galaxygate.updateMultiplier();

            $('.gate-separator > li').click(function () {
                let GGID = $(this).data('gate-id');
                $('.selected').removeClass('selected');
                $(this).addClass('selected');
                galaxygate.SELECTED_GATE = GGID;
                galaxygate.displayGate();
            });

            $('#prepare-gate').click(function () {
                galaxygate.prepareGate();
            });

            $('#use-energy').click(function () {
                galaxygate.click();
            });

            $('.dropdown-menu > li > a').click(function () {
                let amount = $(this).data('amount');
                galaxygate.ENERGY_AMOUNT = amount;
                galaxygate.updateButton();
                $('#energy-amount-selector').text('x' + galaxygate.ENERGY_AMOUNT);
            });

            $('#cross').click(function() {
                galaxygate.toggleMultiply();
            });

            $('#lives-left').click(function() {
                swal({
                        title: "Buy a life?",
                        text: "Would you like to buy a life for 10,000 U.?",
                        type: "warning",
                        showCancelButton: true,
                        buttons: ["Cancel","Buy"],
                    }).then((buyingLife) => {
                    if (buyingLife) {
                        galaxygate.buyLife();
                    }});
            });

            galaxygate.displayGate();
            galaxygate.updateButton();
        }
    }

    static displayGate(data = null) {
        if (data === null) {
            let params = {
                "GATE_ID": galaxygate.SELECTED_GATE,
            };
            galaxygate.sendRequest('displayGate', 'loadGate', params);
        }
        else {
            $('#gate-info').css("background-image", 'url("http://' + window.location.host + '/flashAPI/jumpgate.php?gate=' + galaxygate.SELECTED_GATE + '")');
            let parts = parseInt(data['PARTS']);
            let total = parseInt(data['TOTAL']);
            console.log(data);

            let prepared = data['PREPARED'];
            let currentWave = $('#current-wave');
            let livesLeft = $('#lives-left');
            let gateSmoke = $('#gate-smoke > img');
            let prepareGate = $('#prepare-gate');
            currentWave.text('');
            livesLeft.text('');
            prepareGate.hide();
            gateSmoke.hide();
            if (prepared) {
                currentWave.text('WAVE ' + data['WAVE']);
                livesLeft.text(data['LIVES'] + ' LIVES LEFT');
                gateSmoke.show();
                gateSmoke.attr("src","../resources/images/gg/spins/" + galaxygate.SELECTED_GATE + ".webp");
            }
            else if (parts >= total) {
                prepareGate.show(1000);
            }

            $('#collected-parts').text(parts + '/' + total);

        }
    }

    static prepareGate(data = null) {
        if (data === null) {
            let params = {
                "GATE_ID": galaxygate.SELECTED_GATE,
            };
            galaxygate.sendRequest('prepareGate', 'prepareGate', params);
        }
        else {
            if (data['PREPARED']) {
                $('#gate-info').css("background-image", 'url("http://' + window.location.host + '/flashAPI/jumpgate.php?gate=' + 0 + '")');
                galaxygate.displayGate();
            }
        }
    }

    static updateButton() {
        if (galaxygate.GG_ENERGY > galaxygate.ENERGY_AMOUNT) {
            $('#use-energy').html(galaxygate.ENERGY_AMOUNT + ' E.');
        }
        else {
            var mustBuyEnergy = galaxygate.ENERGY_AMOUNT - galaxygate.GG_ENERGY;
            $('#use-energy').html((mustBuyEnergy * 100) + ' U.');
        }
    }

    static click(data = null) {
        if (data === null) {
            let params = {
                "AMOUNT" : galaxygate.ENERGY_AMOUNT,
                "SELECTED_GG" : galaxygate.SELECTED_GATE,
                "USE_MULTIPLIER" : galaxygate.MULTIPLY
            };
            this.sendRequest('click', 'click', params);
        }
        else {
            let loglist = $('#log > ul:last-child');
            let RESULT = data['RESULT'];
            RESULT.forEach(function(element) {
                loglist.prepend('<li>' + element['AMOUNT'] + 'x ' + element['NAME'] + '</li>');
            });

            $('#gate-info').css("background-image", 'url("http://' + window.location.host + '/flashAPI/jumpgate.php?gate=' + 0 + '")');

            galaxygate.GG_ENERGY = data['GG_ENERGY'];
            $('#ggenergy-amount').text(galaxygate.GG_ENERGY);

            galaxygate.URIDIUM = data['URIDIUM'];
            $('#uridium-amount').text(galaxygate.URIDIUM);

            galaxygate.MULTIPLIER = data['MULTIPLIER'];
            galaxygate.updateMultiplier();

            if (galaxygate.MULTIPLY)
                galaxygate.toggleMultiply();

            this.displayGate();
        }
    }

    static updateMultiplier() {
        let progressBar = $('#gate-progress-bar .progress-bar');
        progressBar.text(galaxygate.MULTIPLIER + '/5');
        progressBar.css("width", galaxygate.MULTIPLIER * 20 + '%');
    }

    static toggleMultiply() {
        let cross = $('#cross > h4');
        if (!galaxygate.MULTIPLY) {
            galaxygate.MULTIPLY = true;
            cross.show(200)
        }
        else {
            galaxygate.MULTIPLY = false;
            cross.hide(200);
        }
    }

    static buyLife(data = null) {
        if (data === null) {
            let params = {
                "GATE_ID" : galaxygate.SELECTED_GATE,
            };
            this.sendRequest('buyLife', 'buyLife', params);
        }
        else {
            let dataType = data['RESULT'];
            let dataMessage = data['MESSAGE'];
            $('#lives-left').text(data['LIVES'] + ' LIVES LEFT');
            galaxygate.URIDIUM = data['URIDIUM'];
            $('#uridium-amount').text(galaxygate.URIDIUM);
            swal(dataMessage, {
                icon: dataType,
            });
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
            'handler': 'gg',
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
                galaxygate[callback](resultData);
            }
        });
    }
}