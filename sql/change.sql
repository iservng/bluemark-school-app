DELIMITER $$
CREATE PROCEDURE orders_get_most_recent_orders(IN inHowMany INT)
BEGIN 
    PREPARE statement FROM 
    
    "SELECT o.order_id, o.total_amount, o.created_on, o.shipped_on, o.status, c.name
    FROM orders o 
    INNER JOIN customer c 
            ON o.customer_id = c.customer_id
    ORDER BY o.created_on DESC 
    LIMIT ?"; 

    SET @p1 = inHowMany;

    EXECUTE statement USING @p1;

END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE orders_get_orders_between_dates(IN inStartDate DATETIME, IN inEndDate DATETIME)
BEGIN
    SELECT o.order_id, o.total_amount, o.created_on, o.shipped_on, o.status, c.name 
    FROM orders o 
    INNER JOIN customer c 
            ON o.customer_id = c.customer_id
    WHERE o.created_on >= inStartDate AND o.created_on <= inEndDate
    ORDER BY o.created_on DESC;

END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE orders_get_orders_by_status(IN inStatus INT)
BEGIN

    SELECT o.order_id, o.total_amount, o.created_on, o.shipped_on, o.status, c.name 
    FROM orders o 
    INNER JOIN customer c 
                ON o.customer_id = c.customer_id
    WHERE o.status = inStatus
    ORDER BY o.created_on DESC;

END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE orders_get_order_info(IN inOrderId INT)
BEGIN 
    SELECT order_id, total_amount, created_on, status, comments, customer_id, auth_code, reference 
    FROM orders 
    WHERE order_id = inOrderId;
END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE orders_update_order(IN inOrderId INT, IN inStatus INT, IN inComments VARCHAR(255), IN inAuthCode VARCHAR(50), IN inReference VARCHAR(50))
BEGIN

    DECLARE currentStatus INT;

    SELECT status 
    FROM orders 
    WHERE order_id = inOrderId 
    INTO currentStatus;

    IF inStatus != currentStatus AND (inStatus = 0 OR inStatus = 1) THEN
        UPDATE orders
        SET shipped_on = null
        WHERE order_id = inOrderId;
    ELSEIF inStatus != currentStatus AND inStatus = 2 THEN 
        UPDATE orders 
        SET shipped_on = NOW()
        WHERE order_id = inOrderId;
    END IF;

    UPDATE orders
    SET status = inStatus, comments = inComments, auth_code = inAuthCode, reference = inReference 
    WHERE order_id = inOrderId;


END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE orders_get_by_customer_id(IN inCustomerId INT)
BEGIN 
    SELECT o.order_id, o.total_amount, o.created_on, o.shipped_on, o.status, c.name 
    FROM orders o 
    INNER JOIN customer c 
            ON o.customer_id = c.customer_id 
    WHERE o.customer_id = inCustomerId 
    ORDER BY o.created_on DESC;

END $$
DELIMITER ;


DELIMITER $$ 
CREATE PROCEDURE orders_get_order_short_details(IN inOrderId INT)
BEGIN 
    SELECT o.order_id, o.total_amount, o.created_on, o.shipped_on, o.status, c.name 
    FROM orders o
    INNER JOIN customer c 
            ON o.customer_id = c.customer_id 
    WHERE o.order_id = inOrderId;
END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE customer_get_customers_list()
BEGIN 
    SELECT customer_id, name 
    FROM customer 
    ORDER BY name ASC;
END $$
DELIMITER ;