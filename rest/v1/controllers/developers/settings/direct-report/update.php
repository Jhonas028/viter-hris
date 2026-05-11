<?php

$conn = null;
$conn = checkDBConnection();

$val = new DirectReport($conn);

if (array_key_exists("id", $_GET)) {
    $val->direct_report_aid = $_GET['id'];
    $val->direct_report_subordinate_id = $data['direct_report_subordinate_id'];
    $val->direct_report_supervisor_id = $data['direct_report_supervisor_id'];
    $val->direct_report_updated = date("Y-m-d H:i:s");

    checkId($val->direct_report_aid);

    // Validation: same person
    if ($val->direct_report_subordinate_id == $val->direct_report_supervisor_id) {
        returnHandleError("The supervisor and subordinate cannot be the same person.");
    }

    // Validation: circular reference
    $circularQuery = $val->checkCircularReference();
    if ($circularQuery && $circularQuery->rowCount() > 0) {
        returnHandleError("Invalid request, the supervisor cannot be assigned to the selected subordinate.");
    }

    // Get supervisor details
    $supervisorQuery = $val->getSupervisorById();
    if (!$supervisorQuery || $supervisorQuery->rowCount() == 0) {
        returnHandleError("Supervisor not found.");
    }
    $supervisor = $supervisorQuery->fetch();
    $val->supervisor_first_name = $supervisor['employee_first_name'];
    $val->supervisor_last_name = $supervisor['employee_last_name'];
    $val->supervisor_email = $supervisor['employee_email'];

    $query = checkUpdate($val);

    // Update employee record with new supervisor info
    $val->updateEmployeeSupervisor();

    http_response_code(200);
    returnSuccess($val, "Direct Report Update", $query);
}

checkEndpoint();
