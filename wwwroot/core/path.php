<?php
//Projekt-Datei-Verzeichnis
define('PROJECT_DOCUMENT_ROOT', str_replace('core', '', __DIR__));

//Projektname
$project = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace("\\", "/", __DIR__));
$project = str_replace(basename(__DIR__), '', $project);
$project = str_replace('/dev', '', $project);
// MIGHT NEED TO REMOVE BEFORE DEPLOING
$project = str_replace('/www', '', $project);


//Protokoll der Verbindung (HTTP oder HTTPS)
$isSecure = false;
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $isSecure = true;
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
    $isSecure = true;
}
!$isSecure ? $protocol = 'http://' : $protocol = 'https://';

//PROJECT Pfad (für die Verwendung im Web)
define('PROJECT_HTTP_ROOT', $protocol . $_SERVER['HTTP_HOST'] . $project);

define('PROJECT_WEB_IP', 'dev.univ3rse.com');
