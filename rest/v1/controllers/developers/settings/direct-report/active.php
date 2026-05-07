<?php

//set http header
require '../../../../core/header.php';
// use needed functions
require '../../../../core/functions.php';
// use models
require '../../../../models/developers/settings/direct-report/DirectReport.php';

$conn = null;
$conn = checkDBConnection();

$val = new DirectReport($conn);

$body = file_get_contents("php://input");
$data = json_decode($body, true);

if (array_key_exists('id', $_GET)) {
    checkPayload($data);
    $val->direct_report_aid = $_GET['id'];
    $val->direct_report_is_active = trim($data['isActive']);
    $val->direct_report_updated = date("Y-m-d H:i:s");

    checkId($val->direct_report_aid);

    $query = checkActive($val);
    http_response_code(200);
    returnSuccess($val, 'Direct Report Active', $query);
}

// return 404 if endpoint not available
checkEndpoint();
