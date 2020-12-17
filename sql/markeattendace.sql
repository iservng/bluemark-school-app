DELIMITER $$ 
CREATE PROCEDURE attendance_get_weekly_percentagez(IN inWeekValuesid INT, IN inClassId INT, IN inCurrentTermId INT, IN inWeekStart DATE, IN inWeekStop DATE)
BEGIN 
    SELECT week_what, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'dailypercent' 
    FROM fn_attendance 
        INNER JOIN weeks_and_dates 
            ON fn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE weekValue_id = inWeekValuesid AND 
        class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inWeekStart AND inWeekStop;
END $$ 
DELIMITER ;




--attendance_get_privious_wklytotal
--add_this_weeks_attendance_percentage
--add_this_weeks_attendance_percentage


DELIMITER $$
CREATE PROCEDURE attendance_each_student_weekly_total(IN inWeekValuesid INT, IN inStudentId INT, IN inClassId INT, IN inTodaydateId INT, IN inToday DATE, IN inCurrentTermId INT)
BEGIN 

    DECLARE inCurrentStatus INT; 

    SELECT afternoon 
    FROM attendance_status
    WHERE class_id = inClassId AND 	today_date = inToday AND term_id = inCurrentTermId AND today_date_id = inTodaydateId INTO inCurrentStatus; 
    
    IF inCurrentStatus = 1 THEN

        SELECT (mark_a) AS 'week_total' FROM fn_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    ELSE 

        SELECT (mark_m+mark_a) AS 'week_total' FROM fn_attendance WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;
    
    END IF;

END $$
DELIMITER ;




















DELIMITER $$
CREATE PROCEDURE attendance_get_all_weeks_percentage(IN inClassId INT, IN inCurrentTermId INT, IN inThisTermStarted DATE, IN inThisTermEnds DATE)
BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM fn_attendance
        INNER JOIN weeks_and_dates 
            ON fn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END $$
DELIMITER ;












--attendance_get_all_weeks_percentage



DELIMITER $$
CREATE PROCEDURE add_this_weeks_attendance_percentage(IN inWeekValuesid INT, IN inClassId INT, IN inCurrentTermId INT, IN inDateFriday DATE, IN inWeekWhat CHAR(32), IN inDailypercent INT)
BEGIN 
    INSERT INTO weekly_percentage (weekvalue_id, class_id, term_id, todaysDate, weekwhat, weeklypercentage) VALUES (inWeekValuesid, inClassId, inCurrentTermId, inDateFriday, inWeekWhat, inDailypercent);
END $$ 
DELIMITER ;

















DELIMITER $$
CREATE PROCEDURE school_update_morning_attendance_for_class(IN inClassId INT, IN inTodaysDate DATE, IN inAttendanceMark CHAR(32), IN inTermId INT, IN inTodaydateId INT)
BEGIN
        DECLARE inStatusNow INT;

            SELECT attendance_status_id FROM attendance_status WHERE class_id = inClassId AND today_date = inTodaysDate AND morning = 1 AND term_id = inTermId AND today_date_id = inTodaydateId INTO inStatusNow;

        IF inAttendanceMark = 'Morning' AND inStatusNow > 0 THEN 
            SELECT inStatusNow;
        ELSE
            INSERT INTO attendance_status (class_id, today_date, morning, term_id, today_date_id) VALUES (inClassId, inTodaysDate, 1, inTermId, inTodaydateId);
            SELECT LAST_INSERT_ID() INTO inStatusNow;
            SELECT inStatusNow;
        END IF;

END $$
DELIMITER ;













DELIMITER $$
CREATE PROCEDURE school_update_morning_attendance_for_class(IN inClassId INT, IN inTodaysDate DATE, IN inAttendanceMark CHAR(32), IN inTermId INT, IN inTodaydateId INT)
BEGIN
        DECLARE inStatusNow INT;

            SELECT attendance_status_id FROM attendance_status WHERE class_id = inClassId AND today_date = inTodaysDate AND morning = 1 AND term_id = inTermId AND today_date_id = inTodaydateId INTO inStatusNow;

        IF inAttendanceMark = 'Morning' AND inStatusNow > 0 THEN 
            SELECT inStatusNow;
        ELSE
            INSERT INTO attendance_status (class_id, today_date, morning, term_id, today_date_id) VALUES (inClassId, inTodaysDate, 1, inTermId, inTodaydateId);
            SELECT LAST_INSERT_ID() INTO inStatusNow;
            SELECT inStatusNow;
        END IF;

END $$
DELIMITER ;
















DELIMITER $$
CREATE PROCEDURE school_update_afternoon_attendance_for_class(IN inClassId INT, IN inTodaysDate DATE, IN inTermId INT, IN inTodaydateId INT)
BEGIN 
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
END $$
DELIMITER ;























