<?php

$conn = null;
$conn = checkDBConnection();

$val = new DirectReport($conn);

if (array_key_exists("id", $_GET)) {
    $val->direct_report_aid = $_GET['id'];

    checkId($val->direct_report_aid);

    // Fetch the record first to get the subordinate_id for clearing employee supervisor fields
    $record = $val->readById();
    if ($record && $record->rowCount() > 0) {
        $row = $record->fetch();
        $val->direct_report_subordinate_id = $row['direct_report_subordinate_id'];
        $val->clearEmployeeSupervisor();
    }

    $query = checkDelete($val);
    http_response_code(200);
    returnSuccess($val, "Direct Report Delete", $query);
}

checkEndpoint();
