CREATE INDEX idx_school_class_id ON class_subjects (class_id);
CREATE INDEX idx_school_subject_id ON class_subjects (subject_id);

DELIMITER $$ 
CREATE PROCEDURE school_add_subjects_to_class(IN inClassId INT, IN inSubjectId int)
BEGIN 
    INSERT INTO class_subjects (class_id, subject_id) VALUES (inClassId, inSubjectId);
END $$ 
DELIMITER ;




DELIMITER $$ 
CREATE PROCEDURE school_get_all_class_subjects(in inClassId INT)
BEGIN 
    SELECT class_id, subject_id, name
    FROM class_subjects 
    INNER JOIN subjects 
        ON class_subjects.subject_id = subjects.subjects_id
    WHERE subject_status = 1 AND class_id = inClassId
    ORDER BY subject_id;
END $$
DELIMITER ;