DELIMITER $$ 
CREATE PROCEDURE school_register_attendace(IN inWeekValuesid INT, IN inStudentId INT, IN inClassId INT, IN inTodaydateId INT, IN inTodaysDate DATE, IN inTermId INT, IN inAttendanceValue INT, IN inAttendanceMark CHAR(32))
BEGIN 
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

END $$hhhhh
DELIMITER ;




DELIMITER $$ 
CREATE PROCEDURE attendance_each_student_weekly_total(IN inWeekValuesid INT, IN inStudentId INT, IN inClassId INT, IN inTodaydateId INT, IN inToday DATE, IN inCurrentTermId INT)
BEGIN 
    SELECT (mark_m+mark_a) AS 'week_total'
    FROM fn_attendance
    WHERE weekValue_id = inWeekValuesid	AND student_id = inStudentId AND class_id = inClassId AND todaysDate_id = inTodaydateId AND todaysDate = inToday AND term_id = inCurrentTermId;

END $$
DELIMITER ;












DELIMITER $$
CREATE PROCEDURE attendance_get_daily_percentage(IN mWeekValuesid INT, IN inClassId INT, IN inCurrentTermId INT, IN inTodaysdate DATE)
BEGIN 

    SELECT week_what, (SUM(mark_m+mark_a)*100)/(COUNT(student_id)*10) AS 'dailypercent' 
    FROM fn_attendance 
	INNER JOIN weeks_and_dates
    	ON fn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id
    WHERE weekValue_id = mWeekValuesid AND class_id = inClassId AND term_id = inCurrentTermId AND todaysDate = inTodaysdate;

END $$
DELIMITER ;














DELIMITER $$ 
CREATE PROCEDURE attendance_add_to_weekly_percentage(IN inWeekValuesid INT, IN inClassId INT, IN inCurrentTermId INT, IN inToday DATE, IN inWeekWhat CHAR(32), IN inPercent INT)
BEGIN 

    DECLARE inPercentInt INT;
    
        SELECT weekly_percentage_id 
        FROM weekly_percentage 
        WHERE weekvalue_id = inWeekValuesid AND 
            class_id = inClassId AND 
            term_id = inCurrentTermId AND 
            todaysDate = inToday AND 
            weekwhat = inWeekWhat AND 
            weeklypercentage = inPercent 
        INTO inPercentInt;
        SELECT inPercentInt;

    IF inPercentInt <= 0 THEN

        INSERT INTO weekly_percentage (weekvalue_id, class_id, term_id, todaysDate, weekwhat, weeklypercentage) VALUES (inWeekValuesid, inClassId, inCurrentTermId, inToday, inWeekWhat, inPercent);
        SELECT LAST_INSERT_ID() INTO inPercentInt;
        SELECT inPercentInt;

    END IF;

END $$
DELIMITER ;



















DELIMITER $$
CREATE PROCEDURE attendance_get_all_weekly_percentages(IN inStartedDate DATE, IN inEndsDate DATE)
BEGIN

    SELECT weekvalue_id, class_name, name, todaysDate, weekwhat, SUM(weeklypercentage) AS 'mi_weely_percent' FROM weekly_percentage
        INNER JOIN school_classes
            ON weekly_percentage.class_id = school_classes.school_classes_id
        INNER JOIN term
            ON weekly_percentage.term_id = term.term_id
    WHERE todaysDate BETWEEN inStartedDate AND inEndsDate
    GROUP BY weekvalue_id;

END $$
DELIMITER ;


CREATE INDEX idx_wklytotal_weekvalue_id ON weekly_total (weekvalue_id);
CREATE INDEX idx_wklytotal_student_id ON weekly_total (student_id);
CREATE INDEX idx_wklytotal_class_id ON weekly_total (class_id);
CREATE INDEX idx_wklytotal_todaydate_id ON weekly_total (todaydate_id);
CREATE INDEX idx_wklytotal_todaydate ON weekly_total (todaydate);
CREATE INDEX idx_wklytotal_term_id ON weekly_total (term_id);




-- END
-- BEGIN 
--     SELECT attendance_status_id, morning, afternoon
--     FROM attendance_status attendance_get_weekly_percentagez
--     WHERE class_id = inClassId AND 	today_date = inTodaysDate AND term_id = inTermId AND today_date_id = inTodaydateId;UpdateStudentWeeklyTotals
-- END

DELIMITER $$
CREATE PROCEDURE attendance_get_privious_wklytotal(IN inWeekValuesid INT, IN inStudentId INT, IN inClassId INT, IN inCurrentTermId INT)
BEGIN

    SELECT weekly_total_id, weektotal
    FROM weekly_total
    WHERE weekvalue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND term_id = inCurrentTermId;
	
