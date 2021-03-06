/*
 * Add indexes
 */
ALTER TABLE `tms_activity_user_account_assoc` 
   ADD CONSTRAINT `uk__7k6sgj2xk88vkw436bhsyax50` 
   UNIQUE (`activity_id`, `account_id`);

ALTER TABLE `tms_requirenment_tms_test_assoc` 
   ADD CONSTRAINT `uk__8u1a98nly5v6urrev6x66l2h4` 
   UNIQUE (`test_id`, `requirenment_id`);

ALTER TABLE `tms_test_user_account_assoc` 
   ADD CONSTRAINT `uk__3ggajrpbwf7t8o2o6btx4qk9f` 
   UNIQUE (`test_id`, `account_id`);


/*
* Add foreign keys
*/
ALTER TABLE `tms_activities` 
   ADD CONSTRAINT `fk__og7ly066n56jt9dt523wpges6` 
   FOREIGN KEY (`assign_id`) 
   REFERENCES `user_accounts` (`id`);


ALTER TABLE `tms_activities` 
   ADD CONSTRAINT `fk__9fwkg6uqt3e098ojf2b3dh9i5` 
   FOREIGN KEY (`project_id`) 
   REFERENCES `tms_projects` (`id`);


ALTER TABLE `tms_activities` 
   ADD CONSTRAINT `fk__9rxl1b3tntof3dm905torkt1f` 
   FOREIGN KEY (`test_id`) 
   REFERENCES `tms_tests` (`id`);


ALTER TABLE `tms_activity_user_account_assoc` 
   ADD CONSTRAINT `fk__jvknee78ba55plotl51nj0qu4` 
   FOREIGN KEY (`account_id`) 
   REFERENCES `user_accounts` (`id`);


ALTER TABLE `tms_activity_user_account_assoc` 
   ADD CONSTRAINT `fk__ox2ponhfpqn8m1omyp6knuk2c` 
   FOREIGN KEY (`activity_id`) 
   REFERENCES `tms_activities` (`id`);


ALTER TABLE `tms_activity_comments` 
   ADD CONSTRAINT `fk__bt69hs89orb56yfj1824g2m7y` 
   FOREIGN KEY (`activity_id`) 
   REFERENCES `tms_activities` (`id`);


ALTER TABLE `tms_activity_comments` 
   ADD CONSTRAINT `fk__cuyhcl61bou6lb9s1koy4wm7e` 
   FOREIGN KEY (`writer_id`) 
   REFERENCES `user_accounts` (`id`);


ALTER TABLE `tms_activity_logs` 
   ADD CONSTRAINT `fk__i1b0ngrql34xk7b5sa73orw9i` 
   FOREIGN KEY (`activity_id`) 
   REFERENCES `tms_activities` (`id`);


ALTER TABLE `tms_activity_logs` 
   ADD CONSTRAINT `fk__rdwocioirdhr884ejtjiqrbk1` 
   FOREIGN KEY (`project_id`) 
   REFERENCES `tms_projects` (`id`);


ALTER TABLE `tms_activity_logs` 
   ADD CONSTRAINT `fk__51cp3re0jd666kke82rnygmxj` 
   FOREIGN KEY (`test_id`) 
   REFERENCES `tms_tests` (`id`);


ALTER TABLE `tms_activity_logs` 
   ADD CONSTRAINT `fk__64e2cpdi6c2uvwfayo2l5w0h1` 
   FOREIGN KEY (`writer_id`) 
   REFERENCES `user_accounts` (`id`);


ALTER TABLE `tms_activity_outputs` 
   ADD CONSTRAINT `fk__b59db444utbewexb09qlf4n4y` 
   FOREIGN KEY (`activity_id`) 
   REFERENCES `tms_activities` (`id`);


ALTER TABLE `tms_activity_steps` 
   ADD CONSTRAINT `fk__fwk5k8uf2xrenfu8samwulcam` 
   FOREIGN KEY (`activity_id`) 
   REFERENCES `tms_activities` (`id`);

ALTER TABLE `tms_projects` 
   ADD CONSTRAINT `fk__mq8rbfm4b44ak989oc0mjkmg2` 
   FOREIGN KEY (`manager_id`) 
   REFERENCES `user_accounts` (`id`);

ALTER TABLE `tms_project_user_account_assoc` 
   ADD CONSTRAINT `fk__othxp8u3q5k7fey8irj0bqqw7` 
   FOREIGN KEY (`project_id`) 
   REFERENCES `tms_projects` (`id`);


ALTER TABLE `tms_project_user_account_assoc` 
   ADD CONSTRAINT `fk__mruh0lawqnd51vb1v2d5ah112` 
   FOREIGN KEY (`account_id`) 
   REFERENCES `user_accounts` (`id`);


