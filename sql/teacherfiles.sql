DELIMITER $$
CREATE PROCEDURE applicant_add_staff_credentials(IN inTeachersId INT, IN inFinalpassword VARCHAR(100), IN inBirthCertName VARCHAR(100), IN inPrimaryCertName VARCHAR(100), IN inOlevelCert1Name VARCHAR(100), IN inAlevelCertName VARCHAR(100), IN inStaffAddress VARCHAR(100), IN inStaffPasportName VARCHAR(100), IN inGender INT, IN inStatus INT, IN inStateId INT, IN inOlevelCert2Name VARCHAR(100), IN inProCertName VARCHAR(100))
BEGIN 
    UPDATE teachers 
    SET status = inStatus, birthcert = inBirthCertName, primarycert = inPrimaryCertName, o_Levelcert = inOlevelCert1Name, o_Levelcert2 = inOlevelCert2Name, a_Levelcert = inAlevelCertName, procert = inProCertName, address = inStaffAddress, passport = inStaffPasportName, gender = inGender, password = inFinalpassword, states_rid = inStateId WHERE teachers_id = inTeachersId;

END $$
DELIMITER ;