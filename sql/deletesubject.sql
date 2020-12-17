DELIMITER $$
CREATE PROCEDURE school_delete_subject(IN inSubjectId INT)
BEGIN
    DELETE FROM subjects WHERE subjects_id = inSubjectId;
END $$
DELIMITER ;