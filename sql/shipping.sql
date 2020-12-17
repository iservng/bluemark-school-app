CREATE TABLE shipping (
shipping_id INT NOT NULL AUTO_INCREMENT,
shipping_type VARCHAR(100) NOT NULL,
shipping_cost NUMERIC(10, 2) NOT NULL,
shipping_region_id INT NOT NULL,
PRIMARY KEY (shipping_id),
KEY idx_shipping_shipping_region_id (shipping_region_id)
);

INSERT INTO shipping (shipping_id, shipping_type,
shipping_cost, shipping_region_id) VALUES
(1, 'Next Day Delivery ($20)', 20.00, 2),
(2, '3-4 Days ($10)', 10.00, 2),
(3, '7 Days ($5)', 5.00, 2),
(4, 'By air (7 days, $25)', 25.00, 3),
(5, 'By sea (28 days, $10)', 10.00, 3),
(6, 'By air (10 days, $35)', 35.00, 4),
(7, 'By sea (28 days, $30)', 30.00, 4);

CREATE TABLE tax (
tax_id INT NOT NULL AUTO_INCREMENT,
tax_type VARCHAR(100) NOT NULL,
tax_percentage NUMERIC(10, 2) NOT NULL,
PRIMARY KEY (tax_id)
);

INSERT INTO tax (tax_id, tax_type, tax_percentage) VALUES
(1, 'Sales Tax at 8.5%', 8.50),
(2, 'No Tax', 0.00);


ALTER TABLE orders ADD COLUMN shipping_id INT;

CREATE INDEX idx_orders_shipping_id ON orders (shipping_id);


ALTER TABLE orders ADD COLUMN tax_id INT;

CREATE INDEX idx_orders_tax_id ON orders (tax_id);


DELIMITER $$
CREATE PROCEDURE shopping_cart_create_order(IN inCartId CHAR(32),
IN inCustomerId INT, IN inShippingId INT, IN inTaxId INT)
BEGIN
DECLARE orderId INT;

INSERT INTO orders (created_on, customer_id, shipping_id, tax_id) VALUES
(NOW(), inCustomerId, inShippingId, inTaxId);

SELECT LAST_INSERT_ID() INTO orderId;

INSERT INTO order_detail (order_id, product_id, attributes,
product_name, quantity, unit_cost)
SELECT orderId, p.product_id, sc.attributes, p.name, sc.quantity,
COALESCE(NULLIF(p.discounted_price, 0), p.price) AS unit_cost
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
END$$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE orders_get_order_info(IN inOrderId INT)
BEGIN
SELECT o.order_id, o.total_amount, o.created_on, o.shipped_on,
o.status, o.comments, o.customer_id, o.auth_code,
o.reference, o.shipping_id, s.shipping_type, s.shipping_cost,
o.tax_id, t.tax_type, t.tax_percentage
FROM orders o
INNER JOIN tax t
ON t.tax_id = o.tax_id
INNER JOIN shipping s
ON s.shipping_id = o.shipping_id
WHERE o.order_id = inOrderId;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE orders_get_shipping_info(IN inShippingRegionId INT)
BEGIN
SELECT shipping_id, shipping_type, shipping_cost, shipping_region_id
FROM shipping
WHERE shipping_region_id = inShippingRegionId;
END$$
DELIMITER ;