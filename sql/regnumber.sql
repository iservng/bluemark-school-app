DELIMITER $$ 
CREATE PROCEDURE school_set_registration_number(IN inRegnum VARCHAR(100), IN inStudentId INT)
BEGIN 
    UPDATE applicants 
    SET reg_number = inRegnum
    WHERE applicants_id = inStudentId;
END $$
DELIMITER ;