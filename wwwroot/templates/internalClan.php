<?php

include_once('internalModal.php');
?>

<script src="<?= PROJECT_HTTP_ROOT ?>resources/js/clan.js"></script>
<script>
    $(document).ready(function () {
        new clan(
            <?=$System->User->__get('USER_ID')?>,
            <?=$System->User->__get('PLAYER_ID')?>
        );
    });
</script>

<?php
if ($System->User->__get('CLAN_ID') == 0) {
    include_once( "internalClan/internalClanFree.php" );
} else {
    include_once( "internalClan/internalClanInfo.php" );
}
?>