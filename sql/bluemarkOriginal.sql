-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 02:08 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluemark`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_this_weeks_attendance_percentage` (IN `inWeekValuesid` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inDateFriday` DATE, IN `inWeekWhat` CHAR(32), IN `inDailypercent` INT)  BEGIN 
    INSERT INTO weekly_percentage (weekvalue_id, class_id, term_id, todaysDate, weekwhat, weeklypercentage) VALUES (inWeekValuesid, inClassId, inCurrentTermId, inDateFriday, inWeekWhat, inDailypercent);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_add_father_info` (IN `inUserId` INT, IN `inFathersfirstname` CHAR(32), IN `inFatherslastname` CHAR(32), IN `inFathersphone` CHAR(32), IN `inFathersofficeaddress` VARCHAR(100), IN `inFathersoccupation` CHAR(32), IN `inFathersreligion` CHAR(32), IN `inFatherresidentialaddress` VARCHAR(100))  BEGIN 
    UPDATE applicants
    SET f_fname = inFathersfirstname, f_lname = inFatherslastname, f_phone = inFathersphone, f_office = inFathersofficeaddress, f_occupation = inFathersoccupation, f_religion = inFathersreligion, f_address = inFatherresidentialaddress
    WHERE applicants_id = inUserId;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_add_medical_info` (IN `inUserId` INT, IN `inDocreport_name_400` VARCHAR(100), IN `inBloodgroup` CHAR(32), IN `inGenotype` CHAR(32), IN `inAllergies` CHAR(32), IN `inDefects` VARCHAR(100), IN `inImmunized` VARCHAR(100), IN `inDoctorsname` VARCHAR(100), IN `inDoctorsphone` VARCHAR(100), IN `inDoctorsaddress` VARCHAR(100), IN `inOthermedicalinfo` VARCHAR(100))  BEGIN

    UPDATE applicants
    SET docreport = inDocreport_name_400, bloodgroup = inBloodgroup, genotype = inGenotype, allergies = inAllergies, defects = inDefects, immunize = inImmunized, docname = inDoctorsname, docphone = inDoctorsphone, docaddress = inDoctorsaddress, otherinfo = inOthermedicalinfo
    WHERE applicants_id = inUserId;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_add_mother_info` (IN `inUserId` INT, IN `inMothersfirstname` CHAR(32), IN `inMotherslastname` CHAR(32), IN `inMothersphone` CHAR(32), IN `inMothersofficeaddress` VARCHAR(100), IN `inMothersoccupation` CHAR(32), IN `inMothersreligion` CHAR(32), IN `inMotherresidentialaddress` VARCHAR(100))  BEGIN 
    UPDATE applicants
    SET m_fname = inMothersfirstname, m_lname = inMotherslastname, m_phone = inMothersphone, m_office = inMothersofficeaddress, m_occupation = inMothersoccupation, m_religion = inMothersreligion, m_address = inMotherresidentialaddress
    WHERE applicants_id = inUserId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_add_personal_info` (IN `inId` INT, IN `inFirstname` VARCHAR(100), IN `inEmail` VARCHAR(100), IN `inSurname` VARCHAR(100), IN `inOthername` VARCHAR(100), IN `inPassword` VARCHAR(100), IN `inDateofbirth` DATE, IN `inGender` INT, IN `inState` VARCHAR(100))  BEGIN
    UPDATE applicants 
    SET firstname = inFirstname, 
        email = inEmail, 
        surname = inSurname, 
        othername = inOthername, 
        password = inPassword, 
        dob = inDateofbirth, 
        gender = inGender, 
        state =inState 
    WHERE applicants_id = inId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_add_staff_credentials` (IN `inTeachersId` INT, IN `inFinalpassword` VARCHAR(100), IN `inBirthCertName` VARCHAR(100), IN `inPrimaryCertName` VARCHAR(100), IN `inOlevelCert1Name` VARCHAR(100), IN `inAlevelCertName` VARCHAR(100), IN `inStaffAddress` VARCHAR(100), IN `inStaffPasportName` VARCHAR(100), IN `inGender` INT, IN `inStatus` INT, IN `inStateId` INT, IN `inOlevelCert2Name` VARCHAR(100), IN `inProCertName` VARCHAR(100))  BEGIN 
    UPDATE teachers 
    SET status = inStatus, birthcert = inBirthCertName, primarycert = inPrimaryCertName, o_Levelcert = inOlevelCert1Name, o_Levelcert2 = inOlevelCert2Name, a_Levelcert = inAlevelCertName, procert = inProCertName, address = inStaffAddress, passport = inStaffPasportName, gender = inGender, password = inFinalpassword, states_rid = inStateId WHERE teachers_id = inTeachersId;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_add_teacher_info` (IN `inName` VARCHAR(100), IN `inPhone` VARCHAR(100), IN `inEmail` VARCHAR(100), IN `inCvname` VARCHAR(100))  BEGIN
   INSERT INTO teachers (name, phone, email, cvname)
   VALUES (inName, inPhone, inEmail, inCvname);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_add_user_personal_info` (IN `inPassport1` VARCHAR(100), IN `inPassport4` VARCHAR(100), IN `inBirthcert` VARCHAR(100), IN `inPrimarycert` VARCHAR(100), IN `inFirstname` VARCHAR(100), IN `inEmail` VARCHAR(100), IN `inSurname` VARCHAR(100), IN `inOthername` VARCHAR(100), IN `inPassword` VARCHAR(100), IN `inDateofbirth` DATE, IN `inGender` INT, IN `inStateoforigin` VARCHAR(100))  BEGIN 

    INSERT INTO applicants(image1, image4, birthcert, primarycert, firstname, email, surname, othername, password, dob, gender, state) VALUES (inPassport1, inPassport4, inBirthcert, inPrimarycert, inFirstname, inEmail, inSurname, inOthername, inPassword, inDateofbirth, inGender, inStateoforigin);

    SELECT LAST_INSERT_ID();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_admit_and_assign_class` (IN `inStudentId` INT, IN `inClassId` INT)  BEGIN

    UPDATE applicants
    SET status = 'Admitted',
        class_assigned = inClassId,
        admitted_on = NOW()
    WHERE applicants_id = inStudentId;

    CALL applicant_get_student_profile_info(inStudentId);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_awaiting_by_year_and_status` (IN `inYear` DATE, IN `inStatus` INT)  BEGIN
    SELECT teachers_id, name, phone, email, created_on, status
    FROM teachers 
    WHERE YEAR(created_on) = inYear AND status = inStatus
    ORDER BY created_on DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_cancel_admission` (IN `inStudentId` INT)  BEGIN

    UPDATE applicants
    SET status = 'Pending',
        class_assigned = null,
        admitted_on = NOW()
    WHERE applicants_id = inStudentId;

    CALL applicant_get_student_profile_info(inStudentId);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_check_user_admission_status` (IN `inEmail` VARCHAR(100))  BEGIN
    SELECT applicants_id, email, password, status, class_assigned
    FROM applicants 
    WHERE email = inEmail;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_count_admitted_for_current_year` (IN `inAdmitted` CHAR(32))  BEGIN 

    SELECT count(status)
    FROM applicants
    WHERE status = inAdmitted AND YEAR(applied_on) = YEAR(CURDATE()); 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_get_admission_messages` (IN `inId` INT)  BEGIN 
    SELECT 	massage, subject_1, subject_2, subject_3, entrance_exam_date, oral_interview_date, admission_starts, admission_closes 
    FROM massage_board
    WHERE department_id = inId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_get_classname_by_id` (IN `inId` INT)  BEGIN
    SELECT class_name 
    FROM school_classes 
    WHERE school_classes_id = inId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_get_current_applications` (IN `inYear` CHAR(32))  BEGIN 
    SELECT applicants_id, firstname, surname, email, f_phone, applied_on, status 
    FROM applicants 
    WHERE YEAR(applied_on) = inYear AND reg_number IS NULL
    ORDER BY applied_on;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_get_current_status_for_checking` (IN `inEmail` VARCHAR(100))  BEGIN

    SELECT status FROM teachers WHERE email = inEmail;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_get_login_info` (IN `inEmail` VARCHAR(100))  BEGIN 
    SELECT applicants_id, email 
    FROM applicants 
    WHERE email = inEmail;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_get_nursery_applicants_by_year` (IN `inYear` DATE)  BEGIN
    SELECT applicants_id, firstname, surname, email, f_phone, applied_on
    FROM applicants 
    WHERE YEAR(applied_on) = inYear AND section = 'Nursery' AND reg_number IS NULL
    ORDER BY applied_on DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_get_primary_applicants_by_year` (IN `inYear` DATE)  BEGIN

    SELECT applicants_id, firstname, surname, email, f_phone, applied_on
    FROM applicants 
    WHERE YEAR(applied_on) = inYear AND section = 'Primary' AND reg_number IS NULL
    ORDER BY applied_on DESC; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_get_secondary_applicants_by_year` (IN `inYear` DATE)  BEGIN

    SELECT applicants_id, firstname, surname, email, f_phone, applied_on
    FROM applicants 
    WHERE YEAR(applied_on) = inYear AND section = 'Secondary' AND reg_number IS NULL
    ORDER BY applied_on DESC; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_get_staff_current_status` (IN `inStaffId` INT)  BEGIN 
    SELECT status FROM teachers WHERE teachers_id = inStaffId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_get_student_age` (IN `inStudentId` INT)  BEGIN
    

    SELECT dob, CURDATE(), DATE_FORMAT(dob,'%M %d, %Y') AS 'showage',
            YEAR(CURDATE()) - YEAR(dob) AS 'difference',
            IF(RIGHT(CURDATE(),5) < RIGHT(dob,5),1,0) AS 'adjustment',
            YEAR(CURDATE()) - YEAR(dob) - IF(RIGHT(CURDATE(),5) < RIGHT(dob,5),1,0) AS 'age'
    FROM applicants
    WHERE applicants_id = inStudentId;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_get_student_profile_info` (IN `inStudentId` INT)  BEGIN 
    SELECT 	applicants_id, image1, image4, birthcert, primarycert, docreport, firstname, email, surname, othername, dob, gender, state, bloodgroup, genotype, allergies, defects,immunize, docname, docphone, docaddress, otherinfo, f_fname, f_lname, f_phone, f_office, f_occupation, f_religion, f_address, m_fname, m_lname, m_phone, m_office, m_occupation, m_religion, m_address, status, applied_on, section, class_assigned, admitted_on
    FROM applicants
    WHERE applicants_id = inStudentId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_get_teacher_applicants_by_year` (IN `inYear` DATE)  BEGIN

    SELECT teachers_id, name, phone, email, created_on, status
    FROM teachers 
    WHERE YEAR(created_on) = inYear AND status != 6
    ORDER BY created_on DESC;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_get_teacher_info` (IN `inTeacherId` INT)  BEGIN 
    SELECT name, phone, email, cvname, DATE_FORMAT(created_on, '%M-%e, %Y') AS 'applied_date', TIME_FORMAT(created_on, '%T') AS 'applied_time', status, birthcert, primarycert, o_Levelcert, o_Levelcert2, a_Levelcert, procert, address, passport, gender
    FROM teachers
    WHERE teachers_id = inTeacherId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_get_teacher_login_info` (IN `inEmail` VARCHAR(100))  BEGIN

    SELECT teachers_id, email
    FROM teachers 
    WHERE email = inEmail;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_save_all_personal_info` (IN `inImage1` VARCHAR(100), IN `inImage4` VARCHAR(100), IN `inBirthcert` VARCHAR(100), IN `inPrimarycert` VARCHAR(100), IN `inDocreport` VARCHAR(100), IN `inFirstname` VARCHAR(100), IN `inEmail` VARCHAR(100), IN `inSurname` VARCHAR(100), IN `inOthername` VARCHAR(100), IN `inPassword` VARCHAR(100), IN `inDob` DATE, IN `inGender` INT, IN `inState` VARCHAR(100), IN `inBloodgroup` CHAR(32), IN `inGenotype` CHAR(32), IN `inAllergies` CHAR(32), IN `inDefects` VARCHAR(100), IN `inImmunize` VARCHAR(100), IN `inDocname` VARCHAR(100), IN `inDocphone` VARCHAR(100), IN `inDocaddress` VARCHAR(100), IN `inOtherinfo` VARCHAR(100), IN `inFatherfname` CHAR(32), IN `inFstherlname` CHAR(32), IN `inFatherphone` CHAR(32), IN `inFatheroffice` VARCHAR(100), IN `inFatheroccupation` CHAR(32), IN `inFatherreligion` CHAR(32), IN `inFatheraddress` VARCHAR(100), IN `inMotherfname` CHAR(32), IN `inMotherlname` CHAR(32), IN `inMotherphone` CHAR(32), IN `inMotheroffice` VARCHAR(100), IN `inMotheroccupation` CHAR(32), IN `inMotherreligion` CHAR(32), IN `inMotheraddress` VARCHAR(100), IN `inSection` CHAR(32))  BEGIN

    INSERT INTO applicants (image1, image4, birthcert, primarycert, docreport, firstname, email, surname, othername, password, dob, gender, state, bloodgroup, genotype, allergies, defects, immunize, docname, docphone, docaddress, otherinfo, f_fname, f_lname, f_phone, f_office, f_occupation, f_religion, f_address, m_fname, m_lname, m_phone, m_office, m_occupation, m_religion, m_address, section)
    VALUES (inImage1, inImage4, inBirthcert, inPrimarycert, inDocreport, inFirstname, inEmail, inSurname, inOthername, inPassword, inDob, inGender, inState, inBloodgroup, inGenotype, inAllergies, inDefects, inImmunize, inDocname, inDocphone, inDocaddress, inOtherinfo, inFatherfname, inFstherlname, inFatherphone, inFatheroffice, inFatheroccupation, inFatherreligion, inFatheraddress, inMotherfname, inMotherlname, inMotherphone, inMotheroffice, inMotheroccupation, inMotherreligion, inMotheraddress, inSection);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_set_teacher_applicant_to_pending` (IN `inIndex` INT, IN `inTeacherId` INT)  BEGIN 
    UPDATE teachers 
    SET status = inIndex
    WHERE teachers_id = inTeacherId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `applicant_user_attestation` (IN `inUserId` INT, IN `inAttest` INT, IN `inSection` CHAR(32))  BEGIN 
    UPDATE applicants 
    SET attest = inAttest, section = inSection
    WHERE applicants_id = inUserId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_add_weekly_totals` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inToday` DATE, IN `inCurrentTermId` INT, IN `inWeeklyTotals` INT)  BEGIN

    INSERT INTO weekly_total (weekvalue_id, student_id, class_id, todaydate_id, todaydate, term_id, weektotal) VALUES (inWeekValuesid, inStudentId, inClassId, inTodaydateId, inToday, inCurrentTermId, inWeeklyTotals);
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_each_student_weekly_total` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inToday` DATE, IN `inCurrentTermId` INT)  BEGIN 

    DECLARE inCurrentStatus INT; 

    SELECT afternoon 
    FROM attendance_status
    WHERE class_id = inClassId AND 	today_date = inToday AND term_id = inCurrentTermId AND today_date_id = inTodaydateId INTO inCurrentStatus; 
    
    IF inCurrentStatus = 1 THEN

        SELECT (mark_a) AS 'week_total' FROM fn_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    ELSE 

        SELECT (mark_m+mark_a) AS 'week_total' FROM fn_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_each_student_weekly_total_fp` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inToday` DATE, IN `inCurrentTermId` INT)  BEGIN 

    DECLARE inCurrentStatus INT; 

    SELECT afternoon 
    FROM attendance_status
    WHERE class_id = inClassId AND 	today_date = inToday AND term_id = inCurrentTermId AND today_date_id = inTodaydateId INTO inCurrentStatus; 
    
    IF inCurrentStatus = 1 THEN

        SELECT (mark_a) AS 'week_total' FROM fp_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    ELSE 

        SELECT (mark_m+mark_a) AS 'week_total' FROM fp_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_each_student_weekly_total_fs` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inToday` DATE, IN `inCurrentTermId` INT)  BEGIN 

    DECLARE inCurrentStatus INT; 

    SELECT afternoon 
    FROM attendance_status
    WHERE class_id = inClassId AND 	today_date = inToday AND term_id = inCurrentTermId AND today_date_id = inTodaydateId INTO inCurrentStatus; 
    
    IF inCurrentStatus = 1 THEN

        SELECT (mark_a) AS 'week_total' FROM fs_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    ELSE 

        SELECT (mark_m+mark_a) AS 'week_total' FROM fs_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_each_student_weekly_total_sn` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inToday` DATE, IN `inCurrentTermId` INT)  BEGIN 

    DECLARE inCurrentStatus INT; 

    SELECT afternoon 
    FROM attendance_status
    WHERE class_id = inClassId AND 	today_date = inToday AND term_id = inCurrentTermId AND today_date_id = inTodaydateId INTO inCurrentStatus; 
    
    IF inCurrentStatus = 1 THEN

        SELECT (mark_a) AS 'week_total' FROM sn_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    ELSE 

        SELECT (mark_m+mark_a) AS 'week_total' FROM sn_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_each_student_weekly_total_sp` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inToday` DATE, IN `inCurrentTermId` INT)  BEGIN 

    DECLARE inCurrentStatus INT; 

    SELECT afternoon 
    FROM attendance_status
    WHERE class_id = inClassId AND 	today_date = inToday AND term_id = inCurrentTermId AND today_date_id = inTodaydateId INTO inCurrentStatus; 
    
    IF inCurrentStatus = 1 THEN

        SELECT (mark_a) AS 'week_total' FROM sp_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    ELSE 

        SELECT (mark_m+mark_a) AS 'week_total' FROM sp_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_each_student_weekly_total_ss` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inToday` DATE, IN `inCurrentTermId` INT)  BEGIN 

    DECLARE inCurrentStatus INT; 

    SELECT afternoon 
    FROM attendance_status
    WHERE class_id = inClassId AND 	today_date = inToday AND term_id = inCurrentTermId AND today_date_id = inTodaydateId INTO inCurrentStatus; 
    
    IF inCurrentStatus = 1 THEN

        SELECT (mark_a) AS 'week_total' FROM ss_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    ELSE 

        SELECT (mark_m+mark_a) AS 'week_total' FROM ss_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_each_student_weekly_total_tn` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inToday` DATE, IN `inCurrentTermId` INT)  BEGIN 

    DECLARE inCurrentStatus INT; 

    SELECT afternoon 
    FROM attendance_status
    WHERE class_id = inClassId AND 	today_date = inToday AND term_id = inCurrentTermId AND today_date_id = inTodaydateId INTO inCurrentStatus; 
    
    IF inCurrentStatus = 1 THEN

        SELECT (mark_a) AS 'week_total' FROM tn_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    ELSE 

        SELECT (mark_m+mark_a) AS 'week_total' FROM tn_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_each_student_weekly_total_tp` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inToday` DATE, IN `inCurrentTermId` INT)  BEGIN 

    DECLARE inCurrentStatus INT; 

    SELECT afternoon 
    FROM attendance_status
    WHERE class_id = inClassId AND 	today_date = inToday AND term_id = inCurrentTermId AND today_date_id = inTodaydateId INTO inCurrentStatus; 
    
    IF inCurrentStatus = 1 THEN

        SELECT (mark_a) AS 'week_total' FROM tp_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    ELSE 

        SELECT (mark_m+mark_a) AS 'week_total' FROM tp_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_each_student_weekly_total_ts` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inToday` DATE, IN `inCurrentTermId` INT)  BEGIN 

    DECLARE inCurrentStatus INT; 

    SELECT afternoon 
    FROM attendance_status
    WHERE class_id = inClassId AND 	today_date = inToday AND term_id = inCurrentTermId AND today_date_id = inTodaydateId INTO inCurrentStatus; 
    
    IF inCurrentStatus = 1 THEN

        SELECT (mark_a) AS 'week_total' FROM ts_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    ELSE 

        SELECT (mark_m+mark_a) AS 'week_total' FROM ts_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_all_weeks_percentage` (IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inThisTermStarted` DATE, IN `inThisTermEnds` DATE)  BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM fn_attendance
        INNER JOIN weeks_and_dates 
            ON fn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_all_weeks_percentage_fp` (IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inThisTermStarted` DATE, IN `inThisTermEnds` DATE)  BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM fp_attendance
        INNER JOIN weeks_and_dates 
            ON fp_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_all_weeks_percentage_fs` (IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inThisTermStarted` DATE, IN `inThisTermEnds` DATE)  BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM fs_attendance
        INNER JOIN weeks_and_dates 
            ON fs_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_all_weeks_percentage_sn` (IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inThisTermStarted` DATE, IN `inThisTermEnds` DATE)  BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM sn_attendance
        INNER JOIN weeks_and_dates 
            ON sn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_all_weeks_percentage_sp` (IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inThisTermStarted` DATE, IN `inThisTermEnds` DATE)  BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM sp_attendance
        INNER JOIN weeks_and_dates 
            ON sp_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_all_weeks_percentage_ss` (IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inThisTermStarted` DATE, IN `inThisTermEnds` DATE)  BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM ss_attendance
        INNER JOIN weeks_and_dates 
            ON ss_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_all_weeks_percentage_tn` (IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inThisTermStarted` DATE, IN `inThisTermEnds` DATE)  BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM tn_attendance
        INNER JOIN weeks_and_dates 
            ON tn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_all_weeks_percentage_tp` (IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inThisTermStarted` DATE, IN `inThisTermEnds` DATE)  BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM tp_attendance
        INNER JOIN weeks_and_dates 
            ON tp_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_all_weeks_percentage_ts` (IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inThisTermStarted` DATE, IN `inThisTermEnds` DATE)  BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM ts_attendance
        INNER JOIN weeks_and_dates 
            ON ts_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_daily_percentage` (IN `mWeekValuesid` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inTodaysdate` DATE)  BEGIN 

    SELECT week_what, (SUM(mark_m+mark_a)*100)/(COUNT(student_id)*10) AS 'dailypercent' 
    FROM fn_attendance 
	INNER JOIN weeks_and_dates
    	ON fn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id
    WHERE weekValue_id = mWeekValuesid AND class_id = inClassId AND term_id = inCurrentTermId AND todaysDate = inTodaysdate;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_each_students_attTotal` (IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inCurrentYear` CHAR(4), IN `inWeekStart` DATE, IN `inWeekStop` DATE)  BEGIN

    SELECT wt.class_id, sc.class_name, wt.term_id, t.name, wt.student_id, a.firstname, a.surname, SUM(wt.weektotal) AS 'eachTotal' 
    FROM weekly_total wt 
        INNER JOIN school_classes sc
            ON wt.class_id = sc.school_classes_id
        INNER JOIN term t
            ON wt.term_id = t.term_id 
        INNER JOIN applicants a
            ON wt.student_id = a.applicants_id
    WHERE wt.term_id = inCurrentTermId AND 
        wt.class_id = inClassId AND 
        wt.weekvalue_id BETWEEN 1 AND 15 AND 
        wt.todaydate BETWEEN inWeekStart AND inWeekStop AND 
        YEAR(wt.todaydate) = inCurrentYear 
    GROUP BY wt.student_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_privious_wklytotal` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inCurrentTermId` INT)  BEGIN

    SELECT weekly_total_id, weektotal
    FROM weekly_total
    WHERE weekvalue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND term_id = inCurrentTermId;
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_weekly_percentagez` (IN `inWeekValuesid` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inWeekStart` DATE, IN `inWeekStop` DATE)  BEGIN 
    SELECT week_what, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'dailypercent' 
    FROM fn_attendance 
        INNER JOIN weeks_and_dates 
            ON fn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE weekValue_id = inWeekValuesid AND 
        class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inWeekStart AND inWeekStop;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_weekly_percentagez_fp` (IN `inWeekValuesid` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inWeekStart` DATE, IN `inWeekStop` DATE)  BEGIN 
    SELECT week_what, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'dailypercent' 
    FROM fp_attendance 
        INNER JOIN weeks_and_dates 
            ON fp_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE weekValue_id = inWeekValuesid AND 
        class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inWeekStart AND inWeekStop;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_weekly_percentagez_fs` (IN `inWeekValuesid` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inWeekStart` DATE, IN `inWeekStop` DATE)  BEGIN 
    SELECT week_what, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'dailypercent' 
    FROM fs_attendance 
        INNER JOIN weeks_and_dates 
            ON fs_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE weekValue_id = inWeekValuesid AND 
        class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inWeekStart AND inWeekStop;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_weekly_percentagez_sn` (IN `inWeekValuesid` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inWeekStart` DATE, IN `inWeekStop` DATE)  BEGIN 
    SELECT week_what, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'dailypercent' 
    FROM sn_attendance 
        INNER JOIN weeks_and_dates 
            ON sn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE weekValue_id = inWeekValuesid AND 
        class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inWeekStart AND inWeekStop;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_weekly_percentagez_sp` (IN `inWeekValuesid` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inWeekStart` DATE, IN `inWeekStop` DATE)  BEGIN 
    SELECT week_what, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'dailypercent' 
    FROM sp_attendance 
        INNER JOIN weeks_and_dates 
            ON sp_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE weekValue_id = inWeekValuesid AND 
        class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inWeekStart AND inWeekStop;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_weekly_percentagez_ss` (IN `inWeekValuesid` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inWeekStart` DATE, IN `inWeekStop` DATE)  BEGIN 
    SELECT week_what, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'dailypercent' 
    FROM ss_attendance 
        INNER JOIN weeks_and_dates 
            ON ss_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE weekValue_id = inWeekValuesid AND 
        class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inWeekStart AND inWeekStop;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_weekly_percentagez_tn` (IN `inWeekValuesid` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inWeekStart` DATE, IN `inWeekStop` DATE)  BEGIN 
    SELECT week_what, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'dailypercent' 
    FROM tn_attendance 
        INNER JOIN weeks_and_dates 
            ON tn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE weekValue_id = inWeekValuesid AND 
        class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inWeekStart AND inWeekStop;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_weekly_percentagez_tp` (IN `inWeekValuesid` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inWeekStart` DATE, IN `inWeekStop` DATE)  BEGIN 
    SELECT week_what, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'dailypercent' 
    FROM tp_attendance 
        INNER JOIN weeks_and_dates 
            ON tp_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE weekValue_id = inWeekValuesid AND 
        class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inWeekStart AND inWeekStop;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_get_weekly_percentagez_ts` (IN `inWeekValuesid` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inWeekStart` DATE, IN `inWeekStop` DATE)  BEGIN 
    SELECT week_what, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'dailypercent' 
    FROM ts_attendance 
        INNER JOIN weeks_and_dates 
            ON ts_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE weekValue_id = inWeekValuesid AND 
        class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inWeekStart AND inWeekStop;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `attendance_update_student_wklyTotal` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inToday` DATE, IN `inCurrentTermId` INT, IN `incurrentTotal` INT)  BEGIN

    UPDATE weekly_total 
    SET weektotal = incurrentTotal, 
        todaydate_id = inTodaydateId, 
        todaydate = inToday
    WHERE weekvalue_id = inWeekValuesid AND 
        student_id = inStudentId AND 
        class_id = inClassId AND 
        term_id = inCurrentTermId;
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_add_attribute` (IN `inName` VARCHAR(100))  BEGIN
    INSERT INTO attribute (name)
    VALUES (inName);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_add_attribute_value` (IN `inAttributeId` INT, IN `inValue` VARCHAR(100))  BEGIN
    INSERT INTO attribute_value (attribute_id, value)
    VALUES (inAttributeId, inValue);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_add_category` (IN `inDepartmentId` INT, IN `inName` VARCHAR(100), IN `inDescription` VARCHAR(1000))  BEGIN
    INSERT INTO category (department_id, name, description)
    VALUES (inDepartmentId, inName, inDescription);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_add_department` (IN `inName` VARCHAR(100), IN `inDescription` VARCHAR(1000))  BEGIN
    INSERT INTO department (name, description)
    VALUES (inName, inDescription);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_add_product_to_category` (IN `inCategoryId` INT, IN `inName` VARCHAR(100), IN `inDescription` VARCHAR(1000), IN `inPrice` DECIMAL(10,2))  BEGIN

   DECLARE productLastInsertId INT;

   INSERT INTO product (name, description, price)
   VALUES (inName, inDescription, inPrice);

   SELECT LAST_INSERT_ID() INTO productLastInsertId;

   INSERT INTO product_category (product_id, category_id)
   VALUES (productLastInsertId, inCategoryId);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_assign_attribute_value_to_product` (IN `inProductId` INT, `inAttributeValueId` INT)  BEGIN
    INSERT INTO product_attribute (product_id, attribute_value_id)
        VALUES (inProductId, inAttributeValueId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_assign_product_to_category` (IN `inProductId` INT, IN `inCategoryId` INT)  BEGIN
    INSERT INTO product_category (product_id, category_id)
    VALUES (inProductId, inCategoryId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_count_products_in_category` (IN `inCategoryId` INT)  BEGIN
SELECT COUNT(*) AS categories_count
FROM product p
INNER JOIN product_category pc
ON p.product_id = pc.product_id
WHERE pc.category_id = inCategoryId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_count_products_on_catalog` ()  BEGIN
SELECT COUNT(*) AS products_on_catalog_count
FROM product
WHERE display = 1 OR display = 3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_count_products_on_department` (IN `inDepartmentId` INT)  BEGIN
SELECT DISTINCT COUNT(*) AS products_on_department_count
FROM product p
INNER JOIN product_category pc
ON p.product_id = pc.product_id
INNER JOIN category c
ON pc.category_id = c.category_id
WHERE (p.display = 2 OR p.display = 3)
AND c.department_id = inDepartmentId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_count_search_result` (IN `inSearchString` TEXT, IN `inAllWords` VARCHAR(3))  BEGIN
    IF inAllWords = 'on' THEN
        PREPARE statement FROM
            "SELECT count(*) FROM product WHERE MATCH (name, description) AGAINST (? IN BOOLEAN MODE)";
    ELSE
        PREPARE statement FROM
            "SELECT count(*) FROM product WHERE MATCH (name, description) AGAINST (?)";
    END IF;

    SET @p1 = inSearchString;
    EXECUTE statement USING @P1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_create_product_review` (IN `inCustomerId` INT, IN `inProductId` INT, IN `inReview` TEXT, IN `inRating` SMALLINT)  BEGIN
    INSERT INTO review (customer_id, product_id, review, rating, created_on)
    VALUES (inCustomerId, inProductId, inReview, inRating, NOW());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_delete_attribute` (IN `inAttributeId` INT)  BEGIN
    DECLARE attributeRowsCount INT;

    SELECT count(*)
    FROM attribute_value
    WHERE attribute_id = inAttributeId
    INTO attributeRowsCount;

    IF attributeRowsCount = 0 THEN
        DELETE FROM attribute
        WHERE attribute_id = inAttributeId;

        SELECT 1;
    ELSE
        SELECT -1;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_delete_attribute_value` (IN `inAttributeValueId` INT)  BEGIN
    DECLARE productAttributeRowsCount INT;

    SELECT count(*)
    FROM product p
    INNER JOIN product_attribute pa
            ON p.product_id = pa.product_id
    WHERE pa.attribute_value_id = inAttributeValueId
    INTO productAttributeRowsCount;

    IF productAttributeRowsCount = 0 THEN
        DELETE FROM attribute_value
        WHERE attribute_value_id = inAttributeValueId;

        SELECT 1;
    ELSE
        SELECT -1;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_delete_category` (IN `inCategoryId` INT)  BEGIN
    DECLARE productCategoryRowsCount INT;

    SELECT count(*)
    FROM product p
    INNER JOIN product_category pc
    ON p.product_id = pc.product_id
    WHERE pc.category_id = inCategoryId
    INTO productCategoryRowsCount;

    IF productCategoryRowsCount = 0 THEN
        DELETE FROM category WHERE category_id = inCategoryId;
        SELECT 1;
    ELSE
        SELECT -1;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_delete_department` (IN `inDepartmentId` INT)  BEGIN
    DECLARE categoryRowsCount INT;

    SELECT count(*)
    FROM category
    WHERE department_id = inDepartmentId
    INTO categoryRowsCount;

    IF categoryRowsCount = 0 THEN
        DELETE FROM department WHERE department_id = inDepartmentId;
        SELECT 1;
    ELSE
        SELECT -1;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_delete_product` (IN `inProductId` INT)  BEGIN
    DELETE FROM product_attribute WHERE product_id = inProductId;
    DELETE FROM product_category WHERE product_id = inProductId;
    DELETE FROM shopping_cart WHERE product_id = inProductId;
    DELETE FROM product WHERE product_id = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_attributes` ()  BEGIN
    SELECT attribute_id, name
    FROM attribute
    ORDER BY attribute_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_attributes_not_assigned_to_product` (IN `inProductId` INT)  BEGIN
    SELECT a.name AS attribute_name,
        av.attribute_value_id, av.value AS attribute_value
    FROM attribute_value av
    INNER JOIN attribute a
            ON av.attribute_id = a.attribute_id
    WHERE av.attribute_value_id NOT IN
            (SELECT attribute_value_id
            FROM product_attribute
            WHERE product_id = inProductId)
    ORDER BY attribute_name, av.attribute_value_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_attribute_details` (IN `inAttributeId` INT)  BEGIN
    SELECT attribute_id, name
    FROM attribute
    WHERE attribute_id = inAttributeId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_attribute_values` (IN `inAttributeId` INT)  BEGIN
    SELECT attribute_value_id, value
    FROM attribute_value
    WHERE attribute_id = inAttributeId
    ORDER BY attribute_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_categories` ()  BEGIN
    SELECT category_id, name, description
    FROM category
    ORDER BY category_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_categories_for_product` (IN `inProductId` INT)  BEGIN
    SELECT c.category_id, c.department_id, c.name
    FROM category c
    JOIN product_category pc
       ON c.category_id = pc.category_id
    WHERE pc.product_id = inProductId
    ORDER BY category_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_categories_list` (IN `inDepartmentId` INT)  BEGIN
SELECT category_id, name
FROM category
WHERE department_id = inDepartmentId
ORDER BY category_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_category_details` (IN `inCategoryId` INT)  BEGIN
SELECT name, description
FROM category
WHERE category_id = inCategoryId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_category_name` (IN `inCategoryId` INT)  BEGIN
SELECT name FROM category WHERE category_id = inCategoryId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_category_products` (IN `inCategoryId` INT)  BEGIN

    SELECT p.product_id, p.name, p.description, p.price, p.discounted_price
    FROM product p
    INNER JOIN product_category pc
            ON p.product_id = pc.product_id
    WHERE pc.category_id = inCategoryId
    ORDER BY p.product_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_departments` ()  BEGIN
    SELECT department_id, name, description
    FROM department
    ORDER BY department_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_departments_list` ()  BEGIN
  SELECT department_id, name FROM department ORDER BY department_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_department_categories` (IN `inDepartmentId` INT)  BEGIN
    SELECT category_id, name, description
    FROM category
    WHERE department_id = inDepartmentId
    ORDER BY category_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_department_details` (IN `inDepartmentId` INT)  BEGIN
SELECT name, description
FROM department
WHERE department_id = inDepartmentId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_department_id` (IN `inName` VARCHAR(100))  BEGIN
    SELECT department_id FROM department WHERE name = inName;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_department_name` (IN `inDepartmentId` INT)  BEGIN
SELECT name FROM department WHERE department_id = inDepartmentId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_products_in_category` (IN `inCategoryId` INT, IN `inShortProductDescriptionLength` INT, IN `inProductsPerPage` INT, IN `inStartItem` INT)  BEGIN
PREPARE statement FROM "SELECT p.product_id, p.name, IF(LENGTH(p.description) <= ?, p.description, CONCAT(LEFT(p.description, ?), '...')) AS description, p.price, p.discounted_price, p.thumbnail FROM product p INNER JOIN product_category pc ON p.product_id = pc.product_id WHERE pc.category_id = ? ORDER BY p.display DESC LIMIT ?, ?";
SET @p1 = inShortProductDescriptionLength;
SET @p2 = inShortProductDescriptionLength;
SET @p3 = inCategoryId;
SET @p4 = inStartItem;
SET @p5 = inProductsPerPage;
EXECUTE statement USING @p1, @p2, @p3, @p4, @p5;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_products_on_catalog` (IN `inShortProductDescriptionLength` INT, IN `inProductsPerPage` INT, IN `inStartItem` INT)  BEGIN
PREPARE statement FROM "SELECT product_id, name, IF(LENGTH(description) <= ?, description, CONCAT(LEFT(description, ?), '...')) AS description, price, discounted_price, thumbnail FROM product WHERE display = 1 OR display = 3 ORDER BY display DESC LIMIT ?, ?";
SET @p1 = inShortProductDescriptionLength;
SET @p2 = inShortProductDescriptionLength;
SET @p3 = inStartItem;
SET @p4 = inProductsPerPage;
EXECUTE statement USING @p1, @p2, @p3, @p4;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_products_on_department` (IN `inDepartmentId` INT, IN `inShortProductDescriptionLength` INT, IN `inProductsPerPage` INT, IN `inStartItem` INT)  BEGIN
PREPARE statement FROM "SELECT DISTINCT p.product_id, p.name, IF(LENGTH(p.description) <= ?, p.description, CONCAT(LEFT(p.description, ?), '...')) AS description, p.price, p.discounted_price, p.thumbnail FROM product p INNER JOIN product_category pc ON p.product_id = pc.product_id INNER JOIN category c ON pc.category_id = c.category_id WHERE (p.display = 2 OR p.display = 3) AND c.department_id = ? ORDER BY p.display DESC LIMIT ?, ?";
SET @p1 = inShortProductDescriptionLength;
SET @p2 = inShortProductDescriptionLength;
SET @p3 = inDepartmentId;
SET @p4 = inStartItem;
SET @p5 = inProductsPerPage;
EXECUTE statement USING @p1, @p2, @p3, @p4, @p5;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_product_attributes` (IN `inProductId` INT)  BEGIN
SELECT a.name AS attribute_name, av.attribute_value_id, av.value AS attribute_value FROM attribute_value av INNER JOIN attribute a ON av.attribute_id = a.attribute_id WHERE av.attribute_value_id IN (SELECT attribute_value_id FROM product_attribute WHERE product_id = inProductId) ORDER BY a.name;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_product_details` (IN `inProductId` INT)  BEGIN
SELECT product_id, name, description,
price, discounted_price, image, image_2
FROM product
WHERE product_id = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_product_info` (IN `inProductId` INT)  BEGIN
    SELECT product_id, name, description, price, discounted_price, image, image_2, thumbnail, display
    FROM product
    WHERE product_id = inProductId;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_product_locations` (IN `inProductId` INT)  BEGIN
SELECT c.category_id, c.name AS category_name, c.department_id,
(SELECT name
FROM department
WHERE department_id = c.department_id) AS department_name
FROM category c
WHERE c.category_id IN
(SELECT category_id
FROM product_category
WHERE product_id = inProductId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_product_name` (IN `inProductId` INT)  BEGIN
SELECT name FROM product WHERE product_id = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_product_reviews` (IN `inProductId` INT)  BEGIN
    SELECT c.name, r.review, r.rating, r.created_on
    FROM review r
    INNER JOIN customer c
            ON c.customer_id = r.customer_id
    WHERE r.product_id = inProductId
    ORDER BY r.created_on DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_recommendations` (IN `inProductId` INT, IN `inShortProductDescriptionLength` INT)  BEGIN
    PREPARE statement FROM

    "SELECT od2.product_id, od2.product_name,
            IF(LENGTH(p.description) <= ?, p.description,
            CONCAT(LEFT(p.description, ?), '...')) AS description
    FROM order_detail od1
    JOIN order_detail od2 ON od1.order_id = od2.order_id
    JOIN product p ON od2.product_id = p.product_id
    WHERE od1.product_id = ? AND
            od2.product_id != ?
    GROUP BY od2.product_id
    ORDER BY COUNT(od2.product_id) DESC
    LIMIT 5";

    SET @p1 = inShortProductDescriptionLength;
    SET @p2 = inProductId;

    EXECUTE statement USING @p1, @p1, @p2, @p2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_move_product_to_category` (IN `inProductId` INT, IN `inSourceCategoryId` INT, IN `inTargetCategoryId` INT)  BEGIN
    UPDATE product_category
    SET category_id = inTargetCategoryId
    WHERE product_id = inProductId AND category_id = inSourceCategoryId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_remove_product_attribute_value` (IN `inProductId` INT, IN `inAttributeValueId` INT)  BEGIN
    DELETE FROM product_attribute
    WHERE product_id = inProductId AND attribute_value_id = inAttributeValueId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_remove_product_from_category` (IN `inProductId` INT, IN `inCategoryId` INT)  BEGIN
    DECLARE productCategoryRowsCount INT;

    SELECT count(*)
    FROM product_category
    WHERE product_id = inProductId
    INTO productCategoryRowsCount;

    IF productCategoryRowsCount = 1 THEN
        CALL catalog_delete_product(inProductId);
        SELECT 0;
    ELSE
        DELETE FROM product_category
        WHERE category_id = inCategoryId AND product_id = inProductId;

        SELECT 1;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_search` (IN `inSearchString` TEXT, IN `inAllWords` VARCHAR(3), IN `inShortProductDescriptionLength` INT, IN `inProductsPerPage` INT, IN `inStartItem` INT)  BEGIN
    IF inAllWords = "on" THEN
        PREPARE statement FROM
            "SELECT product_id, name,
                    IF(LENGTH(description) <= ?,
                    description,
                    CONCAT(LEFT(description, ?),
                     '...')) AS description,
                     price, discounted_price, thumbnail
            FROM product
            WHERE MATCH (name, description) AGAINST (? IN BOOLEAN MODE)
            ORDER BY MATCH (name, description) AGAINST (? IN BOOLEAN MODE) DESC
            LIMIT ?, ?";
    ELSE
        PREPARE statement FROM
            "SELECT product_id, name,
                    IF(LENGTH(description) <= ?,
                    description,
                    CONCAT(LEFT(description, ?),
                    '...')) AS description,
                    price, discounted_price, thumbnail
            FROM product
            WHERE MATCH (name, description) AGAINST (?)
            ORDER BY MATCH (name, description) AGAINST (?) DESC
            LIMIT ?, ?";
    END IF;

    SET @p1 = inShortProductDescriptionLength;
    SET @p2 = inSearchString;
    SET @p3 = inStartItem;
    SET @p4 = inProductsPerPage;
    EXECUTE statement USING @p1, @p1, @p2, @p2, @p3, @p4;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_set_image` (IN `inProductId` INT, IN `inImage` VARCHAR(150))  BEGIN
    UPDATE product SET image = inImage WHERE product_id = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_set_image_2` (IN `inProductId` INT, IN `inImage` VARCHAR(150))  BEGIN
    UPDATE product SET image_2 = inImage WHERE product_id = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_set_product_display_option` (IN `inProductId` INT, IN `inDisplay` SMALLINT)  BEGIN
    UPDATE product
    SET display = inDisplay
    WHERE product_id = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_set_thumbnail` (IN `inProductId` INT, IN `inThumbnail` VARCHAR(150))  BEGIN
    UPDATE product
    SET thumbnail = inThumbnail
    WHERE product_id = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_update_attribute` (IN `inAttributeId` INT, IN `inName` VARCHAR(100))  BEGIN
    UPDATE attribute
    SET name = inName
    WHERE attribute_id = inAttributeId;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_update_attribute_value` (IN `inAttributeValueId` INT, IN `inValue` VARCHAR(100))  BEGIN
    UPDATE attribute_value
    SET value = inValue
    WHERE attribute_value_id = inAttributeValueId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_update_category` (IN `inCategoryId` INT, IN `inName` VARCHAR(100), IN `inDescription` VARCHAR(1000))  BEGIN
    UPDATE category
    SET name = inName, description = inDescription
    WHERE category_id = inCategoryId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_update_department` (IN `inDepartmentId` INT, IN `inName` VARCHAR(100), IN `inDescription` VARCHAR(1000))  BEGIN
    UPDATE department
    SET name = inName, description = inDescription
    WHERE department_id = inDepartmentId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_update_product` (IN `inProductId` INT, IN `inName` VARCHAR(100), IN `inDescription` VARCHAR(1000), IN `inPrice` DECIMAL(10,2), IN `inDiscountedPrice` DECIMAL(10,2))  BEGIN

    UPDATE product
    SET name = inName, description = inDescription, price = inPrice, discounted_price = inDiscountedPrice
    WHERE product_id = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ca_add_studentFirst_ca` (IN `inStScores` INT, IN `inStudentIdz` INT, IN `inSubjectId` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inDepartmentName` CHAR(32), IN `inCaType` CHAR(32), IN `inDate` DATE)  BEGIN
    DECLARE justInsertedId INT;

    IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' AND inCaType = 'first_ca' THEN

        INSERT INTO fn_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

    
    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' AND inCaType = 'first_ca' THEN

        INSERT INTO sn_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

    
    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' AND inCaType = 'first_ca' THEN

        INSERT INTO tn_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

  ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' AND inCaType = 'first_ca' THEN

        INSERT INTO fp_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' AND inCaType = 'first_ca' THEN

        INSERT INTO sp_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' AND inCaType = 'first_ca' THEN

        INSERT INTO tp_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' AND inCaType = 'first_ca' THEN

        INSERT INTO fs_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' AND inCaType = 'first_ca' THEN

        INSERT INTO ss_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

ELSE

        INSERT INTO ts_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ca_get_student_caExam_record` (IN `inStudentIdz` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inTermStarted` DATE, IN `inTermEnds` DATE, IN `inDepartmentName` CHAR(32))  BEGIN
    
    IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' THEN

        SELECT fr.fn_ca_record_id, fr.firstca, fr.secondca, fr.thirdca, (fr.firstca+fr.secondca+fr.thirdca) AS 'catotal', fr.exams, (fr.firstca+fr.secondca+fr.thirdca+fr.exams) AS 'total', fr.student_id, a.firstname, a.surname, fr.subject_id, s.name, fr.supDate
        FROM fn_ca_record fr
            INNER JOIN applicants a
                ON fr.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON fr.subject_id = s.subjects_id
        WHERE fr.student_id = inStudentIdz AND
            fr.class_id = inClassId AND
            fr.term_id = inCurrentTermId AND
            fr.supDate BETWEEN inTermStarted AND inTermEnds;
        
    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' THEN

        SELECT sn.sn_ca_record_id, sn.firstca, sn.secondca, sn.thirdca, (sn.firstca+sn.secondca+sn.thirdca) AS 'catotal', sn.exams, (sn.firstca+sn.secondca+sn.thirdca+sn.exams) AS 'total', sn.student_id, a.firstname, a.surname, sn.subject_id, s.name, sn.supDate
        FROM sn_ca_record sn
            INNER JOIN applicants a
                ON sn.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON sn.subject_id = s.subjects_id
        WHERE sn.student_id = inStudentIdz AND
            sn.class_id = inClassId AND
            sn.term_id = inCurrentTermId AND
            sn.supDate BETWEEN inTermStarted AND inTermEnds; 

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' THEN

        SELECT tn.tn_ca_record_id, tn.firstca, tn.secondca, tn.thirdca, (tn.firstca+tn.secondca+tn.thirdca) AS 'catotal', tn.exams, (tn.firstca+tn.secondca+tn.thirdca+tn.exams) AS 'total', tn.student_id, a.firstname, a.surname, tn.subject_id, s.name, tn.supDate
        FROM tn_ca_record tn
            INNER JOIN applicants a
                ON tn.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON tn.subject_id = s.subjects_id
        WHERE tn.student_id = inStudentIdz AND
            tn.class_id = inClassId AND
            tn.term_id = inCurrentTermId AND
            tn.supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' THEN

        SELECT fp.fp_ca_record_id, fp.firstca, fp.secondca, fp.thirdca, (fp.firstca+fp.secondca+fp.thirdca) AS 'catotal', fp.exams, (fp.firstca+fp.secondca+fp.thirdca+fp.exams) AS 'total', fp.student_id, a.firstname, a.surname, fp.subject_id, s.name, fp.supDate
        FROM fp_ca_record fp
            INNER JOIN applicants a
                ON fp.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON fp.subject_id = s.subjects_id
        WHERE fp.student_id = inStudentIdz AND
            fp.class_id = inClassId AND
            fp.term_id = inCurrentTermId AND
            fp.supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' THEN

        SELECT sp.sp_ca_record_id, sp.firstca, sp.secondca, sp.thirdca, (sp.firstca+sp.secondca+sp.thirdca) AS 'catotal', sp.exams, (sp.firstca+sp.secondca+sp.thirdca+sp.exams) AS 'total', sp.student_id, a.firstname, a.surname, sp.subject_id, s.name, sp.supDate
        FROM sp_ca_record sp
            INNER JOIN applicants a
                ON sp.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON sp.subject_id = s.subjects_id
        WHERE sp.student_id = inStudentIdz AND
            sp.class_id = inClassId AND
            sp.term_id = inCurrentTermId AND
            sp.supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' THEN

        SELECT tp.tp_ca_record_id, tp.firstca, tp.secondca, tp.thirdca, (tp.firstca+tp.secondca+tp.thirdca) AS 'catotal', tp.exams, (tp.firstca+tp.secondca+tp.thirdca+tp.exams) AS 'total', tp.student_id, a.firstname, a.surname, tp.subject_id, s.name, tp.supDate
        FROM tp_ca_record tp
            INNER JOIN applicants a
                ON tp.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON tp.subject_id = s.subjects_id
        WHERE tp.student_id = inStudentIdz AND
            tp.class_id = inClassId AND
            tp.term_id = inCurrentTermId AND
            tp.supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' THEN

        SELECT fs.fs_ca_record_id, fs.firstca, fs.secondca, fs.thirdca, (fs.firstca+fs.secondca+fs.thirdca) AS 'catotal', fs.exams, (fs.firstca+fs.secondca+fs.thirdca+fs.exams) AS 'total', fs.student_id, a.firstname, a.surname, fs.subject_id, s.name, fs.supDate
        FROM fs_ca_record fs
            INNER JOIN applicants a
                ON fs.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON fs.subject_id = s.subjects_id
        WHERE fs.student_id = inStudentIdz AND
            fs.class_id = inClassId AND
            fs.term_id = inCurrentTermId AND
            fs.supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' THEN

        SELECT ss.ss_ca_record_id, ss.firstca, ss.secondca, ss.thirdca, (ss.firstca+ss.secondca+ss.thirdca) AS 'catotal', ss.exams, (ss.firstca+ss.secondca+ss.thirdca+ss.exams) AS 'total', ss.student_id, a.firstname, a.surname, ss.subject_id, s.name, ss.supDate
        FROM ss_ca_record ss
            INNER JOIN applicants a
                ON ss.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON ss.subject_id = s.subjects_id
        WHERE ss.student_id = inStudentIdz AND
            ss.class_id = inClassId AND
            ss.term_id = inCurrentTermId AND
            ss.supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Secondary' THEN

        SELECT ts.ts_ca_record_id, ts.firstca, ts.secondca, ts.thirdca, (ts.firstca+ts.secondca+ts.thirdca) AS 'catotal', ts.exams, (ts.firstca+ts.secondca+ts.thirdca+ts.exams) AS 'total', ts.student_id, a.firstname, a.surname, ts.subject_id, s.name, ts.supDate
        FROM ts_ca_record ts
            INNER JOIN applicants a
                ON ts.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON ts.subject_id = s.subjects_id
        WHERE ts.student_id = inStudentIdz AND
            ts.class_id = inClassId AND
            ts.term_id = inCurrentTermId AND
            ts.supDate BETWEEN inTermStarted AND inTermEnds;
        
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ca_get_subjectname_use_id` (IN `inSubjectId` INT)  BEGIN 
    SELECT subjects_id, name 
    FROM subjects 
    WHERE subjects_id = inSubjectId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ca_isSubject2CA_done` (IN `inSubjectId` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inDepartmentName` CHAR(32), IN `inTermStarted` DATE, IN `inTermEnds` DATE)  BEGIN 
        
        IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' THEN

            SELECT SUM(secondca) AS 'alreadytotal'
            FROM fn_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;
            
        
        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' THEN

            SELECT SUM(secondca) AS 'alreadytotal'
            FROM sn_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' THEN

            SELECT SUM(secondca) AS 'alreadytotal'
            FROM tn_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' THEN

            SELECT SUM(secondca) AS 'alreadytotal'
            FROM fp_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' THEN

         
            SELECT SUM(secondca) AS 'alreadytotal'
            FROM sp_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' THEN

            SELECT SUM(secondca) AS 'alreadytotal'
            FROM tp_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' THEN

            SELECT SUM(secondca) AS 'alreadytotal' 
            FROM fs_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' THEN

            SELECT SUM(secondca) AS 'alreadytotal'
            FROM ss_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Secondary' THEN

 
            SELECT SUM(secondca) AS 'alreadytotal'
            FROM ts_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        END IF;
        

    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ca_isSubject3CA_done` (IN `inSubjectId` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inDepartmentName` CHAR(32), IN `inTermStarted` DATE, IN `inTermEnds` DATE)  BEGIN 
        
        IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' THEN

            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM fn_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;
            
        
        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' THEN

            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM sn_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' THEN

            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM tn_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' THEN

            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM fp_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' THEN

         
            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM sp_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' THEN

            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM tp_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' THEN

            SELECT SUM(thirdca) AS 'alreadytotal' 
            FROM fs_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' THEN

            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM ss_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Secondary' THEN

 
            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM ts_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        END IF;
        

    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ca_isSubjectCA_done` (IN `inSubjectId` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inDepartmentName` CHAR(32), IN `inCaType` CHAR(32), IN `inTodayDate` DATE, IN `inTermStarted` DATE, IN `inTermEnds` DATE)  BEGIN 
        
        IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' AND inCaType = 'first_ca' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM fn_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;
            
        
        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' AND inCaType = 'first_ca' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM sn_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' AND inCaType = 'first_ca' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM tn_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' AND inCaType = 'first_ca' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM fp_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' AND inCaType = 'first_ca' THEN

         
            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM sp_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' AND inCaType = 'first_ca' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM tp_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' AND inCaType = 'first_ca' THEN

            SELECT COUNT(firstca) AS 'alreadytotal' 
            FROM fs_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' AND inCaType = 'first_ca' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM ss_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSE
 
            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM ts_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        END IF;
        

    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ca_isSubjectExam_done` (IN `inSubjectId` INT, IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inDepartmentName` CHAR(32), IN `inTermStarted` DATE, IN `inTermEnds` DATE)  BEGIN 
        
        IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' THEN

            SELECT SUM(exams) AS 'alreadytotal'
            FROM fn_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;
            
        
        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' THEN

            SELECT SUM(exams) AS 'alreadytotal'
            FROM sn_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' THEN

            SELECT SUM(exams) AS 'alreadytotal'
            FROM tn_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' THEN

            SELECT SUM(exams) AS 'alreadytotal'
            FROM fp_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' THEN

         
            SELECT SUM(exams) AS 'alreadytotal'
            FROM sp_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' THEN

            SELECT SUM(exams) AS 'alreadytotal'
            FROM tp_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' THEN

            SELECT SUM(exams) AS 'alreadytotal' 
            FROM fs_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' THEN

            SELECT SUM(exams) AS 'alreadytotal'
            FROM ss_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Secondary' THEN

 
            SELECT SUM(exams) AS 'alreadytotal'
            FROM ts_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        END IF;
        

    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ca_is_subjctCa_started` (IN `inClassId` INT, IN `inCurrentTermId` INT, IN `inDepartmentName` CHAR(32), IN `inTermStarted` DATE, IN `inTermEnds` DATE)  BEGIN 
        
        IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM fn_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;
            
        
        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM sn_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM tn_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM fp_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' THEN

         
            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM sp_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM tp_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' THEN

            SELECT COUNT(firstca) AS 'alreadytotal' 
            FROM fs_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM ss_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSE
 
            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM ts_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        END IF;
        

    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ca_update_examFor_one_student` (IN `inSubjectId` INT, IN `inFirstCaScore` INT, IN `inStudentId` INT, IN `inCurrentTermId` INT, IN `inDepartmentName` CHAR(32), IN `inClassId` INT, IN `inTermStarted` DATE, IN `inTermEnds` DATE)  BEGIN
    IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' THEN

        
        UPDATE fn_ca_record 
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            
        
    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' THEN

        
        UPDATE sn_ca_record
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' THEN

        
        UPDATE tn_ca_record
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' THEN

        
        UPDATE fp_ca_record
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds; 
            

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' THEN

        
        UPDATE sp_ca_record 
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' THEN

        
        UPDATE tp_ca_record 
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' THEN

        
        UPDATE fs_ca_record
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' THEN

        
        UPDATE ss_ca_record
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Secondary' THEN

        
        UPDATE ts_ca_record
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            
        
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ca_update_first_CazFor_one_student` (IN `inSubjectId` INT, IN `inFirstCaScore` INT, IN `inStudentId` INT, IN `inCurrentTermId` INT, IN `inDepartmentName` CHAR(32), IN `inClassId` INT, IN `inTermStarted` DATE, IN `inTermEnds` DATE)  BEGIN
    IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' THEN

        
        UPDATE fn_ca_record 
        SET firstca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            
        
    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' THEN

        
        UPDATE sn_ca_record
        SET firstca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' THEN

        
        UPDATE tn_ca_record
        SET firstca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' THEN

        
        UPDATE fp_ca_record
        SET firstca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds; 
            

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' THEN

        
        UPDATE sp_ca_record 
        SET firstca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' THEN

        
        UPDATE tp_ca_record 
        SET firstca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' THEN

        
        UPDATE fs_ca_record
        SET firstca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' THEN

        
        UPDATE ss_ca_record
        SET firstca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Secondary' THEN

        
        UPDATE ts_ca_record
        SET firstca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            
        
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ca_update_second_CazFor_one_student` (IN `inSubjectId` INT, IN `inFirstCaScore` INT, IN `inStudentId` INT, IN `inCurrentTermId` INT, IN `inDepartmentName` CHAR(32), IN `inClassId` INT, IN `inTermStarted` DATE, IN `inTermEnds` DATE)  BEGIN
    IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' THEN

        
        UPDATE fn_ca_record 
        SET secondca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            
        
    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' THEN

        
        UPDATE sn_ca_record
        SET secondca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' THEN

        
        UPDATE tn_ca_record
        SET secondca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' THEN

        
        UPDATE fp_ca_record
        SET secondca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds; 
            

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' THEN

        
        UPDATE sp_ca_record 
        SET secondca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' THEN

        
        UPDATE tp_ca_record 
        SET secondca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' THEN

        
        UPDATE fs_ca_record
        SET secondca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' THEN

        
        UPDATE ss_ca_record
        SET secondca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Secondary' THEN

        
        UPDATE ts_ca_record
        SET secondca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            
        
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ca_update_third_CazFor_one_student` (IN `inSubjectId` INT, IN `inFirstCaScore` INT, IN `inStudentId` INT, IN `inCurrentTermId` INT, IN `inDepartmentName` CHAR(32), IN `inClassId` INT, IN `inTermStarted` DATE, IN `inTermEnds` DATE)  BEGIN
    IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' THEN

        
        UPDATE fn_ca_record 
        SET thirdca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            
        
    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' THEN

        
        UPDATE sn_ca_record
        SET thirdca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' THEN

        
        UPDATE tn_ca_record
        SET thirdca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' THEN

        
        UPDATE fp_ca_record
        SET thirdca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds; 
            

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' THEN

        
        UPDATE sp_ca_record 
        SET thirdca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' THEN

        
        UPDATE tp_ca_record 
        SET thirdca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' THEN

        
        UPDATE fs_ca_record
        SET thirdca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' THEN

        
        UPDATE ss_ca_record
        SET thirdca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Secondary' THEN

        
        UPDATE ts_ca_record
        SET thirdca = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            
        
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `count_female_for_specified_class` (IN `inClassId` INT, IN `inTerm` VARCHAR(100), IN `inActiveStatus` INT)  BEGIN 
    SELECT count(*)
    FROM active_class ac 
        INNER JOIN applicants a 
            ON ac.student_id = a.applicants_id
    WHERE class_id = inClassId AND term_name = inTerm AND active_status = inActiveStatus AND gender = 2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `count_male_for_specified_class` (IN `inClassId` INT, IN `inTerm` VARCHAR(100), IN `inActiveStatus` INT)  BEGIN 
    SELECT count(*)
    FROM active_class ac 
        INNER JOIN applicants a 
            ON ac.student_id = a.applicants_id
    WHERE class_id = inClassId AND term_name = inTerm AND active_status = inActiveStatus AND gender = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_add` (IN `inName` VARCHAR(50), IN `inEmail` VARCHAR(100), IN `inPassword` VARCHAR(100))  BEGIN
    INSERT INTO customer (name, email, password)
    VALUES (inName, inEmail, inPassword);

    SELECT LAST_INSERT_ID();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_get_customer` (IN `inCustomerId` INT)  BEGIN
    SELECT customer_id, name, email, password, credit_card, address_1, address_2, city, region, postal_code, country, shipping_region_id, day_phone, eve_phone, mob_phone
    FROM customer
    WHERE customer_id = inCustomerId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_get_customers_list` ()  BEGIN
    SELECT customer_id, name
    FROM customer
    ORDER BY name ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_get_login_info` (IN `inEmail` VARCHAR(100))  BEGIN
    SELECT customer_id, password
    FROM customer
    WHERE email = inEmail;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_get_login_info_staff` (IN `inEmail` VARCHAR(100))  BEGIN 
    SELECT teachers_id, password FROM teachers WHERE email = inEmail;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_get_shipping_regions` ()  BEGIN
    SELECT shipping_region_id, shipping_region
    FROM shipping_region;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_update_account` (IN `inCustomerId` INT, IN `inName` VARCHAR(50), IN `inEmail` VARCHAR(100), IN `inPassword` VARCHAR(50), IN `inDayPhone` VARCHAR(100), IN `inEvePhone` VARCHAR(100), IN `inMobPhone` VARCHAR(100))  BEGIN
    UPDATE customer
    SET name = inName, email = inEmail, password = inPassword, day_phone = inDayPhone, eve_phone = inEvePhone, mob_phone = inMobPhone
    WHERE customer_id = inCustomerId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_update_address` (IN `inCustomerId` INT, IN `inAddress1` VARCHAR(100), IN `inAddress2` VARCHAR(100), IN `inCity` VARCHAR(100), IN `inRegion` VARCHAR(100), IN `inPostalCode` VARCHAR(100), IN `inCountry` VARCHAR(100), IN `inShippingRegionId` INT)  BEGIN
    UPDATE customer
    SET address_1 = inAddress1, address_2 = inAddress2, city = inCity,
        region = inRegion, postal_code = inPostalCode,
        country = inCountry, shipping_region_id = inShippingRegionId
    WHERE customer_id = inCustomerId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_update_credit_card` (IN `inCustomerId` INT, IN `inCreditCard` TEXT)  BEGIN
    UPDATE customer
    SET credit_card = inCreditCard
    WHERE customer_id = inCustomerId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_create_audit` (IN `inOrderId` INT, IN `inMessage` TEXT, IN `inCode` INT)  BEGIN
    INSERT INTO audit (order_id, created_on, message, code)
    VALUES (inOrderId, NOW(), inMessage, inCode);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_audit_trail` (IN `inOrderId` INT)  BEGIN
    SELECT audit_id, order_id, created_on, message, code
    FROM audit
    WHERE order_id = inOrderId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_by_customer_id` (IN `inCustomerId` INT)  BEGIN
    SELECT o.order_id, o.total_amount, o.created_on, o.shipped_on, o.status, c.name
    FROM orders o
    INNER JOIN customer c
            ON o.customer_id = c.customer_id
    WHERE o.customer_id = inCustomerId
    ORDER BY o.created_on DESC;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_most_recent_orders` (IN `inHowMany` INT)  BEGIN
    PREPARE statement FROM

    "SELECT o.order_id, o.total_amount, o.created_on, o.shipped_on, o.status, c.name
    FROM orders o
    INNER JOIN customer c
            ON o.customer_id = c.customer_id
    ORDER BY o.created_on DESC
    LIMIT ?";

    SET @p1 = inHowMany;

    EXECUTE statement USING @p1;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_orders_between_dates` (IN `inStartDate` DATETIME, IN `inEndDate` DATETIME)  BEGIN
    SELECT o.order_id, o.total_amount, o.created_on, o.shipped_on, o.status, c.name
    FROM orders o
    INNER JOIN customer c
            ON o.customer_id = c.customer_id
    WHERE o.created_on >= inStartDate AND o.created_on <= inEndDate
    ORDER BY o.created_on DESC;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_orders_by_status` (IN `inStatus` INT)  BEGIN

    SELECT o.order_id, o.total_amount, o.created_on, o.shipped_on, o.status, c.name
    FROM orders o
    INNER JOIN customer c
                ON o.customer_id = c.customer_id
    WHERE o.status = inStatus
    ORDER BY o.created_on DESC;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_order_details` (IN `inOrderId` INT)  BEGIN
    SELECT order_id, product_id, attributes, product_name, quantity, unit_cost, (quantity * unit_cost) AS subtotal
    FROM order_detail
    WHERE order_id = inOrderId;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_order_info` (IN `inOrderId` INT)  BEGIN
SELECT o.order_id, o.total_amount, o.created_on, o.shipped_on,
o.status, o.comments, o.customer_id, o.auth_code,
o.reference, o.shipping_id, s.shipping_type, s.shipping_cost,
o.tax_id, t.tax_type, t.tax_percentage
FROM orders o
INNER JOIN tax t
ON t.tax_id = o.tax_id
INNER JOIN shipping s
ON s.shipping_id = o.shipping_id
WHERE o.order_id = inOrderId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_order_short_details` (IN `inOrderId` INT)  BEGIN
    SELECT o.order_id, o.total_amount, o.created_on, o.shipped_on, o.status, c.name
    FROM orders o
    INNER JOIN customer c
            ON o.customer_id = c.customer_id
    WHERE o.order_id = inOrderId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_shipping_info` (IN `inShippingRegionId` INT)  BEGIN
SELECT shipping_id, shipping_type, shipping_cost, shipping_region_id
FROM shipping
WHERE shipping_region_id = inShippingRegionId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_set_auth_code` (IN `inOrderId` INT, IN `inAuthCode` VARCHAR(50), IN `inReference` VARCHAR(50))  BEGIN
    UPDATE orders
    SET auth_code = inAuthCode, reference = inReference
    WHERE order_id = inOrderId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_set_date_shipped` (IN `inOrderId` INT)  BEGIN
    UPDATE orders
    SET shipped_on = NOW()
    WHERE order_id = inOrderId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_update_order` (IN `inOrderId` INT, IN `inStatus` INT, IN `inComments` VARCHAR(255), IN `inAuthCode` VARCHAR(50), IN `inReference` VARCHAR(50))  BEGIN
    DECLARE currentDateShipped DATETIME;

    SELECT shipped_on
    FROM orders
    WHERE order_id = inOrderId
    INTO currentDateShipped;

    UPDATE orders
    SET status = inStatus, comments = inComments, auth_code = inAuthCode, reference = inReference
    WHERE order_id = inOrderId;

    IF inStatus < 7 AND currentDateShipped IS NOT NULL THEN
        UPDATE orders
        SET shipped_on = NULL
        WHERE order_id = inOrderId;
    ELSEIF inStatus > 6 AND currentDateShipped IS NULL THEN
        UPDATE orders
        SET shipped_on = NOW()
        WHERE order_id = inOrderId;
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_update_status` (IN `inOrderId` INT, IN `inStatus` INT)  BEGIN
    UPDATE orders
    SET status = inStatus
    WHERE order_id = inOrderId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_add_new_class_name` (IN `inClassName` VARCHAR(100), IN `inDepartmentId` INT, IN `inSourceId` INT)  BEGIN 

    INSERT INTO school_classes (class_name, department_id, source_id)
    VALUES (inClassName, inDepartmentId, inSourceId);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_add_new_subject` (IN `inSubjectname` VARCHAR(100))  BEGIN 
    INSERT INTO subjects (name) VALUES (inSubjectname);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_add_session_date` (IN `inSessionDate` DATE, IN `inYearOnly` CHAR(4))  BEGIN 
    DECLARE userLastInsertId INT;

    INSERT INTO school_session (session_date, session_year) VALUES (inSessionDate, inYearOnly);

    SELECT LAST_INSERT_ID() INTO userLastInsertId;

    SELECT userLastInsertId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_add_subjects_to_class` (IN `inClassId` INT, IN `inSubjectId` INT)  BEGIN 
    INSERT INTO class_subjects (class_id, subject_id) VALUES (inClassId, inSubjectId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_add_todays_date_for_attendance` (IN `inDate` DATE)  BEGIN 
    DECLARE inDateId INT;

    SELECT todays_date_id 
    FROM todays_date
    WHERE date_value = inDate
    INTO inDateId;

    IF inDateId > 0 THEN 
        SELECT inDateId;
    ELSE 
        INSERT INTO todays_date (date_value) VALUES (inDate);
        SELECT LAST_INSERT_ID() INTO inDateId;
        SELECT inDateId;

    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_add_weekly_attendance_date` (IN `inStart` DATE, IN `inStop` DATE, IN `inWeeksAndDatesId` INT)  BEGIN

    UPDATE weeks_and_dates SET week_start = inStart, week_stop = inStop WHERE weeks_and_dates_id = inWeeksAndDatesId;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_add_weekly_general_date` (IN `inStart` DATE, IN `inStop` DATE, IN `inWeeksAndDatesId` INT)  BEGIN

    UPDATE weeks_and_dates SET week_start_g = inStart, week_stop_g = inStop WHERE weeks_and_dates_id = inWeeksAndDatesId;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_check_attendance_status` (IN `inClassId` INT, IN `inTodaysDate` DATE, IN `inTermId` INT, IN `inTodaydateId` INT)  BEGIN 
    SELECT attendance_status_id, morning, afternoon
    FROM attendance_status 
    WHERE class_id = inClassId AND 	today_date = inTodaysDate AND term_id = inTermId AND today_date_id = inTodaydateId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_check_class_subject_first` (IN `inClassId` INT, IN `inSubjectId` INT)  BEGIN
    DECLARE checkRowsCount INT; 

    SELECT count(*)
    FROM class_subjects
    WHERE class_id = inClassId AND subject_id = inSubjectId
    INTO checkRowsCount;

    IF checkRowsCount = 0 THEN
        SELECT 1;
    ELSE 
        SELECT -1;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_check_session_for_duplicates` (IN `inSessionDate` DATE, IN `inYearOnly` CHAR(4))  BEGIN 

    SELECT school_session_id 
    FROM school_session
    WHERE session_date = inSessionDate AND session_year = inYearOnly;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_delete_class` (IN `inClassId` INT)  BEGIN 
    DELETE FROM school_classes WHERE school_classes_id = inClassId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_delete_class_teacher` (IN `inClassId` INT)  BEGIN 
    DELETE FROM teacher_class WHERE class_id = inClassId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_delete_subject` (IN `inSubjectId` INT)  BEGIN
    DELETE FROM subjects WHERE subjects_id = inSubjectId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_delete_subject_from_class` (IN `inSubjectId` INT, IN `inClassId` INT)  BEGIN 
    UPDATE class_subjects 
    SET subject_status = 0 
    WHERE class_id = inClassId AND subject_id = inSubjectId;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_all_class_subjects` (IN `inClassId` INT)  BEGIN 
    SELECT class_id, subject_id, name
    FROM class_subjects 
    INNER JOIN subjects 
        ON class_subjects.subject_id = subjects.subjects_id
    WHERE subject_status = 1 AND class_id = inClassId
    ORDER BY subject_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_all_subjects` ()  BEGIN 
    SELECT subjects_id, name 
    FROM subjects 
    ORDER BY subjects_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_applicants_waiting_activation` (IN `inCurDate` DATE, IN `inActNumber` INT)  BEGIN
    SELECT status 
    FROM teachers 
    WHERE YEAR(created_on) = inCurDate AND status = inActNumber;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_classes_by_department` (IN `inDepartmentId` INT)  BEGIN 
    SELECT school_classes_id, class_name, department_id 
    FROM school_classes 
    WHERE department_id = inDepartmentId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_classes_list` ()  BEGIN
    SELECT school_classes_id, class_name, department_id
    FROM school_classes
    ORDER BY school_classes_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_current_admission_session` ()  BEGIN 
    SELECT school_session_id, session_date, session_year
    FROM school_session 
    ORDER BY school_session_id DESC LIMIT 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_current_term` ()  BEGIN 
    SELECT current_term 
    FROM admin_settings;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_department_by_classid` (IN `inClassId` INT)  BEGIN
    SELECT school_classes.department_id AS 'departmet_id', department.name AS 'department_name'
    FROM school_classes 
        INNER JOIN department 
            ON school_classes.department_id = department.department_id
    WHERE school_classes_id = inClassId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_specified_class_members_by_classid` (IN `inClassId` INT, IN `inTerm` VARCHAR(100), IN `inActiveStatus` INT)  BEGIN 
    SELECT class_id, student_id, firstname, surname, email, f_phone, admitted_on, reg_number
    FROM active_class ac 
        INNER JOIN applicants a 
            ON ac.student_id = a.applicants_id
    WHERE class_id = inClassId AND term_name = inTerm AND active_status = inActiveStatus
    ORDER BY a.gender ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_student_to_add_info` (IN `inEmail` VARCHAR(100))  BEGIN 

    SELECT applicants_id, firstname, surname, status, section, class_assigned, admitted_on, TIME_TO_SEC(applied_on) AS miSeconds 
    FROM applicants 
    WHERE email = inEmail;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_subjetc_list` ()  BEGIN
    SELECT subjects_id, name 
    FROM subjects
    ORDER BY subjects_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_teacher_assigned_classes` (IN `inTeacherId` INT)  BEGIN 
    SELECT tc.class_id, sc.class_name, dt.department_id, dt.name
    FROM teacher_class tc
        INNER JOIN school_classes sc 
            ON tc.class_id = sc.school_classes_id
	    INNER JOIN department dt
	        ON sc.department_id = dt.department_id
    WHERE teacher_id = inTeacherId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_termId_by_term_name` (IN `inTermName` VARCHAR(100))  BEGIN 
    SELECT term_id 
    FROM term 
    WHERE name = inTermName;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_term_startstop_date` (IN `inWeekDateId` INT)  BEGIN
    SELECT weeks_and_dates_id, DATE_FORMAT(week_start,'%M %d, %Y') AS 'term_start', DATE_FORMAT(week_stop,'%M %d, %Y') AS 'term_stop' FROM weeks_and_dates WHERE weeks_and_dates_id = inWeekDateId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_term_start_or_end_date` (IN `inWeekId` INT)  BEGIN

    SELECT weeks_and_dates_id, week_start, week_stop, week_what, week_start_g, week_stop_g
    FROM weeks_and_dates 
    WHERE weeks_and_dates_id = inWeekId;
        

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_the_current_year_for_listing` ()  BEGIN 
    SELECT admitted_on, YEAR(admitted_on) AS 'yearonly'
    FROM applicants 
    ORDER BY applicants_id DESC LIMIT 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_get_week_info` (IN `inTodayDate` DATE)  BEGIN
    SELECT weeks_and_dates_id, week_start, week_stop, week_what, week_start_g, week_stop_g
    FROM weeks_and_dates
    WHERE inTodayDate >= week_start_g AND inTodayDate <= week_stop_g;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_mark_student_activeStatus_to_zero` (IN `inActivezero` INT, IN `inStudentId` INT)  BEGIN 
    UPDATE active_class
    SET active_status = inActivezero
    WHERE student_id = inStudentId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_register_attendace` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inTodaysDate` DATE, IN `inTermId` INT, IN `inAttendanceValue` INT, IN `inAttendanceMark` CHAR(32))  BEGIN 
    DECLARE inAttendanceMarkId INT;

    IF inAttendanceMark = 'Morning' THEN

        
        CALL school_update_morning_attendance_for_class(inClassId, inTodaysDate, inAttendanceMark, inTermId, inTodaydateId);

        INSERT INTO fn_attendance (weekValue_id, student_id, class_id, todaysDate_id,  todaysDate, term_id, mark_m) VALUES (inWeekValuesid, inStudentId, inClassId,  inTodaydateId, inTodaysDate, inTermId, inAttendanceValue);

        SELECT LAST_INSERT_ID() INTO inAttendanceMarkId; 
        SELECT inAttendanceMarkId;
 
    ELSE 

        UPDATE fn_attendance 
        SET mark_a = inAttendanceValue
        WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId;

        CALL school_update_afternoon_attendance_for_class(inClassId, inTodaysDate, inTermId, inTodaydateId);
        
        SELECT fn_attendance_id
        FROM fn_attendance 
        WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId INTO inAttendanceMarkId;

        SELECT inAttendanceMarkId;

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_register_attendace_fp` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inTodaysDate` DATE, IN `inTermId` INT, IN `inAttendanceValue` INT, IN `inAttendanceMark` CHAR(32))  BEGIN 
    DECLARE inAttendanceMarkId INT;

    IF inAttendanceMark = 'Morning' THEN

        
        CALL school_update_morning_attendance_for_class(inClassId, inTodaysDate, inAttendanceMark, inTermId, inTodaydateId);

        INSERT INTO fp_attendance (weekValue_id, student_id, class_id, todaysDate_id,  todaysDate, term_id, mark_m) VALUES (inWeekValuesid, inStudentId, inClassId,  inTodaydateId, inTodaysDate, inTermId, inAttendanceValue);

        SELECT LAST_INSERT_ID() INTO inAttendanceMarkId; 
        SELECT inAttendanceMarkId;
 
    ELSE 

        UPDATE fp_attendance 
        SET mark_a = inAttendanceValue
        WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId;

        CALL school_update_afternoon_attendance_for_class(inClassId, inTodaysDate, inTermId, inTodaydateId);
        
        SELECT fp_attendance_id FROM fp_attendance WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId INTO inAttendanceMarkId;

        SELECT inAttendanceMarkId;

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_register_attendace_fs` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inTodaysDate` DATE, IN `inTermId` INT, IN `inAttendanceValue` INT, IN `inAttendanceMark` CHAR(32))  BEGIN 
    DECLARE inAttendanceMarkId INT;

    IF inAttendanceMark = 'Morning' THEN

        
        CALL school_update_morning_attendance_for_class(inClassId, inTodaysDate, inAttendanceMark, inTermId, inTodaydateId);

        INSERT INTO fs_attendance (weekValue_id, student_id, class_id, todaysDate_id,  todaysDate, term_id, mark_m) VALUES (inWeekValuesid, inStudentId, inClassId,  inTodaydateId, inTodaysDate, inTermId, inAttendanceValue);

        SELECT LAST_INSERT_ID() INTO inAttendanceMarkId; 
        SELECT inAttendanceMarkId;
 
    ELSE 

        UPDATE fs_attendance 
        SET mark_a = inAttendanceValue
        WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId;

        CALL school_update_afternoon_attendance_for_class(inClassId, inTodaysDate, inTermId, inTodaydateId);
        
        SELECT fs_attendance_id FROM fs_attendance WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId INTO inAttendanceMarkId;

        SELECT inAttendanceMarkId;

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_register_attendace_sn` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inTodaysDate` DATE, IN `inTermId` INT, IN `inAttendanceValue` INT, IN `inAttendanceMark` CHAR(32))  BEGIN 
    DECLARE inAttendanceMarkId INT;

    IF inAttendanceMark = 'Morning' THEN

        
        CALL school_update_morning_attendance_for_class(inClassId, inTodaysDate, inAttendanceMark, inTermId, inTodaydateId);

        INSERT INTO sn_attendance (weekValue_id, student_id, class_id, todaysDate_id,  todaysDate, term_id, mark_m) VALUES (inWeekValuesid, inStudentId, inClassId,  inTodaydateId, inTodaysDate, inTermId, inAttendanceValue);

        SELECT LAST_INSERT_ID() INTO inAttendanceMarkId; 
        SELECT inAttendanceMarkId;
 
    ELSE 

        UPDATE sn_attendance 
        SET mark_a = inAttendanceValue
        WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId;

        CALL school_update_afternoon_attendance_for_class(inClassId, inTodaysDate, inTermId, inTodaydateId);
        
        SELECT sn_attendance_id FROM sn_attendance WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId INTO inAttendanceMarkId;

        SELECT inAttendanceMarkId;

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_register_attendace_sp` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inTodaysDate` DATE, IN `inTermId` INT, IN `inAttendanceValue` INT, IN `inAttendanceMark` CHAR(32))  BEGIN 
    DECLARE inAttendanceMarkId INT;

    IF inAttendanceMark = 'Morning' THEN

        
        CALL school_update_morning_attendance_for_class(inClassId, inTodaysDate, inAttendanceMark, inTermId, inTodaydateId);

        INSERT INTO sp_attendance (weekValue_id, student_id, class_id, todaysDate_id,  todaysDate, term_id, mark_m) VALUES (inWeekValuesid, inStudentId, inClassId,  inTodaydateId, inTodaysDate, inTermId, inAttendanceValue);

        SELECT LAST_INSERT_ID() INTO inAttendanceMarkId; 
        SELECT inAttendanceMarkId;
 
    ELSE 

        UPDATE sp_attendance 
        SET mark_a = inAttendanceValue
        WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId;

        CALL school_update_afternoon_attendance_for_class(inClassId, inTodaysDate, inTermId, inTodaydateId);
        
        SELECT sp_attendance_id FROM sp_attendance WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId INTO inAttendanceMarkId;

        SELECT inAttendanceMarkId;

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_register_attendace_ss` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inTodaysDate` DATE, IN `inTermId` INT, IN `inAttendanceValue` INT, IN `inAttendanceMark` CHAR(32))  BEGIN 
    DECLARE inAttendanceMarkId INT;

    IF inAttendanceMark = 'Morning' THEN

        
        CALL school_update_morning_attendance_for_class(inClassId, inTodaysDate, inAttendanceMark, inTermId, inTodaydateId);

        INSERT INTO ss_attendance (weekValue_id, student_id, class_id, todaysDate_id,  todaysDate, term_id, mark_m) VALUES (inWeekValuesid, inStudentId, inClassId,  inTodaydateId, inTodaysDate, inTermId, inAttendanceValue);

        SELECT LAST_INSERT_ID() INTO inAttendanceMarkId; 
        SELECT inAttendanceMarkId;
 
    ELSE 

        UPDATE ss_attendance 
        SET mark_a = inAttendanceValue
        WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId;

        CALL school_update_afternoon_attendance_for_class(inClassId, inTodaysDate, inTermId, inTodaydateId);
        
        SELECT ss_attendance_id FROM ss_attendance WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId INTO inAttendanceMarkId;

        SELECT inAttendanceMarkId;

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_register_attendace_tn` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inTodaysDate` DATE, IN `inTermId` INT, IN `inAttendanceValue` INT, IN `inAttendanceMark` CHAR(32))  BEGIN 
    DECLARE inAttendanceMarkId INT;

    IF inAttendanceMark = 'Morning' THEN

        
        CALL school_update_morning_attendance_for_class(inClassId, inTodaysDate, inAttendanceMark, inTermId, inTodaydateId);

        INSERT INTO tn_attendance (weekValue_id, student_id, class_id, todaysDate_id,  todaysDate, term_id, mark_m) VALUES (inWeekValuesid, inStudentId, inClassId,  inTodaydateId, inTodaysDate, inTermId, inAttendanceValue);

        SELECT LAST_INSERT_ID() INTO inAttendanceMarkId; 
        SELECT inAttendanceMarkId;
 
    ELSE 

        UPDATE tn_attendance 
        SET mark_a = inAttendanceValue
        WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId;

        CALL school_update_afternoon_attendance_for_class(inClassId, inTodaysDate, inTermId, inTodaydateId);
        
        SELECT tn_attendance_id FROM tn_attendance WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId INTO inAttendanceMarkId;

        SELECT inAttendanceMarkId;

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_register_attendace_tp` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inTodaysDate` DATE, IN `inTermId` INT, IN `inAttendanceValue` INT, IN `inAttendanceMark` CHAR(32))  BEGIN 
    DECLARE inAttendanceMarkId INT;

    IF inAttendanceMark = 'Morning' THEN

        
        CALL school_update_morning_attendance_for_class(inClassId, inTodaysDate, inAttendanceMark, inTermId, inTodaydateId);

        INSERT INTO tp_attendance (weekValue_id, student_id, class_id, todaysDate_id,  todaysDate, term_id, mark_m) VALUES (inWeekValuesid, inStudentId, inClassId,  inTodaydateId, inTodaysDate, inTermId, inAttendanceValue);

        SELECT LAST_INSERT_ID() INTO inAttendanceMarkId; 
        SELECT inAttendanceMarkId;
 
    ELSE 

        UPDATE tp_attendance 
        SET mark_a = inAttendanceValue
        WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId;

        CALL school_update_afternoon_attendance_for_class(inClassId, inTodaysDate, inTermId, inTodaydateId);
        
        SELECT tp_attendance_id FROM tp_attendance WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId INTO inAttendanceMarkId;

        SELECT inAttendanceMarkId;

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_register_attendace_ts` (IN `inWeekValuesid` INT, IN `inStudentId` INT, IN `inClassId` INT, IN `inTodaydateId` INT, IN `inTodaysDate` DATE, IN `inTermId` INT, IN `inAttendanceValue` INT, IN `inAttendanceMark` CHAR(32))  BEGIN 
    DECLARE inAttendanceMarkId INT;

    IF inAttendanceMark = 'Morning' THEN

        
        CALL school_update_morning_attendance_for_class(inClassId, inTodaysDate, inAttendanceMark, inTermId, inTodaydateId);

        INSERT INTO ts_attendance (weekValue_id, student_id, class_id, todaysDate_id,  todaysDate, term_id, mark_m) VALUES (inWeekValuesid, inStudentId, inClassId,  inTodaydateId, inTodaysDate, inTermId, inAttendanceValue);

        SELECT LAST_INSERT_ID() INTO inAttendanceMarkId; 
        SELECT inAttendanceMarkId;
 
    ELSE 

        UPDATE ts_attendance 
        SET mark_a = inAttendanceValue
        WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId;

        CALL school_update_afternoon_attendance_for_class(inClassId, inTodaysDate, inTermId, inTodaydateId);
        
        SELECT ts_attendance_id FROM ts_attendance WHERE weekValue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inTodaysDate AND term_id = inTermId INTO inAttendanceMarkId;

        SELECT inAttendanceMarkId;

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_return_records_for_classId` (IN `inClassId` INT)  BEGIN 
    SELECT class_id FROM teacher_class WHERE class_id = inClassId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_set_registration_number` (IN `inRegnum` VARCHAR(100), IN `inStudentId` INT)  BEGIN 
    UPDATE applicants 
    SET reg_number = inRegnum
    WHERE applicants_id = inStudentId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_set_student_active_class` (IN `inClassId` INT, IN `inStudentId` INT, IN `inDate` DATE, IN `inTermName` VARCHAR(100))  BEGIN 
    INSERT INTO active_class (class_id, student_id, admitted_date, term_name) 
    VALUES (inClassId, inStudentId, inDate, inTermName);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_set_teachers_classes` (IN `inTeacherId` INT, IN `inClassId` INT)  BEGIN

    INSERT INTO teacher_class (teacher_id, class_id) 
    VALUES (inTeacherId, inClassId);


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_update_afternoon_attendance_for_class` (IN `inClassId` INT, IN `inTodaysDate` DATE, IN `inTermId` INT, IN `inTodaydateId` INT)  BEGIN 
        DECLARE inaStatusNow INT;

        SELECT attendance_status_id 
        FROM attendance_status
        WHERE class_id = inClassId AND today_date = inTodaysDate AND afternoon = 1 AND term_id = inTermId AND today_date_id = inTodaydateId INTO inaStatusNow;

        IF inaStatusNow > 0 THEN 
            SELECT inaStatusNow;
        ELSE
            UPDATE attendance_status
            SET afternoon = 1 
            WHERE class_id = inClassId AND today_date = inTodaysDate AND morning = 1 AND term_id = inTermId AND today_date_id = inTodaydateId;
        END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_update_morning_attendance_for_class` (IN `inClassId` INT, IN `inTodaysDate` DATE, IN `inAttendanceMark` CHAR(32), IN `inTermId` INT, IN `inTodaydateId` INT)  BEGIN
        DECLARE inStatusNow INT;

            SELECT attendance_status_id FROM attendance_status WHERE class_id = inClassId AND today_date = inTodaysDate AND morning = 1 AND term_id = inTermId AND today_date_id = inTodaydateId INTO inStatusNow;

        IF inAttendanceMark = 'Morning' AND inStatusNow > 0 THEN 
            SELECT inStatusNow;
        ELSE
            INSERT INTO attendance_status (class_id, today_date, morning, term_id, today_date_id) VALUES (inClassId, inTodaysDate, 1, inTermId, inTodaydateId);
            SELECT LAST_INSERT_ID() INTO inStatusNow;
            SELECT inStatusNow;
        END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_update_subjects_class_status` (IN `inClassId` INT, IN `inSubjectId` INT)  BEGIN 
    UPDATE class_subjects 
    SET subject_status = 1 
    WHERE class_id = inClassId AND subject_id = inSubjectId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `school_update_term_name` (IN `inTerm` VARCHAR(100), IN `inAdminSettingsId` INT)  BEGIN 
    UPDATE admin_settings 
    SET current_term = inTerm
    WHERE admin_settings_id = inAdminSettingsId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_add_product` (IN `inCartId` CHAR(32), IN `inProductId` INT, IN `inAttributes` VARCHAR(1000))  BEGIN
    DECLARE productQuantity INT;

    SELECT quantity
    FROM shopping_cart
    WHERE cart_id = inCartId AND product_id = inProductId AND attributes = inAttributes
    INTO productQuantity;

    IF productQuantity IS NULL THEN
        INSERT INTO shopping_cart (cart_id, product_id, attributes, quantity, added_on) VALUES (inCartId, inProductId, inAttributes, 1, NOW());
    ELSE
        UPDATE shopping_cart
        SET quantity = quantity + 1, buy_now = true
        WHERE cart_id = inCartId
        AND product_id = inProductId
        AND attributes = inAttributes;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_count_old_carts` (IN `inDays` INT)  BEGIN
    SELECT COUNT(cart_id) AS old_shopping_cart_count
    FROM (SELECT cart_id
            FROM shopping_cart
            GROUP BY cart_id
            HAVING DATE_SUB(NOW(), INTERVAL inDays DAY) >= MAX(added_on))
            AS old_cart;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_create_order` (IN `inCartId` CHAR(32), IN `inCustomerId` INT, IN `inShippingId` INT, IN `inTaxId` INT)  BEGIN
DECLARE orderId INT;

INSERT INTO orders (created_on, customer_id, shipping_id, tax_id) VALUES
(NOW(), inCustomerId, inShippingId, inTaxId);

SELECT LAST_INSERT_ID() INTO orderId;

INSERT INTO order_detail (order_id, product_id, attributes,
product_name, quantity, unit_cost)
SELECT orderId, p.product_id, sc.attributes, p.name, sc.quantity,
COALESCE(NULLIF(p.discounted_price, 0), p.price) AS unit_cost
FROM shopping_cart sc
INNER JOIN product p
ON sc.product_id = p.product_id
WHERE sc.cart_id = inCartId AND sc.buy_now;

UPDATE orders
SET total_amount = (SELECT SUM(unit_cost * quantity)
FROM order_detail
WHERE order_id = orderId)
WHERE order_id = orderId;

CALL shopping_cart_empty(inCartId);

SELECT orderId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_delete_old_carts` (IN `inDays` INT)  BEGIN
    DELETE FROM shopping_cart
    WHERE cart_id IN
                    (SELECT cart_id
                    FROM (SELECT cart_id
                          FROM shopping_cart
                          GROUP BY cart_id
                          HAVING DATE_SUB(NOW(), INTERVAL inDays DAY) >=
                                    MAX(added_on)) AS sc);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_empty` (IN `inCartId` CHAR(32))  BEGIN
    DELETE FROM shopping_cart WHERE cart_id = inCartId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_get_products` (IN `inCartId` CHAR(32))  BEGIN
    SELECT sc.item_id, p.name, sc.attributes,
            COALESCE(NULLIF(p.discounted_price, 0), p.price) AS price,
            sc.quantity,
            COALESCE(NULLIF(p.discounted_price, 0),
                p.price) * sc.quantity AS subtotal
    FROM shopping_cart sc
    INNER JOIN product p
            ON sc.product_id = p.product_id
    WHERE sc.cart_id = inCartId AND sc.buy_now;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_get_recommendations` (IN `inCartId` CHAR(32), IN `inShortProductDescriptionLength` INT)  BEGIN
    PREPARE statement FROM

    "SELECT od1.product_id, od1.product_name,
            IF(LENGTH(p.description) <= ?, p.description,
                CONCAT(LEFT(p.description, ?), '...')) AS description
    FROM order_detail od1
    JOIN order_detail od2
            ON od1.order_id = od2.order_id
    JOIN product p
            ON od1.product_id = p.product_id
    JOIN shopping_cart
            ON od2.product_id = shopping_cart.product_id
    WHERE shopping_cart.cart_id = ?
            AND od1.product_id NOT IN
            (SELECT product_id
            FROM shopping_cart
            WHERE cart_id = ?)
    GROUP BY od1.product_id
    ORDER BY COUNT(od1.product_id) DESC
    LIMIT 5";

    SET @p1 = inShortProductDescriptionLength;
    SET @p2 = inCartId;

    EXECUTE statement USING @p1, @p1, @p2, @p2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_get_saved_products` (IN `inCartId` CHAR(32))  BEGIN
    SELECT sc.item_id, p.name, sc.attributes,
            COALESCE(NULLIF(p.discounted_price, 0), p.price) AS price
    FROM shopping_cart sc
    INNER JOIN product p
            ON sc.product_id = p.product_id
    WHERE sc.cart_id = inCartId AND NOT sc.buy_now;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_get_total_amount` (IN `inCartId` CHAR(32))  BEGIN
    SELECT SUM(COALESCE(NULLIF(p.discounted_price, 0), p.price)
                * sc.quantity) AS total_amount
    FROM shopping_cart sc
    INNER JOIN product p
            ON sc.product_id = p.product_id
    WHERE sc.cart_id = inCartId AND sc.buy_now;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_move_product_to_cart` (IN `inItemId` INT)  BEGIN
    UPDATE shopping_cart
    SET buy_now = true, added_on = NOW()
    WHERE item_id = inItemId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_remove_product` (IN `inItemId` INT)  BEGIN
    DELETE FROM shopping_cart
    WHERE item_id = inItemId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_save_product_for_later` (IN `inItemId` INT)  BEGIN
    UPDATE shopping_cart
    SET buy_now = false, quantity = 1
    WHERE item_id = inItemId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_update` (IN `inItemId` INT, IN `inQuantity` INT)  BEGIN
    IF inQuantity > 0 THEN
        UPDATE shopping_cart
        SET quantity = inQuantity, added_on = NOW()
        WHERE item_id = inItemId;
    ELSE
        CALL shopping_cart_remove_product(inItemId);
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `student_get_pin_info` (IN `inPin` VARCHAR(100))  BEGIN 
    SELECT pin_id, pin 
    FROM admissionpin 
    WHERE pin = inPin;

END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `add_lesson_plan_1` (`mClassId` INT, `mSubjectId` INT, `mCurrentTermId` INT, `mTopic` VARCHAR(70), `mDuration` VARCHAR(70), `mGender` VARCHAR(70), `mMethodology` VARCHAR(70), `mPreviouseKnowledge` VARCHAR(70), `mTodayDate` DATE, `mBehaviouralObj` VARCHAR(200), `mInstructionalMtr` VARCHAR(200), `mInstructionalImages` VARCHAR(200)) RETURNS INT(11) BEGIN 

    DECLARE last_id_iserted INT;
    
    INSERT INTO lesson_plan (topic, time_duration, methodology, previous_knowledge, subject_id, term_id, class_id, date_added, gender, behaviouralObj, instructionalMtr, 	 instructionalImages) VALUES (mTopic, mDuration, mMethodology, mPreviouseKnowledge, mSubjectId, mCurrentTermId, mClassId, mTodayDate, mGender, mBehaviouralObj, mInstructionalMtr, mInstructionalImages);

    SELECT LAST_INSERT_ID() INTO last_id_iserted;


    RETURN(last_id_iserted);

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `add_lesson_plan_presentation_data` (`inLessonplanId` INT, `inIntroduction` VARCHAR(255), `inIntroNote` TEXT, `inDefinitionNote` TEXT, `inSubTopic_1` VARCHAR(255), `inSubTopic_1_body` TEXT, `inSubTopic_2` VARCHAR(255), `inSubTopic_2_body` TEXT, `inSubTopic_3` VARCHAR(255), `inSubTopic_3_body` TEXT, `inSummary` VARCHAR(255), `inSummary_body` TEXT) RETURNS INT(11) BEGIN 

    DECLARE last_id_iserted INT;

    UPDATE lesson_plan
    SET introduction = inIntroduction, 
        intronote = inIntroNote, 
        topic_define = inDefinitionNote, 
        subtopic1 = inSubTopic_1, 
        subtopic1body = inSubTopic_1_body, 
        subtopic2 = inSubTopic_2, 
        subtopic2body = inSubTopic_2_body, 
        subtopic3 = inSubTopic_3, 
        subtopic3body = inSubTopic_3_body, 
        pre_summary = inSummary, 
        pre_summarybody = inSummary_body
    WHERE lesson_plan_id = inLessonplanId;


    SELECT 1 INTO last_id_iserted;


    RETURN(last_id_iserted);

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `add_lesson_plan_summary` (`inLessonPlanId` INT, `inStudentsActivities` VARCHAR(255), `inEvaluation` VARCHAR(255), `inLessonPlanSummary` VARCHAR(255), `inConclusion` VARCHAR(255), `inAssignment` TEXT, `inReferences` VARCHAR(255), `inWeekId` INT) RETURNS INT(11) BEGIN 

    DECLARE last_id_iserted INT;
    
    UPDATE lesson_plan
    SET student_activities = inStudentsActivities, 
        evaluation = inEvaluation, 
        summary = inLessonPlanSummary, 
        conclusion = inConclusion, 
        assignment = inAssignment, 
        lpreferences = inReferences,
        week_id = inWeekId
    WHERE lesson_plan_id = inLessonplanId;


    SELECT 1 INTO last_id_iserted;

    RETURN(last_id_iserted);

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `admin_add_teacher_to_admin` (`inTeacherId` INT) RETURNS INT(11) BEGIN 
    
    INSERT INTO ndioga (teacher_id) VALUES (inTeacherId);
    RETURN  LAST_INSERT_ID();
    

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `admin_is_admin_email_duplicate` (`inEmail` VARCHAR(255)) RETURNS INT(11) BEGIN 
    DECLARE return_value INT;
      SELECT teachers_id
      FROM teachers
      WHERE email = inEmail AND status = 6 AND admin_type = 0 INTO return_value;
    IF return_value IS NULL THEN
        RETURN 0;
    ELSE
        RETURN(return_value);
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `admin_set_teacher_admin_type` (`inTeacherId` INT, `inAdminType` INT) RETURNS INT(11) BEGIN 
    
    UPDATE teachers 
    SET admin_type = inAdminType
    WHERE teachers_id = inTeacherId;
    RETURN 1;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `get_root_class_id` (`mClassId` INT) RETURNS INT(11) BEGIN 

    DECLARE last_id_iserted INT;
    
    SELECT source_id 
    FROM school_classes
    WHERE school_classes_id = mClassId INTO last_id_iserted;

    RETURN(last_id_iserted);

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `publish_lesson_plan` (`inLessonPlanId` INT, `inStatusCode` INT) RETURNS INT(11) BEGIN 

    DECLARE success_code INT;

    UPDATE lesson_plan
    SET publish = inStatusCode
    WHERE lesson_plan_id = inLessonplanId;


    SELECT 1 INTO success_code;

    RETURN(success_code);

  END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `roadstar_approve_request_to_print` (`inRequestId` INT) RETURNS INT(11) BEGIN 

    DECLARE return_value INT;
    
    UPDATE requested
    SET approve = 1
    WHERE requested_id = inRequestId;

    SELECT 1 INTO return_value;

    RETURN(return_value);

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `student_add_profile_custom_info` (`inStudentId` INT, `inTitle` VARCHAR(255), `inGoals` VARCHAR(255), `inObjectives` VARCHAR(255), `inSelf` VARCHAR(255)) RETURNS INT(11) BEGIN 

    DECLARE id_student INT;

      SELECT content_id
      FROM student_profile_content
      WHERE student_id = inStudentId INTO id_student;

    IF id_student IS NULL THEN

        INSERT INTO student_profile_content (student_id, title, goal, objectives, describe_self) VALUES (inStudentId, inTitle, inGoals, inObjectives, inSelf);

        SELECT LAST_INSERT_ID() INTO id_student;

        RETURN(id_student);

    ELSE

        UPDATE student_profile_content
        SET title = inTitle, goal = inGoals, objectives = inObjectives, describe_self = inSelf, sysdate = NOW()
        WHERE student_id = inStudentId;

        RETURN(id_student);

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `student_count_root_class` () RETURNS INT(11) BEGIN 

    DECLARE return_value INT;
    
    SELECT COUNT(class_source_id)
    FROM class_source INTO return_value;

    RETURN(return_value);

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `student_get_average_nry` (`inStudentId` INT, `inClassId` INT, `inTermId` INT) RETURNS INT(11) BEGIN 

    DECLARE return_value INT;
    
    SELECT average
    FROM nry_recordsforaverageandgtotal
    WHERE student_id = inStudentId AND class_id = inClassId AND term_id = inTermId
    INTO return_value;

    IF return_value IS NULL THEN 

        RETURN 0;
    ELSE
        RETURN(return_value);

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `student_get_average_pry` (`inStudentId` INT, `inClassId` INT, `inTermId` INT) RETURNS INT(11) BEGIN 

    DECLARE return_value INT;
    
    SELECT average
    FROM pry_recordsforaverageandgtotal
    WHERE student_id = inStudentId AND class_id = inClassId AND term_id = inTermId
    INTO return_value;

    IF return_value IS NULL THEN 

        RETURN 0;
    ELSE
        RETURN(return_value);

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `student_get_average_sec` (`inStudentId` INT, `inClassId` INT, `inTermId` INT) RETURNS INT(11) BEGIN 

    DECLARE return_value INT;
    
    SELECT average
    FROM sry_recordsforaverageandgtotal
    WHERE student_id = inStudentId AND class_id = inClassId AND term_id = inTermId 
    INTO return_value;

    IF return_value IS NULL THEN 

        RETURN 0;
    ELSE
        RETURN(return_value);

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `student_get_current_classid` (`inStudentId` INT) RETURNS INT(11) BEGIN 

    DECLARE classid_value INT;
    
    SELECT class_id
    FROM active_class
    WHERE student_id = inStudentId INTO classid_value;

    RETURN(classid_value);

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `student_in_active_classid` (`mStudentId` INT) RETURNS INT(11) BEGIN 

    DECLARE id_iserted INT;
    
    
    SELECT active_class_id 
    FROM active_class
    WHERE student_id = mStudentId
    INTO id_iserted;


    RETURN(id_iserted);

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `student_is_class_already_updated` (`inClassId` INT, `instudentId` INT) RETURNS INT(11) BEGIN 
 DECLARE return_value INT;
    
    SELECT class_id
    FROM active_class
    WHERE student_id = instudentId INTO return_value;

    IF return_value = inClassId THEN

      RETURN 0;
    ELSE 
     
      UPDATE active_class 
      SET class_id = inClassId
      WHERE student_id = instudentId;

      RETURN 1;
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `student_is_student_in_average_record_nry` (`inStudentId` INT, `inClassId` INT, `inTermId` INT) RETURNS INT(11) BEGIN 

    DECLARE return_value INT;
    
    SELECT rid
    FROM nry_recordsforaverageandgtotal
    WHERE student_id = inStudentId AND class_id = inClassId AND term_id = inTermId
    INTO return_value;

    IF return_value IS NULL THEN 

        RETURN 0;
    ELSE
        RETURN(return_value);

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `student_is_student_in_average_record_pry` (`inStudentId` INT, `inClassId` INT, `inTermId` INT) RETURNS INT(11) BEGIN 

    DECLARE return_value INT;
    
    SELECT rid
    FROM pry_recordsforaverageandgtotal
    WHERE student_id = inStudentId AND class_id = inClassId AND term_id = inTermId
    INTO return_value;

    IF return_value IS NULL THEN 

        RETURN 0;
    ELSE
        RETURN(return_value);

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `student_is_student_in_average_record_sec` (`inStudentId` INT, `inClassId` INT, `inTermId` INT) RETURNS INT(11) BEGIN 

    DECLARE return_value INT;
    
    SELECT rid
    FROM sry_recordsforaverageandgtotal
    WHERE student_id = inStudentId AND class_id = inClassId AND term_id = inTermId 
    INTO return_value;

    IF return_value IS NULL THEN 

        RETURN 0;
    ELSE
        RETURN(return_value);

    END IF;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `teacher_is_user_an_admin` (`inTeacherId` INT) RETURNS INT(11) BEGIN 

    DECLARE return_value INT;
    
    SELECT ndioga_id
    FROM ndioga
    WHERE teacher_id = inTeacherId INTO return_value;

    IF return_value IS NULL THEN 
        RETURN 0;
    ELSE
        RETURN(return_value);
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `un_publish_lesson_plan` (`inLessonPlanId` INT, `inStatusCode` INT) RETURNS INT(11) BEGIN 

    DECLARE success_code INT;

    UPDATE lesson_plan
    SET publish = inStatusCode
    WHERE lesson_plan_id = inLessonplanId;


    SELECT 1 INTO success_code;

    RETURN(success_code);

  END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `Update_Lesson_Note_By_Id` (`inLessonplanId` INT, `inIntroNote` TEXT, `inDefinitionNote` TEXT, `inSubTopic_1` VARCHAR(255), `inSubTopic_1_body` TEXT, `inSubTopic_2` VARCHAR(255), `inSubTopic_2_body` TEXT, `inSubTopic_3` VARCHAR(255), `inSubTopic_3_body` TEXT, `inSummary` VARCHAR(255), `inSummary_body` TEXT, `inEvaluation` VARCHAR(255)) RETURNS INT(11) BEGIN 

    DECLARE last_id_iserted INT;

    UPDATE lesson_plan
    SET intronote = inIntroNote, 
        topic_define = inDefinitionNote, 
        subtopic1 = inSubTopic_1, 
        subtopic1body = inSubTopic_1_body, 
        subtopic2 = inSubTopic_2, 
        subtopic2body = inSubTopic_2_body, 
        subtopic3 = inSubTopic_3, 
        subtopic3body = inSubTopic_3_body, 
        pre_summary = inSummary, 
        pre_summarybody = inSummary_body,
        evaluation = inEvaluation
    WHERE lesson_plan_id = inLessonplanId;

    SELECT 1 INTO last_id_iserted;

    RETURN(last_id_iserted);

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `active_class`
--

CREATE TABLE `active_class` (
  `active_class_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `admitted_date` date NOT NULL,
  `term_name` varchar(100) NOT NULL,
  `active_status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_class`
--

INSERT INTO `active_class` (`active_class_id`, `class_id`, `student_id`, `admitted_date`, `term_name`, `active_status`) VALUES
(2, 1, 31, '2020-05-11', 'Second Term', 1),
(11, 1, 32, '2020-05-12', 'Second Term', 1),
(12, 1, 33, '2020-05-12', 'Second Term', 1),
(13, 1, 34, '2020-05-12', 'Second Term', 1),
(14, 1, 35, '2020-05-13', 'Second Term', 0),
(15, 7, 40, '2020-08-29', 'Second Term', 1),
(16, 7, 41, '2020-08-29', 'Second Term', 1),
(17, 7, 42, '2020-08-29', 'Second Term', 1),
(18, 7, 43, '2020-08-29', 'Second Term', 1),
(19, 13, 47, '2020-08-29', 'Second Term', 1),
(20, 13, 46, '2020-08-29', 'Second Term', 1),
(21, 13, 48, '2020-08-29', 'Second Term', 1),
(22, 13, 49, '2020-08-29', 'Second Term', 1),
(23, 13, 54, '2020-08-29', 'Second Term', 1),
(24, 21, 61, '2020-08-29', 'Second Term', 1),
(25, 21, 60, '2020-08-29', 'Second Term', 1),
(26, 21, 59, '2020-08-29', 'Second Term', 1),
(27, 21, 58, '2020-08-29', 'Second Term', 1),
(28, 21, 57, '2020-08-29', 'Second Term', 1),
(29, 21, 56, '2020-08-29', 'Second Term', 1),
(30, 22, 62, '2020-08-29', 'Second Term', 1),
(31, 22, 63, '2020-08-29', 'Second Term', 1),
(32, 22, 64, '2020-08-29', 'Second Term', 1),
(33, 22, 65, '2020-08-29', 'Second Term', 1),
(34, 22, 66, '2020-08-29', 'Second Term', 1),
(35, 22, 67, '2020-08-29', 'Second Term', 1),
(36, 22, 68, '2020-08-29', 'Second Term', 1),
(37, 22, 69, '2020-08-29', 'Second Term', 1),
(38, 22, 70, '2020-08-29', 'Second Term', 1),
(39, 21, 71, '2020-08-29', 'Second Term', 1);

--
-- Triggers `active_class`
--
DELIMITER $$
CREATE TRIGGER `createmyClassArchive` BEFORE UPDATE ON `active_class` FOR EACH ROW BEGIN

        IF NEW.class_id IS NOT NULL AND OLD.class_id != NEW.class_id THEN

            INSERT INTO myclasses_archive (active_class_id, class_id, student_id, admitted_date, term_name, active_status) VALUES (OLD.active_class_id, OLD.class_id, OLD.student_id, OLD.admitted_date, OLD.term_name, OLD.active_status);

        END IF;

    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `admin_settings_id` int(11) NOT NULL,
  `current_term` varchar(100) DEFAULT NULL,
  `next_term_starts` date DEFAULT NULL,
  `admission_letter_body` varchar(32766) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`admin_settings_id`, `current_term`, `next_term_starts`, `admission_letter_body`) VALUES
(1, 'Second Term', '2021-02-09', 'You have been accepted into our prestigious program as an attachment student. In ISERV TECH we write code. However, unlike most software companies, we realize that\'s only part of the job. We don\'t just write code… We develop professional software. This is why our clients choose ISERV. Many companies can find programmers to generate code. However, few have the experience to produce professional quality software');

-- --------------------------------------------------------

--
-- Table structure for table `admissionpin`
--

CREATE TABLE `admissionpin` (
  `pin_id` int(11) NOT NULL,
  `pin` varchar(100) DEFAULT NULL,
  `used_by` int(11) DEFAULT NULL,
  `used_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admissionpin`
--

INSERT INTO `admissionpin` (`pin_id`, `pin`, `used_by`, `used_on`) VALUES
(1, '1234', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `applicants_id` int(11) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image4` varchar(100) NOT NULL,
  `birthcert` varchar(100) NOT NULL,
  `primarycert` varchar(100) DEFAULT NULL,
  `docreport` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `othername` varchar(100) NOT NULL DEFAULT 'none',
  `password` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `bloodgroup` char(32) DEFAULT NULL,
  `genotype` char(32) DEFAULT NULL,
  `allergies` char(32) DEFAULT NULL,
  `defects` varchar(100) DEFAULT NULL,
  `immunize` varchar(100) DEFAULT NULL,
  `docname` varchar(100) DEFAULT NULL,
  `docphone` varchar(100) DEFAULT NULL,
  `docaddress` varchar(100) DEFAULT NULL,
  `otherinfo` varchar(100) DEFAULT NULL,
  `f_fname` char(32) DEFAULT NULL,
  `f_lname` char(32) DEFAULT NULL,
  `f_phone` char(32) DEFAULT NULL,
  `f_office` varchar(100) DEFAULT NULL,
  `f_occupation` char(32) DEFAULT NULL,
  `f_religion` char(32) DEFAULT NULL,
  `f_address` varchar(100) DEFAULT NULL,
  `m_fname` char(32) DEFAULT NULL,
  `m_lname` char(32) DEFAULT NULL,
  `m_phone` char(32) DEFAULT NULL,
  `m_office` varchar(100) DEFAULT NULL,
  `m_occupation` char(32) DEFAULT NULL,
  `m_religion` char(32) DEFAULT NULL,
  `m_address` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `applied_on` datetime NOT NULL DEFAULT current_timestamp(),
  `section` char(32) NOT NULL,
  `class_assigned` int(11) DEFAULT NULL,
  `admitted_on` date DEFAULT NULL,
  `attest` int(11) DEFAULT 0,
  `reg_number` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`applicants_id`, `image1`, `image4`, `birthcert`, `primarycert`, `docreport`, `firstname`, `email`, `surname`, `othername`, `password`, `dob`, `gender`, `state`, `bloodgroup`, `genotype`, `allergies`, `defects`, `immunize`, `docname`, `docphone`, `docaddress`, `otherinfo`, `f_fname`, `f_lname`, `f_phone`, `f_office`, `f_occupation`, `f_religion`, `f_address`, `m_fname`, `m_lname`, `m_phone`, `m_office`, `m_occupation`, `m_religion`, `m_address`, `status`, `applied_on`, `section`, `class_assigned`, `admitted_on`, `attest`, `reg_number`) VALUES
(1, 'head_alizarin - Copy_100.png', 'head_alizarin - Copy_400.png', 'cert.jpg', 'none', 'gggoogle.png', 'Bilcosby', 'billcos190@gmail.com', 'Olatunde', 'Olafoma', '$2y$10$UpDidMHlYktz3/GxG4u/aOXnQyMMpiEalSw2Mq3evNqOl4uweqUDW', '2020-03-17', 1, 'Anambra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08132989016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-04 09:11:54', '', NULL, NULL, 0, NULL),
(2, 'head_alizarin - Copy_100.png', 'head_alizarin - Copy_400.png', 'officialLOGO.png', 'none', 'ISERV LOGO.png', NULL, NULL, NULL, 'none', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08065416343', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-04 09:20:12', '', NULL, NULL, 0, NULL),
(3, 'head_alizarin - Copy_100.png', 'head_alizarin - Copy_400.png', 'ISERV LOGO.png', 'none', 'gggoogle.png', NULL, NULL, NULL, 'none', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08132989089', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-04 09:34:54', '', NULL, NULL, 0, NULL),
(4, 'head_alizarin - Copy_100.png', 'head_alizarin - Copy_400.png', 'gggoogle.png', 'none', 'ISERV LOGO.png', NULL, NULL, NULL, 'none', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08065416356', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-04 10:01:51', '', NULL, NULL, 0, NULL),
(5, 'gggoogle_100.png', 'gggoogle_400.png', 'ISERV LOGO.png', 'none', 'officialLOGO2.png', NULL, NULL, NULL, 'none', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08132989034', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-04 10:21:02', '', NULL, NULL, 0, NULL),
(6, 'gggoogle_100.png', 'gggoogle_400.png', 'cert.jpg', 'none', 'ISERV LOGO.png', NULL, NULL, NULL, 'none', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08132989034', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-04 12:41:17', '', NULL, NULL, 0, NULL),
(7, 'head_alizarin - Copy_100.png', 'head_alizarin - Copy_400.png', 'gggoogle.png', 'none', 'ISERV LOGO.png', 'Greham', 'graham@gmail.com', 'Johnson', 'none', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08132989012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-04 12:53:55', '', NULL, NULL, 0, NULL),
(8, 'gggoogle_100.png', 'gggoogle_400.png', 'cert.jpg', 'none', 'ISERV LOGO.png', 'Tradeof', 'tradeof@gmail.com', 'Donejazy', 'olomwo', '$2y$10$iWUu/7souUbvwnQoimZcoe7QUgmJnq7oUHuFecTQLq8wNhV2aywwS', '2020-03-31', 1, 'Anambra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08132989045', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-04 13:26:51', '', NULL, NULL, 0, NULL),
(9, 'gggoogle_100.png', 'gggoogle_400.png', 'cert.jpg', 'none', 'gggoogle.png', 'Shema', 'shemato@gmail.com', 'Domarna', 'Othman', '$2y$10$EtZDXO6MKwTOo2Ydcmpt.udL3W41qmSyviCuYpLnzyB/ewBStm2ii', '2020-03-27', 1, 'Anambra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08065416309', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-04 13:57:38', '', NULL, NULL, 0, NULL),
(10, 'cert_100.jpg', 'cert_400.jpg', 'gggoogle.png', 'none', 'ISERV LOGO.png', 'Micheal', 'micheal@gmail.com', 'domabi', 'Othername', '$2y$10$lYK36/L9bIgdUvs67D2TvupF/J8FSMsuEw355RV.x40cohGBp9FQO', '2020-03-20', 1, 'Anambra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08132989012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-04 14:18:33', '', NULL, NULL, 0, NULL),
(11, 'cert_100.jpg', 'cert_400.jpg', 'gggoogle.png', 'none', 'cert.jpg', 'Ubanese', 'ubuia@gmail.com', 'tomato', 'sugar', '$2y$10$FjE/WCr2HxfR0UtMGzEBW.8zNsfMlW13BQ/jiXqcW5R14/bmHo5Ma', '2020-03-21', 1, 'Anambra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08132989012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-04 14:41:45', '', NULL, NULL, 0, NULL),
(12, 'cert_100.jpg', 'cert_400.jpg', 'cert.jpg', 'none', 'gggoogle.png', 'Ekom', 'ekom@gmil.com', 'Kenneth', 'mantus', '$2y$10$Cspwh3Ii0a89.A4Kibd.xupFWL49fgqV7dN7VJkMbJN3yBbM.1DAG', '2020-03-04', 1, 'Imo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08132989009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-04 15:31:20', '', NULL, NULL, 0, NULL),
(13, 'head_alizarin - Copy_100.png', 'head_alizarin - Copy_400.png', 'cert.jpg', 'none', 'gggoogle.png', 'Kom', 'kom@gmil.com', 'Edor', 'Nde', '$2y$10$ZyLCLUl5GCkR1n.R1Fnqs.p31CqKThjWIGrhhzK4LRg9oPF00R/P.', '2020-03-04', 1, 'Kebbi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08132989012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-04 16:00:30', '', NULL, NULL, 0, NULL),
(14, 'cert_100.jpg', 'cert_400.jpg', 'ISERV LOGO.png', 'none', 'gggoogle.png', 'Neato', 'neato@gmail.com', 'Surnaos', 'Pragmatic', '$2y$10$6Ocvh1n4NjRrT/iw6xUoY.gZb6EuXD03EDVUm7qAsyTVwbCODfoNq', '2020-03-11', 1, 'Akwa Ibom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08134878912', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-04 18:37:45', '', NULL, NULL, 0, NULL),
(15, 'gggoogle_100.png', 'gggoogle_400.png', 'ISERV LOGO.png', 'none', 'ISERV LOGO - Copy.png', 'sunday', 'sunday849@gmail.com', 'onwuchekwa', 'osudale', '$2y$10$rRdlPnDyN5SD0d0RtHtMpuC5BKxVTK802hZRB/LiYUcyg4wF/U3uq', '2020-03-14', 1, 'Anambra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08134878912', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-05 00:05:49', '', NULL, NULL, 0, NULL),
(16, 'gggoogle_100.png', 'gggoogle_400.png', 'gggoogle.png', 'none', 'gggoogle.png', 'Thankgod', 'thankgod427@gmail.com', 'lukeman', 'Suman', '$2y$10$SQqxTD1q/uQ2z7Yq.pkvSOIk33b49S.WluanVol58eGye.0Wy5PV2', '2020-03-20', 1, 'Anambra', 'A+', 'AS', 'none', 'none', 'none', 'Domebi', '08134878912', 'No. 487 Ahmadu Bello Way Katsina', 'none', 'Killae', 'Mnahy', '08134878912', 'No. 487 Ahmadu Bello Way Katsina', 'Occupation', 'islam', 'No. 487 Ahmadu Bello Way Katsina', 'Hannatu', 'Bashir', '08134878912', 'No. 487 Ahmadu Bello Way Katsina', 'wealth', 'islam', 'No. 487 Ahmadu Bello Way Katsina', 'Pending', '2020-03-05 04:06:09', '', NULL, NULL, 0, NULL),
(17, 'head_alizarin - Copy_100.png', 'head_alizarin - Copy_400.png', 'head_alizarin - Copy.png', 'none', 'cert.jpg', 'Daniel', 'daniel@gmail.com', 'Damascos', 'Oputa', '$2y$10$S33Do8Mdz6SZOcTz4YDJC.gnBmyUaHddUWMnHR5T74d7M/.UIIUkq', '2020-03-13', 1, 'Anambra', 'AB+', 'AA', 'none', 'none', 'none', 'Hamisu', '08132989012', 'No. 890 Ahmadu Shemsu Street London', 'none', 'Jamilo', 'laops', '08132989012', 'No. 890 Ahmadu Shemsu Street London', 'Police man', 'Islam', 'No. 890 Ahmadu Shemsu Street London', 'Jamans', 'Lopam', '08132989012', 'No. 890 Ahmadu Shemsu Street London', 'Chef', 'Islam', 'No. 890 Ahmadu Shemsu Street London', 'Pending', '2020-03-05 08:30:02', '', NULL, '2020-03-17', 0, NULL),
(18, 'head_alizarin - Copy_100.png', 'head_alizarin - Copy_400.png', 'cert.jpg', 'none', 'gggoogle.png', 'Sandason', 'sam29091@gmail.com', 'Copland', 'Lopamn', '$2y$10$xsA9QYm78IHCs9nZqQ00CO92xf.xmot52hKb7mCMiM1r1/UOnsL2S', '2020-03-13', 2, 'Ekiti', 'A+', 'AS', 'None', 'None', 'None', 'Jamila', '08132989012', 'No. 890 Ahmadu Shemsu Street London', 'None', 'Fatheland', 'Lastomas', '08132989012', 'No. 890 Ahmadu Shemsu Street London', 'Occupation', 'Ilams', 'No. 890 Ahmadu Shemsu Street London', 'bigmama', 'Lasgon', '08132989012', 'No. 890 Ahmadu Shemsu Street London', 'Janito', 'Islam', 'No. 890 Ahmadu Shemsu Street London', 'Pending', '2020-03-05 09:51:05', 'Nursery', NULL, NULL, 0, NULL),
(19, 'gggoogle_100.png', 'gggoogle_400.png', 'cert.jpg', 'ISERV LOGO - Copy.png', 'officialLOGO.png', 'Bandaras', 'bandara39@gmail.com', 'Oginsoya', 'Plato', '$2y$10$7R.66F8Gpb/iAcz0bKD6DuYSX4i9loawVbsvWwLxPrfD6J141xXry', '2020-03-12', 1, 'Ekiti', 'A+', 'AS', 'None', 'None', 'None', 'Mangal', '08132989012', 'No. 890 Ahmadu Shemsu Street London', 'None', 'Gascon', 'Lomaso', '08132989012', 'No. 890 Ahmadu Shemsu Street London', 'Police man', 'Islam', 'No. 890 Ahmadu Shemsu Street London', 'Koslao', 'lamaso', '08132989012', 'No. 890 Ahmadu Shemsu Street London', 'Seller woman', 'Islam', 'No. 890 Ahmadu Shemsu Street London', 'Pending', '2020-03-05 10:47:51', 'Primary', NULL, NULL, 0, NULL),
(20, 'head_alizarin - Copy_100.png', 'head_alizarin - Copy_400.png', 'cert.jpg', 'none', 'gggoogle.png', 'Colllins', 'hassan4@gmail.com', 'Erim', 'Abang', '$2y$10$D6NxoEw/sAGJ82B/2gkdIegrgvQvAnttxTqCCN1oZsYTzkD839WNa', '2020-03-05', 1, 'Kebbi', 'A+', 'AS', 'none', 'none', 'none', 'none', '08141620997', 'No.2 Kebbi rd Imo', 'none', 'Saint', 'Obi', '08065416377', 'No.3 Kebbi rd Imo', 'Business', 'Islam', 'Nagogo Kebbi rd', 'Oju', 'Hasin', '07037730085', 'No.3 Kebbi rd Imo', 'Business', 'Islam', 'Nagogo rd Imo', 'Admitted', '2020-03-05 14:52:44', 'Nursery', 0, '2020-03-17', 0, NULL),
(21, 'gggoogle_100.png', 'gggoogle_400.png', 'ISERV LOGO.png', 'ISERV LOGO - Copy.png', 'cert.jpg', 'Secondaryman', 'secodman@gmail.com', 'Surman', 'sugar', '$2y$10$elorzSm5yd8Oe.GoZ.d42eCH/ZePBkS59b9iTZcOniW37imEBP/G.', '2020-03-05', 1, 'Anambra', 'A+', 'AB', 'None', 'None', 'None', 'jAMILA', '08132989012', 'No. 890 Ahmadu Shemsu Street London', 'None', 'Hnamry', 'Lastman', '08132989012', 'No. 890 Ahmadu Shemsu Street London', 'Ocuuap', 'islam', 'No. 890 Ahmadu Shemsu Street London', 'Jumokoe', 'lopafbu', '08132989012', 'No. 890 Ahmadu Shemsu Street London', 'Okland', 'Islam', 'No. 890 Ahmadu Shemsu Street London', 'Pending', '2020-03-05 15:43:23', 'Secondary', NULL, NULL, 0, NULL),
(22, 'head_alizarin - Copy_100.png', 'head_alizarin - Copy_400.png', 'cert.jpg', 'none', 'gggoogle.png', 'Sardauna', 'Sardauna38@gmail.com', 'Bashir', 'Othman', '$2y$10$OncS1G/og/7XruWjIVveqOmh93j0.cR1RQnrayaLAPfz9OH9U8lCa', '2020-03-26', 2, 'Kano', 'A+', 'AS', 'None', 'None', 'None', 'Gambo', '08134898712', 'No. 476 Bash Street London UK', 'None', 'Hambali', 'Jabril', '08134898712', 'No. 476 Bash Street London UK', 'Politician', 'Islam', 'No. 476 Bash Street London UK', 'Maryam', 'Lasbash', '08134898712', 'No. 476 Bash Street London UK', 'Educator', 'Islam', 'No. 476 Bash Street London UK', 'Pending', '2020-03-07 15:56:47', 'Nursery', NULL, NULL, 0, NULL),
(23, 'head_alizarin - Copy_100.png', 'head_alizarin - Copy_400.png', 'cert.jpg', 'none', 'gggoogle.png', 'Paulson', 'paulson398@gmail.com', 'Solason', 'lopanm', '$2y$10$zdkcPlZKdOsyNryeS4VgG.3SkdNgm7oCgot1LA37PpxUboXPOzPzK', '1983-08-20', 2, 'Kano', 'A+', 'AB', 'None', 'None', 'None', 'Zaibab', '08134898712', 'No. 476 Bash Street London UK', 'None', 'Jamio', 'kosman', '08134898712', 'No. 476 Bash Street London UK', 'Loverrman', 'islam', 'No. 476 Bash Street London UK', 'Hajara', 'lamnam', '08134898712', 'No. 476 Bash Street London UK', 'Cook', 'Islaam', 'No. 476 Bash Street London UK', 'Pending', '2020-03-07 16:11:57', 'Nursery', NULL, NULL, 0, NULL),
(24, 'head_alizarin - Copy_100.png', 'head_alizarin - Copy_400.png', 'cert.jpg', 'none', 'gggoogle.png', 'Shamsiyya', 'shamsiyya@gmail.com', 'Amadu', 'Asiyya', '$2y$10$/1OcHLLPv9tYMWOYD6LZrOgpTBenBbHo7/mnzkcEzyu72sbpvr0Tq', '2020-03-14', 2, 'Kano', 'A+', 'AS', 'none', 'none', 'none', 'Asmau', '09031893289', 'Federal Medical Center Katsina', 'None', 'Hamdola', 'kolmanb', '09034891234', 'No fant road Abuja', 'Police', 'Islam', 'Behind Katsina Guest in', 'Madam', 'Loversman', '09034129098', 'No. 938 Away street london', 'Motorrist', 'Islam', 'Madonna road lagos Nigeria', 'Admitted', '2020-03-13 03:30:05', 'Primary', 8, '2020-05-09', 0, NULL),
(25, 'head_alizarin - Copy_100.png', 'head_alizarin - Copy_400.png', 'gggoogle.png', 'None', 'ISERV LOGO.png', 'Jacobson', 'jacobson1212@gmail.com', 'Markmorison', 'Otherman', '$2y$10$273P51PW4T3SjtislyTkguW21ql319dkpW7GZFQLS1V1yMJSEFGqW', '2014-03-31', 1, 'Anambra', 'A+', 'AS', 'None', 'None', 'None', 'Sanusi', '09034812390', 'Federal Medical Center ', 'None', 'Kalman', 'Youthman', '08123490912', 'Kankian road Jibia Katsia', 'Broker', 'Islam', 'Mannila plaza Kano', 'Madamj', 'Lastwoman', '08134891209', 'No. 49 Ahmadu Bello way Katsina', 'Banker', 'Islam', 'Snow Treet London ', 'Admitted', '2020-03-18 11:02:52', 'Primary', 9, '2020-03-18', 0, NULL),
(26, 'head_alizarin - Copy_100.png', 'head_alizarin - Copy_400.png', 'cert.jpg', 'None', 'gggoogle.png', 'Utu', 'madamcollins4@gmail.com', 'Peter', 'Banky', '$2y$10$F5b2HTBgisiNh6cWsa0Tw.t1Shx4pBGWAoGBm1Ee89gx8Fg5pe2J6', '2010-02-03', 1, 'Anambra', 'A+', 'AS', 'None', 'None', 'None', 'King', '08065416377', 'No 22.Awolowo Road IMO', 'None', 'Man', 'King', '08141620997', 'No 22.Awolowo Road IMO', 'Business', 'Islam', 'No 22.Awolowo Road IMO', 'Queen', 'Blessing', '08141620997', 'No 22.Awolowo Road IMO', 'Business', 'Islam', 'No 22.Awolowo Road IMO', 'Admitted', '2020-03-18 17:16:51', 'Primary', 0, '2020-03-18', 0, NULL),
(27, 'head_alizarin - Copy_400.png', 'head_alizarin - Copy_100.png', 'cert_400.jpg', NULL, 'gggoogle_400.png', 'Gomez', 'gomaze@gmail.com', 'Handler', 'Palman', '9b98ebef6996ffd57b2a1aebd216108453cf8631', '1996-01-01', 1, 'Cross River', 'A+', 'AS', 'None', 'None', 'None', 'Hamza', '09134812091', 'No. 748 Augusta road Kano', 'None', 'Jamla', 'Loomus', '08134891209', 'No. 378 Ahmadu Bello Way Katsin State', 'Policeman', 'Islam', 'No. 378 Ahmadu Bello Way Katsin State', 'Herther', 'Momwoman', '09038129081', 'No. 378 Ahmadu Bello Way Katsin State', 'Gardner', 'Islam', 'No. 378 Ahmadu Bello Way Katsin State', 'Pending', '2020-03-29 10:36:47', '', NULL, NULL, 1, NULL),
(28, 'head_alizarin - Copy_400.png', 'head_alizarin - Copy_100.png', 'gggoogle_400.png', NULL, 'ISERV LOGO_400.png', 'Fruitfull', 'fruitfull@gmail.com', 'Onyeka', 'Neato', '5abfa36326f296ec454b8baf2b339362d3b7b4e2', '1997-02-12', 2, 'Kwara', 'A+', 'AS', 'None', 'None', 'None', 'Dashman', '09039102901', 'No. 748 Ahmadu Nello Way ', 'None', 'Hansomeman', 'Lonewinner', '09034828281', 'Student applicant should not that ', 'Police', 'Islam', 'Student applicant should not that ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2020-03-29 18:38:21', '', NULL, NULL, 0, NULL),
(29, 'head_alizarin - Copy_400.png', 'head_alizarin - Copy_100.png', 'ISERV LOGO - Copy_400.png', NULL, 'cert_400.jpg', 'Alejandro', 'alhandro@gmail.com', 'Perez', 'Organicman', '8d0485b07f7b131da851ec50afb08dfde9d1f900', '1995-06-06', 2, 'Kwara', 'A+', 'AS', 'None', 'None', 'None', 'Hamza', '08132375651', 'No. 398 Ahmadu Bello Way Katsina', 'None', 'Handyson', 'Marison', '08132375651', 'No. 398 Ahmadu Bello Way Katsina', 'Policeman', 'Islam', 'No. 398 Ahmadu Bello Way Katsina', 'Kimany', 'Company', '08132375651', 'No. 398 Ahmadu Bello Way Katsina', 'Police', 'Islam', 'No. 398 Ahmadu Bello Way Katsina', 'Pending', '2020-03-30 03:19:33', 'Nursery', NULL, NULL, 1, NULL),
(30, 'gggoogle_400.png', 'gggoogle_100.png', '2CLICK LOGO_400.jpg', 'cert_400.jpg', 'ISERV LOGO_400.png', 'Billings', 'billings@gmail.com', 'Way', 'Oregun', 'd59e323d8cb9aaff79f9380aa8fce8892c263455', '1962-05-13', 2, 'Kano', 'A+', 'AS', 'None', 'None', 'None', 'Fancy', '08132375651', 'No. 398 Ahmadu Bello Way Katsina', 'None', 'Gillbert', 'Daura', '08132375651', 'No. 398 Ahmadu Bello Way Katsina', 'Banker', 'Islam', 'No. 398 Ahmadu Bello Way Katsina', 'Farida', 'Gomez', '08132375651', 'No. 398 Ahmadu Bello Way Katsina', 'Shooper', 'Islam', 'No. 398 Ahmadu Bello Way Katsina', 'Pending', '2020-03-30 06:04:48', 'Secondary', NULL, NULL, 1, NULL),
(31, 'pass_400.jpg', 'pass_100.jpg', 'cert_400.jpg', NULL, 'iserv2_400.png', 'Eightman', 'eightman@gmail.com', 'Sailson', 'Aisha', '6aa323ad21dab34c98e77379ad8204c2261aeaa6', '1964-05-17', 1, 'Katsina', 'A+', 'AS', 'None', 'None', 'None', 'Benzane', '09032189098', 'Shop 49 Ahmadu Bello Way Katsina', 'None', 'Gamsome', 'Lasdon', '08132489098', 'Oluomo 78 Game street lagos', 'Policeman', 'Islam', 'Kwanwaso road France roas Ojo lagos', 'Franca', 'Ibeto', '08134787612', 'Ukalele street Japan', 'Banker', 'Islam', 'Kimono street No.90 opposite 7up ', 'Admitted', '2020-05-10 23:22:40', 'Nursery', 1, '2020-05-11', 1, '01M653/31/84160'),
(32, 'pass_400.jpg', 'pass_100.jpg', 'cert_400.jpg', NULL, 'iserv2_400.png', 'Arthur', 'bokoharam@gmail.com', 'Nzeribe', 'BokoHaram', '25f832f5d0fa46d251b68d98f4c7b3ce2b191577', '1978-10-24', 2, 'Katsina', 'AB+', 'AS', 'None', 'None', 'None', 'Gandoki', '09032675456', 'Federal Medical Katsina', 'None', 'Fadaman', 'Fadalast', '08032395450', 'No. 90 Aminu Bello Masary Drive Ojota Lagos', 'Banker', 'Islam', 'No. 90 Aminu Bello Masary Drive Ojota Lagos', 'Fatima', 'Jibia', '09032675456', 'No. 90 Aminu Bello Masary Drive Ojota Lagos', 'Ballerina', 'Islam', 'No. 90 Aminu Bello Masary Drive Ojota Lagos', 'Admitted', '2020-05-12 16:01:02', 'Nursery', 1, '2020-05-12', 1, 'VYDQH2/32/57662'),
(33, 'pass_400.jpg', 'pass_100.jpg', 'iserv5_400.png', NULL, 'pass_400.jpg', 'Happiness', 'happiness@gmail.com', 'Computer', 'Prankstar', 'cbd3036d2728e28b441b2cc545c90f052cdfd92e', '1990-05-13', 1, 'Kwara', 'AB+', 'AS', 'None', 'None', 'None', 'Tamila', '08134899090', 'No. 90 Aminu Bello Masary Drive Ojota Lagos', 'None', 'Fatherland', 'Eastman', '09032675456', 'Student applicant should not that they will be tested the', 'Policeman', 'Islam', 'Student applicant should not that they will be tested the', 'Hannadez', 'Komole', '08032395450', 'Address must be a valid residencial address', 'Jumia Agent', 'Islam', 'Invalid phone number cannot be accepted', 'Admitted', '2020-05-12 18:36:07', 'Nursery', 1, '2020-05-12', 1, 'W247UC/33/66967'),
(34, 'pass_400.jpg', 'pass_100.jpg', 'cert_400.jpg', NULL, 'iserv6_400.jpg', 'Morroco', 'morocco@gmail.com', 'Nwamaduka', 'Kinsly', '6200d434d81fdf065dc8c323a54d3801dc81daf6', '2000-01-30', 1, 'Kaduna', 'AB+', 'AS', 'None', 'None', 'None', 'Fatima', '08032395450', 'Student applicant should not that they will be tested the', 'None', 'Hamada', 'Caepet', '09032675456', 'Student applicant should not that they will be tested the', 'Registrar', 'Islam', 'Create an email address for each registratio', 'Jamila', 'Nagudu', '08032395450', 'Invalid phone number cannot be accepted', 'Hair Dresser', 'Islam', 'No. 45 and gmail is preferable', 'Admitted', '2020-05-12 23:37:02', 'Nursery', 1, '2020-05-12', 1, '64OLPI/34/85022'),
(35, 'pass_400.jpg', 'pass_100.jpg', 'cert_400.jpg', NULL, 'iserv2_400.png', 'Tosin', 'tosin@gmail.com', 'Barbar', 'Kamsuma', '97cc33fc5a27ab6bc3765ada20baada3d10a245d', '2002-01-07', 2, 'Lagos', 'AB+', 'AS', 'None', 'None', 'None', 'Gandoki', '08134891289', 'Gonfu street lagos Nigeria', 'None', 'Hamsa', 'Salisu', '08189217832', 'Offiece 38 Bandel street Kano', 'Public servent', 'Islam', 'Jami stroke island Lagos ', 'Motason', 'Komsuna', '08134891287', 'Opposite Jumia lagos market', 'Banker', 'Islam', 'Notherlad market Ojo Lagos ', 'Admitted', '2020-05-13 17:27:47', 'Nursery', 1, '2020-05-13', 1, '7PBUZG/35/62867'),
(36, 'girls2_400.png', 'girls2_100.png', 'cert_400.jpg', NULL, 'iserv1_400.png', 'Onyinye', 'onyinye4real@gmail.com', 'Chukwuka', 'Ojukwu', '493777fbbd2b16d98beedb4cbd2a3374e2cdc470', '2000-01-03', 2, 'Anambra', 'AB+', 'AS', 'None', 'None', 'None', 'Hana', '09134787654', 'Kangiwa road, off Maidabino yurghurt GRA Katsina State.', 'None', 'Chukwu', 'Fadama', '09134678712', 'Kangiwa road, off Maidabino yurghurt GRA Katsina State.', 'Doctor', 'Christianity', 'Kangiwa road, off Maidabino yurghurt GRA Katsina State.', 'Anozie', 'Goria', '08134784567', 'Kangiwa road, off Maidabino yurghurt GRA Katsina State.', 'Nurse', 'Islam', 'Kangiwa road, off Maidabino yurghurt GRA Katsina State.', 'Pending', '2020-10-03 20:10:07', 'Primary', NULL, NULL, 1, NULL),
(37, 'boy1_400.png', 'boy1_100.png', 'cert_400.jpg', NULL, 'Program-Participation-Certificate_400.jpg', 'Benjamin', 'bennetan@gmail.com', 'Netanyahu', 'Chukwuebuka', 'ace440c3e15ebb3693f399eb5ffbe511b5b5d611', '1996-06-12', 1, 'Anambra', 'A+', 'AA', 'None', 'None', 'None', 'Hamza', '08038124578', 'Styles road GRA Katsina State', 'None', 'Frank', 'Moses', '09128901122', 'Komda road behind Jibia Tank', 'Police Man', 'Islam', 'Coplan Quater Inwala Kano state', 'MarryAnn', 'Moses', '08132894378', 'Kosofo lagos Sate ', 'Politician', 'Islam', 'Las vegas neveda USA ', 'Pending', '2020-10-05 09:58:52', 'Primary', NULL, '2020-11-21', 1, NULL),
(38, 'boy1_400.png', 'boy1_100.png', 'Program-Participation-Certificate_400.jpg', NULL, 'iserv2_400.png', 'Biden', 'brtennetan@gmail.com', 'Netanyahu', 'Netanyahu', '$2y$10$1p31OxkwO54E/1P9.lh5Ru.nCdL9o2z36KOH9s5qJMsA0U/nbYkKe', '2003-06-10', 1, 'Anambra', 'A+', 'AA', 'None', 'None', 'None', 'Shamsiyya', '09137287182', 'Bif road Oregun Lagos', 'None', 'Joel', 'Ladderman', '09139103918', 'Gumsong Avenue Oregun lagos State Nigeria', 'Medical Doctor', 'Christianity', 'House No. 903 Tomato Quarters Katsina', 'Jully', 'Ladderman', '08134982343', 'Office block No. 48 yoruba town Kaduna State', 'Civil Servant', 'Islam', 'Koffoto quaters off julius Beggaer Plant Jos', 'Pending', '2020-10-05 13:27:50', 'Primary', NULL, NULL, 1, NULL),
(39, 'boy2_400.png', 'boy2_100.png', 'iserv6_400.jpg', NULL, 'iserv2_400.png', 'Bishir', 'bishir78@gmail.com', 'Manson', 'Usman', '$2y$10$2zbYY0CJv0CJJ71xv/1VQeZ4JZJ6keLdPv10UYp.ermBQ7x.Rwqeu', '1995-11-22', 1, 'Kaduna', 'A+', 'AA', 'None', 'None', 'None', 'Jummai', '09199882212', 'Kofar kaura katsina ', 'None', 'Handman', 'Fanta', '09089783234', 'Klose street Lagos Nigeria', 'Trainer', 'Islam', 'faka road GRA Katsina', 'Yonne', 'Yaude', '09034787877', 'Kimsi road quarter Katsina', 'Trainer', 'Islam', 'Handfu road street Lagos', 'Admitted', '2020-10-05 15:12:14', 'Primary', 7, '2020-10-05', 1, NULL),
(40, 'stu1_400.png', 'stu1_100.png', 'iserv2_400.png', NULL, 'iserv3_400.png', 'Fatima', 'kabirfat@gmail.com', 'Kabir', 'Jumai', '$2y$10$oXu.xkFaeZPtifhhm1W5fOy5DInT8z375SSupM15g8W9AYtPygyCW', '2009-10-13', 2, 'Kano', 'A+', 'AA', 'None', 'None', 'None', 'Hank', '09178217832', 'Anything street Katsina state', 'None', 'Kabir', 'Mohammedu', '09134899123', 'Jumia quarters Kaduna Nigeria. ', 'Civil Servant', 'Islam', 'Koko estate Kaduna State', 'Maryam', 'Samira', '09034818923', 'Kimberber square Kaduna road', 'Nurse', 'Islam', 'Jamila road min estate Lagos Nigeria', 'Admitted', '2020-10-06 15:23:59', 'Primary', 7, '2020-10-06', 1, '9Y238J/40/55439'),
(41, 'stu3_400.png', 'stu3_100.png', 'Program-Participation-Certificate_400.jpg', NULL, 'iserv5_400.png', 'Oliva', 'inno67liva@gmail.com', 'Innoson', 'Decent', '$2y$10$Q.K7dqRjsP1Vw1rGr1uRje.lSm7d5W5UsqQayH61Uj7eJbGJYsVoa', '2004-06-08', 1, 'Cross River', 'A+', 'AA', 'None', 'None', 'None', 'Collins', '07037730085', 'Nagogo rd katsina', 'None', 'Erim', 'Ekom', '09097009602', 'Goruba rd katsina', 'Civil servant', 'Islam', 'Nde3corners katsina', 'Abaji', 'Atila', '08141620997', 'Edor2corners katsina', 'Civil Servant', 'Islam', 'Edor2corners katsina', 'Admitted', '2020-10-06 15:39:55', 'Primary', 7, '2020-10-06', 1, '293813/41/56395'),
(42, 'stu2_400.png', 'stu2_100.png', 'Program-Participation-Certificate_400.jpg', NULL, 'iserv5_400.png', 'Imegiaku', 'imegiakujovi62@gmail.com', 'Jovitas', 'Ada', '$2y$10$YR.Y8U2.vYymqoX/4UeuN.79mmhrlCebK4C6fRK/HETXrv3qv0EW6', '2010-05-03', 1, 'Borno', 'A+', 'AS', 'None', 'None', 'None', 'Blessing', '07037730085', 'Cy Junction kebbi', 'None', 'Gorge', 'Man', '08141620997', 'Lagos Island Lagos State', 'Army', 'Islam', 'Lagos Island Lagos State', 'Comfort', 'Caro', '09097009602', 'No2 Ikom 4corners Cross River', 'Civil Servant', 'Christian', 'No2 Ikom 4corners Cross River', 'Admitted', '2020-10-06 15:58:37', 'Primary', 7, '2020-10-06', 1, 'VV78SY/42/57517'),
(43, 'stu4_400.png', 'stu4_100.png', 'iserv5_400.png', NULL, 'iserv4_400.png', 'Ugonna', 'ugonnaking89@gmail.com', 'Kingsley', 'Lizzy', '$2y$10$mCMsXy99dpx5uBIAl3Xbzuxc/pDgXPO4jVDNsYtwilPraA4KnohJK\r\n', '1982-05-04', 1, 'Lagos', 'A', 'AS', 'None', 'None', 'None', 'Lane', '08141602997', 'Katsina Motel Katsina', 'None', 'King', 'Roy', '07037730085', 'Katsina Tourist Lodge Katsina', 'Civil Servant', 'Islam', 'Katsina Tourist Lodge Katsina', 'Juliet', 'Loveth', '09097009062', 'Yahaya Madaki way katsina', 'Civil Servant', 'Islam', 'Yahaya Madaki way katsina', 'Admitted', '2020-10-06 16:21:03', 'Primary', 7, '2020-10-06', 1, 'L2T18D/43/58863'),
(45, 'pass_400.png', 'pass_100.png', 'iserv5_400.png', 'cert_400.jpg', 'iserv1_400.png', 'Emeka', 'ugofirst@gmail.com', 'Ifeosonna', 'Charles', '$2y$10$D6TOpxl1ae3.QIBiD2Ni5OReLd6HM5sTwlzIUXd7y1RW/2WvzM6ry', '2003-01-06', 1, 'Kano', 'A+', 'AA', 'None', 'None', 'None', 'Dauda', '09078347777', 'Kim tom road Lagos Nigeria', 'None', 'Folarunsho', 'Omole', '08134767611', 'Nonestom Part avenue Kano State', 'Mid wife', 'Islam', 'Nonestom Part avenue Kano State', 'Hanna', 'Omole', '09134772218', 'Nonestom Part avenue Kano State', 'Police', 'Islam', 'Nonestom Part avenue Kano State', 'Pending', '2020-10-10 04:09:31', 'Secondary', NULL, NULL, 1, NULL),
(46, 'sec2_400.png', 'sec2_100.png', 'Program-Participation-Certificate_400.jpg', 'cert_400.jpg', 'iserv6_400.jpg', 'Godswill', 'godswilluzoks5@gmail.com', 'Uzoka', 'Uzoka', '$2y$10$jyE6qGd01Gkj8PMuzUTQmejBALuJtVbMsDxW7BdGXFyTQsihU1Wye', '2007-06-12', 1, 'Ogun', 'A+', 'AA', 'None', 'None', 'None', 'Fantasie', '09034899053', 'Okoro street Lagos Nigeria', 'None', 'Mongolia', 'Shamoski', '09134812318', 'Pailin avanue No. 39 Osolo lane Lagos Nigeria', 'Civil Servant', 'Islam', 'Pailin avanue No. 39 Osolo lane Lagos Nigeria', 'Palina', 'Garbas', '08134892356', 'Pailin avanue No. 39 Osolo lane Lagos Nigeria', 'Civil Servant', 'Islam', 'Pailin avanue No. 39 Osolo lane Lagos Nigeria', 'Admitted', '2020-10-11 10:58:39', 'Secondary', 13, '2020-10-12', 1, 'XS98O5/46/39519'),
(47, 'sec4_400.png', 'sec4_100.png', 'Program-Participation-Certificate_400.jpg', 'cert_400.jpg', 'iserv6_400.jpg', 'Ifenyinwa', 'ify67assorted@gmail.com', 'Ahanna', 'Ahanna', '$2y$10$scyl953UNJZLpbHGKNRVquSY5NLYPzHVqpwzf0zLw3cNlxDveaGbm', '2014-02-05', 1, 'Kebbi', 'A+', 'AA', 'None', 'None', 'None', 'Gombe', '09034776765', 'Jumoke crescent ojoelegwa road Lagos State', 'None', 'Daniel', 'Frostland', '09032184566', 'Gonados road GRA Lagos State', 'Civil Servant', 'Islam', 'Gonados road GRA Lagos State', 'Mattarazi', 'Shofar', '09034591200', 'Gonados road GRA Lagos State', 'Civil servant', 'Islam', 'Gonados road GRA Lagos State', 'Admitted', '2020-10-12 12:33:35', 'Secondary', 13, '2020-10-12', 1, '9GGI81/47/45215'),
(48, 'stu4_400.png', 'stu4_100.png', 'Program-Participation-Certificate_400.jpg', 'cert_400.jpg', 'iserv6_400.jpg', 'Billcot', 'billcoss56@gmail.com', 'Ezeagu', 'Ezeagu', '$2y$10$orRDmu1/n13TwYAJCPHNduzX3A/7FsbjJ.M3aPSCJBovF6hKD9sfS', '2011-02-02', 1, 'Kwara', 'A+', 'AA', 'None', 'None', 'None', 'Somma', '09034819921', 'Jummia street No. 78 Olu road Katsina State', 'None', 'Tiarra', 'Weroni', '09031454489', 'Jummia street No. 78 Olu road Katsina State', 'Civil Servant', 'Islam', 'Jummia street No. 78 Olu road Katsina State', 'Adejumoke', 'Olopeju', '09032121198', 'Jummia street No. 78 Olu road Katsina State', 'Civil Sevant', 'Islam', 'Jummia street No. 78 Olu road Katsina State', 'Admitted', '2020-10-12 14:18:23', 'Secondary', 13, '2020-10-12', 1, '29XXI8/48/51503'),
(49, 'girls2_400.png', 'girls2_100.png', 'iserv2_400.png', 'iserv1_400.png', 'iserv3_400.png', 'Ruth', 'ademoruth@gmail.com', 'Ademolola', 'Ademolola', '$2y$10$Ob8VA7fTy1Deo8V30ViduOOnUFHedgCEvWXD2wvP7Hwnef6r8utpa', '2009-07-30', 1, 'Zamfara', 'A+', 'AA', 'None', 'None', 'None', 'Haifa', '09031293454', 'Haifa street GRA Zamfara State ', 'None', 'Ademorut', 'Billford', '08134771190', 'Hunderwood avenue, Bill quarters Lagos Nigeria', 'Civil Servant', 'Islam', 'Hunderwood avenue, Bill quarters Lagos Nigeria', 'Hummer', 'Daoraty', '08032334891', 'Hunderwood avenue, Bill quarters Lagos Nigeria', 'Civil Servant', 'Islam', 'Hunderwood avenue, Bill quarters Lagos Nigeria', 'Admitted', '2020-10-12 14:27:44', 'Secondary', 13, '2020-10-12', 1, '6FN2WS/49/52064'),
(50, 'mipass_400.png', 'mipass_100.png', 'Program-Participation-Certificate_400.jpg', 'cert_400.jpg', 'Program-Participation-Certificate_400.jpg', 'Fidelity', 'fedilitaco@gmail.com', 'Tacoma', 'Jamin', '$2y$10$pAhClryXeq6SH3vnmA/TFuv4s7XINbV9q0pAZMnZqjY.nTR67FswS', '1988-06-07', 2, 'Osun', 'A+', 'AS', 'None', 'None', 'None', 'Thomas', '07037730085', 'Nagogo rd.Katsina', 'None', 'Collins', 'Erim', '07037730085', 'No3.Goruba Rd Katsina State', 'Army', 'Islam', 'Barhim Estate Katsina State', 'Lizzy', 'Gold', '07037730085', 'No4.Queens Rd Ekiti State', 'Force', 'Islam', 'Soul Rd Lagos State', 'Admitted', '2020-11-13 13:09:51', 'Secondary', 13, '2020-11-13', 1, NULL),
(51, 'sec1_400.png', 'sec1_100.png', 'iserv5_400.png', 'Program-Participation-Certificate_400.jpg', 'Program-Participation-Certificate_400.jpg', 'Caro', 'caroking@gmail.com', 'King', 'Suny', '$2y$10$0X2PdaXiqyL1XfobxULN0.vc/nWHkJXZo3/36H3KK6Qj/6E6PPWyS', '2019-08-12', 2, 'Ekiti', 'A+', 'AA', 'None', 'None', 'None', 'Jane', '07037730085', 'No4.moon Rd.Ekiti State.', 'None', 'John', 'Moon', '07037730085', 'No3.Katsina Rd.Katsina State.', 'Force', 'Islam', 'No5.Gold Rd.Katsina State', 'Lane', 'Vee', '07037730085', 'No6.zee Rd. Edo State.', 'Army', 'Islam', 'No6.cee Rd.Edo State', 'Admitted', '2020-11-13 14:00:24', 'Secondary', 13, '2020-11-13', 1, NULL),
(52, 'pass_400.jpg', 'pass_100.jpg', 'iserv4_400.png', 'Program-Participation-Certificate_400.jpg', 'iserv5_400.png', 'Gee', 'geerose@gmail.com', 'Rose', 'Cee', '$2y$10$9oRh4wvB5C7l/WE7n2owkO8CfDx6yYNZ.iw/FiEqxGb9FngfycUeq', '2019-08-06', 1, 'Cross River', 'A+', 'AS', 'None', 'None', 'None', 'Gee', '07037730085', 'No5.Gold Rd Ekiti State', 'None', 'Lee', 'Long', '07037730085', 'No3.wka Rd.Anambra StateA', 'Army', 'Islam', 'No3.wka Rd.Anambra StateA', 'Queen', 'Rose', '07037730085', 'No5.gee Rd.Edo State', 'Army', 'Islam', 'No5.gee Rd.Edo State', 'Pending', '2020-11-13 14:24:11', 'Secondary', NULL, NULL, 1, NULL),
(53, 'mipass_400.png', 'mipass_100.png', 'iserv4_400.png', 'Program-Participation-Certificate_400.jpg', 'Program-Participation-Certificate_400.jpg', 'Julu', 'juluking@gmail.com', 'King', 'Gee', '$2y$10$KgxXk/cmSuZNWRTOUnEmku0UiVpqZHCk4v.I.ahCABpdTp2GlkDJ.', '2018-09-13', 1, 'Cross River', 'A+', 'AS', 'None', 'None', 'None', 'Kind', '07037730085', 'No4.Dere Rd.Edo State', 'None', 'Tee', 'Gee', '07037730085', 'No6.yee Rd. Edo State', 'Force', 'Islam', 'No6.yee Rd. Edo State', 'ERES', 'HTE', '07037730085', 'No5.Tee Rd.Edo State.', 'Army', 'Islam', 'No5.Tee Rd.Edo State', 'Pending', '2020-11-13 14:42:40', 'Secondary', NULL, NULL, 1, NULL),
(54, 'girl1_400.png', 'girl1_100.png', 'iserv1_400.png', 'cert_400.jpg', 'iserv2_400.png', 'Camp', 'campdavid77@gmail.com', 'David', 'Kunle', '$2y$10$5xRig8RwMWFGmm.FDoK4s.iNGsyN5SIDlGEqoEW1tl.MXnPIXIr1.', '2008-03-07', 2, 'Kwara', 'AB+', 'AS', 'None', 'None', 'None', 'Yakubu', '09138981234', 'No. 789 Saulawa qtr Katsina state', 'None', 'Samsun', 'Kellson', '08138129098', 'No. 89 Billings way oregun Lagos', 'Carpenter', 'Islam', 'No. 89 Billings way oregun Lagos', 'Susan', 'Rice', '08137209812', 'Mohits records road ojuelegba Lagos Nigeria', 'Lawyer', 'Islam', 'No. 89 Billings way oregun Lagos', 'Admitted', '2020-12-01 03:46:51', 'Secondary', 13, '2020-12-01', 1, '96561S/54/13611'),
(55, 'sec2_400.png', 'sec2_100.png', 'cert_400.jpg', 'iserv6_400.jpg', 'iserv5_400.png', 'Mark', 'markross123@gmail.com', 'Ross', 'Funman', '$2y$10$abAMrC8Vm0JcXap3Ch/41uyIveV8CoU4jlNK4IDdIbShhp0qdcBTW', '2007-01-16', 1, 'Osun', 'A+', 'AS', 'None', 'None', 'None', 'Garba', '09037190912', 'Jumoke road Abia state Nigeria', 'None', 'Olegi', 'Thomas', '07032187239', 'Long street festac town Lagos ', 'Civil Servant', 'Christianity', 'No. 23 Long street festac town Lagos ', 'Daniela', 'Foodson', '07032896545', 'No. 9 Long street festac town Lagos ', 'Public Servant', 'Islam', 'Long street festac town Lagos ', 'Pending', '2020-12-01 04:05:39', 'Secondary', NULL, NULL, 1, NULL),
(56, 'boy1_400.png', 'boy1_100.png', 'iserv1_400.png', 'cert_400.jpg', 'iserv4_400.png', 'Babalola', 'phillip@gmail.com', 'Phillip', 'Gamdoki', '$2y$10$JmmzhaGPVTZWkl1fOVjqJ.vStMMTPCvUHuXEPbzAFM6un.iiT1HBG', '2009-01-06', 1, 'Osun', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Gunners', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-05 04:15:47', 'Secondary', 21, '2020-12-05', 1, '1VFQ0I/56/15347'),
(57, 'girl1_400.png', 'girl1_100.png', 'iserv4_400.png', 'cert_400.jpg', 'iserv3_400.png', 'Shamsu', 'shamsutata@gmail.com', 'Usman', 'Usman', '$2y$10$voY5GMjumsLsc2ln1A2uoekn3bdv4Mc60i.humVBtDyMGuRrxWGIG', '2011-01-08', 2, 'Kano', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Tantaku', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-05 04:28:13', 'Secondary', 21, '2020-12-05', 1, 'OJB6HA/57/16093'),
(58, 'boy2_400.png', 'boy2_100.png', 'iserv5_400.png', 'cert_400.jpg', 'iserv5_400.png', 'Falilu', 'roadmaster@gmail.com', 'Rodman', 'Gamdoki', '$2y$10$YTiGgzKEeMRHIHGdt1/SF.49xSaRGda7NwUscTCmw.w5ZE2N9oJiu', '2011-11-24', 1, 'Katsina', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Tantaku', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-05 04:36:17', 'Secondary', 21, '2020-12-05', 1, 'Q44230/58/16577'),
(59, 'girls2_400.png', 'girls2_100.png', 'iserv1_400.png', 'cert_400.jpg', 'iserv2_400.png', 'Fadila', 'fadilamusti@gmail.com', 'Alqalam', 'Alqalam', '$2y$10$EKuaoFjAYIz322wmktNujOvaDYrUunQ/E5H4B9QfJlH3vRf/2aQcK', '2003-12-26', 2, 'Zamfara', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Gunners', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-05 04:41:00', 'Secondary', 21, '2020-12-05', 1, '6MYWG4/59/16860'),
(60, 'mipass_400.png', 'mipass_100.png', 'iserv1_400.png', 'cert_400.jpg', 'iserv2_400.png', 'Maryam', 'maryamkano@gmail.com', 'Kano', 'Gamdoki', '$2y$10$DDSeSrg4Tchn.iaz9aKkUO9exb2Dv6jkSAxdTvxOJt7YaK5a.klNi', '2014-10-22', 2, 'Benue', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Gunners', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-05 04:50:00', 'Secondary', 21, '2020-12-05', 1, '6VGWH6/60/17400'),
(61, 'sec3_400.png', 'sec3_100.png', 'iserv1_400.png', 'cert_400.jpg', 'iserv3_400.png', 'Rabi', 'rabimiKd@gmail.com', 'Kaduna', 'Gamdoki', '$2y$10$yvIs2VL.TSrO.aAQyJY4dufnp3f0Krv8tJ5g0WF1RXR6lguE57nNO', '2006-11-23', 2, 'Zamfara', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Gunners', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-05 04:54:50', 'Secondary', 21, '2020-12-05', 1, 'T5GV4U/61/17690'),
(62, 'boy1_400.png', 'boy1_100.png', 'cert_400.jpg', NULL, 'iserv1_400.png', 'Ugonabo', 'ugogilbert10@gmail.com', 'Gilbert', 'Gamdoki', '$2y$10$Ct1mTTDsESDqaJx3kLVebufAI.jeDcXkBqgTuKi4n86CKkL.hyqme', '2006-02-14', 1, 'Kaduna', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Tantaku', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-06 13:34:35', 'Primary', 22, '2020-12-06', 1, 'G5RDV9/62/48875'),
(63, 'boy2_400.png', 'boy2_100.png', 'cert_400.jpg', NULL, 'iserv2_400.png', 'Ramsy', 'ramsynwankwo6677@gmail.com', 'Nwankwo', 'Usman', '$2y$10$ecTZv85YyVeaaL8AvVdhd.DRcvvwU0MFFP5VgLkP4ygC7E0MEYBhS', '2001-07-26', 1, 'Bauchi', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Gunners', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-06 13:38:13', 'Primary', 22, '2020-12-06', 1, '34712A/63/49093'),
(64, 'pass_400.jpg', 'pass_100.jpg', 'iserv1_400.png', NULL, 'cert_400.jpg', 'Yahanna', 'yohannairis@gmail.com', 'Idris', 'Alqalam', '$2y$10$hxu7rqCtF6cp7Zyqiq6uA.kEfhWKn.QJMf8u.pecHljySKifrgPMy', '2007-07-26', 1, 'Enugu', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Tantaku', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-06 13:41:41', 'Primary', 22, '2020-12-06', 1, 'VQH4J6/64/49301'),
(65, 'girls2_400.png', 'girls2_100.png', 'iserv1_400.png', NULL, 'iserv3_400.png', 'Fatima', 'fatimababagana@gmail.com', 'Babangida', 'Usman', '$2y$10$4w2vkG.2T/kSZEMYeqElneiIM1cv5BsrY31C8V9S1wnSAza/X1PBy', '2000-10-17', 2, 'Abia', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Tantaku', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-06 13:46:52', 'Primary', 22, '2020-12-06', 1, 'MP31SK/65/49612'),
(66, 'mipass_400.png', 'mipass_100.png', 'iserv5_400.png', NULL, 'iserv3_400.png', 'Sonnia', 'sonniaufo@gmail.com', 'Ufonndu', 'Gamdoki', '$2y$10$RGh7rRiYbFG1QXV8fJYzTeqHmqD/dDcsJgittVJdgl2Gkos4ksMDO', '2010-07-21', 2, 'Adamawa', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Gunners', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-06 13:58:18', 'Primary', 22, '2020-12-06', 1, '839PAL/66/50298'),
(67, 'sec3_400.png', 'sec3_100.png', 'iserv2_400.png', NULL, 'iserv1_400.png', 'Titi', 'titiadetutu@gmail.com', 'Adetutu', 'Usman', '$2y$10$zsIvhxtzW4UBZtF6okkfRepRoL1vNUX7LNqZ3ceHtK7rHGl7REBM2', '2010-07-06', 2, 'Kano', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Tantaku', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-06 14:01:08', 'Primary', 22, '2020-12-06', 1, '33PKOC/67/50468'),
(68, 'girl1_400.png', 'girl1_100.png', 'cert_400.jpg', NULL, 'iserv1_400.png', 'Blessing', 'blessingodman8@gmail.com', 'Godman', 'Alqalam', '$2y$10$wMdMydNNyFDMD/UoxdLxx.n3PF5P49duHBB3lv9LbGYke3iStb00u', '2011-07-19', 2, 'Benue', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Gunners', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-06 14:06:52', 'Primary', 22, '2020-12-06', 1, 'IS5M6M/68/50812'),
(69, 'girl33_400.png', 'girl33_100.png', 'cert_400.jpg', NULL, 'iserv2_400.png', 'Hilder', 'hilder837@gmail.com', 'Dokubo', 'Usman', '$2y$10$sYYTiGSjsRSAlbNOF2QN/OnM/35yIZTL9nYQ3TCxHWmowtG3fz48C', '2006-10-24', 2, 'Kano', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Gunners', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-06 14:14:09', 'Primary', 22, '2020-12-06', 1, '0IQLG7/69/51249'),
(70, 'girl34_400.png', 'girl34_100.png', 'cert_400.jpg', NULL, 'iserv1_400.png', 'Tomto', 'tomtodike@gmail.com', 'Dike', 'Alqalam', '$2y$10$r73Dgwuji.xazec/.NLmJ.a/5dneUpmMgO6WOh/eHpQb6jaBD39K2', '2011-07-19', 2, 'Kaduna', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Gunners', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-06 14:22:53', 'Primary', 22, '2020-12-06', 1, '53S231/70/51773'),
(71, 'girl34_400.png', 'girl34_100.png', 'iserv2_400.png', 'cert_400.jpg', 'iserv4_400.png', 'Willson', 'willy@gmail.com', 'Chikere', 'Chikere', '$2y$10$q9.ThpfNRui1Aw1eC0.LLORgx1ECmgk5COOHlQSkYMcp4XLrpTSMC', '2012-06-19', 2, 'Osun', 'AB+', 'AS', 'None', 'None', 'None', 'Marcus', '08031278909', 'Orengutan street Jos Niger', 'None', 'Gunners', 'Apprendi', '09032787812', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Civil servant', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Shamsiyya', 'Asiyya', '09032189813', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Nurse', 'Islam', 'Jos avenue No. 78 oshodi Lagos Nigeria', 'Admitted', '2020-12-08 16:54:03', 'Secondary', 21, '2020-12-08', 1, 'DW28N9/71/60843');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_status`
--

CREATE TABLE `attendance_status` (
  `attendance_status_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `today_date` date NOT NULL,
  `morning` int(1) DEFAULT NULL,
  `afternoon` int(1) DEFAULT NULL,
  `term_id` int(11) NOT NULL,
  `today_date_id` int(11) NOT NULL,
  `system_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_status`
--

INSERT INTO `attendance_status` (`attendance_status_id`, `class_id`, `today_date`, `morning`, `afternoon`, `term_id`, `today_date_id`, `system_date`) VALUES
(1, 1, '2020-06-10', 1, 1, 1, 4, '2020-06-10 15:25:02'),
(2, 1, '2020-06-11', 1, 1, 1, 5, '2020-06-11 09:12:58'),
(3, 1, '2020-06-17', 1, 1, 1, 6, '2020-06-17 06:13:05'),
(4, 1, '2020-06-18', 1, 1, 1, 7, '2020-06-18 10:05:51'),
(5, 1, '2020-06-22', 1, 1, 1, 9, '2020-06-22 11:46:19'),
(6, 1, '2020-06-23', 1, 1, 1, 10, '2020-06-23 10:56:31'),
(7, 1, '2020-06-24', 1, 1, 1, 11, '2020-06-24 10:25:21'),
(8, 1, '2020-06-25', 1, 1, 1, 12, '2020-06-25 10:11:10'),
(9, 1, '2020-06-29', 1, 1, 1, 13, '2020-06-29 11:47:14'),
(10, 1, '2020-06-30', 1, 1, 1, 14, '2020-06-30 11:15:09'),
(11, 1, '2020-07-01', 1, 1, 1, 15, '2020-07-01 09:22:20'),
(12, 1, '2020-07-02', 1, 1, 1, 16, '2020-07-02 12:21:18'),
(13, 1, '2020-07-06', 1, 1, 1, 18, '2020-07-06 03:17:12'),
(14, 1, '2020-07-07', 1, 1, 1, 19, '2020-07-07 13:03:25'),
(15, 1, '2020-07-08', 1, 1, 1, 20, '2020-07-08 11:01:12'),
(16, 1, '2020-07-09', 1, 1, 1, 21, '2020-07-09 10:35:31'),
(17, 1, '2020-07-10', 1, 1, 1, 22, '2020-07-10 14:43:27'),
(18, 1, '2020-07-13', 1, 1, 1, 23, '2020-07-13 12:29:22'),
(19, 1, '2020-07-14', 1, 1, 1, 24, '2020-07-14 10:27:04'),
(20, 1, '2020-07-15', 1, 1, 1, 25, '2020-07-15 11:57:10'),
(21, 1, '2020-07-16', 1, 1, 1, 26, '2020-07-16 13:30:41'),
(22, 1, '2020-07-17', 1, 1, 1, 27, '2020-07-17 14:34:03'),
(23, 1, '2020-07-20', 1, 1, 1, 28, '2020-07-20 11:27:03'),
(24, 1, '2020-07-21', 1, 1, 1, 29, '2020-07-21 14:06:59'),
(25, 1, '2020-07-22', 1, 1, 1, 30, '2020-07-22 10:19:38'),
(26, 1, '2020-07-23', 1, 1, 1, 31, '2020-07-23 09:38:21'),
(27, 1, '2020-07-24', 1, 1, 1, 32, '2020-07-24 06:20:52'),
(28, 1, '2020-07-27', 1, 1, 1, 33, '2020-07-27 14:31:51'),
(29, 1, '2020-07-28', 1, 1, 1, 34, '2020-07-28 10:42:34'),
(30, 1, '2020-07-29', 1, 1, 1, 35, '2020-07-29 09:16:49'),
(31, 1, '2020-08-03', 1, 1, 1, 36, '2020-08-03 13:11:39'),
(32, 1, '2020-08-04', 1, 1, 1, 37, '2020-08-04 16:53:36'),
(33, 1, '2020-08-05', 1, 1, 1, 38, '2020-08-05 10:51:41'),
(34, 1, '2020-08-06', 1, 1, 1, 39, '2020-08-06 10:30:54'),
(35, 1, '2020-08-07', 1, 1, 1, 40, '2020-08-07 11:16:15'),
(36, 1, '2020-08-10', 1, 1, 1, 41, '2020-08-10 11:28:57'),
(37, 1, '2020-08-11', 1, 1, 1, 42, '2020-08-11 15:30:58'),
(38, 1, '2020-08-12', 1, 1, 1, 43, '2020-08-12 10:55:49'),
(39, 1, '2020-08-13', 1, 1, 1, 44, '2020-08-13 09:40:19'),
(40, 1, '2020-10-06', 1, 1, 2, 62, '2020-10-06 17:13:36'),
(41, 7, '2020-10-06', 1, NULL, 2, 62, '2020-10-06 19:24:09'),
(42, 1, '2020-10-07', 1, 1, 2, 63, '2020-10-07 13:50:55'),
(43, 7, '2020-10-07', 1, 1, 2, 63, '2020-10-07 13:59:04'),
(44, 1, '2020-10-08', 1, 1, 2, 64, '2020-10-08 06:45:01'),
(45, 7, '2020-10-08', 1, 1, 2, 64, '2020-10-08 06:47:02'),
(46, 13, '2020-10-12', 1, 1, 2, 66, '2020-10-12 14:42:05'),
(47, 7, '2020-10-12', 1, 1, 2, 66, '2020-10-12 15:01:54'),
(48, 1, '2020-10-12', 1, 1, 2, 66, '2020-10-12 15:03:40'),
(49, 1, '2020-10-13', 1, 1, 2, 67, '2020-10-13 13:16:06'),
(50, 13, '2020-10-13', 1, 1, 2, 67, '2020-10-13 13:23:04'),
(51, 7, '2020-10-13', 1, 1, 2, 67, '2020-10-13 13:28:34'),
(52, 1, '2020-10-19', 1, 1, 2, 68, '2020-10-19 13:08:33'),
(53, 7, '2020-10-19', 1, 1, 2, 68, '2020-10-19 15:46:16'),
(54, 13, '2020-10-19', 1, 1, 2, 68, '2020-10-19 15:48:23'),
(55, 1, '2020-10-20', 1, 1, 2, 69, '2020-10-20 12:24:54'),
(56, 7, '2020-10-20', 1, 1, 2, 69, '2020-10-20 12:26:47'),
(57, 13, '2020-10-20', 1, 1, 2, 69, '2020-10-20 12:29:25'),
(58, 1, '2020-10-21', 1, 1, 2, 70, '2020-10-21 14:12:12'),
(59, 1, '2020-10-26', 1, 1, 2, 71, '2020-10-26 16:49:52'),
(60, 13, '2020-10-26', 1, 1, 2, 71, '2020-10-26 16:54:56'),
(61, 7, '2020-10-26', 1, 1, 2, 71, '2020-10-26 16:58:30'),
(62, 1, '2020-10-27', 1, 1, 2, 72, '2020-10-27 14:31:13'),
(63, 7, '2020-10-27', 1, 1, 2, 72, '2020-10-27 14:43:41'),
(64, 13, '2020-10-27', 1, 1, 2, 72, '2020-10-27 14:45:35'),
(65, 1, '2020-10-29', 1, 1, 2, 73, '2020-10-29 18:55:36'),
(66, 13, '2020-10-29', 1, 1, 2, 73, '2020-10-29 18:58:19'),
(67, 7, '2020-10-29', 1, 1, 2, 73, '2020-10-29 19:04:45'),
(68, 1, '2020-10-30', 1, 1, 2, 74, '2020-10-30 17:49:33'),
(69, 13, '2020-10-30', 1, 1, 2, 74, '2020-10-30 17:52:05'),
(70, 7, '2020-10-30', 1, 1, 2, 74, '2020-10-30 17:53:50'),
(71, 1, '2020-11-02', 1, 1, 2, 75, '2020-11-02 11:04:11'),
(72, 13, '2020-11-02', 1, 1, 2, 75, '2020-11-02 11:08:36'),
(73, 7, '2020-11-02', 1, 1, 2, 75, '2020-11-02 11:12:04'),
(74, 1, '2020-11-03', 1, 1, 2, 76, '2020-11-03 09:35:13'),
(75, 13, '2020-11-03', 1, 1, 2, 76, '2020-11-03 09:38:05'),
(76, 7, '2020-11-03', 1, 1, 2, 76, '2020-11-03 09:42:27'),
(77, 1, '2020-11-04', 1, 1, 2, 77, '2020-11-04 16:42:46'),
(78, 7, '2020-11-04', 1, 1, 2, 77, '2020-11-04 16:44:45'),
(79, 13, '2020-11-04', 1, 1, 2, 77, '2020-11-04 16:45:41'),
(80, 1, '2020-11-05', 1, 1, 2, 78, '2020-11-05 11:47:44'),
(81, 13, '2020-11-05', 1, 1, 2, 78, '2020-11-05 11:49:10'),
(82, 7, '2020-11-05', 1, 1, 2, 78, '2020-11-05 11:50:28'),
(83, 1, '2020-11-06', 1, 1, 2, 79, '2020-11-06 14:19:31'),
(84, 13, '2020-11-06', 1, 1, 2, 79, '2020-11-06 14:22:46'),
(85, 7, '2020-11-06', 1, 1, 2, 79, '2020-11-06 14:23:42'),
(86, 1, '2020-11-09', 1, 1, 2, 80, '2020-11-09 14:23:29'),
(87, 13, '2020-11-09', 1, 1, 2, 80, '2020-11-09 14:26:12'),
(88, 7, '2020-11-09', 1, 1, 2, 80, '2020-11-09 14:28:14'),
(89, 1, '2020-11-12', 1, 1, 2, 81, '2020-11-12 06:13:51'),
(90, 13, '2020-11-12', 1, 1, 2, 81, '2020-11-12 06:15:18'),
(91, 7, '2020-11-12', 1, 1, 2, 81, '2020-11-12 06:29:12'),
(92, 1, '2020-11-13', 1, 1, 2, 82, '2020-11-13 12:59:00'),
(93, 13, '2020-11-13', 1, 1, 2, 82, '2020-11-13 13:00:40'),
(94, 7, '2020-11-13', 1, 1, 2, 82, '2020-11-13 13:01:31'),
(95, 1, '2020-11-16', 1, 1, 2, 83, '2020-11-16 10:41:34'),
(96, 13, '2020-11-16', 1, 1, 2, 83, '2020-11-16 10:43:56'),
(97, 7, '2020-11-16', 1, 1, 2, 83, '2020-11-16 10:46:56'),
(98, 7, '2020-11-23', 1, 1, 2, 84, '2020-11-23 02:25:38'),
(99, 1, '2020-11-23', 1, 1, 2, 84, '2020-11-23 02:30:56'),
(100, 13, '2020-11-23', 1, 1, 2, 84, '2020-11-23 03:40:41'),
(101, 13, '2020-11-24', 1, 1, 2, 85, '2020-11-24 16:08:50'),
(102, 7, '2020-11-24', 1, 1, 2, 85, '2020-11-24 16:10:26'),
(103, 1, '2020-11-24', 1, 1, 2, 85, '2020-11-24 16:30:23'),
(104, 1, '2020-11-26', 1, 1, 2, 86, '2020-11-26 14:48:38'),
(105, 13, '2020-11-26', 1, 1, 2, 86, '2020-11-26 15:59:35'),
(106, 7, '2020-11-26', 1, 1, 2, 86, '2020-11-26 16:24:16'),
(107, 13, '2020-12-02', 1, 1, 2, 88, '2020-12-02 01:29:18'),
(108, 13, '2020-12-03', 1, 1, 2, 89, '2020-12-03 03:30:47'),
(109, 13, '2020-12-04', 1, 1, 2, 90, '2020-12-04 06:01:01'),
(110, 21, '2020-12-07', 1, 1, 2, 91, '2020-12-07 22:01:11'),
(111, 22, '2020-12-07', 1, 1, 2, 91, '2020-12-07 22:02:48'),
(112, 13, '2020-12-07', 1, 1, 2, 91, '2020-12-07 22:05:36'),
(113, 7, '2020-12-07', 1, 1, 2, 91, '2020-12-07 22:07:24'),
(114, 1, '2020-12-07', 1, 1, 2, 91, '2020-12-07 22:09:07'),
(115, 1, '2020-12-08', 1, 1, 2, 92, '2020-12-08 14:20:37'),
(116, 7, '2020-12-08', 1, 1, 2, 92, '2020-12-08 14:28:12'),
(117, 13, '2020-12-08', 1, 1, 2, 92, '2020-12-08 14:29:49'),
(118, 21, '2020-12-08', 1, 1, 2, 92, '2020-12-08 14:34:42'),
(119, 22, '2020-12-10', 1, 1, 2, 94, '2020-12-10 11:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attribute_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attribute_id`, `name`) VALUES
(1, 'Size'),
(2, 'Color');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value`
--

CREATE TABLE `attribute_value` (
  `attribute_value_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attribute_value`
--

INSERT INTO `attribute_value` (`attribute_value_id`, `attribute_id`, `value`) VALUES
(1, 1, 'S'),
(2, 1, 'M'),
(3, 1, 'L'),
(4, 1, 'XL'),
(5, 1, 'XXL'),
(6, 2, 'White'),
(7, 2, 'Black'),
(8, 2, 'Red'),
(9, 2, 'Orange'),
(10, 2, 'Yellow'),
(11, 2, 'Green'),
(12, 2, 'Blue'),
(13, 2, 'Indigo'),
(14, 2, 'Purple'),
(23, 1, 'Incoporate');

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `audit_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`audit_id`, `order_id`, `created_on`, `message`, `code`) VALUES
(1, 2, '2020-02-12 11:19:00', 'Order Processor Started', 10000),
(2, 2, '2020-02-12 11:19:00', 'PsDoNothing started.', 99999),
(3, 2, '2020-02-12 11:19:00', 'Customer: Onyeka Onwutalu', 99999),
(4, 2, '2020-02-12 11:19:00', 'Order subtotal: 77.38', 99999),
(5, 2, '2020-02-12 12:26:51', 'Order Processor Started', 10000),
(6, 2, '2020-02-12 12:26:51', 'PsDoNothing started.', 99999),
(7, 2, '2020-02-12 12:26:51', 'Customer: Onyeka Onwutalu', 99999),
(8, 2, '2020-02-12 12:26:51', 'Order subtotal: 77.38', 99999),
(9, 5, '2020-02-13 14:15:34', 'Order Processor Started.', 10000),
(10, 5, '2020-02-13 14:15:34', 'PsInitialNotification started.', 20000),
(11, 5, '2020-02-13 14:16:11', 'Order Processor Started.', 10000),
(12, 5, '2020-02-13 14:16:11', 'PsInitialNotification started.', 20000),
(13, 5, '2020-02-13 14:18:40', 'Order Processor Started.', 10000),
(14, 5, '2020-02-13 14:18:40', 'PsInitialNotification started.', 20000),
(15, 6, '2020-02-13 16:21:54', 'Order Processor Started.', 10000),
(16, 6, '2020-02-13 16:21:54', 'PsInitialNotification started.', 20000),
(17, 7, '2020-02-17 15:27:47', 'Order Processor Started.', 10000),
(18, 7, '2020-02-17 15:27:47', 'PsInitialNotification started.', 20000),
(19, 8, '2020-02-26 04:20:56', 'Order Processor Started.', 10000),
(20, 8, '2020-02-26 04:20:56', 'PsInitialNotification started.', 20000),
(21, 9, '2020-02-26 08:52:03', 'Order Processor Started.', 10000),
(22, 9, '2020-02-26 08:52:03', 'PsInitialNotification started.', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `department_id`, `name`, `description`) VALUES
(1, 1, 'Creche', 'The French have always had an eye for beauty. One look\r\nat the T-shirts below and you\'ll see that same appreciation has been applied\r\nabundantly to their postage stamps. Below are some of our most beautiful and\r\ncolorful T-shirts, so browse away! And don\'t forget to go all the way to the\r\nbottom - you don\'t want to miss any of them!'),
(2, 1, 'Preparatory', 'The full and resplendent treasure chest of art,\r\nliterature, music, and science that Italy has given the world is reflected\r\nsplendidly in its postal stamps. If we could, we would dedicate hundreds of\r\nT-shirts to this amazing treasure of beautiful images, but for now we will\r\nhave to live with what you see here. You don\'t have to be Italian to love\r\nthese gorgeous T-shirts, just someone who appreciates the finer things in\r\nlife!'),
(3, 1, 'Kindergarten', 'It was Churchill who remarked that he thought the Irish\r\nmost curious because they didn\'t want to be English. How right he was! But\r\nthen, he was half-American, wasn\'t he? If you have an Irish genealogy you\r\nwill want these T-shirts! If you suddenly turn Irish on St. Patrick\'s Day,\r\nyou too will want these T-shirts! Take a look at some of the coolest T-shirts\r\nwe have!'),
(4, 1, 'Nursery One', ' Our ever-growing selection of beautiful animal Tshirts represents critters from everywhere, both wild and domestic. If you\r\ndon\'t see the T-shirt with the animal you\'re looking for, tell us and\r\nwe\'ll find it!'),
(5, 1, 'Nursery Two', 'These unique and beautiful flower T-shirts are just\r\nthe item for the gardener, flower arranger, florist, or general lover of\r\nthings beautiful. Surprise the flower in your life with one of the beautiful\r\nbotanical T-shirts or just get a few for yourself!'),
(6, 1, 'Nursery Three', ' Because this is a unique Christmas T-shirt that\r\nyou\'ll only wear a few times a year, it will probably last for decades (unless\r\nsome grinch nabs it from you, of course). Far into the future, after you\'re\r\ngone, your grandkids will pull it out and argue over who gets to wear it. What\r\ngreat snapshots they\'ll make dressed in Grandpa or Grandma\'s incredibly\r\ntasteful and unique Christmas T-shirt! Yes, everyone will remember you forever\r\nand what a silly goof you were when you would wear only your Santa beard and\r\ncap so you wouldn\'t cover up your nifty T-shirt.'),
(7, 2, 'Primary One', 'For the more timid, all you have to do is wear\r\nyour heartfelt message to get it across. Buy one for you and your sweetie(s)\r\ntoday!'),
(8, 2, 'Primary Two', 'frome iservng technologie'),
(9, 2, 'Primary Three', 'frome iservng technologie'),
(10, 2, 'Primary Four', 'frome iservng technologie'),
(11, 2, 'Primary Five', 'frome iservng technologie'),
(12, 2, 'Primary Six', 'frome iservng technologie'),
(13, 3, 'JSS One', 'frome iservng technologie'),
(14, 3, 'JSS Two', 'frome iservng technologie'),
(15, 3, 'JSS Three', 'frome iservng technologie'),
(16, 3, 'SSS One', 'frome iservng technologie'),
(17, 3, 'SSS Two', 'frome iservng technologie'),
(18, 3, 'SSS Three', 'frome iservng technologie');

-- --------------------------------------------------------

--
-- Table structure for table `class_source`
--

CREATE TABLE `class_source` (
  `class_source_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_source`
--

INSERT INTO `class_source` (`class_source_id`, `class_name`, `department_id`) VALUES
(1, 'Creche', 1),
(2, 'Preparatory', 1),
(3, 'Kindergarten', 1),
(4, 'Nursery One', 1),
(5, 'Nursery Two', 1),
(6, 'Nursery Three', 1),
(7, 'Primary One', 2),
(8, 'Primary Two', 2),
(9, 'Primary Three', 2),
(10, 'Primary Four', 2),
(11, 'Primary Five', 2),
(12, 'Primary Six', 2),
(13, 'JSS One', 3),
(14, 'JSS Two', 3),
(15, 'JSS Three', 3),
(16, 'SSS One', 3),
(17, 'SSS Two', 3),
(18, 'SSS Three', 3);

-- --------------------------------------------------------

--
-- Table structure for table `class_subjects`
--

CREATE TABLE `class_subjects` (
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `subject_status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_subjects`
--

INSERT INTO `class_subjects` (`class_id`, `subject_id`, `subject_status`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(1, 13, 1),
(1, 14, 1),
(1, 15, 1),
(1, 16, 1),
(7, 1, 1),
(7, 2, 1),
(7, 3, 1),
(7, 4, 1),
(7, 5, 1),
(7, 6, 1),
(7, 7, 1),
(7, 8, 1),
(7, 9, 1),
(13, 1, 1),
(13, 2, 1),
(13, 3, 1),
(13, 4, 1),
(13, 5, 1),
(21, 1, 1),
(21, 2, 1),
(21, 3, 1),
(21, 4, 1),
(21, 5, 1),
(21, 6, 1),
(21, 7, 1),
(21, 8, 1),
(21, 9, 1),
(21, 10, 1),
(21, 11, 1),
(22, 1, 1),
(22, 2, 1),
(22, 3, 1),
(22, 4, 1),
(22, 5, 1),
(22, 6, 1),
(22, 7, 1),
(22, 8, 1),
(22, 9, 1),
(22, 10, 1),
(22, 11, 1),
(22, 12, 1),
(22, 13, 1),
(22, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `club_society`
--

CREATE TABLE `club_society` (
  `club_society_id` int(11) NOT NULL,
  `club_society_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `club_society`
--

INSERT INTO `club_society` (`club_society_id`, `club_society_name`) VALUES
(1, 'Literary and Debating Society'),
(2, 'Press Club'),
(3, 'Young Farmers Club'),
(4, 'Young Programmers Club');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `credit_card` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_region_id` int(11) NOT NULL DEFAULT 1,
  `day_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eve_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mob_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `password`, `credit_card`, `address_1`, `address_2`, `city`, `region`, `postal_code`, `country`, `shipping_region_id`, `day_phone`, `eve_phone`, `mob_phone`) VALUES
(1, 'Onyeka Onwutalu', 'bangisandu@gmail.com', '', 'dnNpVmd1V1pRalByMWdBaFVOZGM2dzZVVVI0bWwvQVpEU3pUOFNOL3hOb3RxYkFVbWpSOXFiMnpMQmY3VGdLNkVXU3I3eG9lazczaUhhL2EzYVVkWHhLZnZhK2hJWnJETnlkNjZ1NWdCa21KejFVcWgyYkxUKzF0N0ZPZHZ2K1FVZVRERWpqUkx0d0szS3dCSGllQXpUYWFoRSs2NVVnN28wRllTaVA0aGFOMTZhMnRyTWY1Qm45QkNkNVhXcTAwSlhIbjZJNjNIdzkyMTY0c2tUME54K3djVGtOdW1UVzRQYWs0ZmxOOEs0ZmVpWi92TDVTbjVXbkR1ZmlGejJQbENEZzZYUEtZclpjUm5aR2UyZjlmRFIzNk9jakxSVkpXSy9MVExkNXJ5NWtQa21UdzNFdW9vdEZNWFdxZUhUT3R3TG5Hc0NjM3c1V3RTL1ZKMW5Qc3lnPT06Ok3r1MolVvrR1bO5O/h1Psc=', 'No. 478 Ahmadu Bello Way Katsina', 'N0. 282 Goruba road Kaatsina', 'Katsina', 'Katsina', '234', 'Nigeria', 4, '08134899043', '08134899043', '08134899043'),
(2, 'Onyinye Ojukwu Chukwuka', 'onyinye4real@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(3, 'Benjamin Chukwuebuka Netanyahu', 'bennetan@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(4, 'Biden Netanyahu Netanyahu', 'brtennetan@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(5, 'Bishir Usman Manson', 'bishir78@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(6, 'Fatima Jumai Kabir', 'kabirfat@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(7, 'Oliva Decent Innoson', 'inno67liva@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(8, 'Imegiaku Ada Jovitas', 'imegiakujovi62@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(9, 'Ugonna Lizzy Kingsley', 'ugonnaking89@gmail.com', '$2y$10$mCMsXy99dpx5uBIAl3Xbzuxc/pDgXPO4jVDNsYtwilPraA4KnohJK', '$2y$10$mCMsXy99dpx5uBIAl3Xbzuxc/pDgXPO4jVDNsYtwilPraA4KnohJK\r\n', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(11, 'Emeka Charles Ifeosonna', 'ugofirst@gmail.com', '$2y$10$D6TOpxl1ae3.QIBiD2Ni5OReLd6HM5sTwlzIUXd7y1R', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(12, 'Godswill Uzoka Uzoka', 'godswilluzoks5@gmail.com', '$2y$10$jyE6qGd01Gkj8PMuzUTQmejBALuJtVbMsDxW7BdGXFyTQsihU1Wye', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(13, 'Ifenyinwa Ahanna Ahanna', 'ify67assorted@gmail.com', '$2y$10$scyl953UNJZLpbHGKNRVquSY5NLYPzHVqpwzf0zLw3cNlxDveaGbm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(14, 'Billcot Ezeagu Ezeagu', 'billcoss56@gmail.com', '$2y$10$orRDmu1/n13TwYAJCPHNduzX3A/7FsbjJ.M3aPSCJBovF6hKD9sfS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(15, 'Ruth Ademolola Ademolola', 'ademoruth@gmail.com', '$2y$10$Ob8VA7fTy1Deo8V30ViduOOnUFHedgCEvWXD2wvP7Hwnef6r8utpa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(16, 'Fidelity Jamin Tacoma', 'fedilitaco@gmail.com', '$2y$10$pAhClryXeq6SH3vnmA/TFuv4s7XINbV9q0pAZMnZqjY.nTR67FswS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(17, 'Caro Suny King', 'caroking@gmail.com', '$2y$10$0X2PdaXiqyL1XfobxULN0.vc/nWHkJXZo3/36H3KK6Qj/6E6PPWyS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(18, 'Gee Cee Rose', 'geerose@gmail.com', '$2y$10$9oRh4wvB5C7l/WE7n2owkO8CfDx6yYNZ.iw/FiEqxGb9FngfycUeq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(19, 'Julu Gee King', 'juluking@gmail.com', '$2y$10$KgxXk/cmSuZNWRTOUnEmku0UiVpqZHCk4v.I.ahCABpdTp2GlkDJ.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(20, 'Camp Kunle David', 'campdavid77@gmail.com', '$2y$10$5xRig8RwMWFGmm.FDoK4s.iNGsyN5SIDlGEqoEW1tl.MXnPIXIr1.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(21, 'Mark Funman Ross', 'markross123@gmail.com', '$2y$10$abAMrC8Vm0JcXap3Ch/41uyIveV8CoU4jlNK4IDdIbShhp0qdcBTW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(22, 'Babalola Gamdoki Phillip', 'phillip@gmail.com', '$2y$10$JmmzhaGPVTZWkl1fOVjqJ.vStMMTPCvUHuXEPbzAFM6un.iiT1HBG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(23, 'Shamsu Usman Usman', 'shamsutata@gmail.com', '$2y$10$voY5GMjumsLsc2ln1A2uoekn3bdv4Mc60i.humVBtDyMGuRrxWGIG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(24, 'Falilu Gamdoki Rodman', 'roadmaster@gmail.com', '$2y$10$YTiGgzKEeMRHIHGdt1/SF.49xSaRGda7NwUscTCmw.w5ZE2N9oJiu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(25, 'Fadila Alqalam Alqalam', 'fadilamusti@gmail.com', '$2y$10$EKuaoFjAYIz322wmktNujOvaDYrUunQ/E5H4B9QfJlH3vRf/2aQcK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(26, 'Maryam Gamdoki Kano', 'maryamkano@gmail.com', '$2y$10$DDSeSrg4Tchn.iaz9aKkUO9exb2Dv6jkSAxdTvxOJt7YaK5a.klNi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(27, 'Rabi Gamdoki Kaduna', 'rabimiKd@gmail.com', '$2y$10$yvIs2VL.TSrO.aAQyJY4dufnp3f0Krv8tJ5g0WF1RXR6lguE57nNO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(28, 'Ugonabo Gamdoki Gilbert', 'ugogilbert10@gmail.com', '$2y$10$Ct1mTTDsESDqaJx3kLVebufAI.jeDcXkBqgTuKi4n86CKkL.hyqme', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(29, 'Ramsy Usman Nwankwo', 'ramsynwankwo6677@gmail.com', '$2y$10$ecTZv85YyVeaaL8AvVdhd.DRcvvwU0MFFP5VgLkP4ygC7E0MEYBhS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(30, 'Yahanna Alqalam Idris', 'yohannairis@gmail.com', '$2y$10$hxu7rqCtF6cp7Zyqiq6uA.kEfhWKn.QJMf8u.pecHljySKifrgPMy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(31, 'Fatima Usman Babangida', 'fatimababagana@gmail.com', '$2y$10$4w2vkG.2T/kSZEMYeqElneiIM1cv5BsrY31C8V9S1wnSAza/X1PBy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(32, 'Sonnia Gamdoki Ufonndu', 'sonniaufo@gmail.com', '$2y$10$RGh7rRiYbFG1QXV8fJYzTeqHmqD/dDcsJgittVJdgl2Gkos4ksMDO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(33, 'Titi Usman Adetutu', 'titiadetutu@gmail.com', '$2y$10$zsIvhxtzW4UBZtF6okkfRepRoL1vNUX7LNqZ3ceHtK7rHGl7REBM2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(34, 'Blessing Alqalam Godman', 'blessingodman8@gmail.com', '$2y$10$wMdMydNNyFDMD/UoxdLxx.n3PF5P49duHBB3lv9LbGYke3iStb00u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(35, 'Hilder Usman Dokubo', 'hilder837@gmail.com', '$2y$10$sYYTiGSjsRSAlbNOF2QN/OnM/35yIZTL9nYQ3TCxHWmowtG3fz48C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(36, 'Tomto Alqalam Dike', 'tomtodike@gmail.com', '$2y$10$r73Dgwuji.xazec/.NLmJ.a/5dneUpmMgO6WOh/eHpQb6jaBD39K2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(37, 'Willson Chikere Chikere', 'willy@gmail.com', '$2y$10$q9.ThpfNRui1Aw1eC0.LLORgx1ECmgk5COOHlQSkYMcp4XLrpTSMC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`, `description`) VALUES
(1, 'Nursery', 'Proud of your country ?, wear a style with a national symbol stamp'),
(2, 'Primary', 'Find beautiful styles with animals and flowers in our Nature Department'),
(3, 'Secondary', 'Each time of the year has a special flavor. Our seasonal styles express tradition; symbol using unique postal stamp pictures');

-- --------------------------------------------------------

--
-- Table structure for table `fn_attendance`
--

CREATE TABLE `fn_attendance` (
  `fn_attendance_id` int(11) NOT NULL,
  `weekValue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `todaysDate_id` int(11) NOT NULL,
  `todaysDate` date NOT NULL,
  `term_id` int(11) NOT NULL,
  `mark_m` tinyint(1) DEFAULT 0,
  `mark_a` tinyint(1) DEFAULT 0,
  `reasons` char(32) NOT NULL DEFAULT 'None',
  `sys_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fn_attendance`
--

INSERT INTO `fn_attendance` (`fn_attendance_id`, `weekValue_id`, `student_id`, `class_id`, `todaysDate_id`, `todaysDate`, `term_id`, `mark_m`, `mark_a`, `reasons`, `sys_date`) VALUES
(1, 6, 31, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(2, 6, 32, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(3, 6, 33, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(4, 6, 34, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(5, 6, 31, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:58'),
(6, 6, 32, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(7, 6, 33, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(8, 6, 34, 1, 5, '2020-06-11', 1, 1, 0, 'None', '2020-06-11 09:12:59'),
(9, 7, 31, 1, 6, '2020-06-17', 1, 1, 1, 'None', '2020-06-17 06:13:05'),
(10, 7, 32, 1, 6, '2020-06-17', 1, 1, 1, 'None', '2020-06-17 06:13:06'),
(11, 7, 33, 1, 6, '2020-06-17', 1, 1, 1, 'None', '2020-06-17 06:13:06'),
(12, 7, 34, 1, 6, '2020-06-17', 1, 1, 1, 'None', '2020-06-17 06:13:06'),
(13, 7, 31, 1, 7, '2020-06-18', 1, 1, 0, 'None', '2020-06-18 10:05:51'),
(14, 7, 32, 1, 7, '2020-06-18', 1, 1, 1, 'None', '2020-06-18 10:05:51'),
(15, 7, 33, 1, 7, '2020-06-18', 1, 1, 1, 'None', '2020-06-18 10:05:52'),
(16, 7, 34, 1, 7, '2020-06-18', 1, 1, 0, 'None', '2020-06-18 10:05:52'),
(17, 8, 31, 1, 9, '2020-06-22', 1, 1, 1, 'None', '2020-06-22 11:46:19'),
(18, 8, 32, 1, 9, '2020-06-22', 1, 1, 1, 'None', '2020-06-22 11:46:20'),
(19, 8, 33, 1, 9, '2020-06-22', 1, 1, 1, 'None', '2020-06-22 11:46:20'),
(20, 8, 34, 1, 9, '2020-06-22', 1, 1, 1, 'None', '2020-06-22 11:46:20'),
(21, 8, 31, 1, 10, '2020-06-23', 1, 1, 1, 'None', '2020-06-23 10:56:31'),
(22, 8, 32, 1, 10, '2020-06-23', 1, 1, 0, 'None', '2020-06-23 10:56:31'),
(23, 8, 33, 1, 10, '2020-06-23', 1, 1, 1, 'None', '2020-06-23 10:56:31'),
(24, 8, 34, 1, 10, '2020-06-23', 1, 1, 1, 'None', '2020-06-23 10:56:31'),
(25, 8, 31, 1, 11, '2020-06-24', 1, 1, 1, 'None', '2020-06-24 10:25:21'),
(26, 8, 32, 1, 11, '2020-06-24', 1, 1, 1, 'None', '2020-06-24 10:25:21'),
(27, 8, 33, 1, 11, '2020-06-24', 1, 1, 1, 'None', '2020-06-24 10:25:21'),
(28, 8, 34, 1, 11, '2020-06-24', 1, 1, 1, 'None', '2020-06-24 10:25:21'),
(29, 8, 31, 1, 12, '2020-06-25', 1, 1, 1, 'None', '2020-06-25 10:11:10'),
(30, 8, 32, 1, 12, '2020-06-25', 1, 1, 0, 'None', '2020-06-25 10:11:10'),
(31, 8, 33, 1, 12, '2020-06-25', 1, 1, 0, 'None', '2020-06-25 10:11:11'),
(32, 8, 34, 1, 12, '2020-06-25', 1, 1, 0, 'None', '2020-06-25 10:11:11'),
(33, 8, 31, 1, 12, '2020-06-25', 1, 1, 1, 'None', '2020-06-25 10:11:11'),
(34, 8, 32, 1, 12, '2020-06-25', 1, 1, 0, 'None', '2020-06-25 10:11:11'),
(35, 8, 33, 1, 12, '2020-06-25', 1, 1, 0, 'None', '2020-06-25 10:11:12'),
(36, 8, 34, 1, 12, '2020-06-25', 1, 1, 0, 'None', '2020-06-25 10:11:12'),
(37, 9, 31, 1, 13, '2020-06-29', 1, 1, 1, 'None', '2020-06-29 11:47:14'),
(38, 9, 32, 1, 13, '2020-06-29', 1, 1, 1, 'None', '2020-06-29 11:47:14'),
(39, 9, 33, 1, 13, '2020-06-29', 1, 1, 1, 'None', '2020-06-29 11:47:14'),
(40, 9, 34, 1, 13, '2020-06-29', 1, 1, 1, 'None', '2020-06-29 11:47:14'),
(41, 9, 31, 1, 14, '2020-06-30', 1, 1, 1, 'None', '2020-06-30 11:15:09'),
(42, 9, 32, 1, 14, '2020-06-30', 1, 1, 1, 'None', '2020-06-30 11:15:10'),
(43, 9, 33, 1, 14, '2020-06-30', 1, 1, 1, 'None', '2020-06-30 11:15:10'),
(44, 9, 34, 1, 14, '2020-06-30', 1, 1, 1, 'None', '2020-06-30 11:15:10'),
(45, 9, 31, 1, 15, '2020-07-01', 1, 1, 1, 'None', '2020-07-01 09:22:20'),
(46, 9, 32, 1, 15, '2020-07-01', 1, 1, 1, 'None', '2020-07-01 09:22:21'),
(47, 9, 33, 1, 15, '2020-07-01', 1, 1, 1, 'None', '2020-07-01 09:22:21'),
(48, 9, 34, 1, 15, '2020-07-01', 1, 1, 1, 'None', '2020-07-01 09:22:21'),
(49, 9, 34, 1, 16, '2020-07-02', 1, 1, 1, 'None', '2020-07-02 12:21:18'),
(50, 9, 33, 1, 16, '2020-07-02', 1, 1, 1, 'None', '2020-07-02 12:21:18'),
(51, 9, 31, 1, 16, '2020-07-02', 1, 1, 1, 'None', '2020-07-02 12:21:18'),
(52, 9, 32, 1, 16, '2020-07-02', 1, 1, 1, 'None', '2020-07-02 12:21:18'),
(53, 10, 31, 1, 18, '2020-07-06', 1, 1, 1, 'None', '2020-07-06 03:17:12'),
(54, 10, 34, 1, 18, '2020-07-06', 1, 1, 1, 'None', '2020-07-06 03:17:12'),
(55, 10, 33, 1, 18, '2020-07-06', 1, 1, 1, 'None', '2020-07-06 03:17:13'),
(56, 10, 32, 1, 18, '2020-07-06', 1, 1, 1, 'None', '2020-07-06 03:17:13'),
(57, 10, 31, 1, 19, '2020-07-07', 1, 1, 1, 'None', '2020-07-07 13:03:25'),
(58, 10, 34, 1, 19, '2020-07-07', 1, 1, 1, 'None', '2020-07-07 13:03:25'),
(59, 10, 33, 1, 19, '2020-07-07', 1, 1, 1, 'None', '2020-07-07 13:03:25'),
(60, 10, 32, 1, 19, '2020-07-07', 1, 1, 1, 'None', '2020-07-07 13:03:25'),
(61, 10, 33, 1, 20, '2020-07-08', 1, 1, 1, 'None', '2020-07-08 11:01:12'),
(62, 10, 31, 1, 20, '2020-07-08', 1, 1, 1, 'None', '2020-07-08 11:01:13'),
(63, 10, 34, 1, 20, '2020-07-08', 1, 1, 1, 'None', '2020-07-08 11:01:13'),
(64, 10, 32, 1, 20, '2020-07-08', 1, 1, 1, 'None', '2020-07-08 11:01:13'),
(65, 10, 31, 1, 21, '2020-07-09', 1, 1, 1, 'None', '2020-07-09 10:35:31'),
(66, 10, 34, 1, 21, '2020-07-09', 1, 1, 1, 'None', '2020-07-09 10:35:31'),
(67, 10, 33, 1, 21, '2020-07-09', 1, 1, 1, 'None', '2020-07-09 10:35:31'),
(68, 10, 32, 1, 21, '2020-07-09', 1, 1, 1, 'None', '2020-07-09 10:35:31'),
(69, 10, 31, 1, 22, '2020-07-10', 1, 1, 1, 'None', '2020-07-10 14:43:27'),
(70, 10, 34, 1, 22, '2020-07-10', 1, 1, 1, 'None', '2020-07-10 14:43:27'),
(71, 10, 33, 1, 22, '2020-07-10', 1, 1, 1, 'None', '2020-07-10 14:43:27'),
(72, 10, 32, 1, 22, '2020-07-10', 1, 1, 1, 'None', '2020-07-10 14:43:27'),
(73, 11, 34, 1, 23, '2020-07-13', 1, 1, 0, 'None', '2020-07-13 12:29:22'),
(74, 11, 33, 1, 23, '2020-07-13', 1, 1, 0, 'None', '2020-07-13 12:29:22'),
(75, 11, 31, 1, 23, '2020-07-13', 1, 1, 1, 'None', '2020-07-13 12:29:22'),
(76, 11, 32, 1, 23, '2020-07-13', 1, 1, 0, 'None', '2020-07-13 12:29:22'),
(77, 11, 34, 1, 23, '2020-07-13', 1, 1, 0, 'None', '2020-07-13 12:35:20'),
(78, 11, 33, 1, 23, '2020-07-13', 1, 1, 0, 'None', '2020-07-13 12:35:20'),
(79, 11, 31, 1, 23, '2020-07-13', 1, 1, 1, 'None', '2020-07-13 12:35:20'),
(80, 11, 32, 1, 23, '2020-07-13', 1, 1, 0, 'None', '2020-07-13 12:35:20'),
(81, 11, 34, 1, 24, '2020-07-14', 1, 1, 1, 'None', '2020-07-14 10:27:04'),
(82, 11, 33, 1, 24, '2020-07-14', 1, 1, 1, 'None', '2020-07-14 10:27:05'),
(83, 11, 31, 1, 24, '2020-07-14', 1, 1, 1, 'None', '2020-07-14 10:27:06'),
(84, 11, 32, 1, 24, '2020-07-14', 1, 1, 1, 'None', '2020-07-14 10:27:06'),
(85, 11, 34, 1, 25, '2020-07-15', 1, 1, 1, 'None', '2020-07-15 11:57:10'),
(86, 11, 33, 1, 25, '2020-07-15', 1, 1, 1, 'None', '2020-07-15 11:57:10'),
(87, 11, 31, 1, 25, '2020-07-15', 1, 1, 1, 'None', '2020-07-15 11:57:10'),
(88, 11, 32, 1, 25, '2020-07-15', 1, 1, 1, 'None', '2020-07-15 11:57:10'),
(89, 11, 31, 1, 26, '2020-07-16', 1, 1, 1, 'None', '2020-07-16 13:30:41'),
(90, 11, 34, 1, 26, '2020-07-16', 1, 1, 0, 'None', '2020-07-16 13:30:41'),
(91, 11, 33, 1, 26, '2020-07-16', 1, 1, 0, 'None', '2020-07-16 13:30:41'),
(92, 11, 32, 1, 26, '2020-07-16', 1, 1, 0, 'None', '2020-07-16 13:30:41'),
(93, 11, 31, 1, 26, '2020-07-16', 1, 1, 1, 'None', '2020-07-16 13:30:41'),
(94, 11, 34, 1, 26, '2020-07-16', 1, 1, 0, 'None', '2020-07-16 13:30:41'),
(95, 11, 33, 1, 26, '2020-07-16', 1, 1, 0, 'None', '2020-07-16 13:30:41'),
(96, 11, 32, 1, 26, '2020-07-16', 1, 1, 0, 'None', '2020-07-16 13:30:42'),
(97, 11, 34, 1, 27, '2020-07-17', 1, 1, 1, 'None', '2020-07-17 14:34:03'),
(98, 11, 33, 1, 27, '2020-07-17', 1, 1, 1, 'None', '2020-07-17 14:34:04'),
(99, 11, 31, 1, 27, '2020-07-17', 1, 1, 1, 'None', '2020-07-17 14:34:04'),
(100, 11, 32, 1, 27, '2020-07-17', 1, 1, 1, 'None', '2020-07-17 14:34:04'),
(101, 12, 31, 1, 28, '2020-07-20', 1, 1, 1, 'None', '2020-07-20 11:27:03'),
(102, 12, 34, 1, 28, '2020-07-20', 1, 1, 1, 'None', '2020-07-20 11:27:03'),
(103, 12, 33, 1, 28, '2020-07-20', 1, 1, 1, 'None', '2020-07-20 11:27:03'),
(104, 12, 32, 1, 28, '2020-07-20', 1, 1, 1, 'None', '2020-07-20 11:27:03'),
(105, 12, 34, 1, 29, '2020-07-21', 1, 1, 1, 'None', '2020-07-21 14:06:59'),
(106, 12, 33, 1, 29, '2020-07-21', 1, 1, 1, 'None', '2020-07-21 14:07:00'),
(107, 12, 31, 1, 29, '2020-07-21', 1, 1, 1, 'None', '2020-07-21 14:07:00'),
(108, 12, 32, 1, 29, '2020-07-21', 1, 1, 1, 'None', '2020-07-21 14:07:00'),
(109, 12, 33, 1, 30, '2020-07-22', 1, 1, 1, 'None', '2020-07-22 10:19:38'),
(110, 12, 31, 1, 30, '2020-07-22', 1, 1, 1, 'None', '2020-07-22 10:19:40'),
(111, 12, 34, 1, 30, '2020-07-22', 1, 1, 1, 'None', '2020-07-22 10:19:40'),
(112, 12, 32, 1, 30, '2020-07-22', 1, 1, 1, 'None', '2020-07-22 10:19:40'),
(113, 12, 31, 1, 31, '2020-07-23', 1, 1, 1, 'None', '2020-07-23 09:38:21'),
(114, 12, 34, 1, 31, '2020-07-23', 1, 1, 1, 'None', '2020-07-23 09:38:22'),
(115, 12, 33, 1, 31, '2020-07-23', 1, 1, 1, 'None', '2020-07-23 09:38:22'),
(116, 12, 32, 1, 31, '2020-07-23', 1, 1, 1, 'None', '2020-07-23 09:38:22'),
(117, 12, 33, 1, 32, '2020-07-24', 1, 1, 1, 'None', '2020-07-24 06:20:52'),
(118, 12, 31, 1, 32, '2020-07-24', 1, 1, 1, 'None', '2020-07-24 06:20:53'),
(119, 12, 34, 1, 32, '2020-07-24', 1, 1, 1, 'None', '2020-07-24 06:20:53'),
(120, 12, 32, 1, 32, '2020-07-24', 1, 1, 1, 'None', '2020-07-24 06:20:53'),
(121, 13, 31, 1, 33, '2020-07-27', 1, 1, 1, 'None', '2020-07-27 14:31:51'),
(122, 13, 34, 1, 33, '2020-07-27', 1, 1, 1, 'None', '2020-07-27 14:31:52'),
(123, 13, 33, 1, 33, '2020-07-27', 1, 1, 1, 'None', '2020-07-27 14:31:52'),
(124, 13, 32, 1, 33, '2020-07-27', 1, 1, 1, 'None', '2020-07-27 14:31:52'),
(125, 13, 31, 1, 34, '2020-07-28', 1, 1, 1, 'None', '2020-07-28 10:42:34'),
(126, 13, 34, 1, 34, '2020-07-28', 1, 1, 1, 'None', '2020-07-28 10:42:35'),
(127, 13, 33, 1, 34, '2020-07-28', 1, 1, 1, 'None', '2020-07-28 10:42:35'),
(128, 13, 32, 1, 34, '2020-07-28', 1, 1, 1, 'None', '2020-07-28 10:42:35'),
(129, 13, 34, 1, 35, '2020-07-29', 1, 1, 1, 'None', '2020-07-29 09:16:49'),
(130, 13, 33, 1, 35, '2020-07-29', 1, 1, 1, 'None', '2020-07-29 09:16:50'),
(131, 13, 31, 1, 35, '2020-07-29', 1, 1, 1, 'None', '2020-07-29 09:16:50'),
(132, 13, 32, 1, 35, '2020-07-29', 1, 1, 1, 'None', '2020-07-29 09:16:50'),
(133, 14, 31, 1, 36, '2020-08-03', 1, 1, 1, 'None', '2020-08-03 13:11:39'),
(134, 14, 34, 1, 36, '2020-08-03', 1, 1, 1, 'None', '2020-08-03 13:11:40'),
(135, 14, 33, 1, 36, '2020-08-03', 1, 1, 1, 'None', '2020-08-03 13:11:40'),
(136, 14, 32, 1, 36, '2020-08-03', 1, 1, 1, 'None', '2020-08-03 13:11:40'),
(137, 14, 33, 1, 37, '2020-08-04', 1, 1, 1, 'None', '2020-08-04 16:53:37'),
(138, 14, 31, 1, 37, '2020-08-04', 1, 1, 1, 'None', '2020-08-04 16:53:37'),
(139, 14, 34, 1, 37, '2020-08-04', 1, 1, 1, 'None', '2020-08-04 16:53:37'),
(140, 14, 32, 1, 37, '2020-08-04', 1, 1, 1, 'None', '2020-08-04 16:53:37'),
(141, 14, 31, 1, 38, '2020-08-05', 1, 1, 1, 'None', '2020-08-05 10:51:41'),
(142, 14, 34, 1, 38, '2020-08-05', 1, 1, 1, 'None', '2020-08-05 10:51:42'),
(143, 14, 33, 1, 38, '2020-08-05', 1, 1, 1, 'None', '2020-08-05 10:51:42'),
(144, 14, 32, 1, 38, '2020-08-05', 1, 1, 1, 'None', '2020-08-05 10:51:42'),
(145, 14, 34, 1, 39, '2020-08-06', 1, 1, 1, 'None', '2020-08-06 10:30:54'),
(146, 14, 33, 1, 39, '2020-08-06', 1, 1, 1, 'None', '2020-08-06 10:30:54'),
(147, 14, 31, 1, 39, '2020-08-06', 1, 1, 1, 'None', '2020-08-06 10:30:54'),
(148, 14, 32, 1, 39, '2020-08-06', 1, 1, 1, 'None', '2020-08-06 10:30:54'),
(149, 14, 34, 1, 40, '2020-08-07', 1, 1, 1, 'None', '2020-08-07 11:16:15'),
(150, 14, 33, 1, 40, '2020-08-07', 1, 1, 1, 'None', '2020-08-07 11:16:17'),
(151, 14, 31, 1, 40, '2020-08-07', 1, 1, 1, 'None', '2020-08-07 11:16:17'),
(152, 14, 32, 1, 40, '2020-08-07', 1, 1, 1, 'None', '2020-08-07 11:16:17'),
(153, 15, 34, 1, 41, '2020-08-10', 1, 1, 1, 'None', '2020-08-10 11:28:57'),
(154, 15, 33, 1, 41, '2020-08-10', 1, 1, 1, 'None', '2020-08-10 11:28:58'),
(155, 15, 31, 1, 41, '2020-08-10', 1, 1, 1, 'None', '2020-08-10 11:28:58'),
(156, 15, 32, 1, 41, '2020-08-10', 1, 1, 1, 'None', '2020-08-10 11:28:58'),
(157, 15, 34, 1, 42, '2020-08-11', 1, 1, 1, 'None', '2020-08-11 15:30:58'),
(158, 15, 33, 1, 42, '2020-08-11', 1, 1, 1, 'None', '2020-08-11 15:30:58'),
(159, 15, 31, 1, 42, '2020-08-11', 1, 1, 1, 'None', '2020-08-11 15:30:58'),
(160, 15, 32, 1, 42, '2020-08-11', 1, 1, 1, 'None', '2020-08-11 15:30:59'),
(161, 15, 31, 1, 43, '2020-08-12', 1, 1, 1, 'None', '2020-08-12 10:55:50'),
(162, 15, 34, 1, 43, '2020-08-12', 1, 1, 1, 'None', '2020-08-12 10:55:50'),
(163, 15, 33, 1, 43, '2020-08-12', 1, 1, 1, 'None', '2020-08-12 10:55:50'),
(164, 15, 32, 1, 43, '2020-08-12', 1, 1, 1, 'None', '2020-08-12 10:55:50'),
(165, 15, 31, 1, 44, '2020-08-13', 1, 1, 1, 'None', '2020-08-13 09:40:19'),
(166, 15, 34, 1, 44, '2020-08-13', 1, 1, 1, 'None', '2020-08-13 09:40:20'),
(167, 15, 33, 1, 44, '2020-08-13', 1, 1, 1, 'None', '2020-08-13 09:40:20'),
(168, 15, 32, 1, 44, '2020-08-13', 1, 1, 1, 'None', '2020-08-13 09:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `fn_ca_record`
--

CREATE TABLE `fn_ca_record` (
  `fn_ca_record_id` int(11) NOT NULL,
  `firstca` tinyint(3) NOT NULL,
  `secondca` tinyint(3) DEFAULT NULL,
  `thirdca` tinyint(3) DEFAULT NULL,
  `exams` smallint(3) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `supDate` date NOT NULL,
  `sysDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fn_ca_record`
--

INSERT INTO `fn_ca_record` (`fn_ca_record_id`, `firstca`, `secondca`, `thirdca`, `exams`, `student_id`, `subject_id`, `class_id`, `term_id`, `supDate`, `sysDate`) VALUES
(1, 14, 11, 19, 40, 32, 1, 1, 1, '2020-06-24', '2020-06-24 10:33:43'),
(2, 12, 11, 12, 39, 31, 1, 1, 1, '2020-06-24', '2020-06-24 10:33:43'),
(3, 13, 11, 16, 28, 33, 1, 1, 1, '2020-06-24', '2020-06-24 10:33:43'),
(4, 20, 15, 15, 36, 34, 1, 1, 1, '2020-06-24', '2020-06-24 10:33:43'),
(5, 15, 12, 13, 40, 32, 2, 1, 1, '2020-06-24', '2020-06-24 10:35:16'),
(6, 13, 20, 15, 38, 31, 2, 1, 1, '2020-06-24', '2020-06-24 10:35:16'),
(7, 20, 20, 20, 40, 33, 2, 1, 1, '2020-06-24', '2020-06-24 10:35:16'),
(8, 13, 18, 11, 29, 34, 2, 1, 1, '2020-06-24', '2020-06-24 10:35:16'),
(9, 14, 12, 20, 30, 32, 3, 1, 1, '2020-06-24', '2020-06-24 10:58:13'),
(10, 12, 11, 14, 35, 31, 3, 1, 1, '2020-06-24', '2020-06-24 10:58:13'),
(11, 13, 14, 19, 40, 33, 3, 1, 1, '2020-06-24', '2020-06-24 10:58:13'),
(12, 14, 14, 13, 38, 34, 3, 1, 1, '2020-06-24', '2020-06-24 10:58:13'),
(13, 14, 20, 13, 38, 32, 4, 1, 1, '2020-07-22', '2020-07-22 17:15:48'),
(14, 19, 14, 15, 40, 31, 4, 1, 1, '2020-07-22', '2020-07-22 17:15:48'),
(15, 18, 16, 18, 25, 33, 4, 1, 1, '2020-07-22', '2020-07-22 17:15:48'),
(16, 15, 15, 20, 36, 34, 4, 1, 1, '2020-07-22', '2020-07-22 17:15:48'),
(17, 14, 15, 15, 40, 32, 7, 1, 1, '2020-07-22', '2020-07-22 17:18:58'),
(18, 12, 16, 18, 35, 31, 7, 1, 1, '2020-07-22', '2020-07-22 17:18:58'),
(19, 16, 18, 19, 29, 33, 7, 1, 1, '2020-07-22', '2020-07-22 17:18:58'),
(20, 20, 13, 15, 29, 34, 7, 1, 1, '2020-07-22', '2020-07-22 17:18:58'),
(21, 12, 19, 16, 36, 32, 5, 1, 1, '2020-07-22', '2020-07-22 17:26:03'),
(22, 20, 20, 20, 40, 31, 5, 1, 1, '2020-07-22', '2020-07-22 17:26:03'),
(23, 14, 12, 13, 32, 33, 5, 1, 1, '2020-07-22', '2020-07-22 17:26:03'),
(24, 16, 14, 18, 25, 34, 5, 1, 1, '2020-07-22', '2020-07-22 17:26:03'),
(25, 15, 2, 12, 34, 32, 6, 1, 1, '2020-07-22', '2020-07-22 17:29:49'),
(26, 20, 20, 20, 40, 31, 6, 1, 1, '2020-07-22', '2020-07-22 17:29:49'),
(27, 14, 13, 14, 23, 33, 6, 1, 1, '2020-07-22', '2020-07-22 17:29:49'),
(28, 18, 18, 10, 35, 34, 6, 1, 1, '2020-07-22', '2020-07-22 17:29:49'),
(29, 18, 13, 16, 36, 32, 8, 1, 1, '2020-07-22', '2020-07-22 17:33:31'),
(30, 20, 20, 20, 40, 31, 8, 1, 1, '2020-07-22', '2020-07-22 17:33:31'),
(31, 10, 9, 13, 26, 33, 8, 1, 1, '2020-07-22', '2020-07-22 17:33:31'),
(32, 14, 14, 19, 29, 34, 8, 1, 1, '2020-07-22', '2020-07-22 17:33:31'),
(33, 13, 20, 15, 25, 32, 9, 1, 1, '2020-07-23', '2020-07-23 10:13:15'),
(34, 20, 19, 19, 39, 31, 9, 1, 1, '2020-07-23', '2020-07-23 10:13:15'),
(35, 16, 20, 14, 36, 33, 9, 1, 1, '2020-07-23', '2020-07-23 10:13:15'),
(36, 19, 19, 16, 38, 34, 9, 1, 1, '2020-07-23', '2020-07-23 10:13:15'),
(37, 15, 19, 18, 33, 32, 10, 1, 1, '2020-07-23', '2020-07-23 10:20:18'),
(38, 16, 20, 19, 39, 31, 10, 1, 1, '2020-07-23', '2020-07-23 10:20:18'),
(39, 12, 19, 15, 36, 33, 10, 1, 1, '2020-07-23', '2020-07-23 10:20:18'),
(40, 13, 19, 14, 34, 34, 10, 1, 1, '2020-07-23', '2020-07-23 10:20:18'),
(41, 12, 20, 13, 16, 32, 13, 1, 1, '2020-07-23', '2020-07-23 10:53:31'),
(42, 19, 20, 16, 20, 31, 13, 1, 1, '2020-07-23', '2020-07-23 10:53:31'),
(43, 14, 20, 15, 19, 33, 13, 1, 1, '2020-07-23', '2020-07-23 10:53:31'),
(44, 16, 19, 14, 18, 34, 13, 1, 1, '2020-07-23', '2020-07-23 10:53:31'),
(45, 19, 12, 18, 38, 32, 14, 1, 1, '2020-07-23', '2020-07-23 10:55:58'),
(46, 19, 16, 19, 40, 31, 14, 1, 1, '2020-07-23', '2020-07-23 10:55:58'),
(47, 16, 15, 15, 40, 33, 14, 1, 1, '2020-07-23', '2020-07-23 10:55:58'),
(48, 19, 16, 19, 39, 34, 14, 1, 1, '2020-07-23', '2020-07-23 10:55:58'),
(49, 20, 20, 12, 15, 32, 15, 1, 1, '2020-07-23', '2020-07-23 10:59:41'),
(50, 20, 20, 14, 16, 31, 15, 1, 1, '2020-07-23', '2020-07-23 10:59:41'),
(51, 19, 18, 11, 13, 33, 15, 1, 1, '2020-07-23', '2020-07-23 10:59:41'),
(52, 14, 16, 10, 15, 34, 15, 1, 1, '2020-07-23', '2020-07-23 10:59:42'),
(53, 14, 2, 20, 40, 32, 16, 1, 1, '2020-07-23', '2020-07-23 11:05:40'),
(54, 17, 20, 20, 40, 31, 16, 1, 1, '2020-07-23', '2020-07-23 11:05:40'),
(55, 14, 14, 20, 40, 33, 16, 1, 1, '2020-07-23', '2020-07-23 11:05:40'),
(56, 15, 16, 20, 40, 34, 16, 1, 1, '2020-07-23', '2020-07-23 11:05:40'),
(57, 12, NULL, NULL, NULL, 32, 11, 1, 1, '2020-08-17', '2020-08-17 10:49:26'),
(58, 13, NULL, NULL, NULL, 31, 11, 1, 1, '2020-08-17', '2020-08-17 10:49:26'),
(59, 14, NULL, NULL, NULL, 33, 11, 1, 1, '2020-08-17', '2020-08-17 10:49:26'),
(60, 15, NULL, NULL, NULL, 34, 11, 1, 1, '2020-08-17', '2020-08-17 10:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `fp_attendance`
--

CREATE TABLE `fp_attendance` (
  `fp_attendance_id` int(11) NOT NULL,
  `weekValue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `todaysDate_id` int(11) NOT NULL,
  `todaysDate` date NOT NULL,
  `term_id` int(11) NOT NULL,
  `mark_m` tinyint(1) DEFAULT 0,
  `mark_a` tinyint(1) DEFAULT 0,
  `reasons` char(32) NOT NULL DEFAULT 'None',
  `sys_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fp_attendance`
--

INSERT INTO `fp_attendance` (`fp_attendance_id`, `weekValue_id`, `student_id`, `class_id`, `todaysDate_id`, `todaysDate`, `term_id`, `mark_m`, `mark_a`, `reasons`, `sys_date`) VALUES
(1, 6, 31, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(2, 6, 32, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(3, 6, 33, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(4, 6, 34, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(5, 6, 31, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:58'),
(6, 6, 32, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(7, 6, 33, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(8, 6, 34, 1, 5, '2020-06-11', 1, 1, 0, 'None', '2020-06-11 09:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `fp_ca_record`
--

CREATE TABLE `fp_ca_record` (
  `fp_ca_record_id` int(11) NOT NULL,
  `firstca` tinyint(3) NOT NULL,
  `secondca` tinyint(3) NOT NULL DEFAULT 0,
  `thirdca` tinyint(3) NOT NULL DEFAULT 0,
  `exams` smallint(3) NOT NULL DEFAULT 0,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `supDate` date NOT NULL,
  `sysDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fs_attendance`
--

CREATE TABLE `fs_attendance` (
  `fs_attendance_id` int(11) NOT NULL,
  `weekValue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `todaysDate_id` int(11) NOT NULL,
  `todaysDate` date NOT NULL,
  `term_id` int(11) NOT NULL,
  `mark_m` tinyint(1) DEFAULT 0,
  `mark_a` tinyint(1) DEFAULT 0,
  `reasons` char(32) NOT NULL DEFAULT 'None',
  `sys_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fs_attendance`
--

INSERT INTO `fs_attendance` (`fs_attendance_id`, `weekValue_id`, `student_id`, `class_id`, `todaysDate_id`, `todaysDate`, `term_id`, `mark_m`, `mark_a`, `reasons`, `sys_date`) VALUES
(1, 6, 31, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(2, 6, 32, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(3, 6, 33, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(4, 6, 34, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(5, 6, 31, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:58'),
(6, 6, 32, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(7, 6, 33, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(8, 6, 34, 1, 5, '2020-06-11', 1, 1, 0, 'None', '2020-06-11 09:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `fs_ca_record`
--

CREATE TABLE `fs_ca_record` (
  `fs_ca_record_id` int(11) NOT NULL,
  `firstca` tinyint(3) NOT NULL,
  `secondca` tinyint(3) NOT NULL DEFAULT 0,
  `thirdca` tinyint(3) NOT NULL DEFAULT 0,
  `exams` smallint(3) NOT NULL DEFAULT 0,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `supDate` date NOT NULL,
  `sysDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `house_id` int(11) NOT NULL,
  `house_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`house_id`, `house_name`) VALUES
(1, 'Green'),
(2, 'Blue'),
(3, 'White'),
(4, 'Red'),
(5, 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_plan`
--

CREATE TABLE `lesson_plan` (
  `lesson_plan_id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `time_duration` varchar(80) NOT NULL,
  `methodology` varchar(255) NOT NULL,
  `previous_knowledge` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `introduction` varchar(255) DEFAULT NULL,
  `student_activities` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `evaluation` varchar(255) DEFAULT NULL,
  `conclusion` varchar(255) DEFAULT NULL,
  `assignment` text DEFAULT NULL,
  `lpreferences` varchar(255) DEFAULT NULL,
  `sys_date` datetime NOT NULL DEFAULT current_timestamp(),
  `date_added` date NOT NULL,
  `gender` int(1) NOT NULL,
  `behaviouralObj` varchar(255) NOT NULL,
  `instructionalMtr` varchar(255) NOT NULL,
  `instructionalImages` varchar(255) NOT NULL,
  `intronote` text DEFAULT NULL,
  `topic_define` text DEFAULT NULL,
  `subtopic1` tinytext DEFAULT NULL,
  `subtopic1body` text DEFAULT NULL,
  `subtopic2` tinytext DEFAULT NULL,
  `subtopic2body` text DEFAULT NULL,
  `subtopic3` tinytext DEFAULT NULL,
  `subtopic3body` text DEFAULT NULL,
  `pre_summary` tinytext DEFAULT NULL,
  `pre_summarybody` text DEFAULT NULL,
  `week_id` int(11) DEFAULT NULL,
  `publish` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson_plan`
--

INSERT INTO `lesson_plan` (`lesson_plan_id`, `topic`, `time_duration`, `methodology`, `previous_knowledge`, `subject_id`, `term_id`, `class_id`, `introduction`, `student_activities`, `summary`, `evaluation`, `conclusion`, `assignment`, `lpreferences`, `sys_date`, `date_added`, `gender`, `behaviouralObj`, `instructionalMtr`, `instructionalImages`, `intronote`, `topic_define`, `subtopic1`, `subtopic1body`, `subtopic2`, `subtopic2body`, `subtopic3`, `subtopic3body`, `pre_summary`, `pre_summarybody`, `week_id`, `publish`) VALUES
(1, 'What Is A Noun', '30 Minutes', 'You can select up to 3 images only, one big and two small ones', 'You can select up to 3 images only, one big and two small ones', 1, 1, 1, 'You can select up to 3 images only, one big and two small ones', 'This textbook is designed to provide a careful introduction to key technologies that', 'This textbook is designed to provide a careful introduction to key technologies that', 'This textbook is designed to provide a careful introduction to key technologies that', 'This textbook is designed to provide a careful introduction to key technologies that', 'This textbook is designed to provide a careful introduction to key technologies thathereNaJoinThis textbook is designed to provide a careful introduction to key technologies thathereNaJoinThis textbook is designed to provide a careful introduction to key technologies thathereNaJoinThis textbook is designed to provide a careful introduction to key technologies that', 'This textbook is designed to provide a careful introduction to key technologies thathereNaJoinThis textbook is designed to provide a careful introduction to key technologies thathereNaJoinThis textbook is designed to provide a careful introduction to key ', '2020-09-05 03:41:48', '2020-09-05', 1, 'You can select up to 3 images only, one big and two small oneshereNaJoinYou can select up to 3 images only, one big and two small oneshereNaJoinYou can select up to 3 images only, one big and two smal', 'You can select up to 3 images only, one big and two small oneshereNaJoinYou can select up to 3 images only, one big and two small oneshereNaJoinYou can select up to 3 images only, one big and two smal', 'WhatIsANoun_750.jpghereNaJoinWhatIsANoun_360.jpghereNaJoinWhatIsANoun_365.jpg', 'This textbook is designed to provide a careful introduction to key technologies that have been developed as part of the birth and maturation of the World Wide Web. My goal is for students using this book to understand the Web at a fundamental level, much as students who learn assembly language understand computers at such a level. This level of understanding should provide a solid foundation on which to build as students subsequently learn about higher-level web development tools based on the technologies covered here. It should also prepare them well for further study of web technologies, both those that exist today and those that will be developed in the future.', 'The textbook is designed primarily for use in computer science (CS) courses, but other uses are mentioned later. I assume that the reader has a background roughly equivalent to the first three semesters of an undergraduate CS major. For instance, I expect well-developed skills in at least one programming language, familiarity with Java or the background and ability to learn it quickly from other sources (no Java knowledge is required until the last half of the book), and facility with basic data structures, especially trees', 'Have chosen topics so as to treat the subject with reasonable breadth 1', 'This textbook is designed to provide a careful introduction to key technologies that have been developed as part of the birth and maturation of the World Wide Web. My goal is for students using this book to understand the Web at a fundamental level, much as students who learn assembly language understand computers at such a level. This level of understanding should provide a solid foundation on which to build as students subsequently learn about higher-level web development tools based on the technologies covered here. It should also prepare them well for further study of web technologies, both those that exist today and those that will be developed in the future. The textbook is designed primarily for use in computer science (CS) courses, but other uses are mentioned later. I assume that the reader has a background roughly equivalent to the first three semesters of an undergraduate CS major. For instance, I expect well-developed skills in at least one programming language, familiarity with Java or the background and ability to learn it quickly from other sources (no Java knowledge is required until the last half of the book), and facility with basic data structures, especially trees. I have chosen topics so as to treat the subject with reasonable breadth while also allowing for significant depth. With respect to breadth, the textbook focuses on technologies that are unlikely to receive detailed treatment in nonweb CS courses. Conversely, this book covers only lightly a number of topics that, while related to the Web, are not web technologies per se and are likely to be covered in other CS courses. For instance, while an appendix describes how to connect a Java-based web application to a database management system (DBMS), the book does not attempt to present SQL or database concepts. Other web-related CS topics that are covered narrowly—that is, primarily as they relate directly to web technologies—include computer networks, software engineering, and security. Finally, because of the emphasis on foundational technologies that are fundamentally web-related, higher-level development tools (such as MacromediaR DreamweaverR software) and content presentation tools (such as MacromediaR FlashR software) are not covered. Another scope consideration arises from the fact that, especially when it comes to server-side software, several web technologies provide similar capabilities, forming a technology class. For example, the ASP.NET, ColdFusionR , JSPTM, and PHP technologies all occupy the same server-side software niche, and each is currently in widespread use. Even if time and space allowed all of these technologies to be covered in some depth, I suspect that most students would tire of seeing similar concepts dressed in several different sets of clothes. So I have chosen instead to cover one member of each class in some detail and also to provide a high-level comparison of the example technology with other widely used members of the class. It seems reasonable to expect that a student who understands one technology well will be able to quickly adapt to conceptually related technologies as the need arises in the future', 'Along these same lines, for each technology class covered I have chosen to use a', 'This textbook is designed to provide a careful introduction to key technologies \r\n\r\nthat have been developed as part of the birth and maturation of the World Wide Web. My goal is for \r\n\r\nstudents using this book to understand the Web at a fundamental level, much as students who learn \r\n\r\nassembly language understand computers at such a level. This level of understanding should provide a \r\n\r\nsolid foundation on which to build as students subsequently learn about higher-level web development \r\n\r\ntools based on the technologies covered here. It should also prepare them well for further study of \r\n\r\nweb technologies, both those that exist today and those that will be developed in the future. The \r\n\r\ntextbook is designed primarily for use in computer science (CS) courses, but other uses are mentioned \r\n\r\nlater. I assume that the reader has a background roughly equivalent to the first three semesters of an \r\n\r\nundergraduate CS major. For instance, I expect well-developed skills in at least one programming \r\n\r\nlanguage, familiarity with Java or the background and ability to learn it quickly from other sources \r\n\r\n(no Java knowledge is required until the last half of the book), and facility with basic data \r\n\r\nstructures, especially trees. I have chosen topics so as to treat the subject with reasonable breadth \r\n\r\nwhile also allowing for significant depth. With respect to breadth, the textbook focuses on \r\n\r\ntechnologies that are unlikely to receive detailed treatment in nonweb CS courses. Conversely, this \r\n\r\nbook covers only lightly a number of topics that, while related to the Web, are not web technologies \r\n\r\nper se and are likely to be covered in other CS courses. For instance, while an appendix describes how \r\n\r\nto connect a Java-based web application to a database management system (DBMS), the book does not \r\n\r\nattempt to present SQL or database concepts. Other web-related CS topics that are covered narrowly—\r\n\r\nthat is, primarily as they relate directly to web technologies—include computer networks, software \r\n\r\nengineering, and security. Finally, because of the emphasis on foundational technologies that are \r\n\r\nfundamentally web-related, higher-level development tools (such as MacromediaR DreamweaverR software) \r\n\r\nand content presentation tools (such as MacromediaR FlashR software) are not covered. Another scope \r\n\r\nconsideration arises from the fact that, especially when it comes to server-side software, several web \r\n\r\ntechnologies provide similar capabilities, forming a technology class. For example, the ASP.NET, \r\n\r\nColdFusionR , JSPTM, and PHP technologies all occupy the same server-side software niche, and each is \r\n\r\ncurrently in widespread use. Even if time and space allowed all of these technologies to be covered in \r\n\r\nsome depth, I suspect that most students would tire of seeing similar concepts dressed in several \r\n\r\ndifferent sets of clothes. So I have chosen instead to cover one member of each class in some detail \r\n\r\nand also to provide a high-level comparison of the example technology with other widely used members \r\n\r\nof the class. It seems reasonable to expect that a student who understands one technology well will be \r\n\r\nable to quickly adapt to conceptually related technologies as the need arises in the future This \r\n\r\ntextbook is designed to provide a careful introduction to key technologies that have been developed as \r\n\r\npart of the birth and maturation of the World Wide Web. My goal is for students using this book to \r\n\r\nunderstand the Web at a fundamental level, much as students who learn assembly language understand \r\n\r\ncomputers at such a level. This level of understanding should provide a solid foundation on which to \r\n\r\nbuild as students subsequently learn about higher-level web development tools based on the \r\n\r\ntechnologies covered here. It should also prepare them well for further study of web technologies, \r\n\r\nboth those that exist today and those that will be developed in the future. The textbook is designed \r\n\r\nprimarily for use in computer science (CS) courses, but other uses are mentioned later. I assume that \r\n\r\nthe reader has a background roughly equivalent to the first three semesters of an undergraduate CS \r\n\r\nmajor. For instance, I expect well-developed skills in at least one programming language, familiarity \r\n\r\nwith Java or the background and ability to learn it quickly from other sources (no Java knowledge is \r\n\r\nrequired until the last half of the book), and facility with basic data structures, especially trees. \r\n\r\nI have chosen topics so as to treat the subject with reasonable breadth while also allowing for \r\n\r\nsignificant depth. With respect to breadth, the textbook focuses on technologies that are unlikely to \r\n\r\nreceive detailed treatment in nonweb CS courses. Conversely, this book covers only lightly a number of \r\n\r\ntopics that, while related to the Web, are not web technologies per se and are likely to be covered in \r\n\r\nother CS courses. For instance, while an appendix describes how to connect a Java-based web \r\n\r\napplication to a database management system (DBMS), the book does not attempt to present SQL or \r\n\r\ndatabase concepts. Other web-related CS topics that are covered narrowly—that is, primarily as they \r\n\r\nrelate directly to web technologies—include computer networks, software engineering, and security. \r\n\r\nFinally, because of the emphasis on foundational technologies that are fundamentally web-related, \r\n\r\nhigher-level development tools (such as MacromediaR DreamweaverR software) and content presentation \r\n\r\ntools (such as MacromediaR FlashR software) are not covered. Another scope consideration arises from \r\n\r\nthe fact that, especially when it comes to server-side software, several web technologies provide \r\n\r\nsimilar capabilities, forming a technology class. For example, the ASP.NET, ColdFusionR , JSPTM, and \r\n\r\nPHP technologies all occupy the same server-side software niche, and each is currently in widespread \r\n\r\nuse. Even if time and space allowed all of these technologies to be covered in some depth, I suspect \r\n\r\nthat most students would tire of seeing similar concepts dressed in several different sets of clothes. \r\n\r\nSo I have chosen instead to cover one member of each class in some detail and also to provide a high-\r\n\r\nlevel comparison of the example technology with other widely used members of the class. It seems \r\n\r\nreasonable to expect that a student who understands one technology well will be able to quickly adapt \r\n\r\nto conceptually related technologies as the need arises in the future', 'Along these same lines, for each technology class covered I have chosen to use a', 'This textbook is designed to provide a careful introduction to key technologies \r\n\r\nthat have been developed as part of the birth and maturation of the World Wide Web. My goal is for \r\n\r\nstudents using this book to understand the Web at a fundamental level, much as students who learn \r\n\r\nassembly language understand computers at such a level. This level of understanding should provide a \r\n\r\nsolid foundation on which to build as students subsequently learn about higher-level web development \r\n\r\ntools based on the technologies covered here. It should also prepare them well for further study of \r\n\r\nweb technologies, both those that exist today and those that will be developed in the future. The \r\n\r\ntextbook is designed primarily for use in computer science (CS) courses, but other uses are mentioned \r\n\r\nlater. I assume that the reader has a background roughly equivalent to the first three semesters of an \r\n\r\nundergraduate CS major. For instance, I expect well-developed skills in at least one programming \r\n\r\nlanguage, familiarity with Java or the background and ability to learn it quickly from other sources \r\n\r\n(no Java knowledge is required until the last half of the book), and facility with basic data \r\n\r\nstructures, especially trees. I have chosen topics so as to treat the subject with reasonable breadth \r\n\r\nwhile also allowing for significant depth. With respect to breadth, the textbook focuses on \r\n\r\ntechnologies that are unlikely to receive detailed treatment in nonweb CS courses. Conversely, this \r\n\r\nbook covers only lightly a number of topics that, while related to the Web, are not web technologies \r\n\r\nper se and are likely to be covered in other CS courses. For instance, while an appendix describes how \r\n\r\nto connect a Java-based web application to a database management system (DBMS), the book does not \r\n\r\nattempt to present SQL or database concepts. Other web-related CS topics that are covered narrowly—\r\n\r\nthat is, primarily as they relate directly to web technologies—include computer networks, software \r\n\r\nengineering, and security. Finally, because of the emphasis on foundational technologies that are \r\n\r\nfundamentally web-related, higher-level development tools (such as MacromediaR DreamweaverR software) \r\n\r\nand content presentation tools (such as MacromediaR FlashR software) are not covered. Another scope \r\n\r\nconsideration arises from the fact that, especially when it comes to server-side software, several web \r\n\r\ntechnologies provide similar capabilities, forming a technology class. For example, the ASP.NET, \r\n\r\nColdFusionR , JSPTM, and PHP technologies all occupy the same server-side software niche, and each is \r\n\r\ncurrently in widespread use. Even if time and space allowed all of these technologies to be covered in \r\n\r\nsome depth, I suspect that most students would tire of seeing similar concepts dressed in several \r\n\r\ndifferent sets of clothes. So I have chosen instead to cover one member of each class in some detail \r\n\r\nand also to provide a high-level comparison of the example technology with other widely used members \r\n\r\nof the class. It seems reasonable to expect that a student who understands one technology well will be \r\n\r\nable to quickly adapt to conceptually related technologies as the need arises in the future This \r\n\r\ntextbook is designed to provide a careful introduction to key technologies that have been developed as \r\n\r\npart of the birth and maturation of the World Wide Web. My goal is for students using this book to \r\n\r\nunderstand the Web at a fundamental level, much as students who learn assembly language understand \r\n\r\ncomputers at such a level. This level of understanding should provide a solid foundation on which to \r\n\r\nbuild as students subsequently learn about higher-level web development tools based on the \r\n\r\ntechnologies covered here. It should also prepare them well for further study of web technologies, \r\n\r\nboth those that exist today and those that will be developed in the future. The textbook is designed \r\n\r\nprimarily for use in computer science (CS) courses, but other uses are mentioned later. I assume that \r\n\r\nthe reader has a background roughly equivalent to the first three semesters of an undergraduate CS \r\n\r\nmajor. For instance, I expect well-developed skills in at least one programming language, familiarity \r\n\r\nwith Java or the background and ability to learn it quickly from other sources (no Java knowledge is \r\n\r\nrequired until the last half of the book), and facility with basic data structures, especially trees. \r\n\r\nI have chosen topics so as to treat the subject with reasonable breadth while also allowing for \r\n\r\nsignificant depth. With respect to breadth, the textbook focuses on technologies that are unlikely to \r\n\r\nreceive detailed treatment in nonweb CS courses. Conversely, this book covers only lightly a number of \r\n\r\ntopics that, while related to the Web, are not web technologies per se and are likely to be covered in \r\n\r\nother CS courses. For instance, while an appendix describes how to connect a Java-based web \r\n\r\napplication to a database management system (DBMS), the book does not attempt to present SQL or \r\n\r\ndatabase concepts. Other web-related CS topics that are covered narrowly—that is, primarily as they \r\n\r\nrelate directly to web technologies—include computer networks, software engineering, and security. \r\n\r\nFinally, because of the emphasis on foundational technologies that are fundamentally web-related, \r\n\r\nhigher-level development tools (such as MacromediaR DreamweaverR software) and content presentation \r\n\r\ntools (such as MacromediaR FlashR software) are not covered. Another scope consideration arises from \r\n\r\nthe fact that, especially when it comes to server-side software, several web technologies provide \r\n\r\nsimilar capabilities, forming a technology class. For example, the ASP.NET, ColdFusionR , JSPTM, and \r\n\r\nPHP technologies all occupy the same server-side software niche, and each is currently in widespread \r\n\r\nuse. Even if time and space allowed all of these technologies to be covered in some depth, I suspect \r\n\r\nthat most students would tire of seeing similar concepts dressed in several different sets of clothes. \r\n\r\nSo I have chosen instead to cover one member of each class in some detail and also to provide a high-\r\n\r\nlevel comparison of the example technology with other widely used members of the class. It seems \r\n\r\nreasonable to expect that a student who understands one technology well will be able to quickly adapt \r\n\r\nto conceptually related technologies as the need arises in the future This textbook is designed to \r\n\r\nprovide a careful introduction to key technologies that have been developed as part of the birth and \r\n\r\nmaturation of the World Wide Web. My goal is for students using this book to understand the Web at a \r\n\r\nfundamental level, much as students who learn assembly language understand computers at such a level. \r\n\r\nThis level of understanding should provide a solid foundation on which to build as students \r\n\r\nsubsequently learn about higher-level web development tools based on the technologies covered here. It \r\n\r\nshould also prepare them well for further study of web technologies, both those that exist today and \r\n\r\nthose that will be developed in the future. The textbook is designed primarily for use in computer \r\n\r\nscience (CS) courses, but other uses are mentioned later. I assume that the reader has a background \r\n\r\nroughly equivalent to the first three semesters of an undergraduate CS major. For instance, I expect \r\n\r\nwell-developed skills in at least one programming language, familiarity with Java or the background \r\n\r\nand ability to learn it quickly from other sources (no Java knowledge is required until the last half \r\n\r\nof the book), and facility with basic data structures, especially trees. I have chosen topics so as to \r\n\r\ntreat the subject with reasonable breadth while also allowing for significant depth. With respect to \r\n\r\nbreadth, the textbook focuses on technologies that are unlikely to receive detailed treatment in \r\n\r\nnonweb CS courses. Conversely, this book covers only lightly a number of topics that, while related to the Web, are not web technologies per se and are likely to be covered in other CS courses. For instance, while an appendix describes how to connect a Java-based web application to a database management system (DBMS), the book does not attempt to present SQL or database concepts. Other web-related CS topics that are covered narrowly—that is, primarily as they relate directly to web technologies—include computer networks, software engineering, and security. Finally, because of the emphasis on foundational technologies that are fundamentally web-related, higher-level development tools (such as MacromediaR DreamweaverR software) and content presentation tools (such as MacromediaR FlashR software) are not covered. Another scope consideration arises from the fact that, especially when it comes to server-side software, several web technologies provide similar capabilities, forming a technology class. For example, the ASP.NET, ColdFusionR , JSPTM, and PHP technologies all occupy the same server-side software niche, and each is currently in widespread use. Even if time and space allowed all of these technologies to be covered in some depth, I suspect that most students would tire of seeing similar concepts dressed in several different sets of clothes. So I have chosen instead to cover one member of each class in some detail and also to provide a high-level comparison of the example technology with other widely used members of the class. It seems reasonable to expect that a student who understands one technology well will be able to quickly adapt to conceptually related technologies as the need arises in the future', 'long these same lines, for each technology class covered I have chosen to use a', 'This textbook is designed to provide a careful introduction to key technologies \r\n\r\nthat have been developed as part of the birth and maturation of the World Wide Web. My goal is for \r\n\r\nstudents using this book to understand the Web at a fundamental level, much as students who learn \r\n\r\nassembly language understand computers at such a level. This level of understanding should provide a \r\n\r\nsolid foundation on which to build as students subsequently learn about higher-level web development \r\n\r\ntools based on the technologies covered here. It should also prepare them well for further study of \r\n\r\nweb technologies, both those that exist today and those that will be developed in the future. The \r\n\r\ntextbook is designed primarily for use in computer science (CS) courses, but other uses are mentioned \r\n\r\nlater. I assume that the reader has a background roughly equivalent to the first three semesters of an \r\n\r\nundergraduate CS major. For instance, I expect well-developed skills in at least one programming \r\n\r\nlanguage, familiarity with Java or the background and ability to learn it quickly from other sources \r\n\r\n(no Java knowledge is required until the last half of the book), and facility with basic data \r\n\r\nstructures, especially trees. I have chosen topics so as to treat the subject with reasonable breadth \r\n\r\nwhile also allowing for significant depth. With respect to breadth, the textbook focuses on \r\n\r\ntechnologies that are unlikely to receive detailed treatment in nonweb CS courses. Conversely, this \r\n\r\nbook covers only lightly a number of topics that, while related to the Web, are not web technologies \r\n\r\nper se and are likely to be covered in other CS courses. For instance, while an appendix describes how \r\n\r\nto connect a Java-based web application to a database management system (DBMS), the book does not \r\n\r\nattempt to present SQL or database concepts. Other web-related CS topics that are covered narrowly—\r\n\r\nthat is, primarily as they relate directly to web technologies—include computer networks, software \r\n\r\nengineering, and security. Finally, because of the emphasis on foundational technologies that are \r\n\r\nfundamentally web-related, higher-level development tools (such as MacromediaR DreamweaverR software) \r\n\r\nand content presentation tools (such as MacromediaR FlashR software) are not covered. Another scope \r\n\r\nconsideration arises from the fact that, especially when it comes to server-side software, several web \r\n\r\ntechnologies provide similar capabilities, forming a technology class. For example, the ASP.NET, \r\n\r\nColdFusionR , JSPTM, and PHP technologies all occupy the same server-side software niche, and each is \r\n\r\ncurrently in widespread use. Even if time and space allowed all of these technologies to be covered in \r\n\r\nsome depth, I suspect that most students would tire of seeing similar concepts dressed in several \r\n\r\ndifferent sets of clothes. So I have chosen instead to cover one member of each class in some detail \r\n\r\nand also to provide a high-level comparison of the example technology with other widely used members \r\n\r\nof the class. It seems reasonable to expect that a student who understands one technology well will be \r\n\r\nable to quickly adapt to conceptually related technologies as the need arises in the future', NULL, 0),
(2, 'Grammatical Structures', '40 Minutes', 'The musical and play full method', 'I have thought the class how to swim', 1, 1, 1, 'Expenses for healthcare in general continue to rise, especially for those with chronic disease. Healthcare providers are searching for ways to control costs while increasing the quality of patient care', 'The student must jump up during the lesson', 'Healthcare in general can be challenging and risky as peoples health and lives are potentially at stake.', 'Make it clear that student need time to play', 'Healthcare in general can be challenging and risky as peoples health and lives are potentially at stake.', 'Oracle Java and Java Embedded are key technologies for both the enterprise and embedded markethereNaJoinwhat is Further, increasing regulation in the area of alarm fatigue will requirehereNaJoinwhat is Further, increasing regulation in the area of alarm fatigue will requirehereNaJoinwhat is Further, increasing regulation in the area of alarm fatigue will require', 'Java and other Oracle solutions provide the level of security needed to identify patients and their deviceshereNaJoinJava and other Oracle solutions provide the level of security needed to identify patients and their deviceshereNaJoinJava and other Oracle', '2020-09-11 14:24:39', '2020-09-11', 1, 'The student should be able to tell their nameshereNaJoinThe student should shout in classhereNaJoinAm gonna give them some magic ', 'The picture og queen of englandhereNaJointhe mosaic paintinghereNaJoinCastro from the cloud', 'GrammaticalStructures_750.jpghereNaJoinGrammaticalStructures_360.jpghereNaJoinGrammaticalStructures_365.jpg', 'onyeka chukwi is here  At the end of 2013, there were three million patients using connected home medical monitoring\r\ndevices worldwide. This figure comprises all patients that were remotely monitored by a professional\r\ncaregiver (“mHealth and Home Monitoring,” M2M Research Series 2014, Berg Insight). Additionally,\r\nit’s expected that connected home medical monitoring devices will grow at a compound annual rate of\r\n44 percent to reach over 19 million devices by 2018. Remote monitoring solutions’ revenue reached\r\n$5.23 billion in 2013 and is expected to grow to $22.6 billion by 2018.', 'The promise of improved care with reduced costs is driving innovation in remote monitoring solutions.\r\nTogether, healthcare providers and product vendors are working with Oracle Java Embedded to\r\ndeliver solutions that include personalized medicine, improved healthcare management through\r\nadvanced telemetry, and population health scenarios to better measure the effectiveness of care and\r\ntreatment. Challenges include the need for connectivity, security, privacy, advanced analytics, data\r\nvisualization techniques, and the remote management of monitoring devices. Oracle’s Java and\r\nintegrated Internet of Things technologies directly address these and other challenges, further\r\nimproving patient care and reducing costs end-to-end.', 'The Value of the Internet of Things for Mobile Health', 'As more medical devices connect to the Internet, they become an important and growing segment of the Internet of\r\nThings (IoT). The term IoT is used to define a system in which the Internet is connected to the real world via\r\nubiquitous sensors. The vision of IoT is to integrate diverse sets of data from physical sensors and the rest of IT to\r\nenable analytics that can anticipate events, issues, and other needs. As a result, the system as a whole can have a\r\nview of what’s taking place at any location and any point in time. This vision leads to a world of connected systems\r\nthat could greatly reduce waste, lower costs, and eliminate loss for just about any human-machine and machinemachine activity.\r\nGiven the daunting requirements of healthcare today (safety, regulations, security, privacy, and so on) and the\r\nrapidly emerging IoT technology wave, no other platform today is better positioned to enable an IoT strategy for\r\nhealthcare than Java. With its ability to run on a wide range of devices from mobile and embedded systems with\r\nlimited CPU and memory, to servers with immense power and capacity, Java powers a world of compute resources\r\nwith ubiquitous connectivity.', 'Remote Patient Monitoring and mHealth', 'According to the World Health Organization, mobile health (mHealth) covers medical practice and healthcare\r\nsupported by mobile devices, patient monitoring devices, and other wireless devices. It also includes applications for\r\nimproved lifestyle and fitness that may connect to medical devices or sensors (fitness bracelets or watches, for\r\nexample). mHealth can also include personal health guidance, health information and visualization, medication\r\nreminders, and telemedicine and remote patient monitoring via wireless communications.\r\nOverall, there are five main segments of mHealth:\r\n1. Solutions for healthcare professionals: including visualization and review of medical device data, patient\r\nhistory, population health statistics, care and treatment information, and other centralized healthcare support\r\nsystems.\r\n2. In-patient monitoring: the support and monitoring of patient healthcare within a hospital, acute or long-term\r\ncare facility, or other care facility.\r\n3. Remote patient monitoring: the support and monitoring of patient healthcare from home or other remote\r\nlocation other than a hospital or care facility.\r\n4. Assisted living and tracking: for patients who live on their own but may require emergency assistance or\r\ntracking by family members.\r\n5. Personal wellness: for otherwise healthy individuals who want to take an active approach to maintaining their\r\nhealth and wellbeing through diet, exercise, and other lifestyle methods.\r\nSolutions across all of these mHealth segments create a connected care value chain involving four categories of\r\nservice providers:\r\n1. Sensors and medical monitoring device vendors. Device examples include medical monitoring devices\r\nsuch as blood pressure cuffs, blood glucose measuring devices, and integrated solutions such as smart\r\nhospital beds.\r\n2. mHealth connectivity solution providers. These are cellular service carriers such as AT&amp;amp;T and Verizon in\r\nthe US, and other manufacturers of specialized embedded communication devices. These devices may include\r\nContinua-compliant Bluetooth devices, devices that communicate via Wifi, and so on.\r\n3. mHealth care delivery platform providers. Examples include data collection and aggregation platform\r\nvendors such as Oracle, Axeda, and other IoT technology vendors with a focus on healthcare.\r\n4. Monitoring service providers. This includes specialized providers who offer integrated services to monitor\r\npatients and provide emergency response, if required, between device and communication vendors.', 'The Rise of Non-Infectious Disease', 'The 21st century has seen an increasingly aging population, coupled with a rise in non-infectious disease-related\r\nhealth problems and deaths. Overall, non-infectious chronic diseases such as cardiac arrhythmia, hypertension,\r\nischemic diseases, sleep apnea, diabetes mellitus, hyperlipidemia, asthma, and chronic obstructive pulmonary\r\ndisease (COPD) comprise an increasingly large percentage of total healthcare costs.\r\nFor example, one third of all US adults are classified as overweight, and another third are considered obese. With\r\nover 400 million people globally classified as obese, weight-related health issues (for example, diabetes and\r\nhypertension) and related costs continue to rise. In the US alone, the estimated direct costs of hypertension are over\r\n$100 billion each year (Berg Insights). In addition, the prevalence of mild sleep apnea (often weight-related) is\r\nestimated to be around 13 percent of the population in the western world, whereas an additional seven percent are\r\nbelieved to have moderate to severe sleep apnea. Hyperlipidemia, a set of treatable conditions often resulting from\r\na poor lifestyle, account for a global annual cost of between $300-400 billion.\r\nRemote monitoring mHealth solutions are attracting the attention of healthcare providers globally as they have the\r\npotential to both improve the care and quality of life for patients with non-infectious chronic disease, while also\r\nreducing overall healthcare costs. These solutions involve patient self-measurement via remote medical devices,\r\nwith reliable communication of the measurements and related data to a healthcare provider (such as a doctor,\r\nnurse, or technician) for remote diagnosis or analysis. As a result, patients maintain their independence and\r\nproviders maintain personalized treatment while reducing costly office and hospital visits.', 'The Challenges of mHealth', 'Healthcare in general can be challenging and risky as people’s health and lives are potentially at stake. Technology\r\ncan help reduce risk and challenges in many cases (remote monitoring, automated alerts, and accurate medication\r\ndispensing, for example), but it can introduce new problems as well.\r\nWhile gaining approval from regulatory bodies is usually the first step in bringing a new device or mHealth solution to\r\nthe market, an additional challenge today is obtaining acceptance from reimbursement providers. To gain regulatory\r\napproval, a company needs to demonstrate functionality and safety. However, to gain acceptance from healthcare\r\npayers, a company needs to demonstrate the economic benefits of the new device or monitoring method. Although\r\ninterrelated, we first need to understand these challenges individually:\r\n» Security, data safety and privacy: Patient privacy and data safety are highly regulated and represent an area of\r\nliability to everyone involved. Therefore, both healthcare providers and solution providers need to find ways to\r\nensure data security and privacy, including the security of remotely managed devices.\r\n» Implementation portability and cost: Solution providers are challenged with the additional cost of connectivity.\r\nFirst, the cost of LTE cellular communications needs to be optimized. Second, many of the systems involved are\r\nembedded, traditionally requiring expensive specialized tools and implementation skills. As new medical devices\r\nare introduced, and advances are made in terms of remote patient care, everyone is looking for ways to cut costs\r\nthrough re-use and portability. This requires complex long-term planning for future mHealth device hardware\r\nupgrades to avoid re-creating systems due to evolving hardware. Standards and advanced development\r\ntechniques are needed to offset added downstream costs and to remove portability concerns.\r\n» Enterprise integration: The challenge is to find or build a platform that offers robust connectivity options,\r\nseamlessly connects to hospital or healthcare provider business systems, and remains cost effective over time.\r\n» Visualization: There’s a strong need to visualize data to convey information accurately and quickly, at a glance,\r\nallowing deeper inspection on demand as required. This requires integration with mobile devices, remote\r\ndatabases, remote analytics processing engines, and graphics systems with specialized algorithms.\r\n» Alarm fatigue: Healthcare professionals are frequently bombarded with alarms and alerts, leading to a condition\r\ncalled “alarm fatigue” where alarms may not be noticed even when truly critical. The constant sound of alarms\r\nand noises from medical devices and patient monitors can cause staff to become desensitized to them. Alarm\r\nfatigue is present within hospitals, at-home care, nursing homes, and other medical facilities. The challenge is to\r\nestablish alarm safety as a priority, help professionals identify the most important alarms, and create policies to\r\nmanage alarms efficiently and properly. Further, increasing regulation in the area of alarm fatigue will require\r\nproviders to add more complexity to their solutions.', NULL, 0),
(3, 'What Are The Uses Of Past Tense', '40 Minutes', 'Asking method', 'the student are already able to sweep', 1, 2, 1, 'The teacher introduces the lesson by slapping the sudents', 'The students will climb some trees', 'The teacher summarizes by fun having with the student', 'The teacher evaluate the lesson by taking all class woork', 'The teacher concludes by making beautiful noise', 'Expatiate on the concept of concordhereNaJoinExplain migrationhereNaJoinList for uses of tamarahereNaJoinList all the part of a cell', 'mammilla use of English hereNaJoinBell book use of English hereNaJoinGet use to it', '2020-10-19 15:11:48', '2020-10-19', 3, 'The students should be able to laughhereNaJoinAt the end of the lesson the student should be able to drivehereNaJoinAt the end of the lesson the student should be able to smoke', 'Macmillan English book 1 hereNaJoinMacmillan English book 3hereNaJoinMacmillan English book 2', 'WhatAreTheUsesOfPastTense_750.pnghereNaJoinWhatAreTheUsesOfPastTense_360.pnghereNaJoinWhatAreTheUsesOfPastTense_365.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower\r\n\r\nMCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually', 'Faded SkyBlu Denim Jeans', 'Delectus alias ut incidunt delectus nam placeat in consequatur. Sed cupiditate quia ea quis. Voluptas nemo qui aut distinctio. Cumque fugit earum est quam officiis numquam. Ducimus corporis autem at blanditiis beatae incidunt sunt.\r\n\r\nVoluptas saepe natus quidem blanditiis. Non sunt impedit voluptas mollitia beatae. Qui esse molestias. Laudantium libero nisi vitae debitis. Dolorem cupiditate est perferendis iusto.\r\n\r\nEum quia in. Magni quas ipsum a. Quis ex voluptatem inventore sint quia modi. Numquam est aut fuga mollitia exercitationem nam accusantium provident quia.', 'Neque saepe temporibus repellat ea ipsum et. Id vel et quia tempora facere reprehenderit', 'Ipsum in aspernatur ut possimus sint. Quia omnis est occaecati possimus ea. Quas molestiae perspiciatis occaecati qui rerum. Deleniti quod porro sed quisquam saepe. Numquam mollitia recusandae non ad at et a.\r\n\r\nAd vitae recusandae odit possimus. Quaerat cum ipsum corrupti. Odit qui asperiores ea corporis deserunt veritatis quidem expedita perferendis. Qui rerum eligendi ex doloribus quia sit. Porro rerum eum eum.', 'Being seen how is age diversity effecting change in fashion and beauty', 'Afashion season can be defined as much by the people on the catwalk as it can by the clothes they are wearing. This time around, a key moment came at the end of Marc Jacobs’ New York show, when an almost makeup-free Christy Turlington made a rare return to the catwalk, aged 50 (she also stars, with the designer himself, in the label’s AW ad campaign), where the average catwalk model is around 18.\r\n\r\nA few days later, Simone Rocha arguably upped the ante. The 32-year-old’s show – in part inspired by Louise Bourgeois, who lived until she was 98 – featured models in their 30s and 40s, including cult favourite Jeny Howorth and actor Chloë Sevigny.', 'Duis voluptatum. Id vis consequat consetetur dissentiet, ceteros commune perpetua mei et.', 'Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nOccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 3, 1);
INSERT INTO `lesson_plan` (`lesson_plan_id`, `topic`, `time_duration`, `methodology`, `previous_knowledge`, `subject_id`, `term_id`, `class_id`, `introduction`, `student_activities`, `summary`, `evaluation`, `conclusion`, `assignment`, `lpreferences`, `sys_date`, `date_added`, `gender`, `behaviouralObj`, `instructionalMtr`, `instructionalImages`, `intronote`, `topic_define`, `subtopic1`, `subtopic1body`, `subtopic2`, `subtopic2body`, `subtopic3`, `subtopic3body`, `pre_summary`, `pre_summarybody`, `week_id`, `publish`) VALUES
(4, 'Tonight Is Your Night', '30 Minutes', 'Listening method', 'The student have been taught to play in the class', 1, 2, 13, 'The teacher introduces the lesson by attacking the confidence of the school authority', 'The students must be kind of hot to participate the confraternity initiation', 'I think everyone can relate to the stress of cognitive overload, so its obvious that if we create something that works well for someone with a cognitive impairment, were going to be creating something which is going to be a pleasant experience for everyon', 'The teacher evaluate the lesson by given classwork', 'I think everyone can relate to the stress of cognitive overload, so its obvious that if we create something that works well for someone with a cognitive impairment.', 'What is a nounhereNaJoinList the behaviors of a nounhereNaJoinWho is the founder on pronounhereNaJoinKindly discuss the war zone', 'I think everyone can relate to the stress of cognitive hereNaJoinI think everyone can relate to the stress of cognitive hereNaJoinI think everyone can relate to the stress of cognitive', '2020-11-04 17:22:38', '2020-11-04', 3, 'At the end of this lesson the student should be able to shouthereNaJoinAt the end of this lesson the student should be able to shouthereNaJoinAt the end of this lesson the student should be able to sh', 'YouTube website download hereNaJoinAmazon web pages hereNaJoinGunman prestigious web site', 'TonightIsYourNight_750.jpghereNaJoinTonightIsYourNight_360.pnghereNaJoinTonightIsYourNight_365.png', 'Understanding accessibility, its scope, and its impact can make you a better web developer. This guide is intended to help you understand how you can make your websites accessible and usable for everyone.\r\n&amp;quot;Accessibility&amp;quot; can be difficult to spell, but it doesn\'t have to be difficult to accomplish. In this guide, you will see how to get some easy wins to help improve accessibility with minimal effort, how you can use what\'s built in to HTML to create more accessible and robust interfaces, and how to leverage some advanced techniques for creating polished accessible experiences.\r\nYou\'ll also find that many of these techniques will help you create interfaces that are more pleasant and easy to use for all users, not just for those with disabilities.', 'Broadly speaking, when we say a site is accessible, we mean that the site\'s content is available, and its functionality can be operated, by literally anyone. As developers, it\'s easy to assume that all users can see and use a keyboard, mouse, or touch screen, and can interact with your page content the same way you do. This can lead to an experience that works well for some people, but creates issues that range from simple annoyances to show-stoppers for others.', 'What is accessibility?', 'Broadly speaking, when we say a site is accessible, we mean that the site\'s content is available, and its functionality can be operated, by literally anyone. As developers, it\'s easy to assume that all users can see and use a keyboard, mouse, or touch screen, and can interact with your page content the same way you do. This can lead to an experience that works well for some people, but creates issues that range from simple annoyances to show-stoppers for others.\r\nAccessibility, then, refers to the experience of users who might be outside the narrow range of the &amp;quot;typical&amp;quot; user, who might access or interact with things differently than you expect. Specifically, it concerns users who are experiencing some type of impairment or disability — and bear in mind that that experience might be non-physical or temporary.\r\nFor example, although we tend to center our discussion of accessibility on users with physical impairments, we can all relate to the experience of using an interface that is not accessible to us for other reasons. Have you ever had a problem using a desktop site on a mobile phone, or seen the message &amp;quot;This content is not available in your area&amp;quot;, or been unable to find a familiar menu on a tablet? Those are all accessibility issues.\r\nAs you learn more, you\'ll find that addressing accessibility issues in this broader, more general sense almost always improves the user experience for everyone. Let\'s look at an example:', 'This form has several accessibility issues.', 'The text is low contrast, which is hard for low-vision users to read. Having labels on the left and fields on the right makes it hard for many people to associate them, and almost impossible for someone who needs to zoom in to use the page; imagine looking at this on a phone and having to pan around to figure out what goes with what. The &amp;quot;Remember details?&amp;quot; label isn\'t associated with the checkbox, so you have to tap or click only on the tiny square rather than just clicking the label; also, someone using a screen reader would have trouble figuring out the association.\r\nNow let\'s wave our accessibility wand and see the form with those issues fixed. We\'re going to make the text darker, modify the design so that the labels are close to the things they\'re labeling, and fix the label to be associated with the checkbox so you can toggle it by clicking the label as well.', 'Web Content Accessibility Guidelines', 'Now, it\'s actually pretty unusual to have literally no vision, but still, there\'s a good chance you know or have met at least one person who can\'t see at all. However there are also a much larger number of what we call low-vision users.\r\nThis is a broad range, from someone like my wife, who doesn\'t have any corneas — so while she can basically see things she has a hard time reading print and is considered legally blind — to someone who might have just poor vision and needs to wear very strong prescription glasses.\r\nThere\'s a huge range, and so naturally there\'s a big range of accommodations that people in this category use: some do use a screen reader or a braille display (I\'ve even heard of one woman who reads braille displayed on-screen because it\'s easier to see than printed text), or they might use text-to-speech technology without the full screen reader functionality, or they might use a screen magnifier which zooms in on part of the screen, or they might just use their browser zoom to make all the fonts bigger. They might also use high-contrast options like an operating system high-contrast mode, a high-contrast browser extension or a high-contrast theme for a website.', 'What kinds of impairments do users have?', 'Low vision is something a lot of people can relate to. For a start, we all experience deteriorating vision as we age, so even if you haven\'t experienced it there\'s a good chance you\'ve heard your parents complain about it. But a lot of people experience the frustration of taking their laptop out by a sunny window only to find they suddenly can\'t read anything! Or anyone who\'s had laser surgery or maybe just has to read something from across the room might have used one of those accommodations I mentioned. So I think it\'s pretty easy for developers to have some empathy for low-vision users.\r\nOh, and I shouldn\'t forget to mention people with poor color vision — about 9% of males have some form of color vision deficiency! Plus about 1% of females. They may have trouble distinguishing red and green, or yellow and blue. Think about that the next time you design form validation.\r\nWhat about motor impairments?\r\nYes, motor impairments, or dexterity impairments. This group ranges all the way from those who would prefer not to use a mouse, because perhaps they\'ve had some RSI or something and find it painful, to someone who may be physically paralyzed and have limited range of motion for certain parts of their body.', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `maintain`
--

CREATE TABLE `maintain` (
  `maintain_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sys_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintain`
--

INSERT INTO `maintain` (`maintain_id`, `username`, `password`, `sys_date`) VALUES
(1, 'bluemark1@gmail.com', '$2y$10$lr9P/qVeVj0Sr3iTadMCw.90w296EKgs9NrgFe9bzgXZKsYmB65PS', '2020-11-29 03:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `massage_board`
--

CREATE TABLE `massage_board` (
  `massage_board_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `massage` text NOT NULL,
  `subject_1` varchar(100) NOT NULL,
  `subject_2` varchar(100) NOT NULL,
  `subject_3` varchar(100) NOT NULL,
  `entrance_exam_date` datetime NOT NULL DEFAULT current_timestamp(),
  `oral_interview_date` datetime NOT NULL DEFAULT current_timestamp(),
  `admission_starts` datetime NOT NULL DEFAULT current_timestamp(),
  `admission_closes` datetime NOT NULL DEFAULT current_timestamp(),
  `teacher_msg` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `massage_board`
--

INSERT INTO `massage_board` (`massage_board_id`, `department_id`, `massage`, `subject_1`, `subject_2`, `subject_3`, `entrance_exam_date`, `oral_interview_date`, `admission_starts`, `admission_closes`, `teacher_msg`) VALUES
(1, 1, 'Several heads of Computer Science Department have recognized the long-term community benefits of such an event, as well as the unique nature of ISERVNG’s engagement model, which provides unique technological development opportunities on a scale without parallel in Katsina. This will be a ground-breaking partnership without precedent for the students and people of Katsina state, who by all accounts are currently experiencing considerable stresses and strains brought about by the almost-100%-theory-classes in their various institutions. It will enable the students, both new and old, to celebrate the unique nature of technology as well as explore what the future holds. ', 'MATHEMATICS', 'ENGLISH LANGUAGE', 'GENERAL PAPER', '2020-03-07 07:38:08', '2020-03-07 07:38:08', '2020-03-07 07:38:08', '2020-03-07 07:38:08', 'Our high impact, hands-on, project-based curriculum allows our alumni to build foundations to launch their careers, build their startups and achieve their goals. We infuse a passion for development and design into our community. ISERV started in 2013 initially in Provo, Utah but has quickly grown to numerous countries with six-course offerings; ISERV is the largest coding/technology school in the Utah West, and one of the highest rated coding schools in the country.'),
(2, 2, 'Several heads of Computer Science Department have recognized the long-term community benefits of such an event, as well as the unique nature of ISERVNG’s engagement model, which provides unique technological development opportunities on a scale without parallel in Katsina. This will be a ground-breaking partnership without precedent for the students and people of Katsina state, who by all accounts are currently experiencing considerable stresses and strains brought about by the almost-100%-theory-classes in their various institutions. It will enable the students, both new and old, to celebrate the unique nature of technology as well as explore what the future holds. ', 'MATHEMATICS', 'ENGLISH LANGUAGE', 'GENERAL PAPER', '2020-03-07 07:38:08', '2020-03-07 07:38:08', '2020-03-07 07:38:08', '2020-03-07 07:38:08', 'Our high impact, hands-on, project-based curriculum allows our alumni to build foundations to launch their careers, build their startups and achieve their goals. We infuse a passion for development and design into our community. ISERV started in 2013 initially in Provo, Utah but has quickly grown to numerous countries with six-course offerings; ISERV is the largest coding/technology school in the Utah West, and one of the highest rated coding schools in the country.'),
(3, 3, 'Several heads of Computer Science Department have recognized the long-term community benefits of such an event, as well as the unique nature of ISERVNG’s engagement model, which provides unique technological development opportunities on a scale without parallel in Katsina. This will be a ground-breaking partnership without precedent for the students and people of Katsina state, who by all accounts are currently experiencing considerable stresses and strains brought about by the almost-100%-theory-classes in their various institutions. It will enable the students, both new and old, to celebrate the unique nature of technology as well as explore what the future holds. ', 'MATHEMATICS', 'ENGLISH LANGUAGE', 'GENERAL PAPER', '2020-03-07 07:40:12', '2020-03-07 07:40:12', '2020-03-07 07:40:12', '2020-03-07 07:40:12', 'Our high impact, hands-on, project-based curriculum allows our alumni to build foundations to launch their careers, build their startups and achieve their goals. We infuse a passion for development and design into our community. ISERV started in 2013 initially in Provo, Utah but has quickly grown to numerous countries with six-course offerings; ISERV is the largest coding/technology school in the Utah West, and one of the highest rated coding schools in the country.');

-- --------------------------------------------------------

--
-- Table structure for table `myclasses_archive`
--

CREATE TABLE `myclasses_archive` (
  `myclasses_archive_id` int(11) NOT NULL,
  `active_class_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `admitted_date` date NOT NULL,
  `term_name` varchar(100) NOT NULL,
  `active_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myclasses_archive`
--

INSERT INTO `myclasses_archive` (`myclasses_archive_id`, `active_class_id`, `class_id`, `student_id`, `admitted_date`, `term_name`, `active_status`) VALUES
(1, 22, 14, 49, '2020-08-29', 'Second Term', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ndioga`
--

CREATE TABLE `ndioga` (
  `ndioga_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ndioga`
--

INSERT INTO `ndioga` (`ndioga_id`, `teacher_id`) VALUES
(1, 12),
(2, 25);

-- --------------------------------------------------------

--
-- Table structure for table `nry_recordsforaverageandgtotal`
--

CREATE TABLE `nry_recordsforaverageandgtotal` (
  `rid` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `record_date` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `gtotal` int(11) NOT NULL,
  `average` decimal(10,3) NOT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nry_recordsforaverageandgtotal`
--

INSERT INTO `nry_recordsforaverageandgtotal` (`rid`, `class_id`, `term_id`, `record_date`, `student_id`, `gtotal`, `average`, `position`) VALUES
(1, 1, 1, '2020-07-23', 31, 1227, '87.643', 1),
(2, 1, 1, '2020-07-23', 32, 1087, '77.643', 3),
(3, 1, 1, '2020-07-23', 33, 1077, '76.929', 4),
(4, 1, 1, '2020-07-23', 34, 1107, '79.071', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_on` datetime NOT NULL,
  `shipped_on` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `comments` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `auth_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_id` int(11) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `total_amount`, `created_on`, `shipped_on`, `status`, `comments`, `customer_id`, `auth_code`, `reference`, `shipping_id`, `tax_id`) VALUES
(1, '93.29', '2020-02-11 14:50:30', NULL, 0, NULL, 1, NULL, NULL, 0, 2),
(2, '77.38', '2020-02-12 11:18:09', NULL, 0, NULL, 1, NULL, NULL, 6, 2),
(3, '84.95', '2020-02-13 09:42:29', NULL, 0, NULL, 1, NULL, NULL, 6, 2),
(4, '27.94', '2020-02-13 11:08:00', NULL, 0, NULL, 1, NULL, NULL, 6, 2),
(5, '27.94', '2020-02-13 14:14:52', NULL, 0, '', 1, '', '', 6, 2),
(6, '14.95', '2020-02-13 16:21:54', NULL, 0, '', 1, '', '', 6, 2),
(7, '31.94', '2020-02-17 15:27:46', NULL, 0, NULL, 1, NULL, NULL, 6, 2),
(8, '77.78', '2020-02-26 04:20:55', NULL, 0, NULL, 1, NULL, NULL, 6, 2),
(9, '44.97', '2020-02-26 08:52:03', NULL, 0, NULL, 1, NULL, NULL, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attributes` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`item_id`, `order_id`, `product_id`, `attributes`, `product_name`, `quantity`, `unit_cost`) VALUES
(1, 1, 10, 'Color/Size: White/S', 'Haute Couture', 2, '14.95'),
(2, 1, 51, 'Color/Size: White/S', 'Tankanyika Giraffe', 1, '12.99'),
(3, 1, 101, 'Color/Size: White/S', 'The Promise of Spring', 1, '19.50'),
(4, 1, 10, 'Color/Size: Green/S', 'Haute Couture', 1, '14.95'),
(5, 1, 2, 'Color/Size: Yellow/XXL', 'Chartres Cathedral', 1, '15.95'),
(6, 2, 10, 'Color/Size: White/S', 'Haute Couture', 1, '14.95'),
(7, 2, 101, 'Color/Size: Green/S', 'The Promise of Spring', 1, '19.50'),
(8, 2, 36, 'Color/Size: White/S', 'Visit the Zoo', 1, '16.95'),
(9, 2, 51, 'Color/Size: Black/M', 'Tankanyika Giraffe', 1, '12.99'),
(10, 2, 51, 'Color/Size: White/S', 'Tankanyika Giraffe', 1, '12.99'),
(13, 3, 51, 'Color/Size: Red/L', 'Tankanyika Giraffe', 1, '12.99'),
(14, 3, 37, 'Color/Size: Red/L', 'Sambar', 2, '17.99'),
(15, 3, 84, 'Color/Size: Red/L', 'Mistletoe', 1, '17.99'),
(16, 3, 82, 'Color/Size: Red/L', 'Christmas Seal', 1, '17.99'),
(20, 4, 10, 'Color/Size: Green/L', 'Haute Couture', 1, '14.95'),
(21, 4, 51, 'Color/Size: Red/L', 'Tankanyika Giraffe', 1, '12.99'),
(23, 5, 10, 'Color/Size: Red/L', 'Haute Couture', 1, '14.95'),
(24, 5, 51, 'Color/Size: Red/L', 'Tankanyika Giraffe', 1, '12.99'),
(26, 6, 10, 'Color/Size: Red/L', 'Haute Couture', 1, '14.95'),
(27, 7, 10, 'Color/Size: Black/M', 'Haute Couture', 1, '14.95'),
(28, 7, 4, 'Color/Size: Indigo/L', 'Gallic Cock', 1, '16.99'),
(29, 8, 51, 'Color/Size: White/S', 'Tankanyika Giraffe', 1, '12.99'),
(30, 8, 69, 'Color/Size: White/S', 'Colombia Flower', 4, '12.95'),
(31, 8, 51, 'Color/Size: Indigo/S', 'Tankanyika Giraffe', 1, '12.99'),
(32, 9, 68, 'Color/Size: Red/L', 'Bulgarian Flower', 3, '14.99');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discounted_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display` smallint(6) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `price`, `discounted_price`, `image`, `image_2`, `thumbnail`, `display`) VALUES
(1, 'Arc d\'Triomphe', 'This beautiful and iconic T-shirt will no doubt lead you to your own triumph.', '14.99', '0.00', 'arc-d-triomphe.gif', 'arc-d-triomphe-2.gif', 'arc-d-triomphe-thumbnail.gif', 0),
(2, 'Chartres Cathedral', '\"The Fur Merchants\". Not all the beautiful stained glass in the great cathedrals depicts saints and angels! Lay aside your furs for the summer and wear this beautiful T-shirt!', '16.95', '15.95', 'chartres-cathedral.gif', 'chartres-cathedral-2.gif', 'chartres-cathedral-thumbnail.gif', 2),
(3, 'Coat of Arms', 'There\'s good reason why the ship plays a prominent part on this shield!', '14.50', '0.00', 'coat-of-arms.gif', 'coat-of-arms-2.gif', 'coat-of-arms-thumbnail.gif', 0),
(4, 'Gallic Cock', 'This fancy chicken is perhaps the most beloved of all French symbols. Unfortunately, there are only a few hundred left, so you\'d better get your T-shirt now!', '18.99', '16.99', 'gallic-cock.gif', 'gallic-cock-2.gif', 'gallic-cock-thumbnail.gif', 2),
(5, 'Marianne', 'She symbolizes the \"Triumph of the Republic\" and has been depicted many different ways in the history of France, as you will see below!', '15.95', '14.95', 'marianne.gif', 'marianne-2.gif', 'marianne-thumbnail.gif', 2),
(6, 'Alsace', 'It was in this region of France that Gutenberg perfected his movable type. If he could only see what he started!', '16.50', '0.00', 'alsace.gif', 'alsace-2.gif', 'alsace-thumbnail.gif', 0),
(7, 'Apocalypse Tapestry', 'One of the most famous tapestries of the Loire Valley, it dates from the 14th century. The T-shirt is of more recent vintage, however.', '20.00', '18.95', 'apocalypse-tapestry.gif', 'apocalypse-tapestry-2.gif', 'apocalypse-tapestry-thumbnail.gif', 0),
(8, 'Centaur', 'There were never any lady centaurs, so these guys had to mate with nymphs and mares. No wonder they were often in such bad moods!', '14.99', '0.00', 'centaur.gif', 'centaur-2.gif', 'centaur-thumbnail.gif', 0),
(9, 'Corsica', 'Borrowed from Spain, the \"Moor\'s head\" may have celebrated the Christians\' victory over the Moslems in that country.', '22.00', '0.00', 'corsica.gif', 'corsica-2.gif', 'corsica-thumbnail.gif', 0),
(10, 'Haute Couture', 'This stamp publicized the dress making industry. Use it to celebrate the T-shirt industry!', '15.99', '14.95', 'haute-couture.gif', 'haute-couture-2.gif', 'haute-couture-thumbnail.gif', 3),
(11, 'Iris', 'Iris was the Goddess of the Rainbow, daughter of the Titans Thaumas and Electra. Are you up to this T-shirt?!', '17.50', '0.00', 'iris.gif', 'iris-2.gif', 'iris-thumbnail.gif', 0),
(12, 'Lorraine', 'The largest American cemetery in France is located in Lorraine and most of the folks there still appreciate that fact.', '16.95', '0.00', 'lorraine.gif', 'lorraine-2.gif', 'lorraine-thumbnail.gif', 0),
(13, 'Mercury', 'Besides being the messenger of the gods, did you know that Mercury was also the god of profit and commerce? This T-shirt is for business owners!', '21.99', '18.95', 'mercury.gif', 'mercury-2.gif', 'mercury-thumbnail.gif', 2),
(14, 'County of Nice', 'Nice is so nice that it has been fought over for millennia, but now it all belongs to France.', '12.95', '0.00', 'county-of-nice.gif', 'county-of-nice-2.gif', 'county-of-nice-thumbnail.gif', 0),
(15, 'Notre Dame', 'Commemorating the 800th anniversary of the famed cathedral.', '18.50', '16.99', 'notre-dame.gif', 'notre-dame-2.gif', 'notre-dame-thumbnail.gif', 2),
(16, 'Paris Peace Conference', 'The resulting treaties allowed Italy, Romania, Hungary, Bulgaria, and Finland to reassume their responsibilities as sovereign states in international affairs and thus qualify for membership in the UN.', '16.95', '15.99', 'paris-peace-conference.gif', 'paris-peace-conference-2.gif', 'paris-peace-conference-thumbnail.gif', 2),
(17, 'Sarah Bernhardt', 'The \"Divine Sarah\" said this about Americans: \"You are younger than we as a race, you are perhaps barbaric, but what of it? You are still in the molding. Your spirit is superb. It is what helped us win the war.\" Perhaps we\'re still barbaric but we\'re still winning wars for them too!', '14.99', '0.00', 'sarah-bernhardt.gif', 'sarah-bernhardt-2.gif', 'sarah-bernhardt-thumbnail.gif', 0),
(18, 'Hunt', 'A scene from \"Les Tres Riches Heures,\" a medieval \"book of hours\" containing the text for each liturgical hour of the day. This scene is from a 14th century painting.', '16.99', '15.95', 'hunt.gif', 'hunt-2.gif', 'hunt-thumbnail.gif', 2),
(19, 'Italia', 'The War had just ended when this stamp was designed, and even so, there was enough optimism to show the destroyed oak tree sprouting again from its stump! What a beautiful T-shirt!', '22.00', '18.99', 'italia.gif', 'italia-2.gif', 'italia-thumbnail.gif', 2),
(20, 'Torch', 'The light goes on! Carry the torch with this T-shirt and be a beacon of hope for the world!', '19.99', '17.95', 'torch.gif', 'torch-2.gif', 'torch-thumbnail.gif', 2),
(21, 'Espresso', 'The winged foot of Mercury speeds the Special Delivery mail to its destination. In a hurry? This T-shirt is for you!', '16.95', '0.00', 'espresso.gif', 'espresso-2.gif', 'espresso-thumbnail.gif', 0),
(22, 'Galileo', 'This beautiful T-shirt does honor to one of Italy\'s (and the world\'s) most famous scientists. Show your appreciation for the education you\'ve received!', '14.99', '0.00', 'galileo.gif', 'galileo-2.gif', 'galileo-thumbnail.gif', 0),
(23, 'Italian Airmail', 'Thanks to modern Italian post, folks were able to reach out and touch each other. Or at least so implies this image. This is a very fast and friendly T-shirt--you\'ll make friends with it!', '21.00', '17.99', 'italian-airmail.gif', 'italian-airmail-2.gif', 'italian-airmail-thumbnail.gif', 0),
(24, 'Mazzini', 'Giuseppe Mazzini is considered one of the patron saints of the \"Risorgimiento.\" Wear this beautiful T-shirt to tell the world you agree!', '20.50', '18.95', 'mazzini.gif', 'mazzini-2.gif', 'mazzini-thumbnail.gif', 2),
(25, 'Romulus & Remus', 'Back in 753 BC, so the story goes, Romulus founded the city of Rome (in competition with Remus, who founded a city on another hill). Their adopted mother is shown in this image. When did they suspect they were adopted?', '17.99', '16.95', 'romulus-remus.gif', 'romulus-remus-2.gif', 'romulus-remus-thumbnail.gif', 2),
(26, 'Italy Maria', 'This beautiful image of the Virgin is from a work by Raphael, whose life and death it honors. It is one of our most popular T-shirts!', '14.00', '0.00', 'italy-maria.gif', 'italy-maria-2.gif', 'italy-maria-thumbnail.gif', 0),
(27, 'Italy Jesus', 'This image of Jesus teaching the gospel was issued to commemorate the third centenary of the \"propagation of the faith.\" Now you can do your part with this T-shirt!', '16.95', '0.00', 'italy-jesus.gif', 'italy-jesus-2.gif', 'italy-jesus-thumbnail.gif', 0),
(28, 'St. Francis', 'Here St. Francis is receiving his vision. This dramatic and attractive stamp was issued on the 700th anniversary of that event.', '22.00', '18.99', 'st-francis.gif', 'st-francis-2.gif', 'st-francis-thumbnail.gif', 2),
(29, 'Irish Coat of Arms', 'This was one of the first stamps of the new Irish Republic, and it makes a T-shirt you\'ll be proud to wear on St. Paddy\'s Day!', '14.99', '0.00', 'irish-coat-of-arms.gif', 'irish-coat-of-arms-2.gif', 'irish-coat-of-arms-thumbnail.gif', 0),
(30, 'Easter Rebellion', 'The Easter Rebellion of 1916 was a defining moment in Irish history. Although only a few hundred participated and the British squashed it in a week, its leaders were executed, which galvanized the uncommitted.', '19.00', '16.95', 'easter-rebellion.gif', 'easter-rebellion-2.gif', 'easter-rebellion-thumbnail.gif', 2),
(31, 'Guiness', 'Class! Who is this man and why is he important enough for his own T-shirt?!', '15.00', '0.00', 'guiness.gif', 'guiness-2.gif', 'guiness-thumbnail.gif', 0),
(32, 'St. Patrick', 'This stamp commemorated the 1500th anniversary of the revered saint\'s death. Is there a more perfect St. Patrick\'s Day T-shirt?!', '20.50', '17.95', 'st-patrick.gif', 'st-patrick-2.gif', 'st-patrick-thumbnail.gif', 0),
(33, 'St. Peter', 'This T-shirt commemorates the holy year of 1950.', '16.00', '14.95', 'st-peter.gif', 'st-peter-2.gif', 'st-peter-thumbnail.gif', 2),
(34, 'Sword of Light', 'This was the very first Irish postage stamp, and what a beautiful and cool T-shirt it makes for the Irish person in your life!', '14.99', '0.00', 'sword-of-light.gif', 'sword-of-light-2.gif', 'sword-of-light-thumbnail.gif', 0),
(35, 'Thomas Moore', 'One of the greatest if not the greatest of Irish poets and writers, Moore led a very interesting life, though plagued with tragedy in a somewhat typically Irish way. Remember \"The Last Rose of Summer\"?', '15.95', '14.99', 'thomas-moore.gif', 'thomas-moore-2.gif', 'thomas-moore-thumbnail.gif', 2),
(36, 'Visit the Zoo', 'This WPA poster is a wonderful example of the art produced by the Works Projects Administration during the Depression years. Do you feel like you sometimes live or work in a zoo? Then this T-shirt is for you!', '20.00', '16.95', 'visit-the-zoo.gif', 'visit-the-zoo-2.gif', 'visit-the-zoo-thumbnail.gif', 2),
(37, 'Sambar', 'This handsome Malayan Sambar was a pain in the neck to get to pose like this, and all so you could have this beautiful retro animal T-shirt!', '19.00', '17.99', 'sambar.gif', 'sambar-2.gif', 'sambar-thumbnail.gif', 2),
(38, 'Buffalo', 'Of all the critters in our T-shirt zoo, this is one of our most popular. A classic animal T-shirt for an individual like yourself!', '14.99', '0.00', 'buffalo.gif', 'buffalo-2.gif', 'buffalo-thumbnail.gif', 0),
(39, 'Mustache Monkey', 'This fellow is more than equipped to hang out with that tail of his, just like you\'ll be fit for hanging out with this great animal T-shirt!', '20.00', '17.95', 'mustache-monkey.gif', 'mustache-monkey-2.gif', 'mustache-monkey-thumbnail.gif', 2),
(40, 'Colobus', 'Why is he called \"Colobus,\" \"the mutilated one\"? He doesn\'t have a thumb, just four fingers! He is far from handicapped, however; his hands make him the great swinger he is. Speaking of swinging, that\'s what you\'ll do with this beautiful animal T-shirt!', '17.00', '15.99', 'colobus.gif', 'colobus-2.gif', 'colobus-thumbnail.gif', 2),
(41, 'Canada Goose', 'Being on a major flyway for these guys, we know all about these majestic birds. They hang out in large numbers on a lake near our house and fly over constantly. Remember what Frankie Lane said? \"I want to go where the wild goose goes!\" And when you go, wear this cool Canada goose animal T-shirt.', '15.99', '0.00', 'canada-goose.gif', 'canada-goose-2.gif', 'canada-goose-thumbnail.gif', 0),
(42, 'Congo Rhino', 'Among land mammals, this white rhino is surpassed in size only by the elephant. He has a big fan base too, working hard to make sure he sticks around. You\'ll be a fan of his, too, when people admire this unique and beautiful T-shirt on you!', '20.00', '18.99', 'congo-rhino.gif', 'congo-rhino-2.gif', 'congo-rhino-thumbnail.gif', 2),
(43, 'Equatorial Rhino', 'There\'s a lot going on in this frame! A black rhino is checking out that python slithering off into the bush--or is he eyeing you? You can bet all eyes will be on you when you wear this T-shirt!', '19.95', '17.95', 'equatorial-rhino.gif', 'equatorial-rhino-2.gif', 'equatorial-rhino-thumbnail.gif', 2),
(44, 'Ethiopian Rhino', 'Another white rhino is honored in this classic design that bespeaks the Africa of the early century. This pointillist and retro T-shirt will definitely turn heads!', '16.00', '0.00', 'ethiopian-rhino.gif', 'ethiopian-rhino-2.gif', 'ethiopian-rhino-thumbnail.gif', 0),
(45, 'Dutch Sea Horse', 'I think this T-shirt is destined to be one of our most popular simply because it is one of our most beautiful!', '12.50', '0.00', 'dutch-sea-horse.gif', 'dutch-sea-horse-2.gif', 'dutch-sea-horse-thumbnail.gif', 0),
(46, 'Dutch Swans', 'This stamp was designed in the middle of the Nazi occupation, as was the one above. Together they reflect a spirit of beauty that evil could not suppress. Both of these T-shirts will make it impossible to suppress your artistic soul, too!', '21.00', '18.99', 'dutch-swans.gif', 'dutch-swans-2.gif', 'dutch-swans-thumbnail.gif', 2),
(47, 'Ethiopian Elephant', 'From the same series as the Ethiopian Rhino and the Ostriches, this stylish elephant T-shirt will mark you as a connoisseur of good taste!', '18.99', '16.95', 'ethiopian-elephant.gif', 'ethiopian-elephant-2.gif', 'ethiopian-elephant-thumbnail.gif', 2),
(48, 'Laotian Elephant', 'This working guy is proud to have his own stamp, and now he has his own T-shirt!', '21.00', '18.99', 'laotian-elephant.gif', 'laotian-elephant-2.gif', 'laotian-elephant-thumbnail.gif', 0),
(49, 'Liberian Elephant', 'And yet another Jumbo! You need nothing but a big heart to wear this T-shirt (or a big sense of style)!', '22.00', '17.50', 'liberian-elephant.gif', 'liberian-elephant-2.gif', 'liberian-elephant-thumbnail.gif', 2),
(50, 'Somali Ostriches', 'Another in an old series of beautiful stamps from Ethiopia. These big birds pack quite a wallop, and so will you when you wear this uniquely retro T-shirt!', '12.95', '0.00', 'somali-ostriches.gif', 'somali-ostriches-2.gif', 'somali-ostriches-thumbnail.gif', 0),
(51, 'Tankanyika Giraffe', 'The photographer had to stand on a step ladder for this handsome portrait, but his efforts paid off with an angle we seldom see of this lofty creature. This beautiful retro T-shirt would make him proud!', '15.00', '12.99', 'tankanyika-giraffe.gif', 'tankanyika-giraffe-2.gif', 'tankanyika-giraffe-thumbnail.gif', 3),
(52, 'Ifni Fish', 'This beautiful stamp was issued to commemorate National Colonial Stamp Day (you can do that when you have a colony). When you wear this fancy fish T-shirt, your friends will think it\'s national T-shirt day!', '14.00', '0.00', 'ifni-fish.gif', 'ifni-fish-2.gif', 'ifni-fish-thumbnail.gif', 0),
(53, 'Sea Gull', 'A beautiful stamp from a small enclave in southern Morocco that belonged to Spain until 1969 makes a beautiful bird T-shirt.', '19.00', '16.95', 'sea-gull.gif', 'sea-gull-2.gif', 'sea-gull-thumbnail.gif', 2),
(54, 'King Salmon', 'You can fish them and eat them and now you can wear them with this classic animal T-shirt.', '17.95', '15.99', 'king-salmon.gif', 'king-salmon-2.gif', 'king-salmon-thumbnail.gif', 2),
(55, 'Laos Bird', 'This fellow is also known as the \"White Crested Laughing Thrush.\" What\'s he laughing at? Why, at the joy of being on your T-shirt!', '12.00', '0.00', 'laos-bird.gif', 'laos-bird-2.gif', 'laos-bird-thumbnail.gif', 0),
(56, 'Mozambique Lion', 'The Portuguese were too busy to run this colony themselves so they gave the Mozambique Company a charter to do it. I think there must be some pretty curious history related to that (the charter only lasted for 50 years)! If you\'re a Leo, or know a Leo, you should seriously consider this T-shirt!', '15.99', '14.95', 'mozambique-lion.gif', 'mozambique-lion-2.gif', 'mozambique-lion-thumbnail.gif', 2),
(57, 'Peru Llama', 'This image is nearly 100 years old! Little did this little llama realize that he was going to be made immortal on the Web and on this very unique animal T-shirt (actually, little did he know at all)!', '21.50', '17.99', 'peru-llama.gif', 'peru-llama-2.gif', 'peru-llama-thumbnail.gif', 2),
(58, 'Romania Alsatian', 'If you know and love this breed, there\'s no reason in the world that you shouldn\'t buy this T-shirt right now!', '15.95', '0.00', 'romania-alsatian.gif', 'romania-alsatian-2.gif', 'romania-alsatian-thumbnail.gif', 0),
(59, 'Somali Fish', 'This is our most popular fish T-shirt, hands down. It\'s a beauty, and if you wear this T-shirt, you\'ll be letting the world know you\'re a fine catch!', '19.95', '16.95', 'somali-fish.gif', 'somali-fish-2.gif', 'somali-fish-thumbnail.gif', 2),
(60, 'Trout', 'This beautiful image will warm the heart of any fisherman! You must know one if you\'re not one yourself, so you must buy this T-shirt!', '14.00', '0.00', 'trout.gif', 'trout-2.gif', 'trout-thumbnail.gif', 0),
(61, 'Baby Seal', 'Ahhhhhh! This little harp seal would really prefer not to be your coat! But he would like to be your T-shirt!', '21.00', '18.99', 'baby-seal.gif', 'baby-seal-2.gif', 'baby-seal-thumbnail.gif', 2),
(62, 'Musk Ox', 'Some critters you just don\'t want to fool with, and if I were facing this fellow I\'d politely give him the trail! That is, of course, unless I were wearing this T-shirt.', '15.50', '0.00', 'musk-ox.gif', 'musk-ox-2.gif', 'musk-ox-thumbnail.gif', 0),
(63, 'Suvla Bay', ' In 1915, Newfoundland sent its Newfoundland Regiment to Suvla Bay in Gallipoli to fight the Turks. This classic image does them honor. Have you ever heard of them? Share the news with this great T-shirt!', '12.99', '0.00', 'suvla-bay.gif', 'suvla-bay-2.gif', 'suvla-bay-thumbnail.gif', 0),
(64, 'Caribou', 'There was a time when Newfoundland was a self-governing dominion of the British Empire, so it printed its own postage. The themes are as typically Canadian as can be, however, as shown by this \"King of the Wilde\" T-shirt!', '21.00', '19.95', 'caribou.gif', 'caribou-2.gif', 'caribou-thumbnail.gif', 2),
(65, 'Afghan Flower', 'This beautiful image was issued to celebrate National Teachers Day. Perhaps you know a teacher who would love this T-shirt?', '18.50', '16.99', 'afghan-flower.gif', 'afghan-flower-2.gif', 'afghan-flower-thumbnail.gif', 2),
(66, 'Albania Flower', 'Well, these crab apples started out as flowers, so that\'s close enough for us! They still make for a uniquely beautiful T-shirt.', '16.00', '14.95', 'albania-flower.gif', 'albania-flower-2.gif', 'albania-flower-thumbnail.gif', 2),
(67, 'Austria Flower', 'Have you ever had nasturtiums on your salad? Try it--they\'re almost as good as having them on your T-shirt!', '12.99', '0.00', 'austria-flower.gif', 'austria-flower-2.gif', 'austria-flower-thumbnail.gif', 0),
(68, 'Bulgarian Flower', 'For your interest (and to impress your friends), this beautiful stamp was issued to honor the George Dimitrov state printing works. You\'ll need to know this when you wear the T-shirt.', '16.00', '14.99', 'bulgarian-flower.gif', 'bulgarian-flower-2.gif', 'bulgarian-flower-thumbnail.gif', 2),
(69, 'Colombia Flower', 'Celebrating the 75th anniversary of the Universal Postal Union, a date to mark on your calendar and on which to wear this T-shirt!', '14.50', '12.95', 'colombia-flower.gif', 'colombia-flower-2.gif', 'colombia-flower-thumbnail.gif', 1),
(70, 'Congo Flower', 'The Congo is not at a loss for beautiful flowers, and we\'ve picked a few of them for your T-shirts.', '21.00', '17.99', 'congo-flower.gif', 'congo-flower-2.gif', 'congo-flower-thumbnail.gif', 2),
(71, 'Costa Rica Flower', 'This national flower of Costa Rica is one of our most beloved flower T-shirts (you can see one on Jill, above). You will surely stand out in this T-shirt!', '12.99', '0.00', 'costa-rica-flower.gif', 'costa-rica-flower.gif', 'costa-rica-flower-thumbnail.gif', 0),
(72, 'Gabon Flower', 'The combretum, also known as \"jungle weed,\" is used in China as a cure for opium addiction. Unfortunately, when you wear this T-shirt, others may become hopelessly addicted to you!', '19.00', '16.95', 'gabon-flower.gif', 'gabon-flower-2.gif', 'gabon-flower-thumbnail.gif', 2),
(73, 'Ghana Flower', 'This is one of the first gingers to bloom in the spring--just like you when you wear this T-shirt!', '21.00', '18.99', 'ghana-flower.gif', 'ghana-flower-2.gif', 'ghana-flower-thumbnail.gif', 2),
(74, 'Israel Flower', 'This plant is native to the rocky and sandy regions of the western United States, so when you come across one, it really stands out. And so will you when you put on this beautiful T-shirt!', '19.50', '17.50', 'israel-flower.gif', 'israel-flower-2.gif', 'israel-flower-thumbnail.gif', 2),
(75, 'Poland Flower', 'A beautiful and sunny T-shirt for both spring and summer!', '16.95', '15.99', 'poland-flower.gif', 'poland-flower-2.gif', 'poland-flower-thumbnail.gif', 2),
(76, 'Romania Flower', 'Also known as the spring pheasant\'s eye, this flower belongs on your T-shirt this summer to help you catch a few eyes.', '12.95', '0.00', 'romania-flower.gif', 'romania-flower-2.gif', 'romania-flower-thumbnail.gif', 0),
(77, 'Russia Flower', 'Someone out there who can speak Russian needs to tell me what this plant is. I\'ll sell you the T-shirt for $10 if you can!', '21.00', '18.95', 'russia-flower.gif', 'russia-flower-2.gif', 'russia-flower-thumbnail.gif', 0),
(78, 'San Marino Flower', '\"A white sport coat and a pink carnation, I\'m all dressed up for the dance!\" Well, how about a white T-shirt and a pink carnation?!', '19.95', '17.99', 'san-marino-flower.gif', 'san-marino-flower-2.gif', 'san-marino-flower-thumbnail.gif', 2),
(79, 'Uruguay Flower', 'The Indian Queen Anahi was the ugliest woman ever seen. But instead of living a slave when captured by the Conquistadores, she immolated herself in a fire and was reborn the most beautiful of flowers: the ceibo, national flower of Uruguay. Of course, you won\'t need to burn to wear this T-shirt, but you may cause some pretty hot glances to be thrown your way!', '17.99', '16.99', 'uruguay-flower.gif', 'uruguay-flower-2.gif', 'uruguay-flower-thumbnail.gif', 2),
(80, 'Snow Deer', 'Tarmo has produced some wonderful Christmas T-shirts for us, and we hope to have many more soon.', '21.00', '18.95', 'snow-deer.gif', 'snow-deer-2.gif', 'snow-deer-thumbnail.gif', 2),
(81, 'Holly Cat', 'Few things make a cat happier at Christmas than a tree suddenly appearing in the house!', '15.99', '0.00', 'holly-cat.gif', 'holly-cat-2.gif', 'holly-cat-thumbnail.gif', 0),
(82, 'Christmas Seal', 'Is this your grandmother? It could be, you know, and I\'d bet she\'d recognize the Christmas seal on this cool Christmas T-shirt.', '19.99', '17.99', 'christmas-seal.gif', 'christmas-seal-2.gif', 'christmas-seal-thumbnail.gif', 2),
(83, 'Weather Vane', 'This weather vane dates from the 1830\'s and is still showing which way the wind blows! Trumpet your arrival with this unique Christmas T-shirt.', '15.95', '14.99', 'weather-vane.gif', 'weather-vane-2.gif', 'weather-vane-thumbnail.gif', 2),
(84, 'Mistletoe', 'This well-known parasite and killer of trees was revered by the Druids, who would go out and gather it with great ceremony. Youths would go about with it to announce the new year. Eventually more engaging customs were attached to the strange plant, and we\'re here to see that they continue with these cool Christmas T-shirts.', '19.00', '17.99', 'mistletoe.gif', 'mistletoe-2.gif', 'mistletoe-thumbnail.gif', 3),
(85, 'Altar Piece', 'This beautiful angel Christmas T-shirt is awaiting the opportunity to adorn your chest!', '20.50', '18.50', 'altar-piece.gif', 'altar-piece-2.gif', 'altar-piece-thumbnail.gif', 2),
(86, 'The Three Wise Men', 'This is a classic rendition of one of the season’s most beloved stories, and now showing on a Christmas T-shirt for you!', '12.99', '0.00', 'the-three-wise-men.gif', 'the-three-wise-men-2.gif', 'the-three-wise-men-thumbnail.gif', 0),
(87, 'Christmas Tree', 'Can you get more warm and folksy than this classic Christmas T-shirt?', '20.00', '17.95', 'christmas-tree.gif', 'christmas-tree-2.gif', 'christmas-tree-thumbnail.gif', 2),
(88, 'Madonna & Child', 'This exquisite image was painted by Filipino Lippi, a 15th century Italian artist. I think he would approve of it on a Going Postal Christmas T-shirt!', '21.95', '18.50', 'madonna-child.gif', 'madonna-child-2.gif', 'madonna-child-thumbnail.gif', 0),
(89, 'The Virgin Mary', 'This stained glass window is found in Glasgow Cathedral, Scotland, and was created by Gabriel Loire of France, one of the most prolific of artists in this medium--and now you can have it on this wonderful Christmas T-shirt.', '16.95', '15.95', 'the-virgin-mary.gif', 'the-virgin-mary-2.gif', 'the-virgin-mary-thumbnail.gif', 2),
(90, 'Adoration of the Kings', 'This design is from a miniature in the Evangelistary of Matilda in Nonantola Abbey, from the 12th century. As a Christmas T-shirt, it will cause you to be adored!', '17.50', '16.50', 'adoration-of-the-kings.gif', 'adoration-of-the-kings-2.gif', 'adoration-of-the-kings-thumbnail.gif', 2),
(91, 'A Partridge in a Pear Tree', 'The original of this beautiful stamp is by Jamie Wyeth and is in the National Gallery of Art. The next best is on our beautiful Christmas T-shirt!', '14.99', '0.00', 'a-partridge-in-a-pear-tree.gif', 'a-partridge-in-a-pear-tree-2.gif', 'a-partridge-in-a-pear-tree-thumbnail.gif', 0),
(92, 'St. Lucy', 'This is a tiny detail of a large work called \"Mary, Queen of Heaven,\" done in 1480 by a Flemish master known only as \"The Master of St. Lucy Legend.\" The original is in a Bruges church. The not-quite-original is on this cool Christmas T-shirt.', '18.95', '0.00', 'st-lucy.gif', 'st-lucy-2.gif', 'st-lucy-thumbnail.gif', 0),
(93, 'St. Lucia', 'Saint Lucia\'s tradition is an important part of Swedish Christmas, and an important part of that are the candles. Next to the candles in importance is this popular Christmas T-shirt!', '19.00', '17.95', 'st-lucia.gif', 'st-lucia-2.gif', 'st-lucia-thumbnail.gif', 2),
(94, 'Swede Santa', 'Santa as a child. You must know a child who would love this cool Christmas T-shirt!?', '21.00', '18.50', 'swede-santa.gif', 'swede-santa-2.gif', 'swede-santa-thumbnail.gif', 2),
(95, 'Wreath', 'Hey! I\'ve got an idea! Why not buy two of these cool Christmas T-shirts so you can wear one and tack the other one to your door?!', '18.99', '16.99', 'wreath.gif', 'wreath-2.gif', 'wreath-thumbnail.gif', 2),
(96, 'Love', 'Here\'s a Valentine\'s day T-shirt that will let you say it all in just one easy glance--there\'s no mistake about it!', '19.00', '17.50', 'love.gif', 'love-2.gif', 'love-thumbnail.gif', 2),
(97, 'Birds', 'Is your heart all aflutter? Show it with this T-shirt!', '21.00', '18.95', 'birds.gif', 'birds-2.gif', 'birds-thumbnail.gif', 2),
(98, 'Kat Over New Moon', 'Love making you feel lighthearted?', '14.99', '0.00', 'kat-over-new-moon.gif', 'kat-over-new-moon-2.gif', 'kat-over-new-moon-thumbnail.gif', 0),
(99, 'Thrilling Love', 'This girl\'s got her hockey hunk right where she wants him!', '21.00', '18.50', 'thrilling-love.gif', 'thrilling-love-2.gif', 'thrilling-love-thumbnail.gif', 2),
(100, 'The Rapture of Psyche', 'Now we\'re getting a bit more serious!', '18.95', '16.99', 'the-rapture-of-psyche.gif', 'the-rapture-of-psyche-2.gif', 'the-rapture-of-psyche-thumbnail.gif', 2),
(101, 'The Promise of Spring', 'With Valentine\'s Day come, can Spring be far behind?', '21.00', '19.50', 'the-promise-of-spring.gif', 'the-promise-of-spring-2.gif', 'the-promise-of-spring-thumbnail.gif', 1),
(102, 'BangisVal', 'I love BangiVal seasons', '12.90', '0.00', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE `product_attribute` (
  `product_id` int(11) NOT NULL,
  `attribute_value_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_attribute`
--

INSERT INTO `product_attribute` (`product_id`, `attribute_value_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 14),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 11),
(6, 12),
(6, 13),
(6, 14),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(7, 8),
(7, 9),
(7, 10),
(7, 11),
(7, 12),
(7, 13),
(7, 14),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(8, 6),
(8, 7),
(8, 8),
(8, 9),
(8, 10),
(8, 11),
(8, 12),
(8, 13),
(8, 14),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(9, 6),
(9, 7),
(9, 8),
(9, 9),
(9, 10),
(9, 11),
(9, 12),
(9, 13),
(9, 14),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(10, 7),
(10, 8),
(10, 9),
(10, 10),
(10, 11),
(10, 12),
(10, 13),
(10, 14),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(11, 8),
(11, 9),
(11, 10),
(11, 11),
(11, 12),
(11, 13),
(11, 14),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 5),
(12, 6),
(12, 7),
(12, 8),
(12, 9),
(12, 10),
(12, 11),
(12, 12),
(12, 13),
(12, 14),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(13, 5),
(13, 6),
(13, 7),
(13, 8),
(13, 9),
(13, 10),
(13, 11),
(13, 12),
(13, 13),
(13, 14),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(14, 5),
(14, 6),
(14, 7),
(14, 8),
(14, 9),
(14, 10),
(14, 11),
(14, 12),
(14, 13),
(14, 14),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(15, 6),
(15, 7),
(15, 8),
(15, 9),
(15, 10),
(15, 11),
(15, 12),
(15, 13),
(15, 14),
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(16, 6),
(16, 7),
(16, 8),
(16, 9),
(16, 10),
(16, 11),
(16, 12),
(16, 13),
(16, 14),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(17, 6),
(17, 7),
(17, 8),
(17, 9),
(17, 10),
(17, 11),
(17, 12),
(17, 13),
(17, 14),
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(18, 6),
(18, 7),
(18, 8),
(18, 9),
(18, 10),
(18, 11),
(18, 12),
(18, 13),
(18, 14),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(19, 6),
(19, 7),
(19, 8),
(19, 9),
(19, 10),
(19, 11),
(19, 12),
(19, 13),
(19, 14),
(20, 1),
(20, 2),
(20, 3),
(20, 4),
(20, 5),
(20, 6),
(20, 7),
(20, 8),
(20, 9),
(20, 10),
(20, 11),
(20, 12),
(20, 13),
(20, 14),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(21, 5),
(21, 6),
(21, 7),
(21, 8),
(21, 9),
(21, 10),
(21, 11),
(21, 12),
(21, 13),
(21, 14),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(22, 5),
(22, 6),
(22, 7),
(22, 8),
(22, 9),
(22, 10),
(22, 11),
(22, 12),
(22, 13),
(22, 14),
(23, 1),
(23, 2),
(23, 3),
(23, 4),
(23, 5),
(23, 6),
(23, 7),
(23, 8),
(23, 9),
(23, 10),
(23, 11),
(23, 12),
(23, 13),
(23, 14),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(24, 5),
(24, 6),
(24, 7),
(24, 8),
(24, 9),
(24, 10),
(24, 11),
(24, 12),
(24, 13),
(24, 14),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(25, 6),
(25, 7),
(25, 8),
(25, 9),
(25, 10),
(25, 11),
(25, 12),
(25, 13),
(25, 14),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(26, 5),
(26, 6),
(26, 7),
(26, 8),
(26, 9),
(26, 10),
(26, 11),
(26, 12),
(26, 13),
(26, 14),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(27, 5),
(27, 6),
(27, 7),
(27, 8),
(27, 9),
(27, 10),
(27, 11),
(27, 12),
(27, 13),
(27, 14),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(28, 5),
(28, 6),
(28, 7),
(28, 8),
(28, 9),
(28, 10),
(28, 11),
(28, 12),
(28, 13),
(28, 14),
(29, 1),
(29, 2),
(29, 3),
(29, 4),
(29, 5),
(29, 6),
(29, 7),
(29, 8),
(29, 9),
(29, 10),
(29, 11),
(29, 12),
(29, 13),
(29, 14),
(30, 1),
(30, 2),
(30, 3),
(30, 4),
(30, 5),
(30, 6),
(30, 7),
(30, 8),
(30, 9),
(30, 10),
(30, 11),
(30, 12),
(30, 13),
(30, 14),
(31, 1),
(31, 2),
(31, 3),
(31, 4),
(31, 5),
(31, 6),
(31, 7),
(31, 8),
(31, 9),
(31, 10),
(31, 11),
(31, 12),
(31, 13),
(31, 14),
(32, 1),
(32, 2),
(32, 3),
(32, 4),
(32, 5),
(32, 6),
(32, 7),
(32, 8),
(32, 9),
(32, 10),
(32, 11),
(32, 12),
(32, 13),
(32, 14),
(33, 1),
(33, 2),
(33, 3),
(33, 4),
(33, 5),
(33, 6),
(33, 7),
(33, 8),
(33, 9),
(33, 10),
(33, 11),
(33, 12),
(33, 13),
(33, 14),
(34, 1),
(34, 2),
(34, 3),
(34, 4),
(34, 5),
(34, 6),
(34, 7),
(34, 8),
(34, 9),
(34, 10),
(34, 11),
(34, 12),
(34, 13),
(34, 14),
(35, 1),
(35, 2),
(35, 3),
(35, 4),
(35, 5),
(35, 6),
(35, 7),
(35, 8),
(35, 9),
(35, 10),
(35, 11),
(35, 12),
(35, 13),
(35, 14),
(36, 1),
(36, 2),
(36, 3),
(36, 4),
(36, 5),
(36, 6),
(36, 7),
(36, 8),
(36, 9),
(36, 10),
(36, 11),
(36, 12),
(36, 13),
(36, 14),
(37, 1),
(37, 2),
(37, 3),
(37, 4),
(37, 5),
(37, 6),
(37, 7),
(37, 8),
(37, 9),
(37, 10),
(37, 11),
(37, 12),
(37, 13),
(37, 14),
(38, 1),
(38, 2),
(38, 3),
(38, 4),
(38, 5),
(38, 6),
(38, 7),
(38, 8),
(38, 9),
(38, 10),
(38, 11),
(38, 12),
(38, 13),
(38, 14),
(39, 1),
(39, 2),
(39, 3),
(39, 4),
(39, 5),
(39, 6),
(39, 7),
(39, 8),
(39, 9),
(39, 10),
(39, 11),
(39, 12),
(39, 13),
(39, 14),
(40, 1),
(40, 2),
(40, 3),
(40, 4),
(40, 5),
(40, 6),
(40, 7),
(40, 8),
(40, 9),
(40, 10),
(40, 11),
(40, 12),
(40, 13),
(40, 14),
(41, 1),
(41, 2),
(41, 3),
(41, 4),
(41, 5),
(41, 6),
(41, 7),
(41, 8),
(41, 9),
(41, 10),
(41, 11),
(41, 12),
(41, 13),
(41, 14),
(42, 1),
(42, 2),
(42, 3),
(42, 4),
(42, 5),
(42, 6),
(42, 7),
(42, 8),
(42, 9),
(42, 10),
(42, 11),
(42, 12),
(42, 13),
(42, 14),
(43, 1),
(43, 2),
(43, 3),
(43, 4),
(43, 5),
(43, 6),
(43, 7),
(43, 8),
(43, 9),
(43, 10),
(43, 11),
(43, 12),
(43, 13),
(43, 14),
(44, 1),
(44, 2),
(44, 3),
(44, 4),
(44, 5),
(44, 6),
(44, 7),
(44, 8),
(44, 9),
(44, 10),
(44, 11),
(44, 12),
(44, 13),
(44, 14),
(45, 1),
(45, 2),
(45, 3),
(45, 4),
(45, 5),
(45, 6),
(45, 7),
(45, 8),
(45, 9),
(45, 10),
(45, 11),
(45, 12),
(45, 13),
(45, 14),
(46, 1),
(46, 2),
(46, 3),
(46, 4),
(46, 5),
(46, 6),
(46, 7),
(46, 8),
(46, 9),
(46, 10),
(46, 11),
(46, 12),
(46, 13),
(46, 14),
(47, 1),
(47, 2),
(47, 3),
(47, 4),
(47, 5),
(47, 6),
(47, 7),
(47, 8),
(47, 9),
(47, 10),
(47, 11),
(47, 12),
(47, 13),
(47, 14),
(48, 1),
(48, 2),
(48, 3),
(48, 4),
(48, 5),
(48, 6),
(48, 7),
(48, 8),
(48, 9),
(48, 10),
(48, 11),
(48, 12),
(48, 13),
(48, 14),
(49, 1),
(49, 2),
(49, 3),
(49, 4),
(49, 5),
(49, 6),
(49, 7),
(49, 8),
(49, 9),
(49, 10),
(49, 11),
(49, 12),
(49, 13),
(49, 14),
(50, 1),
(50, 2),
(50, 3),
(50, 4),
(50, 5),
(50, 6),
(50, 7),
(50, 8),
(50, 9),
(50, 10),
(50, 11),
(50, 12),
(50, 13),
(50, 14),
(51, 1),
(51, 2),
(51, 3),
(51, 4),
(51, 5),
(51, 6),
(51, 7),
(51, 8),
(51, 9),
(51, 10),
(51, 11),
(51, 12),
(51, 13),
(51, 14),
(52, 1),
(52, 2),
(52, 3),
(52, 4),
(52, 5),
(52, 6),
(52, 7),
(52, 8),
(52, 9),
(52, 10),
(52, 11),
(52, 12),
(52, 13),
(52, 14),
(53, 1),
(53, 2),
(53, 3),
(53, 4),
(53, 5),
(53, 6),
(53, 7),
(53, 8),
(53, 9),
(53, 10),
(53, 11),
(53, 12),
(53, 13),
(53, 14),
(54, 1),
(54, 2),
(54, 3),
(54, 4),
(54, 5),
(54, 6),
(54, 7),
(54, 8),
(54, 9),
(54, 10),
(54, 11),
(54, 12),
(54, 13),
(54, 14),
(55, 1),
(55, 2),
(55, 3),
(55, 4),
(55, 5),
(55, 6),
(55, 7),
(55, 8),
(55, 9),
(55, 10),
(55, 11),
(55, 12),
(55, 13),
(55, 14),
(56, 1),
(56, 2),
(56, 3),
(56, 4),
(56, 5),
(56, 6),
(56, 7),
(56, 8),
(56, 9),
(56, 10),
(56, 11),
(56, 12),
(56, 13),
(56, 14),
(57, 1),
(57, 2),
(57, 3),
(57, 4),
(57, 5),
(57, 6),
(57, 7),
(57, 8),
(57, 9),
(57, 10),
(57, 11),
(57, 12),
(57, 13),
(57, 14),
(58, 1),
(58, 2),
(58, 3),
(58, 4),
(58, 5),
(58, 6),
(58, 7),
(58, 8),
(58, 9),
(58, 10),
(58, 11),
(58, 12),
(58, 13),
(58, 14),
(59, 1),
(59, 2),
(59, 3),
(59, 4),
(59, 5),
(59, 6),
(59, 7),
(59, 8),
(59, 9),
(59, 10),
(59, 11),
(59, 12),
(59, 13),
(59, 14),
(60, 1),
(60, 2),
(60, 3),
(60, 4),
(60, 5),
(60, 6),
(60, 7),
(60, 8),
(60, 9),
(60, 10),
(60, 11),
(60, 12),
(60, 13),
(60, 14),
(61, 1),
(61, 2),
(61, 3),
(61, 4),
(61, 5),
(61, 6),
(61, 7),
(61, 8),
(61, 9),
(61, 10),
(61, 11),
(61, 12),
(61, 13),
(61, 14),
(62, 1),
(62, 2),
(62, 3),
(62, 4),
(62, 5),
(62, 6),
(62, 7),
(62, 8),
(62, 9),
(62, 10),
(62, 11),
(62, 12),
(62, 13),
(62, 14),
(63, 1),
(63, 2),
(63, 3),
(63, 4),
(63, 5),
(63, 6),
(63, 7),
(63, 8),
(63, 9),
(63, 10),
(63, 11),
(63, 12),
(63, 13),
(63, 14),
(64, 1),
(64, 2),
(64, 3),
(64, 4),
(64, 5),
(64, 6),
(64, 7),
(64, 8),
(64, 9),
(64, 10),
(64, 11),
(64, 12),
(64, 13),
(64, 14),
(65, 1),
(65, 2),
(65, 3),
(65, 4),
(65, 5),
(65, 6),
(65, 7),
(65, 8),
(65, 9),
(65, 10),
(65, 11),
(65, 12),
(65, 13),
(65, 14),
(66, 1),
(66, 2),
(66, 3),
(66, 4),
(66, 5),
(66, 6),
(66, 7),
(66, 8),
(66, 9),
(66, 10),
(66, 11),
(66, 12),
(66, 13),
(66, 14),
(67, 1),
(67, 2),
(67, 3),
(67, 4),
(67, 5),
(67, 6),
(67, 7),
(67, 8),
(67, 9),
(67, 10),
(67, 11),
(67, 12),
(67, 13),
(67, 14),
(68, 1),
(68, 2),
(68, 3),
(68, 4),
(68, 5),
(68, 6),
(68, 7),
(68, 8),
(68, 9),
(68, 10),
(68, 11),
(68, 12),
(68, 13),
(68, 14),
(69, 1),
(69, 2),
(69, 3),
(69, 4),
(69, 5),
(69, 6),
(69, 7),
(69, 8),
(69, 9),
(69, 10),
(69, 11),
(69, 12),
(69, 13),
(69, 14),
(70, 1),
(70, 2),
(70, 3),
(70, 4),
(70, 5),
(70, 6),
(70, 7),
(70, 8),
(70, 9),
(70, 10),
(70, 11),
(70, 12),
(70, 13),
(70, 14),
(71, 1),
(71, 2),
(71, 3),
(71, 4),
(71, 5),
(71, 6),
(71, 7),
(71, 8),
(71, 9),
(71, 10),
(71, 11),
(71, 12),
(71, 13),
(71, 14),
(72, 1),
(72, 2),
(72, 3),
(72, 4),
(72, 5),
(72, 6),
(72, 7),
(72, 8),
(72, 9),
(72, 10),
(72, 11),
(72, 12),
(72, 13),
(72, 14),
(73, 1),
(73, 2),
(73, 3),
(73, 4),
(73, 5),
(73, 6),
(73, 7),
(73, 8),
(73, 9),
(73, 10),
(73, 11),
(73, 12),
(73, 13),
(73, 14),
(74, 1),
(74, 2),
(74, 3),
(74, 4),
(74, 5),
(74, 6),
(74, 7),
(74, 8),
(74, 9),
(74, 10),
(74, 11),
(74, 12),
(74, 13),
(74, 14),
(75, 1),
(75, 2),
(75, 3),
(75, 4),
(75, 5),
(75, 6),
(75, 7),
(75, 8),
(75, 9),
(75, 10),
(75, 11),
(75, 12),
(75, 13),
(75, 14),
(76, 1),
(76, 2),
(76, 3),
(76, 4),
(76, 5),
(76, 6),
(76, 7),
(76, 8),
(76, 9),
(76, 10),
(76, 11),
(76, 12),
(76, 13),
(76, 14),
(77, 1),
(77, 2),
(77, 3),
(77, 4),
(77, 5),
(77, 6),
(77, 7),
(77, 8),
(77, 9),
(77, 10),
(77, 11),
(77, 12),
(77, 13),
(77, 14),
(78, 1),
(78, 2),
(78, 3),
(78, 4),
(78, 5),
(78, 6),
(78, 7),
(78, 8),
(78, 9),
(78, 10),
(78, 11),
(78, 12),
(78, 13),
(78, 14),
(79, 1),
(79, 2),
(79, 3),
(79, 4),
(79, 5),
(79, 6),
(79, 7),
(79, 8),
(79, 9),
(79, 10),
(79, 11),
(79, 12),
(79, 13),
(79, 14),
(80, 1),
(80, 2),
(80, 3),
(80, 4),
(80, 5),
(80, 6),
(80, 7),
(80, 8),
(80, 9),
(80, 10),
(80, 11),
(80, 12),
(80, 13),
(80, 14),
(81, 1),
(81, 2),
(81, 3),
(81, 4),
(81, 5),
(81, 6),
(81, 7),
(81, 8),
(81, 9),
(81, 10),
(81, 11),
(81, 12),
(81, 13),
(81, 14),
(82, 1),
(82, 2),
(82, 3),
(82, 4),
(82, 5),
(82, 6),
(82, 7),
(82, 8),
(82, 9),
(82, 10),
(82, 11),
(82, 12),
(82, 13),
(82, 14),
(83, 1),
(83, 2),
(83, 3),
(83, 4),
(83, 5),
(83, 6),
(83, 7),
(83, 8),
(83, 9),
(83, 10),
(83, 11),
(83, 12),
(83, 13),
(83, 14),
(84, 1),
(84, 2),
(84, 3),
(84, 4),
(84, 5),
(84, 6),
(84, 7),
(84, 8),
(84, 9),
(84, 10),
(84, 11),
(84, 12),
(84, 13),
(84, 14),
(85, 1),
(85, 2),
(85, 3),
(85, 4),
(85, 5),
(85, 6),
(85, 7),
(85, 8),
(85, 9),
(85, 10),
(85, 11),
(85, 12),
(85, 13),
(85, 14),
(86, 1),
(86, 2),
(86, 3),
(86, 4),
(86, 5),
(86, 6),
(86, 7),
(86, 8),
(86, 9),
(86, 10),
(86, 11),
(86, 12),
(86, 13),
(86, 14),
(87, 1),
(87, 2),
(87, 3),
(87, 4),
(87, 5),
(87, 6),
(87, 7),
(87, 8),
(87, 9),
(87, 10),
(87, 11),
(87, 12),
(87, 13),
(87, 14),
(88, 1),
(88, 2),
(88, 3),
(88, 4),
(88, 5),
(88, 6),
(88, 7),
(88, 8),
(88, 9),
(88, 10),
(88, 11),
(88, 12),
(88, 13),
(88, 14),
(89, 1),
(89, 2),
(89, 3),
(89, 4),
(89, 5),
(89, 6),
(89, 7),
(89, 8),
(89, 9),
(89, 10),
(89, 11),
(89, 12),
(89, 13),
(89, 14),
(90, 1),
(90, 2),
(90, 3),
(90, 4),
(90, 5),
(90, 6),
(90, 7),
(90, 8),
(90, 9),
(90, 10),
(90, 11),
(90, 12),
(90, 13),
(90, 14),
(91, 1),
(91, 2),
(91, 3),
(91, 4),
(91, 5),
(91, 6),
(91, 7),
(91, 8),
(91, 9),
(91, 10),
(91, 11),
(91, 12),
(91, 13),
(91, 14),
(92, 1),
(92, 2),
(92, 3),
(92, 4),
(92, 5),
(92, 6),
(92, 7),
(92, 8),
(92, 9),
(92, 10),
(92, 11),
(92, 12),
(92, 13),
(92, 14),
(93, 1),
(93, 2),
(93, 3),
(93, 4),
(93, 5),
(93, 6),
(93, 7),
(93, 8),
(93, 9),
(93, 10),
(93, 11),
(93, 12),
(93, 13),
(93, 14),
(94, 1),
(94, 2),
(94, 3),
(94, 4),
(94, 5),
(94, 6),
(94, 7),
(94, 8),
(94, 9),
(94, 10),
(94, 11),
(94, 12),
(94, 13),
(94, 14),
(95, 1),
(95, 2),
(95, 3),
(95, 4),
(95, 5),
(95, 6),
(95, 7),
(95, 8),
(95, 9),
(95, 10),
(95, 11),
(95, 12),
(95, 13),
(95, 14),
(96, 1),
(96, 2),
(96, 3),
(96, 4),
(96, 5),
(96, 6),
(96, 7),
(96, 8),
(96, 9),
(96, 10),
(96, 11),
(96, 12),
(96, 13),
(96, 14),
(97, 1),
(97, 2),
(97, 3),
(97, 4),
(97, 5),
(97, 6),
(97, 7),
(97, 8),
(97, 9),
(97, 10),
(97, 11),
(97, 12),
(97, 13),
(97, 14),
(98, 1),
(98, 2),
(98, 3),
(98, 4),
(98, 5),
(98, 6),
(98, 7),
(98, 8),
(98, 9),
(98, 10),
(98, 11),
(98, 12),
(98, 13),
(98, 14),
(99, 1),
(99, 2),
(99, 3),
(99, 4),
(99, 5),
(99, 6),
(99, 7),
(99, 8),
(99, 9),
(99, 10),
(99, 11),
(99, 12),
(99, 13),
(99, 14),
(100, 1),
(100, 2),
(100, 3),
(100, 4),
(100, 5),
(100, 6),
(100, 7),
(100, 8),
(100, 9),
(100, 10),
(100, 11),
(100, 12),
(100, 13),
(100, 14),
(101, 1),
(101, 2),
(101, 3),
(101, 4),
(101, 5),
(101, 6),
(101, 7),
(101, 8),
(101, 9),
(101, 10),
(101, 11),
(101, 12),
(101, 13),
(101, 14);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_id`, `category_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 4),
(37, 4),
(38, 4),
(39, 4),
(40, 4),
(41, 4),
(42, 4),
(43, 4),
(44, 4),
(45, 4),
(46, 4),
(47, 4),
(48, 4),
(49, 4),
(50, 4),
(51, 4),
(52, 4),
(53, 4),
(54, 4),
(55, 4),
(56, 4),
(57, 4),
(58, 4),
(59, 4),
(60, 4),
(61, 4),
(62, 4),
(63, 4),
(64, 4),
(65, 5),
(66, 5),
(67, 5),
(68, 5),
(69, 5),
(70, 5),
(71, 5),
(72, 5),
(73, 5),
(74, 5),
(75, 5),
(76, 5),
(77, 5),
(78, 5),
(79, 5),
(80, 6),
(81, 4),
(81, 6),
(82, 6),
(83, 6),
(84, 6),
(85, 6),
(86, 6),
(87, 6),
(88, 6),
(89, 6),
(90, 6),
(91, 6),
(92, 6),
(93, 6),
(94, 6),
(95, 6),
(96, 7),
(97, 4),
(97, 7),
(98, 4),
(98, 7),
(99, 7),
(100, 7),
(101, 7),
(102, 7);

-- --------------------------------------------------------

--
-- Table structure for table `progress_matix`
--

CREATE TABLE `progress_matix` (
  `progress_matix_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `punctuality` int(1) NOT NULL,
  `respect` int(1) NOT NULL,
  `politeness` int(1) NOT NULL,
  `relationship` int(1) NOT NULL,
  `attentiveness` int(1) NOT NULL,
  `obedience` int(1) NOT NULL,
  `neatness` int(1) NOT NULL,
  `handwriting` int(1) NOT NULL,
  `fluency` int(1) NOT NULL,
  `friendliness` int(1) NOT NULL,
  `teachersComment` varchar(100) NOT NULL,
  `sys_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress_matix`
--

INSERT INTO `progress_matix` (`progress_matix_id`, `class_id`, `student_id`, `term_id`, `punctuality`, `respect`, `politeness`, `relationship`, `attentiveness`, `obedience`, `neatness`, `handwriting`, `fluency`, `friendliness`, `teachersComment`, `sys_date`) VALUES
(1, 1, 31, 1, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 'Al our members are chilling', '2020-07-06 15:16:50'),
(2, 21, 56, 2, 1, 2, 3, 3, 2, 3, 4, 5, 4, 3, 'Playful but ready to learn', '2020-12-05 10:15:39'),
(3, 21, 58, 2, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 'playful but ready to learn', '2020-12-05 10:28:51'),
(4, 22, 62, 2, 1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 'Playful but ready to learn', '2020-12-07 05:08:14'),
(5, 21, 59, 2, 1, 2, 3, 4, 5, 4, 3, 2, 1, 2, 'Playful but ready to learn', '2020-12-08 14:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `pry_recordsforaverageandgtotal`
--

CREATE TABLE `pry_recordsforaverageandgtotal` (
  `rid` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `record_date` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `gtotal` int(11) NOT NULL,
  `average` decimal(10,3) NOT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pry_recordsforaverageandgtotal`
--

INSERT INTO `pry_recordsforaverageandgtotal` (`rid`, `class_id`, `term_id`, `record_date`, `student_id`, `gtotal`, `average`, `position`) VALUES
(1, 22, 2, '2020-12-07', 62, 1055, '75.357', 3),
(2, 22, 2, '2020-12-07', 63, 1063, '75.929', 2),
(3, 22, 2, '2020-12-07', 64, 1017, '72.643', 7),
(4, 22, 2, '2020-12-07', 65, 1021, '72.929', 6),
(5, 22, 2, '2020-12-07', 66, 1013, '72.357', 8),
(6, 22, 2, '2020-12-07', 67, 1026, '73.286', 5),
(7, 22, 2, '2020-12-07', 68, 1301, '92.929', 1),
(8, 22, 2, '2020-12-07', 69, 1004, '71.714', 9),
(9, 22, 2, '2020-12-07', 70, 1037, '74.071', 4);

-- --------------------------------------------------------

--
-- Table structure for table `requested`
--

CREATE TABLE `requested` (
  `requested_id` int(11) NOT NULL,
  `numberOfPin` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `approve` int(1) NOT NULL DEFAULT 0,
  `sys_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requested`
--

INSERT INTO `requested` (`requested_id`, `numberOfPin`, `price`, `total`, `approve`, `sys_date`) VALUES
(1, 500, 200, 100000, 1, '2020-11-29 23:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` text COLLATE utf8_unicode_ci NOT NULL,
  `rating` smallint(6) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `customer_id`, `product_id`, `review`, `rating`, `created_on`) VALUES
(1, 1, 10, 'I think that in the whole wide world this product is confirmed ', 3, '2020-02-17 10:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_employee` varchar(50) NOT NULL,
  `fiscal_year` int(11) NOT NULL,
  `sale` decimal(14,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_employee`, `fiscal_year`, `sale`) VALUES
('Alice', 2016, '150.00'),
('Bob', 2016, '100.00'),
('Cuban', 2016, '150.00'),
('Job', 2016, '100.00'),
('John', 2016, '200.00'),
('Mark', 2016, '200.00'),
('Simon', 2016, '150.00'),
('Todd', 2016, '200.00'),
('Zik', 2016, '250.00');

-- --------------------------------------------------------

--
-- Table structure for table `school_classes`
--

CREATE TABLE `school_classes` (
  `school_classes_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_classes`
--

INSERT INTO `school_classes` (`school_classes_id`, `class_name`, `department_id`, `source_id`) VALUES
(1, 'Creche', 1, 1),
(2, 'Preparatory', 1, 2),
(3, 'Kindergarten', 1, 3),
(4, 'Nursery One', 1, 4),
(5, 'Nursery Two', 1, 5),
(6, 'Nursery Three', 1, 6),
(7, 'Primary One', 2, 7),
(8, 'Primary Two', 2, 8),
(9, 'Primary Three', 2, 9),
(10, 'Primary Four', 2, 10),
(11, 'Primary Five', 2, 11),
(12, 'Primary Six', 2, 12),
(13, 'JSS One', 3, 13),
(14, 'JSS Two', 3, 14),
(15, 'JSS Three', 3, 15),
(16, 'SSS One', 3, 16),
(17, 'SSS Two', 3, 17),
(18, 'SSS Three', 3, 18),
(21, 'JSS One B', 3, 13),
(22, 'Primary One B', 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `school_session`
--

CREATE TABLE `school_session` (
  `school_session_id` int(11) NOT NULL,
  `session_date` date NOT NULL,
  `session_year` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_session`
--

INSERT INTO `school_session` (`school_session_id`, `session_date`, `session_year`) VALUES
(4, '2020-09-01', '2020'),
(5, '2020-08-01', '2020'),
(6, '2020-08-20', '2020'),
(7, '2020-08-29', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `shipping_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL,
  `shipping_region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `shipping_type`, `shipping_cost`, `shipping_region_id`) VALUES
(1, 'Next Day Delivery ($20)', '20.00', 2),
(2, '3-4 Days ($10)', '10.00', 2),
(3, '7 Days ($5)', '5.00', 2),
(4, 'By air (7 days, $25)', '25.00', 3),
(5, 'By sea (28 days, $10)', '10.00', 3),
(6, 'By air (10 days, $35)', '35.00', 4),
(7, 'By sea (28 days, $30)', '30.00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_region`
--

CREATE TABLE `shipping_region` (
  `shipping_region_id` int(11) NOT NULL,
  `shipping_region` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipping_region`
--

INSERT INTO `shipping_region` (`shipping_region_id`, `shipping_region`) VALUES
(1, 'Please Select'),
(2, 'US / Canada'),
(3, 'Europe'),
(4, 'Rest of World');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `item_id` int(11) NOT NULL,
  `cart_id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `attributes` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `buy_now` tinyint(1) NOT NULL DEFAULT 1,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`item_id`, `cart_id`, `product_id`, `attributes`, `quantity`, `buy_now`, `added_on`) VALUES
(3, '50dde71f32bc38d9bd542b8adc26cf37', 36, 'Color/Size: Green/S', 1, 1, '2020-02-05 14:20:23'),
(4, '50dde71f32bc38d9bd542b8adc26cf37', 51, 'Color/Size: Green/S', 1, 1, '2020-02-05 14:20:34'),
(6, '50dde71f32bc38d9bd542b8adc26cf37', 68, 'Color/Size: Green/S', 1, 1, '2020-02-05 14:21:00'),
(21, 'db54bb909bbd4fc7a51dcb04eb2d34ab', 9, 'Color/Size: Red/L', 1, 1, '2020-02-13 16:25:18'),
(22, 'db54bb909bbd4fc7a51dcb04eb2d34ab', 19, 'Color/Size: Red/L', 1, 1, '2020-02-13 16:25:23'),
(23, 'db54bb909bbd4fc7a51dcb04eb2d34ab', 80, 'Color/Size: Green/L', 1, 1, '2020-02-13 16:26:08'),
(24, 'db54bb909bbd4fc7a51dcb04eb2d34ab', 80, 'Color/Size: Red/XL', 1, 1, '2020-02-13 16:26:14'),
(25, '4e0487f7ea2065e8aae1d02abc2bde0a', 84, '', 1, 1, '2020-02-18 13:26:15'),
(26, '4e0487f7ea2065e8aae1d02abc2bde0a', 10, '', 1, 1, '2020-02-19 13:47:09'),
(27, '3dccb8a780da19ef7e072c04acf42b48', 10, 'Color/Size: White/S', 4, 1, '2020-03-09 09:26:22'),
(28, '2e841957989438665d0851757d1b338b', 51, 'Color/Size: Blue/S', 1, 1, '2020-07-02 16:58:48'),
(29, '2e841957989438665d0851757d1b338b', 51, 'Color/Size: Blue/M', 1, 1, '2020-07-02 16:58:53'),
(30, '2e841957989438665d0851757d1b338b', 51, 'Color/Size: Indigo/L', 1, 1, '2020-07-02 16:58:57'),
(31, '2e841957989438665d0851757d1b338b', 69, 'Color/Size: Indigo/L', 1, 1, '2020-07-07 14:45:23'),
(32, '42613e420a3bdbf621226c231893f064', 51, 'Color/Size: White/XXL', 1, 1, '2020-07-29 12:53:21'),
(33, '645fa8e78103fe770b834c1b0cc5e7e0', 69, 'Color/Size: Yellow/XXL', 1, 1, '2020-08-23 19:32:20'),
(34, '6b31db022b87f8a5f6bd0da5240db004', 10, 'Color/Size: Purple/M', 1, 1, '2020-09-17 13:34:48'),
(35, '5989a396dd6f4ad675b687b24f616f4e', 84, 'Color/Size: Red/L', 1, 1, '2020-09-21 09:25:02'),
(36, 'ad2f67fdf28cc1ae91da2f7f12115cc5', 10, 'Color/Size: Red/L', 1, 1, '2020-11-26 15:00:20'),
(37, 'ad2f67fdf28cc1ae91da2f7f12115cc5', 84, 'Color/Size: Red/S', 1, 1, '2020-11-26 15:00:20'),
(38, 'fd6e28e0f72e2d6354d4b36dc5efc8a8', 84, 'Color/Size: Red/XXL', 1, 1, '2020-12-05 12:28:20'),
(39, '4d8d5f6295ec421459ba8201e8cfe28c', 84, 'Color/Size: Black/M', 1, 1, '2020-12-14 13:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `sn_attendance`
--

CREATE TABLE `sn_attendance` (
  `sn_attendance_id` int(11) NOT NULL,
  `weekValue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `todaysDate_id` int(11) NOT NULL,
  `todaysDate` date NOT NULL,
  `term_id` int(11) NOT NULL,
  `mark_m` tinyint(1) DEFAULT 0,
  `mark_a` tinyint(1) DEFAULT 0,
  `reasons` char(32) NOT NULL DEFAULT 'None',
  `sys_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sn_attendance`
--

INSERT INTO `sn_attendance` (`sn_attendance_id`, `weekValue_id`, `student_id`, `class_id`, `todaysDate_id`, `todaysDate`, `term_id`, `mark_m`, `mark_a`, `reasons`, `sys_date`) VALUES
(1, 6, 31, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(2, 6, 32, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(3, 6, 33, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(4, 6, 34, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(5, 6, 31, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:58'),
(6, 6, 32, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(7, 6, 33, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(8, 6, 34, 1, 5, '2020-06-11', 1, 1, 0, 'None', '2020-06-11 09:12:59'),
(9, 1, 31, 1, 62, '2020-10-06', 2, 1, 1, 'None', '2020-10-06 17:13:36'),
(10, 1, 34, 1, 62, '2020-10-06', 2, 1, 0, 'None', '2020-10-06 17:13:36'),
(11, 1, 33, 1, 62, '2020-10-06', 2, 1, 0, 'None', '2020-10-06 17:13:36'),
(12, 1, 32, 1, 62, '2020-10-06', 2, 1, 0, 'None', '2020-10-06 17:13:37'),
(13, 1, 31, 1, 62, '2020-10-06', 2, 1, 1, 'None', '2020-10-06 17:15:11'),
(14, 1, 34, 1, 62, '2020-10-06', 2, 1, 0, 'None', '2020-10-06 17:15:11'),
(15, 1, 33, 1, 62, '2020-10-06', 2, 1, 0, 'None', '2020-10-06 17:15:12'),
(16, 1, 32, 1, 62, '2020-10-06', 2, 1, 0, 'None', '2020-10-06 17:15:12'),
(17, 1, 31, 1, 63, '2020-10-07', 2, 1, 1, 'None', '2020-10-07 13:50:55'),
(18, 1, 34, 1, 63, '2020-10-07', 2, 1, 1, 'None', '2020-10-07 13:50:56'),
(19, 1, 33, 1, 63, '2020-10-07', 2, 1, 1, 'None', '2020-10-07 13:50:56'),
(20, 1, 32, 1, 63, '2020-10-07', 2, 1, 1, 'None', '2020-10-07 13:50:56'),
(21, 1, 33, 1, 64, '2020-10-08', 2, 1, 1, 'None', '2020-10-08 06:45:01'),
(22, 1, 31, 1, 64, '2020-10-08', 2, 1, 1, 'None', '2020-10-08 06:45:01'),
(23, 1, 34, 1, 64, '2020-10-08', 2, 1, 1, 'None', '2020-10-08 06:45:02'),
(24, 1, 32, 1, 64, '2020-10-08', 2, 1, 1, 'None', '2020-10-08 06:45:02'),
(25, 2, 31, 1, 66, '2020-10-12', 2, 1, 1, 'None', '2020-10-12 15:03:41'),
(26, 2, 34, 1, 66, '2020-10-12', 2, 1, 1, 'None', '2020-10-12 15:03:41'),
(27, 2, 33, 1, 66, '2020-10-12', 2, 1, 1, 'None', '2020-10-12 15:03:41'),
(28, 2, 32, 1, 66, '2020-10-12', 2, 1, 1, 'None', '2020-10-12 15:03:41'),
(29, 2, 34, 1, 67, '2020-10-13', 2, 1, 1, 'None', '2020-10-13 13:16:07'),
(30, 2, 33, 1, 67, '2020-10-13', 2, 1, 1, 'None', '2020-10-13 13:16:07'),
(31, 2, 31, 1, 67, '2020-10-13', 2, 1, 1, 'None', '2020-10-13 13:16:08'),
(32, 2, 32, 1, 67, '2020-10-13', 2, 1, 1, 'None', '2020-10-13 13:16:08'),
(33, 3, 33, 1, 68, '2020-10-19', 2, 1, 1, 'None', '2020-10-19 13:08:34'),
(34, 3, 31, 1, 68, '2020-10-19', 2, 1, 1, 'None', '2020-10-19 13:08:34'),
(35, 3, 34, 1, 68, '2020-10-19', 2, 1, 1, 'None', '2020-10-19 13:08:34'),
(36, 3, 32, 1, 68, '2020-10-19', 2, 1, 1, 'None', '2020-10-19 13:08:34'),
(37, 3, 31, 1, 69, '2020-10-20', 2, 1, 1, 'None', '2020-10-20 12:24:54'),
(38, 3, 34, 1, 69, '2020-10-20', 2, 1, 1, 'None', '2020-10-20 12:24:54'),
(39, 3, 33, 1, 69, '2020-10-20', 2, 1, 1, 'None', '2020-10-20 12:24:54'),
(40, 3, 32, 1, 69, '2020-10-20', 2, 1, 1, 'None', '2020-10-20 12:24:54'),
(41, 3, 34, 1, 70, '2020-10-21', 2, 1, 1, 'None', '2020-10-21 14:12:12'),
(42, 3, 33, 1, 70, '2020-10-21', 2, 1, 1, 'None', '2020-10-21 14:12:13'),
(43, 3, 31, 1, 70, '2020-10-21', 2, 1, 1, 'None', '2020-10-21 14:12:13'),
(44, 3, 32, 1, 70, '2020-10-21', 2, 1, 1, 'None', '2020-10-21 14:12:13'),
(45, 4, 31, 1, 71, '2020-10-26', 2, 1, 1, 'None', '2020-10-26 16:49:52'),
(46, 4, 34, 1, 71, '2020-10-26', 2, 1, 1, 'None', '2020-10-26 16:49:53'),
(47, 4, 33, 1, 71, '2020-10-26', 2, 1, 1, 'None', '2020-10-26 16:49:53'),
(48, 4, 32, 1, 71, '2020-10-26', 2, 1, 1, 'None', '2020-10-26 16:49:53'),
(49, 4, 34, 1, 72, '2020-10-27', 2, 1, 1, 'None', '2020-10-27 14:31:13'),
(50, 4, 33, 1, 72, '2020-10-27', 2, 1, 1, 'None', '2020-10-27 14:31:14'),
(51, 4, 31, 1, 72, '2020-10-27', 2, 1, 1, 'None', '2020-10-27 14:31:14'),
(52, 4, 32, 1, 72, '2020-10-27', 2, 1, 1, 'None', '2020-10-27 14:31:14'),
(53, 4, 31, 1, 73, '2020-10-29', 2, 1, 1, 'None', '2020-10-29 18:55:37'),
(54, 4, 34, 1, 73, '2020-10-29', 2, 1, 1, 'None', '2020-10-29 18:55:37'),
(55, 4, 33, 1, 73, '2020-10-29', 2, 1, 1, 'None', '2020-10-29 18:55:37'),
(56, 4, 32, 1, 73, '2020-10-29', 2, 1, 1, 'None', '2020-10-29 18:55:37'),
(57, 4, 31, 1, 74, '2020-10-30', 2, 1, 1, 'None', '2020-10-30 17:49:33'),
(58, 4, 34, 1, 74, '2020-10-30', 2, 1, 1, 'None', '2020-10-30 17:49:34'),
(59, 4, 33, 1, 74, '2020-10-30', 2, 1, 1, 'None', '2020-10-30 17:49:34'),
(60, 4, 32, 1, 74, '2020-10-30', 2, 1, 1, 'None', '2020-10-30 17:49:34'),
(61, 5, 34, 1, 75, '2020-11-02', 2, 1, 1, 'None', '2020-11-02 11:04:11'),
(62, 5, 33, 1, 75, '2020-11-02', 2, 1, 1, 'None', '2020-11-02 11:04:12'),
(63, 5, 31, 1, 75, '2020-11-02', 2, 1, 1, 'None', '2020-11-02 11:04:12'),
(64, 5, 32, 1, 75, '2020-11-02', 2, 1, 1, 'None', '2020-11-02 11:04:12'),
(65, 5, 31, 1, 76, '2020-11-03', 2, 1, 1, 'None', '2020-11-03 09:35:13'),
(66, 5, 34, 1, 76, '2020-11-03', 2, 1, 1, 'None', '2020-11-03 09:35:13'),
(67, 5, 33, 1, 76, '2020-11-03', 2, 1, 1, 'None', '2020-11-03 09:35:13'),
(68, 5, 32, 1, 76, '2020-11-03', 2, 1, 1, 'None', '2020-11-03 09:35:13'),
(69, 5, 34, 1, 77, '2020-11-04', 2, 1, 1, 'None', '2020-11-04 16:42:46'),
(70, 5, 33, 1, 77, '2020-11-04', 2, 1, 1, 'None', '2020-11-04 16:42:47'),
(71, 5, 31, 1, 77, '2020-11-04', 2, 1, 1, 'None', '2020-11-04 16:42:47'),
(72, 5, 32, 1, 77, '2020-11-04', 2, 1, 1, 'None', '2020-11-04 16:42:47'),
(73, 5, 33, 1, 78, '2020-11-05', 2, 1, 1, 'None', '2020-11-05 11:47:44'),
(74, 5, 31, 1, 78, '2020-11-05', 2, 1, 1, 'None', '2020-11-05 11:47:44'),
(75, 5, 34, 1, 78, '2020-11-05', 2, 1, 1, 'None', '2020-11-05 11:47:44'),
(76, 5, 32, 1, 78, '2020-11-05', 2, 1, 1, 'None', '2020-11-05 11:47:45'),
(77, 5, 31, 1, 79, '2020-11-06', 2, 1, 1, 'None', '2020-11-06 14:19:32'),
(78, 5, 34, 1, 79, '2020-11-06', 2, 1, 1, 'None', '2020-11-06 14:19:32'),
(79, 5, 33, 1, 79, '2020-11-06', 2, 1, 1, 'None', '2020-11-06 14:19:32'),
(80, 5, 32, 1, 79, '2020-11-06', 2, 1, 1, 'None', '2020-11-06 14:19:32'),
(81, 6, 31, 1, 80, '2020-11-09', 2, 1, 1, 'None', '2020-11-09 14:23:29'),
(82, 6, 34, 1, 80, '2020-11-09', 2, 1, 1, 'None', '2020-11-09 14:23:29'),
(83, 6, 33, 1, 80, '2020-11-09', 2, 1, 1, 'None', '2020-11-09 14:23:30'),
(84, 6, 32, 1, 80, '2020-11-09', 2, 1, 1, 'None', '2020-11-09 14:23:30'),
(85, 6, 34, 1, 81, '2020-11-12', 2, 1, 1, 'None', '2020-11-12 06:13:51'),
(86, 6, 33, 1, 81, '2020-11-12', 2, 1, 1, 'None', '2020-11-12 06:13:51'),
(87, 6, 31, 1, 81, '2020-11-12', 2, 1, 1, 'None', '2020-11-12 06:13:51'),
(88, 6, 32, 1, 81, '2020-11-12', 2, 1, 1, 'None', '2020-11-12 06:13:51'),
(89, 6, 34, 1, 82, '2020-11-13', 2, 1, 1, 'None', '2020-11-13 12:59:00'),
(90, 6, 33, 1, 82, '2020-11-13', 2, 1, 1, 'None', '2020-11-13 12:59:00'),
(91, 6, 31, 1, 82, '2020-11-13', 2, 1, 1, 'None', '2020-11-13 12:59:01'),
(92, 6, 32, 1, 82, '2020-11-13', 2, 1, 1, 'None', '2020-11-13 12:59:01'),
(93, 7, 31, 1, 83, '2020-11-16', 2, 1, 1, 'None', '2020-11-16 10:41:34'),
(94, 7, 34, 1, 83, '2020-11-16', 2, 1, 1, 'None', '2020-11-16 10:41:35'),
(95, 7, 33, 1, 83, '2020-11-16', 2, 1, 1, 'None', '2020-11-16 10:41:35'),
(96, 7, 32, 1, 83, '2020-11-16', 2, 1, 1, 'None', '2020-11-16 10:41:35'),
(97, 8, 31, 1, 84, '2020-11-23', 2, 1, 1, 'None', '2020-11-23 02:30:56'),
(98, 8, 34, 1, 84, '2020-11-23', 2, 1, 1, 'None', '2020-11-23 02:30:56'),
(99, 8, 33, 1, 84, '2020-11-23', 2, 1, 1, 'None', '2020-11-23 02:30:56'),
(100, 8, 32, 1, 84, '2020-11-23', 2, 1, 1, 'None', '2020-11-23 02:30:56'),
(101, 8, 31, 1, 85, '2020-11-24', 2, 1, 1, 'None', '2020-11-24 16:30:23'),
(102, 8, 34, 1, 85, '2020-11-24', 2, 1, 1, 'None', '2020-11-24 16:30:23'),
(103, 8, 33, 1, 85, '2020-11-24', 2, 1, 1, 'None', '2020-11-24 16:30:23'),
(104, 8, 32, 1, 85, '2020-11-24', 2, 1, 1, 'None', '2020-11-24 16:30:24'),
(105, 8, 34, 1, 86, '2020-11-26', 2, 1, 1, 'None', '2020-11-26 14:48:38'),
(106, 8, 33, 1, 86, '2020-11-26', 2, 1, 1, 'None', '2020-11-26 14:48:39'),
(107, 8, 31, 1, 86, '2020-11-26', 2, 1, 1, 'None', '2020-11-26 14:48:39'),
(108, 8, 32, 1, 86, '2020-11-26', 2, 1, 1, 'None', '2020-11-26 14:48:39'),
(109, 10, 31, 1, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:09:07'),
(110, 10, 34, 1, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:09:07'),
(111, 10, 33, 1, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:09:07'),
(112, 10, 32, 1, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:09:07'),
(113, 10, 34, 1, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:20:37'),
(114, 10, 33, 1, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:20:37'),
(115, 10, 31, 1, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:20:37'),
(116, 10, 32, 1, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `sn_ca_record`
--

CREATE TABLE `sn_ca_record` (
  `sn_ca_record_id` int(11) NOT NULL,
  `firstca` tinyint(3) NOT NULL,
  `secondca` tinyint(3) NOT NULL DEFAULT 0,
  `thirdca` tinyint(3) NOT NULL DEFAULT 0,
  `exams` smallint(3) NOT NULL DEFAULT 0,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `supDate` date NOT NULL,
  `sysDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sp_attendance`
--

CREATE TABLE `sp_attendance` (
  `sp_attendance_id` int(11) NOT NULL,
  `weekValue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `todaysDate_id` int(11) NOT NULL,
  `todaysDate` date NOT NULL,
  `term_id` int(11) NOT NULL,
  `mark_m` tinyint(1) DEFAULT 0,
  `mark_a` tinyint(1) DEFAULT 0,
  `reasons` char(32) NOT NULL DEFAULT 'None',
  `sys_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_attendance`
--

INSERT INTO `sp_attendance` (`sp_attendance_id`, `weekValue_id`, `student_id`, `class_id`, `todaysDate_id`, `todaysDate`, `term_id`, `mark_m`, `mark_a`, `reasons`, `sys_date`) VALUES
(1, 6, 31, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(2, 6, 32, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(3, 6, 33, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(4, 6, 34, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(5, 6, 31, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:58'),
(6, 6, 32, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(7, 6, 33, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(8, 6, 34, 1, 5, '2020-06-11', 1, 1, 0, 'None', '2020-06-11 09:12:59'),
(9, 1, 42, 7, 62, '2020-10-06', 2, 1, 0, 'None', '2020-10-06 19:24:09'),
(10, 1, 41, 7, 62, '2020-10-06', 2, 1, 0, 'None', '2020-10-06 19:24:09'),
(11, 1, 43, 7, 62, '2020-10-06', 2, 1, 0, 'None', '2020-10-06 19:24:09'),
(12, 1, 40, 7, 62, '2020-10-06', 2, 1, 0, 'None', '2020-10-06 19:24:09'),
(13, 1, 42, 7, 63, '2020-10-07', 2, 1, 1, 'None', '2020-10-07 13:59:04'),
(14, 1, 41, 7, 63, '2020-10-07', 2, 1, 1, 'None', '2020-10-07 13:59:04'),
(15, 1, 43, 7, 63, '2020-10-07', 2, 1, 1, 'None', '2020-10-07 13:59:04'),
(16, 1, 40, 7, 63, '2020-10-07', 2, 1, 1, 'None', '2020-10-07 13:59:04'),
(17, 1, 43, 7, 64, '2020-10-08', 2, 1, 1, 'None', '2020-10-08 06:47:03'),
(18, 1, 42, 7, 64, '2020-10-08', 2, 1, 1, 'None', '2020-10-08 06:47:03'),
(19, 1, 41, 7, 64, '2020-10-08', 2, 1, 1, 'None', '2020-10-08 06:47:03'),
(20, 1, 40, 7, 64, '2020-10-08', 2, 1, 1, 'None', '2020-10-08 06:47:03'),
(21, 2, 43, 7, 66, '2020-10-12', 2, 1, 1, 'None', '2020-10-12 15:01:54'),
(22, 2, 42, 7, 66, '2020-10-12', 2, 1, 1, 'None', '2020-10-12 15:01:54'),
(23, 2, 41, 7, 66, '2020-10-12', 2, 1, 1, 'None', '2020-10-12 15:01:54'),
(24, 2, 40, 7, 66, '2020-10-12', 2, 1, 1, 'None', '2020-10-12 15:01:54'),
(25, 2, 43, 7, 67, '2020-10-13', 2, 1, 1, 'None', '2020-10-13 13:28:34'),
(26, 2, 42, 7, 67, '2020-10-13', 2, 1, 1, 'None', '2020-10-13 13:28:34'),
(27, 2, 41, 7, 67, '2020-10-13', 2, 1, 1, 'None', '2020-10-13 13:28:35'),
(28, 2, 40, 7, 67, '2020-10-13', 2, 1, 1, 'None', '2020-10-13 13:28:35'),
(29, 3, 42, 7, 68, '2020-10-19', 2, 1, 1, 'None', '2020-10-19 15:46:16'),
(30, 3, 41, 7, 68, '2020-10-19', 2, 1, 1, 'None', '2020-10-19 15:46:16'),
(31, 3, 43, 7, 68, '2020-10-19', 2, 1, 1, 'None', '2020-10-19 15:46:16'),
(32, 3, 40, 7, 68, '2020-10-19', 2, 1, 1, 'None', '2020-10-19 15:46:16'),
(33, 3, 42, 7, 69, '2020-10-20', 2, 1, 1, 'None', '2020-10-20 12:26:47'),
(34, 3, 41, 7, 69, '2020-10-20', 2, 1, 1, 'None', '2020-10-20 12:26:47'),
(35, 3, 43, 7, 69, '2020-10-20', 2, 1, 1, 'None', '2020-10-20 12:26:47'),
(36, 3, 40, 7, 69, '2020-10-20', 2, 1, 1, 'None', '2020-10-20 12:26:47'),
(37, 4, 43, 7, 71, '2020-10-26', 2, 1, 1, 'None', '2020-10-26 16:58:30'),
(38, 4, 42, 7, 71, '2020-10-26', 2, 1, 1, 'None', '2020-10-26 16:58:30'),
(39, 4, 41, 7, 71, '2020-10-26', 2, 1, 1, 'None', '2020-10-26 16:58:30'),
(40, 4, 40, 7, 71, '2020-10-26', 2, 1, 1, 'None', '2020-10-26 16:58:30'),
(41, 4, 43, 7, 72, '2020-10-27', 2, 1, 1, 'None', '2020-10-27 14:43:41'),
(42, 4, 42, 7, 72, '2020-10-27', 2, 1, 1, 'None', '2020-10-27 14:43:41'),
(43, 4, 41, 7, 72, '2020-10-27', 2, 1, 1, 'None', '2020-10-27 14:43:41'),
(44, 4, 40, 7, 72, '2020-10-27', 2, 1, 1, 'None', '2020-10-27 14:43:41'),
(45, 4, 43, 7, 73, '2020-10-29', 2, 1, 1, 'None', '2020-10-29 19:04:45'),
(46, 4, 42, 7, 73, '2020-10-29', 2, 1, 1, 'None', '2020-10-29 19:04:45'),
(47, 4, 41, 7, 73, '2020-10-29', 2, 1, 1, 'None', '2020-10-29 19:04:45'),
(48, 4, 40, 7, 73, '2020-10-29', 2, 1, 1, 'None', '2020-10-29 19:04:45'),
(49, 4, 43, 7, 74, '2020-10-30', 2, 1, 1, 'None', '2020-10-30 17:53:50'),
(50, 4, 42, 7, 74, '2020-10-30', 2, 1, 1, 'None', '2020-10-30 17:53:51'),
(51, 4, 41, 7, 74, '2020-10-30', 2, 1, 1, 'None', '2020-10-30 17:53:51'),
(52, 4, 40, 7, 74, '2020-10-30', 2, 1, 1, 'None', '2020-10-30 17:53:51'),
(53, 5, 43, 7, 75, '2020-11-02', 2, 1, 1, 'None', '2020-11-02 11:12:04'),
(54, 5, 42, 7, 75, '2020-11-02', 2, 1, 1, 'None', '2020-11-02 11:12:04'),
(55, 5, 41, 7, 75, '2020-11-02', 2, 1, 1, 'None', '2020-11-02 11:12:04'),
(56, 5, 40, 7, 75, '2020-11-02', 2, 1, 1, 'None', '2020-11-02 11:12:04'),
(57, 5, 42, 7, 76, '2020-11-03', 2, 1, 1, 'None', '2020-11-03 09:42:27'),
(58, 5, 41, 7, 76, '2020-11-03', 2, 1, 1, 'None', '2020-11-03 09:42:28'),
(59, 5, 43, 7, 76, '2020-11-03', 2, 1, 1, 'None', '2020-11-03 09:42:28'),
(60, 5, 40, 7, 76, '2020-11-03', 2, 1, 1, 'None', '2020-11-03 09:42:28'),
(61, 5, 42, 7, 77, '2020-11-04', 2, 1, 1, 'None', '2020-11-04 16:44:45'),
(62, 5, 41, 7, 77, '2020-11-04', 2, 1, 1, 'None', '2020-11-04 16:44:45'),
(63, 5, 43, 7, 77, '2020-11-04', 2, 1, 1, 'None', '2020-11-04 16:44:45'),
(64, 5, 40, 7, 77, '2020-11-04', 2, 1, 1, 'None', '2020-11-04 16:44:45'),
(65, 5, 43, 7, 78, '2020-11-05', 2, 1, 1, 'None', '2020-11-05 11:50:28'),
(66, 5, 42, 7, 78, '2020-11-05', 2, 1, 1, 'None', '2020-11-05 11:50:28'),
(67, 5, 41, 7, 78, '2020-11-05', 2, 1, 1, 'None', '2020-11-05 11:50:28'),
(68, 5, 40, 7, 78, '2020-11-05', 2, 1, 1, 'None', '2020-11-05 11:50:28'),
(69, 5, 43, 7, 79, '2020-11-06', 2, 1, 1, 'None', '2020-11-06 14:23:42'),
(70, 5, 42, 7, 79, '2020-11-06', 2, 1, 1, 'None', '2020-11-06 14:23:42'),
(71, 5, 41, 7, 79, '2020-11-06', 2, 1, 1, 'None', '2020-11-06 14:23:42'),
(72, 5, 40, 7, 79, '2020-11-06', 2, 1, 1, 'None', '2020-11-06 14:23:42'),
(73, 6, 41, 7, 80, '2020-11-09', 2, 1, 1, 'None', '2020-11-09 14:28:14'),
(74, 6, 43, 7, 80, '2020-11-09', 2, 1, 1, 'None', '2020-11-09 14:28:14'),
(75, 6, 42, 7, 80, '2020-11-09', 2, 1, 1, 'None', '2020-11-09 14:28:14'),
(76, 6, 40, 7, 80, '2020-11-09', 2, 1, 1, 'None', '2020-11-09 14:28:14'),
(77, 6, 43, 7, 81, '2020-11-12', 2, 1, 1, 'None', '2020-11-12 06:29:12'),
(78, 6, 42, 7, 81, '2020-11-12', 2, 1, 1, 'None', '2020-11-12 06:29:12'),
(79, 6, 41, 7, 81, '2020-11-12', 2, 1, 1, 'None', '2020-11-12 06:29:12'),
(80, 6, 40, 7, 81, '2020-11-12', 2, 1, 1, 'None', '2020-11-12 06:29:13'),
(81, 6, 43, 7, 82, '2020-11-13', 2, 1, 1, 'None', '2020-11-13 13:01:31'),
(82, 6, 42, 7, 82, '2020-11-13', 2, 1, 1, 'None', '2020-11-13 13:01:31'),
(83, 6, 41, 7, 82, '2020-11-13', 2, 1, 1, 'None', '2020-11-13 13:01:31'),
(84, 6, 40, 7, 82, '2020-11-13', 2, 1, 1, 'None', '2020-11-13 13:01:31'),
(85, 7, 43, 7, 83, '2020-11-16', 2, 1, 1, 'None', '2020-11-16 10:46:56'),
(86, 7, 42, 7, 83, '2020-11-16', 2, 1, 1, 'None', '2020-11-16 10:46:56'),
(87, 7, 41, 7, 83, '2020-11-16', 2, 1, 1, 'None', '2020-11-16 10:46:56'),
(88, 7, 40, 7, 83, '2020-11-16', 2, 1, 1, 'None', '2020-11-16 10:46:56'),
(89, 8, 41, 7, 84, '2020-11-23', 2, 1, 1, 'None', '2020-11-23 02:25:38'),
(90, 8, 43, 7, 84, '2020-11-23', 2, 1, 1, 'None', '2020-11-23 02:25:38'),
(91, 8, 42, 7, 84, '2020-11-23', 2, 1, 1, 'None', '2020-11-23 02:25:39'),
(92, 8, 40, 7, 84, '2020-11-23', 2, 1, 1, 'None', '2020-11-23 02:25:39'),
(93, 8, 43, 7, 85, '2020-11-24', 2, 1, 1, 'None', '2020-11-24 16:10:26'),
(94, 8, 42, 7, 85, '2020-11-24', 2, 1, 1, 'None', '2020-11-24 16:10:26'),
(95, 8, 41, 7, 85, '2020-11-24', 2, 1, 1, 'None', '2020-11-24 16:10:26'),
(96, 8, 40, 7, 85, '2020-11-24', 2, 1, 1, 'None', '2020-11-24 16:10:26'),
(97, 8, 43, 7, 86, '2020-11-26', 2, 1, 1, 'None', '2020-11-26 16:24:16'),
(98, 8, 42, 7, 86, '2020-11-26', 2, 1, 1, 'None', '2020-11-26 16:24:16'),
(99, 8, 41, 7, 86, '2020-11-26', 2, 1, 1, 'None', '2020-11-26 16:24:16'),
(100, 8, 40, 7, 86, '2020-11-26', 2, 1, 1, 'None', '2020-11-26 16:24:16'),
(101, 10, 63, 22, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:02:48'),
(102, 10, 62, 22, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:02:48'),
(103, 10, 64, 22, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:02:48'),
(104, 10, 68, 22, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:02:49'),
(105, 10, 67, 22, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:02:49'),
(106, 10, 66, 22, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:02:49'),
(107, 10, 70, 22, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:02:49'),
(108, 10, 65, 22, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:02:49'),
(109, 10, 69, 22, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:02:49'),
(110, 10, 41, 7, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:07:24'),
(111, 10, 43, 7, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:07:24'),
(112, 10, 42, 7, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:07:24'),
(113, 10, 40, 7, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:07:24'),
(114, 10, 43, 7, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:28:12'),
(115, 10, 42, 7, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:28:12'),
(116, 10, 41, 7, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:28:12'),
(117, 10, 40, 7, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:28:12'),
(118, 10, 64, 22, 94, '2020-12-10', 2, 1, 1, 'None', '2020-12-10 11:30:29'),
(119, 10, 63, 22, 94, '2020-12-10', 2, 1, 1, 'None', '2020-12-10 11:30:29'),
(120, 10, 62, 22, 94, '2020-12-10', 2, 1, 1, 'None', '2020-12-10 11:30:29'),
(121, 10, 66, 22, 94, '2020-12-10', 2, 1, 1, 'None', '2020-12-10 11:30:29'),
(122, 10, 70, 22, 94, '2020-12-10', 2, 1, 1, 'None', '2020-12-10 11:30:29'),
(123, 10, 65, 22, 94, '2020-12-10', 2, 1, 1, 'None', '2020-12-10 11:30:29'),
(124, 10, 69, 22, 94, '2020-12-10', 2, 1, 1, 'None', '2020-12-10 11:30:29'),
(125, 10, 68, 22, 94, '2020-12-10', 2, 1, 1, 'None', '2020-12-10 11:30:29'),
(126, 10, 67, 22, 94, '2020-12-10', 2, 1, 1, 'None', '2020-12-10 11:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `sp_ca_record`
--

CREATE TABLE `sp_ca_record` (
  `sp_ca_record_id` int(11) NOT NULL,
  `firstca` tinyint(3) NOT NULL,
  `secondca` tinyint(3) NOT NULL DEFAULT 0,
  `thirdca` tinyint(3) NOT NULL DEFAULT 0,
  `exams` smallint(3) NOT NULL DEFAULT 0,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `supDate` date NOT NULL,
  `sysDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_ca_record`
--

INSERT INTO `sp_ca_record` (`sp_ca_record_id`, `firstca`, `secondca`, `thirdca`, `exams`, `student_id`, `subject_id`, `class_id`, `term_id`, `supDate`, `sysDate`) VALUES
(1, 13, 0, 0, 0, 40, 1, 7, 2, '2020-11-13', '2020-11-13 13:04:12'),
(2, 12, 0, 0, 0, 42, 1, 7, 2, '2020-11-13', '2020-11-13 13:04:12'),
(3, 14, 0, 0, 0, 41, 1, 7, 2, '2020-11-13', '2020-11-13 13:04:12'),
(4, 16, 0, 0, 0, 43, 1, 7, 2, '2020-11-13', '2020-11-13 13:04:12'),
(5, 20, 20, 20, 39, 68, 1, 22, 2, '2020-12-07', '2020-12-07 03:56:57'),
(6, 15, 13, 2, 30, 65, 1, 22, 2, '2020-12-07', '2020-12-07 03:56:57'),
(7, 16, 15, 14, 27, 69, 1, 22, 2, '2020-12-07', '2020-12-07 03:56:57'),
(8, 18, 14, 16, 26, 63, 1, 22, 2, '2020-12-07', '2020-12-07 03:56:57'),
(9, 14, 17, 16, 36, 66, 1, 22, 2, '2020-12-07', '2020-12-07 03:56:57'),
(10, 15, 17, 16, 35, 67, 1, 22, 2, '2020-12-07', '2020-12-07 03:56:57'),
(11, 17, 18, 17, 32, 70, 1, 22, 2, '2020-12-07', '2020-12-07 03:56:57'),
(12, 15, 15, 18, 27, 62, 1, 22, 2, '2020-12-07', '2020-12-07 03:56:57'),
(13, 13, 14, 13, 28, 64, 1, 22, 2, '2020-12-07', '2020-12-07 03:56:57'),
(14, 20, 20, 13, 39, 68, 2, 22, 2, '2020-12-07', '2020-12-07 04:02:28'),
(15, 13, 14, 15, 35, 65, 2, 22, 2, '2020-12-07', '2020-12-07 04:02:28'),
(16, 15, 15, 14, 34, 69, 2, 22, 2, '2020-12-07', '2020-12-07 04:02:28'),
(17, 16, 16, 16, 36, 63, 2, 22, 2, '2020-12-07', '2020-12-07 04:02:28'),
(18, 16, 14, 17, 28, 66, 2, 22, 2, '2020-12-07', '2020-12-07 04:02:29'),
(19, 14, 17, 16, 25, 67, 2, 22, 2, '2020-12-07', '2020-12-07 04:02:29'),
(20, 16, 16, 17, 20, 70, 2, 22, 2, '2020-12-07', '2020-12-07 04:02:29'),
(21, 18, 15, 14, 21, 62, 2, 22, 2, '2020-12-07', '2020-12-07 04:02:29'),
(22, 13, 14, 12, 22, 64, 2, 22, 2, '2020-12-07', '2020-12-07 04:02:29'),
(23, 19, 19, 17, 40, 68, 3, 22, 2, '2020-12-07', '2020-12-07 04:10:57'),
(24, 13, 16, 14, 38, 65, 3, 22, 2, '2020-12-07', '2020-12-07 04:10:57'),
(25, 15, 15, 14, 34, 69, 3, 22, 2, '2020-12-07', '2020-12-07 04:10:57'),
(26, 17, 12, 17, 37, 63, 3, 22, 2, '2020-12-07', '2020-12-07 04:10:57'),
(27, 15, 16, 17, 27, 66, 3, 22, 2, '2020-12-07', '2020-12-07 04:10:57'),
(28, 12, 17, 18, 28, 67, 3, 22, 2, '2020-12-07', '2020-12-07 04:10:57'),
(29, 11, 18, 17, 31, 70, 3, 22, 2, '2020-12-07', '2020-12-07 04:10:57'),
(30, 16, 17, 14, 38, 62, 3, 22, 2, '2020-12-07', '2020-12-07 04:10:57'),
(31, 14, 12, 18, 39, 64, 3, 22, 2, '2020-12-07', '2020-12-07 04:10:58'),
(32, 20, 20, 20, 39, 68, 4, 22, 2, '2020-12-07', '2020-12-07 04:15:23'),
(33, 16, 15, 13, 34, 65, 4, 22, 2, '2020-12-07', '2020-12-07 04:15:23'),
(34, 18, 15, 14, 35, 69, 4, 22, 2, '2020-12-07', '2020-12-07 04:15:23'),
(35, 16, 17, 15, 36, 63, 4, 22, 2, '2020-12-07', '2020-12-07 04:15:23'),
(36, 15, 17, 16, 37, 66, 4, 22, 2, '2020-12-07', '2020-12-07 04:15:23'),
(37, 16, 14, 17, 38, 67, 4, 22, 2, '2020-12-07', '2020-12-07 04:15:23'),
(38, 12, 18, 18, 30, 70, 4, 22, 2, '2020-12-07', '2020-12-07 04:15:23'),
(39, 17, 15, 19, 33, 62, 4, 22, 2, '2020-12-07', '2020-12-07 04:15:23'),
(40, 17, 13, 17, 27, 64, 4, 22, 2, '2020-12-07', '2020-12-07 04:15:23'),
(41, 20, 18, 20, 40, 68, 5, 22, 2, '2020-12-07', '2020-12-07 04:21:48'),
(42, 15, 15, 14, 37, 65, 5, 22, 2, '2020-12-07', '2020-12-07 04:21:48'),
(43, 14, 15, 15, 30, 69, 5, 22, 2, '2020-12-07', '2020-12-07 04:21:48'),
(44, 15, 16, 14, 31, 63, 5, 22, 2, '2020-12-07', '2020-12-07 04:21:48'),
(45, 16, 13, 15, 32, 66, 5, 22, 2, '2020-12-07', '2020-12-07 04:21:48'),
(46, 17, 12, 16, 33, 67, 5, 22, 2, '2020-12-07', '2020-12-07 04:21:48'),
(47, 17, 15, 14, 34, 70, 5, 22, 2, '2020-12-07', '2020-12-07 04:21:48'),
(48, 19, 16, 15, 35, 62, 5, 22, 2, '2020-12-07', '2020-12-07 04:21:48'),
(49, 20, 17, 13, 36, 64, 5, 22, 2, '2020-12-07', '2020-12-07 04:21:48'),
(50, 18, 20, 20, 40, 68, 6, 22, 2, '2020-12-07', '2020-12-07 04:26:55'),
(51, 15, 10, 20, 36, 65, 6, 22, 2, '2020-12-07', '2020-12-07 04:26:56'),
(52, 16, 11, 15, 37, 69, 6, 22, 2, '2020-12-07', '2020-12-07 04:26:56'),
(53, 13, 12, 16, 35, 63, 6, 22, 2, '2020-12-07', '2020-12-07 04:26:56'),
(54, 13, 13, 12, 34, 66, 6, 22, 2, '2020-12-07', '2020-12-07 04:26:56'),
(55, 14, 14, 13, 33, 67, 6, 22, 2, '2020-12-07', '2020-12-07 04:26:56'),
(56, 17, 16, 14, 32, 70, 6, 22, 2, '2020-12-07', '2020-12-07 04:26:56'),
(57, 18, 15, 15, 31, 62, 6, 22, 2, '2020-12-07', '2020-12-07 04:26:56'),
(58, 10, 17, 16, 30, 64, 6, 22, 2, '2020-12-07', '2020-12-07 04:26:56'),
(59, 19, 18, 19, 35, 68, 7, 22, 2, '2020-12-07', '2020-12-07 04:30:32'),
(60, 14, 15, 14, 15, 65, 7, 22, 2, '2020-12-07', '2020-12-07 04:30:32'),
(61, 15, 17, 15, 19, 69, 7, 22, 2, '2020-12-07', '2020-12-07 04:30:32'),
(62, 17, 14, 15, 20, 63, 7, 22, 2, '2020-12-07', '2020-12-07 04:30:32'),
(63, 15, 13, 14, 27, 66, 7, 22, 2, '2020-12-07', '2020-12-07 04:30:32'),
(64, 18, 14, 2, 29, 67, 7, 22, 2, '2020-12-07', '2020-12-07 04:30:32'),
(65, 18, 15, 15, 31, 70, 7, 22, 2, '2020-12-07', '2020-12-07 04:30:32'),
(66, 15, 15, 15, 37, 62, 7, 22, 2, '2020-12-07', '2020-12-07 04:30:32'),
(67, 16, 15, 16, 34, 64, 7, 22, 2, '2020-12-07', '2020-12-07 04:30:32'),
(68, 17, 20, 20, 39, 68, 8, 22, 2, '2020-12-07', '2020-12-07 04:36:38'),
(69, 16, 20, 16, 32, 65, 8, 22, 2, '2020-12-07', '2020-12-07 04:36:39'),
(70, 13, 10, 14, 31, 69, 8, 22, 2, '2020-12-07', '2020-12-07 04:36:39'),
(71, 17, 16, 14, 35, 63, 8, 22, 2, '2020-12-07', '2020-12-07 04:36:39'),
(72, 16, 11, 12, 36, 66, 8, 22, 2, '2020-12-07', '2020-12-07 04:36:39'),
(73, 11, 14, 11, 35, 67, 8, 22, 2, '2020-12-07', '2020-12-07 04:36:39'),
(74, 10, 16, 11, 33, 70, 8, 22, 2, '2020-12-07', '2020-12-07 04:36:39'),
(75, 11, 17, 11, 32, 62, 8, 22, 2, '2020-12-07', '2020-12-07 04:36:39'),
(76, 15, 20, 11, 32, 64, 8, 22, 2, '2020-12-07', '2020-12-07 04:36:39'),
(77, 20, 20, 20, 37, 68, 9, 22, 2, '2020-12-07', '2020-12-07 04:41:20'),
(78, 15, 13, 2, 34, 65, 9, 22, 2, '2020-12-07', '2020-12-07 04:41:20'),
(79, 11, 14, 11, 35, 69, 9, 22, 2, '2020-12-07', '2020-12-07 04:41:20'),
(80, 10, 15, 11, 32, 63, 9, 22, 2, '2020-12-07', '2020-12-07 04:41:20'),
(81, 10, 14, 16, 32, 66, 9, 22, 2, '2020-12-07', '2020-12-07 04:41:20'),
(82, 14, 13, 16, 34, 67, 9, 22, 2, '2020-12-07', '2020-12-07 04:41:20'),
(83, 13, 13, 16, 32, 70, 9, 22, 2, '2020-12-07', '2020-12-07 04:41:20'),
(84, 11, 14, 16, 35, 62, 9, 22, 2, '2020-12-07', '2020-12-07 04:41:20'),
(85, 11, 11, 16, 32, 64, 9, 22, 2, '2020-12-07', '2020-12-07 04:41:20'),
(86, 20, 20, 15, 31, 68, 10, 22, 2, '2020-12-07', '2020-12-07 04:44:09'),
(87, 11, 14, 15, 22, 65, 10, 22, 2, '2020-12-07', '2020-12-07 04:44:09'),
(88, 3, 14, 13, 29, 69, 10, 22, 2, '2020-12-07', '2020-12-07 04:44:09'),
(89, 17, 14, 11, 28, 63, 10, 22, 2, '2020-12-07', '2020-12-07 04:44:10'),
(90, 16, 13, 10, 27, 66, 10, 22, 2, '2020-12-07', '2020-12-07 04:44:10'),
(91, 17, 13, 12, 26, 67, 10, 22, 2, '2020-12-07', '2020-12-07 04:44:10'),
(92, 11, 11, 12, 25, 70, 10, 22, 2, '2020-12-07', '2020-12-07 04:44:10'),
(93, 19, 14, 11, 24, 62, 10, 22, 2, '2020-12-07', '2020-12-07 04:44:10'),
(94, 11, 15, 13, 21, 64, 10, 22, 2, '2020-12-07', '2020-12-07 04:44:10'),
(95, 20, 11, 20, 37, 68, 11, 22, 2, '2020-12-07', '2020-12-07 04:48:56'),
(96, 19, 11, 15, 33, 65, 11, 22, 2, '2020-12-07', '2020-12-07 04:48:57'),
(97, 11, 11, 15, 33, 69, 11, 22, 2, '2020-12-07', '2020-12-07 04:48:57'),
(98, 11, 11, 14, 32, 63, 11, 22, 2, '2020-12-07', '2020-12-07 04:48:57'),
(99, 14, 11, 17, 21, 66, 11, 22, 2, '2020-12-07', '2020-12-07 04:48:57'),
(100, 15, 11, 18, 23, 67, 11, 22, 2, '2020-12-07', '2020-12-07 04:48:57'),
(101, 15, 11, 15, 25, 70, 11, 22, 2, '2020-12-07', '2020-12-07 04:48:57'),
(102, 13, 11, 14, 26, 62, 11, 22, 2, '2020-12-07', '2020-12-07 04:48:57'),
(103, 15, 11, 17, 26, 64, 11, 22, 2, '2020-12-07', '2020-12-07 04:48:57'),
(104, 20, 20, 20, 30, 68, 12, 22, 2, '2020-12-07', '2020-12-07 04:52:43'),
(105, 20, 15, 2, 21, 65, 12, 22, 2, '2020-12-07', '2020-12-07 04:52:44'),
(106, 20, 14, 7, 20, 69, 12, 22, 2, '2020-12-07', '2020-12-07 04:52:44'),
(107, 20, 17, 18, 23, 63, 12, 22, 2, '2020-12-07', '2020-12-07 04:52:44'),
(108, 16, 14, 2, 25, 66, 12, 22, 2, '2020-12-07', '2020-12-07 04:52:44'),
(109, 12, 14, 16, 24, 67, 12, 22, 2, '2020-12-07', '2020-12-07 04:52:44'),
(110, 16, 13, 17, 26, 70, 12, 22, 2, '2020-12-07', '2020-12-07 04:52:44'),
(111, 16, 11, 10, 27, 62, 12, 22, 2, '2020-12-07', '2020-12-07 04:52:44'),
(112, 15, 18, 11, 22, 64, 12, 22, 2, '2020-12-07', '2020-12-07 04:52:44'),
(113, 20, 15, 12, 39, 68, 13, 22, 2, '2020-12-07', '2020-12-07 04:55:42'),
(114, 15, 14, 14, 38, 65, 13, 22, 2, '2020-12-07', '2020-12-07 04:55:42'),
(115, 2, 14, 13, 37, 69, 13, 22, 2, '2020-12-07', '2020-12-07 04:55:42'),
(116, 15, 8, 14, 36, 63, 13, 22, 2, '2020-12-07', '2020-12-07 04:55:42'),
(117, 15, 5, 13, 35, 66, 13, 22, 2, '2020-12-07', '2020-12-07 04:55:42'),
(118, 16, 3, 13, 37, 67, 13, 22, 2, '2020-12-07', '2020-12-07 04:55:42'),
(119, 6, 17, 13, 31, 70, 13, 22, 2, '2020-12-07', '2020-12-07 04:55:42'),
(120, 9, 15, 13, 36, 62, 13, 22, 2, '2020-12-07', '2020-12-07 04:55:42'),
(121, 11, 14, 11, 35, 64, 13, 22, 2, '2020-12-07', '2020-12-07 04:55:42'),
(122, 12, 20, 20, 34, 68, 14, 22, 2, '2020-12-07', '2020-12-07 05:02:49'),
(123, 13, 19, 14, 32, 65, 14, 22, 2, '2020-12-07', '2020-12-07 05:02:49'),
(124, 15, 18, 14, 33, 69, 14, 22, 2, '2020-12-07', '2020-12-07 05:02:49'),
(125, 16, 17, 15, 33, 63, 14, 22, 2, '2020-12-07', '2020-12-07 05:02:50'),
(126, 17, 16, 11, 33, 66, 14, 22, 2, '2020-12-07', '2020-12-07 05:02:50'),
(127, 18, 15, 12, 33, 67, 14, 22, 2, '2020-12-07', '2020-12-07 05:02:50'),
(128, 19, 14, 17, 33, 70, 14, 22, 2, '2020-12-07', '2020-12-07 05:02:50'),
(129, 20, 13, 15, 33, 62, 14, 22, 2, '2020-12-07', '2020-12-07 05:02:50'),
(130, 17, 12, 15, 33, 64, 14, 22, 2, '2020-12-07', '2020-12-07 05:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `sry_recordsforaverageandgtotal`
--

CREATE TABLE `sry_recordsforaverageandgtotal` (
  `rid` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `record_date` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `gtotal` int(11) NOT NULL,
  `average` decimal(10,3) NOT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sry_recordsforaverageandgtotal`
--

INSERT INTO `sry_recordsforaverageandgtotal` (`rid`, `class_id`, `term_id`, `record_date`, `student_id`, `gtotal`, `average`, `position`) VALUES
(1, 13, 2, '2020-11-17', 49, 1012, '79.990', 1),
(2, 21, 2, '2020-12-06', 61, 869, '79.000', 2),
(3, 21, 2, '2020-12-06', 60, 1079, '98.091', 1),
(4, 21, 2, '2020-12-06', 59, 832, '75.636', 6),
(5, 21, 2, '2020-12-06', 58, 851, '77.364', 4),
(6, 21, 2, '2020-12-06', 57, 851, '77.364', 4),
(7, 21, 2, '2020-12-06', 56, 861, '78.273', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ss_attendance`
--

CREATE TABLE `ss_attendance` (
  `ss_attendance_id` int(11) NOT NULL,
  `weekValue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `todaysDate_id` int(11) NOT NULL,
  `todaysDate` date NOT NULL,
  `term_id` int(11) NOT NULL,
  `mark_m` tinyint(1) DEFAULT 0,
  `mark_a` tinyint(1) DEFAULT 0,
  `reasons` char(32) NOT NULL DEFAULT 'None',
  `sys_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ss_attendance`
--

INSERT INTO `ss_attendance` (`ss_attendance_id`, `weekValue_id`, `student_id`, `class_id`, `todaysDate_id`, `todaysDate`, `term_id`, `mark_m`, `mark_a`, `reasons`, `sys_date`) VALUES
(1, 6, 31, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(2, 6, 32, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(3, 6, 33, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(4, 6, 34, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(5, 6, 31, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:58'),
(6, 6, 32, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(7, 6, 33, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(8, 6, 34, 1, 5, '2020-06-11', 1, 1, 0, 'None', '2020-06-11 09:12:59'),
(9, 2, 47, 13, 66, '2020-10-12', 2, 1, 1, 'None', '2020-10-12 14:42:05'),
(10, 2, 49, 13, 66, '2020-10-12', 2, 1, 1, 'None', '2020-10-12 14:42:05'),
(11, 2, 48, 13, 66, '2020-10-12', 2, 1, 1, 'None', '2020-10-12 14:42:05'),
(12, 2, 46, 13, 66, '2020-10-12', 2, 1, 1, 'None', '2020-10-12 14:42:05'),
(13, 2, 49, 13, 67, '2020-10-13', 2, 1, 1, 'None', '2020-10-13 13:23:04'),
(14, 2, 48, 13, 67, '2020-10-13', 2, 1, 1, 'None', '2020-10-13 13:23:05'),
(15, 2, 46, 13, 67, '2020-10-13', 2, 1, 1, 'None', '2020-10-13 13:23:05'),
(16, 2, 47, 13, 67, '2020-10-13', 2, 1, 1, 'None', '2020-10-13 13:23:05'),
(17, 3, 46, 13, 68, '2020-10-19', 2, 1, 1, 'None', '2020-10-19 15:48:23'),
(18, 3, 47, 13, 68, '2020-10-19', 2, 1, 1, 'None', '2020-10-19 15:48:23'),
(19, 3, 49, 13, 68, '2020-10-19', 2, 1, 1, 'None', '2020-10-19 15:48:23'),
(20, 3, 48, 13, 68, '2020-10-19', 2, 1, 1, 'None', '2020-10-19 15:48:23'),
(21, 3, 46, 13, 69, '2020-10-20', 2, 1, 1, 'None', '2020-10-20 12:29:25'),
(22, 3, 47, 13, 69, '2020-10-20', 2, 1, 1, 'None', '2020-10-20 12:29:25'),
(23, 3, 49, 13, 69, '2020-10-20', 2, 1, 1, 'None', '2020-10-20 12:29:25'),
(24, 3, 48, 13, 69, '2020-10-20', 2, 1, 1, 'None', '2020-10-20 12:29:26'),
(25, 4, 47, 13, 71, '2020-10-26', 2, 1, 1, 'None', '2020-10-26 16:54:56'),
(26, 4, 49, 13, 71, '2020-10-26', 2, 1, 1, 'None', '2020-10-26 16:54:56'),
(27, 4, 48, 13, 71, '2020-10-26', 2, 1, 1, 'None', '2020-10-26 16:54:57'),
(28, 4, 46, 13, 71, '2020-10-26', 2, 1, 1, 'None', '2020-10-26 16:54:57'),
(29, 4, 49, 13, 72, '2020-10-27', 2, 1, 1, 'None', '2020-10-27 14:45:35'),
(30, 4, 48, 13, 72, '2020-10-27', 2, 1, 1, 'None', '2020-10-27 14:45:35'),
(31, 4, 46, 13, 72, '2020-10-27', 2, 1, 1, 'None', '2020-10-27 14:45:35'),
(32, 4, 47, 13, 72, '2020-10-27', 2, 1, 1, 'None', '2020-10-27 14:45:35'),
(33, 4, 49, 13, 73, '2020-10-29', 2, 1, 1, 'None', '2020-10-29 18:58:19'),
(34, 4, 48, 13, 73, '2020-10-29', 2, 1, 1, 'None', '2020-10-29 18:58:19'),
(35, 4, 46, 13, 73, '2020-10-29', 2, 1, 1, 'None', '2020-10-29 18:58:19'),
(36, 4, 47, 13, 73, '2020-10-29', 2, 1, 1, 'None', '2020-10-29 18:58:19'),
(37, 4, 48, 13, 74, '2020-10-30', 2, 1, 1, 'None', '2020-10-30 17:52:05'),
(38, 4, 46, 13, 74, '2020-10-30', 2, 1, 1, 'None', '2020-10-30 17:52:05'),
(39, 4, 47, 13, 74, '2020-10-30', 2, 1, 1, 'None', '2020-10-30 17:52:05'),
(40, 4, 49, 13, 74, '2020-10-30', 2, 1, 1, 'None', '2020-10-30 17:52:05'),
(41, 5, 49, 13, 75, '2020-11-02', 2, 1, 1, 'None', '2020-11-02 11:08:36'),
(42, 5, 48, 13, 75, '2020-11-02', 2, 1, 1, 'None', '2020-11-02 11:08:36'),
(43, 5, 46, 13, 75, '2020-11-02', 2, 1, 1, 'None', '2020-11-02 11:08:36'),
(44, 5, 47, 13, 75, '2020-11-02', 2, 1, 1, 'None', '2020-11-02 11:08:37'),
(45, 5, 47, 13, 76, '2020-11-03', 2, 1, 0, 'None', '2020-11-03 09:38:05'),
(46, 5, 49, 13, 76, '2020-11-03', 2, 1, 0, 'None', '2020-11-03 09:38:06'),
(47, 5, 48, 13, 76, '2020-11-03', 2, 1, 1, 'None', '2020-11-03 09:38:06'),
(48, 5, 46, 13, 76, '2020-11-03', 2, 1, 0, 'None', '2020-11-03 09:38:06'),
(49, 5, 47, 13, 76, '2020-11-03', 2, 1, 0, 'None', '2020-11-03 09:38:06'),
(50, 5, 49, 13, 76, '2020-11-03', 2, 1, 0, 'None', '2020-11-03 09:38:06'),
(51, 5, 48, 13, 76, '2020-11-03', 2, 1, 1, 'None', '2020-11-03 09:38:06'),
(52, 5, 46, 13, 76, '2020-11-03', 2, 1, 0, 'None', '2020-11-03 09:38:06'),
(53, 5, 49, 13, 77, '2020-11-04', 2, 1, 1, 'None', '2020-11-04 16:45:41'),
(54, 5, 48, 13, 77, '2020-11-04', 2, 1, 1, 'None', '2020-11-04 16:45:41'),
(55, 5, 46, 13, 77, '2020-11-04', 2, 1, 1, 'None', '2020-11-04 16:45:41'),
(56, 5, 47, 13, 77, '2020-11-04', 2, 1, 1, 'None', '2020-11-04 16:45:42'),
(57, 5, 47, 13, 78, '2020-11-05', 2, 1, 1, 'None', '2020-11-05 11:49:10'),
(58, 5, 49, 13, 78, '2020-11-05', 2, 1, 1, 'None', '2020-11-05 11:49:10'),
(59, 5, 48, 13, 78, '2020-11-05', 2, 1, 1, 'None', '2020-11-05 11:49:10'),
(60, 5, 46, 13, 78, '2020-11-05', 2, 1, 1, 'None', '2020-11-05 11:49:10'),
(61, 5, 47, 13, 79, '2020-11-06', 2, 1, 1, 'None', '2020-11-06 14:22:46'),
(62, 5, 49, 13, 79, '2020-11-06', 2, 1, 1, 'None', '2020-11-06 14:22:46'),
(63, 5, 48, 13, 79, '2020-11-06', 2, 1, 1, 'None', '2020-11-06 14:22:46'),
(64, 5, 46, 13, 79, '2020-11-06', 2, 1, 1, 'None', '2020-11-06 14:22:46'),
(65, 6, 49, 13, 80, '2020-11-09', 2, 1, 1, 'None', '2020-11-09 14:26:12'),
(66, 6, 48, 13, 80, '2020-11-09', 2, 1, 1, 'None', '2020-11-09 14:26:12'),
(67, 6, 46, 13, 80, '2020-11-09', 2, 1, 1, 'None', '2020-11-09 14:26:13'),
(68, 6, 47, 13, 80, '2020-11-09', 2, 1, 1, 'None', '2020-11-09 14:26:13'),
(69, 6, 46, 13, 81, '2020-11-12', 2, 1, 1, 'None', '2020-11-12 06:15:18'),
(70, 6, 47, 13, 81, '2020-11-12', 2, 1, 1, 'None', '2020-11-12 06:15:18'),
(71, 6, 49, 13, 81, '2020-11-12', 2, 1, 1, 'None', '2020-11-12 06:15:18'),
(72, 6, 48, 13, 81, '2020-11-12', 2, 1, 1, 'None', '2020-11-12 06:15:18'),
(73, 6, 49, 13, 82, '2020-11-13', 2, 1, 1, 'None', '2020-11-13 13:00:40'),
(74, 6, 48, 13, 82, '2020-11-13', 2, 1, 1, 'None', '2020-11-13 13:00:40'),
(75, 6, 46, 13, 82, '2020-11-13', 2, 1, 1, 'None', '2020-11-13 13:00:40'),
(76, 6, 47, 13, 82, '2020-11-13', 2, 1, 1, 'None', '2020-11-13 13:00:40'),
(77, 7, 49, 13, 83, '2020-11-16', 2, 1, 1, 'None', '2020-11-16 10:43:57'),
(78, 7, 48, 13, 83, '2020-11-16', 2, 1, 1, 'None', '2020-11-16 10:43:57'),
(79, 7, 46, 13, 83, '2020-11-16', 2, 1, 1, 'None', '2020-11-16 10:43:57'),
(80, 7, 47, 13, 83, '2020-11-16', 2, 1, 1, 'None', '2020-11-16 10:43:57'),
(81, 8, 48, 13, 84, '2020-11-23', 2, 1, 1, 'None', '2020-11-23 03:40:41'),
(82, 8, 46, 13, 84, '2020-11-23', 2, 1, 1, 'None', '2020-11-23 03:40:42'),
(83, 8, 47, 13, 84, '2020-11-23', 2, 1, 1, 'None', '2020-11-23 03:40:42'),
(84, 8, 49, 13, 84, '2020-11-23', 2, 1, 1, 'None', '2020-11-23 03:40:42'),
(85, 8, 47, 13, 85, '2020-11-24', 2, 1, 1, 'None', '2020-11-24 16:08:52'),
(86, 8, 49, 13, 85, '2020-11-24', 2, 1, 1, 'None', '2020-11-24 16:08:58'),
(87, 8, 48, 13, 85, '2020-11-24', 2, 1, 1, 'None', '2020-11-24 16:08:58'),
(88, 8, 46, 13, 85, '2020-11-24', 2, 1, 1, 'None', '2020-11-24 16:08:58'),
(89, 8, 47, 13, 86, '2020-11-26', 2, 1, 1, 'None', '2020-11-26 15:59:36'),
(90, 8, 49, 13, 86, '2020-11-26', 2, 1, 1, 'None', '2020-11-26 15:59:36'),
(91, 8, 48, 13, 86, '2020-11-26', 2, 1, 1, 'None', '2020-11-26 15:59:36'),
(92, 8, 46, 13, 86, '2020-11-26', 2, 1, 1, 'None', '2020-11-26 15:59:36'),
(93, 9, 46, 13, 88, '2020-12-02', 2, 1, 1, 'None', '2020-12-02 01:29:19'),
(94, 9, 47, 13, 88, '2020-12-02', 2, 1, 1, 'None', '2020-12-02 01:29:19'),
(95, 9, 49, 13, 88, '2020-12-02', 2, 1, 1, 'None', '2020-12-02 01:29:19'),
(96, 9, 48, 13, 88, '2020-12-02', 2, 1, 1, 'None', '2020-12-02 01:29:19'),
(97, 9, 54, 13, 88, '2020-12-02', 2, 1, 1, 'None', '2020-12-02 01:29:19'),
(98, 9, 47, 13, 89, '2020-12-03', 2, 1, 1, 'None', '2020-12-03 03:30:48'),
(99, 9, 49, 13, 89, '2020-12-03', 2, 1, 1, 'None', '2020-12-03 03:30:48'),
(100, 9, 48, 13, 89, '2020-12-03', 2, 1, 1, 'None', '2020-12-03 03:30:48'),
(101, 9, 46, 13, 89, '2020-12-03', 2, 1, 1, 'None', '2020-12-03 03:30:48'),
(102, 9, 54, 13, 89, '2020-12-03', 2, 1, 1, 'None', '2020-12-03 03:30:48'),
(103, 9, 46, 13, 90, '2020-12-04', 2, 1, 1, 'None', '2020-12-04 06:01:01'),
(104, 9, 47, 13, 90, '2020-12-04', 2, 1, 1, 'None', '2020-12-04 06:01:01'),
(105, 9, 49, 13, 90, '2020-12-04', 2, 1, 1, 'None', '2020-12-04 06:01:01'),
(106, 9, 48, 13, 90, '2020-12-04', 2, 1, 1, 'None', '2020-12-04 06:01:01'),
(107, 9, 54, 13, 90, '2020-12-04', 2, 1, 1, 'None', '2020-12-04 06:01:01'),
(108, 10, 56, 21, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:01:11'),
(109, 10, 58, 21, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:01:11'),
(110, 10, 61, 21, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:01:11'),
(111, 10, 57, 21, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:01:12'),
(112, 10, 59, 21, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:01:12'),
(113, 10, 60, 21, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:01:12'),
(114, 10, 46, 13, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:05:36'),
(115, 10, 47, 13, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:05:37'),
(116, 10, 49, 13, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:05:37'),
(117, 10, 48, 13, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:05:37'),
(118, 10, 54, 13, 91, '2020-12-07', 2, 1, 1, 'None', '2020-12-07 22:05:37'),
(119, 10, 47, 13, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:29:49'),
(120, 10, 49, 13, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:29:50'),
(121, 10, 48, 13, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:29:50'),
(122, 10, 46, 13, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:29:50'),
(123, 10, 54, 13, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:29:50'),
(124, 10, 58, 21, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:34:42'),
(125, 10, 56, 21, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:34:43'),
(126, 10, 57, 21, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:34:43'),
(127, 10, 59, 21, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:34:43'),
(128, 10, 60, 21, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:34:43'),
(129, 10, 61, 21, 92, '2020-12-08', 2, 1, 1, 'None', '2020-12-08 14:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `ss_ca_record`
--

CREATE TABLE `ss_ca_record` (
  `ss_ca_record_id` int(11) NOT NULL,
  `firstca` tinyint(3) NOT NULL,
  `secondca` tinyint(3) NOT NULL DEFAULT 0,
  `thirdca` tinyint(3) NOT NULL DEFAULT 0,
  `exams` smallint(3) NOT NULL DEFAULT 0,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `supDate` date NOT NULL,
  `sysDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ss_ca_record`
--

INSERT INTO `ss_ca_record` (`ss_ca_record_id`, `firstca`, `secondca`, `thirdca`, `exams`, `student_id`, `subject_id`, `class_id`, `term_id`, `supDate`, `sysDate`) VALUES
(1, 14, 0, 0, 0, 48, 1, 13, 2, '2020-11-24', '2020-11-24 16:32:35'),
(2, 18, 0, 0, 0, 46, 1, 13, 2, '2020-11-24', '2020-11-24 16:32:35'),
(3, 16, 0, 0, 0, 47, 1, 13, 2, '2020-11-24', '2020-11-24 16:32:35'),
(4, 15, 0, 0, 0, 49, 1, 13, 2, '2020-11-24', '2020-11-24 16:32:35'),
(5, 17, 0, 0, 0, 54, 1, 13, 2, '2020-12-05', '2020-12-05 02:37:29'),
(6, 16, 17, 16, 37, 56, 1, 21, 2, '2020-12-05', '2020-12-05 05:05:23'),
(7, 17, 19, 17, 30, 59, 1, 21, 2, '2020-12-05', '2020-12-05 05:05:23'),
(8, 14, 15, 13, 33, 58, 1, 21, 2, '2020-12-05', '2020-12-05 05:05:23'),
(9, 20, 20, 20, 40, 60, 1, 21, 2, '2020-12-05', '2020-12-05 05:05:23'),
(10, 13, 19, 19, 29, 61, 1, 21, 2, '2020-12-05', '2020-12-05 05:05:23'),
(11, 19, 18, 14, 39, 57, 1, 21, 2, '2020-12-05', '2020-12-05 05:05:23'),
(12, 16, 18, 13, 31, 56, 2, 21, 2, '2020-12-05', '2020-12-05 06:42:56'),
(13, 14, 15, 12, 30, 59, 2, 21, 2, '2020-12-05', '2020-12-05 06:42:56'),
(14, 17, 18, 18, 26, 58, 2, 21, 2, '2020-12-05', '2020-12-05 06:42:56'),
(15, 19, 20, 18, 37, 60, 2, 21, 2, '2020-12-05', '2020-12-05 06:42:56'),
(16, 18, 17, 17, 20, 61, 2, 21, 2, '2020-12-05', '2020-12-05 06:42:56'),
(17, 14, 19, 15, 28, 57, 2, 21, 2, '2020-12-05', '2020-12-05 06:42:56'),
(18, 17, 16, 17, 14, 56, 3, 21, 2, '2020-12-05', '2020-12-05 06:55:08'),
(19, 18, 15, 14, 31, 59, 3, 21, 2, '2020-12-05', '2020-12-05 06:55:08'),
(20, 16, 17, 17, 33, 58, 3, 21, 2, '2020-12-05', '2020-12-05 06:55:08'),
(21, 20, 20, 19, 40, 60, 3, 21, 2, '2020-12-05', '2020-12-05 06:55:08'),
(22, 12, 15, 14, 28, 61, 3, 21, 2, '2020-12-05', '2020-12-05 06:55:09'),
(23, 16, 15, 12, 35, 57, 3, 21, 2, '2020-12-05', '2020-12-05 06:55:09'),
(24, 13, 17, 17, 37, 56, 4, 21, 2, '2020-12-05', '2020-12-05 07:03:54'),
(25, 13, 16, 15, 32, 59, 4, 21, 2, '2020-12-05', '2020-12-05 07:03:54'),
(26, 10, 18, 15, 30, 58, 4, 21, 2, '2020-12-05', '2020-12-05 07:03:54'),
(27, 18, 20, 19, 40, 60, 4, 21, 2, '2020-12-05', '2020-12-05 07:03:54'),
(28, 15, 16, 16, 36, 61, 4, 21, 2, '2020-12-05', '2020-12-05 07:03:54'),
(29, 12, 17, 15, 20, 57, 4, 21, 2, '2020-12-05', '2020-12-05 07:03:54'),
(30, 19, 18, 15, 17, 56, 5, 21, 2, '2020-12-05', '2020-12-05 07:08:24'),
(31, 17, 14, 16, 19, 59, 5, 21, 2, '2020-12-05', '2020-12-05 07:08:24'),
(32, 16, 16, 17, 20, 58, 5, 21, 2, '2020-12-05', '2020-12-05 07:08:24'),
(33, 20, 20, 20, 37, 60, 5, 21, 2, '2020-12-05', '2020-12-05 07:08:24'),
(34, 13, 17, 18, 27, 61, 5, 21, 2, '2020-12-05', '2020-12-05 07:08:24'),
(35, 18, 17, 16, 25, 57, 5, 21, 2, '2020-12-05', '2020-12-05 07:08:25'),
(36, 17, 12, 18, 30, 56, 6, 21, 2, '2020-12-05', '2020-12-05 07:11:58'),
(37, 12, 16, 15, 30, 59, 6, 21, 2, '2020-12-05', '2020-12-05 07:11:59'),
(38, 15, 15, 12, 29, 58, 6, 21, 2, '2020-12-05', '2020-12-05 07:11:59'),
(39, 19, 19, 19, 40, 60, 6, 21, 2, '2020-12-05', '2020-12-05 07:11:59'),
(40, 17, 12, 17, 37, 61, 6, 21, 2, '2020-12-05', '2020-12-05 07:11:59'),
(41, 16, 19, 14, 38, 57, 6, 21, 2, '2020-12-05', '2020-12-05 07:11:59'),
(42, 18, 18, 13, 28, 56, 7, 21, 2, '2020-12-05', '2020-12-05 07:32:22'),
(43, 11, 13, 17, 36, 59, 7, 21, 2, '2020-12-05', '2020-12-05 07:32:22'),
(44, 17, 17, 16, 34, 58, 7, 21, 2, '2020-12-05', '2020-12-05 07:32:22'),
(45, 20, 20, 20, 39, 60, 7, 21, 2, '2020-12-05', '2020-12-05 07:32:22'),
(46, 17, 15, 17, 28, 61, 7, 21, 2, '2020-12-05', '2020-12-05 07:32:22'),
(47, 14, 16, 12, 23, 57, 7, 21, 2, '2020-12-05', '2020-12-05 07:32:22'),
(48, 19, 16, 19, 29, 56, 8, 21, 2, '2020-12-05', '2020-12-05 07:37:02'),
(49, 15, 17, 17, 30, 59, 8, 21, 2, '2020-12-05', '2020-12-05 07:37:02'),
(50, 17, 13, 13, 32, 58, 8, 21, 2, '2020-12-05', '2020-12-05 07:37:02'),
(51, 20, 19, 20, 39, 60, 8, 21, 2, '2020-12-05', '2020-12-05 07:37:02'),
(52, 18, 16, 15, 28, 61, 8, 21, 2, '2020-12-05', '2020-12-05 07:37:02'),
(53, 16, 17, 15, 30, 57, 8, 21, 2, '2020-12-05', '2020-12-05 07:37:02'),
(54, 18, 12, 17, 36, 56, 9, 21, 2, '2020-12-05', '2020-12-05 07:40:14'),
(55, 16, 16, 16, 31, 59, 9, 21, 2, '2020-12-05', '2020-12-05 07:40:14'),
(56, 15, 17, 18, 37, 58, 9, 21, 2, '2020-12-05', '2020-12-05 07:40:14'),
(57, 20, 20, 20, 40, 60, 9, 21, 2, '2020-12-05', '2020-12-05 07:40:14'),
(58, 17, 16, 15, 37, 61, 9, 21, 2, '2020-12-05', '2020-12-05 07:40:14'),
(59, 17, 17, 11, 30, 57, 9, 21, 2, '2020-12-05', '2020-12-05 07:40:14'),
(60, 12, 13, 18, 38, 56, 10, 21, 2, '2020-12-05', '2020-12-05 07:42:18'),
(61, 13, 16, 13, 29, 59, 10, 21, 2, '2020-12-05', '2020-12-05 07:42:18'),
(62, 12, 17, 17, 28, 58, 10, 21, 2, '2020-12-05', '2020-12-05 07:42:18'),
(63, 20, 19, 20, 39, 60, 10, 21, 2, '2020-12-05', '2020-12-05 07:42:18'),
(64, 18, 16, 15, 37, 61, 10, 21, 2, '2020-12-05', '2020-12-05 07:42:18'),
(65, 17, 13, 17, 33, 57, 10, 21, 2, '2020-12-05', '2020-12-05 07:42:18'),
(66, 17, 19, 13, 30, 56, 11, 21, 2, '2020-12-05', '2020-12-05 08:04:13'),
(67, 16, 18, 14, 31, 59, 11, 21, 2, '2020-12-05', '2020-12-05 08:04:13'),
(68, 17, 17, 15, 32, 58, 11, 21, 2, '2020-12-05', '2020-12-05 08:04:13'),
(69, 20, 20, 20, 40, 60, 11, 21, 2, '2020-12-05', '2020-12-05 08:04:13'),
(70, 16, 16, 16, 34, 61, 11, 21, 2, '2020-12-05', '2020-12-05 08:04:13'),
(71, 15, 15, 17, 35, 57, 11, 21, 2, '2020-12-05', '2020-12-05 08:04:13'),
(72, 13, 0, 0, 0, 71, 1, 21, 2, '2020-12-08', '2020-12-08 16:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `states_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`states_id`, `name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Enugu'),
(13, 'Edo'),
(14, 'Ekiti'),
(15, 'Gombe'),
(16, 'Imo'),
(17, 'Jigawa'),
(18, 'Kaduna'),
(19, 'Kano'),
(20, 'Katsina'),
(21, 'Kebbi'),
(22, 'Kogi'),
(23, 'Kwara'),
(24, 'Lagos'),
(25, 'Nasarawa'),
(26, 'Niger'),
(27, 'Ogun'),
(28, 'Ondo'),
(29, 'Osun'),
(30, 'Oyo'),
(31, 'Plateau'),
(32, 'Rivers'),
(33, 'Sokoto'),
(34, 'Taraba'),
(35, 'Yobe'),
(36, 'Zamfara'),
(37, 'FCT');

-- --------------------------------------------------------

--
-- Table structure for table `student_post`
--

CREATE TABLE `student_post` (
  `student_post_id` int(11) NOT NULL,
  `student_post_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_post`
--

INSERT INTO `student_post` (`student_post_id`, `student_post_name`) VALUES
(1, 'Head Boy'),
(2, 'Head Girl'),
(3, 'library Prefect'),
(4, 'Social Prefect'),
(5, 'Sanitation Prefect');

-- --------------------------------------------------------

--
-- Table structure for table `student_profile_content`
--

CREATE TABLE `student_profile_content` (
  `content_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `goal` varchar(255) NOT NULL,
  `objectives` varchar(255) NOT NULL,
  `describe_self` varchar(255) NOT NULL,
  `sysdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_profile_content`
--

INSERT INTO `student_profile_content` (`content_id`, `student_id`, `title`, `goal`, `objectives`, `describe_self`, `sysdate`) VALUES
(1, 49, 'Welcome to Bangis Incorporated', 'An expression is a phrase of JavaScript that a JavaScript interpreter can evaluate to produce a value. A constant embedded literally in your program is a very simple kind of expression', 'A variable name is also a simple expression that evaluates to whatever value has been assigned to that variable', 'An array access expression, for example, consists of one expression that evaluates to an array followed by an open square bracket, an expression that evaluates to an integer.', '2020-10-26 16:28:03'),
(2, 62, 'Tomato Guy', 'Bosted i left the unit cos we had the set up messed up', 'I love to miss you hate and focus on ya love', 'Am hotter than you', '2020-12-07 11:17:14'),
(3, 56, 'Astronomy Binoculars A Great Alternative', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction', '2020-12-07 21:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjects_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjects_id`, `name`) VALUES
(1, 'ENGLISH'),
(2, 'MATHEMATICS'),
(3, 'BIOLOGY'),
(4, 'CHEMISTRY'),
(5, 'PHYSICS'),
(6, 'AGRIC SCIENCE'),
(7, 'PHE'),
(8, 'GEOGRAPHY'),
(9, 'SOCIAL STUDIES'),
(10, 'BASIC SCIENCE '),
(11, 'BASIC TECHNOLOGY'),
(12, 'C R K'),
(13, 'HISTORY'),
(14, 'IGBO LANGUAGE'),
(15, 'VERBAL REASONING'),
(16, 'QUANTITATIVE REASONING');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `tax_id` int(11) NOT NULL,
  `tax_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tax_percentage` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`tax_id`, `tax_type`, `tax_percentage`) VALUES
(1, 'Sales Tax at 8.5%', '8.50'),
(2, 'No Tax', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teachers_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cvname` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 0,
  `birthcert` varchar(100) DEFAULT NULL,
  `primarycert` varchar(100) DEFAULT NULL,
  `o_Levelcert` varchar(100) DEFAULT NULL,
  `o_Levelcert2` varchar(100) DEFAULT NULL,
  `a_Levelcert` varchar(100) DEFAULT NULL,
  `procert` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `passport` varchar(100) DEFAULT NULL,
  `gender` int(2) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `states_rid` int(11) DEFAULT NULL,
  `admin_type` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teachers_id`, `name`, `phone`, `email`, `cvname`, `created_on`, `status`, `birthcert`, `primarycert`, `o_Levelcert`, `o_Levelcert2`, `a_Levelcert`, `procert`, `address`, `passport`, `gender`, `password`, `states_rid`, `admin_type`) VALUES
(1, 'TOMATO YAMAHA', '09034891209', 'tomato@gmail.com', 'TomatoYamaha09034891209.jpg', '2020-03-07 02:29:47', 5, 'iserv1_600.png', 'iserv3_600.png', 'iserv4_600.png', 'iserv5_600.png', 'iserv6_600.jpg', 'cert_600.jpg', 'No 78 Famacy road ojo lagos ', 'pass_126.jpg', 2, '$2y$10$.y4ovIpBhfrYIxsCKWuK2O5qBKfhwz896wTPTJukwev3X0dDpRwvO', 0, 0),
(2, 'WEBBER MAN', '09023781290', 'webbaman@gmail.com', 'webberMan09023781290.pdf', '2020-03-07 04:11:04', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(3, 'YANDAKI UMAR', '08123098912', 'yandaki@gmail.com', 'YandakiUmar08123098912.pdf', '2020-03-07 04:59:33', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(4, 'DAMILOLA YOSHI', '09031238909', 'damilola@gmail.com', 'DamilolaYoshi09031238909.jpg', '2020-03-08 02:04:12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(5, 'FREDRICK HUMBLE', '08132677474', 'humble36@gmail.com', 'FredrickHumble08132677474_400.jpg', '2020-03-31 10:01:23', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(6, 'GRACE MAYERS', '09034891209', 'mayer36@gmail.com', 'GraceMayers09034891209_400.jpg', '2020-03-31 10:20:14', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(7, 'HUMPHREY NWOSU', '09034676512', 'humnwosu@gmail.com', 'HumphreyNwosu09034676512_400.jpg', '2020-03-31 10:22:59', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(8, 'FALANA FRUITFULL', '08132909812', 'falan6738@gmail.com', 'FalanaFruitfull08132909812_400.jpg', '2020-03-31 10:25:32', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(9, 'ISFINE ISSELE', '09123894578', 'isfine309@gmail.com', 'IsfineIssele09123894578_400.jpg', '2020-03-31 10:28:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(10, 'JUMPER GARRISON', '07189238912', 'jumper@gmail.com', 'JumperGarrison07189238912_600.jpg', '2020-03-31 10:37:32', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(11, 'MOHAMMED SULEMAN', '08138794748', 'mohammed783@gmail.com', 'MohammedSuleman08138794748_600.jpg', '2020-03-31 12:27:28', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(12, 'ONYEKA ONWUTALU', '08134899043', 'schoolshop@gmail.com', 'OnyekaOnwutalu08134899043_600.jpg', '2020-04-12 01:08:00', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$w1TCKn8mqarsbynFVZtvd.f/YbesxBIeiqXJF.txLhi231GrW.6.y', 0, 7),
(13, 'TACKO BENSON', '08134899012', 'iservfng@gmail.com', 'TackoBenson08134899012_600.jpg', '2020-04-16 03:43:07', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(14, 'HANDSOME FRIENDLY', '08134899009', 'handsomefriend@gmail.com', 'HandsomeFriendly08134899009_600.jpg', '2020-04-16 16:09:28', 5, 'cert_600.jpg', 'iserv1_600.png', 'iserv2_600.png', 'iserv3_600.png', 'iserv4_600.png', 'iserv5_600.png', 'No. 123 Ahmed Bello way Katsina', 'pass_126.jpg', 2, '$2y$10$7qExS7Pzz6Yk.YvebNVK2ug0BGbpZtb5m0fSbD5kp71.EfHt5pGzm', 0, 0),
(15, 'TEMPRETURE AZURE', '09134899032', 'isetrvng@gmail.com', 'TempretureAzure09134899032_600.jpg', '2020-04-19 20:24:05', 5, 'cert_600.jpg', 'iserv1_600.png', 'iserv2_600.png', 'iserv3_600.png', 'iserv6_600.jpg', 'iserv5_600.png', 'Kilometer 4 Ajumet Lago Nigeria', 'pass_126.jpg', 2, '$2y$10$2xVM8rPPZ8TNxwjhkqwHg.w8g3XFKpfip4SBWNnk7npcClmmMm9fG', 0, 0),
(16, 'GABREILA UGONNA', '09083478923', 'isewwrvng@gmail.com', 'GabreilaUgonna09083478923_600.jpg', '2020-04-19 21:09:46', 6, 'cert_600.jpg', 'iserv1_600.png', 'iserv2_600.png', 'iserv3_600.png', 'iserv4_600.png', 'iserv5_600.png', 'No. 676 Fanta Street Lagos Nigeria', 'pass_126.jpg', 2, '$2y$10$8SOy8cKFGIW0xGlCNaBy0.53631cC37N89Lv/3wsngXeLjpyv2Gbm', 0, 0),
(17, 'FROSTY ANDERSON', '08134781290', 'iservng@gmail.com', 'FrostyAnderson08134781290_600.jpg', '2020-04-20 03:56:03', 6, 'iserv1_600.png', 'iserv2_600.png', 'iserv3_600.png', 'iserv4_600.png', 'iserv5_600.png', 'iserv6_600.jpg', 'No. 98 Umalele Uwala quarters Katsina State', 'pass_126.jpg', 1, '$2y$10$7kYNsEwmemam3by4AVYeouM8YJ/R5DZZUTZMuuZnlExKTBX/Kaowe', 0, 0),
(18, 'BIGS BANGIS', '08134789812', 'bangisandiou2@gmail.com', 'BigsBangis08134789812_600.jpg', '2020-04-20 07:26:25', 6, 'cert_600.jpg', 'iserv1_600.png', 'iserv2_600.png', NULL, 'iserv3_600.png', 'iserv4_600.png', 'No. 22 Gambo street Osun State', 'pass_126.jpg', 1, '$2y$10$ERQDmcG5z1qXOEfmdLBZ.O6REboRLxjw7MCcfBn1hXlITwICoJT2S', 0, 0),
(19, 'TELLEMM FRIENDS', '09132908976', 'bangisandu22@gmail.com', 'TellemmFriends09132908976_600.jpg', '2020-04-20 10:04:25', 6, 'iserv1_600.png', 'iserv2_600.png', 'iserv3_600.png', 'iserv4_600.png', 'iserv5_600.png', 'iserv6_600.jpg', 'No. 73 Ahmadu Bello way Katsina State', 'pass_126.jpg', 1, '$2y$10$Ax1DG7xqqIE8X03q0I3pUe6EyA2Cpn9hDzFXm0l2aBcOHorTb9ySW', 0, 0),
(20, 'PROFESSOR OLEYEDE', '08034899076', 'bangisandu2@gmail.com', 'ProfessorOleyede08034899076_600.jpg', '2020-04-22 13:45:00', 6, 'iserv1_600.png', 'iserv2_600.png', 'iserv3_600.png', 'iserv4_600.png', 'iserv5_600.png', 'iserv6_600.jpg', 'No. 78 Ufondu street near Bank road Offa Lagos', 'pass_126.jpg', 1, '$2y$10$009m5kKXQDlo0FlhGci90.AdzJuYpXIx2hzurIh0LAGGC/CBnLaFi', 0, 0),
(21, 'ALFONSO MARK', '08134898912', 'efaict307@gmail.com', 'AlfonsoMark08134898912_600.jpg', '2020-04-23 01:34:16', 6, 'iserv1_600.png', 'iserv2_600.png', 'iserv3_600.png', 'iserv4_600.png', 'iserv5_600.png', 'iserv6_600.jpg', 'Kilometer 3 Obianodo street Ibadan Lago', 'pass_126.jpg', 2, '$2y$10$9UGsCpNaLLUo5h87iJelF.9KgsedxjPlf3Ms1po4jdzfQdVnE2Oti', 0, 0),
(22, 'SOMTO CHUKWU', '09089891278', 'somtochkuwu@gmail.com', 'SomtoChukwu09089891278_600.jpg', '2020-09-16 16:51:19', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(23, 'MUSTAPHA MUSA', '09034899021', 'musa4real@gmail.com', 'MustaphaMusa09034899021_600.jpg', '2020-09-17 13:27:28', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(24, 'HASSAN USMAN', '08134899121', 'hassabusman12@gmail.com', 'HassanUsman08134899121_600.jpg', '2020-09-28 10:01:26', 5, 'cert_600.jpg', 'iserv1_600.png', 'iserv6_600.jpg', 'iserv4_600.png', 'iserv5_600.png', 'iserv3_600.png', 'Kangiwa road GRA Katsina State', 'pass_126.png', 1, '$2y$10$eVDmgnPVFT7xl9Bdx3MCcOg/0E5g07GFjqJD74c0gQDDH1NEKNGo6', 20, 0),
(25, 'ESTHER SUNDAY', '09134899043', 'esthersunday@gmail.com', 'EstherSunday09134899043_600.jpg', '2020-09-30 11:40:17', 6, 'iserv1_600.png', 'iserv2_600.png', 'iserv3_600.png', 'iserv4_600.png', 'iserv5_600.png', 'iserv6_600.jpg', 'No. 78 Kangiwa road, off Maidabino yurghurt GRA Katsina State.', 'mipass_126.png', 2, '$2y$10$6SFmYnDTKKnEt1GHuWe/cuIXs4AKpdZ8n9ig8odVTSw2R9B8oom46', 20, 1),
(26, 'MARTIN FEMI', '08134776765', 'martinfemi33@gmail.com', 'MartinFemi08134776765_600.jpg', '2020-10-10 07:03:41', 6, 'cert_600.jpg', 'iserv1_600.png', 'iserv2_600.png', 'iserv3_600.png', 'iserv4_600.png', 'iserv5_600.png', 'Martin femi avenue Lagos Nigeria', 'boy1_126.png', 1, '$2y$10$gF2AHC5e5heY5dQ7Cb6Qg.NHe8KjcchQgjkf40/yjVNUTVMAicOZ6', 24, 0),
(27, 'KARIM ABDULKARIM', '09031289012', 'karim9foreal@gmail.com', 'KarimAbdulkarim09031289012_600.jpg', '2020-12-05 03:16:09', 6, 'iserv1_600.png', 'iserv2_600.png', 'iserv3_600.png', NULL, 'iserv4_600.png', 'iserv5_600.png', 'No. 78 elementary road Jos Nigeria ', 'stu3_126.png', 1, '$2y$10$gcRQmX3HUeImLfGRp.3Evet0jKOBtjfXKm.alhsnv0bt6nQfgsWmy', 23, 0),
(28, 'COSMOS ACHIA', '09034562156', 'cosmoachia@gmail.com', 'CosmosAchia09034562156_600.jpg', '2020-12-06 14:31:09', 6, 'cert_600.jpg', 'iserv1_600.png', 'iserv2_600.png', NULL, 'iserv3_600.png', 'iserv4_600.png', 'Kofar kaura layout Katsina state Niger', 'pass_126.png', 1, '$2y$10$OLiFM9SeBa42e2XQ3LANNe3qw/lRZYpPHHidnoXJyEdlW8R6M9BhO', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE `teacher_class` (
  `teacher_class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`teacher_class_id`, `teacher_id`, `class_id`) VALUES
(1, 16, 14),
(2, 16, 15),
(3, 17, 1),
(4, 17, 3),
(5, 17, 4),
(6, 18, 1),
(7, 18, 2),
(8, 19, 7),
(9, 19, 8),
(10, 20, 1),
(11, 20, 2),
(12, 21, 1),
(13, 21, 2),
(14, 25, 7),
(15, 26, 13),
(16, 27, 21),
(17, 28, 22);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `term_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`term_id`, `name`) VALUES
(1, 'First Term'),
(2, 'Second Term'),
(3, 'Third Term');

-- --------------------------------------------------------

--
-- Table structure for table `tn_attendance`
--

CREATE TABLE `tn_attendance` (
  `tn_attendance_id` int(11) NOT NULL,
  `weekValue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `todaysDate_id` int(11) NOT NULL,
  `todaysDate` date NOT NULL,
  `term_id` int(11) NOT NULL,
  `mark_m` tinyint(1) DEFAULT 0,
  `mark_a` tinyint(1) DEFAULT 0,
  `reasons` char(32) NOT NULL DEFAULT 'None',
  `sys_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tn_attendance`
--

INSERT INTO `tn_attendance` (`tn_attendance_id`, `weekValue_id`, `student_id`, `class_id`, `todaysDate_id`, `todaysDate`, `term_id`, `mark_m`, `mark_a`, `reasons`, `sys_date`) VALUES
(1, 6, 31, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(2, 6, 32, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(3, 6, 33, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(4, 6, 34, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(5, 6, 31, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:58'),
(6, 6, 32, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(7, 6, 33, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(8, 6, 34, 1, 5, '2020-06-11', 1, 1, 0, 'None', '2020-06-11 09:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `tn_ca_record`
--

CREATE TABLE `tn_ca_record` (
  `tn_ca_record_id` int(11) NOT NULL,
  `firstca` tinyint(3) NOT NULL,
  `secondca` tinyint(3) NOT NULL DEFAULT 0,
  `thirdca` tinyint(3) NOT NULL DEFAULT 0,
  `exams` smallint(3) NOT NULL DEFAULT 0,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `supDate` date NOT NULL,
  `sysDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `todays_date`
--

CREATE TABLE `todays_date` (
  `todays_date_id` int(11) NOT NULL,
  `date_value` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todays_date`
--

INSERT INTO `todays_date` (`todays_date_id`, `date_value`) VALUES
(1, '2020-06-07'),
(2, '2020-06-08'),
(3, '2020-06-09'),
(4, '2020-06-10'),
(5, '2020-06-11'),
(6, '2020-06-17'),
(7, '2020-06-18'),
(8, '2020-06-20'),
(9, '2020-06-22'),
(10, '2020-06-23'),
(11, '2020-06-24'),
(12, '2020-06-25'),
(13, '2020-06-29'),
(14, '2020-06-30'),
(15, '2020-07-01'),
(16, '2020-07-02'),
(17, '2020-07-05'),
(18, '2020-07-06'),
(19, '2020-07-07'),
(20, '2020-07-08'),
(21, '2020-07-09'),
(22, '2020-07-10'),
(23, '2020-07-13'),
(24, '2020-07-14'),
(25, '2020-07-15'),
(26, '2020-07-16'),
(27, '2020-07-17'),
(28, '2020-07-20'),
(29, '2020-07-21'),
(30, '2020-07-22'),
(31, '2020-07-23'),
(32, '2020-07-24'),
(33, '2020-07-27'),
(34, '2020-07-28'),
(35, '2020-07-29'),
(36, '2020-08-03'),
(37, '2020-08-04'),
(38, '2020-08-05'),
(39, '2020-08-06'),
(40, '2020-08-07'),
(41, '2020-08-10'),
(42, '2020-08-11'),
(43, '2020-08-12'),
(44, '2020-08-13'),
(45, '2020-08-17'),
(46, '2020-08-18'),
(47, '2020-08-19'),
(48, '2020-08-20'),
(49, '2020-08-24'),
(50, '2020-08-25'),
(51, '2020-08-31'),
(52, '2020-09-07'),
(53, '2020-09-08'),
(54, '2020-09-09'),
(55, '2020-09-10'),
(56, '2020-09-11'),
(57, '2020-09-14'),
(58, '2020-09-15'),
(59, '2020-09-16'),
(60, '2020-09-17'),
(61, '2020-10-05'),
(62, '2020-10-06'),
(63, '2020-10-07'),
(64, '2020-10-08'),
(65, '2020-10-09'),
(66, '2020-10-12'),
(67, '2020-10-13'),
(68, '2020-10-19'),
(69, '2020-10-20'),
(70, '2020-10-21'),
(71, '2020-10-26'),
(72, '2020-10-27'),
(73, '2020-10-29'),
(74, '2020-10-30'),
(75, '2020-11-02'),
(76, '2020-11-03'),
(77, '2020-11-04'),
(78, '2020-11-05'),
(79, '2020-11-06'),
(80, '2020-11-09'),
(81, '2020-11-12'),
(82, '2020-11-13'),
(83, '2020-11-16'),
(84, '2020-11-23'),
(85, '2020-11-24'),
(86, '2020-11-26'),
(87, '2020-12-01'),
(88, '2020-12-02'),
(89, '2020-12-03'),
(90, '2020-12-04'),
(91, '2020-12-07'),
(92, '2020-12-08'),
(93, '2020-12-09'),
(94, '2020-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `tp_attendance`
--

CREATE TABLE `tp_attendance` (
  `tp_attendance_id` int(11) NOT NULL,
  `weekValue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `todaysDate_id` int(11) NOT NULL,
  `todaysDate` date NOT NULL,
  `term_id` int(11) NOT NULL,
  `mark_m` tinyint(1) DEFAULT 0,
  `mark_a` tinyint(1) DEFAULT 0,
  `reasons` char(32) NOT NULL DEFAULT 'None',
  `sys_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tp_attendance`
--

INSERT INTO `tp_attendance` (`tp_attendance_id`, `weekValue_id`, `student_id`, `class_id`, `todaysDate_id`, `todaysDate`, `term_id`, `mark_m`, `mark_a`, `reasons`, `sys_date`) VALUES
(1, 6, 31, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(2, 6, 32, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(3, 6, 33, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(4, 6, 34, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(5, 6, 31, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:58'),
(6, 6, 32, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(7, 6, 33, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(8, 6, 34, 1, 5, '2020-06-11', 1, 1, 0, 'None', '2020-06-11 09:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `tp_ca_record`
--

CREATE TABLE `tp_ca_record` (
  `tp_ca_record_id` int(11) NOT NULL,
  `firstca` tinyint(3) NOT NULL,
  `secondca` tinyint(3) NOT NULL DEFAULT 0,
  `thirdca` tinyint(3) NOT NULL DEFAULT 0,
  `exams` smallint(3) NOT NULL DEFAULT 0,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `supDate` date NOT NULL,
  `sysDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ts_attendance`
--

CREATE TABLE `ts_attendance` (
  `ts_attendance_id` int(11) NOT NULL,
  `weekValue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `todaysDate_id` int(11) NOT NULL,
  `todaysDate` date NOT NULL,
  `term_id` int(11) NOT NULL,
  `mark_m` tinyint(1) DEFAULT 0,
  `mark_a` tinyint(1) DEFAULT 0,
  `reasons` char(32) NOT NULL DEFAULT 'None',
  `sys_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_attendance`
--

INSERT INTO `ts_attendance` (`ts_attendance_id`, `weekValue_id`, `student_id`, `class_id`, `todaysDate_id`, `todaysDate`, `term_id`, `mark_m`, `mark_a`, `reasons`, `sys_date`) VALUES
(1, 6, 31, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(2, 6, 32, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(3, 6, 33, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(4, 6, 34, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(5, 6, 31, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:58'),
(6, 6, 32, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(7, 6, 33, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(8, 6, 34, 1, 5, '2020-06-11', 1, 1, 0, 'None', '2020-06-11 09:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `ts_ca_record`
--

CREATE TABLE `ts_ca_record` (
  `ts_ca_record_id` int(11) NOT NULL,
  `firstca` tinyint(3) NOT NULL,
  `secondca` tinyint(3) NOT NULL DEFAULT 0,
  `thirdca` tinyint(3) NOT NULL DEFAULT 0,
  `exams` smallint(3) NOT NULL DEFAULT 0,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `supDate` date NOT NULL,
  `sysDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_ca_record`
--

INSERT INTO `ts_ca_record` (`ts_ca_record_id`, `firstca`, `secondca`, `thirdca`, `exams`, `student_id`, `subject_id`, `class_id`, `term_id`, `supDate`, `sysDate`) VALUES
(1, 17, 0, 0, 0, 54, 1, 13, 2, '2020-12-03', '2020-12-03 06:33:49'),
(2, 17, 0, 0, 0, 54, 1, 13, 2, '2020-12-03', '2020-12-03 06:33:49'),
(3, 17, 0, 0, 0, 54, 1, 13, 2, '2020-12-03', '2020-12-03 06:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `weekly_percentage`
--

CREATE TABLE `weekly_percentage` (
  `weekly_percentage_id` int(11) NOT NULL,
  `weekvalue_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `todaysDate` date NOT NULL,
  `weekwhat` char(32) NOT NULL,
  `weeklypercentage` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weekly_percentage`
--

INSERT INTO `weekly_percentage` (`weekly_percentage_id`, `weekvalue_id`, `class_id`, `term_id`, `todaysDate`, `weekwhat`, `weeklypercentage`) VALUES
(1, 10, 1, 1, '2020-07-10', 'Week Ten', '100.00'),
(2, 11, 1, 1, '2020-07-17', 'Week Eleven', '110.00'),
(3, 12, 1, 1, '2020-07-24', 'Week Twelve', '100.00'),
(4, 14, 1, 1, '2020-08-07', 'Week Fourteen', '100.00'),
(5, 4, 1, 2, '2020-10-30', 'Week Four', '80.00'),
(6, 4, 13, 2, '2020-10-30', 'Week Four', '80.00'),
(7, 4, 7, 2, '2020-10-30', 'Week Four', '80.00'),
(8, 5, 1, 2, '2020-11-06', 'Week Five', '100.00'),
(9, 5, 13, 2, '2020-11-06', 'Week Five', '105.00'),
(10, 5, 7, 2, '2020-11-06', 'Week Five', '100.00'),
(11, 6, 1, 2, '2020-11-13', 'Week Six', '60.00'),
(12, 6, 13, 2, '2020-11-13', 'Week Six', '60.00'),
(13, 6, 7, 2, '2020-11-13', 'Week Six', '60.00'),
(14, 9, 13, 2, '2020-12-04', 'Week Nine', '60.00');

-- --------------------------------------------------------

--
-- Table structure for table `weekly_total`
--

CREATE TABLE `weekly_total` (
  `weekly_total_id` int(11) NOT NULL,
  `weekvalue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `todaydate_id` int(11) NOT NULL,
  `todaydate` date NOT NULL,
  `term_id` int(11) NOT NULL,
  `weektotal` int(11) NOT NULL,
  `sys_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weekly_total`
--

INSERT INTO `weekly_total` (`weekly_total_id`, `weekvalue_id`, `student_id`, `class_id`, `todaydate_id`, `todaydate`, `term_id`, `weektotal`, `sys_date`) VALUES
(1, 6, 31, 1, 5, '2020-06-11', 1, 4, '2020-06-10 15:25:02'),
(2, 6, 32, 1, 5, '2020-06-11', 1, 4, '2020-06-10 15:25:02'),
(3, 6, 33, 1, 5, '2020-06-11', 1, 4, '2020-06-10 15:25:02'),
(4, 6, 34, 1, 5, '2020-06-11', 1, 3, '2020-06-10 15:25:02'),
(5, 7, 31, 1, 7, '2020-06-18', 1, 3, '2020-06-17 06:13:06'),
(6, 7, 32, 1, 7, '2020-06-18', 1, 4, '2020-06-17 06:13:06'),
(7, 7, 33, 1, 7, '2020-06-18', 1, 4, '2020-06-17 06:13:06'),
(8, 7, 34, 1, 7, '2020-06-18', 1, 3, '2020-06-17 06:13:06'),
(9, 8, 31, 1, 12, '2020-06-25', 1, 8, '2020-06-22 11:46:20'),
(10, 8, 32, 1, 12, '2020-06-25', 1, 7, '2020-06-22 11:46:20'),
(11, 8, 33, 1, 12, '2020-06-25', 1, 8, '2020-06-22 11:46:20'),
(12, 8, 34, 1, 12, '2020-06-25', 1, 8, '2020-06-22 11:46:20'),
(13, 9, 31, 1, 16, '2020-07-02', 1, 9, '2020-06-29 11:47:14'),
(14, 9, 32, 1, 16, '2020-07-02', 1, 9, '2020-06-29 11:47:14'),
(15, 9, 33, 1, 16, '2020-07-02', 1, 9, '2020-06-29 11:47:14'),
(16, 9, 34, 1, 16, '2020-07-02', 1, 9, '2020-06-29 11:47:15'),
(17, 10, 31, 1, 22, '2020-07-10', 1, 10, '2020-07-06 03:17:12'),
(18, 10, 34, 1, 22, '2020-07-10', 1, 10, '2020-07-06 03:17:12'),
(19, 10, 33, 1, 22, '2020-07-10', 1, 10, '2020-07-06 03:17:13'),
(20, 10, 32, 1, 22, '2020-07-10', 1, 10, '2020-07-06 03:17:13'),
(21, 11, 34, 1, 27, '2020-07-17', 1, 10, '2020-07-13 12:29:22'),
(22, 11, 33, 1, 27, '2020-07-17', 1, 10, '2020-07-13 12:29:22'),
(23, 11, 31, 1, 27, '2020-07-17', 1, 10, '2020-07-13 12:29:22'),
(24, 11, 32, 1, 27, '2020-07-17', 1, 10, '2020-07-13 12:29:22'),
(25, 12, 31, 1, 32, '2020-07-24', 1, 10, '2020-07-20 11:27:03'),
(26, 12, 34, 1, 32, '2020-07-24', 1, 10, '2020-07-20 11:27:03'),
(27, 12, 33, 1, 32, '2020-07-24', 1, 10, '2020-07-20 11:27:03'),
(28, 12, 32, 1, 32, '2020-07-24', 1, 10, '2020-07-20 11:27:03'),
(29, 13, 31, 1, 35, '2020-07-29', 1, 6, '2020-07-27 14:31:52'),
(30, 13, 34, 1, 35, '2020-07-29', 1, 6, '2020-07-27 14:31:52'),
(31, 13, 33, 1, 35, '2020-07-29', 1, 6, '2020-07-27 14:31:52'),
(32, 13, 32, 1, 35, '2020-07-29', 1, 6, '2020-07-27 14:31:52'),
(33, 14, 31, 1, 40, '2020-08-07', 1, 10, '2020-08-03 13:11:40'),
(34, 14, 34, 1, 40, '2020-08-07', 1, 10, '2020-08-03 13:11:40'),
(35, 14, 33, 1, 40, '2020-08-07', 1, 10, '2020-08-03 13:11:40'),
(36, 14, 32, 1, 40, '2020-08-07', 1, 10, '2020-08-03 13:11:40'),
(37, 15, 34, 1, 44, '2020-08-13', 1, 8, '2020-08-10 11:28:58'),
(38, 15, 33, 1, 44, '2020-08-13', 1, 8, '2020-08-10 11:28:58'),
(39, 15, 31, 1, 44, '2020-08-13', 1, 8, '2020-08-10 11:28:58'),
(40, 15, 32, 1, 44, '2020-08-13', 1, 8, '2020-08-10 11:28:58'),
(41, 1, 31, 1, 64, '2020-10-08', 2, 5, '2020-10-06 17:13:36'),
(42, 1, 34, 1, 64, '2020-10-08', 2, 5, '2020-10-06 17:13:36'),
(43, 1, 33, 1, 64, '2020-10-08', 2, 5, '2020-10-06 17:13:37'),
(44, 1, 32, 1, 64, '2020-10-08', 2, 5, '2020-10-06 17:13:37'),
(45, 1, 31, 1, 64, '2020-10-08', 2, 5, '2020-10-06 17:15:11'),
(46, 1, 34, 1, 64, '2020-10-08', 2, 5, '2020-10-06 17:15:12'),
(47, 1, 33, 1, 64, '2020-10-08', 2, 5, '2020-10-06 17:15:12'),
(48, 1, 32, 1, 64, '2020-10-08', 2, 5, '2020-10-06 17:15:12'),
(49, 1, 42, 7, 64, '2020-10-08', 2, 5, '2020-10-06 19:24:09'),
(50, 1, 41, 7, 64, '2020-10-08', 2, 5, '2020-10-06 19:24:09'),
(51, 1, 43, 7, 64, '2020-10-08', 2, 5, '2020-10-06 19:24:09'),
(52, 1, 40, 7, 64, '2020-10-08', 2, 5, '2020-10-06 19:24:10'),
(53, 2, 47, 13, 67, '2020-10-13', 2, 4, '2020-10-12 14:42:05'),
(54, 2, 49, 13, 67, '2020-10-13', 2, 4, '2020-10-12 14:42:05'),
(55, 2, 48, 13, 67, '2020-10-13', 2, 4, '2020-10-12 14:42:05'),
(56, 2, 46, 13, 67, '2020-10-13', 2, 4, '2020-10-12 14:42:05'),
(57, 2, 43, 7, 67, '2020-10-13', 2, 4, '2020-10-12 15:01:54'),
(58, 2, 42, 7, 67, '2020-10-13', 2, 4, '2020-10-12 15:01:54'),
(59, 2, 41, 7, 67, '2020-10-13', 2, 4, '2020-10-12 15:01:54'),
(60, 2, 40, 7, 67, '2020-10-13', 2, 4, '2020-10-12 15:01:54'),
(61, 2, 31, 1, 67, '2020-10-13', 2, 4, '2020-10-12 15:03:41'),
(62, 2, 34, 1, 67, '2020-10-13', 2, 4, '2020-10-12 15:03:41'),
(63, 2, 33, 1, 67, '2020-10-13', 2, 4, '2020-10-12 15:03:41'),
(64, 2, 32, 1, 67, '2020-10-13', 2, 4, '2020-10-12 15:03:41'),
(65, 3, 33, 1, 70, '2020-10-21', 2, 6, '2020-10-19 13:08:34'),
(66, 3, 31, 1, 70, '2020-10-21', 2, 6, '2020-10-19 13:08:34'),
(67, 3, 34, 1, 70, '2020-10-21', 2, 6, '2020-10-19 13:08:34'),
(68, 3, 32, 1, 70, '2020-10-21', 2, 6, '2020-10-19 13:08:34'),
(69, 3, 42, 7, 69, '2020-10-20', 2, 5, '2020-10-19 15:46:16'),
(70, 3, 41, 7, 69, '2020-10-20', 2, 5, '2020-10-19 15:46:16'),
(71, 3, 43, 7, 69, '2020-10-20', 2, 5, '2020-10-19 15:46:16'),
(72, 3, 40, 7, 69, '2020-10-20', 2, 5, '2020-10-19 15:46:17'),
(73, 3, 46, 13, 69, '2020-10-20', 2, 4, '2020-10-19 15:48:23'),
(74, 3, 47, 13, 69, '2020-10-20', 2, 4, '2020-10-19 15:48:23'),
(75, 3, 49, 13, 69, '2020-10-20', 2, 4, '2020-10-19 15:48:23'),
(76, 3, 48, 13, 69, '2020-10-20', 2, 4, '2020-10-19 15:48:23'),
(77, 4, 31, 1, 74, '2020-10-30', 2, 8, '2020-10-26 16:49:53'),
(78, 4, 34, 1, 74, '2020-10-30', 2, 8, '2020-10-26 16:49:53'),
(79, 4, 33, 1, 74, '2020-10-30', 2, 8, '2020-10-26 16:49:53'),
(80, 4, 32, 1, 74, '2020-10-30', 2, 8, '2020-10-26 16:49:53'),
(81, 4, 47, 13, 74, '2020-10-30', 2, 8, '2020-10-26 16:54:56'),
(82, 4, 49, 13, 74, '2020-10-30', 2, 8, '2020-10-26 16:54:57'),
(83, 4, 48, 13, 74, '2020-10-30', 2, 8, '2020-10-26 16:54:57'),
(84, 4, 46, 13, 74, '2020-10-30', 2, 8, '2020-10-26 16:54:57'),
(85, 4, 43, 7, 74, '2020-10-30', 2, 8, '2020-10-26 16:58:30'),
(86, 4, 42, 7, 74, '2020-10-30', 2, 8, '2020-10-26 16:58:30'),
(87, 4, 41, 7, 74, '2020-10-30', 2, 8, '2020-10-26 16:58:30'),
(88, 4, 40, 7, 74, '2020-10-30', 2, 8, '2020-10-26 16:58:30'),
(89, 5, 34, 1, 79, '2020-11-06', 2, 10, '2020-11-02 11:04:11'),
(90, 5, 33, 1, 79, '2020-11-06', 2, 10, '2020-11-02 11:04:12'),
(91, 5, 31, 1, 79, '2020-11-06', 2, 10, '2020-11-02 11:04:12'),
(92, 5, 32, 1, 79, '2020-11-06', 2, 10, '2020-11-02 11:04:12'),
(93, 5, 49, 13, 79, '2020-11-06', 2, 10, '2020-11-02 11:08:36'),
(94, 5, 48, 13, 79, '2020-11-06', 2, 10, '2020-11-02 11:08:36'),
(95, 5, 46, 13, 79, '2020-11-06', 2, 10, '2020-11-02 11:08:36'),
(96, 5, 47, 13, 79, '2020-11-06', 2, 10, '2020-11-02 11:08:37'),
(97, 5, 43, 7, 79, '2020-11-06', 2, 10, '2020-11-02 11:12:04'),
(98, 5, 42, 7, 79, '2020-11-06', 2, 10, '2020-11-02 11:12:04'),
(99, 5, 41, 7, 79, '2020-11-06', 2, 10, '2020-11-02 11:12:04'),
(100, 5, 40, 7, 79, '2020-11-06', 2, 10, '2020-11-02 11:12:04'),
(101, 6, 31, 1, 82, '2020-11-13', 2, 6, '2020-11-09 14:23:29'),
(102, 6, 34, 1, 82, '2020-11-13', 2, 6, '2020-11-09 14:23:30'),
(103, 6, 33, 1, 82, '2020-11-13', 2, 6, '2020-11-09 14:23:30'),
(104, 6, 32, 1, 82, '2020-11-13', 2, 6, '2020-11-09 14:23:30'),
(105, 6, 49, 13, 82, '2020-11-13', 2, 6, '2020-11-09 14:26:12'),
(106, 6, 48, 13, 82, '2020-11-13', 2, 6, '2020-11-09 14:26:12'),
(107, 6, 46, 13, 82, '2020-11-13', 2, 6, '2020-11-09 14:26:13'),
(108, 6, 47, 13, 82, '2020-11-13', 2, 6, '2020-11-09 14:26:13'),
(109, 6, 41, 7, 82, '2020-11-13', 2, 6, '2020-11-09 14:28:14'),
(110, 6, 43, 7, 82, '2020-11-13', 2, 6, '2020-11-09 14:28:14'),
(111, 6, 42, 7, 82, '2020-11-13', 2, 6, '2020-11-09 14:28:14'),
(112, 6, 40, 7, 82, '2020-11-13', 2, 6, '2020-11-09 14:28:14'),
(113, 7, 31, 1, 83, '2020-11-16', 2, 2, '2020-11-16 10:41:35'),
(114, 7, 34, 1, 83, '2020-11-16', 2, 2, '2020-11-16 10:41:35'),
(115, 7, 33, 1, 83, '2020-11-16', 2, 2, '2020-11-16 10:41:35'),
(116, 7, 32, 1, 83, '2020-11-16', 2, 2, '2020-11-16 10:41:35'),
(117, 7, 49, 13, 83, '2020-11-16', 2, 2, '2020-11-16 10:43:57'),
(118, 7, 48, 13, 83, '2020-11-16', 2, 2, '2020-11-16 10:43:57'),
(119, 7, 46, 13, 83, '2020-11-16', 2, 2, '2020-11-16 10:43:57'),
(120, 7, 47, 13, 83, '2020-11-16', 2, 2, '2020-11-16 10:43:57'),
(121, 7, 43, 7, 83, '2020-11-16', 2, 3, '2020-11-16 10:46:56'),
(122, 7, 42, 7, 83, '2020-11-16', 2, 3, '2020-11-16 10:46:56'),
(123, 7, 41, 7, 83, '2020-11-16', 2, 3, '2020-11-16 10:46:56'),
(124, 7, 40, 7, 83, '2020-11-16', 2, 3, '2020-11-16 10:46:56'),
(125, 8, 41, 7, 86, '2020-11-26', 2, 6, '2020-11-23 02:25:38'),
(126, 8, 43, 7, 86, '2020-11-26', 2, 6, '2020-11-23 02:25:39'),
(127, 8, 42, 7, 86, '2020-11-26', 2, 6, '2020-11-23 02:25:39'),
(128, 8, 40, 7, 86, '2020-11-26', 2, 6, '2020-11-23 02:25:39'),
(129, 8, 31, 1, 86, '2020-11-26', 2, 6, '2020-11-23 02:30:56'),
(130, 8, 34, 1, 86, '2020-11-26', 2, 6, '2020-11-23 02:30:56'),
(131, 8, 33, 1, 86, '2020-11-26', 2, 6, '2020-11-23 02:30:56'),
(132, 8, 32, 1, 86, '2020-11-26', 2, 6, '2020-11-23 02:30:56'),
(133, 8, 48, 13, 86, '2020-11-26', 2, 7, '2020-11-23 03:40:42'),
(134, 8, 46, 13, 86, '2020-11-26', 2, 7, '2020-11-23 03:40:42'),
(135, 8, 47, 13, 86, '2020-11-26', 2, 7, '2020-11-23 03:40:42'),
(136, 8, 49, 13, 86, '2020-11-26', 2, 7, '2020-11-23 03:40:42'),
(137, 9, 46, 13, 90, '2020-12-04', 2, 6, '2020-12-02 01:29:19'),
(138, 9, 47, 13, 90, '2020-12-04', 2, 6, '2020-12-02 01:29:19'),
(139, 9, 49, 13, 90, '2020-12-04', 2, 6, '2020-12-02 01:29:19'),
(140, 9, 48, 13, 90, '2020-12-04', 2, 6, '2020-12-02 01:29:19'),
(141, 9, 54, 13, 90, '2020-12-04', 2, 6, '2020-12-02 01:29:19'),
(142, 10, 56, 21, 92, '2020-12-08', 2, 4, '2020-12-07 22:01:11'),
(143, 10, 58, 21, 92, '2020-12-08', 2, 4, '2020-12-07 22:01:11'),
(144, 10, 61, 21, 92, '2020-12-08', 2, 4, '2020-12-07 22:01:12'),
(145, 10, 57, 21, 92, '2020-12-08', 2, 4, '2020-12-07 22:01:12'),
(146, 10, 59, 21, 92, '2020-12-08', 2, 4, '2020-12-07 22:01:12'),
(147, 10, 60, 21, 92, '2020-12-08', 2, 4, '2020-12-07 22:01:12'),
(148, 10, 63, 22, 94, '2020-12-10', 2, 4, '2020-12-07 22:02:48'),
(149, 10, 62, 22, 94, '2020-12-10', 2, 4, '2020-12-07 22:02:48'),
(150, 10, 64, 22, 94, '2020-12-10', 2, 4, '2020-12-07 22:02:49'),
(151, 10, 68, 22, 94, '2020-12-10', 2, 4, '2020-12-07 22:02:49'),
(152, 10, 67, 22, 94, '2020-12-10', 2, 4, '2020-12-07 22:02:49'),
(153, 10, 66, 22, 94, '2020-12-10', 2, 4, '2020-12-07 22:02:49'),
(154, 10, 70, 22, 94, '2020-12-10', 2, 4, '2020-12-07 22:02:49'),
(155, 10, 65, 22, 94, '2020-12-10', 2, 4, '2020-12-07 22:02:49'),
(156, 10, 69, 22, 94, '2020-12-10', 2, 4, '2020-12-07 22:02:49'),
(157, 10, 46, 13, 92, '2020-12-08', 2, 4, '2020-12-07 22:05:37'),
(158, 10, 47, 13, 92, '2020-12-08', 2, 4, '2020-12-07 22:05:37'),
(159, 10, 49, 13, 92, '2020-12-08', 2, 4, '2020-12-07 22:05:37'),
(160, 10, 48, 13, 92, '2020-12-08', 2, 4, '2020-12-07 22:05:37'),
(161, 10, 54, 13, 92, '2020-12-08', 2, 4, '2020-12-07 22:05:37'),
(162, 10, 41, 7, 92, '2020-12-08', 2, 4, '2020-12-07 22:07:24'),
(163, 10, 43, 7, 92, '2020-12-08', 2, 4, '2020-12-07 22:07:24'),
(164, 10, 42, 7, 92, '2020-12-08', 2, 4, '2020-12-07 22:07:24'),
(165, 10, 40, 7, 92, '2020-12-08', 2, 4, '2020-12-07 22:07:24'),
(166, 10, 31, 1, 92, '2020-12-08', 2, 4, '2020-12-07 22:09:07'),
(167, 10, 34, 1, 92, '2020-12-08', 2, 4, '2020-12-07 22:09:07'),
(168, 10, 33, 1, 92, '2020-12-08', 2, 4, '2020-12-07 22:09:07'),
(169, 10, 32, 1, 92, '2020-12-08', 2, 4, '2020-12-07 22:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `weeks_and_dates`
--

CREATE TABLE `weeks_and_dates` (
  `weeks_and_dates_id` int(11) NOT NULL,
  `week_start` date DEFAULT NULL,
  `week_stop` date DEFAULT NULL,
  `week_what` varchar(100) NOT NULL,
  `week_start_g` date DEFAULT NULL,
  `week_stop_g` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weeks_and_dates`
--

INSERT INTO `weeks_and_dates` (`weeks_and_dates_id`, `week_start`, `week_stop`, `week_what`, `week_start_g`, `week_stop_g`) VALUES
(1, '2020-10-05', '2020-10-09', 'Week One', '2020-10-04', '2020-10-10'),
(2, '2020-10-12', '2020-10-16', 'Week Two', '2020-10-11', '2020-10-17'),
(3, '2020-10-19', '2020-10-23', 'Week Three', '2020-10-18', '2020-10-24'),
(4, '2020-10-26', '2020-10-30', 'Week Four', '2020-10-25', '2020-10-31'),
(5, '2020-11-02', '2020-11-06', 'Week Five', '2020-11-01', '2020-11-07'),
(6, '2020-11-09', '2020-11-13', 'Week Six', '2020-11-08', '2020-11-14'),
(7, '2020-11-16', '2020-11-20', 'Week Seven', '2020-11-15', '2020-11-21'),
(8, '2020-11-23', '2020-11-27', 'Week Eight', '2020-11-22', '2020-11-28'),
(9, '2020-11-30', '2020-12-04', 'Week Nine', '2020-11-29', '2020-12-05'),
(10, '2020-12-07', '2020-12-11', 'Week Ten', '2020-12-06', '2020-12-12'),
(11, '2020-12-14', '2020-12-18', 'Week Eleven', '2020-12-13', '2020-12-19'),
(12, '2020-12-21', '2020-12-25', 'Week Twelve', '2020-12-20', '2020-12-26'),
(13, '2020-12-28', '2021-01-01', 'Week Thirteen', '2020-12-27', '2021-01-02'),
(14, '2021-01-04', '2021-01-08', 'Week Fourteen', '2021-01-03', '2021-01-09'),
(15, '2021-01-11', '2021-01-15', 'Week Fifteen', '2021-01-10', '2021-01-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_class`
--
ALTER TABLE `active_class`
  ADD PRIMARY KEY (`active_class_id`);

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
  ADD PRIMARY KEY (`admin_settings_id`);

--
-- Indexes for table `admissionpin`
--
ALTER TABLE `admissionpin`
  ADD PRIMARY KEY (`pin_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`applicants_id`),
  ADD KEY `idx_applicant_applied_on` (`applied_on`),
  ADD KEY `idx_applicant_section` (`section`),
  ADD KEY `idx_applicant_class_assigned` (`class_assigned`),
  ADD KEY `idx_applicant_status` (`status`);

--
-- Indexes for table `attendance_status`
--
ALTER TABLE `attendance_status`
  ADD PRIMARY KEY (`attendance_status_id`),
  ADD KEY `idx_attendance_class_id` (`class_id`),
  ADD KEY `idx_attendance_today_date` (`today_date`),
  ADD KEY `idx_attendance_term_id` (`term_id`),
  ADD KEY `idx_attendance_todaysDate_id` (`today_date_id`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`attribute_value_id`),
  ADD KEY `idx_attribute_value_attribute_id` (`attribute_id`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`audit_id`),
  ADD KEY `idx_audit_order_id` (`order_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `idx_category_department_id` (`department_id`);

--
-- Indexes for table `class_source`
--
ALTER TABLE `class_source`
  ADD PRIMARY KEY (`class_source_id`);

--
-- Indexes for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD PRIMARY KEY (`class_id`,`subject_id`);

--
-- Indexes for table `club_society`
--
ALTER TABLE `club_society`
  ADD PRIMARY KEY (`club_society_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `idx_customer_email` (`email`),
  ADD KEY `idx_customer_shipping_region_id` (`shipping_region_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `fn_attendance`
--
ALTER TABLE `fn_attendance`
  ADD PRIMARY KEY (`fn_attendance_id`),
  ADD KEY `idx_school_weekValue_id` (`weekValue_id`),
  ADD KEY `idx_school_student_id` (`student_id`),
  ADD KEY `idx_school_class_id` (`class_id`),
  ADD KEY `idx_school_todaysDate_id` (`todaysDate_id`),
  ADD KEY `idx_school_term_id` (`term_id`),
  ADD KEY `idx_fn_attendance_todaysDate` (`todaysDate`);

--
-- Indexes for table `fn_ca_record`
--
ALTER TABLE `fn_ca_record`
  ADD PRIMARY KEY (`fn_ca_record_id`),
  ADD KEY `idx_fn_ca_record_firstca` (`firstca`),
  ADD KEY `idx_fn_ca_records_secondca` (`secondca`),
  ADD KEY `idx_fn_ca_records_thirdca` (`thirdca`),
  ADD KEY `idx_fn_ca_records_exams` (`exams`),
  ADD KEY `idx_fn_ca_records_studentId` (`student_id`),
  ADD KEY `idx_fn_ca_records_subjectId` (`subject_id`),
  ADD KEY `idx_fn_ca_records_classId` (`class_id`),
  ADD KEY `idx_fn_ca_records_termId` (`term_id`),
  ADD KEY `idx_fn_ca_records_supDate` (`supDate`);

--
-- Indexes for table `fp_attendance`
--
ALTER TABLE `fp_attendance`
  ADD PRIMARY KEY (`fp_attendance_id`),
  ADD KEY `idx_school_weekValue_id` (`weekValue_id`),
  ADD KEY `idx_school_student_id` (`student_id`),
  ADD KEY `idx_school_class_id` (`class_id`),
  ADD KEY `idx_school_todaysDate_id` (`todaysDate_id`),
  ADD KEY `idx_school_term_id` (`term_id`),
  ADD KEY `idx_fp_attendance_todaysDate` (`todaysDate`);

--
-- Indexes for table `fp_ca_record`
--
ALTER TABLE `fp_ca_record`
  ADD PRIMARY KEY (`fp_ca_record_id`),
  ADD KEY `idx_fp_ca_record_firstca` (`firstca`),
  ADD KEY `idx_fp_ca_records_secondca` (`secondca`),
  ADD KEY `idx_fp_ca_records_thirdca` (`thirdca`),
  ADD KEY `idx_fp_ca_records_exams` (`exams`),
  ADD KEY `idx_fp_ca_records_studentId` (`student_id`),
  ADD KEY `idx_fp_ca_records_subjectId` (`subject_id`),
  ADD KEY `idx_fp_ca_records_classId` (`class_id`),
  ADD KEY `idx_fp_ca_records_termId` (`term_id`),
  ADD KEY `idx_fp_ca_records_supDate` (`supDate`);

--
-- Indexes for table `fs_attendance`
--
ALTER TABLE `fs_attendance`
  ADD PRIMARY KEY (`fs_attendance_id`),
  ADD KEY `idx_school_weekValue_id` (`weekValue_id`),
  ADD KEY `idx_school_student_id` (`student_id`),
  ADD KEY `idx_school_class_id` (`class_id`),
  ADD KEY `idx_school_todaysDate_id` (`todaysDate_id`),
  ADD KEY `idx_school_term_id` (`term_id`),
  ADD KEY `idx_fs_attendance_todaysDate` (`todaysDate`);

--
-- Indexes for table `fs_ca_record`
--
ALTER TABLE `fs_ca_record`
  ADD PRIMARY KEY (`fs_ca_record_id`),
  ADD KEY `idx_fs_ca_record_firstca` (`firstca`),
  ADD KEY `idx_fs_ca_records_secondca` (`secondca`),
  ADD KEY `idx_fs_ca_records_thirdca` (`thirdca`),
  ADD KEY `idx_fs_ca_records_exams` (`exams`),
  ADD KEY `idx_fs_ca_records_studentId` (`student_id`),
  ADD KEY `idx_fs_ca_records_subjectId` (`subject_id`),
  ADD KEY `idx_fs_ca_records_classId` (`class_id`),
  ADD KEY `idx_fs_ca_records_termId` (`term_id`),
  ADD KEY `idx_fs_ca_records_supDate` (`supDate`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`house_id`);

--
-- Indexes for table `lesson_plan`
--
ALTER TABLE `lesson_plan`
  ADD PRIMARY KEY (`lesson_plan_id`),
  ADD UNIQUE KEY `idx_lesson_plan_topic` (`topic`),
  ADD KEY `idx_lesson_plan_subject_id` (`subject_id`),
  ADD KEY `idx_lesson_plan_term_id` (`term_id`),
  ADD KEY `idx_lesson_plan_class_id` (`class_id`),
  ADD KEY `sys_date` (`sys_date`),
  ADD KEY `date_added` (`date_added`),
  ADD KEY `idx_lesson_plan_gender` (`gender`),
  ADD KEY `week_id` (`week_id`),
  ADD KEY `idx_lesson_plan_publish` (`publish`);

--
-- Indexes for table `maintain`
--
ALTER TABLE `maintain`
  ADD PRIMARY KEY (`maintain_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `massage_board`
--
ALTER TABLE `massage_board`
  ADD PRIMARY KEY (`massage_board_id`),
  ADD UNIQUE KEY `idx_department_id` (`department_id`);

--
-- Indexes for table `myclasses_archive`
--
ALTER TABLE `myclasses_archive`
  ADD PRIMARY KEY (`myclasses_archive_id`),
  ADD KEY `idx_active_class_id` (`active_class_id`),
  ADD KEY `idx_class_id` (`class_id`),
  ADD KEY `idx_student_id` (`student_id`);

--
-- Indexes for table `ndioga`
--
ALTER TABLE `ndioga`
  ADD PRIMARY KEY (`ndioga_id`);

--
-- Indexes for table `nry_recordsforaverageandgtotal`
--
ALTER TABLE `nry_recordsforaverageandgtotal`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `idx_nry_recordsForAverageAndGtotal_classId` (`class_id`),
  ADD KEY `idx_nry_recordsForAverageAndGtotal_termId` (`term_id`),
  ADD KEY `idx_nry_recordsForAverageAndGtotal_recordDate` (`record_date`),
  ADD KEY `idx_nry_recordsForAverageAndGtotal_studentId` (`student_id`),
  ADD KEY `idx_nry_recordsForAverageAndGtotal_gtotal` (`gtotal`),
  ADD KEY `idx_nry_recordsForAverageAndGtotal_avarage` (`average`),
  ADD KEY `idx_recordsForAverageAndGtotal_position` (`position`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `idx_orders_customer_id` (`customer_id`),
  ADD KEY `idx_orders_shipping_id` (`shipping_id`),
  ADD KEY `idx_orders_tax_id` (`tax_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `idx_order_detail_order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);
ALTER TABLE `product` ADD FULLTEXT KEY `idx_ft_product_name_description` (`name`,`description`);

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`product_id`,`attribute_value_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_id`,`category_id`);

--
-- Indexes for table `progress_matix`
--
ALTER TABLE `progress_matix`
  ADD PRIMARY KEY (`progress_matix_id`),
  ADD KEY `idx_progress_matrix_classid` (`class_id`),
  ADD KEY `idx_progress_matrix_studentid` (`student_id`),
  ADD KEY `idx_progress_matrix_termid` (`term_id`);

--
-- Indexes for table `pry_recordsforaverageandgtotal`
--
ALTER TABLE `pry_recordsforaverageandgtotal`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `idx_pry_recordsForAverageAndGtotal_classId` (`class_id`),
  ADD KEY `idx_pry_recordsForAverageAndGtotal_termId` (`term_id`),
  ADD KEY `idx_pry_recordsForAverageAndGtotal_recordDate` (`record_date`),
  ADD KEY `idx_pry_recordsForAverageAndGtotal_studentId` (`student_id`),
  ADD KEY `idx_pry_recordsForAverageAndGtotal_gtotal` (`gtotal`),
  ADD KEY `idx_pry_recordsForAverageAndGtotal_avarage` (`average`),
  ADD KEY `position` (`position`);

--
-- Indexes for table `requested`
--
ALTER TABLE `requested`
  ADD PRIMARY KEY (`requested_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `id_review_customer_id` (`customer_id`),
  ADD KEY `id_review_product_id` (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_employee`,`fiscal_year`);

--
-- Indexes for table `school_classes`
--
ALTER TABLE `school_classes`
  ADD PRIMARY KEY (`school_classes_id`);

--
-- Indexes for table `school_session`
--
ALTER TABLE `school_session`
  ADD PRIMARY KEY (`school_session_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `idx_shipping_shipping_region_id` (`shipping_region_id`);

--
-- Indexes for table `shipping_region`
--
ALTER TABLE `shipping_region`
  ADD PRIMARY KEY (`shipping_region_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `idx_shopping_cart_cart_id` (`cart_id`);

--
-- Indexes for table `sn_attendance`
--
ALTER TABLE `sn_attendance`
  ADD PRIMARY KEY (`sn_attendance_id`),
  ADD KEY `idx_school_weekValue_id` (`weekValue_id`),
  ADD KEY `idx_school_student_id` (`student_id`),
  ADD KEY `idx_school_class_id` (`class_id`),
  ADD KEY `idx_school_todaysDate_id` (`todaysDate_id`),
  ADD KEY `idx_school_term_id` (`term_id`),
  ADD KEY `idx_sn_attendance_todaysDate` (`todaysDate`);

--
-- Indexes for table `sn_ca_record`
--
ALTER TABLE `sn_ca_record`
  ADD PRIMARY KEY (`sn_ca_record_id`),
  ADD KEY `idx_sn_ca_record_firstca` (`firstca`),
  ADD KEY `idx_sn_ca_records_secondca` (`secondca`),
  ADD KEY `idx_sn_ca_records_thirdca` (`thirdca`),
  ADD KEY `idx_sn_ca_records_exams` (`exams`),
  ADD KEY `idx_sn_ca_records_studentId` (`student_id`),
  ADD KEY `idx_sn_ca_records_subjectId` (`subject_id`),
  ADD KEY `idx_sn_ca_records_classId` (`class_id`),
  ADD KEY `idx_sn_ca_records_termId` (`term_id`),
  ADD KEY `idx_sn_ca_records_supDate` (`supDate`);

--
-- Indexes for table `sp_attendance`
--
ALTER TABLE `sp_attendance`
  ADD PRIMARY KEY (`sp_attendance_id`),
  ADD KEY `idx_school_weekValue_id` (`weekValue_id`),
  ADD KEY `idx_school_student_id` (`student_id`),
  ADD KEY `idx_school_class_id` (`class_id`),
  ADD KEY `idx_school_todaysDate_id` (`todaysDate_id`),
  ADD KEY `idx_school_term_id` (`term_id`),
  ADD KEY `idx_sp_attendance_todaysDate` (`todaysDate`);

--
-- Indexes for table `sp_ca_record`
--
ALTER TABLE `sp_ca_record`
  ADD PRIMARY KEY (`sp_ca_record_id`),
  ADD KEY `idx_sp_ca_record_firstca` (`firstca`),
  ADD KEY `idx_sp_ca_records_secondca` (`secondca`),
  ADD KEY `idx_sp_ca_records_thirdca` (`thirdca`),
  ADD KEY `idx_sp_ca_records_exams` (`exams`),
  ADD KEY `idx_sp_ca_records_studentId` (`student_id`),
  ADD KEY `idx_sp_ca_records_subjectId` (`subject_id`),
  ADD KEY `idx_sp_ca_records_classId` (`class_id`),
  ADD KEY `idx_sp_ca_records_termId` (`term_id`),
  ADD KEY `idx_sp_ca_records_supDate` (`supDate`);

--
-- Indexes for table `sry_recordsforaverageandgtotal`
--
ALTER TABLE `sry_recordsforaverageandgtotal`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `idx_sry_recordsForAverageAndGtotal_classId` (`class_id`),
  ADD KEY `idx_sry_recordsForAverageAndGtotal_termId` (`term_id`),
  ADD KEY `idx_sry_recordsForAverageAndGtotal_recordDate` (`record_date`),
  ADD KEY `idx_sry_recordsForAverageAndGtotal_studentId` (`student_id`),
  ADD KEY `idx_sry_recordsForAverageAndGtotal_gtotal` (`gtotal`),
  ADD KEY `idx_sry_recordsForAverageAndGtotal_avarage` (`average`);

--
-- Indexes for table `ss_attendance`
--
ALTER TABLE `ss_attendance`
  ADD PRIMARY KEY (`ss_attendance_id`),
  ADD KEY `idx_school_weekValue_id` (`weekValue_id`),
  ADD KEY `idx_school_student_id` (`student_id`),
  ADD KEY `idx_school_class_id` (`class_id`),
  ADD KEY `idx_school_todaysDate_id` (`todaysDate_id`),
  ADD KEY `idx_school_term_id` (`term_id`),
  ADD KEY `idx_ss_attendance_todaysDate` (`todaysDate`);

--
-- Indexes for table `ss_ca_record`
--
ALTER TABLE `ss_ca_record`
  ADD PRIMARY KEY (`ss_ca_record_id`),
  ADD KEY `idx_ss_ca_record_firstca` (`firstca`),
  ADD KEY `idx_ss_ca_records_secondca` (`secondca`),
  ADD KEY `idx_ss_ca_records_thirdca` (`thirdca`),
  ADD KEY `idx_ss_ca_records_exams` (`exams`),
  ADD KEY `idx_ss_ca_records_studentId` (`student_id`),
  ADD KEY `idx_ss_ca_records_subjectId` (`subject_id`),
  ADD KEY `idx_ss_ca_records_classId` (`class_id`),
  ADD KEY `idx_ss_ca_records_termId` (`term_id`),
  ADD KEY `idx_ss_ca_records_supDate` (`supDate`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`states_id`);

--
-- Indexes for table `student_post`
--
ALTER TABLE `student_post`
  ADD PRIMARY KEY (`student_post_id`);

--
-- Indexes for table `student_profile_content`
--
ALTER TABLE `student_profile_content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjects_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teachers_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_teacher_created_on` (`created_on`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`teacher_class_id`),
  ADD KEY `idx_school_class_id` (`class_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `tn_attendance`
--
ALTER TABLE `tn_attendance`
  ADD PRIMARY KEY (`tn_attendance_id`),
  ADD KEY `idx_school_weekValue_id` (`weekValue_id`),
  ADD KEY `idx_school_student_id` (`student_id`),
  ADD KEY `idx_school_class_id` (`class_id`),
  ADD KEY `idx_school_todaysDate_id` (`todaysDate_id`),
  ADD KEY `idx_school_term_id` (`term_id`),
  ADD KEY `idx_tn_attendance_todaysDate` (`todaysDate`);

--
-- Indexes for table `tn_ca_record`
--
ALTER TABLE `tn_ca_record`
  ADD PRIMARY KEY (`tn_ca_record_id`),
  ADD KEY `idx_tn_ca_record_firstca` (`firstca`),
  ADD KEY `idx_tn_ca_records_secondca` (`secondca`),
  ADD KEY `idx_tn_ca_records_thirdca` (`thirdca`),
  ADD KEY `idx_tn_ca_records_exams` (`exams`),
  ADD KEY `idx_tn_ca_records_studentId` (`student_id`),
  ADD KEY `idx_tn_ca_records_subjectId` (`subject_id`),
  ADD KEY `idx_tn_ca_records_classId` (`class_id`),
  ADD KEY `idx_tn_ca_records_termId` (`term_id`),
  ADD KEY `idx_tn_ca_records_supDate` (`supDate`);

--
-- Indexes for table `todays_date`
--
ALTER TABLE `todays_date`
  ADD PRIMARY KEY (`todays_date_id`),
  ADD KEY `idx_school_todays_date` (`date_value`);

--
-- Indexes for table `tp_attendance`
--
ALTER TABLE `tp_attendance`
  ADD PRIMARY KEY (`tp_attendance_id`),
  ADD KEY `idx_school_weekValue_id` (`weekValue_id`),
  ADD KEY `idx_school_student_id` (`student_id`),
  ADD KEY `idx_school_class_id` (`class_id`),
  ADD KEY `idx_school_todaysDate_id` (`todaysDate_id`),
  ADD KEY `idx_school_term_id` (`term_id`),
  ADD KEY `idx_tp_attendance_todaysDate` (`todaysDate`);

--
-- Indexes for table `tp_ca_record`
--
ALTER TABLE `tp_ca_record`
  ADD PRIMARY KEY (`tp_ca_record_id`),
  ADD KEY `idx_tp_ca_record_firstca` (`firstca`),
  ADD KEY `idx_tp_ca_records_secondca` (`secondca`),
  ADD KEY `idx_tp_ca_records_thirdca` (`thirdca`),
  ADD KEY `idx_tp_ca_records_exams` (`exams`),
  ADD KEY `idx_tp_ca_records_studentId` (`student_id`),
  ADD KEY `idx_tp_ca_records_subjectId` (`subject_id`),
  ADD KEY `idx_tp_ca_records_classId` (`class_id`),
  ADD KEY `idx_tp_ca_records_termId` (`term_id`),
  ADD KEY `idx_tp_ca_records_supDate` (`supDate`);

--
-- Indexes for table `ts_attendance`
--
ALTER TABLE `ts_attendance`
  ADD PRIMARY KEY (`ts_attendance_id`),
  ADD KEY `idx_school_weekValue_id` (`weekValue_id`),
  ADD KEY `idx_school_student_id` (`student_id`),
  ADD KEY `idx_school_class_id` (`class_id`),
  ADD KEY `idx_school_todaysDate_id` (`todaysDate_id`),
  ADD KEY `idx_school_term_id` (`term_id`),
  ADD KEY `idx_ts_attendance_todaysDate` (`todaysDate`);

--
-- Indexes for table `ts_ca_record`
--
ALTER TABLE `ts_ca_record`
  ADD PRIMARY KEY (`ts_ca_record_id`),
  ADD KEY `idx_ts_ca_record_firstca` (`firstca`),
  ADD KEY `idx_ts_ca_records_secondca` (`secondca`),
  ADD KEY `idx_ts_ca_records_thirdca` (`thirdca`),
  ADD KEY `idx_ts_ca_records_exams` (`exams`),
  ADD KEY `idx_ts_ca_records_studentId` (`student_id`),
  ADD KEY `idx_ts_ca_records_subjectId` (`subject_id`),
  ADD KEY `idx_ts_ca_records_classId` (`class_id`),
  ADD KEY `idx_ts_ca_records_termId` (`term_id`),
  ADD KEY `idx_ts_ca_records_supDate` (`supDate`);

--
-- Indexes for table `weekly_percentage`
--
ALTER TABLE `weekly_percentage`
  ADD PRIMARY KEY (`weekly_percentage_id`),
  ADD KEY `idx_percentage_weekvalue_id` (`weekvalue_id`),
  ADD KEY `idx_percentage_class_id` (`class_id`),
  ADD KEY `idx_percentage_term_id` (`term_id`),
  ADD KEY `idx_percentage_todaysDate` (`todaysDate`);

--
-- Indexes for table `weekly_total`
--
ALTER TABLE `weekly_total`
  ADD PRIMARY KEY (`weekly_total_id`),
  ADD KEY `idx_wklytotal_weekvalue_id` (`weekvalue_id`),
  ADD KEY `idx_wklytotal_student_id` (`student_id`),
  ADD KEY `idx_wklytotal_class_id` (`class_id`),
  ADD KEY `idx_wklytotal_todaydate_id` (`todaydate_id`),
  ADD KEY `idx_wklytotal_todaydate` (`todaydate`),
  ADD KEY `idx_wklytotal_term_id` (`term_id`);

--
-- Indexes for table `weeks_and_dates`
--
ALTER TABLE `weeks_and_dates`
  ADD PRIMARY KEY (`weeks_and_dates_id`),
  ADD KEY `idx_school_week_what` (`week_what`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_class`
--
ALTER TABLE `active_class`
  MODIFY `active_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
  MODIFY `admin_settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admissionpin`
--
ALTER TABLE `admissionpin`
  MODIFY `pin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `applicants_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `attendance_status`
--
ALTER TABLE `attendance_status`
  MODIFY `attendance_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `attribute_value_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `class_source`
--
ALTER TABLE `class_source`
  MODIFY `class_source_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `club_society`
--
ALTER TABLE `club_society`
  MODIFY `club_society_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fn_attendance`
--
ALTER TABLE `fn_attendance`
  MODIFY `fn_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `fn_ca_record`
--
ALTER TABLE `fn_ca_record`
  MODIFY `fn_ca_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `fp_attendance`
--
ALTER TABLE `fp_attendance`
  MODIFY `fp_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fp_ca_record`
--
ALTER TABLE `fp_ca_record`
  MODIFY `fp_ca_record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fs_attendance`
--
ALTER TABLE `fs_attendance`
  MODIFY `fs_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fs_ca_record`
--
ALTER TABLE `fs_ca_record`
  MODIFY `fs_ca_record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lesson_plan`
--
ALTER TABLE `lesson_plan`
  MODIFY `lesson_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maintain`
--
ALTER TABLE `maintain`
  MODIFY `maintain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `massage_board`
--
ALTER TABLE `massage_board`
  MODIFY `massage_board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `myclasses_archive`
--
ALTER TABLE `myclasses_archive`
  MODIFY `myclasses_archive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ndioga`
--
ALTER TABLE `ndioga`
  MODIFY `ndioga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nry_recordsforaverageandgtotal`
--
ALTER TABLE `nry_recordsforaverageandgtotal`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `progress_matix`
--
ALTER TABLE `progress_matix`
  MODIFY `progress_matix_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pry_recordsforaverageandgtotal`
--
ALTER TABLE `pry_recordsforaverageandgtotal`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `requested`
--
ALTER TABLE `requested`
  MODIFY `requested_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_classes`
--
ALTER TABLE `school_classes`
  MODIFY `school_classes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `school_session`
--
ALTER TABLE `school_session`
  MODIFY `school_session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shipping_region`
--
ALTER TABLE `shipping_region`
  MODIFY `shipping_region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sn_attendance`
--
ALTER TABLE `sn_attendance`
  MODIFY `sn_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `sn_ca_record`
--
ALTER TABLE `sn_ca_record`
  MODIFY `sn_ca_record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_attendance`
--
ALTER TABLE `sp_attendance`
  MODIFY `sp_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `sp_ca_record`
--
ALTER TABLE `sp_ca_record`
  MODIFY `sp_ca_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `sry_recordsforaverageandgtotal`
--
ALTER TABLE `sry_recordsforaverageandgtotal`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ss_attendance`
--
ALTER TABLE `ss_attendance`
  MODIFY `ss_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `ss_ca_record`
--
ALTER TABLE `ss_ca_record`
  MODIFY `ss_ca_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `states_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `student_post`
--
ALTER TABLE `student_post`
  MODIFY `student_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_profile_content`
--
ALTER TABLE `student_profile_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjects_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teachers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tn_attendance`
--
ALTER TABLE `tn_attendance`
  MODIFY `tn_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tn_ca_record`
--
ALTER TABLE `tn_ca_record`
  MODIFY `tn_ca_record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `todays_date`
--
ALTER TABLE `todays_date`
  MODIFY `todays_date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tp_attendance`
--
ALTER TABLE `tp_attendance`
  MODIFY `tp_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tp_ca_record`
--
ALTER TABLE `tp_ca_record`
  MODIFY `tp_ca_record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ts_attendance`
--
ALTER TABLE `ts_attendance`
  MODIFY `ts_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ts_ca_record`
--
ALTER TABLE `ts_ca_record`
  MODIFY `ts_ca_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `weekly_percentage`
--
ALTER TABLE `weekly_percentage`
  MODIFY `weekly_percentage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `weekly_total`
--
ALTER TABLE `weekly_total`
  MODIFY `weekly_total_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `weeks_and_dates`
--
ALTER TABLE `weeks_and_dates`
  MODIFY `weeks_and_dates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
