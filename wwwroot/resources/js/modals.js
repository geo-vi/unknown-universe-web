class modals {
    constructor(USER_ID, PLAYER_ID, SERVER_IP) {
        console.log('aa');
        modals.USER_ID = USER_ID;
        modals.PLAYER_ID = PLAYER_ID;
        modals.SERVER_IP = SERVER_IP;
        modals.render();
    }

    static render() {
        $('#kick').click(function() {
           clan.kickButtonClicked();
        });

        $('#make-leader').click(function() {
            clan.makeLeaderClicked();
            $(this).hide();
        });

        $('#change-pet-name').click(function() {
            equipment.changeName(undefined, $('#petNameTextBox').val());
        });
    }

    /**
     * sendPacket Function
     * sends packet to emulator
     *
     * @param action
     * @param params
     */
    static sendPacket(action, params = []) {
        if (shop.ws === undefined) {
            shop.ws = new WebSocket("ws://" + atob(shop.SERVER_IP) + ":666/cmslistener");
        }

        let paramStr = '';
        if (params.length > 0) {
            paramStr = '|';
            for (let param of params) {
                paramStr += '|' + param;
            }
            paramStr = paramStr.substring(0, paramStr.length - 1);
        }

        setTimeout(function () {
            if (shop.ws.readyState === 1) {
                shop.ws.send('update|' + shop.PLAYER_ID + '|' + action + paramStr);
            } else {
                shop.sendPacket(action);
            }
        }, 5);
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
            'handler': 'modals',
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
                equipment[callback](resultData);
            }
        });
    }
}
