DELIMITER $$
CREATE PROCEDURE applicant_get_nursery_applicants_by_year(IN inYear DATE)
BEGIN
    SELECT applicants_id, firstname, surname, email, f_phone, applied_on
    FROM applicants 
    WHERE YEAR(applied_on) = inYear AND section = 'Nursery' AND reg_number IS NULL
    ORDER BY applied_on DESC;
END $$

DELIMITER ;


DELIMITER $$
CREATE PROCEDURE applicant_get_primary_applicants_by_year(IN inYear DATE)
BEGIN

    SELECT applicants_id, firstname, surname, email, f_phone, applied_on
    FROM applicants 
    WHERE YEAR(applied_on) = inYear AND section = 'Primary' AND reg_number IS NULL
    ORDER BY applied_on DESC; 
END $$

DELIMITER ;




DELIMITER $$
CREATE PROCEDURE applicant_get_secondary_applicants_by_year(IN inYear DATE)
BEGIN

    SELECT applicants_id, firstname, surname, email, f_phone, applied_on
    FROM applicants 
    WHERE YEAR(applied_on) = inYear AND section = 'Secondary' AND reg_number IS NULL
    ORDER BY applied_on DESC; 
END $$

DELIMITER ;




DELIMITER $$
CREATE PROCEDURE applicant_get_teacher_applicants_by_year(IN inYear DATE)
BEGIN

    SELECT teachers_id, name, phone, email, created_on, status
    FROM teachers 
    WHERE YEAR(created_on) = inYear AND status != 6
    ORDER BY created_on DESC;

END $$

DELIMITER ;



