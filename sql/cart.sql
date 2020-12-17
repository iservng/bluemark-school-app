DELIMITER $$
CREATE PROCEDURE shopping_cart_add_product(IN inCartId CHAR(32), IN inProductId INT, IN inAttributes VARCHAR(1000))
BEGIN
    DECLARE productQuantity INT;

    SELECT quantity 
    FROM shopping_cart 
    WHERE cart_id = inCartId AND product_id = inProductId AND attributes = inAttributes 
    INTO productQuantity;

    IF productQuantity IS NULL THEN
        INSERT INTO shopping_cart (cart_id, product_id, attributes, quantity, added_on) VALUES (inCartId, inProductId, inAttributes, 1, NOW());
    ELSE 
        UPDATE shopping_cart 
        SET quantity = quantity + 1, buy_now = true
        WHERE cart_id = inCartId 
        AND product_id = inProductId 
        AND attributes = inAttributes;
    END IF;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE shopping_cart_update(IN inItemId INT, IN inQuantity INT)
BEGIN
    IF inQuantity > 0 THEN 
        UPDATE shopping_cart 
        SET quantity = inQuantity, added_on = NOW()
        WHERE item_id = inItemId;
    ELSE 
        CALL shopping_cart_remove_product(inItemId);
    END IF;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE shopping_cart_remove_product(IN inItemId INT)
BEGIN 
    DELETE FROM shopping_cart
    WHERE item_id = inItemId;
END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE shopping_cart_get_products(IN inCartId CHAR(32))
BEGIN
    SELECT sc.item_id, p.name, sc.attributes,
            COALESCE(NULLIF(p.discounted_price, 0), p.price) AS price,
            sc.quantity,
            COALESCE(NULLIF(p.discounted_price, 0), 
                p.price) * sc.quantity AS subtotal
    FROM shopping_cart sc 
    INNER JOIN product p 
            ON sc.product_id = p.product_id
    WHERE sc.cart_id = inCartId AND sc.buy_now;
END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE shopping_cart_get_saved_products(IN inCartId CHAR(32))
BEGIN 
    SELECT sc.item_id, p.name, sc.attributes,
            COALESCE(NULLIF(p.discounted_price, 0), p.price) AS price
    FROM shopping_cart sc 
    INNER JOIN product p 
            ON sc.product_id = p.product_id 
    WHERE sc.cart_id = inCartId AND NOT sc.buy_now;
END $$
DELIMITER ;







DELIMITER $$
CREATE PROCEDURE shopping_cart_save_product_for_later(IN inItemId INT)
BEGIN 
    UPDATE shopping_cart 
    SET buy_now = false, quantity = 1
    WHERE item_id = inItemId;
END $$
DELIMITER ; 


DELIMITER $$
CREATE PROCEDURE shopping_cart_move_product_to_cart(IN inItemId INT) 
BEGIN 
    UPDATE shopping_cart 
    SET buy_now = true, added_on = NOW()
    WHERE item_id = inItemId;
END $$
DELIMITER ;