DELIMITER $$ 
CREATE PROCEDURE school_get_student_to_add_info(IN inEmail VARCHAR(100))
BEGIN 

    SELECT applicants_id, firstname, surname, status, section, class_assigned, admitted_on, TIME_TO_SEC(applied_on) AS miSeconds 
    FROM applicants 
    WHERE email = inEmail;

END $$
DELIMITER ;