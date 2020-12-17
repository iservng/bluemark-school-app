CREATE TABLE shipping_region (
    shipping_region_id INT NOT NULL AUTO_INCREMENT,
    shipping_region VARCHAR(100) NOT NULL,
    PRIMARY KEY (shipping_region_id)
);

INSERT INTO shipping_region (shipping_region_id, shipping_region) 
VALUES (1, 'Please Select') , (2, 'US / Canada'), (3, 'Europe'), (4, 'Rest of World');


CREATE TABLE customer (
customer_id             INT             NOT NULL    AUTO_INCREMENT,
name                    VARCHAR(50)     NOT NULL,
email                   VARCHAR(100)    NOT NULL,
password                VARCHAR(50)     NOT NULL,
credit_card             TEXT,
address_1               VARCHAR(100),
address_2               VARCHAR(100),
city                    VARCHAR(100),
region                  VARCHAR(100),
postal_code             VARCHAR(100),
country                 VARCHAR(100),
shipping_region_id      INTEGER         NOT NULL DEFAULT 1,
day_phone               VARCHAR(100),
eve_phone               VARCHAR(100),
mob_phone               VARCHAR(100),
PRIMARY KEY (customer_id),
UNIQUE KEY idx_customer_email (email),
KEY idx_customer_shipping_region_id (shipping_region_id)
);