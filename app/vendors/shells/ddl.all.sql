-- MySQL dump 10.13  Distrib 5.1.52, for redhat-linux-gnu (i686)
--
-- Host: localhost    Database: kendb
-- ------------------------------------------------------
-- Server version	5.1.52-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alias` (`alias`),
  KEY `lft_rght` (`lft`,`rght`),
  KEY `idx_acos_model_foreign_key` (`model`,`foreign_key`)
) ENGINE=InnoDB AUTO_INCREMENT=366 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adoptions`
--

DROP TABLE IF EXISTS `adoptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adoptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(4) NOT NULL,
  `type_no` varchar(50) DEFAULT NULL,
  `grant_delivery_institute` varchar(255) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `decision_date` date DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `advance_application_reception_date` date DEFAULT NULL,
  `move_out_in_etc` varchar(255) DEFAULT NULL,
  `research_type` varchar(255) DEFAULT NULL,
  `screening` varchar(100) DEFAULT NULL,
  `end_before_application` varchar(100) DEFAULT NULL,
  `contribution` varchar(100) DEFAULT NULL,
  `detail_ambit_no` varchar(100) DEFAULT NULL,
  `division_a_b` varchar(100) DEFAULT NULL,
  `research_number_points` varchar(100) DEFAULT NULL,
  `arrange_no` varchar(100) DEFAULT NULL,
  `problem_no` varchar(100) DEFAULT NULL,
  `new_or_continuance` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `notifying_department` varchar(255) DEFAULT NULL,
  `statistical_department` varchar(255) DEFAULT NULL,
  `major_name` varchar(255) DEFAULT NULL,
  `application_job` varchar(255) DEFAULT NULL,
  `current_job_title` varchar(255) DEFAULT NULL,
  `statistical_job` varchar(255) DEFAULT NULL,
  `this_year_application_amount` bigint(20) DEFAULT NULL,
  `current_payment_sum_appointment` bigint(20) DEFAULT NULL,
  `current_payment_d_appointment` bigint(20) DEFAULT NULL,
  `current_payment_i_appointment` bigint(20) DEFAULT NULL,
  `next1_payment_d_appointment` bigint(20) DEFAULT NULL,
  `next2_payment_d_appointment` bigint(20) DEFAULT NULL,
  `next3_payment_d_appointment` bigint(20) DEFAULT NULL,
  `next4_payment_d_appointment` bigint(20) DEFAULT NULL,
  `next5_payment_d_appointment` bigint(20) DEFAULT NULL,
  `current_payment_sum` bigint(20) DEFAULT NULL,
  `current_payment_d` bigint(20) DEFAULT NULL,
  `current_payment_i` bigint(20) DEFAULT NULL,
  `next1_payment_d` bigint(20) DEFAULT NULL,
  `next2_payment_d` bigint(20) DEFAULT NULL,
  `next3_payment_d` bigint(20) DEFAULT NULL,
  `next4_payment_d` bigint(20) DEFAULT NULL,
  `next5_payment_d` bigint(20) DEFAULT NULL,
  `researcher_no` varchar(8) DEFAULT NULL,
  `researcher_assignment` varchar(255) DEFAULT NULL,
  `remarks1` text,
  `grant_reception_date` date DEFAULT NULL,
  `total_primary_cost` bigint(20) DEFAULT NULL,
  `detail_goods_cost` bigint(20) DEFAULT NULL,
  `detail_travel_cost` bigint(20) DEFAULT NULL,
  `detail_gratuity_cost` bigint(20) DEFAULT NULL,
  `detail_other_cost` bigint(20) DEFAULT NULL,
  `remarks_issue_application` text,
  `contribution_count` int(11) DEFAULT NULL,
  `contribution_amount` bigint(20) DEFAULT NULL,
  `contribution_partition` bigint(20) DEFAULT NULL,
  `adjudicator` varchar(255) DEFAULT NULL,
  `contribution_remarks` text,
  `achievement_report_reception_date` date DEFAULT NULL,
  `achievement_primary_cost` bigint(20) DEFAULT NULL,
  `achievement_detail_goods_cost` bigint(20) DEFAULT NULL,
  `achievement_detail_travel_cost` bigint(20) DEFAULT NULL,
  `achievement_detail_gratuity_cost` bigint(20) DEFAULT NULL,
  `achievement_detail_other_cost` bigint(20) DEFAULT NULL,
  `achievement_indirect_cost` bigint(20) DEFAULT NULL,
  `achievement_remarks` text,
  `achievement_carried_report_reception_date` date DEFAULT NULL,
  `achievement_carried_primary_cost` bigint(20) DEFAULT NULL,
  `achievement_carried_detail_goods_cost` bigint(20) DEFAULT NULL,
  `achievement_carried_detail_travel_cost` bigint(20) DEFAULT NULL,
  `achievement_carried_detail_gratuity_cost` bigint(20) DEFAULT NULL,
  `achievement_carried_detail_other_cost` bigint(20) DEFAULT NULL,
  `achievement_carried_indirect_cost` bigint(20) DEFAULT NULL,
  `carried_titech_assignment_no` varchar(100) DEFAULT NULL,
  `carried_primary_cost` bigint(20) DEFAULT NULL,
  `carried_detail_goods_cost` bigint(20) DEFAULT NULL,
  `carried_detail_travel_cost` bigint(20) DEFAULT NULL,
  `carried_detail_gratuity_cost` bigint(20) DEFAULT NULL,
  `carried_detail_other_cost` bigint(20) DEFAULT NULL,
  `carried_indirect_cost` bigint(20) DEFAULT NULL,
  `process_carried_remarks` text,
  `fixed_amount` bigint(20) DEFAULT NULL,
  `fixed_amount_primary_cost` bigint(20) DEFAULT NULL,
  `fixed_amount_indirect_cost` bigint(20) DEFAULT NULL,
  `turnback_amount` bigint(20) DEFAULT NULL,
  `turnback_amount_primary_cost` bigint(20) DEFAULT NULL,
  `turnback_amount_indirect_cost` bigint(20) DEFAULT NULL,
  `turnback_amount_remarks` text,
  `self_assessment_person` varchar(255) DEFAULT NULL,
  `self_assessment_date` date DEFAULT NULL,
  `self_assessment_remarks` text,
  `accomplishment_object_person` varchar(255) DEFAULT NULL,
  `accomplishment_date` date DEFAULT NULL,
  `process_date` date DEFAULT NULL,
  `accomplishment_scheduled_date` date DEFAULT NULL,
  `accomplishment_remarks` text,
  `extension` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `post_no` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `special_mention` text,
  `cooperate_no` varchar(11) DEFAULT NULL,
  `personal_no` varchar(8) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT '0',
  `hidden` tinyint(1) DEFAULT '0',
  `unaggregate` tinyint(1) DEFAULT '0',
  `open_to_public` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `institute_code` varchar(100) COMMENT 'é™¢ã‚³ãƒ¼ãƒ‰',
  `school_code` varchar(100) COMMENT 'ç³»ã‚³ãƒ¼ãƒ‰',
  `course_code` varchar(100) COMMENT 'ã‚³ãƒ¼ã‚¹ã‚³ãƒ¼ãƒ‰',
  PRIMARY KEY (`id`),
  KEY `adoptions_coopno` (`cooperate_no`),
  KEY `adoptions_personalno` (`personal_no`),
  KEY `adoptions_researcherno` (`researcher_no`)
) ENGINE=InnoDB AUTO_INCREMENT=29265 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `aggregate_counts`
--

DROP TABLE IF EXISTS `aggregate_counts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aggregate_counts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rank` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `amount` bigint(20) DEFAULT '0',
  `count` bigint(20) DEFAULT '0',
  `personal_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `researcher_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `major_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthdayYMD` int(11) NOT NULL,
  `age_based_at` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personal_no_aggr_count` (`personal_no`),
  KEY `year_aggr_count` (`year`)
) ENGINE=MyISAM AUTO_INCREMENT=6672 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `aggregate_ranking`
--

