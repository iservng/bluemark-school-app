DELIMITER $$
CREATE PROCEDURE applicant_add_medical_info(IN inUserId INT, IN inDocreport_name_400 VARCHAR(100), IN inBloodgroup CHAR(32), IN inGenotype CHAR(32), IN inAllergies CHAR(32), IN inDefects VARCHAR(100), IN inImmunized VARCHAR(100),IN inDoctorsname VARCHAR(100), IN inDoctorsphone VARCHAR(100), IN inDoctorsaddress VARCHAR(100), IN inOthermedicalinfo VARCHAR(100))
BEGIN

    UPDATE applicants
    SET docreport = inDocreport_name_400, bloodgroup = inBloodgroup, genotype = inGenotype, allergies = inAllergies, defects = inDefects, immunize = inImmunized, docname = inDoctorsname, docphone = inDoctorsphone, docaddress = inDoctorsaddress, otherinfo = inOthermedicalinfo
    WHERE applicants_id = inUserId;

END $$
DELIMITER ;