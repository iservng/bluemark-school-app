DELIMITER $$
CREATE PROCEDURE school_get_term_startstop_date(IN inWeekDateId INT)
BEGIN
    SELECT weeks_and_dates_id, DATE_FORMAT(week_start,'%M %d, %Y') AS 'term_start', DATE_FORMAT(week_stop,'%M %d, %Y') AS 'term_stop' FROM weeks_and_dates WHERE weeks_and_dates_id = inWeekDateId;
END $$
DELIMITER ;

