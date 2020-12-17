DELIMITER $$
CREATE FUNCTION student_get_current_classid(inStudentId INT)
  RETURNS INT
  BEGIN 

    DECLARE classid_value INT;
    
    SELECT class_id
    FROM active_class
    WHERE student_id = inStudentId INTO classid_value;

    RETURN(classid_value);

END $$
DELIMITER ;