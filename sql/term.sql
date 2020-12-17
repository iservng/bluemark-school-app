DELIMITER $$
CREATE PROCEDURE school_get_current_term()
BEGIN 
    SELECT current_term 
    FROM admin_settings;
END $$
DELIMITER ;