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
    Utils::dieS(400, 'Fill out ' . implode(', ', $MISSING) . '!');
}

// VALIDATE GOOGLE_RECAPTCHA
$RECAPTCHA_RESPONSE = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . GOOGLE_CAPTCHA_KEY . '&response=' . $_POST['g-recaptcha-response']));
if (!$RECAPTCHA_RESPONSE->success) {
    Utils::dieS(400, 'Check your ReCaptcha!');
}

if ($System->sendRecovery($_POST['username'], $_POST['email'])) {
    Utils::dieM('Recovery email sent, please check your inbox!');
} else {
    Utils::dieS(500, 'Something went wrong while sending the email, please try again later.');
}
