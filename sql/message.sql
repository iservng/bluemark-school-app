


DELIMITER $$
CREATE PROCEDURE applicant_get_admission_messages(IN inId INT)
BEGIN 
    SELECT 	massage, subject_1, subject_2, subject_3, entrance_exam_date, oral_interview_date, admission_starts, admission_closes 
    FROM massage_board
    WHERE department_id = inId;
END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE catalog_get_department_id(IN inName VARCHAR(100))
BEGIN
    SELECT department_id FROM department WHERE name = inName;
END $$
DELIMITER ;