DROP TABLE IF EXISTS `aggregate_ranking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aggregate_ranking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rank` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `amount` bigint(20) DEFAULT '0',
  `count` bigint(20) DEFAULT '0',
  `personal_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `researcher_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `major_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthdayYMD` int(11) NOT NULL,
  `age_based_at` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personal_no_aggr_rank` (`personal_no`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `aggregate_result`
--

DROP TABLE IF EXISTS `aggregate_result`;
/*!50001 DROP VIEW IF EXISTS `aggregate_result`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `aggregate_result` (
  `rank` int(11),
  `researcher_name` varchar(100),
  `personal_no` varchar(20),
  `age` int(11),
  `year` int(11),
  `year_count` bigint(20),
  `year_amount` bigint(20),
  `major_name` varchar(255),
  `job_title` varchar(255),
  `total_count` bigint(20),
  `total_amount` bigint(20),
  `sex` varchar(4),
  `memo` char(0)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `aggregate_years`
--

DROP TABLE IF EXISTS `aggregate_years`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aggregate_years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rank` int(11) NOT NULL,
  `personal_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `personal_no_aggr_year` (`personal_no`),
  KEY `year_aggr_year` (`year`)
) ENGINE=MyISAM AUTO_INCREMENT=391 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `model_foriegnkey` (`model`,`foreign_key`),
  KEY `idx_aros_lft_rght` (`lft`,`rght`),
  KEY `idx_aros_alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`),
  KEY `aro_aco` (`aro_id`,`aco_id`),
  KEY `aco_id` (`aco_id`),
  CONSTRAINT `aros_acos_ibfk_1` FOREIGN KEY (`aro_id`) REFERENCES `aros` (`id`),
  CONSTRAINT `aros_acos_ibfk_2` FOREIGN KEY (`aco_id`) REFERENCES `acos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1165 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `assessed_contributions`
--

