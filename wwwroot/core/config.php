<?php
//MySQL Config
define("MYSQL_IP", "127.0.0.1");
define("MYSQL_DB_NAME", "do_system");
define("MYSQL_USER", "root");
define("MYSQL_PW", "");

define('HTTP_HOST', 'dev.univ3rse.com');

//Advanced Options
define("ALLOWED_CHARS", [".", "-", "_", ">", "<"]);
define("USERNAME_MIN_LENGTH", 3);
define("USERNAME_MAX_LENGTH", 25);
define("PASSWORD_MIN_LENGTH", 5);
define("NEED_EMAIL_VERIFY", false);
define("NEED_INVITATION", false);
define("CAN_CHANGE_USERNAME", false);

//Session Related
define('COOKIE_PATH', '/');
define('COOKIE_DOMAIN', '.dev.univ3rse.com');

//Allowed UserImage Types
define("USER_IMAGE_STORAGE", PROJECT_DOCUMENT_ROOT . 'upload');

//Debug Config
define("DEBUG", false);
ini_set('display_errors', DEBUG);
error_reporting(DEBUG ? E_ALL : 0);

//Other Vars
define("LOGIN_PAGE", PROJECT_HTTP_ROOT);

//Other Vars
define("GOOGLE_CAPTCHA_KEY", "6LcXBw8UAAAAALzY0SYb1lEHVXpqM_xy2Uj54ewF");
define("GOOGLE_CLIENT_CAPTCHA_KEY", "6LcXBw8UAAAAAL9dV2vHcUZ7ZgfDDQFotIYV1Ivw");

//Website Titel
define("WEBSITE_TITLE", "UNIV3RSE");
