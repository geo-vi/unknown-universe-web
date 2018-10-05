<?php
include_once("../core.php");
include_once("./handlers/class.AbstractHandler.php");
include_once("./handlers/class.EquipmentHandler.php");
include_once("./handlers/class.ShopHandler.php");
include_once("./handlers/class.UserRefreshHandler.php");
include_once("./handlers/class.CompanyHandler.php");

//header("Access-Control-Allow-Origin : *");
//header("Access-Control-Allow-Credentials : true");
header('Content-Type: application/json');

if ($System->isLoggedIn()) {
    $available_handler = [
        "equipment" => new EquipmentHandler(),
        "shop"      => new ShopHandler(),
        "company"   => new CompanyHandler(),
        "user"      => new UserRefreshHandler(),
    ];

    if (isset($_POST['handler']) && !empty($_POST['handler'])) {
        if (isset($available_handler[$_POST['handler']])) {
            $available_handler[$_POST['handler']]->handle();
        }
    } else {
        die(json_encode(['error' => true, "error_msg" => "Empty ajax Handler requested!"]));
    }
} else {
    die(json_encode(['error' => true, "error_msg" => "login_missing"]));
}