DROP TABLE IF EXISTS `assessed_contributions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assessed_contributions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(4) NOT NULL,
  `representative_affiliation` varchar(255) DEFAULT NULL,
  `representative_department` varchar(255) DEFAULT NULL,
  `representative_job_type` varchar(255) DEFAULT NULL,
  `representative_name` varchar(255) DEFAULT NULL,
  `cooperate_no` varchar(11) DEFAULT NULL,
  `personal_no` varchar(8) DEFAULT NULL,
  `co_researcher_no` varchar(8) DEFAULT NULL,
  `co_researcher_department` varchar(255) DEFAULT NULL,
  `co_researcher_major_name` varchar(255) DEFAULT NULL,
  `co_researcher_job_type` varchar(255) DEFAULT NULL,
  `department_no` varchar(255) DEFAULT NULL,
  `co_researcher_name` varchar(255) DEFAULT NULL,
  `post_no` varchar(255) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `moving_history` text,
  `research_type` varchar(255) DEFAULT NULL,
  `title_no` varchar(8) DEFAULT NULL,
  `titech_assignment_no` varchar(8) DEFAULT NULL,
  `project` varchar(255) DEFAULT NULL,
  `primary_cost` bigint(20) DEFAULT NULL,
  `detail_good_cost` bigint(20) DEFAULT NULL,
  `detail_trip_cost` bigint(20) DEFAULT NULL,
  `detail_reward_cost` bigint(20) DEFAULT NULL,
  `detail_other` bigint(20) DEFAULT NULL,
  `indirect_cost` bigint(20) DEFAULT NULL,
  `remarks` text,
  `is_distributed_amount_change` varchar(100) DEFAULT NULL,
  `distributed_amount_change` bigint(20) DEFAULT NULL,
  `change_detail_good_cost` bigint(20) DEFAULT NULL,
  `change_detail_trip_cost` bigint(20) DEFAULT NULL,
  `change_detail_reward_cost` bigint(20) DEFAULT NULL,
  `change_detail_other` bigint(20) DEFAULT NULL,
  `change_indirect_cost` bigint(20) DEFAULT NULL,
  `remarks_distributed_change` text,
  `contribution_repartition_official_letter` date DEFAULT NULL,
  `detail_cost_check` varchar(255) DEFAULT NULL,
  `recept_commission_request_date` date DEFAULT NULL,
  `recept_commission_recept_date` date DEFAULT NULL,
  `request_transfer` date DEFAULT NULL,
  `representative_organization_send` date DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `recovery_date` date DEFAULT NULL,
  `payment_confirmed_date` date DEFAULT NULL,
  `research_plan_contact` date DEFAULT NULL,
  `contribution_repartition_official_letter_distributed_change` date DEFAULT NULL,
  `detail_cost_check_amount_change` varchar(255) DEFAULT NULL,
  `recept_commission_request_date_distributed_change` date DEFAULT NULL,
  `recept_commission_recept_date_distributed_change` date DEFAULT NULL,
  `request_transfer_distributed_change` date DEFAULT NULL,
  `representative_organization_send_distributed_change` date DEFAULT NULL,
  `payment_date_distributed_change` date DEFAULT NULL,
  `recovery_date_distributed_change` date DEFAULT NULL,
  `payment_confirmed_date_distributed_change` date DEFAULT NULL,
  `research_plan_contact_distributed_change` date DEFAULT NULL,
  `remarks_distributed_change_process` text,
  `exhibit_overdue` date DEFAULT NULL,
  `exhibit_induction_date` date DEFAULT NULL,
  `real_primary_cost` bigint(20) DEFAULT NULL,
  `expense_detail_goods_cost` bigint(20) DEFAULT NULL,
  `expense_detail_trip_cost` bigint(20) DEFAULT NULL,
  `expense_detail_reward_cost` bigint(20) DEFAULT NULL,
  `expense_detail_other` bigint(20) DEFAULT NULL,
  `real_indirect_cost` bigint(20) DEFAULT NULL,
  `turnback_payment_amount` bigint(20) DEFAULT NULL,
  `turnback_indirect_amount` bigint(20) DEFAULT NULL,
  `remarks_report` text,
  `represent_postal_no` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `research_institute_name` varchar(255) DEFAULT NULL,
  `office_in_charge` varchar(255) DEFAULT NULL,
  `person_in_charge` varchar(255) DEFAULT NULL,
  `tel_in_charge` varchar(255) DEFAULT NULL,
  `fax_in_charge` varchar(255) DEFAULT NULL,
  `email_in_charge` varchar(255) DEFAULT NULL,
  `other_contact_in_charge` text,
  `remarks_other` text,
  `disabled` tinyint(1) DEFAULT '0',
  `hidden` tinyint(1) DEFAULT '0',
  `unaggregate` tinyint(1) DEFAULT '0',
  `open_to_public` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `institute_code` varchar(100) COMMENT 'é™¢ã‚³ãƒ¼ãƒ‰',
  `school_code` varchar(100) COMMENT 'ç³»ã‚³ãƒ¼ãƒ‰',
  `course_code` varchar(100) COMMENT 'ã‚³ãƒ¼ã‚¹ã‚³ãƒ¼ãƒ‰',
  PRIMARY KEY (`id`),
  KEY `assessed_contributions_coopno` (`cooperate_no`),
  KEY `assessed_contributions_personalno` (`personal_no`),
  KEY `assessed_contributions_researcherno` (`co_researcher_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2070 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contracts`
--

DROP TABLE IF EXISTS `contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_id` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `cooperate_no` varchar(11) DEFAULT NULL,
  `researcher_no` varchar(8) DEFAULT NULL,
  `project_code` varchar(100) NOT NULL,
  `assignment_no` varchar(100) DEFAULT NULL,
  `funds_institute` varchar(255) DEFAULT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `project_assignment_name` varchar(255) DEFAULT NULL,
  `project_start_year` date DEFAULT NULL,
  `initial_start_date` date DEFAULT NULL,
  `initial_end_date` date DEFAULT NULL,
  `this_year_start_date` date DEFAULT NULL,
  `this_year_end_date` date DEFAULT NULL,
  `new_or_continuance` varchar(100) DEFAULT NULL,
  `represent_researcher_name` varchar(100) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `major_name` varchar(255) DEFAULT NULL,
  `singular_or_multi` varchar(100) DEFAULT NULL,
  `contract_date` date DEFAULT NULL,
  `contract_amount` bigint(20) DEFAULT NULL,
  `this_year_reception_amount` bigint(20) DEFAULT NULL,
  `primary_cost` bigint(20) DEFAULT NULL,
  `common_cost` bigint(20) DEFAULT NULL,
  `indirect_cost` bigint(20) DEFAULT NULL,
  `general_administration_cost` bigint(20) DEFAULT NULL,
  `billing_type` varchar(100) DEFAULT NULL,
  `billing_date_1` date DEFAULT NULL,
  `payment_due_1` date DEFAULT NULL,
  `payment_date_1` date DEFAULT NULL,
  `credit_1` bigint(20) DEFAULT NULL,
  `billing_date_2` date DEFAULT NULL,
  `payment_due_2` date DEFAULT NULL,
  `payment_date_2` date DEFAULT NULL,
  `credit_2` bigint(20) DEFAULT NULL,
  `billing_date_3` date DEFAULT NULL,
  `payment_due_3` date DEFAULT NULL,
  `payment_date_3` date DEFAULT NULL,
  `credit_3` bigint(20) DEFAULT NULL,
  `billing_date_4` date DEFAULT NULL,
  `payment_due_4` date DEFAULT NULL,
  `payment_date_4` date DEFAULT NULL,
  `credit_4` bigint(20) DEFAULT NULL,
  `remarks1` text,
  `remarks2` text,
  `remarks3` text,
  `disabled` tinyint(1) DEFAULT '0',
  `hidden` tinyint(1) DEFAULT '0',
  `unaggregate` tinyint(1) DEFAULT '0',
  `open_to_public` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `institute_code` varchar(100) COMMENT 'é™¢ã‚³ãƒ¼ãƒ‰',
  `school_code` varchar(100) COMMENT 'ç³»ã‚³ãƒ¼ãƒ‰',
  `course_code` varchar(100) COMMENT 'ã‚³ãƒ¼ã‚¹ã‚³ãƒ¼ãƒ‰',
  PRIMARY KEY (`id`),
  KEY `idx_contracts_parent_id` (`contract_id`),
  KEY `contracts_coopno` (`cooperate_no`),
  KEY `contracts_researcherno` (`researcher_no`)
) ENGINE=InnoDB AUTO_INCREMENT=984 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(4) NOT NULL,
  `section_in_charge` varchar(100) DEFAULT NULL,
  `receipt_no` varchar(100) DEFAULT NULL,
  `receipt_send_date` date DEFAULT NULL,
  `remarks_receipt` text,
  `payment_date` date DEFAULT NULL,
  `contract_resolution_no` varchar(100) DEFAULT NULL,
  `income_section_code` varchar(100) DEFAULT NULL,
  `income_section_name` varchar(255) DEFAULT NULL,
  `contract_obligation` varchar(100) DEFAULT NULL,
  `contract_obligation_name` varchar(255) DEFAULT NULL,
  `planned_income` bigint(20) DEFAULT NULL,
  `foreign_money_type` varchar(100) DEFAULT NULL,
  `planned_income_foreign` bigint(20) DEFAULT NULL,
  `income_yen` bigint(20) DEFAULT NULL,
  `subsidy_type` varchar(100) DEFAULT NULL,
  `project_code` varchar(100) NOT NULL,
  `project_code_name` varchar(255) DEFAULT NULL,
  `vouching_remarks` text,
  `payment_due` date DEFAULT NULL,
  `contraction_date` date DEFAULT NULL,
  `contract_resolution_detail_no` varchar(100) DEFAULT NULL,
  `division_count` int(11) DEFAULT NULL,
  `detail_remarks` text,
  `research_promotion_name` varchar(255) DEFAULT NULL,
  `research_promotion_year` int(11) DEFAULT NULL,
  `research_promotion_remarks` text,
  `variety` varchar(100) DEFAULT NULL,
  `remarks` text,
  `obligation_name` varchar(255) DEFAULT NULL,
  `ob_represent_name` varchar(255) DEFAULT NULL,
  `ob_job_title` varchar(255) DEFAULT NULL,
  `common_cost_check` varchar(255) DEFAULT NULL,
  `common_cost` bigint(20) DEFAULT NULL,
  `ob_postal_code` varchar(100) DEFAULT NULL,
  `ob_address` varchar(255) DEFAULT NULL,
  `ob_section` varchar(255) DEFAULT NULL,
  `ob_person_in_charge` varchar(255) DEFAULT NULL,
  `researcher_name` varchar(255) DEFAULT NULL,
  `major_name` varchar(255) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `extension` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `post_no` varchar(100) DEFAULT NULL,
  `cooperate_no` varchar(11) DEFAULT NULL,
  `researcher_no` varchar(8) DEFAULT NULL,
  `personal_no` varchar(8) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT '0',
  `hidden` tinyint(1) DEFAULT '0',
  `unaggregate` tinyint(1) DEFAULT '0',
  `open_to_public` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `institute_code` varchar(100) COMMENT 'é™¢ã‚³ãƒ¼ãƒ‰',
  `school_code` varchar(100) COMMENT 'ç³»ã‚³ãƒ¼ãƒ‰',
  `course_code` varchar(100) COMMENT 'ã‚³ãƒ¼ã‚¹ã‚³ãƒ¼ãƒ‰',
  PRIMARY KEY (`id`),
  KEY `donations_coopno` (`cooperate_no`),
  KEY `donations_personalno` (`personal_no`),
  KEY `donations_researcherno` (`researcher_no`)
) ENGINE=InnoDB AUTO_INCREMENT=18328 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `edit_statuses`
--

DROP TABLE IF EXISTS `edit_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edit_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(100) NOT NULL,
  `data_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `encourages`
--

DROP TABLE IF EXISTS `encourages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encourages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(4) NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `decision_date` date DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `moving_history` text,
  `domestic_or_not` varchar(100) DEFAULT NULL,
  `classification` varchar(255) DEFAULT NULL,
  `new_or_continuance` varchar(100) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `recruiting_year` int(11) DEFAULT NULL,
  `reception_no` varchar(255) DEFAULT NULL,
  `assignment_no` varchar(100) DEFAULT NULL,
  `this_year_advance_application_date` date DEFAULT NULL,
  `qualification_and_others` varchar(100) DEFAULT NULL,
  `ambit` varchar(255) DEFAULT NULL,
  `represent_researcher_name` varchar(100) DEFAULT NULL,
  `department_represent_researcher` varchar(100) DEFAULT NULL,
  `cooperate_no` varchar(11) DEFAULT NULL,
  `personal_no` varchar(8) DEFAULT NULL,
  `researcher_no` varchar(8) DEFAULT NULL,
  `facility_teacher` varchar(255) DEFAULT NULL,
  `foreigner_researcher` varchar(255) DEFAULT NULL,
  `appointment_department` varchar(255) DEFAULT NULL,
  `appointment_job_title` varchar(255) DEFAULT NULL,
  `statistical_department` varchar(100) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `recruit_start_date` date DEFAULT NULL,
  `recruit_end_date` date DEFAULT NULL,
  `number_of_month` varchar(10) DEFAULT NULL,
  `remarks_change` text,
  `remarks_qualification` text,
  `remarks` text,
  `research_plan_reception_date` date DEFAULT NULL,
  `confirmation_statement_date` date DEFAULT NULL,
  `this_year_application_amount` bigint(20) DEFAULT NULL,
  `this_year_distributed_amount_appointment` bigint(20) DEFAULT NULL,
  `next_year_distributed_amount_appointment` bigint(20) DEFAULT NULL,
  `next2_year_distributed_amount_appointment` bigint(20) DEFAULT NULL,
  `this_year_distributed_amount` bigint(20) DEFAULT NULL,
  `next_year_distributed_amount` bigint(20) DEFAULT NULL,
  `next2_year_distributed_amount` bigint(20) DEFAULT NULL,
  `titech_assignment_no` varchar(100) DEFAULT NULL,
  `research_assignment` varchar(255) DEFAULT NULL,
  `acceptance_statement` date DEFAULT NULL,
  `acceptance_application_reception_date` date DEFAULT NULL,
  `issue_application_reception_date` date DEFAULT NULL,
  `total_primary_cost` bigint(20) DEFAULT NULL,
  `detail_goods_cost` bigint(20) DEFAULT NULL,
  `detail_travel_cost` bigint(20) DEFAULT NULL,
  `detail_gratuity_cost` bigint(20) DEFAULT NULL,
  `detail_other_cost` bigint(20) DEFAULT NULL,
  `issue_application_remarks` text,
  `achievement_report_reception_date` date DEFAULT NULL,
  `achievement_primary_cost` bigint(20) DEFAULT NULL,
  `achievement_detail_goods_cost` bigint(20) DEFAULT NULL,
  `achievement_detail_travel_cost` bigint(20) DEFAULT NULL,
  `achievement_detail_gratuity_cost` bigint(20) DEFAULT NULL,
  `achievement_detail_other_cost` bigint(20) DEFAULT NULL,
  `achievement_remarks` text,
  `achievement_carried_report_reception_date` date DEFAULT NULL,
  `achievement_carried_primary_cost` bigint(20) DEFAULT NULL,
  `achievement_carried_detail_goods_cost` bigint(20) DEFAULT NULL,
  `achievement_carried_detail_travel_cost` bigint(20) DEFAULT NULL,
  `achievement_carried_detail_gratuity_cost` bigint(20) DEFAULT NULL,
  `achievement_carried_detail_other_cost` bigint(20) DEFAULT NULL,
  `carried_titech_assignment_no` varchar(8) DEFAULT NULL,
  `balance_carried` bigint(20) DEFAULT NULL,
  `carried_detail_goods_cost` bigint(20) DEFAULT NULL,
  `carried_detail_travel_cost` bigint(20) DEFAULT NULL,
  `carried_detail_gratuity_cost` bigint(20) DEFAULT NULL,
  `carried_detail_other_cost` bigint(20) DEFAULT NULL,
  `remarks_carried` text,
  `fixed_amount` bigint(20) DEFAULT NULL,
  `turnback_amount` bigint(20) DEFAULT NULL,
  `remarks_balance_fixed_turnback` text,
  `extension` varchar(100) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile_phone` varchar(255) DEFAULT NULL,
  `post_no` varchar(50) DEFAULT NULL,
  `extension_researcher` varchar(100) DEFAULT NULL,
  `received_researcher_email` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `matriculation_number` varchar(255) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT '0',
  `hidden` tinyint(1) DEFAULT '0',
  `open_to_public` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `institute_code` varchar(100) COMMENT 'é™¢ã‚³ãƒ¼ãƒ‰',
  `school_code` varchar(100) COMMENT 'ç³»ã‚³ãƒ¼ãƒ‰',
  `course_code` varchar(100) COMMENT 'ã‚³ãƒ¼ã‚¹ã‚³ãƒ¼ãƒ‰',
  PRIMARY KEY (`id`),
  KEY `encourages_coopno` (`cooperate_no`),
  KEY `encourages_personalno` (`personal_no`),
  KEY `encourages_researcherno` (`researcher_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2232 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entrusts`
--

DROP TABLE IF EXISTS `entrusts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrusts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entrust_id` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `cooperate_no` varchar(11) NOT NULL,
  `researcher_no` varchar(8) DEFAULT NULL,
  `project_code` varchar(100) DEFAULT NULL,
  `project_type` varchar(100) DEFAULT NULL,
  `person_in_charge` varchar(255) DEFAULT NULL,
  `resolution_no` varchar(100) DEFAULT NULL,
  `branch_no` varchar(100) DEFAULT NULL,
  `reception_date` date DEFAULT NULL,
  `start_budget_year` varchar(100) DEFAULT NULL,
  `credit` bigint(20) DEFAULT NULL,
  `researcher_name` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `major_name` varchar(100) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `extension` varchar(100) DEFAULT NULL,
  `post_no` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `area_of_research` varchar(100) DEFAULT NULL,
  `singular_or_multi` varchar(100) DEFAULT NULL,
  `new_or_continuance` varchar(100) DEFAULT NULL,
  `payment` varchar(100) DEFAULT NULL,
  `division_count` int(11) DEFAULT NULL,
  `continuance_no` varchar(100) DEFAULT NULL,
  `applicant_name_1` varchar(100) DEFAULT NULL,
  `category_of_business` varchar(100) DEFAULT NULL,
  `association_type` varchar(100) DEFAULT NULL,
  `applicant_scale` varchar(100) DEFAULT NULL,
  `applicant_name_2` varchar(100) DEFAULT NULL,
  `business_title` varchar(100) DEFAULT NULL,
  `representative` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `associate_researcher_name` varchar(255) DEFAULT NULL,
  `number_of_researchers` int(11) DEFAULT NULL,
  `formula` int(11) DEFAULT '1',
  `former_payment_d` bigint(20) DEFAULT NULL,
  `former_payment_r` bigint(20) DEFAULT NULL,
  `former_payment_i` bigint(20) DEFAULT NULL,
  `former_payment_sum` bigint(20) DEFAULT NULL,
  `current_payment_dr` bigint(20) DEFAULT NULL,
  `current_payment_u` bigint(20) DEFAULT NULL,
  `current_payment_g` bigint(20) DEFAULT NULL,
  `current_payment_d` bigint(20) DEFAULT NULL,
  `current_payment_r` bigint(20) DEFAULT NULL,
  `current_payment_i` bigint(20) DEFAULT NULL,
  `current_payment_sum` bigint(20) DEFAULT NULL,
  `current_payment_alloc` bigint(20) DEFAULT NULL,
  `next1_payment_d` bigint(20) DEFAULT NULL,
  `next1_payment_r` bigint(20) DEFAULT NULL,
  `next1_payment_i` bigint(20) DEFAULT NULL,
  `next1_payment_sum` bigint(20) DEFAULT NULL,
  `next2_payment_d` bigint(20) DEFAULT NULL,
  `next2_payment_r` bigint(20) DEFAULT NULL,
  `next2_payment_i` bigint(20) DEFAULT NULL,
  `next2_payment_sum` bigint(20) DEFAULT NULL,
  `next3_payment_d` bigint(20) DEFAULT NULL,
  `next3_payment_r` bigint(20) DEFAULT NULL,
  `next3_payment_i` bigint(20) DEFAULT NULL,
  `next3_payment_sum` bigint(20) DEFAULT NULL,
  `next4_payment_d` bigint(20) DEFAULT NULL,
  `next4_payment_r` bigint(20) DEFAULT NULL,
  `next4_payment_i` bigint(20) DEFAULT NULL,
  `next4_payment_sum` bigint(20) DEFAULT NULL,
  `d_total` bigint(20) DEFAULT NULL,
  `r_total` bigint(20) DEFAULT NULL,
  `i_total` bigint(20) DEFAULT NULL,
  `total_amount` bigint(20) DEFAULT NULL,
  `contraction_date` date DEFAULT NULL,
  `resolution_date` date DEFAULT NULL,
  `payment_due` date DEFAULT NULL,
  `payment_month` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `advance` varchar(100) DEFAULT NULL,
  `ow_post_no` varchar(100) DEFAULT NULL,
  `ow_address` varchar(255) DEFAULT NULL,
  `ow_company_name` varchar(255) DEFAULT NULL,
  `ow_section` varchar(255) DEFAULT NULL,
  `ow_title` varchar(255) DEFAULT NULL,
  `ow_name` varchar(255) DEFAULT NULL,
  `ow_tel` varchar(255) DEFAULT NULL,
  `ow_fax` varchar(255) DEFAULT NULL,
  `ow_email` varchar(255) DEFAULT NULL,
  `bill_post_no` varchar(100) DEFAULT NULL,
  `bill_address` varchar(255) DEFAULT NULL,
  `bill_company_name` varchar(255) DEFAULT NULL,
  `bill_section` varchar(255) DEFAULT NULL,
  `bill_title` varchar(255) DEFAULT NULL,
  `bill_name` varchar(255) DEFAULT NULL,
  `bill_tel` varchar(255) DEFAULT NULL,
  `bill_fax` varchar(255) DEFAULT NULL,
  `bill_email` varchar(255) DEFAULT NULL,
  `entrust_remarks` text,
  `open_to_public` tinyint(1) NOT NULL DEFAULT '0',
  `disabled` tinyint(1) DEFAULT '0',
  `hidden` tinyint(1) DEFAULT '0',
  `unaggregate` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `institute_code` varchar(100) COMMENT 'é™¢ã‚³ãƒ¼ãƒ‰',
  `school_code` varchar(100) COMMENT 'ç³»ã‚³ãƒ¼ãƒ‰',
  `course_code` varchar(100) COMMENT 'ã‚³ãƒ¼ã‚¹ã‚³ãƒ¼ãƒ‰',
  PRIMARY KEY (`id`),
  KEY `idx_entrusts_parent_id` (`entrust_id`),
  KEY `entrusts_coopno` (`cooperate_no`),
  KEY `entrusts_researcherno` (`researcher_no`)
) ENGINE=InnoDB AUTO_INCREMENT=20654 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grants`
--

