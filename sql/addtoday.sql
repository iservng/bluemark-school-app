


DELIMITER $$ 
CREATE PROCEDURE school_add_todays_date_for_attendance(IN inDate DATE)
BEGIN 
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
END $$
DELIMITER ;