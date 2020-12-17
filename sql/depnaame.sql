
DELIMITER $$
CREATE PROCEDURE school_get_department_by_classid(IN inClassId INT)
BEGIN
    SELECT school_classes.department_id AS 'departmet_id', department.name AS 'department_name'
    FROM school_classes 
        INNER JOIN department 
            ON school_classes.department_id = department.department_id
    WHERE school_classes_id = inClassId;
END $$ 
DELIMITER ;