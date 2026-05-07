<?php

$conn = null;
$conn = checkDBConnection();

$val = new DirectReport($conn);

$val->direct_report_subordinate_id = $data['direct_report_subordinate_id'];
$val->direct_report_supervisor_id = $data['direct_report_supervisor_id'];

// Validation: same person
if ($val->direct_report_subordinate_id == $val->direct_report_supervisor_id) {
    returnHandleError("The supervisor and subordinate cannot be the same person.");
}

// Validation: circular reference - supervisor is already a subordinate of this employee
$circularQuery = $val->checkCircularReference();
if ($circularQuery && $circularQuery->rowCount() > 0) {
    returnHandleError("Invalid request, the supervisor cannot be assigned to the selected subordinate.");
}

// Validation: subordinate already has an assigned supervisor
$existQuery = $val->checkSubordinateExist();
if ($existQuery && $existQuery->rowCount() > 0) {
    returnHandleError("This employee already has an assigned supervisor.");
}

// Get supervisor details to denormalize into employees table
$supervisorQuery = $val->getSupervisorById();
if (!$supervisorQuery || $supervisorQuery->rowCount() == 0) {
    returnHandleError("Supervisor not found.");
}
$supervisor = $supervisorQuery->fetch();
$val->supervisor_first_name = $supervisor['employee_first_name'];
$val->supervisor_last_name = $supervisor['employee_last_name'];
$val->supervisor_email = $supervisor['employee_email'];

$val->direct_report_is_active = 1;
$val->direct_report_created = date("Y-m-d H:i:s");
$val->direct_report_updated = date("Y-m-d H:i:s");

$query = checkCreate($val);

// Also update the employee record with supervisor info
$val->updateEmployeeSupervisor();

http_response_code(200);
returnSuccess($val, "Direct Report Create", $query);
