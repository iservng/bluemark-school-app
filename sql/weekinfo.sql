DELIMITER $$
CREATE PROCEDURE school_get_week_info(IN inTodayDate DATE)
BEGIN
    SELECT weeks_and_dates_id, week_start, week_stop, week_what, week_start_g, week_stop_g
    FROM weeks_and_dates
    WHERE inTodayDate >= week_start_g AND inTodayDate <= week_stop_g;
END $$ 
DELIMITER ;