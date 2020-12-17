DELIMITER $$
CREATE PROCEDURE applicant_get_current_status_for_checking(IN inEmail VARCHAR(100))
BEGIN

    SELECT status FROM teachers WHERE email = inEmail;
END $$
DELIMITER ;