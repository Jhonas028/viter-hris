<?php
//set http header
require '../../../../core/header.php';
require '../../../../core/Encryption.php';
// use needed functions
require '../../../../core/functions.php';
// use models
require '../../../../models/developers/settings/users/Users.php';

$conn = null;
$conn = checkDBConnection();
//models
$val = new Users($conn);
$encrypt = new Encryption();
//get payload
$body = file_get_contents("php://input");
$data = json_decode($body, true);

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    checkPayload($data);
    $val->users_email = isset($data['user_other_email']) ? trim($data['user_other_email']) : '';
    $query = checkLogin($val);
    $row = $query->fetch();
    $password = isset($data['password']) ? $data['password'] : '';
    loginAccess($password, $row['users_password'], $val->users_email, $row, $query, 'viter_hris_secret');
}

http_response_code(200);
checkEndpoint();
