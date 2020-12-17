DELIMITER $$
CREATE PROCEDURE applicant_save_all_personal_info(IN inImage1 VARCHAR(100), IN inImage4 VARCHAR(100), IN inBirthcert VARCHAR(100), IN inPrimarycert VARCHAR(100), IN inDocreport VARCHAR(100), IN inFirstname VARCHAR(100), IN inEmail VARCHAR(100), IN inSurname VARCHAR(100), IN inOthername VARCHAR(100), IN inPassword VARCHAR(100), IN inDob DATE, IN inGender INT, IN inState VARCHAR(100), IN inBloodgroup CHAR(32), IN inGenotype CHAR(32), IN inAllergies CHAR(32), IN inDefects VARCHAR(100), IN inImmunize VARCHAR(100), IN inDocname VARCHAR(100), IN inDocphone VARCHAR(100), IN inDocaddress VARCHAR(100), IN inOtherinfo VARCHAR(100), IN inFatherfname CHAR(32), IN inFstherlname CHAR(32), IN inFatherphone CHAR(32), IN inFatheroffice VARCHAR(100), IN inFatheroccupation CHAR(32), IN inFatherreligion CHAR(32), IN inFatheraddress VARCHAR(100), IN inMotherfname CHAR(32), IN inMotherlname CHAR(32), IN inMotherphone CHAR(32), IN inMotheroffice VARCHAR(100), IN inMotheroccupation CHAR(32), IN inMotherreligion CHAR(32), IN inMotheraddress VARCHAR(100), IN inSection CHAR(32))
BEGIN

    INSERT INTO applicants (image1, image4, birthcert, primarycert, docreport, firstname, email, surname, othername, password, dob, gender, state, bloodgroup, genotype, allergies, defects, immunize, docname, docphone, docaddress, otherinfo, f_fname, f_lname, f_phone, f_office, f_occupation, f_religion, f_address, m_fname, m_lname, m_phone, m_office, m_occupation, m_religion, m_address, section)
    VALUES (inImage1, inImage4, inBirthcert, inPrimarycert, inDocreport, inFirstname, inEmail, inSurname, inOthername, inPassword, inDob, inGender, inState, inBloodgroup, inGenotype, inAllergies, inDefects, inImmunize, inDocname, inDocphone, inDocaddress, inOtherinfo, inFatherfname, inFstherlname, inFatherphone, inFatheroffice, inFatheroccupation, inFatherreligion, inFatheraddress, inMotherfname, inMotherlname, inMotherphone, inMotheroffice, inMotheroccupation, inMotherreligion, inMotheraddress, inSection);

END $$
DELIMITER ;