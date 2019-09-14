
ALTER TABLE `tms_activity_user_account_assoc` CHANGE `activity_id` `tms_activity_id` mediumint(9) unsigned NOT NULL;
ALTER TABLE `tms_activity_user_account_assoc` CHANGE `account_id` `user_account_id` mediumint(9) unsigned NOT NULL;

ALTER TABLE `tms_project_user_account_assoc` CHANGE `project_id` `tms_project_id` mediumint(9) unsigned NOT NULL;
ALTER TABLE `tms_project_user_account_assoc` CHANGE `account_id` `user_account_id` mediumint(9) unsigned NOT NULL;

ALTER TABLE `tms_requirement_tms_test_assoc` CHANGE `requirenment_id` `tms_requirenment_id` mediumint(9) unsigned NOT NULL;
ALTER TABLE `tms_requirement_tms_test_assoc` CHANGE `test_id` `tms_test_id` mediumint(9) unsigned NOT NULL;

ALTER TABLE `tms_test_user_account_assoc` CHANGE `test_id` `tms_test_id` mediumint(9) unsigned NOT NULL;
ALTER TABLE `tms_test_user_account_assoc` CHANGE `account_id` `user_account_id` mediumint(9) unsigned NOT NULL;
