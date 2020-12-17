DELIMITER $$ 
CREATE PROCEDURE school_delete_subject_from_class(IN inSubjectId INT, IN inClassId INT)
BEGIN 
    UPDATE class_subjects 
    SET subject_status = 0 
    WHERE class_id = inClassId AND subject_id = inSubjectId;

END $$
DELIMITER ;