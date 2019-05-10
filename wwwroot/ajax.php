<?php
/**
 * Created by PhpStorm.
 * User: savasyildirim
 * Date: 10.03.2019
 * Time: 21:50
 */

/**
 *  NOTE:
 * This page is responsed only "success" : boolean, "message" : text and "data" : Object or Array.
 * We use this page in main screen and other ajax actions only. Example; Change username, account name, email etc.
 */
header('Content-Type: application/json');

include_once( './core/core.php' );

//Need Login
if ($System->routing->login_req) {
    $response = ['success'=>false,'message'=>'Please log in'];
}

$userSQL = new \DB\MySQL(MYSQL_IP, MYSQL_DB_NAME, MYSQL_USER, MYSQL_PW);

$userQuery = $userSQL->QUERY("SELECT * FROM users WHERE USER_ID = ?",array($_SESSION['USER_ID']));

function response($response){
    echo json_encode($response); die;
}

if(!count($userQuery)>0){
    $response['success'] = false;
    $response['message'] = 'Account not found!';
    response($response);
}

$user = $userQuery[0];

$lastServer = false;
if(isset($user['LAST_SERVER'])){
    if(strlen($user['LAST_SERVER'])>0){
        $lastServerQuery = $userSQL->QUERY("SELECT * FROM server_infos WHERE SHORTCUT = ?",array($user['LAST_SERVER']));
        if(count($lastServerQuery)>0){
            $lastServer = $lastServerQuery[0];
        }
    }
}

if(!$lastServer){
    $response['success'] = false;
    $response['message'] = 'User server is not found!';
    response($response);
}


$serverSQL = new \DB\MySQL($lastServer['SERVER_IP'],$lastServer['DB_NAME'],MYSQL_USER,MYSQL_PW);
$playerDetailQuery = $serverSQL->QUERY("SELECT * FROM player_data WHERE USER_ID=?",array($_SESSION['USER_ID']));
$playerDetail = $playerDetailQuery[0];

if(isset($_POST['action'])){
    $fileName = str_replace(array('.','/','\\',' '),'',$_POST['action']);
    if(file_exists('core/controller/ajax/'.$fileName.'.php')){
        include 'core/controller/ajax/'.$fileName.'.php';
    }else{
        response(array('success'=>false,'message'=>'Error. Please contact support with code: AC501'));
    }
}else{
    response(array('success'=>false,'message'=>'Error. Please contact support with code: AC500'));
}