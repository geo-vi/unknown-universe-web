<?php
include( 'internalModal.php' );

$msgID = null;

if (isset($_GET["ID"])) {
    $msgID = $_GET["ID"];
}

if (isset($_GET["UID"])) {
    $msgID = $_GET["UID"];
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
            <?php if ($msgID !== null) {
                ?>
                <h3 class='pull-left'><span class='fas fa-chevron-left'><a href='internalMessaging'> Back</a></span>
                </h3>
                <?php
            } else {
                ?>
                <h3 class='pull-left'>Messaging</h3>
                <?php
            } ?>

            <h3 class='pull-right cursor-pointer'>
                <a data-toggle="modal" data-target="#composeMessageModal">
                    New Message
                </a>
            </h3>
        </div>

        <div class="tab-content">

            <div role="tabpanel" class="tab-pane active" id="inbox">
                <?php
                if ($msgID === null) {
                    ?>
                    <form name="msgForm" id="msgForm" method="post">
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
                            $msgCount = count($messages);
                            $i        = 0;
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
                                        <a href='#'
                                           id='delete-msg-<?= $i ?>'
                                           name='deleteMsg'
                                           data-fpid="<?= $message['ID'] ?>">
                                            <b>Delete</b>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </form>
                    <?php
                } else {
                    $message = $System->User->messageInfo($msgID);
                    if ($message) {
                        $System->User->markRead($msgID);
                        ?>
                        <div class='message-details'>
                            <h4><b>SUBJECT: </b><?php print $message['HEADER']; ?></h4>
                            <br />
                            <h4><b>MESSAGE:</b></h4>
                            <div><?php print $message['MESSAGE']; ?></div>
                            <br />
                            <?php print date("d/m/Y h:i:s", strtotime($message['DATE']));
                            print ' by ';
                            if ($message['SENDER'] == 1) {
                                print 'System';
                            } else {
                                print $System->User->getName($message['SENDER']);
                            } ?>
                            <br>
                            <div id="replyForm">
                                <input type="hidden" id='replyRecipient' value="<?php print $message['SENDER']; ?>">
                                <input type="hidden" id='replyHeader' value="RE: <?php print $message['HEADER']; ?>">
                                <label for='replyMsg'></label>
                                <textarea id="replyMsg" name="Content"></textarea>
                                <br>
                                <button id="sendReply"
                                        name="sendReply"
                                        class="btn-lg btn-block btn-primary reply-btn">
                                    Send Message
                                </button>
                            </div>
                        </div>
                        <?php
                    }
                } ?>
            </div>

            <div role="tabpanel" class="tab-pane" id="outbox">
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
                                    <th>RECIPIENT</th>
                                    <th>DATE</th>
                                    <th>ACTIONS</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $messages  = $System->User->outbox();
                                $sentCount = count($messages);
                                $j         = 0;
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
                                        <td><?php print date("d/m/Y h:i:s", strtotime($message['DATE'])); ?></td>
                                        <td>
                                            <a href="?ID=<?php print $message['ID'] ?>"
                                               onclick="openMessage();" name="messageid"
                                               style="color:transparent;">
                                                <b>View</b>
                                            </a>
                                            -
                                            <a href="#" id="delete-sent-<?= $j ?>" data-fpid="<?= $message['ID'] ?>">
                                                <b>Delete</b></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $j++;
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

    ClassicEditor.create(document.querySelector('#replyMsg'))
        .then(editor => {
            window.replyEditor = editor;
        });

    function openMessage() {
        document.getElementById('Message').submit();
        return false;
    }

    // delete action for inbox
    <?php if ( !isset($msgCount))
        $msgCount = 0; ?>
    $('<?php for ($i = $msgCount; $i >= 0; $i--) {
            if ($i > 0) {
                print '#delete-msg-' . $i . ', ';
            } else {
                print '#delete-msg-0';
            }
        } ?>'
    ).click(function (e) {
        console.log('clicked');
        e.preventDefault();

        const mID = $(this).data("fpid");
        sendCoreRequest(
            'messaging',
            'delete',
            { mID: mID },
            () => setTimeout(location.reload.bind(location), 1000)
        );
    });

    // delete action for outbox
    <?php if ( !isset($sentCount))
        $sentCount = 0; ?>
    $('<?php for ($j = $sentCount; $j >= 0; $j--) {
            if ($j > 0) {
                print '#delete-sent-' . $j . ', ';
            } else {
                print '#delete-sent-0';
            }
        } ?>'
    ).click(function (e) {
        console.log('clicked');
        e.preventDefault();

        const mID = $(this).data("fpid");
        sendCoreRequest(
            'messaging',
            'delete_outbox',
            { mID: mID },
            () => setTimeout(location.reload.bind(location), 1000)
        );
    });

    $('#sendReply').click(function (e) {
        e.preventDefault();

        if (window.replyEditor) {
            window.replyEditor.updateSourceElement();
        }

        let data = {
            recipient: $('#replyRecipient').val(),
            content: $('#replyMsg').val(),
            title: $('#replyHeader').val()
        };

        sendCoreRequest('messaging', 'reply', data, function () {
            $('#replyContent').val('');

            window.replyEditor.setData('');
        });
    });

</script>
