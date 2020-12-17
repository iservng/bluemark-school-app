
DELIMITER $$
CREATE FUNCTION student_is_class_already_updated(inClassId INT, instudentId INT)
  RETURNS INT

BEGIN 
 DECLARE return_value INT;
    
    SELECT class_id
    FROM active_class
    WHERE student_id = instudentId INTO return_value;

    IF return_value = inClassId THEN

      RETURN 0;
    ELSE 
     
      UPDATE active_class 
      SET class_id = inClassId
      WHERE student_id = instudentId;

      RETURN 1;
    END IF;

END $$
DELIMITER ;