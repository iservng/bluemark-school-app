DELIMITER $$
CREATE PROCEDURE customer_get_login_info(IN inEmail VARCHAR(100))
BEGIN 
    SELECT cust_id, password 
    FROM customer 
    WHERE email = inEmail;

END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE customer_add(IN inName VARCHAR(50), IN inEmail VARCHAR(100), IN inPassword VARCHAR(50))
BEGIN
    INSERT INTO customer (name, email, password)
    VALUES (inName, inEmail, inPassword);

    SELECT LAST_INSERT_ID();
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE customer_get_customer(IN inCustomerId INT)
BEGIN
    SELECT customer_id, name, email, password, credit_card, address_1, address_2, city, region, postal_code, country, shipping_region_id, day_phone, eve_phone, mob_phone
    FROM customer 
    WHERE customer_id = inCustomerId;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE customer_update_account(IN inCustomerId INT, IN inName VARCHAR(50), IN inEmail VARCHAR(100), IN inPassword VARCHAR(50), IN inDayPhone VARCHAR(100), IN inEvePhone VARCHAR(100), IN inMobPhone VARCHAR(100))
BEGIN 
    UPDATE customer 
    SET name = inName, email = inEmail, password = inPassword, day_phone = inDayPhone, eve_phone = inEvePhone, mob_phone = inMobPhone
    WHERE customer_id = inCustomerId;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE customer_update_credit_card(IN inCustomerId INT, IN inCreditCard TEXT)
BEGIN 
    UPDATE customer 
    SET credit_card = inCreditCard
    WHERE customer_id = inCustomerId;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE customer_get_shipping_regions()
BEGIN
    SELECT shipping_region_id, shipping_region 
    FROM shipping_region;
END $$
DELIMITER ;


DELIMITER $$ 
CREATE PROCEDURE customer_update_address(IN inCustomerId INT, IN inAddress1 VARCHAR(100), IN inAddress2 VARCHAR(100), IN inCity VARCHAR(100), IN inRegion VARCHAR(100), IN inPostalCode VARCHAR(100), IN inCountry VARCHAR(100), IN inShippingRegionId INT)
BEGIN
    UPDATE customer 
    SET address_1 = inAddress1, address_2 = inAddress2, city = inCity,
        region = inRegion, postal_code = inPostalCode, 
        country = inCountry, shipping_region_id = inShippingRegionId
    WHERE customer_id = inCustomerId;
END $$
DELIMITER ;