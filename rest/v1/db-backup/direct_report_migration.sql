-- Migration: Add supervisor columns to employees table and create settings_direct_report table
-- Run this in phpMyAdmin on database: viter_hris_v1

-- Step 1: Add supervisor columns to employees table
ALTER TABLE `employees`
  ADD COLUMN `employee_supervisor_id` int(11) DEFAULT NULL AFTER `employee_department_id`,
  ADD COLUMN `employee_supervisor_first_name` varchar(128) DEFAULT NULL AFTER `employee_supervisor_id`,
  ADD COLUMN `employee_supervisor_last_name` varchar(128) DEFAULT NULL AFTER `employee_supervisor_first_name`,
  ADD COLUMN `employee_supervisor_email` varchar(255) DEFAULT NULL AFTER `employee_supervisor_last_name`;

-- Step 2: Create settings_direct_report table
CREATE TABLE `settings_direct_report` (
  `direct_report_aid` int(11) NOT NULL AUTO_INCREMENT,
  `direct_report_is_active` tinyint(1) NOT NULL DEFAULT 1,
  `direct_report_subordinate_id` int(11) NOT NULL,
  `direct_report_supervisor_id` int(11) NOT NULL,
  `direct_report_created` datetime NOT NULL,
  `direct_report_updated` datetime NOT NULL,
  PRIMARY KEY (`direct_report_aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
