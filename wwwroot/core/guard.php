<?php
/* Check if User logged-in
***************************/

if (!$System->isLoggedIn()) {
    //if not logged-in go to Login
    header('location: ' . LOGIN_PAGE);
    die();
} else {
    if (isset($userData) && $userData !== null && is_array($userData)) {
        unset($userData);
    }

    $userData = $System->getUserInfo();

    if (!isset($userData)) {
        $System->Logout();
        header('location: ' . LOGIN_PAGE);
        die();
    }
}