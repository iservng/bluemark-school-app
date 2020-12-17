DELIMITER $$
CREATE PROCEDURE orders_get_most_recent_orders(IN inHowMany INT)
BEGIN
    PREPARE statement FROM
        "SELECT order_id, total_amount, created_on, shipped_on, status, customer_name 
        FROM orders 
        ORDER BY created_on DESC 
        LIMIT ?"; 

        SET @p1 = inHowMany;

        EXECUTE statement USING @p1;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE orders_get_orders_between_dates(IN inStartDate DATETIME, IN inEndDate DATETIME)
BEGIN
    SELECT order_id, total_amount, created_on, shipped_on, status,                  customer_name
    FROM orders 
    WHERE created_on >= inStartDate AND created_on <= inEndDate
    ORDER BY created_on DESC;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE orders_get_orders_by_status(IN inStatus INT)
BEGIN
    SELECT order_id, total_amount, created_on, 
            shipped_on, status, customer_name
    FROM orders 
    WHERE status = inStatus 
    ORDER BY created_on DESC;
END $$
DELIMITER ;