DELIMITER $$
CREATE PROCEDURE orders_get_order_info(IN inOrderId INT)
BEGIN
    SELECT order_id, total_amount, created_on, shipped_on, status, comments, customer_name, shipping_address, customer_email
    FROM orders
    WHERE order_id = inOrderId;
END $$
DELIMITER ;