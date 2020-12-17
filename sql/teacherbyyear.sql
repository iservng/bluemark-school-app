DELIMITER $$
CREATE PROCEDURE applicant_awaiting_by_year_and_status(IN inYear DATE, IN inStatus INT)
BEGIN
    SELECT teachers_id, name, phone, email, created_on, status
    FROM teachers 
    WHERE YEAR(created_on) = inYear AND status = inStatus
    ORDER BY created_on DESC;
END $$
DELIMITER ;