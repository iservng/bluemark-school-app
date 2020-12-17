DELIMITER $$
CREATE PROCEDURE catalog_get_departments()
BEGIN 
    SELECT department_id, name, description
    FROM department
    ORDER BY department_id;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE catalog_add_department(IN inName VARCHAR(100), IN inDescription VARCHAR(1000))
BEGIN 
    INSERT INTO department (name, description) 
    VALUES (inName, inDescription);
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE catalog_update_department(IN inDepartmentId INT, IN inName VARCHAR(100), IN inDescription VARCHAR(1000))
BEGIN
    UPDATE department 
    SET name = inName, description = inDescription
    WHERE department_id = inDepartmentId;
END $$
DELIMITER ;




DELIMITER $$
CREATE PROCEDURE catalog_delete_department(IN inDepartmentId INT)
BEGIN
    DECLARE categoryRowsCount INT;

    SELECT count(*)
    FROM category 
    WHERE department_id = inDepartmentId 
    INTO categoryRowsCount;

    IF categoryRowsCount = 0 THEN 
        DELETE FROM department WHERE department_id = inDepartmentId;
        SELECT 1;
    ELSE
        SELECT -1;
    END IF;
END$$
DELIMITER ;