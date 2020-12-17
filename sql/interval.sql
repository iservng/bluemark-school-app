DELIMITER $$
CREATE PROCEDURE shopping_cart_count_old_carts(IN inDays INT)
BEGIN 
    SELECT COUNT(cart_id) AS old_shopping_cart_count
    FROM (SELECT cart_id
            FROM shopping_cart
            GROUP BY cart_id
            HAVING DATE_SUB(NOW(), INTERVAL inDays DAY) >= MAX(added_on))
            AS old_cart;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE shopping_cart_delete_old_carts(IN inDays INT)
BEGIN 
    DELETE FROM shopping_cart 
    WHERE cart_id IN 
                    (SELECT cart_id
                    FROM (SELECT cart_id
                          FROM shopping_cart
                          GROUP BY cart_id 
                          HAVING DATE_SUB(NOW(), INTERVAL inDays DAY) >= 
                                    MAX(added_on)) AS sc);
END $$
DELIMITER ;
