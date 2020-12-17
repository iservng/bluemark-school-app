CREATE TABLE audit (
    audit_id        INT         NOT NULL AUTO_INCREMENT,
    order_id        INT         NOT NULL,
    created_on      DATETIME    NOT NULL,
    message         TEXT        NOT NULL,
    code            INT         NOT NULL,
    PRIMARY KEY (audit_id),
    KEY idx_audit_order_id (order_id)
);



DELIMITER $$
CREATE PROCEDURE orders_create_audit(IN inOrderId INT, IN inMessage TEXT, IN inCode INT)
BEGIN
    INSERT INTO audit (order_id, created_on, message, code)
    VALUES (inOrderId, NOW(), inMessage, inCode);
END $$
DELIMITER ;
