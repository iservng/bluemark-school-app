DELIMITER $$
CREATE PROCEDURE school_update_term_name(IN inTerm VARCHAR(100), IN inAdminSettingsId INT)
BEGIN 
    UPDATE admin_settings 
    SET current_term = inTerm
    WHERE admin_settings_id = inAdminSettingsId;
END $$
DELIMITER ;