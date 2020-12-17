DELIMITER $$
CREATE PROCEDURE school_check_class_subject_first(IN inClassId INT, IN inSubjectId INT)
BEGIN
    DECLARE checkRowsCount INT; 

    SELECT count(*)
    FROM class_subjects
    WHERE class_id = inClassId AND subject_id = inSubjectId
    INTO checkRowsCount;

    IF checkRowsCount = 0 THEN
        SELECT 1;
    ELSE 
        SELECT -1;
    END IF;
END $$
DELIMITER ;