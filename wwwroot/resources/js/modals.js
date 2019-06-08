class modals {
    constructor(USER_ID, PLAYER_ID, SERVER_IP) {
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
