DELIMITER $$ 
CREATE PROCEDURE school_get_current_admission_session()
BEGIN 
    SELECT school_session_id, session_date, session_year
    FROM school_session 
    ORDER BY school_session_id DESC LIMIT 1;
END $$
DELIMITER ;