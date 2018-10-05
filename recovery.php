<?php
include_once ('./core/core.php');

//header("Access-Control-Allow-Origin : *");
//header("Access-Control-Allow-Credentials : true");
header('Content-Type: application/json');

$PARAMS = [
    "recoveryUsername" => "Username",
    "recoveryEmail" => "E-Mail",
    "g-recaptcha-response" => "ReCaptcha",
];

$MISSING = [];
foreach ($PARAMS as $FIELD_NAME => $PARAM){
    if(!isset($_POST[$FIELD_NAME]) || empty($_POST[$FIELD_NAME])) $MISSING[] = $PARAM;
}

