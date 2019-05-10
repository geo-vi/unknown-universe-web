<?php
include_once( 'internalModal.php' );

if (isset($_POST['action']) && $_POST['action'] == 'send_message') {
    $System->User->massMessage($_POST['Content']);
    ?>
    <div>Message successfully sent</div><?php
}

if (isset($_GET['sub_action']) && !empty($_GET['sub_action'])) {
    $action = $_GET['sub_action'];

    if ($action == 'create_inv') {
        if (isset($_GET['CODE']) && !empty($_GET['CODE'])) {
            if ($System->mysql->QUERY('INSERT INTO server_invitations (CODE) VALUES (?)', [$_GET['CODE']])) {
                ?>
                <script>swal('Success!', 'Code: <?=$_GET['CODE']?> created!', 'success');</script>
                <?php
            } else {
                ?>
                <script>swal('Error!', 'Something went wrong!', 'error');</script>
                <?php
            }
        } else {
            ?>
            <script>swal('Error!', 'Invalid Invitation Code, it cant be empty!', 'error');</script>
            <?php
        }
    } else if ($action == 'send_vc') {
        if (isset($_GET['CODE_ID'])) {
            if ($System->User->sendMassCode($_GET['CODE_ID'])) {
                ?>
                <script>swal('Success!', 'Code: <?=$_GET['CODE_ID']?> has been sent to all users', 'success');</script>
                <?php
            } else {
                ?>
                <script>swal('Error!', 'Something went wrong!', 'error');</script>
                <?php
            }
        } else {
            ?>
            <script>swal('Success!', 'Code: <?=$_GET['CODE_ID']?> has nnn sent to all users', 'success');</script>
            <?php
        }
    }
}
if ($_POST['sub_action'] == 'editcon') {
    if ( !empty($_POST['pid'])) {
        $System->User->editUser($_POST['pname'], $_POST['rankk'], $_POST['plvl'], $_POST['phonor'], $_POST['pexp'], $_POST['puri'], $_POST['pcred'], $_POST['pid']);

    }
}

