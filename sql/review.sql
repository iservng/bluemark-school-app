CREATE TABLE review (
    review_id INT NOT NULL AUTO_INCREMENT,
    customer_id INT NOT NULL,
    product_id INT NOT NULL,
    review TEXT NOT NULL,
    rating SMALLINT NOT NULL,
    created_on DATETIME NOT NULL,
    PRIMARY KEY (review_id),
    KEY id_review_customer_id (customer_id),
    KEY id_review_product_id (product_id)
);

DELIMITER $$
CREATE PROCEDURE catalog_get_product_reviews(IN inProductId INT)
BEGIN
    SELECT c.name, r.review, r.rating, r.created_on
    FROM review r 
    INNER JOIN customer c 
            ON c.customer_id = r.customer_id 
    WHERE r.product_id = inProductId
    ORDER BY r.created_on DESC;
END$$
DELIMITER ;


DELIMITER $$ 

CREATE PROCEDURE catalog_create_product_review(IN inCustomerId INT, IN inProductId INT, IN inReview TEXT, IN inRating SMALLINT)
BEGIN 
    INSERT INTO review (customer_id, product_id, review, rating, created_on)
    VALUES (inCustomerId, inProductId, inReview, inRating, NOW());
END $$
DELIMITER ;