DELIMITER $$ 
CREATE PROCEDURE school_get_termId_by_term_name(IN inTermName VARCHAR(100)) 
BEGIN 
    SELECT term_id 
    FROM term 
    WHERE name = inTermName;
END $$
DELIMITER ;