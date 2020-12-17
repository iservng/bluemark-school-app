DELIMITER $$ 
CREATE PROCEDURE applicant_get_current_applications(IN inYear CHAR(32))
BEGIN 
    SELECT applicants_id, firstname, surname, email, f_phone, applied_on, status 
    FROM applicants 
    WHERE YEAR(applied_on) = inYear AND reg_number IS NULL
    ORDER BY applied_on;
END $$  
DELIMITER ;



    