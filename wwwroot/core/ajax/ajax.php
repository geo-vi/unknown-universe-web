<?php
include_once( '../core.php' );
include_once( './handlers/class.AbstractHandler.php' );
include_once( './handlers/class.EquipmentHandler.php' );
include_once( './handlers/class.ShopHandler.php' );
include_once( './handlers/class.UserRefreshHandler.php' );
include_once( './handlers/class.CompanyHandler.php' );

header('Content-Type: application/json');

if ($System->isLoggedIn()) {
    $available_handler = [
        'equipment' => new EquipmentHandler(),
        'shop'      => new ShopHandler(),
        'company'   => new CompanyHandler(),
        'user'      => new UserRefreshHandler(),
    ];

    if (isset($_POST['handler']) && !empty($_POST['handler'])) {
        if (isset($available_handler[$_POST['handler']])) {
            $available_handler[$_POST['handler']]->handle();
        }
    } else {
        http_response_code(400);
        die(json_encode(['message' => 'Empty ajax Handler requested!']));
    }
} else {
    $available_handler = [
    ];

    if (isset($_POST['handler']) && !empty($_POST['handler'])) {
        if (isset($available_handler[$_POST['handler']])) {
            $available_handler[$_POST['handler']]->handle();
        }
    } else {
        http_response_code(400);
        die(json_encode(['message' => 'Empty ajax Handler requested!']));
    }
}