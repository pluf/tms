
/*
* Add foreign keys
*/
ALTER TABLE `tms_activities` 
   DROP FOREIGN KEY `fk__og7ly066n56jt9dt523wpges6`;
ALTER TABLE `tms_activities` 
   DROP FOREIGN KEY `fk__9fwkg6uqt3e098ojf2b3dh9i5`;
ALTER TABLE `tms_activities` 
   DROP FOREIGN KEY `fk__9rxl1b3tntof3dm905torkt1f`;
ALTER TABLE `tms_activity_user_account_assoc` 
   DROP FOREIGN KEY `fk__jvknee78ba55plotl51nj0qu4`;
ALTER TABLE `tms_activity_user_account_assoc` 
   DROP FOREIGN KEY `fk__ox2ponhfpqn8m1omyp6knuk2c`;
ALTER TABLE `tms_activity_comments` 
   DROP FOREIGN KEY `fk__bt69hs89orb56yfj1824g2m7y`;
ALTER TABLE `tms_activity_comments` 
   DROP FOREIGN KEY `fk__cuyhcl61bou6lb9s1koy4wm7e`;
ALTER TABLE `tms_activity_logs` 
   DROP FOREIGN KEY `fk__i1b0ngrql34xk7b5sa73orw9i`;
ALTER TABLE `tms_activity_logs` 
   DROP FOREIGN KEY `fk__rdwocioirdhr884ejtjiqrbk1`;
ALTER TABLE `tms_activity_logs` 
   DROP FOREIGN KEY `fk__51cp3re0jd666kke82rnygmxj`;
ALTER TABLE `tms_activity_logs` 
   DROP FOREIGN KEY `fk__64e2cpdi6c2uvwfayo2l5w0h1`;
ALTER TABLE `tms_activity_outputs` 
   DROP FOREIGN KEY `fk__b59db444utbewexb09qlf4n4y`;
ALTER TABLE `tms_activity_steps` 
   DROP FOREIGN KEY `fk__fwk5k8uf2xrenfu8samwulcam`;
ALTER TABLE `tms_projects` 
   DROP FOREIGN KEY `fk__mq8rbfm4b44ak989oc0mjkmg2`;
ALTER TABLE `tms_project_user_account_assoc` 
   DROP FOREIGN KEY `fk__othxp8u3q5k7fey8irj0bqqw7`;
ALTER TABLE `tms_project_user_account_assoc` 
   DROP FOREIGN KEY `fk__mruh0lawqnd51vb1v2d5ah112`;
ALTER TABLE `tms_requirements` 
   DROP FOREIGN KEY `fk__a7wh19e81i7tg0yxxwpipqj6v`;
ALTER TABLE `tms_scenarios` 
   DROP FOREIGN KEY `fk__c37ta975yrwt1vejw58x1x6a4`;
ALTER TABLE `tms_tests` 
   DROP FOREIGN KEY `fk__p0erxajbtqxu9l3rd8qq60t0k`;
ALTER TABLE `tms_tests` 
   DROP FOREIGN KEY `fk__apu43sh7fqk3u1q6c2jc6sxlt`;
ALTER TABLE `tms_test_user_account_assoc` 
   DROP FOREIGN KEY `fk__ja59utr7r1sa9cvlh322r48bi`;
ALTER TABLE `tms_test_user_account_assoc` 
   DROP FOREIGN KEY `fk__3jb55dp4svrxerknbb6t9d13i`;
ALTER TABLE `tms_test_acceptance_criteria` 
   DROP FOREIGN KEY `fk__qtdxy4frlgewvobpoocw1an4o`;
ALTER TABLE `tms_test_attachments` 
   DROP FOREIGN KEY `fk__tdg3amjhin0i92bvnolw3yxkv`;
ALTER TABLE `tms_test_comments` 
   DROP FOREIGN KEY `fk__5yub80cobh1hb8qdtvri4tonv`;
ALTER TABLE `tms_test_comments` 
   DROP FOREIGN KEY `fk__pklix22imprv4nkc0ww7fm0c4`;
ALTER TABLE `tms_test_histories` 
   DROP FOREIGN KEY `fk__8ws7vxxyxmxg41jwpdb2yic6f`;
ALTER TABLE `tms_test_histories` 
   DROP FOREIGN KEY `fk__2u4njawdjwd5g19pk6299eopu`;
ALTER TABLE `tms_requirenment_tms_test_assoc` 
   DROP FOREIGN KEY `fk__5qw7sb02epcyki90pces7mkfo`;
ALTER TABLE `tms_requirenment_tms_test_assoc` 
   DROP FOREIGN KEY `fk__tblpvqnos732t2l331gv1vc47`;
ALTER TABLE `tms_test_risks` 
   DROP FOREIGN KEY `fk__6jq70kkr375mc0agpr0dkkhnr`;
ALTER TABLE `tms_test_run_reports` 
   DROP FOREIGN KEY `fk__2n71mvbqp9dj9hjkwdd3x42sl`;
ALTER TABLE `tms_test_runs` 
   DROP FOREIGN KEY `fk__qshkrcst8jyrgdu6tobs1m5yh`;
ALTER TABLE `tms_test_variables` 
   DROP FOREIGN KEY `fk__hbldml5x76ht2gvcpicm9l5kx`;
ALTER TABLE `tms_virtual_users` 
   DROP FOREIGN KEY `fk__t5yyi6221wuwvj4a6lfxgbcml`;
   

/*
 *
 * Add indexes
 */
ALTER TABLE `tms_activity_user_account_assoc` 
   DROP INDEX `uk__7k6sgj2xk88vkw436bhsyax50`;
ALTER TABLE `tms_requirenment_tms_test_assoc` 
   DROP INDEX `uk__8u1a98nly5v6urrev6x66l2h4`;
ALTER TABLE `tms_test_user_account_assoc` 
   DROP INDEX `uk__3ggajrpbwf7t8o2o6btx4qk9f`;


