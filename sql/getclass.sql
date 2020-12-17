

DELIMITER $$
CREATE PROCEDURE school_get_classes_by_department(IN inDepartmentId INT)
BEGIN 
    SELECT school_classes_id, class_name, department_id 
    FROM school_classes 
    WHERE department_id = inDepartmentId;
END $$
DELIMITER ;
