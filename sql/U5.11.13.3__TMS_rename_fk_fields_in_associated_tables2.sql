
ALTER TABLE `tms_activity_user_account_assoc` CHANGE `tms_activity_id` `activity_id`  mediumint(9) unsigned NOT NULL;
ALTER TABLE `tms_activity_user_account_assoc` CHANGE `user_account_id` `account_id` mediumint(9) unsigned NOT NULL;

ALTER TABLE `tms_project_user_account_assoc` CHANGE `tms_project_id` `project_id` mediumint(9) unsigned NOT NULL;
ALTER TABLE `tms_project_user_account_assoc` CHANGE `user_account_id` `account_id` mediumint(9) unsigned NOT NULL;

ALTER TABLE `tms_requirement_tms_test_assoc` CHANGE `tms_requirenment_id` `requirenment_id` mediumint(9) unsigned NOT NULL;
ALTER TABLE `tms_requirement_tms_test_assoc` CHANGE `tms_test_id` `test_id` mediumint(9) unsigned NOT NULL;

ALTER TABLE `tms_test_user_account_assoc` CHANGE `tms_test_id` `test_id` mediumint(9) unsigned NOT NULL;
ALTER TABLE `tms_test_user_account_assoc` CHANGE `user_account_id` `account_id` mediumint(9) unsigned NOT NULL;
