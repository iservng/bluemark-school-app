DELIMITER $$
CREATE PROCEDURE school_get_classes_list()
BEGIN
    SELECT school_classes_id, class_name, department_id
    FROM school_classes
    ORDER BY school_classes_id;
END $$
DELIMITER ;