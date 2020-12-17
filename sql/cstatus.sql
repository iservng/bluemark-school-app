DELIMITER $$
CREATE PROCEDURE applicant_get_staff_current_status(IN inStaffId INT)
BEGIN 
    SELECT status FROM teachers WHERE teachers_id = inStaffId;
END $$
DELIMITER ;