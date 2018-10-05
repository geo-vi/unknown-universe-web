<?php
include("./core/core.php");

if(isset($_GET["l"])){
    if($System->isLoggedIn()) {
        $System->logging->addLog(
            $System->User->USER_ID,
            $System->User->PLAYER_ID,
            $System->User->SERVER_DB,
            "You successfully logged out! From: " . $System->getUserIP()
        );

        if($System->Logout()){
            $System->error_handler->throwError('logged_out');
        }
    }
}else if (isset($_POST["loginUsername"]) && isset($_POST["loginPassword"])){

    if($System->isLoggedIn())  $System->Logout();

    if($System->Login($_POST["loginUsername"],$_POST["loginPassword"])){
        if($System->isLoggedIn()){
            $System->logging->addLog(
                $System->User->USER_ID,
                $System->User->PLAYER_ID,
                $System->User->SERVER_DB,
                "You successfully logged in! From: ".$System->getUserIP()
            );

            header("location: internalStart");
        }
    }else{
        $System->error_handler->throwError('fail_login');
    }
}
else{
    if($System->isLoggedIn()){
        header("location: internalStart");
    }else{
       $System->error_handler->throwError('fail_login');
    }
}