DELIMITER $$ 
CREATE PROCEDURE school_get_the_current_year_for_listing()
BEGIN 
    SELECT admitted_on, YEAR(admitted_on) AS 'yearonly'
    FROM applicants 
    ORDER BY applicants_id DESC LIMIT 1;
END $$
DELIMITER ;


