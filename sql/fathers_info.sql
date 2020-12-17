


DELIMITER $$
CREATE PROCEDURE applicant_add_mother_info(

    IN inId INT, 
    IN inMothersfirstname CHAR(32), 
    IN inMotherslastname CHAR(32), 
    IN inMothersphone CHAR(32), 
    IN inMothersofficeaddress VARCHAR(100), 
    IN inMothersoccupation CHAR(32), 
    IN inMothersreligion VARCHAR(32), 
    IN inMotherresidentialaddress VARCHAR(100) 
  
    )
BEGIN

    UPDATE applicants 
    SET m_fname = inMothersfirstname, 
        m_lname = inMotherslastname, 
        m_phone = inMothersphone, 
        m_office = inMothersofficeaddress, 
        m_occupation = inMothersoccupation, 
        m_religion = inMothersreligion, 
        m_address = inMotherresidentialaddress
    WHERE applicants_id = inId;

END $$
DELIMITER ;