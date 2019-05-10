<?php
include_once('./core/core.php');

if (isset($_GET['code'])) {
    if ($System->verifyEmail($_GET['code'])) {
        $System->error_handler->throwError(ErrorID::EMAIL_COMPLETE);
    }
} else {
    $System->error_handler->throwError(ErrorID::VERIFICATION_FAILED);
}
