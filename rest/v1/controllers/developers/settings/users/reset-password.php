<?php
require '../../../../core/header.php';
require '../../../../core/Encryption.php';
require '../../../../core/functions.php';
require '../../../../models/developers/settings/users/Users.php';
require '../../../../notifications/reset-password.php';

$conn = null;
$conn = checkDBConnection();
$val = new Users($conn);

$body = file_get_contents("php://input");
$data = json_decode($body, true);

if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkPayload($data);
    $val->users_email = trim($data['item']);

    $query = $val->checkEmail();
    if ($query->rowCount() == 0) {
        returnHandleError('Email not found.', 'Reset Password Error', 'No account associated with this email.');
    }

    $val->users_key = bin2hex(random_bytes(32));
    $val->users_updated = date("Y-m-d H:i:s");
    $query = checkResetPassword($val);

    $password_link = "/create-password";
    sendResetPasswordEmail($password_link, $val->users_email, $val->users_key);

    http_response_code(200);
    returnSuccess($val, "Reset Password", $query);
}

http_response_code(200);
checkAccess();
