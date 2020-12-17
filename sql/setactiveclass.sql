DELIMITER $$ 
CREATE PROCEDURE school_set_student_active_class(IN inClassId INT, IN inStudentId INT, IN inDate DATE, IN inTermName VARCHAR(100))
BEGIN 
    INSERT INTO active_class (class_id, student_id, admitted_date, term_name) 
    VALUES (inClassId, inStudentId, inDate, inTermName);
END $$
DELIMITER ;