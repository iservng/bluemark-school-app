DELIMITER $$ 
CREATE PROCEDURE school_add_session_date(IN inSessionDate DATE, IN inYearOnly CHAR(4))
BEGIN 
    DECLARE userLastInsertId INT;

    INSERT INTO school_session (session_date, session_year) VALUES (inSessionDate, inYearOnly);

    SELECT LAST_INSERT_ID() INTO userLastInsertId;

    SELECT userLastInsertId;
END $$
DELIMITER ;