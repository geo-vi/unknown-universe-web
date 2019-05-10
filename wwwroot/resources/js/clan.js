class clan {
    constructor(USER_ID, PLAYER_ID) {
        clan.USER_ID = USER_ID;
        clan.PLAYER_ID = PLAYER_ID;
        clan.data = null;
        clan.SELECTED_USER_ID = null;
    }

    static renderExternal(data = null) {
        if (data === null) {
            clan.sendRequest('renderExternal', 'getClans');
        } else {
            let CLANS = data['CLANS'];
            if (CLANS.length === 0) {
                $('.clan-bottom-list-container .table > tbody:last-child').append('<td>No clans found</td>');
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
                let JOIN_REQUESTS = data['JOIN_REQUESTS'];
                JOIN_REQUESTS.forEach(function (joinReq) {
                    let requstedClanRow = $(".clan-bottom-list-container .table > tbody > tr[data-clan-id='" + joinReq['CLAN_ID'] + "']");
                    let button = requstedClanRow.find('.requestJoinButton');
                    button.text('Requested');
                    button.attr("disabled", true);
                    button.attr("id", 'selectedClanButton');
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


            var table = $('.table').DataTable({
            });

            $('#clan-search-text').on( 'keyup click', function () {
                table.search($('#clan-search-text').val()).draw();
            } );
            $('#DataTables_Table_0_filter').hide();
        }
    }

    static renderInternal(data = null) {
        if (data === null) {
            clan.sendRequest('renderInternal', 'getMyClan');
        } else {
            clan.data = data;
            let MEMBERS = data['MEMBERS'];
            MEMBERS.forEach(function (clanMember) {
                let isMe = clanMember['USER_ID'] == clan.USER_ID;
                let rank = isMe ? '<button type="button" class="leaveButton btn btn-danger">Leave</button>' : clanMember['RANK_NAME'];
                let category = isMe ? 'self' : 'member';

                if (isMe) {
                    $('#clan-members table > tbody:last-child').append('<tr data-category="' + category + '" data-user-id="' + clanMember['USER_ID'] + '">\n' +
                        '                        <td><div id="player-avatar"></div></td>\n' +
                        '                        <td>' + clanMember['PLAYER_NAME'] + '</td>\n' +
                        '                        <td>' + clan.getFaction(clanMember['FACTION_ID']) + '</td>\n' +
                        '                        <td>' + clanMember['EXP'] + '</td>\n' +
                        '                        <td>' + clanMember['HONOR'] + '</td>\n' +
                        '                        <td>' + clanMember['LVL'] + '</td>\n' +
                        '                        <td>' + rank + '</td>\n' +
                        '                    </tr>');
                }
                else {
                    $('#clan-members table > tbody:last-child').append('<tr data-category="' + category + '" data-toggle="modal" data-target="#clickClanMember" data-user-id="' + clanMember['USER_ID'] + '">\n' +
                        '                        <td><div id="player-avatar"></div></td>\n' +
                        '                        <td>' + clanMember['PLAYER_NAME'] + '</td>\n' +
                        '                        <td>' + clan.getFaction(clanMember['FACTION_ID']) + '</td>\n' +
                        '                        <td>' + clanMember['EXP'] + '</td>\n' +
                        '                        <td>' + clanMember['HONOR'] + '</td>\n' +
                        '                        <td>' + clanMember['LVL'] + '</td>\n' +
                        '                        <td>' + rank + '</td>\n' +
                        '                    </tr>');
                }
            });

            let REQUESTS = data['JOIN_REQUESTS'];
            REQUESTS.forEach(function (joinRequest) {
                $('#clan-members table > tbody:last-child').append('<tr data-category="applier" data-user-id="' + joinRequest['USER_ID'] + '">\n' +
                    '                        <td><div id="player-avatar"></div></td>\n' +
                    '                        <td>' + joinRequest['PLAYER_NAME'] + '</td>\n' +
                    '                        <td>' + clan.getFaction(joinRequest['FACTION_ID']) + '</td>\n' +
                    '                        <td></td>\n' +
                    '                        <td></td>\n' +
                    '                        <td><button type="button" class="acceptButton btn btn-success">Accept</button></td>\n' +
                    '                        <td><button type="button" class="cancelButton btn btn-danger">Cancel</button></td>\n' +
                    '                    </tr>');
            });

            let FACTION_ELEMENT = $('#faction');
            let FACTION = FACTION_ELEMENT.data('value');
            let FACTION_NAME = clan.getFaction(FACTION);
            FACTION_ELEMENT.text(FACTION_NAME);

            // $('#members-list ul:last-child').append('<li><a href="#" data-user-id="1">general_Rejection</a></li>');
            $('#members-list ul > li > a').click((function (event) {
                console.log($(this).data('user-id'));
            }));

            $('#clan-members table > tbody > tr').click(function () {
                let category = $(this).data('category');
                if (category === "member") {
                    clan.SELECTED_USER_ID = $(this).data('user-id');
                }
            });

            $('.acceptButton').click(function () {
                $(this).attr('id', 'selected');
                clan.acceptButtonClicked();
            });

            $('.cancelButton').click(function () {
                clan.cancelButtonClicked();
                let parent = $(this).parent().parent();
                parent.hide(500);
            });

            $('.leaveButton').click(function () {
                swal({
                    title: "Are you sure?",
                    text: "Once left you are no longer going to stay in this clan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willLeave) => {
                        if (willLeave) {
                            clan.leaveClan();
                        } else {
                            swal("You chose to stay!");
                        }
                    });
            });
            $('.loading-screen').hide();
        }
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
            if (data['message'] === "success") {
                sendGamePacket('clan|new_create');
                location.reload();
            } else {
                swal('Error creating clan', data['message'], 'error')
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
            $('.clan-bottom-list-container .table > tbody').clear();
            this.renderInternal();
        }
    }

    static acceptButtonClicked(data = null) {
        var selected = $("#selected");
        let parent = selected.parent().parent();
        parent.hide();
        selected.removeAttr('id');
        let userId = parent.data('user-id');

        if (data === null) {
            let params = {
                'USER_ID': userId,
            };
            this.sendRequest('acceptButtonClicked', 'acceptMemberRequest', params);
        }
        else {
            sendGamePacket('clan|update_members');
            location.reload();
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

    static kickButtonClicked(data = null) {
        if (data === null) {
            if (clan.SELECTED_USER_ID == null) {
                return;
            }
            let uid = clan.SELECTED_USER_ID;
            let params = {
                'USER_ID': uid,
            };
            this.sendRequest('kickButtonClicked', 'kickMember', params);
        }
        else {
            $('.clan-bottom-list-container .table > tbody > tr').hide(500);
            clan.SELECTED_USER_ID = null;
        }
    }

    static makeLeaderClicked(data = null) {
        if (data === null) {
            if (clan.SELECTED_USER_ID == null) {
                return;
            }
            let uid = clan.SELECTED_USER_ID;
            let params = {
                'USER_ID': uid,
            };
            this.sendRequest('makeLeaderClicked', 'makeLeader', params);
        }
        else {
            clan.SELECTED_USER_ID = null;
        }
    }

    static leaveClan(data = null) {
        if (data === null) {
            this.sendRequest('leaveClan', 'leaveClan');
        } else {
            sendGamePacket('clan|left_clan');
            location.reload();
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
        let number = parseInt(id);
        switch (number) {
            case 1: return 'MMO';
            case 2: return 'EIC';
            case 3: return 'VRU';
            default: return 'ALL';
        }
    }
}