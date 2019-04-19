class clan {
    constructor(USER_ID, PLAYER_ID) {
        clan.USER_ID = USER_ID;
        clan.PLAYER_ID = PLAYER_ID;
        clan.data = null;
    }

    static renderExternal(data = null) {
        if (data === null) {
            clan.sendRequest('renderExternal', 'getClans');
        } else {
            let CLANS = data['CLANS'];
            if (CLANS.length === 0) {
                $('.clan-bottom-list-container .table > tbody:last-child').append('<td>No clans found</td>');
                $('#clan-search').hide();
                $('#clan-search-text').hide();
            }
            else {
                CLANS.forEach(function (clanEntry) {
                    let CLAN_MEMBERS = clanEntry['MEMBERS'];
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
                        '<tr data-clan-id="' + clanEntry['ID'] + '"><td>' + clanEntry['TAG'] + '</td>\n' +
                        '                            <td>' + clanEntry['NAME'] + '</td>\n' +
                        '                            <td>' + clanEntry['DESCRIPTION'] + '</td>\n' +
                        '                            <td>' + CLAN_MEMBERS.length + '/50</td>\n' +
                        '                            <td>' + FACTION + '</td>\n' +
                        '                            <td><button type="button" class="requestJoinButton btn btn-primary">Join</button>\n</td></tr>');
                });
            }

            $('#create-clan').click(function (event) {
                clan.clanCreate();
            });

            $('.requestJoinButton').click(function (event) {
                $(this).text('Requested');
                $(this).attr("disabled", true);
                $(this).attr("id", 'selectedClanButton');
                clan.joinButtonClicked();
            });
        }
    }

    static renderInternal(data = null) {
        if (data === null) {
            clan.sendRequest('renderInternal', 'getMyClan');
        } else {
            clan.data = data;
            let MEMBERS = data['MEMBERS'];
            MEMBERS.forEach(function (clanMember) {
                console.log(clanMember);

                $('#clan-members table > tbody:last-child').append('<tr data-toggle="modal" data-target="#userSettingsModal" data-user-id="' + clanMember['USER_ID'] + '">\n' +
                    '                        <td><div id="player-avatar"></div></td>\n' +
                    '                        <td>' + clanMember['PLAYER_NAME'] + '</td>\n' +
                    '                        <td>' + clan.getFaction(clanMember['FACTION_ID']) + '</td>\n' +
                    '                        <td>' + clanMember['EXP'] + '</td>\n' +
                    '                        <td>' + clanMember['HONOR'] + '</td>\n' +
                    '                        <td>' + clanMember['LVL'] + '</td>\n' +
                    '                        <td>General</td>\n' +
                    '                    </tr>');
            });

            let REQUESTS = data['JOIN_REQUESTS'];
            REQUESTS.forEach(function (joinRequest) {
                console.log(joinRequest);

                $('#clan-members table > tbody:last-child').append('<tr data-user-id="' + joinRequest['USER_ID'] + '">\n' +
                    '                        <td><div id="player-avatar"></div></td>\n' +
                    '                        <td>' + joinRequest['PLAYER_NAME'] + '</td>\n' +
                    '                        <td>' + clan.getFaction(joinRequest['FACTION_ID']) + '</td>\n' +
                    '                        <td></td>\n' +
                    '                        <td></td>\n' +
                    '                        <td><button type="button" class="acceptButton btn btn-success">Accept</button></td>\n' +
                    '                        <td><button type="button" class="cancelButton btn btn-danger">Cancel</button></td>\n' +
                    '                    </tr>');
            });
        }

        $('#clan-members table > tbody > tr').click(function (event) {
            console.log($(this).data('user-id'));
        });

        $('#members-list ul:last-child').append('<li><a href="#" data-user-id="1">general_Rejection</a></li>');
        $('#members-list ul > li > a').click((function (event) {
            console.log($(this).data('user-id'));
        }));

        $('.acceptButton').click(function () {
            clan.acceptButtonClicked();
            let parent = $(this).parent().parent();
            parent.hide(500);
        });

        $('.cancelButton').click(function () {
            clan.cancelButtonClicked();
            let parent = $(this).parent().parent();
            parent.hide(500);
        });
    }

    static clanCreate(data = null) {
        if (data === null) {
            let params = {
                'TAG': $('#clan-tag').val(),
                'NAME': $('#clan-name').val(),
                'DESC': $('#clan-desc').val()
            };

            this.sendRequest('clanCreate', 'createClan', params);
        }
        else {
            if (data.error) {
                swal('Error!', data['error_msg'], 'error');
            }
            else {
                location.reload();
            }
        }
    }

    static clanSearch(data = null) {
        if (data ===  null) {
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
                let FACTION = clan.getFaction(clanEntry['FACTION']);

                $('.clan-bottom-list-container .table > tbody:last-child').append(
                    '<tr data-clan-id="' + clanEntry['ID'] + '"><td>' + clanEntry['TAG'] + '</td>\n' +
                    '                            <td>' + clanEntry['NAME'] + '</td>\n' +
                    '                            <td>' + clanEntry['DESCRIPTION'] + '</td>\n' +
                    '                            <td>' + CLAN_MEMBERS.length + '/50</td>\n' +
                    '                            <td>' + FACTION + '</td></tr>');
            });
        }
    }

    static cancelButtonClicked(data = null) {
        let parent = $(".cancelButton").parent().parent();
        let userId = parent.data('user-id');

        if (data === null) {
            let params = {
                'USER_ID': userId,
            };
            this.sendRequest('cancelButtonClicked', 'cancelMemberRequest', params);
        }
        else {
            //todo;
        }
    }

    static acceptButtonClicked(data = null) {
        let parent = $(".acceptButton").parent().parent();
        let userId = parent.data('user-id');

        if (data === null) {
            let params = {
                'USER_ID': userId,
            };
            this.sendRequest('acceptButtonClicked', 'acceptMemberRequest', params);
        }
        else {
            //todo;
        }
    }

    static joinButtonClicked(data = null) {
        if (data === null) {
            var currentSelection = $('#selectedClanButton');
            currentSelection.removeAttr('id');
            var parent = currentSelection.parent().parent();
            let clanId = parent.data('clan-id');
            let params = {
                'CLAN_ID': clanId,
            };
            this.sendRequest('joinButtonClicked', 'joinRequest', params);
        }
        else {
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

    static getFaction(id) {
        switch (id) {
            case '1': return 'MMO';
            case '2': return 'EIC';
            case '3': return 'VRU';
            default: return 'ALL';
        }
    }
}