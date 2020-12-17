DELIMITER $$
CREATE PROCEDURE applicant_check_user_admission_status(IN inEmail VARCHAR(100))
BEGIN
    SELECT applicants_id, email, password, status, class_assigned
    FROM applicants 
    WHERE email = inEmail;
END $$
DELIMITER ;