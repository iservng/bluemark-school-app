


DELIMITER $$ 
CREATE FUNCTION student_count_root_class()
  RETURNS INT
BEGIN 

    DECLARE return_value INT;
    
    SELECT COUNT(class_source_id)
    FROM class_source INTO return_value;

    RETURN(return_value);

END $$
DELIMITER ;