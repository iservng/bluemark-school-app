DELIMITER $$
CREATE PROCEDURE school_get_subjetc_list()
BEGIN
    SELECT subjects_id, name 
    FROM subjects
    ORDER BY subjects_id;
END $$
DELIMITER ;