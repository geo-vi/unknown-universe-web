<?php
include( 'internalModal.php' );

$arg = 0;
if (isset($_GET["ID"])) {
    if ( !is_numeric($arg)) {
        $arg = 0;
    } else {
        $arg = $_GET["ID"];
    }
}

if (isset($_GET["UID"])) {
    if ( !is_numeric($arg)) {
        $arg = 0;
    } else {
        $arg = $_GET["UID"];
    }
}

?>

<div class="page-content clearfix">
    <div class="col-xs-3 msg-menu-container">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#inbox" aria-controls="inbox" role="tab" data-toggle="tab">Inbox</a>
            </li>
            <li role="presentation">
                <a href="#outbox" aria-controls="outbox" role="tab" data-toggle="tab">Outbox</a>
            </li>
            <li role="presentation">
                <a href="#contacts" aria-controls="contacts" role="tab" data-toggle="tab">Contacts</a>
            </li>
            <li role="presentation">
                <a href="#blacklist" aria-controls="blocklist" role="tab" data-toggle="tab">Block list</a>
            </li>
        </ul>
    </div>
    <div class="col-xs-9 msg-content">
        <div class='msg-header'>
            <h3 class='pull-left'>Messaging</h3>

            <h3 class='pull-right cursor-pointer'>
                <a data-toggle="modal" data-target="#composeMessageModal">
                    New Message
                </a>
            </h3>
        </div>

        <div class="tab-content">

            <div role="tabpanel" class="tab-pane active" id="inbox">
                <form name="Message" id="Message" action="" method="post">
                    <?php
                    if ( !isset($_GET['ID'])) {
                        ?>
                        <input type="hidden" name="action" value="open_message">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>HEADER</th>
                                <th>SENDER</th>
                                <th>DATE</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $messages = $System->User->messages();
                            foreach ($messages as $messagei => $message) {
                                $sender = $message['SENDER']
                                ?>
                                <tr>
                                    <td>
                                        <a href="?ID=<?= $message['ID'] ?>"
                                           onclick="openMessage();"
                                           name="messageid"
                                            <?php if ($message['NEW'] == 1) {
                                                print 'class="msg-unread"';
                                            } else {
                                                print 'class="msg-read"';
                                            } ?>
                                        >
                                            <?= $message['HEADER']; ?>
                                        </a>
                                    </td>

                                    <td><?php if ($message['SENDER'] == 1) {
                                            print 'System';
                                        } else {
                                            echo $System->User->getName($sender);
                                        } ?></td>
                                    <td><?php print date("d/m/Y h:i:s", strtotime($message['DATE'])); ?></td>
                                    <td>
                                        <a href="?ID=<?php print $message['ID'] ?>"
                                           onclick="openMessage();" name="messageid"
                                           style="color:transparent;">
                                            <b>View</b>
                                        </a>
                                        -
                                        <a href="#" id="delmessageid" data-fpid="<?= $message['ID'] ?>">
                                            <b>Delete</b>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        $messages = [];
                        $messages = $System->User->messageInfo($arg);
                        foreach ($messages as $messagei => $message) {
                            $System->User->markRead($arg);
                            ?>
                            <div><h3><b><?php print $message['HEADER']; ?></b></h3></div>
                            <br>
                            <div><?php print $message['MESSAGE']; ?></div>
                            <br>
                            <?php print date("m/d/Y h:i:s", strtotime($message['DATE']));
                            print ' by ';
                            if ($message['SENDER'] == 1) {
                                print 'System';
                            } else {
                                $System->User->getName($message['SENDER']);
                            } ?>
                            <form action="" id="lol" method="POST">
                                <input type="hidden" name="action" value="reply_message">
                                <input type="hidden" name="replyto" value="<?php print $message['SENDER']; ?>">
                                <input type="hidden" name="title" value="<?php print $message['HEADER']; ?>">
                                <strong><label for='editornew'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></strong>
                                <textarea id="editornew"
                                          name="Content"
                                          style="width: 550px; height: 100px; color: #000;"></textarea>
                                <input id="send"
                                       type="submit"
                                       name="send"
                                       style="color : #000;"
                                       value="Send Message" />
                            </form>
                        <?php }
                    } ?>
                </form>
            </div>

            <div role="tabpanel" class="tab-pane" id="outbox">
                <?php
                if ( !isset($_GET['UID'])) {
                    ?>
                    <h3><b>Outbox</b></h3>
                <?php } ?>
                <div class="invitation-code-list custom-scroll">
                    <form name="Message" id="Message" action="" method="post">
                        <?php
                        if ( !isset($_GET['UID'])) {
                            ?>
                            <input type="hidden" name="action" value="open_message">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>HEADER</th>
                                    <th>TO</th>
                                    <th>DATE</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $messages = $System->User->outbox();
                                foreach ($messages as $messagei => $message) {
                                    $uid = $message['USER_ID'];
                                    ?>
                                    <tr>
                                        <td>
                                            <a href=""
                                               onclick="openMessage();"
                                               name="messageid"
                                               style="color:transparent;">
                                                <b> <?= $message['HEADER']; ?></b>
                                            </a>
                                        </td>
                                        <td><?php if ($uid == 1) {
                                                print 'System';
                                            } else {
                                                echo $System->User->getName($uid);
                                            } ?></td>
                                        <td><?php print date("m/d/Y h:i:s", strtotime($message['DATE'])); ?></td>
                                        <td>
                                            <a href="?ID=<?php print $message['ID'] ?>"
                                               onclick="openMessage();" name="messageid"
                                               style="color:transparent;">
                                                <b>View</b>
                                            </a>
                                            -
                                            <a href="#" id="delmessageid" data-fpid="<?= $message['ID'] ?>">
                                                <b>Delete</b></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                        }
                        ?>
                    </form>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="contacts">
                <div class="invitation-code-list custom-scroll">
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="blacklist">
                <div class="invitation-code-list custom-scroll">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function openMessage() {
        document.getElementById('Message').submit();
        return false;
    }

    $('#delmessageid').click(function () {

        var mID = $(this).data("fpid");
        $.ajax({
            type: "POST",
            url: "",
            data: { action: 'delmessage', mID: mID },
            success: function () {
                swal('Success!', 'Deleted message!', 'success');
                setTimeout(location.reload.bind(location), 1000);
            },
            error: function () {
                console.log(data);
            }
        });
    });

</script>
