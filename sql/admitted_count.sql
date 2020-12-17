DELIMITER $$
CREATE PROCEDURE applicant_count_admitted_for_current_year(IN inAdmitted CHAR(32))
BEGIN 

    SELECT count(status)
    FROM applicants
    WHERE status = inAdmitted AND YEAR(applied_on) = YEAR(CURDATE()); 

END $$
DELIMITER ;