DROP TABLE IF EXISTS `grants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grant_id` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `adoption_year` int(11) DEFAULT NULL,
  `cooperate_no` varchar(11) DEFAULT NULL,
  `researcher_no` varchar(8) DEFAULT NULL,
  `project_code` varchar(100) NOT NULL,
  `assignment_no` varchar(100) DEFAULT NULL,
  `grant_name` varchar(255) DEFAULT NULL,
  `grant_project_name` varchar(255) DEFAULT NULL,
  `project_assignment_name` varchar(255) DEFAULT NULL,
  `grant_initial_decision_date` date DEFAULT NULL,
  `grant_initial_start_date` date DEFAULT NULL,
  `grant_initial_end_date` date DEFAULT NULL,
  `grant_this_year_decision_date` date DEFAULT NULL,
  `grant_this_year_start_date` date DEFAULT NULL,
  `grant_this_year_end_date` date DEFAULT NULL,
  `represent_type` varchar(255) DEFAULT NULL,
  `represent_researcher_name` varchar(100) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `major_name` varchar(255) DEFAULT NULL,
  `grant_funds_institute` varchar(255) DEFAULT NULL,
  `grant_delivery_institute` varchar(255) DEFAULT NULL,
  `delegate_1` varchar(255) DEFAULT NULL,
  `delegate_2` varchar(255) DEFAULT NULL,
  `delegate_3` varchar(255) DEFAULT NULL,
  `delegate_4` varchar(255) DEFAULT NULL,
  `singular_or_multi` varchar(100) DEFAULT NULL,
  `balance_carried_forward` bigint(20) DEFAULT NULL,
  `grant_this_year_decision_money` bigint(20) DEFAULT NULL,
  `grant_this_year_reception_amount` bigint(20) DEFAULT NULL,
  `primary_cost` bigint(20) DEFAULT NULL,
  `indirect_cost` bigint(20) DEFAULT NULL,
  `general_administration_cost` bigint(20) DEFAULT NULL,
  `self_contribute_money` bigint(20) DEFAULT NULL,
  `other_cost` bigint(20) DEFAULT NULL,
  `delegate_1_money` bigint(20) DEFAULT NULL,
  `delegate_2_money` bigint(20) DEFAULT NULL,
  `delegate_3_money` bigint(20) DEFAULT NULL,
  `delegate_4_money` bigint(20) DEFAULT NULL,
  `billing_type` varchar(100) DEFAULT NULL,
  `kaken_system_registration_date` date DEFAULT NULL,
  `reception_status_entry_date` date DEFAULT NULL,
  `remarks1` text,
  `remarks2` text,
  `remarks3` text,
  `disabled` tinyint(1) DEFAULT '0',
  `hidden` tinyint(1) DEFAULT '0',
  `unaggregate` tinyint(1) DEFAULT '0',
  `open_to_public` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `institute_code` varchar(100) COMMENT 'é™¢ã‚³ãƒ¼ãƒ‰',
  `school_code` varchar(100) COMMENT 'ç³»ã‚³ãƒ¼ãƒ‰',
  `course_code` varchar(100) COMMENT 'ã‚³ãƒ¼ã‚¹ã‚³ãƒ¼ãƒ‰',
  PRIMARY KEY (`id`),
  KEY `idx_grants_parent_id` (`grant_id`),
  KEY `grants_coopno` (`cooperate_no`),
  KEY `grants_researcherno` (`researcher_no`)
) ENGINE=InnoDB AUTO_INCREMENT=1165 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `histories`
--

