--Create department table
CREATE TABLE department (
  department_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  description VARCHAR(1000),
  PRIMARY KEY (department_id)
) ENGINE=MyISAM;

-- Create catalog_get_department_details stored procedure
CREATE PROCEDURE catalog_get_department_details(IN inDepartmentId INT)
BEGIN
  SELECT name, description
  FROM department
  WHERE department_id = inDepartmentId;
END


CREATE PROCEDURE catalog_get_categories_list(IN inDepartmentId INT)
BEGIN
  SELECT category_id, name
  FROM category
  WHERE department_id = inDepartmentId
  ORDER BY category_id;
END


CREATE PROCEDURE catalog_get_category_details(IN inCategoryId INT)
BEGIN
SELECT name, description
FROM category
WHERE category_id = inCategoryId;
END


CREATE PROCEDURE catalog_count_products_in_category(IN inCategoryId INT)
BEGIN
SELECT count(*) AS categories_count
FROM product p
INNER JOIN product_category pc
        ON p.product_id = pc.product_id
WHERE pc.category_id = inCategoryId;
END


CREATE PROCEDURE catalog_get_products_in_category(IN inCategoryId INT, IN inShortProductDescriptionLength INT, IN inStartItem INT, IN inProductsPerPage INT)
BEGIN
-- PREPARE STATEMENT
PREPARE statement FROM
SELECT p.product_id, p.name
        IF(LENGTH(p.description) <= ?
            p.description,
          CONCAT(LEFT(P.description, ?), '...')) AS description,
      p.price, p.discounted_price, p.thumbnail
FROM product p
INNER JOIN product_category pc
        ON p.product_id = pc.product_id
WHERE pc.category_id = ?
ORDER BY p.display DESC
LIMIT ?, ?;

--Define query parameters
SET @p1 = inShortProductDescriptionLength;
SET @p2 = inShortProductDescriptionLength;
SET @p3 = inCategoryId;
SET @p4 = inStartItem;
set @p5 = inProductsPerPage;

EXECUTE statement USING @p1, @p2, @p3, @p4, @p5;
END


CREATE PROCEDURE catalog_count_products_on_department(IN inDepartmentId INT)
BEGIN
SELECT DISTINCT COUNT(*) AS products_on_department_count
FROM product p
INNER JOIN product_category pc
          ON p.product_id = pc.product_id
INNER JOIN category c
          ON pc.category_id = c.category_id
WHERE (p.display = 2 OR p.display = 3) AND c.department_id = inDepartmentId
END


CREATE PROCEDURE catalog_get_products_on_department(IN inDepartmentId INT, IN inShortProductDescriptionLength INT, IN inStartItem INT, IN inProductsPerPage INT)
BEGIN
PREPARE statement FROM
SELECT DISTINCT p.product_id, p.name
                IF(LENGTH(p.description) <= ?,
                description,
                 CONCAT(LEFT(p.descripion, ?),
                 '...')) AS description,
                p.price, p.discounted_price, p.thumbnail
FROM product p
INNER JOIN product_category pc
          ON p.product_id = pc.product_id
INNER JOIN category c
          ON pc.category_id = c.category_id
WHERE (p.display = 2 OR p.display = 3) AND c.department_id = ?
ORDER BY p.display DESC
LIMIT ?, ?

SET @p1 = inShortProductDescriptionLength;
SET @p2 = inShortProductDescriptionLength;
SET @p3 = inDepartmentId;
SET @p4 = inStartItem;
SET @p5 = inProductsPerPage;

EXECUTE statement USING @p1, @p2, @p3, @p4, @p5;
END


CREATE PROCEDURE catalog_count_products_on_catalog()
BEGIN
SELECT COUNT(*) AS products_on_catalog_count
FROM product
WHERE display = 1 OR display = 3
END



CREATE PROCEDURE catalog_get_product_on_catalog(IN inShortProductDescriptionLength INT, IN inStartItem INT, IN inProductsPerPage INT)
BEGIN
PREPARE statement FROM
SELECT product_id, name,
        IF(LENGTH(descripion) <= ?, descripion, CONCAT(LEFT(descripion, ?), '...')) AS description,
        price, discounted_price, thumbnail
FROM product
WHERE display = 1 OR display = 3
ORDER BY display DESC
LIMIT ?,?

SET @p1 = inShortProductDescriptionLength;
SET @p2 = inShortProductDescriptionLength;
SET @p3 = inStartItem;
SET @p4 = inProductsPerPage;

EXECUTE statement USING @p1, @p2, @p3, @p4;
END




CREATE PROCEDURE catalog_get_product_details(IN inProductId INT)
BEGIN
SELECT product_id, name, description
      price, discounted_price, image, image_2
FROM product
WHERE product_id = inProductId
END


CREATE PROCEDURE catalog_get_product_locations(IN inProductId INT)
BEGIN
SELECT c.category_id, c.name AS category_name, c.department_id,
      (SELECT name
      FROM department
      WHERE department_id = c.department_id) AS department_name,
FROM category c
WHERE c.category_id IN
      (SELECT category_id
      FROM product_category
      WHERE product_id = inProductId);
END

--Create catalog_count_search_result stored procedure
CREATE PROCEDURE catalog_count_search_result(IN inSearchString TEXT, IN inAllWords VARCHAR(3))
BEGIN 
IF inAllWords = "on" THEN 
  PREPARE statement FROM
  SELECT count(*)
  FROM product
  WHERE MATCH (name, description) AGAINST (?, IN BOOLEAN MODE);
ELSE
  PREPARE statement FROM 
  SELECT COUNT(8)
  FROM product
  WHERE MATCH (name, descripion) AGAINST (?);
END IF;

SET @p1 = inSearchString;
EXECUTE statement USING @p1;
END 


--CREATE catalog_search_store procedure
CREATE PROCEDURE catalog_search_store(IN inSearchString TEXT, IN inAllWords VARCHAR(3), IN inShortProductDescriptionLength INT, IN inProductsPerPage INT, IN inStartItem INT)
BEGIN 
IF inAllWord = "on" THEN
PREPARE statement FROM 
    SELECT  product_id, name, 
            IF (LENGTH(desscription) <= ? descripion, CONCAT(LEFT(descripion, ?), '...')) AS description,
            price, discounted_price, thumbnail
    FROM product
    WHERE MATCH (name, descripion) AGAINST (? IN BOOLEAN MODE)
    ORDER BY MATCH (name, description) AGAINST (? IN BOOLEAN MODE) DESC 
    LIMIT ?, ?;
ELSE 
    PPREPARE statement FROM 
    SELECT product_id, name, 
            IF(LENGTH(description) <= ? description, CONCAT(LEFT(description, ?), '...')) AS description,
            price, discounted_price, thumbnail
    FROM product
    WHERE MATCH (name, descripion) AGAINST (?)
    ORDER BY MATCH (name, desscription) AGAINST (?) DESC 
    LIMIT BY ?, ?;
END IF;
SET @p1 = inShortProductDescriptionLength;
SET @p2 = inSearcString;
SET @p3 = inProductPerPage;
SET $p4 = inStartItem;
EXECUTE statement USING @p1, @p1, @p2, @p2, @p3, @p4;
END 








