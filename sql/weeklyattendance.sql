DELIMITER $$ 
CREATE PROCEDURE school_add_weekly_attendance_date(IN inStart DATE, IN inStop DATE, IN inWeeksAndDatesId INT)
BEGIN

    UPDATE weeks_and_dates SET week_start = inStart, week_stop = inStop WHERE weeks_and_dates_id = inWeeksAndDatesId;

END $$
DELIMITER ;



DELIMITER $$ 
CREATE PROCEDURE school_add_weekly_general_date(IN inStart DATE, IN inStop DATE, IN inWeeksAndDatesId INT)
BEGIN

    UPDATE weeks_and_dates SET week_start_g = inStart, week_stop_g = inStop WHERE weeks_and_dates_id = inWeeksAndDatesId;

END $$
DELIMITER ;