
ALTER TABLE `tms_activities` CHANGE `start_dtime` `start_dtime` DATETIME NULL DEFAULT NULL;
ALTER TABLE `tms_activities` CHANGE `end_dtime` `end_dtime` DATETIME NULL DEFAULT NULL;

ALTER TABLE `tms_activity_comments` CHANGE `creation_dtime` `creation_dtime` DATETIME NOT NULL;

ALTER TABLE `tms_activity_logs` CHANGE `creation_dtime` `creation_dtime` DATETIME NOT NULL;

ALTER TABLE `tms_projects` DROP `organization_id`;
ALTER TABLE `tms_projects` CHANGE `start_dtime` `start_dtime` DATETIME NULL DEFAULT NULL;
ALTER TABLE `tms_projects` CHANGE `end_dtime` `end_dtime` DATETIME NULL DEFAULT NULL;

ALTER TABLE `tms_report_template` CHANGE `modif_dtime` `modif_dtime` DATETIME NOT NULL;

ALTER TABLE `tms_scenarios` CHANGE `modif_dtime` `modif_dtime` DATETIME NOT NULL;

ALTER TABLE `tms_test_attachments` CHANGE `modif_dtime` `modif_dtime` DATETIME NOT NULL;

ALTER TABLE `tms_test_comments` CHANGE `creation_dtime` `creation_dtime` DATETIME NOT NULL;

ALTER TABLE `tms_test_histories` CHANGE `creation_dtime` `creation_dtime` DATETIME NOT NULL;

ALTER TABLE `tms_test_run_reports` CHANGE `creation_dtime` `creation_dtime` DATETIME NOT NULL;
ALTER TABLE `tms_test_run_reports` CHANGE `modif_dtime` `modif_dtime` DATETIME NOT NULL;

ALTER TABLE `tms_test_runs` CHANGE `start_dtime` `start_dtime` DATETIME NULL DEFAULT NULL;
ALTER TABLE `tms_test_runs` CHANGE `end_dtime` `end_dtime` DATETIME NULL DEFAULT NULL;
ALTER TABLE `tms_test_runs` CHANGE `modif_dtime` `modif_dtime` DATETIME NOT NULL;

ALTER TABLE `tms_tests` CHANGE `start_dtime` `start_dtime` DATETIME NULL DEFAULT NULL;
ALTER TABLE `tms_tests` CHANGE `end_dtime` `end_dtime` DATETIME NULL DEFAULT NULL;

ALTER TABLE `tms_virtual_users` CHANGE `modif_dtime` `modif_dtime` DATETIME NOT NULL;



