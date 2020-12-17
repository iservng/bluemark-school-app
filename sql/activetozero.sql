DELIMITER $$ 
CREATE PROCEDURE school_mark_student_activeStatus_to_zero(IN inActivezero INT, IN inStudentId INT)
BEGIN 
    UPDATE active_class
    SET active_status = inActivezero
    WHERE student_id = inStudentId;
END $$
DELIMITER ;

