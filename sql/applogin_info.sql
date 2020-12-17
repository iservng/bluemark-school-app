DELIMITER $$
CREATE PROCEDURE applicant_get_login_info(IN inEmail VARCHAR(100))
BEGIN 
    SELECT applicants_id, email 
    FROM applicants 
    WHERE email = inEmail;
END $$ 
DELIMITER ;