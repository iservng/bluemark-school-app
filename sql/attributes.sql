DELIMITER $$
CREATE PROCEDURE catalog_get_attributes()
BEGIN
    SELECT attribute_id, name
    FROM attribute 
    ORDER BY attribute_id;
END $$
DELIMITER ;




DELIMITER $$
CREATE PROCEDURE catalog_update_attribute(IN inAttributeId INT, IN inName VARCHAR(100))
BEGIN
    UPDATE attribute
    SET name = inName 
    WHERE attribute_id = inAttributeId;

END $$
DELIMITER ;



///////////////////////////////////
