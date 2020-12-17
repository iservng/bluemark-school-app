DELIMITER $$
CREATE PROCEDURE applicant_add_father_info(IN inUserId INT, IN inFathersfirstname CHAR(32),  IN inFatherslastname CHAR(32), IN inFathersphone CHAR(32), IN inFathersofficeaddress VARCHAR(100), IN inFathersoccupation CHAR(32), IN inFathersreligion CHAR(32), IN inFatherresidentialaddress VARCHAR(100))
BEGIN 
    UPDATE applicants
    SET f_fname = inFathersfirstname, f_lname = inFatherslastname, f_phone = inFathersphone, f_office = inFathersofficeaddress, f_occupation = inFathersoccupation, f_religion = inFathersreligion, f_address = inFatherresidentialaddress
    WHERE applicants_id = inUserId;

END $$
DELIMITER ;