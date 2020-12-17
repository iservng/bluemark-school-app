DELIMITER $$
CREATE PROCEDURE catalog_get_department_categories(IN inDepartmentId INT)
BEGIN
    SELECT category_id, name, description
    FROM category
    WHERE department_id = inDepartmentId
    ORDER BY category_id;
END $$
DELIMITER ;







DELIMITER $$
CREATE PROCEDURE catalog_update_category(IN inCategoryId INT, IN inName VARCHAR(100), IN inDescription VARCHAR(1000))
BEGIN
    UPDATE category
    SET name = inName, description = inDescription
    WHERE category_id = inCategoryId
END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE catalog_delete_category(IN inCategoryId INT)
BEGIN
    DECLARE productCategoryRowsCount INT;

    SELECT count(*)
    FROM product p
    INNER JOIN product_category pc 
            ON p.product_id = pc.product_id 
    WHERE pc.category_id = inCategoryId
    INTO productCategoryRowsCount;

    IF productCategoryRowsCount = 0 THEN
        DELETE FROM category 
        WHERE category_id = inCategoryId;

        SELECT 1;
    ELSE 
        SELECT -1;
    END IF;
END $$
DELIMITER ;