DELIMITER $$
CREATE PROCEDURE applicant_get_student_age(IN inStudentId INT)
BEGIN
    

    SELECT dob, CURDATE(), DATE_FORMAT(dob,'%M %d, %Y') AS 'showage',
            YEAR(CURDATE()) - YEAR(dob) AS 'difference',
            IF(RIGHT(CURDATE(),5) < RIGHT(dob,5),1,0) AS 'adjustment',
            YEAR(CURDATE()) - YEAR(dob) - IF(RIGHT(CURDATE(),5) < RIGHT(dob,5),1,0) AS 'age'
    FROM applicants
    WHERE applicants_id = inStudentId;

END $$
DELIMITER ;