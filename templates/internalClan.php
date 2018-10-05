<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($System->User->CLAN_ID == 0) {
    include_once("internalClan/internalClanFree.php");
} else {
    include_once("internalClan/internalClanInfo.php");
}
?>