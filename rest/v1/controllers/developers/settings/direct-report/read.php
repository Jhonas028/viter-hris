<?php

$conn = null;
$conn = checkDBConnection();

$val = new DirectReport($conn);
$val->direct_report_is_active = "";
$val->search = "";

$query = $val->readAll();
if (!$query) {
    returnHandleError("There's a problem reading direct report records.");
}

http_response_code(200);
getQueriedData($query);
