
-- AddTeacherToAdmin($this->mTeacher_confirmedId);
DELIMITER $$ 
CREATE FUNCTION teacher_is_user_an_admin(inTeacherId INT)
  RETURNS INT
BEGIN 

    DECLARE return_value INT;
    
    SELECT ndioga_id
    FROM ndioga
    WHERE teacher_id = inTeacherId INTO return_value;

    IF return_value IS NULL THEN 
        RETURN 0;
    ELSE
        RETURN(return_value);
    END IF;

END $$
DELIMITER ;
