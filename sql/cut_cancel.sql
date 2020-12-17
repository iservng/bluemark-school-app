DELIMITER $$
CREATE PROCEDURE applicant_cancel_admission(IN inStudentId INT)
BEGIN

    UPDATE applicants
    SET status = 'Pending',
        class_assigned = null,
        admitted_on = NOW()
    WHERE applicants_id = inStudentId;

    CALL applicant_get_student_profile_info(inStudentId);

END $$
DELIMITER ;