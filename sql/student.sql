DELIMITER $$
CREATE PROCEDURE applicant_get_student_profile_info(IN inStudentId INT)
BEGIN 
    SELECT 	applicants_id, image1, image4, birthcert, primarycert, docreport, firstname, email, surname, othername, dob, gender, state, bloodgroup, genotype, allergies, defects,immunize, docname, docphone, docaddress, otherinfo, f_fname, f_lname, f_phone, f_office, f_occupation, f_religion, f_address, m_fname, m_lname, m_phone, m_office, m_occupation, m_religion, m_address, status, applied_on, section, class_assigned, admitted_on
    FROM applicants
    WHERE applicants_id = inStudentId;
END $$
DELIMITER ;