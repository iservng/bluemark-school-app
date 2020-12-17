DELIMITER $$
CREATE PROCEDURE applicant_set_teacher_applicant_to_pending(IN inIndex INT, IN inTeacherId INT)
BEGIN 
    UPDATE teachers 
    SET status = inIndex
    WHERE teachers_id = inTeacherId;
END $$
DELIMITER ;