<?php
include_once('./core/core.php');

//header("Access-Control-Allow-Origin : *");
//header("Access-Control-Allow-Credentials : true");
header('Content-Type: application/json');

$PARAMS = [
    "recoveryUsername"     => "Username",
    "recoveryEmail"        => "E-Mail",
    "g-recaptcha-response" => "ReCaptcha",
];

$MISSING = [];
foreach ($PARAMS as $FIELD_NAME => $PARAM) {
    if (!isset($_POST[$FIELD_NAME]) || empty($_POST[$FIELD_NAME])) {
        $MISSING[] = $PARAM;
    }
}


// MISSING PARAMETERS
if (!empty($MISSING)) {
    die(json_encode(["error" => true, "error_msg" => "Fill out " . implode(', ', $MISSING) . "!"]));
}

// VALIDATE GOOGLE_RECAPTCHA
$RECAPTCHA_RESPONSE = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . GOOGLE_CAPTCHA_KEY . '&response=' . $_POST['g-recaptcha-response']));
if (!$RECAPTCHA_RESPONSE->success) {
    die(json_encode(["error" => true, "error_msg" => "Check your ReCaptcha!"]));
}

if ($System->sendRecovery($_POST['recoveryUsername'], $_POST['recoveryEmail'])) {
    die(json_encode(["error" => false, "msg" => "Recovery email sent, please check your inbox!"]));
} else {
    die(json_encode(["error" => true, "error_msg" => "Something went wrong while sending the email, please try again later."]));
}