
ALTER TABLE `tms_activities` CHANGE `is_archived` `is_archived` bit NOT NULL;

ALTER TABLE `tms_activity_steps` CHANGE `is_checked` `is_checked` bit NOT NULL;

ALTER TABLE `tms_tests` CHANGE `result` `result` bit;
ALTER TABLE `tms_tests` CHANGE `is_accepted` `is_accepted` bit;
