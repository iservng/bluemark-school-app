


DELIMITER $$ 
CREATE PROCEDURE orders_update_order(IN inOrderId INT, IN inStatus INT,
IN inComments VARCHAR(255), IN inCustomerName VARCHAR(50), 
IN inShippingAddress VARCHAR(255), IN inCustomerEmail VARCHAR(50))
BEGIN
    DECLARE currentStatus INT;

    SELECT status 
    FROM orders 
    WHERE order_id = inOrderId
    INTO currentStatus;

    IF inStatus != currentStatus AND (inStatus = 0 OR inStatus = 1) THEN 
        UPDATE orders 
        SET shipped_on = NULL 
        WHERE order_id = inOrderId;
    ELSEIF inStatus != currentStatus AND inStatus = 2 THEN
        UPDATE orders
        SET shipped_on = NOW()
        WHERE order_id = inOrderId;
    END IF;

    UPDATE orders 
    SET status = inStatus, comments = inComments, customer_name = inCustomerName, shipping_address = inShippingAddress, customer_email = inCustomerEmail 
    WHERE order_id = inOrderId;

END $$
DELIMITER ;