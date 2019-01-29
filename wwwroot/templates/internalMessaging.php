<?php
include('internalSettings.php');
    $arg = 0;
     if (isset($_GET["ID"])){
        if(!is_numeric($arg)){
        $arg = 0;
    } else { 
        $arg=$_GET["ID"]; 
    }
    }

    if (isset($_GET["UID"])){
        if(!is_numeric($arg)){
        $arg = 0;
    } else { 
        $arg=$_GET["UID"]; 
    }
    }

    if(isset($_POST['action']) && $_POST['action'] == 'reply_message')
    {
        $System->User->sendMessage($_POST['replyto'], $_POST['Content'], $_POST['title']);
        ?> <center><div>Message successfully sent</div></center><?php
    }
    if(isset($_POST['action']) && $_POST['action'] == 'delmessage'){
        $System->User->delmessage($_POST['mID']);
        echo "<script>swal('Success!', 'Deleted message!', 'success')</script>";
    }
?>
<div class="page-content clearfix">
    <div class="col-xs-3 Messaging-menu-container">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#inbox" aria-controls="inbox" role="tab" data-toggle="tab">Inbox</a></li>
            <li role="presentation"><a href="#outbox" aria-controls="outbox" role="tab" data-toggle="tab">Outbox</a></li>
            <li role="presentation"><a href="#contacts" aria-controls="contacts" role="tab" data-toggle="tab">Contacts</a></li>
            <li role="presentation"><a href="#blocklist" aria-controls="blocklist" role="tab" data-toggle="tab">Block list</a></li>
        </ul>
    </div>
    <div class="col-xs-9 Messaging-content">

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="inbox">
                <?php
                         if(!isset($_GET['ID'])){
                        ?>
                <h3><b>Inbox</b><b style="margin-left:400px; font-size: 14px; text-decoration: #00d9ff;"> <a style="cursor: pointer;" data-toggle="modal"
                                                                  data-target="#myModalMessage">New Message</a></b></h3>
            <?php } ?>
                <div class="invitation-code-list custom-scroll">
                    <form name="Message" id="Message" action="" method="post">
                        <?php 
                         if(!isset($_GET['ID'])){
                        ?>
                        <input type="hidden" name="action" value="open_message">
                            <table class="table">
                                <thead>
                                <th>HEADER</th>
                                <th>SENDER</th>
                                <th>DATE</th>
                                <th>action</th>
                                </thead>
                                <tbody>
                                <?php
                                $messages = $System->User->messages();
                                foreach ($messages as $messagei => $message) {
                                    $argg = $message['SENDER']
                                    ?>
                                    <tr>
                                        <td><a href="?ID=<?php print $message['ID']?>" onclick="openMessage();" name="messageid" value="<?= $message['ID'] ?>" style="color:transparent;"><b> <?= $message['HEADER']; ?></b></a></td>

                                        <td><?php if($message['SENDER'] == 1)
                                            {
                                                print 'System';
                                            } else {
                                            echo $System->User->getName($argg);
                                        } ?></td>
                                        <td><?php print date("m/d/Y h:i:s", strtotime($message['DATE'])); ?></td>
                                        <td><a href="?ID=<?php print $message['ID']?>"
                                               onclick="openMessage();" name="messageid"
                                               value="<?= $message['ID'] ?>"
                                               style="color:transparent;"><b>View</b></a> -
                                            <a href="#" id="delmessageid" data-fpid="<?= $message['ID']?>">
                                                <b>Delete</b></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                        }else{
                                $messages = [];
                                $messages = $System->User->messageInfo($arg);
                                foreach ($messages as $messagei => $message) {
                                    $System->User->markRead($arg);
                        ?>
                        <center><div><h3><b><?php print $message['HEADER']; ?></b></h3></div><br>
                            <div><?php print $message['MESSAGE']; ?></div><br>
                        <?php print date("m/d/Y h:i:s", strtotime($message['DATE'])); print ' by '; if($message['SENDER'] == 1){ print 'System'; } else {$System->User->getName($message['SENDER']); } ?>
                            <form action=""  id="lol" method="POST">
                                <input type="hidden" name="action" value="reply_message">
                                <input type="hidden" name="replyto" value="<?php print $message['SENDER']; ?>">
                                <input type="hidden" name="title" value="<?php print $message['HEADER'];?>">
                                <strong><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></strong>
                                    <textarea id="editornew" name="Content" style="width: 550px; height: 100px; color: #000;" ></textarea>
                                    <center style="margin-bottom:10px;">
                                <input id="send" type="submit" name="send"  style="color : #000;" value="Send Message" /></center> 
                            </form> 
                        </center>
                        <?php }
                        } ?>
                    </form>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="outbox">
                <?php 
                         if(!isset($_GET['UID'])){
                        ?>
                <h3><b>Outbox</b></h3>
            <?php } ?>
                <div class="invitation-code-list custom-scroll">
                    <form name="Message" id="Message" action="" method="post">
                        <?php 
                         if(!isset($_GET['UID'])){
                        ?>
                        <input type="hidden" name="action" value="open_message">
                            <table class="table">
                                <thead>
                                <th>HEADER</th>
                                <th>TO</th>
                                <th>DATE</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                <?php
                                $messages = $System->User->outbox();
                                foreach ($messages as $messagei => $message) {
                                    $uid = $message['USER_ID'];
                                    ?>
                                    <tr>
                                        <td><a href="" onclick="openMessage();" name="messageid" value="<?= $message['ID'] ?>" style="color:transparent;"><b> <?= $message['HEADER']; ?></b></a></td>
                                        <td><?php if($uid == 1)
                                            {
                                                print 'System';
                                            } else { echo $System->User->getName($uid); } ?></td>
                                        <td><?php print date("m/d/Y h:i:s", strtotime($message['DATE'])); ?></td>
                                        <td><a href="?ID=<?php print $message['ID']?>"
                                               onclick="openMessage();" name="messageid"
                                               value="<?= $message['ID'] ?>"
                                               style="color:transparent;"><b>View</b></a> -
                                            <a href="#" id="delmessageid" data-fpid="<?= $message['ID']?>">
                                                <b>Delete</b></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                        }else{
                        } ?>
                    </form>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="contacts">
                <h3><b>Contacts</b></h3>
                <div class="invitation-code-list custom-scroll">
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="blocklist">
                <h3><b>Block</b> List</h3>
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

jQuery('#delmessageid').click(function() {

    var mID = $(this).data("fpid");
    jQuery.ajax({
        type: "POST",
        url: "",
        data: { action: 'delmessage' , mID: mID },
        success: function(){
            swal('Success!', 'Deleted message!', 'success');
            setTimeout(location.reload.bind(location), 1000);
        },
        error: function(){
            console.log(data);
        }
    });
});
</script>