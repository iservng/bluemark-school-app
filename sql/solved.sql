
DELIMITER $$
CREATE PROCEDURE attendance_get_all_weeks_percentage_sn(IN inClassId INT, IN inCurrentTermId INT, IN inThisTermStarted DATE, IN inThisTermEnds DATE)
BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM sn_attendance
        INNER JOIN weeks_and_dates 
            ON sn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END $$
DELIMITER ;




DELIMITER $$
CREATE PROCEDURE attendance_get_all_weeks_percentage_tn(IN inClassId INT, IN inCurrentTermId INT, IN inThisTermStarted DATE, IN inThisTermEnds DATE)
BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM tn_attendance
        INNER JOIN weeks_and_dates 
            ON tn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE attendance_get_all_weeks_percentage_fp(IN inClassId INT, IN inCurrentTermId INT, IN inThisTermStarted DATE, IN inThisTermEnds DATE)
BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM fp_attendance
        INNER JOIN weeks_and_dates 
            ON fp_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE attendance_get_all_weeks_percentage_sp(IN inClassId INT, IN inCurrentTermId INT, IN inThisTermStarted DATE, IN inThisTermEnds DATE)
BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM sp_attendance
        INNER JOIN weeks_and_dates 
            ON sp_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE attendance_get_all_weeks_percentage_tp(IN inClassId INT, IN inCurrentTermId INT, IN inThisTermStarted DATE, IN inThisTermEnds DATE)
BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM tp_attendance
        INNER JOIN weeks_and_dates 
            ON tp_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE attendance_get_all_weeks_percentage_fs(IN inClassId INT, IN inCurrentTermId INT, IN inThisTermStarted DATE, IN inThisTermEnds DATE)
BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM fs_attendance
        INNER JOIN weeks_and_dates 
            ON fs_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE attendance_get_all_weeks_percentage_ss(IN inClassId INT, IN inCurrentTermId INT, IN inThisTermStarted DATE, IN inThisTermEnds DATE)
BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM ss_attendance
        INNER JOIN weeks_and_dates 
            ON ss_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE attendance_get_all_weeks_percentage_ts(IN inClassId INT, IN inCurrentTermId INT, IN inThisTermStarted DATE, IN inThisTermEnds DATE)
BEGIN 
    SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent'
    FROM ts_attendance
        INNER JOIN weeks_and_dates 
            ON ts_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
    WHERE class_id = inClassId AND 
        term_id = inCurrentTermId AND 
        todaysDate BETWEEN inThisTermStarted AND inThisTermEnds
    GROUP BY weekValue_id;
END $$
DELIMITER ;
