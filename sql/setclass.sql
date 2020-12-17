DELIMITER $$
CREATE PROCEDURE school_set_teachers_classes(IN inTeacherId INT, IN inClassId INT)
BEGIN

    INSERT INTO teacher_class (teacher_id, class_id) 
    VALUES (inTeacherId, inClassId);


END $$
DELIMITER ;