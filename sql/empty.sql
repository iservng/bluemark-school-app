



DELIMITER $$
CREATE PROCEDURE shopping_cart_create_order(IN inCartId CHAR(32))
BEGIN
    DECLARE orderId INT;

   
    INSERT INTO orders (created_on) VALUES (NOW());


    SELECT LAST_INSERT_ID() INTO orderId;

    INSERT INTO order_detail (order_id, product_id, attributes,
                             product_name, quantity, unit_cost) 
    SELECT orderId, p.product_id, sc.attributes, p.name, sc.quantity,              COALESCE(NULLIF(p.discounted_price, 0), p.price) AS unit_cost
    FROM shopping_cart sc 
    INNER JOIN product p 
            ON sc.product_id = p.product_id
    WHERE sc.cart_id = inCartId AND sc.buy_now;


    UPDATE orders 
    SET total_amount = (SELECT SUM(unit_cost * quantity)
                        FROM order_detail 
                        WHERE order_id = orderId)
    WHERE order_id = orderId;

    CALL shopping_cart_empty(inCartId);


    SELECT orderId;
     
END $$
DELIMITER ;