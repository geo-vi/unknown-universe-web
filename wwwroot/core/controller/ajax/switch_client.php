<?php
/**
 * Created by PhpStorm.
 * User: savasyildirim
 * Date: 11.03.2019
 * Time: 12:16
 */

$version = 0;
if (isset($_POST['value'])) {
    if ($_POST['value'] == 'true') {
        $version = 1;
    }
}

if ($serverSQL->QUERY("UPDATE player_extra_data SET CLIENT_VERSION = ? WHERE USER_ID= ?",
    array($version, $_SESSION['USER_ID']))
) {
    response(array('success' => true, 'message' => 'Version is changed!'));
} else {
    response(array('success' => false, 'message' => 'Error. Please contact support with code: SPED1'));
}