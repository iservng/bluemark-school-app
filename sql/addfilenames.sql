DELIMITER $$
CREATE PROCEDURE applicant_add_file_names(
    IN inImageone VARCHAR(100), 
    IN inImagefour VARCHAR(100), 
    IN inBirthcert VARCHAR(100), 
    IN inPrimarycert VARCHAR(100),
    IN inDocreport VARCHAR(100)

)
BEGIN
    DECLARE userLastInsertId INT;

    INSERT INTO applicants (image1, image4, birthcert, primarycert, docreport)
    VALUES (inImageone, inImagefour, inBirthcert, inPrimarycert, inDocreport);

    SELECT LAST_INSERT_ID() INTO userLastInsertId;

    SELECT userLastInsertId;
END $$
DELIMITER ;