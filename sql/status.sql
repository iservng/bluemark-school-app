DELIMITER $$
CREATE PROCEDURE school_get_status(IN inEmail VARCHAR(100))
BEGIN 
    SELECT status 
    FROM teachers 
    WHERE email = inEmail;
END $$
DELIMITER ;