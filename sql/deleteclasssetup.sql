CREATE INDEX idx_school_class_id ON teacher_class (class_id);


DELIMITER $$
CREATE PROCEDURE school_return_records_for_classId(IN inClassId INT)
BEGIN 
    SELECT class_id FROM teacher_class WHERE class_id = inClassId;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE school_delete_class_teacher(IN inClassId INT)
BEGIN 
    DELETE FROM teacher_class WHERE class_id = inClassId;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE school_delete_class(IN inClassId INT)
BEGIN 
    DELETE FROM school_classes WHERE school_classes_id = inClassId;
END $$
DELIMITER ;