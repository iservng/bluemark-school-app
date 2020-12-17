DELIMITER $$ 
CREATE FUNCTION student_in_active_classid(mStudentId INT)
    RETURNS INT
BEGIN 

    DECLARE id_iserted INT;
    
    
    SELECT active_class_id 
    FROM active_class
    WHERE student_id = mStudentId
    INTO id_iserted;


    RETURN(id_iserted);

END $$
DELIMITER ;

