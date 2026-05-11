<?php
//set http header
require '../../../../core/header.php';
// use needed functions
require '../../../../core/functions.php';
// use models
require '../../../../models/developers/settings/users/Users.php';

$conn = null;
$conn = checkDBConnection();
//models
$val = new Users($conn);
//get payload
$body = file_get_contents("php://input");
$data = json_decode($body, true);

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    checkPayload($data);
    $token = isset($data['token']) ? trim($data['token']) : '';
    if (empty($token)) {
        returnHandleError('No token found', 'Invalid Credentials.');
    }
    $val->users_key = $token;
    $query = $val->readByToken();
    if (!$query || $query->rowCount() == 0) {
        returnHandleError('Invalid token', 'Invalid Credentials.');
    }
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $row['user_is_key_matched'] = true;
    $response = new Response();
    $returnData = [];
    $returnData['data'] = $row;
    $returnData['success'] = true;
    $returnData['count'] = 1;
    $returnData['server_datetime'] = date("Y-m-d H:i:s");
    $response->setData($returnData);
    $response->send();
    exit;
}

http_response_code(200);
checkEndpoint();
