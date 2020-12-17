DELIMITER $$
CREATE PROCEDURE applicant_add_personal_info(IN inId INT, IN inFirstname VARCHAR(100), IN inEmail VARCHAR(100), IN inSurname VARCHAR(100), IN inOthername VARCHAR(100), IN inPassword VARCHAR(100), IN inDateofbirth DATE, IN inGender INT, IN inState VARCHAR(100))
BEGIN
    UPDATE applicants 
    SET firstname = inFirstname, 
        email = inEmail, 
        surname = inSurname, 
        othername = inOthername, 
        password = inPassword, 
        dob = inDateofbirth, 
        gender = inGender, 
        state =inState 
    WHERE applicants_id = inId;
END $$
DELIMITER ;

