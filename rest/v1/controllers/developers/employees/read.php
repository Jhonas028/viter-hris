<?php

$conn = null;
$conn = checkDBConnection();

$val = new Employees($conn);
$val->employee_is_active = 1;
$val->search = '';

$query = checkReadAll($val);
http_response_code(200);
getQueriedData($query);
