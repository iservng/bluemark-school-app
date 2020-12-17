DELIMITER $$
CREATE PROCEDURE applicant_get_classname_by_id(IN inId INT)
BEGIN
    SELECT class_name 
    FROM school_classes 
    WHERE school_classes_id = inId;
END $$
DELIMITER ;