<?php
include_once ('./core/core.php');

//header("Access-Control-Allow-Origin : *");
//header("Access-Control-Allow-Credentials : true");
header('Content-Type: application/json');

$PARAMS = [
    "registerUsername" => "Username",
    "registerEmail" => "E-Mail",
    "registerPassword" => "Password",
    "g-recaptcha-response" => "ReCaptcha",
];

if(NEED_INVITATION){
    $PARAMS["registerInvation"] = "Invitation Code";
}

$MISSING = [];
foreach ($PARAMS as $FIELD_NAME => $PARAM){
    if(!isset($_POST[$FIELD_NAME]) || empty($_POST[$FIELD_NAME])) $MISSING[] = $PARAM;
}


//MISSING PARAMETERS
if(!empty($MISSING)) die(json_encode(["error" => true, "error_msg" => "Fill out ".implode(', ',$MISSING)."!"]));

//VALIDATE GOOGLE_RECAPTCHA
$RECAPTCHA_RESPONSE = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.GOOGLE_CAPTCHA_KEY.'&response='.$_POST['g-recaptcha-response']));
if(!$RECAPTCHA_RESPONSE->success){
    die(json_encode(["error" => true, "error_msg" => "Check your ReCaptcha!"]));
}

//VALIDATE USERNAME
if(strlen($_POST['registerUsername']) < USERNAME_MIN_LENGTH){
    die(json_encode(["error" => true, "error_msg" => "Your chosen username is to short! Min length: ".USERNAME_MIN_LENGTH]));
}

if(strlen($_POST['registerUsername']) > USERNAME_MAX_LENGTH){
    die(json_encode(["error" => true, "error_msg" => "Your chosen username is to long! Max length: ".USERNAME_MAX_LENGTH]));
}

if(!$System->validate->isValidString($_POST['registerUsername'], ALLOWED_CHARS)){
    die(json_encode(["error" => true, "error_msg" => "Your username can only contain [a-Z][0-9][".implode(',', ALLOWED_CHARS)."]!"]));
}

if($System->validate->isUserByUsername($_POST['registerUsername'])){
    die(json_encode(["error" => true, "error_msg" => "Your chosen username is already taken!"]));
}

//VALIDATE PASSWORD
if(strlen($_POST['registerPassword']) < PASSWORD_MIN_LENGTH){
    die(json_encode(["error" => true, "error_msg" => "Your chosen password is to short! Min length: ".PASSWORD_MIN_LENGTH]));
}

if($_POST['registerPassword'] == $_POST['registerUsername']){
    die(json_encode(["error" => true, "error_msg" => "Your Username shouldnt be your password..."]));
}

//VALIDATE EMAIL
if(!filter_var($_POST['registerEmail'], FILTER_VALIDATE_EMAIL)){
    die(json_encode(["error" => true, "error_msg" => "Your E-Mail is invalid!"]));
}

if(strpos($_POST['registerEmail'], 'hotmail.com') !== false || strpos($_POST['registerEmail'], 'hotmail.de') !== false || strpos($_POST['registerEmail'], ' freemail.hu') !== false || strpos($_POST['registerEmail'], 'outlook.de') !== false || strpos($_POST['registerEmail'], 'outlook.com') !== false){
    die(json_encode(["error" => true, "error_msg" => "We can't support hotmail.com , hotmail.de,  freemail.hu, outlook.de, outlook.com e-mails!"]));
}

if($System->validate->isUserByEmail($_POST['registerEmail'])){
    die(json_encode(["error" => true, "error_msg" => "Your E-Mail is already taken! May try forgot password!"]));
}

//CHECK INVATION CODE
if(NEED_INVITATION){
    if(!$System->validate->isValidInvitation($_POST['registerInvation'])){
        die(json_encode(["error" => true, "error_msg" => "You aren't invited to this Server!"]));
    }
}

if($System->registerUser($_POST['registerUsername'], $_POST['registerPassword'], $_POST['registerEmail'])){
    $System->useInvitationCode($_POST['registerInvation']);
    die(json_encode(["error" => false, "msg" => "You sucessfully registered!"]));
}