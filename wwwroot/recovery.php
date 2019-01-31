<?php
include_once('./core/core.php');

header('Content-Type: application/json');

$PARAMS = [
    "username" => "Username",
    "email" => "Email",
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
    http_response_code(400);
    die(json_encode(["message" => "Fill out " . implode(', ', $MISSING) . "!"]));
}

// VALIDATE GOOGLE_RECAPTCHA
$RECAPTCHA_RESPONSE = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . GOOGLE_CAPTCHA_KEY . '&response=' . $_POST['g-recaptcha-response']));
if (!$RECAPTCHA_RESPONSE->success) {
    http_response_code(400);
    die(json_encode(["message" => "Check your ReCaptcha!"]));
}

if ($System->sendRecovery($_POST['username'], $_POST['email'])) {
    die(json_encode(["message" => "Recovery email sent, please check your inbox!"]));
} else {
    http_response_code(400);
    die(json_encode(["message" => "Something went wrong while sending the email, please try again later."]));
}
