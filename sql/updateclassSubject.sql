DELIMITER $$
CREATE PROCEDURE school_update_subjects_class_status(IN inClassId INT, IN inSubjectId INT)
BEGIN 
    UPDATE class_subjects 
    SET subject_status = 1 
    WHERE class_id = inClassId AND subject_id = inSubjectId;
END $$
DELIMITER ;