ALTER TABLE `tms_requirements` 
   ADD CONSTRAINT `fk__a7wh19e81i7tg0yxxwpipqj6v` 
   FOREIGN KEY (`project_id`) 
   REFERENCES `tms_projects` (`id`);


ALTER TABLE `tms_scenarios` 
   ADD CONSTRAINT `fk__c37ta975yrwt1vejw58x1x6a4` 
   FOREIGN KEY (`virtual_user_id`) 
   REFERENCES `tms_virtual_users` (`id`);


ALTER TABLE `tms_tests` 
   ADD CONSTRAINT `fk__p0erxajbtqxu9l3rd8qq60t0k` 
   FOREIGN KEY (`project_id`) 
   REFERENCES `tms_projects` (`id`);

ALTER TABLE `tms_tests` 
   ADD CONSTRAINT `fk__apu43sh7fqk3u1q6c2jc6sxlt` 
   FOREIGN KEY (`responsible_id`) 
   REFERENCES `user_accounts` (`id`);


ALTER TABLE `tms_test_user_account_assoc` 
   ADD CONSTRAINT `fk__ja59utr7r1sa9cvlh322r48bi` 
   FOREIGN KEY (`test_id`) 
   REFERENCES `tms_tests` (`id`);


ALTER TABLE `tms_test_user_account_assoc` 
   ADD CONSTRAINT `fk__3jb55dp4svrxerknbb6t9d13i` 
   FOREIGN KEY (`account_id`) 
   REFERENCES `user_accounts` (`id`);
   

ALTER TABLE `tms_test_acceptance_criteria` 
   ADD CONSTRAINT `fk__qtdxy4frlgewvobpoocw1an4o` 
   FOREIGN KEY (`test_id`) 
   REFERENCES `tms_tests` (`id`);


ALTER TABLE `tms_test_attachments` 
   ADD CONSTRAINT `fk__tdg3amjhin0i92bvnolw3yxkv` 
   FOREIGN KEY (`test_id`) 
   REFERENCES `tms_tests` (`id`);


ALTER TABLE `tms_test_comments` 
   ADD CONSTRAINT `fk__5yub80cobh1hb8qdtvri4tonv` 
   FOREIGN KEY (`test_id`) 
   REFERENCES `tms_tests` (`id`);


ALTER TABLE `tms_test_comments` 
   ADD CONSTRAINT `fk__pklix22imprv4nkc0ww7fm0c4` 
   FOREIGN KEY (`writer_id`) 
   REFERENCES `user_accounts` (`id`);


ALTER TABLE `tms_test_histories` 
   ADD CONSTRAINT `fk__8ws7vxxyxmxg41jwpdb2yic6f` 
   FOREIGN KEY (`test_id`) 
   REFERENCES `tms_tests` (`id`);


ALTER TABLE `tms_test_histories` 
   ADD CONSTRAINT `fk__2u4njawdjwd5g19pk6299eopu` 
   FOREIGN KEY (`account_id`) 
   REFERENCES `user_accounts` (`id`);


ALTER TABLE `tms_requirenment_tms_test_assoc` 
   ADD CONSTRAINT `fk__5qw7sb02epcyki90pces7mkfo` 
   FOREIGN KEY (`requirenment_id`) 
   REFERENCES `tms_requirements` (`id`);


ALTER TABLE `tms_requirenment_tms_test_assoc` 
   ADD CONSTRAINT `fk__tblpvqnos732t2l331gv1vc47` 
   FOREIGN KEY (`test_id`) 
   REFERENCES `tms_tests` (`id`);


ALTER TABLE `tms_test_risks` 
   ADD CONSTRAINT `fk__6jq70kkr375mc0agpr0dkkhnr` 
   FOREIGN KEY (`test_id`) 
   REFERENCES `tms_tests` (`id`);


ALTER TABLE `tms_test_run_reports` 
   ADD CONSTRAINT `fk__2n71mvbqp9dj9hjkwdd3x42sl` 
   FOREIGN KEY (`test_run_id`) 
   REFERENCES `tms_test_runs` (`id`);


ALTER TABLE `tms_test_runs` 
   ADD CONSTRAINT `fk__qshkrcst8jyrgdu6tobs1m5yh` 
   FOREIGN KEY (`test_id`) 
   REFERENCES `tms_tests` (`id`);

ALTER TABLE `tms_test_variables` 
   ADD CONSTRAINT `fk__hbldml5x76ht2gvcpicm9l5kx` 
   FOREIGN KEY (`test_id`) 
   REFERENCES `tms_tests` (`id`);


ALTER TABLE `tms_virtual_users` 
   ADD CONSTRAINT `fk__t5yyi6221wuwvj4a6lfxgbcml` 
   FOREIGN KEY (`test_id`) 
   REFERENCES `tms_tests` (`id`);
   



