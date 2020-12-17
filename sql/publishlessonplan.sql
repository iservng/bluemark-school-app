
DELIMITER $$
CREATE FUNCTION un_publish_lesson_plan(inLessonPlanId INT, inStatusCode INT)
  RETURNS INT
  BEGIN 

    DECLARE success_code INT;

    UPDATE lesson_plan
    SET publish = inStatusCode
    WHERE lesson_plan_id = inLessonplanId;


    SELECT 1 INTO success_code;

    RETURN(success_code);

  END $$
DELIMITER ;