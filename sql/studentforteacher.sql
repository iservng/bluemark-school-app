DELIMITER $$ 
CREATE PROCEDURE get_student_infor_for_teacher(IN inStudentId INT)
BEGIN
    SELECT applicants_id, image1, image4, firstname, email, surname, othername, dob, gender, state, f_fname, f_lname, f_address, m_fname, m_lname, m_phone, m_address, class_assigned, reg_number
    FROM applicants
    WHERE applicants_id = inStudentId;
END
DELIMITER ;