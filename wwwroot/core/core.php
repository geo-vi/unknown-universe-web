<?php
//Contains useful paths
include_once( "path.php" );

//Contains Server Config
include_once( "config.php" );

//Initiate system
include_once( "classes/class.System.php" );

global $System;
$System = new System();

//Add Error Codes
$System->error_handler->add(ErrorID::FAILED_LOGIN, "Login Failed!", ErrorMessages::FAILED_LOGIN_MESSAGE);
$System->error_handler->add(ErrorID::ACCESS_DENIED, 'Access denied!', ErrorMessages::ACCESS_DENIED);
$System->error_handler->add(
    ErrorID::EMAIL_MISSING,
    "E-Mail verification missing!",
    ErrorMessages::EMAIL_VERIFICATION_MISSING
);
$System->error_handler->add(ErrorID::EMAIL_COMPLETE, "Account verified!", ErrorMessages::EMAIL_COMPLETE);
$System->error_handler->add(
    ErrorID::VERIFICATION_FAILED,
    "Verification failed!",
    ErrorMessages::EMAIL_VERIFICATION_FAILED_CODE
);
$System->error_handler->add(ErrorID::REDEEMED_CODE, "Code Redeemed!", ErrorMessages::REDEEMED_CODE_MESSAGE);
$System->error_handler->add(ErrorID::DUPLICATE_CODE, "Cheater!", ErrorMessages::DUPLICATE_REDEEM_MESSAGE);
$System->error_handler->add(ErrorID::LOGGED_OUT, "Successfully logged out!", ErrorMessages::LOGGET_OUT_MESSAGE);
$System->error_handler->handle();


/**
 * Routing System
 * add all Routes here
 */

//EXTERNAL
$System->routing->add("", "external", false, false, false);
$System->routing->add("externalRecovery", "externalRecovery", false, false, false);
$System->routing->add("error", "error_template", false, false, false);

//INTERNAL
$System->routing->add("internalShop", "internalShop", true);
$System->routing->add("internalStart", "internalStart", true);
$System->routing->add("internalHangar", "internalHangar", true);
$System->routing->add("internalSkillTree", "internalSkillTree", true);
$System->routing->add("internalMapRevolution", "internalMapRevolution", true, false, false);
$System->routing->add("internalCompanyChoose", "internalCompanyChoose", true, false, false);
//$System->routing->add("internalClan", "internalClan", true);
$System->routing->add("internalSettings", "internalSettings", true);
//$System->routing->add("internalSkylab", "internalSkylab", true);
//$System->routing->add("internalAuction", "internalAuction", true);
$System->routing->add("internalMessaging", "internalMessaging", true);
//$System->routing->add("internalGalaxyGates", "internalGalaxyGates", true);
//$System->routing->add("internalCalendar", "internalCalendar", true);
//$System->routing->add("internalPayment", "internalPayment", true);

//ADMIN PAGES
$System->routing->add("internalAdmin", "internalAdmin", true, true, true, 21);
$System->routing->add("internalAdminEdit", "internalAdminEdit", true, true, true, 21);
$System->routing->add("internalAdminEditItems", "internalAdminEditItems", true, true, true, 21);
$System->routing->add("internalMapEditor", "internalMapEditor", true, true, true, 21);

$System->routing->route();

/*
 * Translation System
 */
$System->translation->loadTranslation('common.xml');
$System->translation->loadTranslation($System->routing->template . '.xml');