END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE attendance_update_student_wklyTotal(IN inWeekValuesid INT, IN inStudentId INT, IN inClassId INT, IN inTodaydateId INT, IN inToday DATE, IN inCurrentTermId INT, IN incurrentTotal INT)
BEGIN

    UPDATE week_total 
    SET weektotal = incurrentTotal, todaydate_id = inTodaydateId, todaydate = inToday
    WHERE weekvalue_id = inWeekValuesid AND student_id = inStudentId AND class_id = inClassId AND term_id = inCurrentTermId;
	
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE attendance_add_weekly_totals(IN inWeekValuesid INT, IN inStudentId INT, IN inClassId INT, IN inTodaydateId INT, IN inToday DATE, IN inCurrentTermId INT, IN inWeeklyTotals INT)
BEGIN

    INSERT INTO weekly_total (weekvalue_id, student_id, class_id, todaydate_id, todaydate, term_id, weektotal) VALUES (inWeekValuesid, inStudentId, inClassId, inTodaydateId, inToday, inCurrentTermId, inWeeklyTotals);
	
END $$
DELIMITER ;

attendance_get_weekly_percentagez



DELIMITER $$ 
CREATE PROCEDURE attendance_get_each_students_attTotal(IN inClassId INT, IN inCurrentTermId INT, IN inCurrentYear CHAR(4), IN inWeekStart DATE, IN inWeekStop DATE)
BEGIN

    SELECT class_id, class_name, term_id, name, student_id, firstname, surname, SUM(week_total) AS 'eachTotal' 
    FROM weekly_total 
        INNER JOIN school_classes
            ON weekly_total.class_id = school_classes.school_classes_id
        INNER JOIN term 
            ON weekly_total.term_id = term.term_id 
        INNER JOIN applicants
            ON weekly_total.student_id = applicants.applicants_id
    WHERE term_id = inCurrentTermId AND 
        class_id = inClassId AND 
        weekvalue_id BETWEEN 1 AND 15 AND 
        todaydate BETWEEN inWeekStart AND inWeekStop AND 
        YEAR(todaydate) = inCurrentYear 
    GROUP BY student_id;

END $$
DELIMITER ;

-- ////////////////////////////////////////////// 

DELIMITER $$ 
CREATE PROCEDURE school_register_attendace_sn(IN inWeekValuesid INT, IN inStudentId INT, IN inClassId INT, IN inTodaydateId INT, IN inTodaysDate DATE, IN inTermId INT, IN inAttendanceValue INT, IN inAttendanceMark CHAR(32))
BEGIN 
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

END $$
DELIMITER ;

DELIMITER $$ 
CREATE PROCEDURE school_register_attendace_tn(IN inWeekValuesid INT, IN inStudentId INT, IN inClassId INT, IN inTodaydateId INT, IN inTodaysDate DATE, IN inTermId INT, IN inAttendanceValue INT, IN inAttendanceMark CHAR(32))
BEGIN 
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

END $$
DELIMITER ;



DELIMITER $$ 
CREATE PROCEDURE school_register_attendace_fp(IN inWeekValuesid INT, IN inStudentId INT, IN inClassId INT, IN inTodaydateId INT, IN inTodaysDate DATE, IN inTermId INT, IN inAttendanceValue INT, IN inAttendanceMark CHAR(32))
BEGIN 
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

END $$
DELIMITER ;


DELIMITER $$ 
CREATE PROCEDURE school_register_attendace_sp(IN inWeekValuesid INT, IN inStudentId INT, IN inClassId INT, IN inTodaydateId INT, IN inTodaysDate DATE, IN inTermId INT, IN inAttendanceValue INT, IN inAttendanceMark CHAR(32))
BEGIN 
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

END $$
DELIMITER ;
 
DELIMITER $$ 
CREATE PROCEDURE school_register_attendace_tp(IN inWeekValuesid INT, IN inStudentId INT, IN inClassId INT, IN inTodaydateId INT, IN inTodaysDate DATE, IN inTermId INT, IN inAttendanceValue INT, IN inAttendanceMark CHAR(32))
BEGIN 
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

END $$
DELIMITER ; 

DELIMITER $$ 
CREATE PROCEDURE school_register_attendace_fs(IN inWeekValuesid INT, IN inStudentId INT, IN inClassId INT, IN inTodaydateId INT, IN inTodaysDate DATE, IN inTermId INT, IN inAttendanceValue INT, IN inAttendanceMark CHAR(32))
BEGIN 
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

END $$
DELIMITER ; 
 
DELIMITER $$ 
CREATE PROCEDURE school_register_attendace_ss(IN inWeekValuesid INT, IN inStudentId INT, IN inClassId INT, IN inTodaydateId INT, IN inTodaysDate DATE, IN inTermId INT, IN inAttendanceValue INT, IN inAttendanceMark CHAR(32))
BEGIN 
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

END $$
DELIMITER ; 


DELIMITER $$ 
CREATE PROCEDURE school_register_attendace_ts(IN inWeekValuesid INT, IN inStudentId INT, IN inClassId INT, IN inTodaydateId INT, IN inTodaysDate DATE, IN inTermId INT, IN inAttendanceValue INT, IN inAttendanceMark CHAR(32))
BEGIN 
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

END $$
DELIMITER ;
