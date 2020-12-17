

DELIMITER $$
CREATE PROCEDURE applicant_get_nursery_applicants_by_year(IN inYear CHAR(32))
BEGIN
   

    SELECT applicants_id, firstname, surname, email, f_phone, applied_on
    FROM applicants 
    WHERE YEAR(applied_on) = inYear AND section = 'Nursery'
    ORDER BY applied_on DESC;

    

END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE applicant_get_primary_applicants_by_year(IN inYear CHAR(32))
BEGIN
   

    SELECT applicants_id, firstname, surname, email, f_phone, applied_on
    FROM applicants 
    WHERE YEAR(applied_on) = inYear AND section = 'Primary'
    ORDER BY applied_on DESC;

    

END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE applicant_get_secondary_applicants_by_year(IN inYear CHAR(32))
BEGIN
   

    SELECT applicants_id, firstname, surname, email, f_phone, applied_on
    FROM applicants 
    WHERE YEAR(applied_on) = inYear AND section = 'Secondary'
    ORDER BY applied_on DESC;

    

END $$
DELIMITER ;


