<?php
include_once( '../core.php' );
include_once( './handlers/class.AbstractHandler.php' );
include_once( './handlers/class.ClanHandler.php' );
include_once( './handlers/class.CompanyHandler.php' );
include_once( './handlers/class.EquipmentHandler.php' );
include_once( './handlers/class.MessageHandler.php' );
include_once( './handlers/class.ShopHandler.php' );
include_once( './handlers/class.UserRefreshHandler.php' );

header('Content-Type: application/json');

if ($System->isLoggedIn()) {
    $available_handler = [
        'equipment' => new EquipmentHandler(),
        'shop'      => new ShopHandler(),
        'company'   => new CompanyHandler(),
        'user'      => new UserRefreshHandler(),
        'messaging' => new MessageHandler(),
        'clan'      => new ClanHandler()
    ];

    if (isset($_POST['handler']) && !empty($_POST['handler'])) {
        if (isset($available_handler[$_POST['handler']])) {
            $available_handler[$_POST['handler']]->handle();
        }
    } else {
        Utils::dieS(400, 'Empty ajax handler requested!');
    }
} else {
    Utils::dieS(403, 'Not logged in!');
}
