DELIMITER $$
CREATE PROCEDURE applicant_add_user_personal_info(IN inPassport1 VARCHAR(100), IN inPassport4 VARCHAR(100), IN inBirthcert VARCHAR(100), IN inPrimarycert VARCHAR(100), IN inFirstname VARCHAR(100), IN inEmail VARCHAR(100), IN inSurname VARCHAR(100), IN inOthername VARCHAR(100), IN inPassword VARCHAR(100), IN inDateofbirth DATE, IN inGender INT, IN inStateoforigin VARCHAR(100))
BEGIN 

    INSERT INTO applicants(image1, image4, birthcert, primarycert, firstname, email, surname, othername, password, dob, gender, state) VALUES (inPassport1, inPassport4, inBirthcert, inPrimarycert, inFirstname, inEmail, inSurname, inOthername, inPassword, inDateofbirth, inGender, inStateoforigin);

    SELECT LAST_INSERT_ID();
END $$

DELIMITER ;