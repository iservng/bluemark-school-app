
DELIMITER $$
CREATE PROCEDURE applicant_add_teacher_info(
    IN inName VARCHAR(100), 
    IN inPhone VARCHAR(100), 
    IN inEmail VARCHAR(100),
    IN inCvname VARCHAR(100)
    )
BEGIN
   INSERT INTO teachers (name, phone, email, cvname)
   VALUES (inName, inPhone, inEmail, inCvname);
END $$
DELIMITER ;