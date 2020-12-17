
DELIMITER $$ 
CREATE FUNCTION student_add_profile_custom_info(inStudentId INT, inTitle VARCHAR(255), inGoals VARCHAR(255), inObjectives VARCHAR(255), inSelf VARCHAR(255))
  RETURNS INT
BEGIN 

    DECLARE id_student INT;

      SELECT content_id
      FROM student_profile_content
      WHERE student_id = inStudentId INTO id_student;

    IF id_student IS NULL THEN

        INSERT INTO student_profile_content (student_id, title, goal, objectives, describe_self) VALUES (inStudentId, inTitle, inGoals, inObjectives, inSelf);

        SELECT LAST_INSERT_ID() INTO id_student;

        RETURN(id_student);

    ELSE

        UPDATE student_profile_content
        SET title = inTitle, goal = inGoals, objectives = inObjectives, describe_self = inSelf, sysdate = NOW()
        WHERE student_id = inStudentId;

        RETURN(id_student);

    END IF;

END $$
DELIMITER ;