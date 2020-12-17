DELIMITER $$
CREATE PROCEDURE school_add_new_class_name(IN inClassName VARCHAR(100), IN inDepartmentId INT)
BEGIN 
    INSERT INTO school_classes (class_name, department_id) VALUES (inClassName, inDepartmentId);
END $$
DELIMITER ;