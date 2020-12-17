DELIMITER $$
CREATE PROCEDURE catalog_delete_attribute(IN inAttributeId INT)
BEGIN
    DECLARE attributeRowsCount INT; 

    SELECT count(*)
    FROM attribute_value
    WHERE attribute_id = inAttributeId
    INTO attributeRowsCount;

    IF attributeRowsCount = 0 THEN
        DELETE FROM attribute 
        WHERE attribute_id = inAttributeId;

        SELECT 1;
    ELSE 
        SELECT -1;
    END IF;
END $$
DELIMITER ;




DELIMITER $$
CREATE PROCEDURE catalog_get_attribute_details(IN inAttributeId INT)
BEGIN 
    SELECT attribute_id, name 
    FROM attribute
    WHERE attribute_id = inAttributeId;
END $$
DELIMITER ;




DELIMITER $$
CREATE PROCEDURE catalog_get_attribute_values(IN inAttributeId INT)
BEGIN
    SELECT attribute_value_id, value 
    FROM attribute_value
    WHERE attribute_id = inAttributeId
    ORDER BY attribute_id;
END $$
DELIMITER ;




DELIMITER $$
CREATE  PROCEDURE catalog_add_attribute_value(IN inAttributeId INT, IN inValue VARCHAR(100))
BEGIN
    INSERT INTO attribute_value (attribute_id, value)
    VALUES (inAttributeId, inValue);
END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE catalog_update_attribute_value(IN inAttributeValueId INT, IN inValue VARCHAR(100))
BEGIN
    UPDATE attribute_value 
    SET value = inValue
    WHERE attribute_value_id = inAttributeValueId;
END $$
DELIMITER ;




DELIMITER $$
CREATE PROCEDURE catalog_delete_attribute_value(IN inAttributeValueId INT)
BEGIN
    DECLARE productAttributeRowsCount INT;

    SELECT count(*)
    FROM product p 
    INNER JOIN product_attribute pa 
            ON p.product_id = pa.product_id
    WHERE pa.attribute_value_id = inAttributeValueId
    INTO productAttributeRowsCount;

    IF productAttributeRowsCount = 0 THEN 
        DELETE FROM attribute_value 
        WHERE attribute_value_id = inAttributeValueId;

        SELECT 1;
    ELSE 
        SELECT -1;
    END IF;
END $$
DELIMITER ;





