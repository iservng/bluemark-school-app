DELIMITER $$ 


CREATE FUNCTION Delete_uncomplete_lessonPlan_record(lessonPlan_Id INT)
    RETURNS INT
BEGIN 

    
    DELETE
    FROM lessonplan_fieldchildren 
    WHERE lessonplan_id = lessonPlan_Id;

    DELETE
    FROM lesson_plan 
    WHERE lesson_plan_id = lessonPlan_Id;
    

    RETURN 1;

END $$
DELIMITER ;