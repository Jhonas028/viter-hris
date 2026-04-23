<?php

$conn = null;
$conn = checkDBConnection();

$val = new Department($conn);
$val->department_is_active = '';
$val->search = '';

if (empty($_GET)) {
    $query = checkReadAll($val);
    http_response_code(200);
    getQueriedData($query);
}

// return 404 if endpoint not found
checkEndpoint();
