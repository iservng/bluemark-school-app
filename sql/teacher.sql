DELIMITER $$ 
CREATE PROCEDURE applicant_get_teacher_info(IN inTeacherId INT)
BEGIN 
    SELECT name, phone, email, cvname, DATE_FORMAT(created_on, '%M-%e, %Y') AS 'applied_date', TIME_FORMAT(created_on, '%T') AS 'applied_time', status, birthcert, primarycert, o_Levelcert, o_Levelcert2, a_Levelcert, procert, address, passport, gender
    FROM teachers
    WHERE teachers_id = inTeacherId;
END $$  
DELIMITER ;



