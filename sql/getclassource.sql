
DELIMITER $$ 
CREATE FUNCTION get_root_class_id(mClassId INT)
    RETURNS INT
BEGIN 

    DECLARE last_id_iserted INT;
    
    SELECT source_id 
    FROM school_classes
    WHERE school_classes_id = mClassId INTO last_id_iserted;

    RETURN(last_id_iserted);

END $$
DELIMITER ;