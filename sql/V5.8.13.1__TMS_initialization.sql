-- --------------------------------------------------------------------
-- Gazmeh: test management system
-- 
-- Created by: 
-- 	Mostafa barmshroy
--  Mohammad Hadi Mansouri
-- Date:
-- --------------------------------------------------------------------
CREATE TABLE `tms_activities` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(128),
	`description` varchar(2048),
	`state` varchar(255),
	`type` varchar(255),
	`start_dtime` datetime(6),
	`end_dtime` datetime(6),
	`assign` bigint,
	`project_id` bigint NOT NULL,
	`test_id` bigint NOT NULL,
	`is_archived` bit NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tms_activity_user_account_assoc` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`activity_id` bigint NOT NULL,
	`account_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

	
CREATE TABLE `tms_activity_comments` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`text` varchar(2048),
	`mime_type` varchar(255),
	`creation_dtime` datetime(6) NOT NULL,
	`writer_id` bigint NOT NULL,
	`activity_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_activity_logs` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(128),
	`description` varchar(2048),
	`duration` double precision,
	`creation_dtime` datetime(6),
	`writer_id` bigint NOT NULL,
	`project_id` bigint NOT NULL,
	`activity_id` bigint NOT NULL,
	`test_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_activity_outputs` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(128),
	`description` varchar(2048),
	`activity_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_activity_steps` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(255),
	`description` varchar(255),
	`order` integer,
	`is_checked` bit NOT NULL,
	`activity_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tms_projects` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(128),
	`description` varchar(2048),
	`logo` varchar(512),
	`state` varchar(255),
	`start_dtime` datetime(6),
	`end_dtime` datetime(6),
	`manager_id` bigint,
	`organization_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_project_user_account_assoc` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`project_id` bigint NOT NULL,
	`account_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_report_template` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(255),
	`description` varchar(255),
	`mime_type` varchar(255),
	`file_name` varchar(255),
	`file_path` varchar(255),
	`file_size` bigint,
	`modif_dtime` datetime(6),
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_requirements` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(128),
	`description` varchar(2048),
	`type` varchar(255),
	`project_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_scenarios` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(128),
	`description` varchar(2048),
	`type` varchar(128) NOT NULL,
	`mime_type` varchar(255),
	`file_name` varchar(255),
	`file_path` varchar(255),
	`file_size` bigint,
	`modif_dtime` datetime(6),
	`virtual_user_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_test_acceptance_criteria` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(128),
	`description` varchar(2048),
	`metric` varchar(64),
	`bound` double precision NOT NULL,
	`bound_type` varchar(255) NOT NULL,
	`duration` double precision NOT NULL,
	`duration_type` varchar(255) NOT NULL,
	`severity` varchar(255) NOT NULL,
	`test_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_test_attachments` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(128),
	`description` varchar(2048),
	`mime_type` varchar(255),
	`file_name` varchar(255),
	`file_path` varchar(255),
	`file_size` bigint,
	`modif_dtime` datetime(6),
	`test_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_test_comments` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`text` varchar(2048),
	`mime_type` varchar(255),
	`creation_dtime` datetime(6) NOT NULL,
	`writer_id` bigint NOT NULL,
	`test_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_test_histories` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`action` varchar(64),
	`title` varchar(128),
	`creation_dtime` datetime(6),
	`account_id` bigint,
	`test_id` bigint,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_requirenment_tms_test_assoc` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`requirenment_id` bigint NOT NULL,
	`test_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_test_risks` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(128),
	`description` varchar(2048),
	`effect` varchar(1024),
	`probability` double precision,
	`test_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_test_run_reports` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(255),
	`description` varchar(255),
	`mime_type` varchar(255),
	`file_name` varchar(255),
	`file_path` varchar(255),
	`file_size` bigint,
	`downloads` bigint,
	`creation_dtime` datetime(6),
	`modif_dtime` datetime(6),
	`test_run_id` bigint,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_test_runs` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(100),
	`description` varchar(2048),
	`start_dtime` datetime(6),
	`end_dtime` datetime(6),
	`folder_path` varchar(1024),
	`mime_type` VARCHAR(255) NULL,
	`file_name` VARCHAR(255) NULL,
	`file_path` VARCHAR(255) NULL,
	`file_size` BIGINT NULL,
	`modif_dtime` DATETIME(6) NULL,
	`test_id` bigint NOT NULL,
	`pipeline_id` bigint,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_test_user_account_assoc` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`test_id` bigint NOT NULL,
	`account_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_test_variables` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`key` varchar(128),
	`value` varchar(1024),
	`description` varchar(1024),
	`test_id` bigint,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_tests` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(128),
	`description` varchar(2048),
	`type` varchar(255),
	`design` varchar(255),
	`state` varchar(255),
	`result` bit,
	`start_dtime` datetime(6),
	`end_dtime` datetime(6),
	`is_accepted` bit,
	`project_id` bigint NOT NULL,
	`responsible_id` bigint,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tms_virtual_users` (
   `id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(128),
	`description` varchar(2048),
	`type` varchar(128) NOT NULL,
	`mime_type` varchar(255),
	`file_name` varchar(255),
	`file_path` varchar(255),
	`file_size` bigint,
	`modif_dtime` datetime(6),
	`test_id` bigint NOT NULL,
	`tenant` mediumint(9) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	KEY `tenant_foreignkey_idx` (`tenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


