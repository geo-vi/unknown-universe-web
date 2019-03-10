<?php
/**
 * Created by PhpStorm.
 * User: savasyildirim
 * Date: 10.03.2019
 * Time: 23:22
 */

$reqireds = array(
    'first_name' => 'First Name',
    'last_name'  => 'Last Name',
    'day'        => 'Day of birth date',
    'month'      => 'Month of birth date',
    'year'       => 'Year of birth date'
);

foreach ($reqireds as $reqired => $name) {
    if (!isset($_POST[$reqired]) OR trim($_POST[$reqired]) == '' OR trim($_POST[$reqired]) == '0') {
        response(array('success' => false, 'message' => 'Please enter ' . $name . ' field'));
    }
}

$birthDate = trim($_POST['year']) . '-' . trim($_POST['month']) . '-' . trim($_POST['day']) . ' 00:00:00';
try {
    $result = $userSQL->QUERY("UPDATE users SET FIRST_NAME=? , LAST_NAME=? , COUNTRY_NAME=? , GENDER=? , BIRTHDATE=? , DISCORD_ID=? WHERE USER_ID=?",
        array(
            trim($_POST['first_name']),
            trim($_POST['last_name']),
            trim($_POST['country']),
            intval($_POST['gender']),
            $birthDate,
            intval($_POST['discord']),
            $_SESSION['USER_ID']
        ));
} catch (Exception $exception) {
    response(array(
        'success' => false,
        'message' => 'Error. Please contact support with code:CAI01',
        'data'    => array('message' => $exception->getMessage(), 'line' => $exception->getLine())
    ));
}

if ($result) {
    response(array('success' => true, 'message' => 'Your profile is updated!'));
} else {
    response(array('success' => false, 'message' => 'Error. Please contact support with code:CAI01'));
}