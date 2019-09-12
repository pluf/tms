
ALTER TABLE `tms_activities` CHANGE `is_archived` `is_archived` tinyint(1) DEFAULT 0;

ALTER TABLE `tms_activity_steps` CHANGE `is_checked` `is_checked` tinyint(1) NOT NULL DEFAULT 0;

ALTER TABLE `tms_tests` CHANGE `result` `result` tinyint(1) NOT NULL DEFAULT 0;
ALTER TABLE `tms_tests` CHANGE `is_accepted` `is_accepted` tinyint(1) DEFAULT 0;
