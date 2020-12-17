



DELIMITER $$
CREATE PROCEDURE catalog_get_attributes_not_assigned_to_product(IN inProductId INT)
BEGIN  
    SELECT a.name AS attribute_name, 
        av.attribute_value_id, av.value AS attribute_value 
    FROM attribute_value av 
    INNER JOIN attribute a 
            ON av.attribute_id = a.attribute_id
    WHERE av.attribute_value_id NOT IN 
            (SELECT attribute_value_id 
            FROM product_attribute 
            WHERE product_id = inProductId)
    ORDER BY attribute_name, av.attribute_value_id;

END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE catalog_assign_attribute_value_to_product(IN inProductId INT, inAttributeValueId INT) 
BEGIN 
    INSERT INTO product_attribute (product_id, attribute_value_id)
        VALUES (inProductId, inAttributeValueId);
END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE catalog_remove_product_attribute_value(IN inProductId INT, IN inAttributeValueId INT)
BEGIN
    DELETE FROM product_attribute 
    WHERE product_id = inProductId AND attribute_value_id = inAttributeValueId;
END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE catalog_set_image(IN inProductId INT, IN inImage VARCHAR(150))
BEGIN
    UPDATE product SET image = inImage WHERE product_id = inProductId;
END$$
DELIMITER ;




DELIMITER $$
CREATE PROCEDURE catalog_set_image_2(IN inProductId INT, IN inImage VARCHAR(150))
BEGIN
    UPDATE product SET image_2 = inImage WHERE product_id = inProductId;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE catalog_set_thumbnail(IN inProductId INT, IN inThumbnail VARCHAR(150))
BEGIN
    UPDATE product
    SET thumbnail = inThumbnail
    WHERE product_id = inProductId;
END$$
DELIMITER ;
