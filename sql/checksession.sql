DELIMITER $$ 
CREATE PROCEDURE school_check_session_for_duplicates(IN inSessionDate DATE, IN inYearOnly CHAR(4))
BEGIN 

    SELECT school_session_id 
    FROM school_session
    WHERE session_date = inSessionDate AND session_year = inYearOnly;


END $$
DELIMITER ;