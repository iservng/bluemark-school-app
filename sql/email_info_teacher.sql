DELIMITER $$
CREATE PROCEDURE applicant_get_teacher_login_info(IN inEmail VARCHAR(100))
BEGIN

    SELECT teachers_id, email
    FROM teachers 
    WHERE email = inEmail;

END $$
DELIMITER ;