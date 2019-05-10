<?php
/**
 * Created by PhpStorm.
 * User: savasyildirim
 * Date: 10.03.2019
 * Time: 23:01
 */

$userShipQuery = $serverSQL->QUERY("SELECT * FROM player_data WHERE USER_ID = ?", array($_SESSION['USER_ID']));
if (!count($userShipQuery) > 0) {
    response(array('success' => false, 'message' => 'Account not found.'));
}

$userShip = $userShipQuery[0];

$postShipName = trim($_POST['txtShipName']);

if ($userShip['PLAYER_NAME'] != $postShipName) {
    $checkUsername = $serverSQL->QUERY("SELECT * FROM player_data WHERE PLAYER_NAME = ?", array($postShipName));
    if (count($checkUsername) > 0) {
        response(array('success' => false, 'message' => 'Ship Name already exists.'));
    } else {
        if ($serverSQL->QUERY("UPDATE player_data SET PLAYER_NAME = ? WHERE USER_ID= ?",
            array($postShipName, $_SESSION['USER_ID']))
        ) {
            response(array('success' => true, 'message' => 'Ship name is changed!'));
        } else {
            response(array('success' => false, 'message' => 'Error. Please contact support with code: SNQE1'));
        }
    }
} else {
    response(array('success' => true, 'message' => 'Ship name is changed!'));
}