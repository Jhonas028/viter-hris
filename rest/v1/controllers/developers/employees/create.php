<?php

//check database connection

$conn = null;
$conn = checkDBConnection();

$val = new Employees($conn);
$val->employee_is_active = 1;
$val->employee_first_name = trim($data['employee_first_name']);
$val->employee_middle_name = trim($data['employee_middle_name']);
$val->employee_last_name = trim($data['employee_last_name']);
$val->employee_email = $data['employee_email'];
$val->employee_birthday = !empty($data['employee_birthday']) ? $data['employee_birthday'] : null;
$val->employee_start_work_date = !empty($data['employee_start_work_date']) ? $data['employee_start_work_date'] : null;
$val->employee_department_id = $data['employee_department_id'];
$val->employee_created = date("Y-m-d H:i:s");
$val->employee_updated = date("Y-m-d H:i:s");

//VALIDATIONS
isNameExist($val, $val->employee_first_name);

$query = checkCreate($val);
http_response_code(200);
returnSuccess($val, "Employees Create", $query);
