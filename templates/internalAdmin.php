<?php
if(isset($_GET['sub_action']) && !empty($_GET['sub_action'])){
    $action = $_GET['sub_action'];

    if($action == 'create_inv'){
        if(isset($_GET['CODE']) && !empty($_GET['CODE'])){
            if($System->mysql->QUERY('INSERT INTO server_invitations (CODE) VALUES (?)', array($_GET['CODE']))){
                ?>
                <script>swal('Success!','Code: <?=$_GET['CODE']?> created!', 'success');</script>
                <?php
            }else{
                ?>
                <script>swal('Error!','Something went wrong!', 'error');</script>
                <?php
            }
        }else{
            ?>
            <script>swal('Error!','Invalid Code, it cant be empty!', 'error');</script>
            <?php
        }
    }
}

?>
<div class="page-content clearfix">
    <div class="col-xs-3 admin-menu-container">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#invitations" aria-controls="invitations" role="tab" data-toggle="tab">Invitations</a></li>
            <li role="presentation"><a href="#lookup" aria-controls="lookup" role="tab" data-toggle="tab">Player LookUp</a></li>
        </ul>
    </div>
    <div class="col-xs-9 admin-content">

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="invitations">
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

                        foreach ($INVITATIONS as $INVITATION){
                            ?>
                            <tr>
                                <td><?=$INVITATION['ID']?></td>
                                <td><?=$INVITATION['CODE']?></td>
                                <td><?=$INVITATION['USED']?></td>
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

                        foreach ($USERS as $USER){
                            ?>
                            <tr>
                                <td><?=$USER['USER_ID']?></td>
                                <td><?=$USER['USERNAME']?></td>
                                <td><?=$USER['EMAIL']?></td>
                                <td><?=$USER['VERFIED']?></td>
                                <td><a href="<?=PROJECT_HTTP_ROOT?>confirm.php?code=<?=$USER['ACTIVATION_CODE']?>">Activate</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>