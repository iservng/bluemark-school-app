
DELIMITER $$
CREATE PROCEDURE catalog_update_product(IN inProductId INT, IN inName VARCHAR(100), IN inDescription VARCHAR(1000), IN inPrice DECIMAL(10, 2), IN inDiscountedPrice DECIMAL(10, 2))
BEGIN

    UPDATE product 
    SET name = inName, description = inDescription, price = inPrice, discounted_price = inDiscountedPrice 
    WHERE product_id = inProductId;
END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE catalog_delete_product(IN inProductId INT)
BEGIN 
    DELETE FROM product_attribute WHERE product_id = inProductId;
    DELETE FROM product_category WHERE product_id = inProductId;
    DELETE FROM product WHERE product_id = inProductId;
END $$
DELIMITER ;


/////////////////////////////////


DELIMITER $$
CREATE PROCEDURE catalog_remove_product_from_category(IN inProductId INT, IN inCategoryId INT)
BEGIN
    DECLARE productCategoryRowsCount INT;

    SELECT count(*)
    FROM product_category
    WHERE product_id = inProductId
    INTO productCategoryRowsCount;

    IF productCategoryRowsCount = 1 THEN 
        CALL catalog_delete_product(inProductId);
        SELECT 0;
    ELSE 
        DELETE FROM product_category
        WHERE category_id = inCategoryId AND product_id = inProductId;

        SELECT 1;
    END IF;
END $$
DELIMITER ;




DELIMITER $$
CREATE PROCEDURE catalog_get_categories()
BEGIN
    SELECT category_id, name, description 
    FROM category 
    ORDER BY category_id;
END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE catalog_get_product_info(IN inProductId INT)
BEGIN 
    SELECT product_id, name, description, price, discounted_price, image, image_2, thumbnail, display 
    FROM product
    WHERE product_id = inProductId;

END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE catalog_get_categories_for_product(IN inProductId INT)
BEGIN
    SELECT c.category_id, c.department_id, c.name
    FROM category c 
    JOIN product_category pc 
       ON c.category_id = pc.category_id
    WHERE pc.product_id = inProductId
    ORDER BY category_id;  
END $$
DELIMITER ;





DELIMITER $$
CREATE PROCEDURE catalog_set_product_display_option(IN inProductId INT, IN inDisplay SMALLINT)
BEGIN
    UPDATE product 
    SET display = inDisplay 
    WHERE product_id = inProductId;
END $$
DELIMITER ; 



DELIMITER $$
CREATE PROCEDURE catalog_assign_product_to_category(IN inProductId INT, IN inCategoryId INT)
BEGIN 
    INSERT INTO product_category (product_id, category_id)
    VALUES (inProductId, inCategoryId);
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE catalog_move_product_to_category(IN inProductId INT, IN inSourceCategoryId INT, IN inTargetCategoryId INT)
BEGIN
    UPDATE product_category 
    SET category_id = inTargetCategoryId 
    WHERE product_id = inProductId AND category_id = inSourceCategoryId;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE catalog_get_category_products(IN inCategoryId INT)
BEGIN

    SELECT p.product_id, p.name, p.description, p.price, p.discounted_price
    FROM product p 
    INNER JOIN product_category pc 
            ON p.product_id = pc.product_id 
    WHERE pc.category_id = inCategoryId
    ORDER BY p.product_id;

END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE catalog_add_product_to_category(IN inCategoryId INT, IN inName VARCHAR(100), IN inDescription VARCHAR(1000), IN inPrice DECIMAL(10,2))
BEGIN

   DECLARE productLastInsertId INT;

   INSERT INTO product (name, description, price)
   VALUES (inName, inDescription, inPrice);

   SELECT LAST_INSERT_ID() INTO productLastInsertId;

   INSERT INTO product_category (product_id, category_id)
   VALUES (productLastInsertId, inCategoryId);

END $$
DELIMITER ;