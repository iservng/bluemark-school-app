TRUNCATE TABLE order_detail;
TRUNCATE TABLE orders;

ALTER TABLE orders 
DROP COLUMN customer_name,
DROP COLUMN shipping_address,
DROP COLUMN customer_email;


ALTER TABLE  orders
ADD COLUMN customer_id INT,
ADD COLUMN auth_code VARCHAR(50),
ADD COLUMN reference VARCHAR(50);

CREATE INDEX idx_orders_customer_id ON orders (customer_id);


DELIMITER $$
CREATE PROCEDURE shopping_cart_create_order(IN inCartId CHAR(32), IN inCustomerId INT)
BEGIN
    DECLARE orderId INT;

    INSERT INTO orders (created_on, customer_id)
    VALUES (NOW(), inCustomerId);

     
    SELECT LAST_INSERT_ID() INTO orderId;

    INSERT INTO order_detail (order_id, product_id, attributes, product_name, quantity, unit_cost)
    SELECT orderId, p.product_id, sc.attributes, p.name, sc.quantity, COALESCE(NULLIF(p.discounted_price, 0), p.price) AS unit_cost
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



