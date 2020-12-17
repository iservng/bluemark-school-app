DELIMITER $$
CREATE PROCEDURE customer_get_login_info_staff(IN inEmail VARCHAR(100))
BEGIN 
    SELECT teachers_id, password FROM teachers WHERE email = inEmail;
END $$
DELIMITER ;