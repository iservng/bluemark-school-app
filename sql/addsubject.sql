DELIMITER $$
CREATE PROCEDURE school_add_new_subject(IN inSubjectname VARCHAR(100))
BEGIN 
    INSERT INTO subjects (name) VALUES (inSubjectname);
END $$ 
DELIMITER ;
