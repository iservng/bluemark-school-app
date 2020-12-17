DELIMITER $$ 
CREATE PROCEDURE school_add_term_start_date_for_attendance(IN inDate DATE)
BEGIN 
    INSERT INTO week_attendance
    
	(week_start, week_stop, week_what)

    VALUES 
    (
        
    )

    
END $$
DELIMITER ;