class clan {
    constructor(USER_ID, PLAYER_ID) {
        clan.USER_ID = USER_ID;
        clan.PLAYER_ID = PLAYER_ID;
        clan.data = null;
    }

    static renderExternal(data = null) {
        if (data == undefined) {
            clan.sendRequest('renderExternal', 'getClans', []);
        }
        else {
            if (data.length === 0) {
                $('.clan-bottom-list-container .table > tbody:last-child').append('<td>No clans found</td>');
                return;
            }
            data.forEach(function (clanEntry) {
                let CLAN_MEMBERS = [];
                let members = JSON.parse(clanEntry['MEMBERS']);
                CLAN_MEMBERS.push(members);
                let FACTION = 'ALL';

                switch (clanEntry['FACTION']){
                    case 1:
                        FACTION = 'MMO';
                    case 2:
                        FACTION = 'EIC';
                    case 3:
                        FACTION = 'VRU';
                }

                $('.clan-bottom-list-container .table > tbody:last-child').append(
                    '<tr><td>' + clanEntry['TAG'] + '</td>\n' +
                    '                            <td>' + clanEntry['NAME'] + '</td>\n' +
                    '                            <td>' + clanEntry['DESCRIPTION'] + '</td>\n' +
                    '                            <td>'+ CLAN_MEMBERS.length + '/50</td>\n' +
                    '                            <td>' + FACTION + '</td></tr>');
            });
        }
        this.activateExternal();
    }

    static renderInternal(data = null) {
        $('#clan-members table > tbody:last-child').append('<tr>\n' +
            '                    <td><div id="player-avatar"></div></td>\n' +
            '                    <td>general_Rejection</td>\n' +
            '                    <td>VRU</td>\n' +
            '                    <td>0</td>\n' +
            '                    <td>0</td>\n' +
            '                    <td>0</td>\n' +
            '                    <td>General</td>\n' +
            '                </tr>');
        $('#clan-members table > tbody > tr').click(() => console.log('clicked on ID: '));
    }

    static activateExternal() {
        $('#create_clan').click(() => this.clanCreate());
        $('#clan_search').click(() => this.clanSearch());
    }

    static clanCreate(data = null) {
        if (data == undefined) {
            let params = {
                'TAG': $('#clan_tag').val(),
                'NAME': $('#clan_name').val(),
                'DESC': $('#clan_desc').val()
            };
            console.log(params);
            this.sendRequest('clanCreate', 'createClan', params);
        }
    }

    static clanSearch(data = null) {
        if (data == undefined) {
            let params = {
                'PREFIX': $('#clan_search_text').val(),
            };
            this.sendRequest('clanSearch', 'findClans', params);
        }
        else {
            $('.clan-bottom-list-container .table > tbody').empty();
            if (data.length === 0) {
                $('.clan-bottom-list-container .table > tbody:last-child').append('<td>No clans found</td>');
                return;
            }
            data.forEach(function (clanEntry) {
                let CLAN_MEMBERS = [];
                let members = JSON.parse(clanEntry['MEMBERS']);
                CLAN_MEMBERS.push(members);
                let FACTION = 'ALL';

                switch (clanEntry['FACTION']) {
                    case 1:
                        FACTION = 'MMO';
                    case 2:
                        FACTION = 'EIC';
                    case 3:
                        FACTION = 'VRU';
                }

                $('.clan-bottom-list-container .table > tbody:last-child').append(
                    '<tr><td>' + clanEntry['TAG'] + '</td>\n' +
                    '                            <td>' + clanEntry['NAME'] + '</td>\n' +
                    '                            <td>' + clanEntry['DESCRIPTION'] + '</td>\n' +
                    '                            <td>' + CLAN_MEMBERS.length + '/50</td>\n' +
                    '                            <td>' + FACTION + '</td></tr>');
            });
        }
    }

    /**
     * reload Function
     * refreshs equipment data by ajax call
     *
     * @param data
     */
    static reload(data = null) {
        if (data === null) {
            $(".loading-screen").show();
            clan.sendRequest('reload', 'load');
        } else {
            clan.data = data;
            clan.render();
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
            'handler': 'clan',
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
                clan[callback](resultData);
            }
        });
    }
}