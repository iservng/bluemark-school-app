DELIMITER $$
CREATE PROCEDURE applicant_admit_and_assign_class(IN inStudentId INT, IN inClassId INT)
BEGIN

    UPDATE applicants
    SET status = 'Admitted',
        class_assigned = inClassId,
        admitted_on = NOW()
    WHERE applicants_id = inStudentId;

    CALL applicant_get_student_profile_info(inStudentId);

END $$
DELIMITER ;





