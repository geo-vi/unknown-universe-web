<?php
include_once ('./core/core.php');

if(!isset($_GET['code'])){
    $System->error_handler->throwError('verification_failed_invalid_code');
}
else{
    if($System->verifyEmail($_GET['code'])){
        $System->error_handler->throwError('email_confirmed');
    }
}