if (isset($_GET['sub_action']) && !empty($_GET['sub_action'])) {
    $action = $_GET['sub_action'];

    if ($action = 'create_vc') {
        if (isset($_GET['CODE']) && !empty($_GET['CODE'])) {
            if ($System->mysql->QUERY('INSERT INTO do_server_ge1.server_voucher_codes (CODE, CODE_DESC, REWARD, AMOUNT) VALUES (?,?,?,?)', [$_GET['CODE'],
                                                                                                                                            $_GET['CODE_DESC'],
                                                                                                                                            $_GET['code_reward'],
                                                                                                                                            $_GET['code_q']])) {
                ?>
                <script>swal('Success!', 'Code: <?=$_GET['CODE']?> created!', 'success');</script>
                <?php
            } else {
                ?>
                <script>swal('Error!', 'Something went wrong!', 'error');</script>
                <?php
            }
        }
    }
}
?>
<script src="../resources/js/ckeditor/ckeditor.js"></script>
<div class="page-content clearfix">
    <div class="col-xs-3 admin-menu-container">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#search"
                                                      aria-controls="search"
                                                      role="tab"
                                                      data-toggle="tab">Search</a></li>

            <li role="presentation"><a href="#invitations" aria-controls="invitations" role="tab" data-toggle="tab">Invitations</a>
            </li>
            <li role="presentation"><a href="#lookup" aria-controls="lookup" role="tab" data-toggle="tab">Player
                                                                                                          LookUp</a>
            </li>
            <li role="presentation"><a href="#message" aria-controls="message" role="tab" data-toggle="tab">Mass
                                                                                                            Messaging</a>
            </li>
            <li role="presentation"><a href="#code" aria-controls="code" role="tab" data-toggle="tab">Voucher Code</a>
            </li>
            <li role="presentation"><a href="#chat" aria-controls="chat" role="tab" data-toggle="tab">Chat</a></li>
            <li role="presentation"><a href="#events" aria-controls="events" role="tab" data-toggle="tab">Events</a>
            </li>
            <li role="presentation"><a href="#logs" aria-controls="logs" role="tab" data-toggle="tab">logs</a></li>
            <li role="presentation"><a href="./internalAdminEdit">Ships</a></li>
            <li role="presentation"><a href="./internalAdminEditItems">Items</a></li>
            <li role="presentation"><a href="./internalMapEditor">Maps</a></li>
            <li role="presentation"><a href="./internalCalendar">Calendar</a></li>
        </ul>
    </div>
    <div class="col-xs-9 admin-content">

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane" id="logs">
                <h3><b>Player</b> Logs</h3>
                <div class="user-list custom-scroll clearfix">
                    <h3>Users</h3>
                    <table class="table">
                        <thead>
                        <th style="text-transform: none;">PlayerID</th>
                        <th style="text-transform: none;">Name</th>
                        </thead>
                        <tbody>
                        <?php
                        $info = $System->User->userInfo();

                        foreach ($info as $a) {
                            ?>
                            <tr>
                                <td><?= $a['PLAYER_ID'] ?></td>
                                <td><?= $a['PLAYER_NAME'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="search-form2">
                    <form action="" method="POST">
                        <input type="hidden" name="sub_action" value="search_logs">
                        <input type="hidden" name="action" value="">
                        <label>Search Type:</label>
                        <select style="background-color:gray; color:black;" name="search_Type" class="search">
                            <option value="0">Log Type</option>
                            <option value="1">User ID</option>
                            <option value="2">Player ID</option>
                        </select><br />
                        <label>Input:</label>
                        <input style="color:black;margin-left:52px;background-color:gray;"
                               type="text"
                               value=""
                               placeholder="Cocaine"
                               name="cocaine">
                        <button class="submit" name="subSearch">SEARCH</button>
                    </form>
                </div>
                <div class="search-form3">
                    <table class="table">
                        <thead>
                        <th style="text-transform: none;"><b>Log</b> Type</th>
                        <th style="text-transform: none;">Code</th>
                        </thead>
                        <tbody style="text-align: center;">
                        <tr>
                            <td style="color:rgb(255,99,71)">System</td>
                            <td style="color:rgb(255,99,71)">2</td>
                        </tr>
                        <tr>
                            <td style="color:rgb(245,222,179)">Normal</td>
                            <td style="color:rgb(245,222,179)">3</td>
                        </tr>
                        <tr>
                            <td style="color:rgb(220,20,60)">Voucher</td>
                            <td style="color:rgb(220,20,60)">4</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="user-look-up-list2 custom-scroll clearfix">
                    <h3>Results</h3>
                    <table class="table">
                        <thead>
                        <th style="text-transform: none;">Player ID</th>
                        <th style="text-transform: none;">Log Type</th>
                        <th style="text-transform: none;">Description</th>
                        <th style="text-transform: none;">Date</th>
                        </thead>
                        <?php if (isset($_POST['action']) && isset($_POST['sub_action']) &&
                                  $_POST['sub_action'] == 'search_logs') {
                            if (isset($_POST['search_Type'])) {
                                $type = $_POST['search_Type'];
                                $id   = $_POST['cocaine'];
                                $logs = $System->User->getLogs($id, $type);
                                foreach ($logs as $log) {
                                    ?>
                                    <tbody style="text-align: center;">
                                    <tr>
                                        <td style="color:rgb(43,222,49)"><?= $log['USER_ID']; ?></td>
                                        <td style="color:rgb(43,222,49)"><?= $log['LOG_TYPE'] ?></td>
                                        <td style="color:rgb(43,222,49)"><?= $log['LOG_DESCRIPTION'] ?></td>
                                        <td style="color:rgb(43,222,49)"><?= $log['LOG_DATE'] ?></td>
                                    </tr>
                                    </tbody>
                                <?php }
                            }
                        } ?>
                    </table>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="invitations">
                <h3><b>Invitation</b> Codes</h3>
                <div class="invitation-code-list custom-scroll">
                    <table class="table">
                        <thead>
                        <th>ID</th>
                        <th>CODE</th>
                        <th>USED</th>
                        </thead>
                        <tbody>
                        <?php
                        $INVITATIONS = $System->mysql->QUERY('SELECT * FROM server_invitations ORDER BY ID DESC');

                        foreach ($INVITATIONS as $INVITATION) {
                            ?>
                            <tr>
                                <td><?= $INVITATION['ID'] ?></td>
                                <td><?= $INVITATION['CODE'] ?></td>
                                <td><?= $INVITATION['USED'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="invitation-insert-form">
                    <h3><b>Create Invitation</b> Code</h3>
                    <form method="get" action="">
                        <input type="hidden" value="create_inv" name="sub_action">
                        <input class="form-control" name="CODE" placeholder="Invitation Code">
                        <input class="btn-primary btn-block btn-lg" type="submit" value="Create">
                    </form>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane active" id="search">
                <h3><b>Search</b></h3>
                <div class="search-form">
                    <form action="" method="POST">
                        <input type="hidden" name="sub_action" value="searchDB">
                        <input type="hidden" name="action" value="search_action">
                        <label>Search Type:</label>
                        <select style="background-color:gray; color:black;" name="searchType" class="search">
                            <option value="0">All</option>
                            <option value="1">User ID</option>
                            <option value="2">Player Name</option>
                            <option value="3">Ranking</option>
                            <option value="4">Administrators</option>
                        </select><br />
                        <label>Input:</label>
                        <input style="color:black;margin-left:52px;background-color:gray;"
                               type="text"
                               value=""
                               placeholder="Search"
                               name="searchUser">
                        <button class="submit" name="subSearch">SEARCH</button>
                    </form>
                </div>
                <div class="results-content custom-scroll">
                    <table class="result-list">
                        <thead>
                        <tr>
                            <th>User ID</th>
                            <th>PLAYER NAME</th>
                            <th>RANK</th>
                            <th>ranking</th>
                            <th>LEVEL</th>
                            <th>EP</th>
                            <th>HONOR</th>
                            <th>URIDIUM</th>
                            <th>CREDITS</th>
                            <th style="width:100px;">CLAN</th>
                        </tr>
                        </thead>
                        <?php
                        if ( isset($_POST['action']) && isset($_POST['sub_action']) &&
                             $_POST['sub_action'] == 'searchDB' ) {
                        $user = $_POST['searchUser'];
                        if ( isset($_POST['searchType']) ) {
                        $type = $_POST['searchType'];
                        if ( $type == 0 ){
                            $info = $System->User->userInfo();
                            foreach ($info as $what => $a) {
                                $clan     = $a['CLAN_ID'];
                                $clanname = $System->User->clanName($clan);
                                switch ($clan) {
                                    case 0:
                                        $clanname = 'No Clan';
                                        break;
                                } ?>
                                <tbody>
                                <tr>
                                    <td><?= $a['USER_ID'] ?></td>
                                    <td style="color:lawngreen"><?= $a['PLAYER_NAME']; ?></td>
                                    <td><img class="ranking-icon"
                                             src="/resources/images/ranks/rank_<?= $a['RANK']; ?>.gif"></td>
                                    <td><?= $a['RANKING']; ?></td>
                                    <td><?= $a['LVL']; ?></td>
                                    <td><?= number_format($a['EXP'], 0, '.', ','); ?></td>
                                    <td><?= number_format($a['HONOR'], 0, '.', ','); ?></td>
                                    <td><?= number_format($a['URIDIUM'], 0, '.', ','); ?></td>
                                    <td><?= number_format($a['CREDITS'], 0, '.', ','); ?></td>
                                    <td style="width:100px;"><?php echo $clanname; ?></td>
                                </tr>
                                </tbody>

                                <?php
                            }
                        } else {
                        $information = $System->User->getInfo($user, $type);
                        foreach ( $information

                        as $info ){
                        $clan      = $info['CLAN_ID'];
                        $clan_name = $System->User->clanName($clan);
                        switch ($clan) {
                            case '0':
                                $clan_name = 'No Clan';
                                break;
                        }
                        $admin = $info['RANK'];
                        if ($admin == 21) {
                            $admin = "Administrator";
                        } else {
                            $admin = "Regular Player";
                        }
                        ?>
                        <tbody>
                        <tr>
                            <td><?= $info['USER_ID'] ?></td>
                            <td style="color:lawngreen"><?= $info['PLAYER_NAME']; ?></td>
                            <td><img class="ranking-icon"
                                     src="/resources/images/ranks/rank_<?= $info['RANK']; ?>.gif"></td>
                            <td><?= $info['RANKING']; ?></td>
                            <td><?= $info['LVL']; ?></td>
                            <td><?= number_format($info['EXP'], 0, '.', '.'); ?></td>
                            <td><?= number_format($info['HONOR'], 0, '.', '.'); ?></td>
                            <td><?= number_format($info['URIDIUM'], 0, '.', '.'); ?></td>
                            <td><?= number_format($info['CREDITS'], 0, '.', '.'); ?></td>
                            <td style="width:100px;"><?php echo $clan_name; ?></td>
                        </tr>
                        <?php if ( $type != '4' ) { ?>
                        </tbody>
                    </table>
                    <form action="" method="POST">
                        <input type="hidden" name="sub_action" value="editcon">
                        <input type="hidden" name="pid" value="<?= $info['USER_ID'] ?>">
                        <div style="margin-left:250px;margin-top:100px;">
                            <label>Player Name: </label><input class="search"
                                                               name="pname"
                                                               style="margin-left:20px;"
                                                               type="text"
                                                               value="<?= $info['PLAYER_NAME'] ?>">
                            <br /><label>Rank:</label>

                            <select style="margin-left:66px; background-color:gray;" name="rankk" class="search">
                                <option style="text-align:right;"
                                        selected="selected"
                                        value="<?= $info['RANK'] ?>"><?php echo $admin; ?></option>
                                <?php if ($info['RANK'] == 21) { ?>
                                    <option value="1">Regular Player</option>
                                <?php } else { ?>
                                    <option value="2">Administrator</option>
                                <?php } ?>
                            </select>

                            <br /><label>Level: </label><input class="search"
                                                               name="plvl"
                                                               style="margin-left:66px;"
                                                               type="text"
                                                               value="<?= $info['LVL'] ?>">
                            <br /><label>Honor: </label><input class="search"
                                                               name="phonor"
                                                               style="margin-left:60px;"
                                                               type="text"
                                                               value="<?= $info['HONOR'] ?>">
                            <br /><label>EP: </label><input class="search"
                                                            name="pexp"
                                                            style="margin-left:87px;"
                                                            type="text"
                                                            value="<?= $info['EXP'] ?>">
                            <br /><label>Uiridum: </label><input class="search"
                                                                 name="puri"
                                                                 style="margin-left:52px;"
                                                                 type="text"
                                                                 value="<?= $info['URIDIUM'] ?>">
                            <br /><label>Credits: </label><input class="search"
                                                                 name="pcred"
                                                                 style="margin-left:53px;"
                                                                 type="text"
                                                                 value="<?= $info['CREDITS'] ?>">
                            <Br />
                            <button class="submit" name="subSearch">SEARCH</button>
                        </div>
                    </form>
                    <?php
                    }
                    }
                    }
                    }
                    } ?>
                    </table>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="lookup">
                <div class="user-look-up-search clearfix">
                    <h3><b>LookUp</b> Player</h3>
                    <form method="get" action="">
                        <input type="hidden" value="search_player" name="sub_action">
                        <input class="form-control" name="USER_ID" placeholder="USER_ID">
                        <input class="btn-primary" type="submit" value="Search">
                    </form>
                </div>
                <h3><b>Player</b> List</h3>
                <div class="user-look-up-list custom-scroll clearfix">
                    <table class="table">
                        <thead>
                        <th>USER_ID</th>
                        <th>USERNAME</th>
                        <th>E-MAIL</th>
                        <th>E-MAIL VERIFIED</th>
                        <th>ACTIVATE</th>
                        </thead>
                        <tbody>
                        <?php
                        $USERS = $System->mysql->QUERY('SELECT * , (SELECT ACTIVATION_CODE FROM server_verfiy WHERE server_verfiy.USER_ID = users.USER_ID ORDER BY SEND_DATE DESC LIMIT 1) AS ACTIVATION_CODE FROM users  ORDER BY USER_ID DESC');

                        foreach ($USERS as $USER) {
                            ?>
                            <tr>
                                <td><?= $USER['USER_ID'] ?></td>
                                <td><?= $USER['USERNAME'] ?></td>
                                <td><?= $USER['EMAIL'] ?></td>
                                <td><?php if ($USER['VERFIED'] == 0) {
                                        print 'No';
                                    } else {
                                        if ($USER['VERIFIED'] == 1) {
                                            echo 'Yes';
                                        }
                                    } ?></td>
                                <td><a href="<?= PROJECT_HTTP_ROOT ?>confirm.php?code=<?= $USER['ACTIVATION_CODE'] ?>">Activate</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="message">
                <h3><b>Mass</b> Message</h3>

                <form action="" id="lol" method="POST">
                    <input type="hidden" name="action" value="send_message">
                    <strong><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></strong>

                    <textarea id="editornew"
                              name="Content"
                              value=""
                              style="color:black;width: 700px; height: 200px;"
                              placeholder="Message..."></textarea>
                    <input id="send"
                           type="submit"
                           name="send"
                           style="margin-left:350px; color : #000;"
                           value="Send Message" />
                </form>
            </div>

            <div role="tabpanel" class="tab-pane" id="code">
                <h3><b>Voucher</b> Codes</h3>
                <div class="invitation-code-list custom-scroll">
                    <table class="table">
                        <thead>
                        <th>ID</th>
                        <th>CODE</th>
                        <th>DESCRIPTION</th>
                        <th>REWARD</th>
                        <th>AMOUNT</th>
                        </thead>
                        <tbody>
                        <?php
                        $VOUCHER = $System->mysql->QUERY('SELECT * FROM do_server_ge1.server_voucher_codes ORDER BY ID ASC');

                        foreach ($VOUCHER as $i) {
                            $id   = $i['REWARD'];
                            $name = $System->Shop->getItemInfo($id);

                            if ( !is_numeric($id)) {
                                $Item = $i['REWARD'];
                            } else {
                                $Item = $name[0]['NAME'];
                            }
                            ?>
                            <tr>
                                <td><?= $i['ID'] ?></td>
                                <td><?= $i['CODE'] ?></td>
                                <td><?= $i['CODE_DESC'] ?></td>
                                <td><?php echo $Item; ?></td>
                                <td><?= $i['AMOUNT'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="invitation-insert-form">
                    <h3><b>Create Voucher</b> Code</h3>
                    <form method="get" action="">
                        <input type="hidden" value="create_vc" name="sub_action">
                        <input class="form-ctrl" style="color:black" name="CODE" placeholder="Voucher Code">
                        <input class="form-ctrl" name="CODE_DESC" placeholder="Code Description">
                        <select name="code_reward" class="form-ctrl">
                            <option style="text-align:right;color:black;" selected="selected" hidden>Reward</option>
                            <option style="text-align:right;color:black;" value="uridium">Uridium</option>
                            <?php $cat = $System->Shop->getSpecialRewards();
                            foreach ($cat as $cats => $c) { ?>
                                <option style="text-align:right;color:black;"
                                        value="<?= $c['ID'] ?>"><?= $c['NAME']; ?></option>
                            <?php } ?>
                        </select>
                        <input class="form-ctrl" name="code_q" type="number" placeholder="Quantity">
                        <input class="btn-primary btn-block btn-lg" type="submit" value="Create">
                    </form>
                    <h3><b>Send Voucher</b> Code</h3>
                    <form method="get" action="">
                        <input type="hidden" value="send_vc" name="sub_action">
                        <input class="form-control" name="CODE_ID" placeholder="Code Name NOT CODE ID">
                        <input class="btn-primary btn-block btn-lg" type="submit" value="Send Code">
                    </form>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="events">
                <h3><b>Events</b></h3>
                <div class="tdm">
                    <label class="font12">TeamDeathMatch</label>
                    <input type="text" placeholder="Hours" class="timeset">
                    <button class="start">START</button>
                </div>

                <div class="spaceball">
                    <label class="font12">SpaceBall</label>
                    <input type="text" placeholder="Hours" class="timeset">
                    <button class="start">START</button>
                </div>

                <div class="jb">
                    <label class="font12">JackpotBattle</label>
                    <input type="text" placeholder="Hours" class="timeset">
                    <button class="start">START</button>
                </div>

                <div class="jp-list">

                    <table class="users">
                        <thead>
                        <tr>
                            <th>UID</th>
                            <th>USERNAME</th>
                            <th>REMOVE</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>15</td>
                            <td>INFINITY</td>
                            <td>
                                <button class="remove">START</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="chat">
                <h3><b>Chat</b> ACP</h3>
                <div class="chat-nav">
                    <button class="chat-button">Global EN</button>
                    <button class="chat-button">EIC</button>
                    <button class="chat-button">Clan</button>
                </div>

                <div class="chat-content">
                    <div class="message">
                        <label class="chat-username system">System: </label><label class="chat-message system">Welcome
                                                                                                               to the
                                                                                                               Global EN
                                                                                                               chat</label>
                    </div>
                    <div class="message">
                        <label class="chat-username admin">INFINITY: </label><label class="chat-message admin">Hey
                                                                                                               all!</label>
                    </div>
                    <div class="message">
                        <label class="chat-username mod">Mod_Dragon: </label><label class="chat-message mod">Hello
                                                                                                             here</label>
                    </div>
                    <div class="message">
                        <label class="chat-username">Anonymous: </label><label class="chat-message">Fuck you bitch this
                                                                                                    is amazing</label>
                    </div>
                    <div class="message">
                        <label class="chat-username whisper">Mod_Dragon
                                                             Whispers: </label><label class="chat-message whisper">Can i
                                                                                                                   ban
                                                                                                                   him
                                                                                                                   for
                                                                                                                   fun
                                                                                                                   xd?</label>
                    </div>

                </div>
                <input type="text" class="chat-input">

                <div class="right-menu">
                    <div class="users-list">
                        <table class="list">
                            <thead>
                            <tr>
                                <th>Admins</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="color admin">Shock</td>
                            </tr>
                            <tr>
                                <td class="color admin">INFINITY</td>
                            </tr>
                            <tr>
                                <th>mods</th>
                            </tr>
                            <tr>
                                <td class="color mod">mod</td>
                            </tr>
                            <tr>
                                <td class="color mod">mod</td>
                            </tr>
                            <tr>
                                <th>players</th>
                            </tr>
                            <tr>
                                <td class="color player">player</td>
                            </tr>
                            <tr>
                                <td class="color player">player</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
