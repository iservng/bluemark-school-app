DELIMITER $$ 
CREATE PROCEDURE school_get_all_subjects()
BEGIN 
    SELECT subjects_id, name 
    FROM subjects 
    ORDER BY subjects_id;
END $$
DELIMITER ;