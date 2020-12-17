DELIMITER $$ 
CREATE PROCEDURE applicant_user_attestation(IN inUserId INT, IN inAttest INT, IN inSection CHAR(32))
BEGIN 
    UPDATE applicants 
    SET attest = inAttest, section = inSection
    WHERE applicants_id = inUserId;
END $$
DELIMITER ;