DROP TABLE IF EXISTS `histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(100) NOT NULL,
  `model_id` int(11) NOT NULL,
  `archive_data` text NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_histories_ukey` (`model_name`,`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2011 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `information`
--

DROP TABLE IF EXISTS `information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `information` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(200) NOT NULL COMMENT 'name',
  `description` text,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mhlw_research_grants`
--

DROP TABLE IF EXISTS `mhlw_research_grants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mhlw_research_grants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(4) NOT NULL,
  `grant_initial_appointment_date` date DEFAULT NULL,
  `grant_initial_decision_date` date DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `this_year_advance_application_date` date DEFAULT NULL,
  `moving_history` varchar(255) DEFAULT NULL,
  `commission_coi_check` varchar(100) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `titech_assignment_no` varchar(50) DEFAULT NULL,
  `assignment_no` varchar(50) DEFAULT NULL,
  `new_or_continuance` varchar(50) DEFAULT NULL,
  `cooperate_no` varchar(11) DEFAULT NULL,
  `personal_no` varchar(8) DEFAULT NULL,
  `researcher_no` varchar(8) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `represent_researcher` varchar(255) DEFAULT NULL,
  `notifying_department` varchar(255) DEFAULT NULL,
  `statistical_department` varchar(255) DEFAULT NULL,
  `affiliated_major_name` varchar(255) DEFAULT NULL,
  `statistical_job` varchar(255) DEFAULT NULL,
  `this_year_application_amount` bigint(20) DEFAULT NULL,
  `this_year_total_at_decision` bigint(20) DEFAULT NULL,
  `this_year_direct_at_decision` bigint(20) DEFAULT NULL,
  `this_year_indirect_at_decision` bigint(20) DEFAULT NULL,
  `this_year_application_amount_sum` bigint(20) DEFAULT NULL,
  `this_year_direct_cost` bigint(20) DEFAULT NULL,
  `this_year_indirect_cost` bigint(20) DEFAULT NULL,
  `research_assignment` text,
  `contribution_count` int(11) DEFAULT NULL,
  `contribution_partition` bigint(20) DEFAULT NULL,
  `contribution_remarks` text,
  `research_start_date` date DEFAULT NULL,
  `research_end_date` date DEFAULT NULL,
  `project_start_year` int(4) DEFAULT NULL,
  `project_end_year` int(4) DEFAULT NULL,
  `remarks` text,
  `extension` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `post_no` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT '0',
  `hidden` tinyint(1) DEFAULT '0',
  `unaggregate` tinyint(1) DEFAULT '0',
  `open_to_public` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `institute_code` varchar(100) COMMENT 'é™¢ã‚³ãƒ¼ãƒ‰',
  `school_code` varchar(100) COMMENT 'ç³»ã‚³ãƒ¼ãƒ‰',
  `course_code` varchar(100) COMMENT 'ã‚³ãƒ¼ã‚¹ã‚³ãƒ¼ãƒ‰',
  PRIMARY KEY (`id`),
  KEY `mhlw_research_grants_coopno` (`cooperate_no`),
  KEY `mhlw_research_grants_personalno` (`personal_no`),
  KEY `mhlw_research_grants_researcherno` (`researcher_no`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `migration_version`
--

DROP TABLE IF EXISTS `migration_version`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_version` (
  `version` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `nedo_jst_others`
--

DROP TABLE IF EXISTS `nedo_jst_others`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nedo_jst_others` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nedo_jst_other_id` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `cooperate_no` varchar(11) DEFAULT NULL,
  `project_type` varchar(100) DEFAULT NULL,
  `researcher_no` varchar(8) DEFAULT NULL,
  `arrange_no_1` bigint(20) DEFAULT NULL,
  `arrange_no_2` varchar(20) DEFAULT NULL,
  `arrange_no_3` varchar(20) DEFAULT NULL,
  `arrange_no_4` varchar(20) DEFAULT NULL,
  `arrange_no_5` varchar(20) DEFAULT NULL,
  `project_code` varchar(100) NOT NULL,
  `master_registration` varchar(100) DEFAULT NULL,
  `person_in_charge` varchar(255) DEFAULT NULL,
  `application_reception_date` date DEFAULT NULL,
  `cc_reception_date_1` date DEFAULT NULL,
  `cc_reception_date_2` date DEFAULT NULL,
  `cc_reception_date_3` date DEFAULT NULL,
  `cc_reception_date_4` date DEFAULT NULL,
  `cc_reception_date_5` date DEFAULT NULL,
  `titech_reception_no` varchar(100) DEFAULT NULL,
  `cc_titech_reception_no_1` varchar(100) DEFAULT NULL,
  `cc_titech_reception_no_2` varchar(100) DEFAULT NULL,
  `cc_titech_reception_no_3` varchar(100) DEFAULT NULL,
  `cc_titech_reception_no_4` varchar(100) DEFAULT NULL,
  `cc_titech_reception_no_5` varchar(100) DEFAULT NULL,
  `notification_drafting_date` date DEFAULT NULL,
  `cc_notification_drafting_date_1` date DEFAULT NULL,
  `cc_notification_drafting_date_2` date DEFAULT NULL,
  `cc_notification_drafting_date_3` date DEFAULT NULL,
  `cc_notification_drafting_date_4` date DEFAULT NULL,
  `cc_notification_drafting_date_5` date DEFAULT NULL,
  `notification_settlement_date` date DEFAULT NULL,
  `cc_notification_settlement_date_1` date DEFAULT NULL,
  `cc_notification_settlement_date_2` date DEFAULT NULL,
  `cc_notification_settlement_date_3` date DEFAULT NULL,
  `cc_notification_settlement_date_4` date DEFAULT NULL,
  `cc_notification_settlement_date_5` date DEFAULT NULL,
  `notification_send_date` date DEFAULT NULL,
  `cc_notification_send_date_1` date DEFAULT NULL,
  `cc_notification_send_date_2` date DEFAULT NULL,
  `cc_notification_send_date_3` date DEFAULT NULL,
  `cc_notification_send_date_4` date DEFAULT NULL,
  `cc_notification_send_date_5` date DEFAULT NULL,
  `contract_send_date` date DEFAULT NULL,
  `cc_contract_send_date_1` date DEFAULT NULL,
  `cc_contract_send_date_2` date DEFAULT NULL,
  `cc_contract_send_date_3` date DEFAULT NULL,
  `cc_contract_send_date_4` date DEFAULT NULL,
  `cc_contract_send_date_5` date DEFAULT NULL,
  `contract_reception_date` date DEFAULT NULL,
  `cc_contract_reception_date_1` date DEFAULT NULL,
  `cc_contract_reception_date_2` date DEFAULT NULL,
  `cc_contract_reception_date_3` date DEFAULT NULL,
  `cc_contract_reception_date_4` date DEFAULT NULL,
  `cc_contract_reception_date_5` date DEFAULT NULL,
  `amount_fixed_date` date DEFAULT NULL,
  `divide_paying` varchar(100) DEFAULT NULL,
  `adjust_paying` varchar(100) DEFAULT NULL,
  `charge_format` varchar(100) DEFAULT NULL,
  `charge` bigint(20) DEFAULT NULL,
  `charged_amount` bigint(20) DEFAULT NULL,
  `claimed_balance` bigint(20) DEFAULT NULL,
  `charge_1` bigint(20) DEFAULT NULL,
  `statement_send_date_1` date DEFAULT NULL,
  `statement_date_1` date DEFAULT NULL,
  `payment_due_1` date DEFAULT NULL,
  `payment_date_1` date DEFAULT NULL,
  `charge_2` bigint(20) DEFAULT NULL,
  `statement_send_date_2` date DEFAULT NULL,
  `statement_date_2` date DEFAULT NULL,
  `payment_due_2` date DEFAULT NULL,
  `payment_date_2` date DEFAULT NULL,
  `charge_3` bigint(20) DEFAULT NULL,
  `statement_send_date_3` date DEFAULT NULL,
  `statement_date_3` date DEFAULT NULL,
  `payment_due_3` date DEFAULT NULL,
  `payment_date_3` date DEFAULT NULL,
  `charge_4` bigint(20) DEFAULT NULL,
  `statement_send_date_4` date DEFAULT NULL,
  `statement_date_4` date DEFAULT NULL,
  `payment_due_4` date DEFAULT NULL,
  `payment_date_4` date DEFAULT NULL,
  `charge_5` bigint(20) DEFAULT NULL,
  `statement_send_date_5` date DEFAULT NULL,
  `statement_date_5` date DEFAULT NULL,
  `payment_due_5` date DEFAULT NULL,
  `payment_date_5` date DEFAULT NULL,
  `charge_6` bigint(20) DEFAULT NULL,
  `statement_send_date_6` date DEFAULT NULL,
  `statement_date_6` date DEFAULT NULL,
  `payment_due_6` date DEFAULT NULL,
  `payment_date_6` date DEFAULT NULL,
  `accounting_report_due` date DEFAULT NULL,
  `accounting_report_format` varchar(100) DEFAULT NULL,
  `accounting_report_request_day` date DEFAULT NULL,
  `accounting_report_reception_date` date DEFAULT NULL,
  `accounting_report_drafting_date` date DEFAULT NULL,
  `accounting_report_settlement_date` date DEFAULT NULL,
  `accounting_report_send_date` date DEFAULT NULL,
  `accomplishment_due` date DEFAULT NULL,
  `accomplishment_format` varchar(100) DEFAULT NULL,
  `accomplishment_send_date` date DEFAULT NULL,
  `asset_belongingness` varchar(100) DEFAULT NULL,
  `continuance_forcast` varchar(100) DEFAULT NULL,
  `new_or_continuance` varchar(100) DEFAULT NULL,
  `singular_or_multi` varchar(100) DEFAULT NULL,
  `multi_year_no` varchar(100) DEFAULT NULL,
  `competitive_fund` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `major_name` varchar(100) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `researcher_name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `co_researcher` varchar(255) DEFAULT NULL,
  `head_of_department` varchar(255) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `ordering_organization_name` varchar(255) DEFAULT NULL,
  `applicant_job_title` varchar(255) DEFAULT NULL,
  `applicant_name` varchar(255) DEFAULT NULL,
  `contractor_job_title` varchar(255) DEFAULT NULL,
  `contractor_name` varchar(255) DEFAULT NULL,
  `related_ministries` varchar(255) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `ordering_organization_type` varchar(100) DEFAULT NULL,
  `government_type` varchar(100) DEFAULT NULL,
  `area_of_research` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `memorandum_start_date` date DEFAULT NULL,
  `memorandum_end_date` date DEFAULT NULL,
  `reception_decision_date` date DEFAULT NULL,
  `contraction_date` date DEFAULT NULL,
  `contraction_change_date_1` date DEFAULT NULL,
  `contraction_change_outline_1` varchar(255) DEFAULT NULL,
  `contraction_change_date_2` date DEFAULT NULL,
  `contraction_change_outline_2` varchar(255) DEFAULT NULL,
  `contraction_change_date_3` date DEFAULT NULL,
  `contraction_change_outline_3` varchar(255) DEFAULT NULL,
  `contraction_change_date_4` date DEFAULT NULL,
  `contraction_change_outline_4` varchar(255) DEFAULT NULL,
  `contraction_change_date_5` date DEFAULT NULL,
  `contraction_change_outline_5` varchar(255) DEFAULT NULL,
  `contraction_change_date_6` date DEFAULT NULL,
  `contraction_change_outline_6` varchar(255) DEFAULT NULL,
  `contraction_change_date_7` date DEFAULT NULL,
  `contraction_change_outline_7` varchar(255) DEFAULT NULL,
  `contraction_change_date_8` date DEFAULT NULL,
  `contraction_change_outline_8` varchar(255) DEFAULT NULL,
  `contraction_change_date_9` date DEFAULT NULL,
  `contraction_change_outline_9` varchar(255) DEFAULT NULL,
  `contraction_change_date_10` date DEFAULT NULL,
  `contraction_change_outline_10` varchar(255) DEFAULT NULL,
  `contraction_change_date_11` date DEFAULT NULL,
  `contraction_change_outline_11` varchar(255) DEFAULT NULL,
  `contraction_change_date_12` date DEFAULT NULL,
  `contraction_change_outline_12` varchar(255) DEFAULT NULL,
  `contraction_change_date_13` date DEFAULT NULL,
  `contraction_change_outline_13` varchar(255) DEFAULT NULL,
  `contraction_change_date_14` date DEFAULT NULL,
  `contraction_change_outline_14` varchar(255) DEFAULT NULL,
  `contraction_change_date_15` date DEFAULT NULL,
  `contraction_change_outline_15` varchar(255) DEFAULT NULL,
  `contraction_change_date_16` date DEFAULT NULL,
  `contraction_change_outline_16` varchar(255) DEFAULT NULL,
  `contraction_change_date_17` date DEFAULT NULL,
  `contraction_change_outline_17` varchar(255) DEFAULT NULL,
  `contraction_change_date_18` date DEFAULT NULL,
  `contraction_change_outline_18` varchar(255) DEFAULT NULL,
  `contraction_change_date_19` date DEFAULT NULL,
  `contraction_change_outline_19` varchar(255) DEFAULT NULL,
  `contraction_change_date_20` date DEFAULT NULL,
  `contraction_change_outline_20` varchar(255) DEFAULT NULL,
  `cp_post_no` varchar(100) DEFAULT NULL,
  `cp_address` varchar(255) DEFAULT NULL,
  `cp_section` varchar(255) DEFAULT NULL,
  `cp_job_title` varchar(255) DEFAULT NULL,
  `cp_name` varchar(255) DEFAULT NULL,
  `cp_tel` varchar(255) DEFAULT NULL,
  `cp_extension` varchar(255) DEFAULT NULL,
  `cp_fax` varchar(255) DEFAULT NULL,
  `cp_email` varchar(255) DEFAULT NULL,
  `plural_year_1` int(11) DEFAULT NULL,
  `plural_contract_amount_1` bigint(20) DEFAULT NULL,
  `plural_year_2` int(11) DEFAULT NULL,
  `plural_contract_amount_2` bigint(20) DEFAULT NULL,
  `plural_year_3` int(11) DEFAULT NULL,
  `plural_contract_amount_3` bigint(20) DEFAULT NULL,
  `plural_year_4` int(11) DEFAULT NULL,
  `plural_contract_amount_4` bigint(20) DEFAULT NULL,
  `plural_year_5` int(11) DEFAULT NULL,
  `plural_contract_amount_5` bigint(20) DEFAULT NULL,
  `plural_year_6` int(11) DEFAULT NULL,
  `plural_contract_amount_6` bigint(20) DEFAULT NULL,
  `plural_year_7` int(11) DEFAULT NULL,
  `plural_contract_amount_7` bigint(20) DEFAULT NULL,
  `plural_year_8` int(11) DEFAULT NULL,
  `plural_contract_amount_8` bigint(20) DEFAULT NULL,
  `plural_year_9` int(11) DEFAULT NULL,
  `plural_contract_amount_9` bigint(20) DEFAULT NULL,
  `plural_year_10` int(11) DEFAULT NULL,
  `plural_contract_amount_10` bigint(20) DEFAULT NULL,
  `total_reception_amount` bigint(20) DEFAULT NULL,
  `photothermic_cost` bigint(20) DEFAULT NULL,
  `other_cost` bigint(20) DEFAULT NULL,
  `research_expense` bigint(20) DEFAULT NULL,
  `reconsignment_cost` bigint(20) DEFAULT NULL,
  `general_administration_cost` bigint(20) DEFAULT NULL,
  `total_primary_cost` bigint(20) DEFAULT NULL,
  `indirect_cost` bigint(20) DEFAULT NULL,
  `labo_earnings` bigint(20) DEFAULT NULL,
  `titech_earnings` bigint(20) DEFAULT NULL,
  `this_year_reception_amount` bigint(20) DEFAULT NULL,
  `statement_amount` bigint(20) DEFAULT NULL,
  `income_1` bigint(20) DEFAULT NULL,
  `income_2` bigint(20) DEFAULT NULL,
  `income_3` bigint(20) DEFAULT NULL,
  `income_4` bigint(20) DEFAULT NULL,
  `income_5` bigint(20) DEFAULT NULL,
  `income_6` bigint(20) DEFAULT NULL,
  `former1_project_code` varchar(100) DEFAULT NULL,
  `former2_project_code` varchar(100) DEFAULT NULL,
  `former3_project_code` varchar(100) DEFAULT NULL,
  `functions_manual` varchar(255) DEFAULT NULL,
  `implementation_document` varchar(100) DEFAULT NULL,
  `contract_management_no` varchar(255) DEFAULT NULL,
  `reported_amount` bigint(20) DEFAULT NULL,
  `fixed_amount` bigint(20) DEFAULT NULL,
  `balance` bigint(20) DEFAULT NULL,
  `turnback_amount` bigint(20) DEFAULT NULL,
  `advance_confirmation_date` date DEFAULT NULL,
  `goods_system_registration_date` date DEFAULT NULL,
  `remarks` text,
  `disabled` tinyint(1) DEFAULT '0',
  `hidden` tinyint(1) DEFAULT '0',
  `unaggregate` tinyint(1) DEFAULT '0',
  `open_to_public` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `institute_code` varchar(100) COMMENT 'é™¢ã‚³ãƒ¼ãƒ‰',
  `school_code` varchar(100) COMMENT 'ç³»ã‚³ãƒ¼ãƒ‰',
  `course_code` varchar(100) COMMENT 'ã‚³ãƒ¼ã‚¹ã‚³ãƒ¼ãƒ‰',
  PRIMARY KEY (`id`),
  KEY `idx_nedo_jst_others_parent_id` (`nedo_jst_other_id`),
  KEY `nedo_jst_others_coopno` (`cooperate_no`),
  KEY `nedo_jst_others_researcherno` (`researcher_no`)
) ENGINE=InnoDB AUTO_INCREMENT=14788 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `obligations`
--

DROP TABLE IF EXISTS `obligations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obligations` (
  `obligation_code` varchar(100) NOT NULL,
  `obligation_name` varchar(255) DEFAULT NULL,
  `ob_represent_name` varchar(255) DEFAULT NULL,
  `ob_job_title` varchar(255) DEFAULT NULL,
  `ob_postal_code_address` varchar(255) DEFAULT NULL,
  `ob_section` varchar(255) DEFAULT NULL,
  `ob_person_in_charge` varchar(255) DEFAULT NULL,
  `obligation_name_short` varchar(255) DEFAULT NULL,
  `ob_postal_code` varchar(100) DEFAULT NULL,
  `ob_address` varchar(255) DEFAULT NULL,
  UNIQUE KEY `idx_obligations_pkey` (`obligation_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classifier` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `japanese_name` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `english_name` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `other_research_grants`
--

DROP TABLE IF EXISTS `other_research_grants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `other_research_grants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `grant_initial_appointment_date` date DEFAULT NULL,
  `grant_initial_decision_date` date DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `paying_for_day` date DEFAULT NULL,
  `moving_history` varchar(255) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `titech_assignment_no` varchar(50) DEFAULT NULL,
  `assignment_no` varchar(50) DEFAULT NULL,
  `new_or_continuance` varchar(50) DEFAULT NULL,
  `cooperate_no` varchar(11) DEFAULT NULL,
  `personal_no` varchar(8) DEFAULT NULL,
  `researcher_no` varchar(8) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `represent_researcher` varchar(100) DEFAULT NULL,
  `notifying_department` varchar(255) DEFAULT NULL,
  `statistical_department` varchar(255) DEFAULT NULL,
  `affiliated_major_name` varchar(255) DEFAULT NULL,
  `statistical_job` varchar(255) DEFAULT NULL,
  `this_year_application_amount` bigint(20) DEFAULT NULL,
  `this_year_total_at_decision` bigint(20) DEFAULT NULL,
  `this_year_direct_at_decision` bigint(20) DEFAULT NULL,
  `this_year_indirect_at_decision` bigint(20) DEFAULT NULL,
  `this_year_application_amount_sum` bigint(20) DEFAULT NULL,
  `this_year_direct_cost` bigint(20) DEFAULT NULL,
  `this_year_indirect_cost` bigint(20) DEFAULT NULL,
  `research_assignment` text,
  `contribution_count` int(11) DEFAULT NULL,
  `contribution_partition` bigint(20) DEFAULT NULL,
  `contribution_remarks` text,
  `research_start_date` date DEFAULT NULL,
  `research_end_date` date DEFAULT NULL,
  `project_start_year` int(11) DEFAULT NULL,
  `project_end_year` int(11) DEFAULT NULL,
  `remarks` text,
  `extension` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `post_no` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT '0',
  `hidden` tinyint(1) DEFAULT '0',
  `unaggregate` tinyint(1) DEFAULT '0',
  `open_to_public` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `institute_code` varchar(100) COMMENT 'é™¢ã‚³ãƒ¼ãƒ‰',
  `school_code` varchar(100) COMMENT 'ç³»ã‚³ãƒ¼ãƒ‰',
  `course_code` varchar(100) COMMENT 'ã‚³ãƒ¼ã‚¹ã‚³ãƒ¼ãƒ‰',
  PRIMARY KEY (`id`),
  KEY `other_research_grants_coopno` (`cooperate_no`),
  KEY `other_research_grants_personalno` (`personal_no`),
  KEY `other_research_grants_researcherno` (`researcher_no`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `project_code` varchar(10) NOT NULL,
  `long_name` varchar(255) DEFAULT NULL,
  `short_name` varchar(100) DEFAULT NULL,
  `researcher_name` varchar(255) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `department_no` varchar(10) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `goal` text,
  `cooperate_no` varchar(11) DEFAULT NULL,
  `researcher_no` varchar(8) DEFAULT NULL,
  UNIQUE KEY `idx_projects_pkey` (`project_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `researchers`
--

DROP TABLE IF EXISTS `researchers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `researchers` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `cooperate_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personal_no` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `researcher_no` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `researcher_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kana` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_year` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_month` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_day` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `degree` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex_no` int(11) DEFAULT NULL,
  `degree_no` int(11) DEFAULT NULL,
  `affiliation_no` int(11) DEFAULT NULL,
  `job_no` int(11) DEFAULT NULL,
  `notifying_department` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statistical_department` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `counting_department` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `major_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statistical_job_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `formal_job_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qualification` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `applicant_qualification` int(11) DEFAULT NULL,
  `detail_no` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discipline` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8_unicode_ci,
  `transfer_date` date DEFAULT NULL,
  `erad_change_date` date DEFAULT NULL,
  `moving_history` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `old_job_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `changes` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8_unicode_ci,
  `disabled` tinyint(1) DEFAULT '0',
  `hidden` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `institute_code` varchar(100) COLLATE utf8_unicode_ci COMMENT 'é™¢ã‚³ãƒ¼ãƒ‰',
  `school_code` varchar(100) COLLATE utf8_unicode_ci COMMENT 'ç³»ã‚³ãƒ¼ãƒ‰',
  `course_code` varchar(100) COLLATE utf8_unicode_ci COMMENT 'ã‚³ãƒ¼ã‚¹ã‚³ãƒ¼ãƒ‰',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_researchers_pkey` (`id`),
  KEY `researchers_researcher_no_issue25` (`researcher_no`),
  KEY `researchers_researcher_name_issue28` (`researcher_name`),
  KEY `researchers_coopno` (`cooperate_no`),
  KEY `researchers_personalno` (`personal_no`),
  KEY `researchers_researcherno` (`researcher_no`)
) ENGINE=InnoDB AUTO_INCREMENT=63658 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `researchers_2009_2`
--

DROP TABLE IF EXISTS `researchers_2009_2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `researchers_2009_2` (
  `researcher_no` varchar(8) NOT NULL,
  `researcher_name` varchar(255) DEFAULT NULL,
  `major_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `researchers_2010_2`
--

DROP TABLE IF EXISTS `researchers_2010_2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `researchers_2010_2` (
  `researcher_no` varchar(8) NOT NULL,
  `researcher_name` varchar(255) DEFAULT NULL,
  `major_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `researchers_2011_2`
--

DROP TABLE IF EXISTS `researchers_2011_2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `researchers_2011_2` (
  `researcher_no` varchar(8) NOT NULL,
  `researcher_name` varchar(255) DEFAULT NULL,
  `major_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `researchers_2012_2`
--

DROP TABLE IF EXISTS `researchers_2012_2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `researchers_2012_2` (
  `researcher_no` varchar(8) NOT NULL,
  `researcher_name` varchar(255) DEFAULT NULL,
  `major_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `responsibles`
--

DROP TABLE IF EXISTS `responsibles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsibles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `researcher_id` int(11) DEFAULT NULL,
  `personal_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `organization` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `responsible_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `institute_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `selectable_items`
--

DROP TABLE IF EXISTS `selectable_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `selectable_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `list_name` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `summaries`
--

DROP TABLE IF EXISTS `summaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `summaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `model_name_id` int(11) NOT NULL,
  `is_project_record` tinyint(1) NOT NULL DEFAULT '0',
  `model_id` int(11) NOT NULL,
  `model_parent_id` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `researcher_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `researcher_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cooperate_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(4) COLLATE utf8_unicode_ci,
  `personal_no` varchar(10) COLLATE utf8_unicode_ci,
  `birth_year` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_month` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_day` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdayYMD` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `project_code` varchar(100) COLLATE utf8_unicode_ci,
  `amount` bigint(20) DEFAULT NULL,
  `direct_cost` bigint(20) DEFAULT NULL,
  `indirect_cost` bigint(20) DEFAULT NULL,
  `subject` text COLLATE utf8_unicode_ci,
  `fund_owner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `major_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `memo` text COLLATE utf8_unicode_ci,
  `research_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `research_area` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `open_to_public` tinyint(1) DEFAULT '0',
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `unaggregate` tinyint(1) DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `institute_code` varchar(100) COLLATE utf8_unicode_ci COMMENT 'é™¢ã‚³ãƒ¼ãƒ‰',
  `school_code` varchar(100) COLLATE utf8_unicode_ci COMMENT 'ç³»ã‚³ãƒ¼ãƒ‰',
  `course_code` varchar(100) COLLATE utf8_unicode_ci COMMENT 'ã‚³ãƒ¼ã‚¹ã‚³ãƒ¼ãƒ‰',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_summaries_model_id_name` (`model_name`,`model_id`),
  KEY `idx_summaries_model_name` (`model_name`),
  KEY `idx_summaries_model_id` (`model_id`),
  KEY `summaries_researcher_no_issue25` (`researcher_no`),
  KEY `summaries_coopno` (`cooperate_no`),
  KEY `summaries_personalno` (`personal_no`)
) ENGINE=InnoDB AUTO_INCREMENT=38571 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `summary_missing_researchers`
--

DROP TABLE IF EXISTS `summary_missing_researchers`;
/*!50001 DROP VIEW IF EXISTS `summary_missing_researchers`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `summary_missing_researchers` (
  `researcher_name` varchar(255),
  `researcher_no` varchar(100),
  `personal_no` varchar(10)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(100) NOT NULL COMMENT 'loginname',
  `password` varchar(100) NOT NULL COMMENT 'password',
  `displayname` varchar(100) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL COMMENT 'email',
  `tel` varchar(100) DEFAULT NULL,
  `grid_type` int(11) DEFAULT '0',
  `dateformat` int(11) DEFAULT '0',
  `role_id` int(11) NOT NULL,
  `disabled` tinyint(1) DEFAULT '0' COMMENT 'disabled',
  `created` datetime DEFAULT NULL COMMENT 'created',
  `updated` datetime DEFAULT NULL COMMENT 'updated',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_users_pkey` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Final view structure for view `aggregate_result`
--

/*!50001 DROP TABLE IF EXISTS `aggregate_result`*/;
/*!50001 DROP VIEW IF EXISTS `aggregate_result`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`kendbuser`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `aggregate_result` AS select `Y`.`rank` AS `rank`,`R`.`researcher_name` AS `researcher_name`,`Y`.`personal_no` AS `personal_no`,`R`.`age` AS `age`,`Y`.`year` AS `year`,ifnull(`C`.`count`,0) AS `year_count`,ifnull(`C`.`amount`,0) AS `year_amount`,`R`.`major_name` AS `major_name`,`R`.`job_title` AS `job_title`,ifnull(`R`.`count`,0) AS `total_count`,ifnull(`R`.`amount`,0) AS `total_amount`,`R`.`sex` AS `sex`,'' AS `memo` from ((`aggregate_years` `Y` left join `aggregate_counts` `C` on(((`Y`.`personal_no` = `C`.`personal_no`) and (`Y`.`year` = `C`.`year`)))) join `aggregate_ranking` `R` on((`Y`.`personal_no` = `R`.`personal_no`))) order by `Y`.`rank`,`Y`.`personal_no`,`Y`.`year` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `summary_missing_researchers`
--

/*!50001 DROP TABLE IF EXISTS `summary_missing_researchers`*/;
/*!50001 DROP VIEW IF EXISTS `summary_missing_researchers`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`kendbuser`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `summary_missing_researchers` AS select distinct `S`.`researcher_name` AS `researcher_name`,`S`.`researcher_no` AS `researcher_no`,`S`.`personal_no` AS `personal_no` from (`summaries` `S` left join `researchers` `R` on((`S`.`researcher_no` = `R`.`researcher_no`))) where isnull(`R`.`researcher_no`) order by `S`.`researcher_name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-30 13:42:11
