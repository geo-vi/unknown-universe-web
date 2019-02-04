<?php
include("./core/core.php");

if (isset($_GET["l"])) {
    if ($System->isLoggedIn()) {
        $System->logging->addLog(
            $System->User->__get('USER_ID'),
            $System->User->__get('PLAYER_ID'),
            $System->User->__get('SERVER_DB'),
            "You successfully logged out! From: " . $System->getUserIP()
        );

        if ($System->Logout()) {
            $System->error_handler->throwError(ErrorID::LOGGED_OUT);
        }
    }
} else {
    if (isset($_POST["username"]) && isset($_POST["password"])) {

        if ($System->isLoggedIn()) {
            $System->Logout();
        }

        if ($System->Login($_POST["username"], $_POST["password"])) {
            if ($System->isLoggedIn()) {
                $System->logging->addLog(
                    $System->User->__get('USER_ID'),
                    $System->User->__get('PLAYER_ID'),
                    $System->User->__get('SERVER_DB'),
                    "You successfully logged in! From: " . $System->getUserIP()
                );

                header("location: internalStart");
            }
        } else {
            $System->error_handler->throwError(ErrorID::FAILED_LOGIN);
        }
    } else {
        if ($System->isLoggedIn()) {
            header("location: internalStart");
        } else {
            Utils::dieS(400, 'Please enter your login details!');
        }
    }
}
