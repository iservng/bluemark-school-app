
DELIMITER $$ 
CREATE PROCEDURE school_get_specified_class_members_by_classid(IN inClassId INT, IN inTerm VARCHAR(100), IN inActiveStatus INT)
BEGIN 
    SELECT class_id, student_id, firstname, surname, email, f_phone, admitted_on, reg_number
    FROM active_class ac 
        INNER JOIN applicants a 
            ON ac.student_id = a.applicants_id
    WHERE class_id = inClassId AND term_name = inTerm AND active_status = inActiveStatus
    ORDER BY a.gender ASC;
END $$
DELIMITER ;